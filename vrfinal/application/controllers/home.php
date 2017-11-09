<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

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
		$head["ptitle"] = "Home";		
		$data["ptitle"] = "Home";				

		$qu = "select * from video ORDER BY RAND()";
		$query = $this->db->query($qu);
		$data["video"] = $query->result();		

		$this->load->view("header_outer", $head);
		$this->load->view("home", $data);
		$this->load->view("footer_outer");
	}		

	function videotest($id){		
		$head["ptitle"] = "Home";		
		$data["ptitle"] = "Home";	

		if(empty($id)){
			redirect(base_url()."home");
		}			

		$qu = "select * from video where id = '".$id."'";
		$query = $this->db->query($qu);
		$data["video"] = $query->row();		

		if(empty($data["video"])){
			redirect(base_url()."home");
		}
                
        if(empty($data["video"]->image1)){
			redirect(base_url()."home");
		}
		if($data["video"]->thumbnail != "Normal"){		
			$this->load->view("videotest", $data);
		}
		else{
			$this->load->view("videotest360", $data);	
		}
	}	

	function vrv(){		
		$this->load->view("vrv");
	}	

	function test(){
		echo phpinfo();
	}
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */
