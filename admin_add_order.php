<?php
	session_start();
	include('server.php'); 	
	$name = $_POST['name'];
	$tel = $_POST['phone'];
	$address = $_POST['address'];

	$pd_id = $_POST['productItem'];
	$Order_amount = $_POST['kilograms'];
	$total = 0;

	$qrdetail = [];
	
	foreach ($pd_id as $key => $value) {
		$price = "SELECT pd_price FROM product WHERE pd_id = $value";
		$exe = mysqli_query($conn, $price);
		$rows = mysqli_fetch_assoc($exe);
		$price = $rows['pd_price']*$Order_amount[$key];
		$total+=$price;
		$qrdetail[$key] = "$value, $rows[pd_price] , $Order_amount[$key])";
		$onhand = "UPDATE product SET pd_onhand = pd_onhand - $Order_amount[$key] WHERE pd_id = $value";
		mysqli_query($conn, $onhand);
	}


	$sql  = "INSERT INTO `order` (Or_name, Or_add, Or_tel, Or_total, Order_date) VALUES ('$name', '$address', '$tel', $total, now())";
	mysqli_query($conn, $sql);

	$q = "SELECT max(or_id) FROM `order`";
	$ex = mysqli_query($conn, $q);
	$row = mysqli_fetch_row($ex);

	$qrdetail = join(",",array_map(fn($value) : string => "($row[0], $value" , $qrdetail));
	$sqldetail  = "INSERT INTO order_detail (Or_id, pd_id, pd_price, Order_amount) VALUES $qrdetail";
	mysqli_query($conn, $sqldetail);
	
?>
<script>
	go("admin_order.php");
</script>