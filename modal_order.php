<?php
	$action = "admin_add_order.php";
	$sql = "SELECT * FROM product";
?>
<div>
	<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content" style="background:#F4BBBB">
		<div class="modal-header" style="background:#F1E1A6" >
			<h5 class="modal-title" id="exampleModalLabel">เพิ่มรายการสั่งซื้อ</h5>
			<button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
		</div>
		<div class="modal-body" >
			<form   action="<?=$action?>" method="post" enctype="multipart/form-data">
			<dvi style="height:auto;" class="row justify-content-center">
				<div class="col-6">
					<label>วันที่ซื้อ</label><br>
					<label class="mb-3">
						<?php
							echo gmdate('d/m/Y h:i', time());
						?>
					</label><br>
					<label>ชื่อลูกค้า</label><br>
					<input type="text" name="name"  placeholder="ชื่อผู้ใช้" value=""><br><br>
					<label>Phone</label><br>
					<input type="text" name="phone"  placeholder="เบอร์โทร" value=""><br><br>
					<label>Address</label><br>
					<input type="text" name="address"  placeholder="ที่อยู่" value=""><br><br>
					
					</div>
					<div class="col-6">
						<div id="add_more" class="row" style="">
							<label  style="margin-top:15px" for="cars">สินค้า</label>
							<select name="productItem[]" id="productItem">
								<?php
									$ex = mysqli_query($conn, $sql); while
									($rs = mysqli_fetch_array($ex)) {  
										?>
											<option value="<?=$rs['pd_id']?>">
												<?=$rs['pd_name']?>	
											</option>
										<?php
											}
										?>
							</select>
							<label style="padding-top:16px">จำนวน</label><br>
							<input type="text" name="kilograms[]"  placeholder="จำนวน (กก.)" value=""><br>
						</div>
						<div id="moremore">

						</div>
						<button onclick="addmore()" type="button" style="margin-left: 7em; margin-top:15px" class="btn btn-success btn-floating" >+</button>
					</div>
				</dvi>
				<div style="margin-top:20px" align="right">
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
			const myModalEl = document.getElementById('exampleModal1')
			myModalEl.addEventListener('hidden.mdb.modal', (e) => {
				go("admin_order.php");
			})
	})()
	function addmore() {
		let moreitem = document.getElementById('add_more')
		let m_more = moreitem.cloneNode(true)
		document.getElementById('moremore').appendChild(m_more)
	}
</script>
