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
	<?php include "modal_member.php" ?>
  <div style="min-height: 100vh">
      <div class="container">
        <div>
          <div class="d-flex flex-row-reverse mt-4 pe-5">
              <?php
              	$sql = "SELECT * FROM user WHERE Emp_Name=admin;" ;
              ?>
                <?php if ($sql ) : ?>
                <button  type="button" class="btn btn-primary" data-mdb-toggle="modal" data-mdb-target="#exampleModal">
                  +
                </button>
                <?php endif ?>

          </div>
          <h2 class="ps-3">พนักงาน</h2>
          <div class="clear"></div>
        </div>
        <div>
          <table class="table align-middle">
            <thead>
              <tr class="table-info">
              <th scope="col">รหัส</th>
              <th scope="col">ชื่อ</th>
              <th scope="col">เบอร์ติดต่อ</th>
              <th scope="col">แก้ไข</th>
              <th scope="col">ลบ</th>
              </tr>
            </thead>
            <tbody >
              <?php
						  	$sql = "SELECT * FROM user";
							  $ex = mysqli_query($conn, $sql);
							  while ($rs = mysqli_fetch_array($ex)) {
                ?>
               <tr>
               <tr>
                    <td><?=sprintf("%05d", $rs['Emp_id'])?></td>
                    <td ><?=$rs['Emp_Name']?></td>
                    <td ><?=$rs['Emp_Phone']?></td>
                    <td>
                    <button  class="btn btn-warning btn-sm px-3" onclick="go('admin_member.php?modal=member&mbid=<?=$rs['Emp_id']?>');">
                      <i class="fas fa-edit"></i>
                    </button>
                    </td>
                    <td>
                    <buttn onclick="confirm('Are you sure to remove this member?') ? go('admin_delete_member.php?mbid=<?=$rs['Emp_id']?>'):null" class="btn btn-danger btn-sm px-3">
                      <i class="fas fa-times"></i>
                    </buttn>
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