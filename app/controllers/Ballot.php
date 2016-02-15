<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ballot extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model(array('ballot_model','election_model','voters_model'));
		
	}

	public function index()
	{
		 if ($this->input->post()) {
		 	$id = $this->session->userdata('id');
			$voter_pin = $this->voters_model->get($id);
            $data['voter_id'] = $this->bcrypt->hash($id);
            $data['candidate_id'] = $this->input->post('radio');
         if($data['pin'] == ""){
        	$error = 'Voter PIN cannot be empty';
	    	$this->session->set_flashdata('msg', $error);  
         	redirect(base_url(),'refresh');
         }
         if($data['pin'] != $voter_pin[''])
	    if($data['candidate_id'] == "") {
        	$error = 'No Canidate was selected';
	    	$this->session->set_flashdata('msg', $error);    
			redirect(base_url(),'refresh');
	    } 
        $vote = $this->ballot_model->insert($data);
        // if ($vote) {
        $success = 'Your Vote has been recorded. You will logged out permanently from this system.';
        // $logout = $this->ion_auth->logout();
        $banned = $this->voters_model->delete_by($id, array('id'=>$id));
        if($banned && $this->ion_auth->logout()){
		$this->session->set_flashdata('success', $success);
		redirect(base_url(), 'refresh');
			}
		}
        // }
        else{
        $error = 'You have not voted for candidate';
        redirect(base_url(),'refresh');
        $this->session->set_flashdata('msg', $error); 
        }
	}

}

/* End of file Ballot.php */
/* Location: .//C/xampp/htdocs/beta/app/controllers/Ballot.php */