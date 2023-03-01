<?php
	require_once 'conn.php';
	if(ISSET($_POST['add'])){
		if($_POST['task'] != ""){
			$task = mysqli_real_escape_string($conn,$_POST['task']);
 
			$conn->query("INSERT INTO `tasks` VALUES('', '$task', '')");
			header('location: ../index.php');
		}
	}
?>