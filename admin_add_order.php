<?php
	session_start();
	include('server.php'); 	
	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	$password = $_POST['password'];
	
	$sql = "INSERT INTO order (Emp_Name, Emp_Phone, Emp_Add, password ) VALUES ('$name', '$phone', '$address', '$password')";
	mysqli_query($conn, $sql);
?>
<script>
	go("admin_member.php");
</script>