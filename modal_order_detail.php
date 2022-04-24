<div>
    <?php
		$action = "admin_add_member.php";
		if (isset($_GET['orid'])) {
			$orid = $_GET['orid'];
            $qqq = "SELECT * FROM `order`  WHERE `order`.Or_id = $orid";
			$qq = mysqli_query($conn, $qqq);
			$q = mysqli_fetch_assoc($qq);
	?>
	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
		<div class="modal-content" style="background:#F4BBBB">
		<div class="modal-header" style="background:#F1E1A6" >
			<h5 class="modal-title" id="exampleModalLabel">รายละเอียด</h5>
			<button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
		</div>
		<div class="modal-body">
			<!-- <form action="<?=$action?>" method="post" enctype="multipart/form-data"> -->
				<table class="table align-left mb-0 bg-while">
					<tbody>
						<tr>
							<td style="background:#97DBAE">
								Order ID
							</td>
							<td style="background:#ffffff">
								000<?php echo $q['Or_id'] ?>
							</td>
						</tr>
						<tr>
							<td style="background:#97DBAE">
								วันที่สั่งซื้อ
							</td>
							<td style="background:#ffffff">
								<?php echo $q['Order_date'] ?>
							</td>
						</tr>
						<tr>
							<td style="background:#97DBAE">
								ชื่อ
							</td>
							<td style="background:#ffffff">
								<?php echo $q['Or_name'] ?>
							</td>
						</tr>
						<tr>
							<td style="background:#97DBAE">
								ที่อยู่
							</td>
							<td style="background:#ffffff">
								<?php echo $q['Or_add'] ?>
							</td>
						</tr>
						<tr>
							<td style="background:#97DBAE">
								เบอร์โทร
							</td>
							<td style="background:#ffffff">
								<?php echo $q['Or_tel'] ?>
							</td>
						</tr>
					</tbody>
				</table>

				<div style="margin:5px;margin-top:10px; color:black">
					รายการสินค้า
				</div>

				<table style="margin-top:5px" class="table align-left mb-0 bg-white">
					<thead style="background:#97DBAE">
						<tr>
							<th>ชื่อสินค้า</th>
							<th>จำนวน</th>
							<th>ราคา</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$sql = "SELECT * FROM `order_detail` INNER JOIN `product` ON `product`.pd_id = `order_detail`.pd_id  WHERE order_detail.Or_id = $orid ";
							$ex = mysqli_query($conn, $sql);
							$index = 1;
							while ($rs = mysqli_fetch_array($ex)) {
								?>
								<tr>
									<td class="bg-light">
										<?=$rs['pd_name']?>
									</td>
									<td style="background:#ffffff">
										<?=$rs['Order_amount']?>
									</td>
									<td style="background:#ffffff">
										<?=$rs['pd_price']?>
									</td>
								</tr>

							<?php
							$index++;
							}
							?>
						
					</tbody>
				</table>
						
				<table style="margin-top:20px;background:#fed9d9;font-weight: bold;font-size: 20px"  class="table align-left mb-0">
					<tbody>
						<tr>
							<td>
								รวมราคา
							</td>
							<td>
								<?php echo $q['Or_total'] ?> 
							</td>
							<td>
								บาท
							</td>
						</tr>
					</tbody>
				</table>
                
				<div align="right">
					<button style="background:#F1E1A6;margin-top:20px"  type="button" class="btn" data-mdb-dismiss="modal">Close</button>
			    </div>
			</div>
		</div>
		</div>
	</div>
	</div>
		<?php
			}
		?>
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
				go("admin_order.php");
			})
	})()
</script>
