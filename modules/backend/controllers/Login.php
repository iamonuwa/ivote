<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$this->theme->set(get_current_theme('backend'));
		$this->theme->load_file('index');
	}
}

/* End of file Login.php */
/* Location: .//C/xampp/htdocs/beta/modules/backend/controllers/Login.php */