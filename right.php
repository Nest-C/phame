<div class="raise right" style="display: inline-block;">
    <div class="input-group rounded">
        <div<input type="text" value="<?php echo isset($_GET['q']) ? $_GET['q']:""?>" onkeyup="event.keyCode == 13 ? go('product.php?q=' + event.target.value.toLowerCase()):null;"  class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon"/></div>>
        <span class="input-group-text border-0" id="search-addon">
        <i class="fas fa-search"></i>
        </span>
        </div>
    </div>
</div>