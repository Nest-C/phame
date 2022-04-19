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
	<!-- Carousel wrapper -->
<div id="carouselBasicExample" class="carousel slide carousel-fade" data-mdb-ride="carousel">
  <!-- Indicators -->
  <div class="carousel-indicators">
    <button
      type="button"
      data-mdb-target="#carouselBasicExample"
      data-mdb-slide-to="0"
      class="active"
      aria-current="true"
      aria-label="Slide 1"
    ></button>
    <button
      type="button"
      data-mdb-target="#carouselBasicExample"
      data-mdb-slide-to="1"
      aria-label="Slide 2"
    ></button>
    <button
      type="button"
      data-mdb-target="#carouselBasicExample"
      data-mdb-slide-to="2"
      aria-label="Slide 3"
    ></button>
  </div>

  <!-- Inner -->
  <div class="carousel-inner" align="center">
    <!-- Single item -->
    <div class="carousel-item active">
		<!-- รูปภาพพพพพพ -->
      <img src="./img/1132303.png" class="d-block w-75 h-75" alt="Sunset Over the City"/>
      <div class="carousel-caption d-none d-md-block">
        <h5>First slide label</h5>
        <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
      </div>
    </div>

    <!-- Single item -->
    <div class="carousel-item">
		<!-- รูปภาพพพพพพ -->
		<img src="./img/1139149.png" class="d-block w-75 h-75" alt="Canyon at Nigh"/>
		<div class="carousel-caption d-none d-md-block">
        <h5>Second slide label</h5>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
	</div>
</div>

<!-- Single item -->
<div class="carousel-item">
		<!-- รูปภาพพพพพพ -->
      <img src="./img/1194118.png" class="d-block w-75 h-75" alt="Cliff Above a Stormy Sea"/>
      <div class="carousel-caption d-none d-md-block">
        <h5>Third slide label</h5>
        <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
      </div>
    </div>
  </div>
  <!-- Inner -->

  <!-- Controls -->
  <button class="carousel-control-prev" type="button" data-mdb-target="#carouselBasicExample" data-mdb-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-mdb-target="#carouselBasicExample" data-mdb-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<!-- Carousel wrapper -->
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

	<script>
		const myCarousel = document.querySelector('#myCarousel');
		const carousel = new mdb.Carousel(myCarousel);
	</script>
</body>

</html>