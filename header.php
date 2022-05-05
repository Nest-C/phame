<?php 
    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['username']);
        header('location: product.php');
    }

?>
<div class="head-search">
    <div>
        <img src="./img/logo-nav.png" alt="Paris" width="130" height="90">
        <div class="input-group rounded">
        <input type="search" value="<?php echo isset($_GET['q']) ? $_GET['q']:""?>"
                onkeyup="event.keyCode == 13 ? go('product.php?q=' + event.target.value.toLowerCase()):null;"
                class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
        </div>
    </div>
</div>
<div class="container-head">
    <div class="container-nav">
        <div class="inner-search">
             <div>
                    <?php if (!isset($_SESSION['username'])) : ?>
                        <ul>
                            <li><a href="index.php">หน้าแรก</a></li>
                            <li><a href="product.php">สินค้า</a></li>
                            <li><a href="about_me.php">เกี่ยวกับเรา</a></li>
                        </ul>
                    <?php endif ?>
                    <?php if (isset($_SESSION['username'])) : ?>
                    <ul>
                        <li><a href="index.php">หน้าแรก</a></li>
                        <li><a href="admin_product.php">สินค้า</a></li>
                        <li><a href="admin_category.php">ประเภทสินค้า</a></li>
                        <li><a href="admin_member.php">พนักงาน</a></li>
                        <li><a href="admin_order.php">คำสั่งซื้อ</a></li>
                        <li><a href="report.php">รายงาน</a></li>
                    </ul>
                    <?php endif ?>
            </div>
            <div>
                <?php if (isset($_SESSION['username'])) : ?>
                <div class="dropdown">
                    <button class="dropbtn">
                        <?php echo $_SESSION['username']; ?>
                    </button>
                    <div class="dropdown-content">
                        <a href="admin_member.php">Member</a>
                        <a href="product.php?logout='1'">Logout</a>
                    </div>
                </div>
                <?php endif ?>
                <?php if (!isset($_SESSION['username'])) : ?>
                    <a href="#" class="myButton" onclick="go('login.php');">login</a>
                <?php endif ?>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.2/mdb.min.js"></script>