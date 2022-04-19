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
  <?php include "modal_product.php" ?>
  <div style="min-height: 100vh">
    <div class="container">
      <div>
        <div class="d-flex flex-row-reverse mt-4 pe-5">
        <button style="background:#97DBAE" type="button" class="btn" data-mdb-toggle="modal" data-mdb-target="#exampleModal">
          +
        </button>
        </div>
        <h2 class="ps-3">สินค้า</h2>
        <div class="clear"></div>
      </div>
      <div>
        <table class="table table-borderless table-hover">
          <thead>
            <tr style="background:#97DBAE">
              <th scope="col">รหัส</th>
              <th scope="col">ชื่อ</th>
              <th scope="col">ประเภทสินค้า</th>
              <th scope="col">ราคา</th>
              <th scope="col">คงคลัง</th>
              <th scope="col">Status</th>
              <th scope="col">แก้ไขล่าสุด</th>
              <th scope="col">รูปภาพ</th>
              <th scope="col">แก้ไข</th>
              <th scope="col">ลบ</th>
            </tr>
          </thead>
          <tbody style="background:#C3E5AE">
            <?php
						  	$sql = "SELECT * FROM product INNER JOIN category ON product.ct_id = category.ct_id INNER JOIN images ON images.pd_id = product.pd_id GROUP BY images.pd_id";
							$ex = mysqli_query($conn, $sql);
							while ($rs = mysqli_fetch_array($ex)) {
						  ?>
            <tr>
              <th scope="row">
                <?=sprintf("%05d", $rs['pd_id'])?>
              </th>
              <td>
                <?=$rs['pd_name']?>
              </td>
              <td>
                <?=$rs['ct_name']?>
              </td>
              <td>
                <?=number_format($rs['pd_price'])?>
              </td>
              <td>
                <?=number_format($rs['pd_onhand'])?>
              </td>
              <td>
               <?php if ($rs['pd_onhand'] > 100) : ?>
                   มีในสต็อก
                <?php endif ?>
                <?php if ($rs['pd_onhand'] <= 100  && $rs['pd_onhand'] >= 1)   : ?>
                   ใกล้หมด
                <?php endif ?>
                <?php if ($rs['pd_onhand'] == 0) : ?>
                   หมด
                <?php endif ?>
              </td>
              <td>
                <?=($rs['pd_date'])?>
              </td>
              <td><img src="images/<?=$rs['img_name']?>" width="100" /></td>
              <td  onclick="go('admin_product.php?modal=product&pdid=<?=$rs['pd_id']?>');">
                <button class="btn btn-warning btn-sm px-3">
                  <i class="fas fa-edit"></i>
                </button>
              </td>
              <td>
                <button  onclick="confirm('Are you sure to remove this product?') ? go('admin_delete_product.php?pdid=<?=$rs['pd_id']?>'):null" type="button" class="btn btn-danger btn-sm px-3">
                  <i class="fas fa-times"></i>
                </button>
              </td>
            </tr>
            <?php
							}
							?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</body>

</html>