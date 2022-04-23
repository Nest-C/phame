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
  <link href="style1.css" rel="stylesheet" type="text/css" />
  <link href="stylenew.css" rel="stylesheet" type="text/css" />
  <?php include "resource.php" ?>
</head>

<body style="background:#F1E1A6">
	<?php include "header.php" ?>
    <div style="min-height: 100vh" >
        <div class="container" style="margin: 20px auto; background:#F1E1A6;">
        <div align="center" class="divider">
          <h3>รายงานผลยอดขาย</h3>
        <table  class="table table-borderless table-hover">
          <thead style="background:#97DBAE">
            <tr>
              <th scope="col">รายงาน</th>
              <th scope="col">จำนวน (บาท)</th>
            </tr>
          </thead>
          <tbody style="background:#C3E5AE">
            <?php
              $sql = "SELECT product.*, product.pd_price*Order_amount AS total_price FROM `order_detail` INNER JOIN `product` ON order_detail.pd_id = `product`.pd_id;";
              $ex = mysqli_query($conn, $sql);
                while ($rs = mysqli_fetch_array($ex)) {
            ?>
                  <tr>
                    <th>
                      <?=($rs['pd_name'])?>
                    </th>
                    <th>
                      <?=number_format($rs['total_price'])?>
                    </th>
                  </tr>
           <?php }?>
            <tr>
              <th>
                ยอดขายรวมทั้งหมด
              </th>
              <th>
                <?php
                  $sql = "SELECT SUM(Or_total) AS TotalOrdered FROM `order`;";
                  $ex = mysqli_query($conn, $sql);
                $rs = mysqli_fetch_row($ex);

                ?>
                 <?=number_format($rs[0])?>
              </th>
            </tr>
          </tbody>
        </table> 

        <div align="center" class="divider mt-5">
          <h3>รายงานผลสินค้าคงคลัง</h3>
        <table  class="table table-borderless table-hover">
          <thead style="background:#97DBAE">
            <tr align="center" >
              <th scope="col">ชื่อสินค้า</th>
              <th scope="col">วันที่สินค้าเข้า</th>
              <th scope="col">จำนวนสินค้าที่รับเข้า (กิโลกรัม)</th>
              <th scope="col">วันที่</th>
              <th scope="col">คงเหลือ (กิโลกรัม)</th>
            </tr>
          </thead>
          <tbody  style="background:#C3E5AE">
            <?php
                  $sql = "SELECT * FROM `product`;";
                  $ex = mysqli_query($conn, $sql);
                  while ($rs = mysqli_fetch_array($ex)) {
                  ?>
                    <tr align="center" >
                      <th>
                          <?=$rs['pd_name']?>
                      </th>
                      <th>
                        <?=$rs['datecome']?>
                      </th>
                      <th>
                        <?=$rs['quantity']?>
                      </th>
                      <th>
                        <?=date("Y-m-d")?>
                      </th>
                      <th>
                        <?=$rs['pd_onhand']?>
                      </th>
                    </tr>
                  <?php
                    }
                  ?>
          </tbody>
        </table> 
</body>
</html>