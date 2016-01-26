<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Template Library
* Auther: Joe Parihar
*/

class Theme{
  private $CI;
  private $tp_name;
  private $data = array();
  protected $_ci_view_paths = array();
  protected $_ci_cached_vars = array();

  public function __construct(){
    $this->CI = &get_instance();

    $this->CI->theme_table_name='themes';
   
    $this->CI->destination_path = './public_html/themes/';
    $this->CI->_ci_ob_level  = ob_get_level();
    $this->CI->_ci_view_paths = array($this->CI->destination_path => TRUE); 

    $this->_create_theme_table();
  }

  private function _create_theme_table(){
    $this->CI->load->database();
    $this->CI->load->dbforge();
    $fields = array(
                'id'          =>  array('type' => 'INT','constraint' => 11,'auto_increment' => TRUE),
                'theme_name'  =>  array('type' => 'VARCHAR','constraint' => 50),
                'dir_path'    =>  array('type' => 'VARCHAR','constraint' => 255),
                'logo'        =>  array('type' => 'VARCHAR','constraint' => 255),
                'description' =>  array('type' => 'VARCHAR','constraint' => 255),
                'is_active'   =>  array('type' => 'INT','constraint' => 2, 'default' => 0)               
                  );
    $this->CI->dbforge->add_field($fields);
    $this->CI->dbforge->add_key('id', TRUE);
    $this->CI->dbforge->create_table($this->CI->theme_table_name, TRUE);    
  }

  public function upload_theme(){   
    $file_name = $_FILES['theme']['name'];
    $error_code=$_FILES['theme']['error'];
   
    $extenstion=end(explode('.', $file_name));
    
      if($extenstion==''){
        $this->CI->session->set_flashdata('theme_error_msg','Please select a file.');
        return FALSE;
      }else if($this->check_theme_exist($file_name)===FALSE){
        $this->CI->session->set_flashdata('theme_error_msg','Theme Already Exist.');
        return FALSE;
      }else if($extenstion!='zip'){
        $this->CI->session->set_flashdata('theme_error_msg','Please upload only zip file.');
        return FALSE;
      }else if($error_code>0){              
         
            switch ($error_code) { 
              case 1: 
                  $message = "The uploaded file exceeds the upload_max_filesize directive in php.ini"; 
                  break; 
              case 2: 
                  $message = "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form"; 
                  break; 
              case 3: 
                  $message = "The uploaded file was only partially uploaded"; 
                  break; 
              case 4: 
                  $message = "No file was uploaded"; 
                  break; 
              case 6: 
                  $message = "Missing a temporary folder"; 
                  break; 
              case 7: 
                  $message = "Failed to write file to disk"; 
                  break; 
              case 8: 
                  $message = "File upload stopped by extension"; 
                  break;
              default: 
                  $message = "Unknown upload error"; 
                  break; 
              } 

          $this->CI->session->set_flashdata('theme_error_msg', $message);
          return FALSE;
          
          

      }else if(move_uploaded_file($_FILES['theme']['tmp_name'], $this->CI->destination_path.$file_name)){
          return $this->_unzip($file_name);
                   
      }    
  }

  private function _unzip($file_name=''){
    $zip = new ZipArchive;
    $this->CI->file=$this->CI->destination_path.$file_name;
    if($zip->open($this->CI->file)===TRUE):
      $remove_file_ext =explode('.zip', $file_name);       
      $zip->extractTo($this->CI->destination_path.$remove_file_ext[0]);
      $zip->close();
      // delete zip file
      $this->_delete_zip_file($file_name);     
      // check directory exist or not
      $this->directorys_exist($file_name); 
     // $this->save_to_db(array('theme_name'=>'app'));
      $this->read_theme_name($file_name);     
      return TRUE;
    else:
      return FALSE;
    endif;
  }

  function read_theme_name($file_name=''){
    $remove_file_ext =explode('.zip', $file_name);   
    $this->CI->load->helper('file');  
    $string = read_file($this->CI->destination_path.$remove_file_ext[0].'/readme.txt');  
   
    $s=explode("\n",  $string);  
    for ($i=0; $i < count($s) ; $i++) { 
      $ss=explode(":",$s[$i]);
      for ($i=0; $i < count($ss); $i++) { 
        if(trim($ss[$i])=='THEME_NAME'){
          $theme_name = $ss[$i+1];
          return $this->save_to_db(array('theme_name'=>$theme_name,'dir_path'=>$remove_file_ext[0]));
        }else{
          return FALSE;
        }
      }
    }
  }

