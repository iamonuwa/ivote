<?php


/**
 * Description of elections
 *
 * @author Onuwa Nnachi Isaac <matrix4u2002@gmail.com>
 */
class Elections extends REST_Controller{

    public function __construct() {
        parent::__construct();
        $this->load->model('election_model');
    }
    
    public function index_get()
    {
        $id = $this->get('id');
        $elections = $this->election_model->get_all();
        if ($id === NULL)
        {
            if ($elections)
            {
                $this->response($elections, REST_Controller::HTTP_OK);
            }
            else
            {
                $this->response([
                    'status' => FALSE,
                    'message' => 'No Election was found'
                ], REST_Controller::HTTP_NOT_FOUND);
            }
        }
        $elections = $this->election_model->get_by('id', $id);
        $id = (int) $elections;
        if (count($id) <= 0)
        {
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        }
        if (!empty($elections))
        {
            foreach ($elections as $key => $value)
            {
                                $election[] = $value;
            }
        }
        if (!empty($election))
        {
            $this->set_response($election, REST_Controller::HTTP_OK);
        }
        else
        {
            $this->set_response([
                'status' => FALSE,
                'message' => 'No Election was found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function active()
    {
        $elections = $this->election_model->get_by('is_active',1);
            if ($elections)
            {
                $this->response($elections, REST_Controller::HTTP_OK);
            }
            else
            {
                $this->response([
                    'status' => FALSE,
                    'message' => 'No Election has started'
                ], REST_Controller::HTTP_NOT_FOUND);
            }
    }

    public function index_post()
    {
        $filter = json_decode(file_get_contents("php://input")); 
        $data['title'] = $filter->title;
        $data['category'] = $filter->category;
        $data['election_date'] = $filter->election_date;
        $data['duration'] = $filter->duration;
        $data['created_by'] = $this->aauth->get_user()->name; 
        $data['date_created'] = date("F j, Y, g:i a", time());
        $save = $this->election_model->insert($data);
        if($save){
        $success = $data['title'].' election has been Created';
        $this->set_response($success, REST_Controller::HTTP_CREATED);            
        }
        else{
        $error = 'An Error has occured. Please try again later';
            $this->set_response($error, REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
        }
        // var_dump($filter->election_date);
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
            $delete = $this->election_model->delete_by('id',$id);
            if($delete){
                $success = 'Election #'.$id.' has been deleted successfully';
                $this->set_response($success, REST_Controller::HTTP_OK); 
            }
            else{
                $error = 'An error has occured. Please try again later';
                $this->set_response($message, REST_Controller::HTTP_NO_CONTENT); // NO_CONTENT (204) being the HTTP response code
            }

            }
        }

    public function index_put($id, $title, $category, $election_date, $duration)
    {
        $data['title'] = str_replace("%20", " ", $title);
        $data['category'] = $category;
        $data['election_date'] = $election_date;
        $data['duration'] = str_replace("%20", " ", $duration);
        $data['created_by'] = $this->aauth->get_user()->name;
        $update = $this->election_model->update($id, $data);
        if($update){
            $success = 'Election has been updated successfully';
            $this->set_response($success, REST_Controller::HTTP_OK); 
        }
        else{
            $error = 'Failed to Update';
            $this->set_response($error, REST_Controller::HTTP_BAD_REQUEST); 
        }
    }


}
