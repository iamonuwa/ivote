<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Ballot_Model extends MY_Model {

	/**
     * This model's default database table. Automatically
     * guessed by pluralising the model name.
     */
    protected $_table = 'ballot';

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

	public function __construct()
	{
		parent::__construct();
	}

}

/* End of file Ballot_Model.php */
/* Location: ./application/models/Ballot_Model.php */
