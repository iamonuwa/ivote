<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('voters_model');
		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
	
	}
	// public function index()
	// {
	// 	if($this->input->post()){
	// 	$username = e($this->input->post('id_number'));
	// 	$password = e($this->input->post('password'));
	// 	if(empty($username) || empty($password)){
	// 		$this->session->set_flashdata('msg', "Fields cannot be empty");
	// 	 		redirect(base_url(),'refresh');
	// 	}
	// 	elseif (!is_numeric($username)) {
	// 	 	$this->session->set_flashdata('msg', "ID Number must be numeric");
	// 	 		redirect(base_url(),'refresh');
	// 	 }
	// 	else{
	// 	 	if($this->voter->login($username, $password, $remember = FALSE, $totp_code = NULL)){
	// 	 			redirect(base_url('voter/'.$this->voter->get_user()->name),'refresh');
	// 	 	}
		 	
	// 	 	else{
	// 	 	$this->session->set_flashdata('msg', $this->voter->print_errors());
	// 	 		redirect(base_url(),'refresh');
	// 	 	}
	// 	 }
	// 	}else{
		
	// 	}
	// }

	public function index()
	{
		$this->data['title'] = "Login";

		//validate form input
		$this->form_validation->set_rules('id_number', 'Login ID', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == true)
		{
			// check to see if the user is logging in
			// check for "remember me"
			$remember = (bool) $this->input->post('remember');

			if($this->voters_model->only_deleted()->get_by('username', $this->input->post('id_number'))){
				$error = "You have voted! You cannot Login to vote again";
				$this->session->set_flashdata('msg', $error);
				redirect(base_url(), 'refresh');

			}else{

			if ($this->ion_auth->login($this->input->post('id_number'), $this->input->post('password'), $remember))
			{
				//if the login is successful
				//redirect them back to the home page
				$this->session->set_flashdata('success', $this->ion_auth->messages());
				redirect(base_url('voter'), 'refresh');
			}
			else
			{
				// var_dump($this->ion_auth->errors());
				// if the login was un-successful
				// redirect them back to the login page
				$this->session->set_flashdata('msg', $this->ion_auth->errors());
				redirect(base_url(), 'refresh'); // use redirects instead of loading views for compatibility with MY_Controller libraries
			}
		}
	}
		else
		{
			// the user is not logging in so display the login page
			// set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$this->data['id_number'] = array('name' => 'id_number',
				'id'    => 'id_number',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('id_number'),
			);
			$this->data['password'] = array('name' => 'password',
				'id'   => 'password',
				'type' => 'password',
			);
			$this->session->set_flashdata('msg', $this->data);
			redirect(base_url(), 'refresh');
		}
	}


}

/* End of file Login.php */
/* Location: .//C/xampp/htdocs/beta/modules/frontend/controllers/Login.php */