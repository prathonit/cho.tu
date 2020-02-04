<?php
	/*Written on 4th February 2020 by Prathmesh Srivastava*/
	class Urls{

		 function shortenUrl($urls){
			$char="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
			$urlToShorten=$urls;
			$url="";
			$number_id=getValidId(); 
			$n=strlen($urlToShorten);
			while($number_id>=$n){
				if ($n==0){
					break;
				}
				$url=$url.$char[floor(fmod($number_id, $n))];
				$number_id=floor($number_id/$n);
			}
			return $url;
		}
		function addHitAndLastView($s_url){
			$database=new DB;
			$hits=$database->selectFromDatabaseGetHits($s_url);
			$hits++;
			$date=date('d/m/Y h:i:s:a');
			$database->updateIntoDatabase($s_url,$hits,$date);
		}
	}

?>