<div>
    <?php
		$action = "admin_member.php";
		if (isset($_GET['empid'])) {
			$empid = $_GET['empid'];
			$action = "admin_edit_category.php?empid=" . $empid;
			$qqq = "SELECT * FROM category WHERE Emp_id = $empid";
			$qq = mysqli_query($conn, $qqq);
			$q = mysqli_fetch_assoc($qq);
		}
	?>
	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">เพิ่มผู้ใช้</h5>
			<button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
		</div>
		<div class="modal-body">
		<label>Name</label><br>
				<input type="text" name="name" required placeholder="Name" value="<?php echo isset($q) ? $q['Emp_Name']:""?>"><br><br>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-primary"><?php echo isset($q) ? "Edit":"Add"?></button>
		</div>
		</div>
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
	})()
</script>

