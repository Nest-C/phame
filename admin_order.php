<?php
	 session_start();
   include('server.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Phamee Shop</title>
<link href="style1.css" rel="stylesheet" type="text/css" />
<link href="stylenew.css" rel="stylesheet" type="text/css" />
<script src="jquery-mobile/jquery-1.6.4.min.js" type="text/javascript"></script>
<?php include "resource.php" ?>
</head>

<body style="background:#F1E1A6">
	<?php include "header.php" ?>
	<?php include "modal_order_detail.php" ?>
	<?php include "modal_order.php" ?>
    <div style="min-height: 100vh" >
        <div class="container" style="margin: 20px auto; background: #F1E1A6;">
            <div align="center" style="background:#F1E1A6">
            <h2>คำสั่งซื้อ</h2>
            <div class="d-flex flex-row-reverse m-4">
              <button style="background:#97DBAE" type="button" class="btn btn-primary" data-mdb-toggle="modal" data-mdb-target="#exampleModal1">
                +
              </button>
            </div>
        <table class="table table-borderless table-hover">
        <thead>
          <tr style="background:#97DBAE">
            <th scope="col">วันที่ซื้อ</th>
            <th scope="col">รหัสออเดอร์</th>
            <th scope="col">ชื่อลูกค้า</th>
            <th scope="col">ที่อยู่</th>
            <th scope="col">ยอดซื้อทั้งหมด</th>
            <th scope="col">รายละเอียด</th>
            <th scope="col">ลบ</th>
          </tr>
        </thead>
        <tbody style="background:#C3E5AE">
          <?php
            $sql = "SELECT * FROM `order`";
            $ex = mysqli_query($conn, $sql);
            while ($rs = mysqli_fetch_array($ex)) {
            ?>
            <tr>
            <tr>
              <td ><?=$rs['Order_date']?></td>
              <td><?=sprintf("%05d", $rs['Or_id'])?></td>
              <td ><?=$rs['Or_name']?></td>
                <td ><?=$rs['Or_add']?></td>
                <td ><?=$rs['Or_total']?></td>
                <td>
                <button  class="btn btn-warning btn-sm px-3" onclick="go('admin_order.php?modal=order&orid=<?=$rs['Or_id']?>');">
                  รายละเอียด
                </button>
                </td>
                <td>
                <buttn onclick="confirm('Are you sure to remove this order?') ? go('admin_delete_order.php?orid=<?=$rs['Or_id']?>'):null" class="btn btn-danger btn-sm px-3">
                  <i class="fas fa-times"></i>
                </buttn>
              </td>
              </tr>
            <?php
              }
            ?>
        </tbody>
</body>
</html>