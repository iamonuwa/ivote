<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->theme->set(get_current_theme('backend'));
		$this->theme->load_file('index');
	}

	public function index()
	{
		if($this->input->post()){
		$username = e($this->input->post('id_number'));
		$password = e($this->input->post('password'));
		if(empty($username) || empty($password)){
			$this->session->set_flashdata('msg', "Fields cannot be empty");
		 		redirect(base_url('admin'),'refresh');
		}
		elseif (!is_numeric($username)) {
		 	$this->session->set_flashdata('msg', "ID Number must be numeric");
		 		redirect(base_url('admin'),'refresh');
		 }
		else{
		 	if($this->aauth->login($username, $password, $remember = FALSE, $totp_code = NULL)){
		 			redirect(base_url('backend'),'refresh');
		 	}
		 	
		 	else{
		 	$this->session->set_flashdata('msg', $this->aauth->print_errors());
		 		redirect(base_url('backend/admin'),'refresh');
		 	}
		 }
		}else{
		
		}
	}

}

/* End of file Login.php */
/* Location: .//C/xampp/htdocs/beta/modules/backend/controllers/Login.php */