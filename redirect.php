<?php
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
	include 'config/classesfunctionstoinclude.php';
	$s_url=$_GET['s_url'];
	$database=new DB;
	$url_redirect=$database->selectFromDatabaseGetOUrl($s_url);
	$url=new Urls;
	$url->addHitAndLastView($s_url);
	header("Location:$url_redirect");
?>