<?php  
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class commonData  extends CI_Model {
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    } 

	function general_info(){    	    	
		$query = $this->db->get_where("general", array("id" => 1));
		$general = $query->row();
		
		$general_info = array(
			"notification_email" => $general->notification_email,
			"from_email" => $general->from_email,
			"company_name" => $general->company_name,
			"logo" => $general->logo,
			"meta_title" => $general->meta_title,
			"meta_description" => $general->meta_description,
			"meta_keyword" => $general->meta_keyword,
		);

		return $general_info;
    }     	

	function unlink_image($path){
		$filepath=$path;
		if(file_exists(@$filepath)) {
			unlink(@$filepath); 
		}		
	}	

	function display_flash_message($status, $message, $id = ""){
		$stat = ($status == "error") ? "Error" : "Success";
		$su = ($id != "") ? $id : "successfeed";	

		$er = ($status == "error") ? "danger" : "success";
		
		if($su != "successfeed"){
			if($status == "error"){
				$this->session->set_flashdata($su, '<div class="login_inner_div">'.$message.'</div>');
			}
			else{
				$this->session->set_flashdata($su, '<div class="login_success_inner_div">'.$message.'</div>');
			}
		}
		else{
			$this->session->set_flashdata($su, '<div class="alert alert-'.$er.'"><button class="close" data-dismiss="alert"></button>'.$message.'</div>');
		}
	}

	function check_loggedin($sess_vari, $from){
		if($this->session->userdata($sess_vari) != TRUE){
			if($from == "user"){
				redirect(base_url()."/home");
			}
			else{
				redirect(base_url().$from."/login");
			}
		}		
	}

	function check_admin_login_thn_home(){
		if($this->session->userdata("logged_in") == TRUE){
			redirect(base_url()."home");
		}		
	}	
}



 
