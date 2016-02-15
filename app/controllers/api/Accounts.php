<?php


/***
 *
 The MIT License (MIT)

Copyright (c) 2016 ONUWA NNACHI ISAAC

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.


 */


class Accounts extends REST_Controller{

    public function __construct() {
        parent::__construct();
        $this->load->model('users_model');
    }
    
    public function index_get()
    {
        $id = $this->get('id');
        $users = $this->aauth->list_users($group_par = FALSE, $limit = FALSE, $offset = FALSE, $include_banneds = FALSE);
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

    public function index_post()
    {
        
        $data = json_decode(file_get_contents("php://input")); 
        $surname = $data->surname;
        $firstname = $data->firstname;
        $othername = $data->othername;
        $dateofbirth = $data->dateofbirth;
        $gender = $data->gender;
        $phone = phone_helper($data->phone);
        $occupation = $data->occupation;
        $email = $data->email;
        $pass = generateStrongPassword($length = 9, $add_dashes = false, $available_sets = 'luds');
        $name = $data->name;
        $picture = $data->picture;
        if(empty($data->surname)){
            $error = 'Surnname is required';
            $this->set_response($error, REST_Controller::HTTP_BAD_REQUEST);
        }
        $create = $this->aauth->create_user($surname, $firstname, $othername, $dateofbirth, $gender, $phone, $occupation,$email, $pass, $name, $picture);
        if($create){
        $success = 'Account Has Been Created';
        $this->set_response($success, REST_Controller::HTTP_CREATED);            
        $message = "Your Login Details are: \n LoginID: ".$name." \n Login Password: ".$pass;
        // sms($phone, $message);
        }
        else{
        $error = $this->aauth->print_errors();
            $this->set_response($error, REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
        }
        // var_dump($create);
    }

    public function index_delete($id)
    {
        // $id = $this->get('id');
        $id = (int) $id;
        // var_dump($id);
        if($id == $this->aauth->get_user()->id){
             $error = 'You cannot not block yourself';
            $this->response($error, REST_Controller::HTTP_UNAUTHORIZED); // BAD_REQUEST (400) being the HTTP response code
        }
        if ($id <= 0)
        {
            $error = 'Failed to Ban';
            $this->response($error, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
        }
        else{
        $delete = $this->aauth->ban_user($id);
        if($delete){
            $success = 'Staff Account has been blocked successfully';
            $this->set_response($success, REST_Controller::HTTP_OK); 
        }
        else{
            $error = 'An error has occured. Please try again later';
            $this->set_response($message, REST_Controller::HTTP_NO_CONTENT); // NO_CONTENT (204) being the HTTP response code
        }

        }
    }

    public function index_put($id, $surname, $firstname, $othername, $dateofbirth, $gender, $phone)
    {
        $data['surname'] = trim(e($surname));
        $data['firstname'] = trim(e($firstname));
        $data['othername'] = trim(e($othername));
        $data['dateofbirth'] = trim(e($dateofbirth));
        $data['gender'] = trim(e($gender));
        $data['phone'] = trim(e($phone));
        // $update = $this->aauth->update_user($id, $surname, $firstname, $othername, $dateofbirth, $gender, $phone);
        $update = $this->users_model->update($id, $data);
        if($update){
            $success = $this->aauth->get_user()->name.' account has been updated successfully';
            $this->set_response($success, REST_Controller::HTTP_OK); 
            }
        else{
            $error = 'Failed to Update';
            $this->set_response($error, REST_Controller::HTTP_NOT_MODIFIED); 
        }
    }

}
