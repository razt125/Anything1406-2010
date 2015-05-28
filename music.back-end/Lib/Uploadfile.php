<?php 

class Lib_UploadFile {
 
	 var $user_post_file = array();  
	 var $save_file_path;    
	 var $max_file_size;    
	 var $last_error;     
	 var $allow_type = array('gif', 'jpg', 'png', 'jpeg');
	 var $final_file_path;
	 var $save_info = array();
	 

	 public function __construct($file, $path, $size = 2097152, $type = '') {
	  $this->user_post_file = $file;
	  $this->save_file_path = $path;
	  $this->max_file_size = $size; 
	  if ($type != '')
	       $this->allow_type = $type;
	 }
	 

	 public function upload() {
	  
	  for ($i = 0; $i < count($this->user_post_file['name']); $i++) {
	   if ($this->user_post_file['error'][$i] == 0) {	
	    $name = $this->user_post_file['name'][$i];	
	    $tmpname = $this->user_post_file['tmp_name'][$i];
	    $size = $this->user_post_file['size'][$i];
	    $mime_type = $this->user_post_file['type'][$i];
	    $type = $this->getFileExt($this->user_post_file['name'][$i]);
	    if (!$this->checkSize($size)) {	
		     $this->last_error = "The file size is too big. File name is: ".$name;
		     $this->halt($this->last_error);
		     continue;
	    }
	    if (!$this->checkType($type)) {
		     $this->last_error = "Unallowable file type: .".$type." File name is: ".$name;
		     $this->halt($this->last_error);
		     continue;
	    }
	    if(!is_uploaded_file($tmpname)) {
		     $this->last_error = "Invalid post file method. File name is: ".$name;
		     $this->halt($this->last_error);
		     continue;
	    }
	    $basename = $this->getBaseName($name, ".".$type);	
	    $saveas = $basename."-".time().".".$type;

	    if(!is_dir($this->save_file_path."/".date("Ym")."/")){
            if(!mkdir($this->save_file_path."/".date("Ym")."/", 0777, true)){
            		Logger::debug('create dir wrong:%s', $this->save_file_path."/".date("Ym")."/");
            }	    	
	    }
	    //+++++++++++++++++++++++++++++++++++++++++++
	    $this->final_file_path = $this->save_file_path."/".date("Ym")."/".$saveas;	
	    if(!move_uploaded_file($tmpname, $this->final_file_path)) {
		     $this->last_error = $this->user_post_file['error'][$i];
		     $this->halt($this->last_error);
		     continue;
	    }

	    $this->save_info[] =  array(
	    							"name" => $name, 
	    							"type" => $type,
									"mime_type" => $mime_type,
	                             	"size" => $size, 
	                             	"saveas" => $saveas,
	                             	"path" => $this->final_file_path
	    );
	   }
	  }
		return $this->save_info;
	 }
	 

	 public function getSaveInfo() {
	  return $this->save_info;
	 }
	 

	 public function checkSize($size) {
	  if ($size > $this->max_file_size) {
	   return false;
	  }
	  else {
	   return true;
	  }
	 }
	 

	 public function checkType($extension) {
		  foreach ($this->allow_type as $type) {
		   if (strcasecmp($extension , $type) == 0)
		    return true;
		  }
		  return false;
	 }
	 

	 public function halt($msg) {
	  	printf("<b><UploadFile Error:></b> %s <br>\n", $msg);
	 }
	 

	 public function getFileExt($filename) {
		  $stuff = pathinfo($filename);
		  return $stuff['extension'];
	 }

	 public function getBaseName($filename, $type) {
		  $basename = basename($filename, $type);
		  return $basename;
	 }
}
?>