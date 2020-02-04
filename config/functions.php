<?php 
	#sanitize the data
	function sanitizeData($data){
		$database=new DB;
		$handle=$database->connectionToDatabase();
		$data=$handle->real_escape_string($data);
		return $data;
	}
	function getValidId(){
		$database=new DB;
		$handle=$database->connectionToDatabase();
		$maxId=$database->selectFromDatabaseMaxId();
		$validId=$maxId+5;
		return $validId;
	}

?>