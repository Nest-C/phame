<?php
   session_start();
   include('server.php'); 
?>

<!DOCTYPE html
	PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Phamee Shop</title>
	<link href="stylenew.css" rel="stylesheet" type="text/css" />
	<?php include "resource.php" ?>
</head>

<body style="background:#F1E1A6">
	<?php include "header.php" ?>
	<div class="d-flex" style="background:#F1E1A6">
		<div class="p-2 flex-fill">
			<?php include "left.php" ?>
		</div>
		<div class="p-2 flex-fill">
			<div class="row justify-content-start">
				<?php
						$sql = "SELECT * FROM product INNER JOIN images ON images.pd_id = product.pd_id";
						if (isset($_GET['q']) || isset($_GET['min']) || isset($_GET['max']) || isset($_GET['ctid'])) {
							$sql .= " WHERE ";
							if (isset($_GET['ctid'])) {
								$sql .= "ct_id = " . $_GET['ctid'];	
							}
							if (isset($_GET['q'])) {
								$sql .= "LOWER(pd_name) LIKE '%" . $_GET['q'] . "%' or product.pd_id = $_GET[q]";
							}
							if (isset($_GET['min'])) {
								$sql .= "pd_price >= ".$_GET['min']." AND pd_price <=" . $_GET['max']; } } $sql
								.= " GROUP BY images.pd_id"; $ex = mysqli_query($conn, $sql); while
								($rs = mysqli_fetch_array($ex)) { include "item_product.php"; } ?>
			</div>
		</div>
	</div>
</body>

</html>