<?php


/**
 * Description of Users
 *
 * @author Onuwa Nnachi Isaac <matrix4u2002@gmail.com>
 */
class Voters extends REST_Controller{

    public function __construct() {
        parent::__construct();
        $this->load->model('users_model');
    }
    
    public function index_get()
    {
        $id = $this->get('id');
        $users = $this->aauth->list_users('Default');
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
                    'message' => 'No INEC Officer Profile found'
                ], REST_Controller::HTTP_NOT_FOUND);
            }
        }
        $users = $this->users_model->get_by('id', $id);
        $id = (int) $users;
        if (count($id) <= 0)
        {
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        }
        if (!empty($users))
        {
            foreach ($users as $key => $value)
            {
                                $user[] = $value;
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
                'message' => 'No INEC Officier Profile found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function index_post($message)
    {
//         $email = 'admin@admin.com';
//         $pass = '123456';
//         $name = '15286';
//         $this->auth->create_user($email, $pass, $name);
        // $message = [
        //      'email' => 'i_onuwa4u@outlook.com',
        //         'pass' => 'Beautiful4u',
        //                 'name' => '15286'
        // ];

        $this->set_response($message, REST_Controller::HTTP_CREATED);
    }

    public function index_delete()
    {
        $id = $this->get('id');
        $id = (int) $id;
        if ($id <= 0)
        {
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
        }
        else{
        $this->users_model->delete_by('id',$id);
        $message = [
            'id' => $id,
            'message' => 'Deleted the resource'
        ];

        $this->set_response($message, REST_Controller::HTTP_NO_CONTENT); // NO_CONTENT (204) being the HTTP response code
        }
    }

}
