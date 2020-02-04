<?php
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
	include 'config/classesfunctionstoinclude.php';
?>

	<div class="container" id="bar">
	<h1 style="font-size: 100px;color: white;font-weight: 600"><a href="index.php" style="color: white;">cho.tu</a></h1>

	</div>
	
	<div id="mirror">
		<?php include 'assets/form.php'; ?>
		<?php include 'assets/button-group.php';?>
</div>
	</div>

	<div id="footer">
		<h1 style="font-size: 30px;color: white;font-weight: 600">cho.tu Made with <img src="assets/images/heart.svg" style="height: 25px;width: 25px;"> <p style="border-bottom-style: dotted;width:30%;"> <a style="color:white;" href="https://github.com/prathonit">Prathmesh Srivastava </a></p></h1> 
	</div>

</body>
</html>
<?php
	if ($_SERVER['REQUEST_METHOD']=='POST'){
		$database=new DB;
		$url=new Urls;
		#sanitizing the data 
		$o_url=$_POST['urlToShorten'];
		#checking for duplicate entry in the database 
		if ($database->checkDuplicateInDatabase($o_url)){
			$s_url=$database->selectFromDatabase($o_url);
			echo "The url is already shortened. The shortened url is : ".$s_url;	
		}else{
			$id=getValidId();
			$s_url=$url->shortenUrl($o_url);
			$date=date('d/m/Y h:i:s:a');
			$database->insertIntoDatabase($id,$o_url,$s_url,'1',$date);
		}
		

	}

?>
