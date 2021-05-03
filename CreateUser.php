<?php 
	libxml_use_internal_errors(true);
	error_reporting(E_ALL);
	ini_set("display_errors", 1);

	$mysqli = new mysqli("mysql.eecs.ku.edu", "tanishkashah", "eeH3fahn", "tanishkashah");

	if($mysqli->connect_errno){
		printf("Connect failed: %s\n", $mysql->connect_errno);
		exit();
	}

	$username = $_POST['username'];

	if(empty($username)){
		echo "<p>Username cannot be blank!</p>"; 
	}
  else{
		addUser($username, $mysqli);
	}

	function addUser($user, $mysqli){
		$add = "INSERT INTO users(user_id) VALUES ('$user')";
    
		if($mysqli->query($add))
		{
			echo "<p>User Created!</p>";
		}
		else
		{
			echo "<p>Username already exists!</p>";
		}
	}

	$mysqli->close();
?>