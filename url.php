<?php
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
	include 'config/classesfunctionstoinclude.php';
	$s_url=$_GET['url'];
	$database=new DB;
	$hits=$database->selectFromDatabaseGetHits($s_url);
	$last_visted=$database->selectFromDatabaseGetTime($s_url);

?>

	<div class="container" id="bar">
	<h1 style="font-size: 100px;color: white;font-weight: 600"><a href="index.php" style="color: white;">cho.tu</a></h1>

	</div>
	
	<div id="mirror">
		<center>
			<h3>Your shortened url is : <br></h3>
			<h4><a href="http://localhost/<?php echo $_GET['url'];?>">http://localhost/<?php echo $_GET['url'];?></a></h4>

		<h1>Total hits <span class="label label-default"><?php echo $hits;?></span></h1>

		<h1>Last visited <span class="label label-default"><?php echo $last_visted;?></span></h1>
		
		</center>
		<?php include 'assets/button-group.php';?>
	</div>

	<div id="footer">
		<h1 style="font-size: 30px;color: white;font-weight: 600">cho.tu Made with <img src="assets/images/heart.svg" style="height: 25px;width: 25px;"> <p style="border-bottom-style: dotted;width:30%;"> <a style="color:white;" href="https://github.com/prathonit">Prathmesh Srivastava </a></p></h1> 
	</div>

</body>
</html>