<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Frontend extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('election_model');
		$this->theme->set(get_current_theme('frontend'));
	}

	public function index()
	{
		
		if ($this->ion_auth->logged_in()) {
			redirect(base_url('voter'),'refresh');
		}
		$data['election'] = $this->election_model->get_by('is_active',1);
		$this->load->view('index', $data);
	}

	public function contact()
	{
		$this->theme->load_file('views/pages/contact');
	}

	public function about()
	{
		$this->theme->load_file('views/pages/about');
	}

	public function voter_education()
	{
		$this->theme->load_file('views/pages/voter-education');
	}

	public function political_parties()
	{
		$this->theme->load_file('views/pages/parties');
	}

	public function elections()
	{
		$this->theme->load_file('views/pages/election');
	}
	public function logout()
	{
		$logout = $this->ion_auth->logout();
		$this->session->set_flashdata('message', $this->ion_auth->messages());
		redirect(base_url(), 'refresh');
	}
}

/* End of file Frontend.php */
/* Location: .//C/xampp/htdocs/beta/modules/frontend/controllers/Frontend.php */