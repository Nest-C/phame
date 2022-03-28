<?php
	  session_start();
	  include('server.php'); 
	$ctid = $_GET['ctid'];
	$name = $_POST['name'];
	
	$sql = "UPDATE category SET ct_name = '$name' WHERE ct_id = $ctid";
	mysqli_query($conn, $sql);

?>
<script>
	go("admin_category.php");
</script>