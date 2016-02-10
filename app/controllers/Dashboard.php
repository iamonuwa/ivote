<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
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
	function test()
	{
		echo $this->user_agent();
	}
}

/* End of file Dashboard.php */
/* Location: .//C/xampp/htdocs/beta/app/controllers/Dashboard.php */