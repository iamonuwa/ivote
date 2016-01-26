<?php


/**
 * Description of parties
 *
 * @author Onuwa Nnachi Isaac <matrix4u2002@gmail.com>
 */
class Parties extends REST_Controller{

    public function __construct() {
        parent::__construct();
        $this->load->model('party_model');
    }
    
    public function index_get()
    {
        $id = $this->get('id');
        $parties = $this->party_model->get_all();
        if ($id === NULL)
        {
            if ($parties)
            {
                $this->response($parties, REST_Controller::HTTP_OK);
            }
            else
            {
                $this->response([
                    'status' => FALSE,
                    'message' => 'No INEC Officer Profile found'
                ], REST_Controller::HTTP_NOT_FOUND);
            }
        }
        $parties = $this->party_model->get_by('id', $id);
        $id = (int) $parties;
        if (count($id) <= 0)
        {
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        }
        if (!empty($parties))
        {
            foreach ($parties as $key => $value)
            {
                                $party[] = $value;
            }
        }
        if (!empty($party))
        {
            $this->set_response($party, REST_Controller::HTTP_OK);
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
        $data['slug'] = $filter->slug;
        $data['description'] = $filter->definition;
        $data['picture'] = $filter->picture;
        $data['date_created'] = date("F j, Y, g:i a");
        $data['officer'] = $this->aauth->get_user()->name;
        $save = $this->party_model->insert($data);
        if($save){
        $success = 'Party has been Registered';
        $this->set_response($success, REST_Controller::HTTP_CREATED);            
        }
        else{
        $error = 'An Error has occured. Please try again later';
            $this->set_response($error, REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
        }
        // var_dump($filter->party_name);
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
            $delete = $this->party_model->delete_by('id',$id);
            if($delete){
                $success = 'Party #'.$id.' has been deleted successfully';
                $this->set_response($success, REST_Controller::HTTP_OK); 
            }
            else{
                $error = 'An error has occured. Please try again later';
                $this->set_response($message, REST_Controller::HTTP_NO_CONTENT); // NO_CONTENT (204) being the HTTP response code
            }

            }
        }

    public function index_put($id, $name, $slug, $description)
    {
        $data['name'] = str_replace("%20", " ", $name);
        $data['slug'] = str_replace("%20", " ", $slug);
        $data['description'] = str_replace("%20", " ", $description);
        $data['officer'] = $this->aauth->get_user()->name;
        $update = $this->party_model->update($id, $data);
        if($update){
            $success = 'Party #'.$data['name'].' has been updated successfully';
            $this->set_response($success, REST_Controller::HTTP_OK); 
        }
        else{
            $error = 'Failed to Update';
            $this->set_response($error, REST_Controller::HTTP_BAD_REQUEST); 
        }
    }


}
