<?php 

	include("./config.php");
	
	$GLOBALS['roles'] = array("Admin");
	
	//authenticatoe();

	if(!isset($_GET['city']) || $_GET['city']=="")
	{
		
		exit;
	}
	
	$GLOBALS['link'] = mysqli_connect($GLOBALS['mysqlhost'], $GLOBALS['mysqluser'], $GLOBALS['mysqlpass'], $GLOBALS['mysqldb']) or die("Database Error " . mysqli_error($GLOBALS['link']));

	$query="SELECT * From branch Where city='".$_GET['city']."'";
	$result=mysqli_query($GLOBALS['link'],$query);
	while($row=mysqli_fetch_assoc($result))
	{
			$data[] = $row;
	}
	echo json_encode($data);
	mysqli_close($GLOBALS['link']);
	
