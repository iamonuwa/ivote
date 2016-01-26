<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backend extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('theme');
		if(!$this->aauth->is_loggedin() || $this->aauth->is_member('Default')){
			redirect(base_url('backend/login'),'refresh');
		}
		$this->theme->set(get_current_theme('backend'));

	}

	public function login()
	{
		$this->theme->load_file('index');
	}

	public function index()
	{
		$data = '';
		$this->theme->set_data('welcome',$data);
	  	$this->theme->load(); 
	}

	public function base()
	{
		$this->page_title = 'iVoter Dash';
		$this->load->view('accounts/dashboard');
	}
	public function profile()
	{
		$this->load->view('profile/edit');
	}
	public function election_office()
	{
		$this->load->view('elections/offices/list');
	}
	public function election_voter_list()
	{
		$this->load->view('accounts/voters/list');
	}
	public function election_voter_registration()
	{
		$this->load->view('accounts/voters/add');
	}
	public function election_voter_modify()
	{
		$this->load->view('accounts/voters/edit');
	}
	public function election_account_list()
	{
		$this->load->view('accounts/staff/list');
	}
	public function election_account_locked()
	{
		$this->load->view('accounts/staff/blocked');
	}
	public function election_account_registration()
	{
		$this->load->view('accounts/staff/add');
	}
	public function election_account_modify()
	{
		$this->load->view('accounts/staff/edit');
	}
	public function election_account_permission_list()
	{
		$this->load->view('accounts/permissions/list');
	}
	public function election_account_permission_create()
	{
		$this->load->view('accounts/permissions/add');
	}
	public function election_account_permission_modify()
	{
		$this->load->view('accounts/permissions/edit');
	}
	public function election_account_role_list()
	{
		$this->load->view('accounts/groups/list');
	}
	public function election_account_role_create()
	{
		$this->load->view('accounts/groups/add');
	}
	public function election_account_role_modify()
	{
		$this->load->view('accounts/groups/edit');
	}
	public function election_candidates()
	{
		$this->load->view('elections/candidates/list');
	}
	public function election_settings()
	{
		$this->load->view('elections/settings');
	}
	public function election_political_party()
	{
		$this->load->view('elections/parties/list');
	}
	public function web_settings()
	{
		$this->load->view('web/settings');
	}
	public function logout()
	{
		$this->aauth->logout();
        redirect(base_url('backend/login'),'refresh');
	}

}

/* End of file Backend.php */
/* Location: .//C/xampp/htdocs/beta/modules/backend/controllers/Backend.php */