  public function check_theme_exist($theme_name=''){
    $this->CI->load->database();
    $remove_file_ext =explode('.zip', $theme_name);
    $query=$this->CI->db->get_where($this->CI->theme_table_name,array('dir_path'=> $remove_file_ext[0])); 
    if($query->num_rows()>0)
      return FALSE;
    else
      return TRUE;
  }

 /* function test(){
    $file_with_path="./application/views/themes/test.zip";
  
    if(is_file($file_with_path)){
      echo "YES";
    }else{
      echo "NO";
    }
     if(@unlink($file_with_path)){ 
        return TRUE; 
       // echo "deleted";
      }else{
      //  echo "FAils"; 
          return FALSE; 
      }
  }*/

  private function _delete_zip_file($file_name=''){
    if(!empty($file_name)){
       $remove_file_ext =explode('.zip', $file_name);
      $file_with_path = './'.$this->CI->destination_path.$file_name;
      if(@unlink($file_with_path)){ 
        return TRUE; 
       // echo "deleted";
      }else{
        //echo "FAils"; 
          return FALSE; 
           }
     
     }  
    
  }

  public function delete_theme($dir, $deleteRootToo=FALSE){      
    if(!$dh = @opendir($dir)){
      return FALSE;
    }
    while (FALSE !== ($obj = readdir($dh))){
      if($obj == '.' || $obj == '..') {
        continue;
      }

      if (!@unlink($dir . '/' . $obj)){
        $this->delete_theme($dir.'/'.$obj, TRUE);
      }
    }

    closedir($dh);

    if ($deleteRootToo){
      @rmdir($dir);
    }
    return TRUE;  
  }

  public function directorys_exist($file_name=''){
     // chek folder or  file exist  
    $remove_file_ext = explode('.zip', $file_name);
    $src_path=$this->CI->destination_path.$remove_file_ext[0].'/';
    $glob=glob($src_path.'*', GLOB_MARK);
    $count_glob=count($glob);   
    if($count_glob===1){     
      $src_path_subpath=$src_path.$remove_file_ext[0].'/';     
      // compy all files and folders to back folder
      $this->copy_directorys_files($src_path_subpath,$src_path);       
      // delete files and folders
      $this->delete_theme($src_path_subpath, $deleteRootToo=TRUE);
    }
  }

  public function copy_directorys_files($source, $destination) {
    if ( is_dir( $source ) ) {
      @mkdir( $destination );
      $directory = dir( $source );
      while ( FALSE !== ( $readdirectory = $directory->read() ) ) {
          if ( $readdirectory == '.' || $readdirectory == '..' ) {
              continue;
          }
          $PathDir = $source . '/' . $readdirectory; 
          if ( is_dir( $PathDir ) ) {
              $this->copy_directorys_files( $PathDir, $destination . '/' . $readdirectory );
              continue;
          }
          copy( $PathDir, $destination . '/' . $readdirectory );
      }
      $directory->close();
      }else {
        copy( $source, $destination );
      }  
  }


  public function save_to_db($data){    
    if(isset($data['theme_name']) && isset($data['dir_path']))     
        return $this->CI->db->insert($this->CI->theme_table_name,$data);
    else
      return FALSE;           
  } 

  /*public function update_to_db($id,$data){
    return $this->CI->db->update($this->CI->theme_table_name,$data,array('id'=>$id));   
  }*/

  public function get_all_theme(){
    $this->CI->load->database();
    $this->CI->db->order_by('id','DESC'); 
    $query=$this->CI->db->get($this->CI->theme_table_name);
    if($query->num_rows()>0)
      return $query->result();
    else
      return FALSE;
  }

  public function theme_action($id,$action){
    $this->CI->load->database();    
    if(strtolower($action)=='activate'):    
      $this->CI->db->update($this->CI->theme_table_name,array('is_active'=>0));
      return $this->CI->db->update($this->CI->theme_table_name,array('is_active'=>1),array('id'=> $id));
    elseif(strtolower($action)=='delete') : 
        $query=$this->CI->db->get_where($this->CI->theme_table_name,array('id'=> $id)); 
      
        if($query->num_rows()>0) $dir_path=$query->row()->dir_path; else $dir_path='#';        
      
        $this->CI->db->delete($this->CI->theme_table_name,array('id'=> $id)); 

        $this->delete_theme($this->CI->destination_path.$dir_path, $deleteRootToo=TRUE);  

    else: 
      return FALSE;
    endif;  
  }


  // theme template
  public function set($name=''){
    $this->tp_name = $name;
  }

  public function load($name = 'index'){
    $this->load_file($name);
  }

