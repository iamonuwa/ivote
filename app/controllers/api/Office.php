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


class Office extends REST_Controller{

    public function __construct() {
        parent::__construct();
        $this->load->model('office_model');
    }
    
    public function index_get()
    {
        $id = $this->get('id');
        $offices = $this->office_model->get_all();
        if ($id === NULL)
        {
            if ($offices)
            {
                $this->response($offices, REST_Controller::HTTP_OK);
            }
            else
            {
                $this->response([
                    'status' => FALSE,
                    'message' => 'No INEC Officer Profile found'
                ], REST_Controller::HTTP_NOT_FOUND);
            }
        }
        $offices = $this->office_model->get_by('id', $id);
        $id = (int) $offices;
        if (count($id) <= 0)
        {
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        }
        if (!empty($offices))
        {
            foreach ($offices as $key => $value)
            {
                                $office[] = $value;
            }
        }
        if (!empty($office))
        {
            $this->set_response($office, REST_Controller::HTTP_OK);
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
        $filter = json_decode(file_get_contents("php://input")); 
        $data['name'] = $filter->name;
        $data['officer'] = $this->aauth->get_user()->name;
        $data['date_created'] = date("F j, Y, g:i a");

        if(!empty($filter->name)){
        $save = $this->office_model->insert($data);
       if($save){
        $success = 'Office has been Registered';
        $this->set_response($success, REST_Controller::HTTP_CREATED);            
        }
        else{
        $error = 'An Error has occured. Please try again later';
            $this->set_response($error, REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
        else{
        $error = 'Office Name must be specifed';
        $this->set_response($error, REST_Controller::HTTP_BAD_REQUEST);
    }

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
            $success = 'Office #'.$id.' has been deleted successfully';
            $this->set_response($success, REST_Controller::HTTP_OK); 
        }
        else{
            $error = 'An error has occured. Please try again later';
            $this->set_response($message, REST_Controller::HTTP_NO_CONTENT); // NO_CONTENT (204) being the HTTP response code
        }

        }
    }

    public function index_put($id, $name)
    {
        $data['name'] = $name;
        $update = $this->office_model->update($id, $data);
        if($update){
            $success = 'Office #'.$id.' has been updated successfully';
            $this->set_response($success, REST_Controller::HTTP_OK); 
        }
        else{
            $error = 'Failed to Update';
            $this->set_response($error, REST_Controller::HTTP_BAD_REQUEST); 
        }
    }

}
