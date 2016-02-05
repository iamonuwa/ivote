<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
	}

	public function currentUser()
	{
		echo json_encode($this->aauth->get_user());
	}

	public function getCurrentRole()
	{
		echo json_encode('Admin');
	}

	public function editUser()
	{
		$id = $this->aauth->get_user()->id;
		// $this->aauth->update_user()
		var_dump('Edit Profile');
	}

}

/* End of file Users */
/* Location: .//C/xampp/htdocs/beta/app/controllers/Users */