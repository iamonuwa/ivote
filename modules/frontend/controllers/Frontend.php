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
		
		if ($this->aauth->is_loggedin()) {
			redirect(base_url('voter/'.$this->aauth->get_user()->name),'refresh');
		}
		$data['election'] = $this->election_model->get_by('is_active',1);
		$this->theme->set_data('index',$data);
	  	$this->theme->load(); 
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
		if($this->aauth->logout()){
        redirect(base_url(),'refresh');
	    }
	}
}

/* End of file Frontend.php */
/* Location: .//C/xampp/htdocs/beta/modules/frontend/controllers/Frontend.php */