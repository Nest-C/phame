<div>
    <?php
		$action = "admin_add_member.php";
		if (isset($_GET['mbid'])) {
			$empid = $_GET['mbid'];
			$action = "admin_edit_member.php?empid=" . $empid;
			$qqq = "SELECT * FROM user WHERE Emp_id = $empid";
			$qq = mysqli_query($conn, $qqq);
			$q = mysqli_fetch_assoc($qq);
		}
	?>
	<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">เพิ่มรายการสั่งซื้อ</h5>
			<button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
		</div>
		<div class="modal-body">
			<form action="<?=$action?>" method="post" enctype="multipart/form-data">
				<label>วันที่ซื้อ</label><br>
                <label class="mb-3">
                <?php
                    echo gmdate('Y-m-d h:i:s', time());
                    ?></label><br>
                <label>ชื่อลูกค้า</label><br>
				<input type="text" name="name" required placeholder="ชื่อผู้ใช้" value="<?php echo isset($q) ? $q['Emp_Name']:""?>"><br><br>
				<label>Phone</label><br>
				<input type="text" name="phone" required placeholder="เบอร์โทร" value="<?php echo isset($q) ? $q['Emp_Phone']:""?>"><br><br>
				<label>Address</label><br>
				<input type="text" name="address" required placeholder="ที่อยู่" value="<?php echo isset($q) ? $q['Emp_Add']:""?>"><br><br>
				<label>สินค้า</label><br>
				<input type="text" name="address" required placeholder="ที่อยู่" value="<?php echo isset($q) ? $q['Emp_Add']:""?>"><br><br>
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

</div>

<script>
	(function () {
		<?php 
		if(isset($_GET{'modal'})) : ?>
			const myModal = new mdb.Modal(document.getElementById('exampleModal'))
			myModal.show()
			<?php endif ?>
			const myModalEl = document.getElementById('exampleModal1')
			myModalEl.addEventListener('hidden.mdb.modal', (e) => {
				go("admin_order.php");
			})
	})()
</script>
