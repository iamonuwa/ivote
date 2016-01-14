<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public $error = array();

	public function __construct()
	{
		parent::__construct();
	}
	// public function index()
	// {
	// 	$this->theme->set(get_current_theme());
	// 	$data = '';
	// 	$this->theme->set_data('login',$data);
	//   	$this->theme->load(); 
	// }

	public function authenticate()
	{
		$username = $this->input->post('id_number');
		$password = $this->input->post('password');
		if(empty($username) || empty($password)){
			echo 'Error';
			if($this->router->fetch_module() ==' frontend'){
		 		redirect(base_url(),'refresh');
		 		}
		 		elseif($this->router->fetch_module() =='backend'){
		 		redirect(base_url('backend/login'),'refresh');
	 		}
		}
		elseif (!is_numeric($username)) {
		 	echo 'ID Number must be numeric';
		 	if($this->router->fetch_module() ==' frontend'){
		 		redirect(base_url(),'refresh');
		 		}
		 		elseif($this->router->fetch_module() =='backend'){
		 		redirect(base_url('backend/login'),'refresh');
	 		}
		 }
		else{
		 	if($this->aauth->login($username, $password, $remember = FALSE, $totp_code = NULL)){
		 		if($this->aauth->is_member('Default')){
		 			redirect(base_url('voter/'.$this->aauth->get_user()->name),'refresh');
		 		}
		 		else{
		 			// var_dump($this->aauth->get_user()->name);
		 			redirect(base_url('backend'),'refresh');
		 		}
		 	}
		 	// // var_dump($this->aauth->login($username, $password, $remember = FALSE, $totp_code = NULL));
		 	else{
		 		$error = $this->aauth->print_errors();
		 		if($this->router->fetch_module() ==' frontend'){
		 		redirect(base_url(),'refresh');
		 		}
		 		elseif($this->router->fetch_module() =='backend'){
		 		redirect(base_url('backend/login'),'refresh');
		 		}
			// var_dump($this->aauth->print_errors());
		 	
		 	}
		 }
	}

}

/* End of file Login.php */
/* Location: .//C/xampp/htdocs/beta/app/controllers/Login.php */