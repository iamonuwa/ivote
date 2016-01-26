<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Voter extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->aauth->is_loggedin()) {
			redirect(base_url(),'refresh');
		}
		$this->theme->set(get_current_theme('frontend'));
	}

	public function index()
	{
		$this->theme->load_file('views/session/list');
	}

}

/* End of file Voter.php */
/* Location: .//C/xampp/htdocs/beta/modules/frontend/controllers/Voter.php */