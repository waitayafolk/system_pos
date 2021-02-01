        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3"> <h5>ร้านค้าปลีก-ส่ง </h5></div>
            </a>
            <hr class="sidebar-divider my-0">
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                บันทึกประจำวัน
            </div>
            <li class="nav-item">
                <a class="nav-link" href="?mymenu=dashbord">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Dashbord</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed <?php echo $open_home; ?>" href="?mymenu=home" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>บันทึกประจำวัน</span>
                </a>

                <?php
                if($mymenu == ""){
                    $open_info  = "";
                    $active_info  = "";
                    $open_info_groupproduct  = "";
                    $active_info_group  = "";
                    $active_info_product  = "";
                }
                if($mymenu == "sale"){
                    $open_info  = "show";
                    $active_info  = "active";
                }else if($mymenu == "group"){
                    $open_info_groupproduct  = "show";
                    $active_info_group  = "active";
                }else if($mymenu == "product"){
                    $open_info_groupproduct  = "show";
                    $active_info_product  = "active";
                }
                ?>
                <div id="collapseTwo" class="collapse <?php echo $open_info; ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!-- <h6 class="collapse-header">Custom Components:</h6> -->
                        <a class="collapse-item <?php echo $active_info; ?>" href="?mymenu=sale">ขายสินค้า</a>
                        <!-- <a class="collapse-item <?php echo $active_info; ?>" href="#">Cards</a> -->
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Product (สินค้า)</span>
                </a>
                <div id="collapseUtilities" class="collapse <?php echo $open_info_groupproduct; ?>" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">จัดการสินค้า/กลุ่มสินค้า:</h6>
                        <a class="collapse-item <?php echo $active_info_group; ?>" href="?mymenu=group">ประเภทสินค้า</a>
                        <a class="collapse-item <?php echo $active_info_product; ?>" href="?mymenu=product">จัดการสินค้า</a>
                    </div>
                </div>
            </li>
            <!-- <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Addons
            </div> -->
            <li class="nav-item">
                <a class="nav-link" href="?mymenu=stock">
                    <i class="fas fa-fw fa-cog"></i>
                    <span> รับเข้าสต๊อก (Stock)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?mymenu=report_stock">
                    <i class="fas fa-fw fa-cog"></i>
                    <span> สต๊อกสินค้า (Report Stock)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?mymenu=user">
                    <i class="fas fa-fw fa-user"></i>
                    <span>User (ผู้จัดการระบบ)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" ng-click="logout()">
                    <i class="fas fa-fw fa-logout"></i>
                    <span>Logout</span></a>
            </li>
        </ul>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                    </button>
                    <div class="text-right">
                        <h4>ระบบขายหน้าร้าน </h4>
                    </div>
                </nav>
                <div class="container-fluid">
                    <?php 
                        if ($mymenu == "sale") {
                        include("404.php");
                        }
                        if ($mymenu == "group") {
                        include("product_group.php");
                        }
                        if ($mymenu == "product") {
                        include("product.php");
                        }
                        if ($mymenu == "user") {
                        include("user.php");
                        }
                        if ($mymenu == "stock") {
                            include("stock.php");
                        }else if ($mymenu == "dashbord") {
                            include("dashbord.php");
                        }if ($mymenu == "report_stock") {
                            include("404.php");
                        }
                        ?>
                </div>
            </div>
        </div>
    </div>

