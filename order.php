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
<link href="css1.css" rel="stylesheet" type="text/css" />
<script src="jquery-mobile/jquery-1.6.4.min.js" type="text/javascript"></script>
<?php include "resource.php" ?>
</head>

<body>
	<?php include "header.php" ?>
    <div style="min-height: 100vh">
        <div class="container" style="margin: 20px auto; background: white;">
            <div align="center" >
            <h2>ออเดอร์</h2>
            <div class="d-flex flex-row-reverse m-4">
              <button type="button" class="btn btn-primary" data-mdb-toggle="modal" data-mdb-target="#exampleModal">
                +
              </button>
            </div>
        <table class="table table-borderless table-hover">
        <thead>
          <tr class="table-info">
            <th scope="col">วันที่ซื้อ</th>
            <th scope="col">รหัสออเดอร์</th>
            <th scope="col">ชื่อรายการ</th>
            <th scope="col">ราคาทั้งหมด</th>
            <th scope="col">รายละเอียด</th>
            <th scope="col">ลบ</th>
          </tr>
        </thead>
</body>
</html>