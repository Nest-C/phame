<?php

	session_start();
	include('server.php'); 	
	$name = $_POST['name'];
	$ctid = $_POST['ctid'];
	$detail = nl2br($_POST['detail']);
	$price = $_POST['price'];
	$onhand = $_POST['onhand'];
	
	$sql = "INSERT INTO product (pd_name, ct_id, pd_detail, pd_price,  pd_onhand) VALUES ('$name', $ctid, '$detail', $price,  $onhand)";
	mysqli_query($conn, $sql);
	
	$q = "SELECT max(pd_id) FROM product";
	$ex = mysqli_query($conn, $q);
	$row = mysqli_fetch_row($ex);
	
	foreach ($_FILES['img']['name'] as $i => $file) {
		$sur = explode(".", $file);
		$ext = strtolower(end($sur));
		$filename = "Pd_" . $row[0] . "_" . $date . "_" . $i . "." . $ext;
		copy($_FILES['img']['tmp_name'][$i], "images/" . $filename);
		$img = "INSERT INTO images (pd_id, img_name) VALUES ($row[0], '$filename')";
		mysqli_query($conn, $img);
	}

?>
<script>
	go("admin_product.php");
</script>