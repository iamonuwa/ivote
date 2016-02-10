<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* theme Helper
* Auther: Joe Parihar
*/

  if (!function_exists('get_current_theme')){
    function get_current_theme(){
      $CI =& get_instance();
      $CI->session->unset_userdata('preview_theme');
      $CI->load->database();
      $query=$CI->db->get_where('themes',array('is_active'=>1, 'type' => $CI->router->fetch_module()));
      if($query->num_rows()>0)
        return trim($query->row()->dir_path);
      else
        return FALSE; //return 'default';     
    }
  }

  if (!function_exists('get_preview_theme')){
    function get_preview_theme($id=''){
      $CI =& get_instance();
      $CI->load->database();
      $query=$CI->db->get_where('themes',array('id'=>$id));
      if($query->num_rows()>0)
        return trim($query->row()->dir_path);
      else
        return FALSE; //return 'default';     
    }
  }

  if (!function_exists('get_header')){
    function get_header($name=null){
      $CI =& get_instance();
      return $CI->theme->get_header($name);
    }
  }

  if (!function_exists('get_sidebar')){
    function get_sidebar($name=null){
      $CI =& get_instance();
      return $CI->theme->get_sidebar($name);
    }
  }

  if (!function_exists('get_footer')){
    function get_footer($name=null){
      $CI =& get_instance();
      return $CI->theme->get_footer($name);
    }
  }

  if (!function_exists('get_theme_part')){
    function get_theme_part($slug, $name=null){
      $CI =& get_instance();
      return $CI->theme->get_theme_part($slug, $name);
    }
  }

  if (!function_exists('get_theme_directory_uri')){
    function get_theme_directory_uri(){
      $CI =& get_instance();
      return $CI->theme->get_current_theme_part();
    }
  }

  if (!function_exists('theme_path')){
    function theme_path($filename=''){  
      $CI =& get_instance(); 
      if( $CI->session->userdata('preview_theme'))
        echo base_url().'public_html/themes/'. $CI->session->userdata('preview_theme').'/'.$filename;
        else  
        echo base_url().'public_html/themes/'.get_current_theme().'/'.$filename;
    }
  }

  if (!function_exists('app_version')) {
    function app_version()
    {
      if(is_null(VERSION)){
        return FALSE;
      }else{
        return VERSION;
      }
    }
  }

  if (!function_exists('copyright')) {
    function copyright()
    {
        if(is_null(COPYRIGHT)){
        return FALSE;
      }else{
        return  "<strong>Copyright &copy;".date('Y')." ".COPYRIGHT." </strong> All rights reserved.";
      }
    }
  }

?>