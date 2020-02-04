<?php
	error_reporting(E_ERROR | E_WARNING | E_PARSE);

	include 'config/classesfunctionstoinclude.php';
	if ($_SERVER['REQUEST_METHOD']=='POST'){
		$database=new DB;
		$url=new Urls;
		#sanitizing the data 
		$o_url=$_POST['urlToShorten'];
		#checking for duplicate entry in the database 
		if ($database->checkDuplicateInDatabase($o_url)){
			$s_url=$database->selectFromDatabaseGiveSUrl($o_url);
			header("Location:url.php?url=$s_url");	
		}else{
			$id=getValidId();
			$s_url=$url->shortenUrl($o_url);
			echo $s_url;
			$date=date('d/m/Y h:i:s:a');
			if($database->insertIntoDatabase($id,$o_url,$s_url,$date)){
				header("Location:url.php?url=$s_url");
			}
			else{
				echo "Failed";
			}
		}
	}

?>