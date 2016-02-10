<?php

if (!function_exists('encrypt_voter')) {
	 function encrypt_voter($voter_id)
	{
		$CI =& get_instance();
		$CI->load->library('encrypt');
		$CI->encrypt->set_mode(MCRYPT_MODE_CFB);	
		$CI->encrypt->set_cipher(MCRYPT_BLOWFISH);
		return $CI->encrypt->encode($voter_id);
	}
}

if (!function_exists('decrypt_voter')) {
	function decrypt_voter($voter_id)
	{
		$CI =& get_instance();
		$CI->load->library('encrypt');
		$CI->encrypt->set_mode(MCRYPT_MODE_CFB);
		$CI->encrypt->set_cipher(MCRYPT_BLOWFISH);	
		return $CI->encrypt->decode($voter_id);
	}
}