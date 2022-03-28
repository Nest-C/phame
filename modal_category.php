<div>
	<div align="center" class="divider">
    	<div class="right item" onclick="go(window.location.pathname);">&times;</div>
    	<h2>Category</h2>
        <div class="clear"></div>
    </div>
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
    <form action="<?=$action?>" method="post" enctype="multipart/form-data">
        <div class="divider">
        
        	<label>Name</label><br>
            <input type="text" name="name" required placeholder="Name" value="<?php echo isset($q) ? $q['ct_name']:""?>"><br><br>
            
        </div>
        <div align="right">
        	<input type="submit" class="btn red" value="<?php echo isset($q) ? "Edit":"Add"?>">
        </div>
    </form>
</div>