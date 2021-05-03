<?php
	libxml_use_internal_errors(true);
	error_reporting(E_ALL);
	ini_set("display_errors", 1);

	$mysqli = new mysqli("mysql.eecs.ku.edu", "tanishkashah", "eeH3fahn", "tanishkashah");

	if($mysqli->connect_errno){
		printf("Connect failed: %s\n", $mysql->connect_errno);
		exit();
	}

	$idsList = "Post ids being deleted: ";

	if(!empty($_POST['delete'])) {
	    foreach($_POST['delete'] as $id) {
	   		$idsList .= $id. ",";
		   	$sql = "DELETE FROM Posts WHERE post_id =?";
			$del = $mysqli->query($sql);
		}
	    
	}

	echo substr($idsList, 0, -2);
	$mysqli->close();
?>