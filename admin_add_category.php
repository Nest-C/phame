<?php
  session_start();
  include('server.php'); 
	$name = $_POST['name'];
	
	$sql = "INSERT INTO category (ct_name) VALUES ('$name')";
	mysqli_query($conn, $sql);

?>
<script>
	go("admin_category.php");
</script>