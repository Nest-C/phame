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
<body>
  
	<?php
    include "header.php" 
    ?>
    <?php
    include "modal_category.php" 
    ?>
      <div style="min-height: 100vh">
      <div class="container">
        <div>
          <div class="d-flex flex-row-reverse mt-4 pe-5">
          <button  type="button" class="btn btn-primary" data-mdb-toggle="modal" data-mdb-target="#exampleModal">
            +
          </button>
          </div>
          <h2 class="ps-3">ประเภทสินค้า</h2>
          <div class="clear"></div>
        </div>
        <div>
          <table class="table align-middle">
            <thead class="table-info">
              <tr>
                <th scope="col">รหัส</th>
                <th scope="col">ชื่อ</th>
                <th scope="col">แก้ไข</th>
                <th scope="col">ลบ</th>
              </tr>
            </thead>
            <tbody >
              <?php
                 $sql = "SELECT * FROM category";
                 $ex = mysqli_query($conn, $sql);
                 while ($rs = mysqli_fetch_array($ex)) {
                ?>
              <tr>
                  <td><?=sprintf("%05d", $rs['ct_id'])?></td>
                  <td ><?=$rs['ct_name']?></td>
                  <td onclick="go('admin_category.php?modal=category&ctid=<?=$rs['ct_id']?>');">
                  <button class="btn btn-warning btn-sm px-3">
                    <i class="fas fa-edit"></i>
                  </button>
                  </td>
                  <td>
                  <button onclick="confirm('Are you sure to remove this category?') ? go('admin_delete_category.php?ctid=<?=$rs['ct_id']?>'):null" class="btn btn-danger btn-sm px-3">
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