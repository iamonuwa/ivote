<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Voter extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('voters_model');
		if (!$this->ion_auth->logged_in()) {
			redirect(base_url(),'refresh');
		}

		$this->theme->set(get_current_theme('frontend'));
	}

	public function index()
	{
		// $this->theme->load_file('views/session/list');
		$data['candidates'] = json_decode(file_get_contents(base_url('api/candidates/')));
		$data['election'] = json_decode(file_get_contents(base_url('api/elections/')));
		$this->load->view('session/list', $data);
	}


}

/* End of file Voter.php */
/* Location: .//C/xampp/htdocs/beta/modules/frontend/controllers/Voter.php */