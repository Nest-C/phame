<?php
	session_start();
	include('server.php'); 
	$ctid = $_GET['ctid'];
	
	$sql = "DELETE FROM category WHERE ct_id = $ctid";
	mysqli_query($conn, $sql);

?>
<script>
	go("admin_category.php");
</script>