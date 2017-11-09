<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
set_time_limit(0);

class Admin extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

	function __construct(){
		parent::__construct();
		$this->load->model('commondata');		
		$this->load->helper('new_helper');
	}

	function index(){
		$this->commondata->check_loggedin("logged_in", "admin");

		$data["ptitle"] = "Dashboard";

		$this->load->view("admin/header-inside");
		$this->load->view("admin/home", $data);
		$this->load->view("admin/footer-inside");
	}

/*-- login start --*/
	function login(){
		if($this->session->userdata("logged_in") == TRUE){
			redirect(base_url()."admin");
		}

		$data["ptitle"] = "Login Page";

		$this->load->view("admin/header");
		$this->load->view("admin/login");
		$this->load->view("admin/footer");
	}

	function process_login(){
		$username = stripslashes($this->input->post("username"));
		$password = $this->input->post("password");
		$pass = md5($password);

		$qu = "select id, username, password from admin where username = '".$username."' and password = '".$pass."' and status = 1";
		$query = $this->db->query($qu);
		$row = $query->row();			
		if(!empty($row) && ($username == $row->username) && ($pass == $row->password)){			
			$data = array(
				"username" => $row->username,
				"id" => $row->id,
				"logged_in" =>TRUE
			);
			$this->session->set_userdata($data);
			redirect(base_url()."admin/index");
		}
		else{
			$this->commondata->display_flash_message("error", "Oopsie, it seems your username or password is incorrect, please try again.");
			redirect(base_url()."admin/login");
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url()."admin/login");
	}
/*-- login end --*/

