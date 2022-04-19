<?php 
    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['username']);
        header('location: index.php');
    }

?> 
    <div style="background:#f99e9e">
            <div
            class="bg-image"
            style="
                background-image: url('./img/logotest1.png');
                Width: 25%;
                height:250px;
                top: 20%;
                left: 50%;
                -ms-transform: translate(-50%, -50%);
                transform: translate(-50%, -5%);
                "
        >
        </div>
    </div>  
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg nev-color">
        <!-- Container wrapper -->
        <div class="container-fluid">
            <!-- Toggle button -->
            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
                data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            <!-- Collapsible wrapper -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
         
                <!-- Left links -->
                <?php if (!isset($_SESSION['username'])) : ?>
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">หน้าแรก</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="product.php">สินค้า</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about_me.php">เกี่ยวกับเรา</a>
                        </li>
                        <li>
                        <div class="input-group rounded">
                            <input type="search" value="<?php echo isset($_GET['q']) ? $_GET['q']:""?>" onkeyup="event.keyCode == 13 ? go('product.php?q=' + event.target.value.toLowerCase()):null;" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                            <span class="input-group-text border-0" id="search-addon">
                                <i class="fas fa-search"></i>
                            </span>
                            </div>
                            </div>
                        </li>
                    </ul>
                <?php endif ?>
                <?php if (isset($_SESSION['username'])) : ?>
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">หน้าแรก</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="admin_product.php">สินค้า</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="admin_category.php">ประเภทสินค้า</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="admin_member.php">พนักงาน</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="admin_order.php">ออเดอร์</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="report.php">รายงาน</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"> </a>
                        </li>
                        <li>
                        <div class="input-group rounded">
                        <input type="search" value="<?php echo isset($_GET['q']) ? $_GET['q']:""?>" onkeyup="event.keyCode == 13 ? go('product.php?q=' + event.target.value.toLowerCase()):null;" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                            <span class="input-group-text border-0" id="search-addon">
                                <i class="fas fa-search"></i>
                            </span>
                            </div>
                            </div>
                        </li>
                    </ul>
                <?php endif ?>
                <!-- Left links -->
            </div>
            </div>
            <!-- Right elements -->
            <div class="d-flex align-items-center me-3">
                <?php if (isset($_SESSION['username'])) : ?>
                    <div class="dropdown" style="background:#F1E1A6">
                        <button
                            class="btn dropdown-toggle"
                            type="button"
                            id="dropdownMenuButton"
                            data-mdb-toggle="dropdown"
                            aria-expanded="false"
                        >
                        <?php echo $_SESSION['username']; ?>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="background:#efe5c1">
                            <li><a class="dropdown-item" href="admin_member.php">Member</a></li>
                            <li><a class="dropdown-item" href="index.php?logout='1'">Logout</a></li>
                        </ul>
                         
                    </div>
                <?php endif ?>
                <?php if (!isset($_SESSION['username'])) : ?>
                    <a style="background:#f99e9e" href="login.php"  class="btn btn-outline btn-rounded" data-mdb-ripple-color="dark">Login</a>
                <?php endif ?>
            </div>
        </div>
        <!-- Container wrapper -->
    </nav>
    <!-- Navbar -->

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.2/mdb.min.js"></script>
  