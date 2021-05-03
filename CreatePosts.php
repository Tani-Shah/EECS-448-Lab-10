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
	$content = $_POST['post'];

	if(empty($content)){
		echo "<p>Please add some content to the post!</p>"; 
	}
	else{
		addPost($username, $content, $mysqli);
	}

	function addPost($user, $content, $mysqli){
		$check = mysqli_query($mysqli, "SELECT * FROM users WHERE user_id ='$user'");
    
		if(mysqli_num_rows($check)>0)
		{
			$add = "INSERT INTO posts (content, author_id) VALUES ('$content', '$user')";
			$mysqli->query($add);
			echo "<p>Post Created!</p>";
		}
		else
		{
			echo "<p>Username could not be found!</p>";
		}
	}

	$mysqli->close();
?>