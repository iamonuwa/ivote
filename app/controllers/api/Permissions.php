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


class Permissions extends REST_Controller{

    public function __construct() {
        parent::__construct();
        $this->load->model('permissions_model');
    }
    
    public function index_get()
    {
        $id = $this->get('id');
        $permissions = $this->permissions_model->get_all();
        if ($id === NULL)
        {
            if ($permissions)
            {
                $this->response($permissions, REST_Controller::HTTP_OK);
            }
            else
            {
                $this->response([
                    'status' => FALSE,
                    'message' => 'No INEC Officer Profile found'
                ], REST_Controller::HTTP_NOT_FOUND);
            }
        }
        $permissions = $this->permissions_model->get_by('id', $id);
        $id = (int) $permissions;
        if (count($id) <= 0)
        {
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        }
        if (!empty($permissions))
        {
            foreach ($permissions as $key => $value)
            {
                                $permission[] = $value;
            }
        }
        if (!empty($permission))
        {
            $this->set_response($permission, REST_Controller::HTTP_OK);
        }
        else
        {
            $this->set_response([
                'status' => FALSE,
                'message' => 'No INEC Officier Profile found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function permtogroup()
    {
        $filter = json_decode(file_get_contents("php://input")); 
        $perm_id = $filter->perm_id;
        $group_id = $filter->group_id;
        // $create = $this->aauth->allow_group($perm_id, $group_id);
        var_dump($perm_id);
        // if($create){
        // $success = 'Permission '.$data['name'].' has been created';
        // $this->set_response($success, REST_Controller::HTTP_CREATED);            
        // }
        // else{
        // $error = 'An error has occured. Please try again later';
        //     $this->set_response($error, REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
        // }
        // var_dump($create);
    }

    public function index_post()
    {
        $filter = json_decode(file_get_contents("php://input")); 
        $data['name'] = $filter->name;
        $data['definition'] = $filter->description;
        $create = $this->permissions_model->insert($data);
        if($create){
        $success = 'Permission '.$data['name'].' has been created';
        $this->set_response($success, REST_Controller::HTTP_CREATED);            
        }
        else{
        $error = 'An error has occured. Please try again later';
            $this->set_response($error, REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
        }
        // var_dump($create);
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
        $delete = $this->permissions_model->delete_by('id',$id);
        if($delete){
            $success = 'Permission #'.$id.' has been deleted successfully';
            $this->set_response($success, REST_Controller::HTTP_OK); 
        }
        else{
            $error = 'An error has occured. Please try again later';
            $this->set_response($message, REST_Controller::HTTP_NO_CONTENT); // NO_CONTENT (204) being the HTTP response code
        }

        }
    }

    public function index_put($id, $name, $definition)
    {
        $data['name'] = str_replace("%20", " ", $name);
        $data['definition'] = str_replace("%20", " ", $definition);
        $update = $this->permissions_model->update($id, $data);
        if($update){
            $success = 'Permission '.$data['name'].' has been updated successfully';
            $this->set_response($success, REST_Controller::HTTP_OK); 
        }
        else{
            $error = 'Failed to Update';
            $this->set_response($error, REST_Controller::HTTP_BAD_REQUEST); 
        }
    }


}
