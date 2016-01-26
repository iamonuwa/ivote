<?php


/**
 * Description of Ballot
 *
 * @author Onuwa Nnachi Isaac <matrix4u2002@gmail.com>
 */
class Ballot extends REST_Controller{

    public function __construct() {
        parent::__construct();
        $this->load->model(array('ballot_model','election_model'));
    }
    
    public function index_get()
    {
        $id = $this->get('id');
        $ballots = $this->ballot_model->get_all();
        if ($id === NULL)
        {
            if ($ballots)
            {
                $this->response($ballots, REST_Controller::HTTP_OK);
            }
            else
            {
                $this->response([
                    'status' => FALSE,
                    'message' => 'No INEC Officer Profile found'
                ], REST_Controller::HTTP_NOT_FOUND);
            }
        }
        $ballots = $this->ballot_model->get_by('id', $id);
        $id = (int) $ballots;
        if (count($id) <= 0)
        {
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        }
        if (!empty($ballots))
        {
            foreach ($ballots as $key => $value)
            {
                                $ballot[] = $value;
            }
        }
        if (!empty($ballot))
        {
            $this->set_response($ballot, REST_Controller::HTTP_OK);
        }
        else
        {
            $this->set_response([
                'status' => FALSE,
                'message' => 'No INEC Officier Profile found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function index_post($message)
    {
//         $email = 'admin@admin.com';
//         $pass = '123456';
//         $name = '15286';
//         $this->auth->create_ballot($email, $pass, $name);
        // $message = [
        //      'email' => 'i_onuwa4u@outlook.com',
        //         'pass' => 'Beautiful4u',
        //                 'name' => '15286'
        // ];

        $this->set_response($message, REST_Controller::HTTP_CREATED);
    }

    public function index_delete($id)
    {
        // $id = $this->get('id');
        $id = (int) $id;
        // var_dump($id);
        if ($id <= 0)
        {
            $error = 'Failed to Delete';
            $this->response($error, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
        }
        else{
        $delete = $this->office_model->delete_by('id',$id);
        if($delete){
            $success = 'Ballot #'.$id.' has been deleted successfully';
            $this->set_response($success, REST_Controller::HTTP_OK); 
        }
        else{
            $error = 'An error has occured. Please try again later';
            $this->set_response($message, REST_Controller::HTTP_NO_CONTENT); // NO_CONTENT (204) being the HTTP response code
        }

        }
    }
}
