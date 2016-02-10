<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public $error = array();

	public function __construct()
	{
		parent::__construct();
	}
	public function authenticate()
	{
		$username = $this->input->post('id_number');
		$password = $this->input->post('password');
		if(empty($username) || empty($password)){
			$this->session->set_flashdata('msg', "Fields cannot be empty");
			if($this->router->fetch_module() ==' frontend'){
		 		redirect(base_url(),'refresh');
		 		}
		 		elseif($this->router->fetch_module() =='backend'){
		 		redirect(base_url('backend/admin'),'refresh');
	 		}
		}
		elseif (!is_numeric($username)) {
		 	$this->session->set_flashdata('msg', "ID Number must be numeric");
		 	if($this->router->fetch_module() ==' frontend'){
		 		redirect(base_url(),'refresh');
		 		}
		 		elseif($this->router->fetch_module() =='backend'){
		 		redirect(base_url('backend/admin'),'refresh');
	 		}
		 }
		else{
		 	if($this->aauth->login($username, $password, $remember = FALSE, $totp_code = NULL)){
		 		if($this->aauth->is_member('Default')){
		 			redirect(base_url('voter/'.$this->aauth->get_user()->name),'refresh');
		 		}
		 		else{
		 			redirect(base_url('backend'),'refresh');
		 		}
		 	}
		 	else{
		 	$this->session->set_flashdata('msg', $this->aauth->print_errors());
		 		if($this->router->fetch_module() ==' frontend'){
		 		redirect(base_url(),'refresh');
		 		}
		 		elseif($this->router->fetch_module() =='backend'){
		 		redirect(base_url('backend/admin'),'refresh');
		 		}
		 	}
		 }
	}

}

/* End of file Login.php */
/* Location: .//C/xampp/htdocs/beta/app/controllers/Login.php */