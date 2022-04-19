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
	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content" style="background:#F4BBBB">
		<div class="modal-header" style="background:#F1E1A6" >
			<h5 class="modal-title" id="exampleModalLabel"><?php echo isset($q) ? "แก้ไขผู้ใช้":"เพิ่มผู้ใช้"?></h5>
			<button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
		</div>
		<div class="modal-body">
			<form action="<?=$action?>" method="post" enctype="multipart/form-data">
				<label>Name</label><br>
				<input type="text" name="name" required placeholder="ชื่อผู้ใช้" value="<?php echo isset($q) ? $q['Emp_Name']:""?>"><br><br>
				<label>Phone</label><br>
				<input type="text" name="phone" required placeholder="เบอร์โทร" value="<?php echo isset($q) ? $q['Emp_Phone']:""?>"><br><br>
				<label>Address</label><br>
				<input type="text" name="address" required placeholder="เบอร์โทร" value="<?php echo isset($q) ? $q['Emp_Add']:""?>"><br><br>
				<label>Password</label><br>
				<input type="text" name="password" required placeholder="รหัสผ่าน" value="<?php echo isset($q) ? $q['password']:""?>"><br><br>
				<div align="right">
				<input style="background:#c1ffb0" type="submit" class="btn" value="<?php echo isset($q) ? "Edit":"Add"?>">
				<button style="background:#F1E1A6"  type="button" class="btn" data-mdb-dismiss="modal">Close</button>
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
			const myModalEl = document.getElementById('exampleModal')
			myModalEl.addEventListener('hidden.mdb.modal', (e) => {
				go("admin_member.php");
			})
	})()
</script>
