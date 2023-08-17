<?php
session_start();
if(!isset($_SESSION['email-ad'])){
    header("Location:../Account/Login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="../assets/css/grid.css">
    <link rel="stylesheet" href="../assets/css/responsive.css">
    <link rel="stylesheet" href="../assets/css/manager.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="../assets/fonts/fontawesome-free-6.4.0-web/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400;700&display=swap"
          rel="stylesheet">
    <title>WEB MANAGER</title>
</head>

<body>
<?php
include_once '../Layout/Header.php';
include_once '../../Connects/open.php';
$sqlBooks ="SELECT count(id) as count_id from books";
$books = mysqli_query($connect,$sqlBooks);
$sqlAuthor ="SELECT count(id) as count_id from authors";
$author = mysqli_query($connect,$sqlAuthor);
$sqlCategory ="SELECT count(id) as count_id from categories";
$category = mysqli_query($connect,$sqlCategory);
$sqlPublisher ="SELECT count(id) as count_id from publishers";
$publisher = mysqli_query($connect,$sqlPublisher);
$sqlCustomers = " SELECT count(id) as count_id from customer";
$customer = mysqli_query($connect,$sqlCustomers);
$sqlOrders = " SELECT count(id) as count_id from orders";
$orders = mysqli_query($connect,$sqlCustomers);
include_once '../../Connects/close.php';
?>
<div class="grid">
    <div class="row sm-gutter ">
        <div class="col l-3">
            <div class="menu-right">
               <!-- <form role="search">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search">
                    </div>
                </form>-->
                <ul class="nav menu">
                    <li class="active">
                        <a href="Manager.php">
                            <svg class="glyph stroked dashboard-dial">
                                <use xlink:href="#stroked-dashboard-dial"></use>
                            </svg>
                            <i class="fa-solid fa-gauge" style="margin-right:8px"></i>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="../Customers/Index.php">
                            <svg class="glyph stroked male user"> <!---->
                                <use xlink:herf="#stroked-male-user"></use>
                            </svg>
                            <i class="fa-solid fa-person-military-pointing" style="margin-right:8px"></i>
                            Quản lí thành viên
                        </a>
                    </li>
                    <li>
                        <a href="../Category_manager/Index.php">
                            <svg class="glyph stroked open folder">
                                <use xlink:herf="#stroked-open-folder"></use>
                            </svg>
                            <i class="fa-solid fa-folder-open" style="margin-right:8px"></i>
                            Quản lí danh mục
                        </a>
                    </li>
                    <li>
                        <a href="../Books/Index.php">
                            <svg class="glyph stroked bag ">
                                <use xlink:herf="#stroked-bag"></use>
                            </svg>
                            <i class="fa-solid fa-bag-shopping" style="margin-right:8px"></i>
                            Quản lí sản phẩm
                        </a>
                    </li>
                    <li>
                        <a href="../Cart/index.php">
                            <svg class="glyph stroked two massege">
                                <use xlink:herf="#stroked-two-massege"></use>
                            </svg>
                            <i class="fa-solid fa-comment" style="margin-right:8px"></i>
                            Quản lí đơn hàng
                        </a>
                    </li>
                    <li>
                        <a href="../publishers/Index.php">
                            <svg class="glyph stroked chain">
                                <use xlink:herf="#stroked-chain"></use>
                            </svg>
                            <i class="fa-solid fa-rectangle-ad" style="margin-right:8px"></i>
                            Quản lí nhà xuất bản
                        </a>
                    </li>

                    <li>
                        <a href="../Author/Index.php">
                            <svg class="glyph stroked gear">
                                <use xlink:herf="#stroked-gear"></use>
                            </svg>
                            <i class="fa-solid fa-pen-nib" style="margin-right:8px"></i>
                            Tác giả
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col l-9">
            <div class="menu-left">
                <ul class="icon-and-title">
                    <li class="icon-home">
                        <a href="" class="breadcrumb">
                            <i class="fa-solid fa-house" style="margin-right: 10px;"></i>
                            Trang chủ quản trị
                        </a>
                    </li>
                </ul>
                <h1 class="page-header">Trang Chủ Quản Trị</h1>

                <div class="danhmuc-sanpham">
                    <ul class="icon-sanpham-and-number">
                        <li class="icon-number-product">
                            <a href="../Books/Index.php" class="dieuhuong">
                                <i class="fa-solid fa-bag-shopping" style="font-size:60px"></i>
                               <?php foreach ($books as $book){?>
                               <span><?= $book['count_id']?> Sản phẩm</span>
                               <?php }?>
                            </a>
                        </li>
                        <br>
                        <li class="icon-number-comment">
                            <a href="../Customers/Index.php" class="dieuhuong">
                                <i class="fa-solid fa-circle-user" style="font-size:60px"></i>
                                <span><?php foreach ($customer as $cus){?>
                                        <span><?= $cus['count_id']?> Khách Hàng</span>
                                    <?php }?></span>
                            </a>
                        </li>
                        <br>
                        <li class="icon-number-member">
                            <a href="../Category_manager/Index.php" class="dieuhuong">
                                <i class="fa-solid fa-list" style="font-size:60px"></i>
                                <span><?php foreach ($category as $cat){?>
                                        <span><?= $cat['count_id']?> Danh mục</span>
                                    <?php }?></span>
                            </a>
                        </li>
                        <br>
                        <li class="icon-number-ad">
                            <a href="../publishers/Index.php" class="dieuhuong">
                                <i class="fa-solid fa-industry" style="font-size:60px"></i>
                                <span><?php foreach ($publisher as $pub){?>
                                        <span><?= $pub['count_id']?> Nhà xuất bản</span>
                                    <?php }?></span>
                            </a>
                        </li>
                        <li class="icon-number-ad" style="margin-top: 20px; margin-bottom: 20px; background: blue">
                            <a href="../Cart/index.php" class="dieuhuong">
                                <i class="fa-solid fa-cart-shopping" style="font-size:60px"></i>
                                <span><?php foreach ($orders as $order){?>
                                        <span><?= $order['count_id']?> Đặt Hàng</span>
                                    <?php }?></span>
                            </a>
                        </li>
                        <li class="icon-number-comment" style="background: brown ">
                            <a href="../Author/Index.php" class="dieuhuong">
                                <i class="fa-solid fa-feather" style="font-size:60px"></i>
                                <span><?php foreach ($author as $au){?>
                                        <span><?= $au['count_id']?> Tác Giả</span>
                                    <?php }?></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

</html>