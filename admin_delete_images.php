<?php
	session_start();
	include('server.php'); 
	
	$imgid = $_GET['imgid'];
	
	$sql = "DELETE FROM images WHERE img_id = $imgid";
	mysqli_query($conn, $sql);
	
	back();
?>