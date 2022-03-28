<div>
    <?php
		$action = "admin_add_product.php";
		if (isset($_GET['pdid'])) {
			$pdid = $_GET['pdid'];
			$action = "admin_edit_product.php?pdid=". $pdid;
			$qqq = "SELECT * FROM product WHERE pd_id = $pdid";
			$qq = mysqli_query($conn, $qqq);
			$q = mysqli_fetch_assoc($qq);
		}
	?>
    
	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
			<form action="<?=$action?>" method="post" enctype="multipart/form-data">
			<div class="divider">
			
				<label>Name</label><br>
				<input type="text" name="name" required placeholder="Name" value="<?php echo isset($q) ? $q['pd_name']:""?>"><br><br>
				<label>Category</label><br>
				<select name="ctid">
					<?php
						$qct = "SELECT * FROM category";
						$ect = mysqli_query($conn, $qct);
						while ($ct = mysqli_fetch_array($ect)) {
					?>
							<option value="<?=$ct['ct_id']?>" <?php echo isset($q) && $q['ct_id'] == $ct['ct_id'] ? "selected":""?>><?=$ct['ct_name']?></option>
					<?php
						}
					?>
				</select><br><br>
				<label>Detail</label><br>
				<textarea name="detail" required="required"><?php echo isset($q) ? strip_tags($q['pd_detail'], "<br />"):""?></textarea><br><br>
				<label>Price</label><br>
				<input type="text" name="price" required placeholder="Price" pattern="[0-9]+" value="<?php echo isset($q) ? $q['pd_price']:""?>"><br><br>
				<label>Onhand</label><br>
				<input type="text" name="onhand" required placeholder="Onhand" value="<?php echo isset($q) ? $q['pd_onhand']:""?>"><br><br>
				<label>Images</label><br>
				<input type="file" multiple="multiple" name="img[]" <?php echo isset($q) ? "":"required"?>><br><br>
				<div>
				<?php
					if (isset($_GET['pdid'])) {
						$qimg = "SELECT * FROM images WHERE pd_id = " . $pdid;
						$eimg = mysqli_query($conn, $qimg);
						while ($img = mysqli_fetch_array($eimg)) {
						?>
							<div class="item" onclick="confirm('Are you sure to remove this images?') ? go('admin_delete_images.php?imgid=<?=$img['img_id']?>'):null">&times;</div>
							<img width="150" src="images/<?=$img['img_name']?>" />
						<?php
						}
					}
				?>
				</div>
			</div>
			<div align="right">
				<input type="submit" class="btn btn-primary" value="<?php echo isset($q) ? "Edit":"Add"?>">
				<button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
			</div>
		</form>
        </div>
       
      </div>
    </div>
  </div>
</div>