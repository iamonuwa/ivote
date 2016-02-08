<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	// public function index()
	// {
	// 	$name = 'matrix4u';
	// 	$email = 'matrix4u2002@gmail.com';
	// 	$pass = 'Beautiful4u';
	// 	$create = $this->aauth->create_user($email, $pass, $name);
	// 	var_dump($create);
	// }

	public function test()
	{
		$this->load->driver('cache');
		var_dump($this->cache->cache_info());
	}
}

/* End of file Test.php */
/* Location: .//C/xampp/htdocs/beta/modules/backend/controllers/Test.php */