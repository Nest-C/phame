<?php

	session_start();
	include('server.php'); 
	$orid = $_GET['orid'];
	
	$sql = "DELETE FROM order WHERE Or_id = $orid";
	mysqli_query($conn, $sql);
?>
<script>
	go("admin_order.php");
</script>