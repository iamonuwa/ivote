<?php


/**
 * Description of roles
 *
 * @author Onuwa Nnachi Isaac <matrix4u2002@gmail.com>
 */
class Roles extends REST_Controller{

    public function __construct() {
        parent::__construct();
        $this->load->model('roles_model');
    }
    
    public function index_get()
    {
        $id = $this->get('id');
        $roles = $this->roles_model->get_all();
        if ($id === NULL)
        {
            if ($roles)
            {
                $this->response($roles, REST_Controller::HTTP_OK);
            }
            else
            {
                $this->response([
                    'status' => FALSE,
                    'message' => 'No INEC Officer Profile found'
                ], REST_Controller::HTTP_NOT_FOUND);
            }
        }
        $roles = $this->roles_model->get_by('id', $id);
        $id = (int) $roles;
        if (count($id) <= 0)
        {
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        }
        if (!empty($roles))
        {
            foreach ($roles as $key => $value)
            {
                                $role[] = $value;
            }
        }
        if (!empty($role))
        {
            $this->set_response($role, REST_Controller::HTTP_OK);
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
        $data['definition'] = $filter->definition;
        $create = $this->roles_model->insert($data);
        if($create){
         $success = 'RBAC '.$data['name'].' has been Registered';
        $this->set_response($success, REST_Controller::HTTP_CREATED);            
        }
        else{
        $error = 'An Error has occured. Please try again later';
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
        $delete = $this->roles_model->delete_by('id',$id);
        if($delete){
            $success = 'Role #'.$id.' has been deleted successfully';
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
        $update = $this->roles_model->update($id, $data);
        if($update){
            $success = 'RBAC #'.$data['name'].' has been updated successfully';
            $this->set_response($success, REST_Controller::HTTP_OK); 
        }
        else{
            $error = 'Failed to Update';
            $this->set_response($error, REST_Controller::HTTP_BAD_REQUEST); 
        }
    }


}
