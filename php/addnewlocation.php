<?php
	include_once('config.php');
	session_start();

	$location = mysqli_real_escape_string($conn,$_POST['location']);
	$location = strtolower($location);

	$sql = mysqli_query($conn,"select * from location where lab_name = '{$location}'");
	if(mysqli_num_rows($sql) > 0){  

		echo "This Locatiion already exist";

	}else{

		$insert_query = mysqli_query($conn, "INSERT INTO location (lab_name)
                     VALUES ('{$location}' )");
		echo "success";
	}
?>