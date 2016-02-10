<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Candidates_Model
 *
 * @author Onuwa Nnachi Isaac <matrix4u2002@gmail.com>
 */
class Candidates_Model extends MY_Model{
    /**
     * This model's default database table. Automatically
     * guessed by pluralising the model name.
     */
    protected $_table = 'candidate';

    /**
     * This model's default primary key or unique identifier.
     * Used by the get(), update() and delete() functions.
     */
    protected $primary_key = 'id';
    
    /**
     * By default we return our results as objects. If we need to override
     * this, we can, or, we could use the `as_array()` and `as_object()` scopes.
     */
//    protected $return_type = 'array';
    /**
     * Support for soft deletes and this model's 'deleted' key
     */
    protected $soft_delete = FALSE;
    protected $soft_delete_key = 'deleted';
    protected $_temporary_with_deleted = FALSE;
    protected $_temporary_only_deleted = FALSE;

    // public $validate = array(
    //         'surname' => array( 'field' => 'surname', 
    //                'label' => 'Surname',
    //                'rules' => 'trim|required|xss_clean'
    //                 ),
    //         'firstname' => array( 'field' => 'firstname', 
    //                'label' => 'Firstname',
    //                'rules' => 'trim|required|xss_clean'
    //                ),
    //         'othername' => array( 'field' => 'othername', 
    //                'label' => 'Othername',
    //                'rules' => 'trim|required|xss_clean'
    //                ),
    //         'dateofbirth' => array( 'field' => 'dateofbirth', 
    //                'label' => 'Date Of Birth',
    //                'rules' => 'trim|required|xss_clean'
    //                ),
    //         'gender' => array( 'field' => 'gender', 
    //                'label' => 'Gender',
    //                'rules' => 'trim|required|xss_clean'
    //                ),
    //         'party' => array( 'field' => 'party', 
    //                'label' => 'Party',
    //                'rules' => 'trim|required|xss_clean'
    //                ),
    //         'education' => array( 'field' => 'education', 
    //                'label' => 'Education',
    //                'rules' => 'trim|required|xss_clean'
    //                ),
    //         'state' => array( 'field' => 'state', 
    //                'label' => 'State',
    //                'rules' => 'trim|required|xss_clean'
    //                ),
    //         'constituency' => array( 'field' => 'constituency', 
    //                'label' => 'Constituency',
    //                'rules' => 'trim|required|xss_clean'
    //                ),
    //         'phone' => array( 'field' => 'phone', 
    //                'label' => 'Phone Number',
    //                'rules' => 'trim|required|xss_clean'
    //                ),
    //         'email' => array (
    //                 'field' => 'email',
    //                 'label' => 'email',
    //                 'rules' => 'trim|required|valid_email|callback__unique_email|xss_clean'
    //         )
    //     );
       
    
    public function __construct() {
        parent::__construct();
    }
}
