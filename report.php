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
  <link href="css1.css" rel="stylesheet" type="text/css" />
  <?php include "resource.php" ?>
</head>

<body >
	<?php include "header.php" ?>
    <div style="min-height: 100vh">
        <div class="container" style="margin: 20px auto; background: white;">
        <div align="center" class="divider">
          <h3>รายงานผลยอดขาย</h3>
        <table  class="table text-center">
          <thead class="table-Warning">
            <tr>
              <th scope="col">รายงาน</th>
              <th scope="col">จำนวน (บาท)</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th>
                ยอดขาย
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

        <div align="center" class="divider">
          <h3>รายงานผลสินค้าคงคลัง</h3>
        <table  class="table text-left">
          <thead class="table-Info">
            <tr>
              <th scope="col">รายงาน</th>
              <th scope="col">จำนวน (ชิ้น)</th>
            </tr>
          </thead>
          <tbody>
            <?php
                  $sql = "SELECT * FROM `product`;";
                  $ex = mysqli_query($conn, $sql);
                  while ($rs = mysqli_fetch_array($ex)) {
                  ?>
                    <tr>
                      <th>
                          <?=$rs['pd_name']?>
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