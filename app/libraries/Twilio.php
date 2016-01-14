<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/**
	* Name:  Twilio
	*
	* Author: Ben Edmunds
	*		  ben.edmunds@gmail.com
	*         @benedmunds
	*
	* Location:
	*
	* Created:  03.29.2011
	*
	* Description:  Modified Twilio API classes to work as a CodeIgniter library.
	*               Added additional helper methods.
	*               Original code and copyright are below.
	*
	*
	*/

require APPPATH.'libraies/sms/services/twilio.php';
class Twilio
{
   public function __construct()
   {
       parent::__construct();
   }
}