<?php
    session_start();
    include('server.php'); 	
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $password = $_POST['password'];
	$mbid = $_GET['empid'];


	$sql = "UPDATE user SET Emp_Name = '$name', Emp_phone = $phone, Emp_Add = '$address', password = $password WHERE Emp_id = $mbid";
	mysqli_query($conn, $sql);

?>
<script>
	go("admin_member.php");
</script>
