<?php

/**
 * Description of Users_model
 *
 * @author Onuwa Nnachi Isaac <matrix4u2002@gmail.com>
 */
class Voters_model extends MY_Model{

    /**
     * This model's default database table. Automatically
     * guessed by pluralising the model name.
     */
    protected $_table = 'aauth_voters';

    /**
     * This model's default primary key or unique identifier.
     * Used by the get(), update() and delete() functions.
     */
    protected $primary_key = 'id';
    
    /**
     * Support for soft deletes and this model's 'deleted' key
     */
    protected $soft_delete = FALSE;
    protected $soft_delete_key = 'banned';
    protected $_temporary_with_deleted = FALSE;
    protected $_temporary_only_deleted = FALSE;
    
    protected $after_get = array('remove_sensitive_data');
    
    /**
     * By default we return our results as objects. If we need to override
     * this, we can, or, we could use the `as_array()` and `as_object()` scopes.
     */
    protected $return_type = 'array';
    protected $_temporary_return_type = NULL;
    
    public function __construct() {
        parent::__construct();
    }
    
    public function remove_sensitive_data($param) {
    unset($param['pass']);
    unset($param['banned']);
    unset($param['deleted']);
    // unset($param['last_login']);
    unset($param['last_activity']);
    unset($param['last_login_attempt']);
    unset($param['forgot_exp']);
    unset($param['remember_time']);
    unset($param['remember_exp']);
    unset($param['verification_code']);
    unset($param['totp_secret']);
    unset($param['ip_address']);
    unset($param['login_attempts']);
    return $param;
    }
}
