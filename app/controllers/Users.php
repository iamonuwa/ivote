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

	public function control_permission($item, $role)
	{
		var_dump($item);
		// $check = $this->aauth->allow_group($item, $role);
		// if ($check) {
		// 	echo json_decode("success","Permission has been assigned to Group");
		// }
		// else{
		// 	echo json_decode("error", $this->aauth->print_errors());
		// }
	}

}

/* End of file Users */
/* Location: .//C/xampp/htdocs/beta/app/controllers/Users */