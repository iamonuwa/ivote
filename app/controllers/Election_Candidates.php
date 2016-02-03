<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Election_Candidates extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('state_model');
	}

	public function getState()
	{
		echo json_encode($this->state_model->get_all());
	}

	public function getLGAByState($state_id)
	{
		echo json_encode($this->lga_model->get_many_by('state_id',$state_id));
	}

}

/* End of file Election_Candidates.php */
/* Location: .//C/xampp/htdocs/beta/app/controllers/Election_Candidates.php */