<?php include "resource.php" ?>
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
    <link href="zoom.css" rel="stylesheet" type="text/css" />
	<link href="stylenew.css" rel="stylesheet" type="text/css" />
    <?php include "resource.php" ?>
   
</head>


<body style="background:#F1E1A6">
    <?php include "header.php" ?>
    <div class="d-flex">
        <div class="p-2">
            <?php include "left.php" ?>
        </div>
        <div class="p-2 w-100">
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
                    <div class="row" style="margin-top: -2rem">
                        <div class="col-4">
                            <div class="card text-center">
                                <div class="card-body">
                                    <div style="overflow: auto hidden;max-height: 300px;white-space: nowrap;">
                                        <?php
                            $qimg = "SELECT * FROM images WHERE pd_id = " . $pdid;
                            $eimg = mysqli_query($conn, $qimg);
                            while ($img = mysqli_fetch_array($eimg)) {
                        ?>
                              <img id="myImg" src="images/<?=$img['img_name']?>" alt="Snow" style="display:inline-block;min-height: 300px; max-height: 300px;width: 300px;">
                                        <!-- <div id="myImg"
                                            style="display:inline-block;background-image: url('images/<?=$img['img_name']?>');min-height: 300px; max-height: 300px;width: 300px;"
                                           ></div> -->
                                        <?php
                            }
                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card text-left">
                                <div class="card-body">
                                    <div class=".d-lg-none ">
                                        <div class="mb-3" style="margin-top: -20px;  font-size: 30px">
                                            <?=$rs['pd_name']?>
                                        </div>

                                        <div>???????????? <div class="badge bg-primary">
                                                <?=$rs['pd_price']?> 
                                            </div> ?????????
                                        </div>
                                        <div>????????????????????? <div class="badge bg-dark">
                                                <?=$rs['pd_onhand']?> 
                                            </div> ????????????????????????
                                        </div>
                                    </div>

                                    <div style="padding: 15px; font-size: 36px">??????????????????????????????</div>
                                    <div style="padding: 15px 0px;text-indent: 30px;">
                                        <?=$rs['pd_detail']?>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div id="myModal" class="modal">
                            <span class="close">&times;</span>
                            <img class="modal-content" id="img01">
                            <div id="caption"></div>
                        </div>
                        <script>
                            // Get the modal
                            var modal = document.getElementById("myModal");

                            // Get the image and insert it inside the modal - use its "alt" text as a caption
                            var img = document.getElementById("myImg");
                            var modalImg = document.getElementById("img01");
                            img.onclick = function () {
                                modal.style.display = "block";
                                modalImg.src = this.src;
                            }

                            // Get the <span> element that closes the modal
                            var span = document.getElementsByClassName("close")[0];

                            // When the user clicks on <span> (x), close the modal
                            span.onclick = function () {
                                modal.style.display = "none";
                            }
                        </script>
</body>

</html>