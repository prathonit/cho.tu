<?php 
	$components=explode('/',$_SERVER['REQUEST_URI']);
	$s_url=$components[2];
	header("Location:redirect.php?s_url=$s_url");
?>	