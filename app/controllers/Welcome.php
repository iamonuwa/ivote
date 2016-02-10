<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// require APPPATH.'controllers/sms/services/twilio.php';
class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
		// var_dump($this->aauth->list_perms());

		// var_dump($this->aauth->allow_group('Admin','Demo'));
		// var_dump($this->aauth->control('Demo'));
		// var_dump($this->aauth->control());
		if ($this->aauth->control() == FALSE) {
			echo 'Na true';
		}
		else{
			echo "SHuuu";
		}
	}

	public function test()
	{
	$fields = array(
	    'id'   => 'S/N',
	    'surname' => 'SURNAME',
	    'firstname'=>'FIRSTNAME',
	    'othername'=>'OTHERNAME',
	    'dateofbirth'=>'DATE OF BIRTH',
	    'gender'=>'SEX',
	    'phone' => 'PHONE NUMBER',
	    'occupation'=> 'UNIT',
	    'picture' => FALSE,
	    'email'  => 'EMAIL ADDRESS',
	    'name' => 'ID NUMBER',
	    'last_login' => 'LAST LOGIN'
	);
		$query = array();

$query = json_decode(file_get_contents(base_url('api/accounts')));
		// $query = $this->aauth->list_users($group_par = FALSE, $limit = FALSE, $offset = FALSE, $include_banneds = FALSE);
echo arrayToExcel($query, $fields, "Users");

// 		$data['title'] = "Annual Report"; // it can be any variable with content that the code will use

// $fileName = date('YmdHis') . "_report";
// $pdfView  = $this->load->view('pdf_template/pdf_template', $data, TRUE); // we need to use a view as PDF content
// $cssView  = $this->load->view('pdf_template/pdf_template_css', NULL, TRUE); // the use a css stylesheet is optional

// exportPDF($fileName, $pdfView, $cssView, 'P'); // then define the content and filename

		// $this->load->library('test');

		// echo $this->test->index();
	
	}


public function demo()
{
	echo decrypt_voter('7EKnCORRjWgn');
}
}
// 1453839627