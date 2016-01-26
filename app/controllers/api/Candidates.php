<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Candidates
 *
 * @author Onuwa Nnachi Isaac <matrix4u2002@gmail.com>
 */
class Candidates extends REST_Controller{

    public function __construct() {
        parent::__construct();
        $this->load->model('candidates_model');
    }
    
    public function index_get()
    {
        $id = $this->get('id');
        $users = $this->candidates_model->get_all();
        if ($id === NULL)
        {
            if ($users)
            {
                $this->response($users, REST_Controller::HTTP_OK);
            }
            else
            {
                $this->response([
                    'status' => FALSE,
                    'message' => 'No Candidate Profile found'
                ], REST_Controller::HTTP_NOT_FOUND);
            }
        }
        $users = $this->candidates_model->get_by('id', $id);
        $id = (int) $users;
        if (count($id) <= 0)
        {
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        }
        if (!empty($users))
        {
            foreach ($users as $key => $value)
            {
                                $user[] = $key.':'.$value;
            }
        }
        if (!empty($user))
        {
            $this->set_response($user, REST_Controller::HTTP_OK);
        }
        else
        {
            $this->set_response([
                'status' => FALSE,
                'message' => 'No Candidate Profile found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function index_post()
    {
//         $email = 'admin@admin.com';
//         $pass = '123456';
//         $name = '15286';
//         $this->auth->create_user($email, $pass, $name);
        $message = [
             'email' => 'i_onuwa4u@outlook.com',
                'pass' => 'Beautiful4u',
                        'name' => '15286'
        ];

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
            $success = 'Candidate #'.$id.' has been deleted successfully';
            $this->set_response($success, REST_Controller::HTTP_OK); 
        }
        else{
            $error = 'An error has occured. Please try again later';
            $this->set_response($message, REST_Controller::HTTP_NO_CONTENT); // NO_CONTENT (204) being the HTTP response code
        }

        }
    }

}