  public function get_header($name){
    if(isset($name)){
      $file_name = "header-{$name}.php";
      $this->load_file($file_name);
    }else{
      $this->load_file('header');
    }
  }

  public function get_sidebar($name){
    if(isset($name)) {
      $file_name = "sidebar-{$name}.php";
      $this->load_file($file_name);
    }else{
      $this->load_file('sidebar');
    }
  }

  public function get_footer($name){
    if(isset($name)){
      $file_name = "footer-{$name}.php";
      $this->load_file($file_name);
    }else{
      $this->load_file('footer');
    }
  }

  public function get_template_part($slug, $name){
    if(isset($name)) {
      $file_name = "{$slug}-{$name}.php";
      $this->load_file($file_name);
    }else{
      $this->load_file($slug);
    }
  }

  public function load_file($name){
    if($this->get_data($name)){
      $data = $this->get_data($name);
      //$this->CI->destination_path.
      $this->view2($this->tp_name.'/'.$name,$data);

    }else{
      $this->view2($this->tp_name.'/'.$name);
    }
  }

  public function set_data($key, $data){
    $this->data[$key] = $data;
  }

  public function get_data($key){
    if(isset($this->data[$key]))
      return $this->data[$key];
    else
      return FALSE;    
  }

  public function get_current_template_part(){    
    $query=$this->CI->db->get_where($this->CI->theme_table_name,array('is_active'=>1)); 
    if($query->num_rows()>0)
      return $this->CI->destination_path.$query->row()->dir_path."/";
    else
      return FALSE;
  }

  /* view */
  public function view2($view, $vars = array(), $return = FALSE)
  {
    return $this->_ci_load2(array('_ci_view' => $view, '_ci_vars' => $this->_ci_object_to_array($vars), '_ci_return' => $return));
  }

  protected function _ci_load2($_ci_data)
  {
   
    // Set the default data variables
    foreach (array('_ci_view', '_ci_vars', '_ci_path', '_ci_return') as $_ci_val)
    {
      $$_ci_val = ( ! isset($_ci_data[$_ci_val])) ? FALSE : $_ci_data[$_ci_val];
    }
   // print_r( $_ci_val);

    $file_exists = FALSE;

    // Set the path to the requested file
    if ($_ci_path != '')
    {
      $_ci_x = explode('/', $_ci_path);
      $_ci_file = end($_ci_x);

    }
    else
    {
      
      $_ci_ext = pathinfo($_ci_view, PATHINFO_EXTENSION);
     
      $_ci_file = ($_ci_ext == '') ? $_ci_view.'.php' : $_ci_view;

      foreach ($this->CI->_ci_view_paths as $view_file => $cascade)
      {
        if (file_exists($view_file.$_ci_file))
        {
          $_ci_path = $view_file.$_ci_file;
          $file_exists = TRUE;
          break;
        }

        if ( ! $cascade)
        {
          break;
        }
      }
    }

    if ( ! $file_exists && ! file_exists($_ci_path))
    {
      show_error('Unable to load the requested file: '.$_ci_file);
    }

    // This allows anything loaded using $this->load (views, files, etc.)
    // to become accessible from within the Controller and Model functions.

    $_ci_CI =& get_instance();
    foreach (get_object_vars($_ci_CI) as $_ci_key => $_ci_var)
    {
      if ( ! isset($this->$_ci_key))
      {
        $this->$_ci_key =& $_ci_CI->$_ci_key;
      }
    }

   
    if (is_array($_ci_vars))
    {
      $this->_ci_cached_vars = array_merge($this->_ci_cached_vars, $_ci_vars);
    }
    extract($this->_ci_cached_vars);
   
    ob_start();  

    if ((bool) @ini_get('short_open_tag') === FALSE AND config_item('rewrite_short_tags') == TRUE)
    {
      echo eval('?>'.preg_replace("/;*\s*\?>/", "; ?>", str_replace('<?=', '<?php echo ', file_get_contents($_ci_path))));
    }
    else
    {
      include($_ci_path); // include() vs include_once() allows for multiple views with the same name
    }

    log_message('debug', 'File loaded: '.$_ci_path);

    // Return the file data if requested
    if ($_ci_return === TRUE)
    {
      $buffer = ob_get_contents();
      @ob_end_clean();
      return $buffer;
    }

   
    if (ob_get_level() > $this->_ci_ob_level + 1)
    {
      ob_end_flush();
    }
    else
    {
      $_ci_CI->output->append_output(ob_get_contents());
      @ob_end_clean();
    }
  }

  protected function _ci_object_to_array($object)
  {
    return (is_object($object)) ? get_object_vars($object) : $object;
  }


}?>