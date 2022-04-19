<?php
	  session_start();
	  include('server.php'); 
	$name = $_POST['name'];
	$ctid = $_POST['ctid'];
	$detail = nl2br($_POST['detail']);
	$price = $_POST['price'];
	$onhand = $_POST['onhand'];
	$pdid = $_GET['pdid'];

	$sql = "UPDATE product SET pd_name = '$name', ct_id = $ctid, pd_detail = '$detail', pd_price = $price, pd_onhand = $onhand, pd_date = now() WHERE pd_id = $pdid";
	mysqli_query($conn, $sql);
	
	if (!empty($_FILES['img']['name'][0])) { 
		foreach ($_FILES['img']['name'] as $i => $file) {
			$sur = explode(".", $file);
			$ext = strtolower(end($sur));
			$filename = "Pd_" . $pdid . "_" . $date . "_" . $i . "." . $ext;
			copy($_FILES['img']['tmp_name'][$i], "images/" . $filename);
			$img = "INSERT INTO images (pd_id, img_name) VALUES ($pdid, '$filename')";
			mysqli_query($conn, $img);
		}
	}

?>
<script>
	go("admin_product.php");
</script>