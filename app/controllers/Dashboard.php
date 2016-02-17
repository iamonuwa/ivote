<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('users_model');
	}

	public function getComputerName()
	{
		echo json_encode($this->user_agent->platform());
	}

	public function getBrowser()
	{
		echo json_encode($this->user_agent->browser());
	}
	public function getBrowserVersion()
	{
		echo json_encode($this->user_agent->version());
	}
	public function getIpAddress()
	{
		echo json_encode($this->input->ip_address());
	}
	public function reset($old, $new, $confirm)
	{
		// $pass = $this->aauth->hash_password($new, $this->aauth->get_user()->id, $type = 'login');
		// var_dump($new);

		if ($new != $confirm) {
			$error = "Password Mismatch";
			echo json_encode($error);
		}
		else{
			$db_password = $this->aauth->password_login($old, $this->aauth->get_user()->id);
			if($db_password == $this->aauth->hash_password($old,  $this->aauth->get_user()->id, $type = 'login')){
				$update = $this->aauth->update_pass($this->aauth->get_user()->id, $confirm);
				if($update){
					$success = "Password has been updated!";
					echo json_encode($success);
				}else{
					$error = "Failed to update password! Please try again later";
					echo json_encode($error);
				}
			}
			else{
				$error = $this->aauth->print_errors();
					echo json_encode($error);
			}
		}
	}
}

/* End of file Dashboard.php */
/* Location: .//C/xampp/htdocs/beta/app/controllers/Dashboard.php */