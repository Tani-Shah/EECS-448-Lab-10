<?php
	libxml_use_internal_errors(true);
	error_reporting(E_ALL);
	ini_set("display_errors", 1);


	$mysqli = new mysqli("mysql.eecs.ku.edu", "tanishkashah", "eeH3fahn", "tanishkashah");

	if($mysqli->connect_errno){
		printf("Connect failed: %s\n", $mysql->connect_errno);
		exit();
	}

	$users = $mysqli->query("SELECT * FROM users");

	echo "<!DOCTYPE html>
	<html>
	<head>
	<title>View Users</title>
	<link rel='stylesheet' type='text/css' href='style.css'>
	</head>
	<body>";
	echo "<table><tr><th>Users:</th></tr>";
	
	while ($row = $users->fetch_assoc()) {
		echo "<tr><td>" .$row['user_id']. "</td></tr>";
	 }
	
	echo "</table>";
	echo "</body></html>";

	$users->free();

	$mysqli->close();
?>