<?php
	$conn = new mysqli("localhost", "root", "", "task");
 
	if(!$conn){
		die("Error: Cannot connect to the database");
	}
?>