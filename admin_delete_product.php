<?php

	session_start();
	include('server.php'); 
	$pdid = $_GET['pdid'];
	
	$sql = "DELETE FROM product WHERE pd_id = $pdid";
	mysqli_query($conn, $sql);
?>
<script>
	go("admin_product.php");
</script>