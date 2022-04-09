<?php
	session_start();
	include('server.php'); 
	$empid = $_GET['mbid'];
	
	$sql = "DELETE FROM user WHERE Emp_id = '$empid'";
    echo $sql;
	mysqli_query($conn, $sql);
?>
<script>
	go("admin_member.php");
</script>