<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

	public function index()
	{
		$name = 'matrix4u';
		$email = 'matrix4u2002@gmail.com';
		$pass = 'Beautiful4u';
		$create = $this->aauth->create_user($email, $pass, $name);
		var_dump($create);
	}

}

/* End of file Test.php */
/* Location: .//C/xampp/htdocs/beta/modules/backend/controllers/Test.php */