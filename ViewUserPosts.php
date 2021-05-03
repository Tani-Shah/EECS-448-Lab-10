<?php

	libxml_use_internal_errors(true);
	error_reporting(E_ALL);
	ini_set("display_errors", 1);

	$mysqli = new mysqli("mysql.eecs.ku.edu", "tanishkashah", "eeH3fahn", "tanishkashah");
	$user = $_POST["Users"];

	if($mysqli->connect_errno){
		printf("Connect failed: %s\n", $mysql->connect_errno);
		exit();
	}
	else{
		echo "<!DOCTYPE html>
		<html>
		<head>
		<title>View Users</title>
		</head>
		<body>";
		echo "User: $user<br><br>Posts:<br><br><table>";
		$query = "SELECT * from posts";
		if($result = $mysqli->query($query)){
			while($row = $result->fetch_assoc()){
				$post = $row["content"];
				$author =$row["author_id"];
				if($user == $author){
					echo "<tr><td>".$post."<br></td></tr>";
				}
				echo "</table></body></html>";
			}
		}
		$mysqli->close();
	}

?>