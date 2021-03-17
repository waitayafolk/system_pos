<?php 
session_start(); 
$level = $_SESSION["level"];
$name = $_SESSION["name"];
// print_r($name);exit();
if($level == 'admin'){
    echo '
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3"> <h5> ชื่อผู้ใช้งาน '.$name.' </h5></div>
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
                <a class="nav-link" href="?mymenu=sale">
                    <i class="fas fa-fw fa-cog"></i>
                    <span> ขายสินค้า (sale)</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="?mymenu=group">
                    <i class="fas fa-fw fa-cog"></i>
                    <span> ประเภทสินค้า </span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="?mymenu=product">
                    <i class="fas fa-fw fa-cog"></i>
                    <span> จัดการสินค้า </span></a>
            </li>

            <li class="nav-item">
            <a class="nav-link" href="?mymenu=bill_sale">
                <i class="fas fa-fw fa-cog"></i>
                <span> จัดการบิล </span></a>
            </li>

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
    ';
}else if($level == 'sale'){
    echo '
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3"> <h5> ชื่อผู้ใช้งาน '.$name.' </h5></div>
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
                <a class="nav-link" href="?mymenu=sale">
                    <i class="fas fa-fw fa-cog"></i>
                    <span> ขายสินค้า (sale)</span></a>
            </li>

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
                <a class="nav-link" ng-click="logout()">
                    <i class="fas fa-fw fa-logout"></i>
                    <span>Logout</span></a>
            </li>
        </ul>
    ';
    
}if($level == 'member'){
    echo '
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3"> <h5> ชื่อผู้ใช้งาน '.$name.' </h5></div>
            </a>
            <hr class="sidebar-divider my-0">
            <hr class="sidebar-divider">
            <li class="nav-item">
                <a class="nav-link" href="?mymenu=report_stock">
                    <i class="fas fa-fw fa-cog"></i>
                    <span> สต๊อกสินค้า (Report Stock)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" ng-click="logout()">
                    <i class="fas fa-fw fa-logout"></i>
                    <span>Logout</span></a>
            </li>
        </ul>
    ';   
}

?>
        
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                    </button>
                    <div class="text-right">
                        <h4>ระบบขายหน้าร้าน  </h4>
                    </div>
                </nav>
                <div class="container-fluid">
                    <?php 
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
                            include("report_stock.php");
                        }if ($mymenu == "sale") {
                            include("sale.php");
                        }if ($mymenu == "bill_sale"){
                            include("bill_sale.php");
                        }
                        ?>
                </div>
            </div>
        </div>
    </div>

