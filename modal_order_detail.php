<div>
    <?php
		$action = "admin_add_member.php";
		if (isset($_GET['orid'])) {
			$orid = $_GET['orid'];
            $qqq = "SELECT * FROM `order` INNER JOIN order_detail ON `order_detail`.Or_id = `order`.Or_id";
			$qq = mysqli_query($conn, $qqq);
			$q = mysqli_fetch_assoc($qq);
            $rs = mysqli_fetch_array($qq)
           ;
		}
	?>
	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
		<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">รายละเอียด</h5>
			<button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
		</div>
		<div class="modal-body">
			<!-- <form action="<?=$action?>" method="post" enctype="multipart/form-data"> -->
                <form enctype="multipart/form-data">
                    <label>Order ID  :  0000<?php echo $q['Or_id'] ?></label><br>
                    <label>วันที่สั่งซื้อ  :  <?php echo $q['Order_date'] ?></label><br>
                    <label>ชื่อ  :  <?php echo $q['Or_name'] ?> </label><br>
                    <label>ที่อยู่  :  <?php echo $q['Or_add'] ?> </label><br>
                    <label>เบอร์โทร  :  <?php echo $q['Or_tel'] ?> </label><br>
                    <?php
                        $sql = "SELECT * FROM `order_detail` INNER JOIN `product` ON `product`.pd_id = `order_detail`.pd_id";
                        $ex = mysqli_query($conn, $sql);
                        $index = 1;
                        while ($rs = mysqli_fetch_array($ex)) {
                            ?>
                        <div class="m-3">
                            สินค้ารายการที่ <?=$index?> : <?=$rs['pd_name']?><br>
                            จำนวน <?=$rs['Order_amount']?><br>
                            ราคาต่อชิ้น <?=$rs['pd_price']?><br>
                        </div>
                        <?php
                         $index++;
                        }
                        ?><br>
                    <label>รวมราคา  :  <?php echo $q['Or_total'] ?> </label><br>
				<div align="right">
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
			const myModalEl = document.getElementById('exampleModal')
			myModalEl.addEventListener('hidden.mdb.modal', (e) => {
				go("admin_order.php");
			})
	})()
</script>
