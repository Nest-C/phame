<?php include "resource.php" ?>
<?php
   session_start();
   include('server.php'); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <link rel="icon" href="">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Phamee Shop</title>
    <!-- Font Awesome -->
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
      rel="stylesheet"
    />
    <!-- Google Fonts -->
    <link
      href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
      rel="stylesheet"
    />
    <!-- MDB -->
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.2/mdb.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="style.css" />
  </head>


<body bgcolor="#f8f8f8">
	<?php include "header.php" ?>
    <div class="d-flex">
        <div class="p-2 flex-shrink-1">
          <?php include "left.php" ?>
        <div class="p-2 w-100" >
			<div class="row" style="padding:2.5rem">
    <div style="min-height: 100vh">
    <?php
		if (isset($_GET['pdid'])) {
			$pdid = $_GET['pdid'];
			$sql = "SELECT * FROM product WHERE pd_id = $pdid";
			$ex = mysqli_query($conn, $sql);
			$rs = mysqli_fetch_assoc($ex);
        }
	?>
    <div class="row" style="margin-top: -1rem">
        <div  class="col-4">
           <div class="card text-center">
                <div class="card-body">
                    <div style="overflow: auto hidden;max-height: 300px;white-space: nowrap;">
                        <?php
                            $qimg = "SELECT * FROM images WHERE pd_id = " . $pdid;
                            $eimg = mysqli_query($conn, $qimg);
                            while ($img = mysqli_fetch_array($eimg)) {
                        ?>
                        <div style="display:inline-block;background-image: url('images/<?=$img['img_name']?>');min-height: 300px; max-height: 300px;width: 300px;" onclick="zoom('images/<?=$img['img_name']?>');" class="img"></div>
                        <?php
                            }
                        ?>
                        </div>
                    </div>
                </div>
            </div>
        <div  class="col-6">
            <div class="card text-left">
                <div class="card-body">
                <div class=".d-lg-none ">
                <div class="mb-3" style="margin-top: -20px;  font-size: 30px"><?=$rs['pd_name']?></div>

                    <div>ราคา <div class="badge bg-primary"><?=$rs['pd_price']?></div></div>
                    <div>คงเหลือ <div class="badge bg-dark"><?=$rs['pd_onhand']?></div></div>
                    </div>
                    
                    <div style="padding: 15px; font-size: 36px">รายละเอียด</div>
                    <div style="padding: 15px 0px;text-indent: 30px;"><?=$rs['pd_detail']?></div>
                   
                </div>
            </div>
        </div>
        </div>
</body>
</html>