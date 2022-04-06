<?php
	  session_start();
	  include('server.php'); 
	$name = $_POST['name'];
	$ctid = $_POST['ctid'];
	$detail = nl2br($_POST['detail']);
	$price = $_POST['price'];
	$sale = $_POST['sale'] ? $_POST['sale']: 0;
	$onhand = $_POST['onhand'];
	$pdid = $_GET['pdid'];
	$onhand_get = $_GET['onhand'];
	if ($onhand_get <= 30){
		$status = 2
	}else if($onhand_get > 30){
		$status = 1
	}else{
		$status = 0
	}
	$sql = "UPDATE product SET pd_name = '$name', ct_id = $ctid, pd_detail = '$detail', pd_sale = $sale, pd_price = $price, pd_onhand = $onhand, pd_status = $status WHERE pd_id = $pdid";
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