<div class="mt-4 ms-3">
	<div class="list-group">
        <div class="list-group-item" onclick="go('product.php')">สินค้าทั้งหมด</div>
        <?php
			$qct = "SELECT * FROM category";
			$ect  = mysqli_query($conn, $qct);
			while ($ct = mysqli_fetch_array($ect)) {
		?>
	  <div class="list-group-item" onclick="go('product.php?ctid=<?=$ct['ct_id']?>')"><?=$ct['ct_name']?></div>
        <?php
			}
		?>
    </div>
    
    
    </div>
</div>
<script>
	function filter_price(e) {
		if (e.keyCode === 13) {
			var var_min = document.getElementById("min").value;
			var var_max = document.getElementById("max").value;
			go('product.php' + '<?php echo isset($_GET['q']) ? "?q=" . $_GET['q'] . "&": "?"?>' + 'min=' + (var_min  == "" ? 0: var_min) + '&max=' + (var_max == "" ? 100000: var_max));	
		}
	}
</script>