/*-- video start --*/
	function video(){
		$this->commondata->check_loggedin("logged_in", "admin");

		$data["ptitle"] = "Video Management";

		$qu = "select * from video order by id desc";
		$query = $this->db->query($qu);		
		$data["result"] = $query->result();
		$data["count_row"] = $query->num_rows();

		$this->load->view("admin/header-inside");
		$this->load->view("admin/video-list", $data);
		$this->load->view("admin/footer-inside");
	}

	function add_video(){
		$this->commondata->check_loggedin("logged_in", "admin");

		$data["ptitle"] = "Add Video";				

		$this->load->view("admin/header-inside");
		$this->load->view("admin/video-add", $data);
		$this->load->view("admin/footer-inside");		
	}

	function process_videoadd(){
		$this->commondata->check_loggedin("logged_in", "admin");

		$title = stripslashes($this->input->post("title"));			
		$description = stripslashes($this->input->post("description"));	
		$thumbnail = $this->input->post("thumbnail");	
		if(!empty($_FILES["image1"]["tmp_name"])){	
			$qu = "select title from video where title = '".$title."'";
			$query = $this->db->query($qu);
			$re = $query->row();	
			$count_row = count($re);					
			if(empty($count_row)){
				$data = array(
					"title" => $title,			
					"description" => $description,
					"thumbnail" => $thumbnail,
					"created" => date("Y-m-d H:i:s")
				);
				
				$result = $this->db->insert("video", $data);
				$data['error'] = '';
				if($result){
					$insert_id=$this->db->insert_id();
					$this->load->library('upload');
					$path =  $this->config->item('basepath');	

					$image1='';							
					$img_nm = $_FILES["image1"]["name"];
set_time_limit(0);
					if(!empty($img_nm)){
						$time_val = microtime();
						$config['upload_path'] = $path.'upload/video';
						$config['overwrite']	= TRUE; 
						$config['allowed_types'] = 'mp4';
						$config['max_size']	= '1024000';
						$config['file_name'] = $time_val.'_'.$img_nm;
						$this->upload->initialize($config);
						if (!$this->upload->do_upload("image1")){
							$display_errors = strip_tags($this->upload->display_errors());						
							$data['error'] .=  "For Image1 - ".$display_errors."<br/>";   
						}    
						else{							
							$data = array('upload_data' => $this->upload->data());
							$image1 = $data['upload_data']['file_name'];	

							$path_info = pathinfo($path.'upload/video/'.$image1);	
						}			
					}				

					if(!empty($data['error'])){
						$this->commondata->display_flash_message("error", trim($data['error']));
						redirect(base_url()."admin/video");
					}

$this->load->database();
$this->db->reconnect();	

					$datainfo = array(
						"image1" => $image1,
					);

					$this->db->where("id", $insert_id);
					$result = $this->db->update("video", $datainfo);
					if($result){
						$this->commondata->display_flash_message("success", "Video added successfully.".@$data['error']);
						redirect(base_url()."admin/video");	
					}
					else{
						$this->commondata->display_flash_message("error", "Error occured during video upload.");
						redirect(base_url()."admin/video");
					}						
				}
				else{			
					$this->commondata->display_flash_message("error", "Error occured.");
					redirect(base_url()."admin/add_video");
				}
			}
			else{
				$this->commondata->display_flash_message("error", "Duplicate record found.");
				redirect(base_url()."admin/add_video");
			}		
		}
		else{
			$this->commondata->display_flash_message("error", "Video is exceding to upload_max_filesize 8M. Please increase upload_max_filesize.");
			redirect(base_url()."admin/add_video");			
		}
	}

	function edit_video($id){
		$this->commondata->check_loggedin("logged_in", "admin");
		
		$data["ptitle"] = "Edit Video";

		$query = $this->db->get_where("video", array("id" => $id));
		$data["result"] = $query->row();
		$count_row = $query->num_rows();
		if(empty($count_row)){
			$this->commondata->display_flash_message("error", "Record not exists.");
			redirect(base_url()."admin/video");				
		}			

		$this->load->view("admin/header-inside");
		$this->load->view("admin/video-edit", $data);
		$this->load->view("admin/footer-inside");		
	}

	function process_videoedit(){
		$this->commondata->check_loggedin("logged_in", "admin");

		$title = $this->input->post("title");				
		$description = stripslashes($this->input->post("description"));	
		$thumbnail = $this->input->post("thumbnail");	
		$id = $this->input->post("id");

		if(!empty($_POST)){
			$this->db->where("title", $title);
			$query = $this->db->get("video");
			$count_row = $query->num_rows();
			$result = $query->row();		
			if((($count_row == 1) && ($result->id == $id)) || ($count_row == 0)){
				$this->load->library('upload');
				$path =  $this->config->item('basepath');				

				$image1=$this->input->post("image1_copy");		
				$data['error'] = '';
set_time_limit(0);
				if(!empty($_FILES["image1"]["tmp_name"])){
					$time_val = microtime();
					$config['upload_path'] = $path.'upload/video';
					$config['overwrite']	= TRUE; 
					$config['allowed_types'] = 'mp4';
					$config['max_size']	= '1024000';
					$config['file_name'] = $time_val.'_'.$_FILES["image1"]["name"];

					$this->upload->initialize($config);
					if (!$this->upload->do_upload("image1")){
						$display_errors = strip_tags($this->upload->display_errors());						
						$data['error'] .=  "For Image1 - ".$display_errors."<br/>";      
					}    
					else{		
						if(!empty($image1)){		
							$this->commondata->unlink_image($path.'upload/video/'.$image1);		
						}

						$data = array('upload_data' => $this->upload->data());
						$image1 = $data['upload_data']['file_name'];	

						$path_info = pathinfo($path.'upload/video/'.$image1);	
					}														
				}
				
				if(!empty($data['error'])){
					$this->commondata->display_flash_message("error", trim($data['error']));
					redirect(base_url()."admin/edit_video/".$id);
				}			

$this->load->database();
$this->db->reconnect();	
				$data = array(
					"title" => $title,				
					"description" => $description,	
					"thumbnail" => $thumbnail,	
					"image1" => $image1,				
				);
				$this->db->where("id", $id);
				$result = $this->db->update("video", $data);
				if($result){
					$this->commondata->display_flash_message("success", "Video Updated Successfully.");
					redirect(base_url()."admin/video");
				}
				else{
					$this->commondata->display_flash_message("error", "Error occured.");
					redirect(base_url()."admin/edit_video/".$id);
				}
			}
			else{
				$this->commondata->display_flash_message("error", "Duplicate record found.");
				redirect(base_url()."admin/edit_video/".$id);
			}
		}
		else{
			$this->commondata->display_flash_message("error", "POST Content-Length of 9797461 bytes exceeds the limit of 8388608 bytes in Unknown on line 0.");
			redirect(base_url()."admin/video");
		}
	}	

	function delete_video(){
		$this->commondata->check_loggedin("logged_in", "admin");
		

		$txt_all_selected_value = $this->input->post("txt_all_selected_value");
		$action = $this->input->post("action");

		if(isset($txt_all_selected_value) && !empty($txt_all_selected_value)){
			$txt_all_selected_value = explode(",", $txt_all_selected_value);			
			$count_total = count($txt_all_selected_value);			

			for($i = 0; $i < $count_total; $i++){				
				$query = $this->db->get_where("video", array("id" => $txt_all_selected_value[$i]));
				$result = $query->row();
				$path =  $this->config->item('basepath');

				$this->db->delete("video", array("id" => $txt_all_selected_value[$i]));
				if(!empty($result->image1)){
					$this->commondata->unlink_image($path.'upload/video/'.$result->image1);						
				}					
			}						
			$this->commondata->display_flash_message("success", "Video Deleted Successfully.");			
		}
		else{
			$this->commondata->display_flash_message("error", "No Action Performed.");
		}
		redirect(base_url()."admin/video");
	}
/*-- video end --*/

/*-- reset password start --*/
	function resetpassword(){
		$this->commondata->check_loggedin("logged_in", "admin");

		$data["ptitle"] = "Reset Password";

		$this->load->view("admin/header-inside");
		$this->load->view("admin/resetpassword", $data);
		$this->load->view("admin/footer-inside");
	}

	function edit_resetpassword(){
		$this->commondata->check_loggedin("logged_in", "admin");

		$txt_oldpassword = $this->input->post("txt_oldpassword");
		$password = $this->input->post("password");

		$query = $this->db->get_where("admin", array("id" => $this->session->userdata("id")));
		$result = $query->row();
		if($result->password != md5($txt_oldpassword)){
			$this->commondata->display_flash_message("error", "Old Password is wrong.");
		}
		else{
			$data = array(
				"password" => md5($password),
			);

			$this->db->where("id", $this->session->userdata("id"));
			$result = $this->db->update("admin", $data); 
			if($result){
				$this->commondata->display_flash_message("success", "Password Updated Successfully.");				
			}
			else{
				$this->commondata->display_flash_message("error", "Error occured.");
			}
		}
		redirect(base_url()."admin/resetpassword");
	}
/*-- reset password end --*/
}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */

