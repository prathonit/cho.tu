<?php 
	/*
	Written on 4th February 2020 by Prathmesh Srivastava
	*/
	class DB{ 
		#connection to the database
		public function connectionToDatabase(){	 
			$database=new mysqli('localhost','pks','pwdpwd','chotu');
			return $database;
		}
		#close connection to the database 
		public function closeConnectionToDatabase($handle){
			$handle->close();
		}
		#select from database according to the s_url extension returns array on successful query else returns false
		public function selectFromDatabaseGetOUrl($s_url){
			$query="SELECT * FROM urls WHERE s_url='{$s_url}' LIMIT 1";
			$handle=$this->connectionToDatabase();
			if ($result=$handle->query($query)){
				$data=$result->fetch_array(MYSQLI_ASSOC);
				return $data['o_url'];
			}
			else{
				return "Failed";
			}
		}
		public function selectFromDatabaseGetHits($s_url){
			$query="SELECT * FROM urls WHERE s_url='{$s_url}' LIMIT 1";
			$handle=$this->connectionToDatabase();
			if ($result=$handle->query($query)){
				$data=$result->fetch_array(MYSQLI_ASSOC);
				return $data['hits'];
			}
			else{
				return "Failed";
			}
		}
		public function selectFromDatabaseGetTime($s_url){
			$query="SELECT * FROM urls WHERE s_url='{$s_url}' LIMIT 1";
			$handle=$this->connectionToDatabase();
			if ($result=$handle->query($query)){
				$data=$result->fetch_array(MYSQLI_ASSOC);
				return $data['last_visited'];
			}
			else{
				return "Failed";
			}
		}
		public function selectFromDatabaseGiveSUrl($o_url){
			$query="SELECT * FROM urls WHERE o_url='{$o_url}' LIMIT 1";
			$handle=$this->connectionToDatabase();
			if ($result=$handle->query($query)){
				$data=$result->fetch_array();
				return $data['s_url'];
			}
		}
		#for finding the largest id in the database else returns false
		public function selectFromDatabaseMaxId(){
			$query="SELECT MAX(id) AS maxId FROM urls";
			$handle=$this->connectionToDatabase();
			if ($result=$handle->query($query)){
				$row=$result->fetch_array();
					$maxId=$row['maxId'];
					return $maxId;
			}else{
				return false;
			}
		}
		#check if a record already exists
		public function checkDuplicateInDatabase($o_url){
			$handle=$this->connectionToDatabase();
			$query="SELECT * FROM urls WHERE o_url='{$o_url}'";
			if ($result=$handle->query($query)){
				if (mysqli_num_rows($result)>0){
					return true;
				}else{
					return false;
				}
			}
		}
		#insert new record into the database 
		public function insertIntoDatabase($id,$o_url,$s_url,$last_visited){
			$hits=0;
			$query="INSERT INTO urls (id,o_url,s_url,hits,last_visited) VALUES ('{$id}','{$o_url}','{$s_url}','{$hits}','{$last_visited}')";
			$handle=$this->connectionToDatabase();
			if(mysqli_query($handle,$query)){
				return true;
			}
			else{
				return false;
			}
		}
		#updating hits and last_visited in the database takes s_url as the query 
		public function updateIntoDatabase($s_url,$hits,$last_visited){
			$handle=$this->connectionToDatabase();
			$query="UPDATE urls SET hits='{$hits}',last_visited='{$last_visited}' WHERE s_url='{$s_url}'";
			if ($result=$handle->query($query)){
				return true;
			} else{
				return false;
			}
		}
	}
	
	

?>
