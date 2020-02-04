<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
	 function shortenUrl($urls){
			$char="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
			$urlToShorten=$urls;
			$url="";
			$number_id=1234567; 
			$n=strlen($urlToShorten);
			while($number_id>$n-1){
				$url=$url.$char[floor(fmod($number_id, $n))];
				$number_id=floor($number_id/$n);
			}
			return $url;
		}
		echo shortenUrl("www.facebook.com");
		echo $_SERVER['HTTP_REFERER'];
?>