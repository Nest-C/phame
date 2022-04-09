<div>
    <?php
		$action = "admin_add_category.php";
		if (isset($_GET['ctid'])) {
			$ctid = $_GET['ctid'];
			$action = "admin_edit_category.php?ctid=" . $ctid;
			$qqq = "SELECT * FROM category WHERE ct_id = $ctid";
			$qq = mysqli_query($conn, $qqq);
			$q = mysqli_fetch_assoc($qq);
		}
	?>
	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">ประเภทสินค้า</h5>
			<button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
		</div>
		<form action="<?=$action?>" method="post" enctype="multipart/form-data">
			<div class="modal-body">
			<label>Name</label><br>
					<input type="text" name="name" required placeholder="Name" value="<?php echo isset($q) ? $q['ct_name']:""?>"><br><br>
			</div>
			<div class="modal-footer">
			<input type="submit" class="btn btn-primary" value="<?php echo isset($q) ? "Edit":"Add"?>">
				<button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
			</div>
			</div>
		</form>
	</div>
	</div>

</div>
<script>
	(function () {
		<?php 
		if(isset($_GET{'modal'})) : ?>
			const myModal = new mdb.Modal(document.getElementById('exampleModal'))
			myModal.show()
			<?php endif ?>
			const myModalEl = document.getElementById('exampleModal')
			myModalEl.addEventListener('hidden.mdb.modal', (e) => {
				go("admin_category.php");
			})
	})()
</script>
