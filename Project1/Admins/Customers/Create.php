<?php
//Cho phÃ©p lÃ m viá»‡c vá»›i session
session_start();
//Kiá»ƒm tra tá»“n táº¡i email trÃªn session hay chÆ°a, náº¿u Ä‘Ã£ tá»“n táº¡i thÃ¬ cho nháº£y sang trang khÃ¡c
if(!isset($_SESSION['email'])){
    header("Location:../home/login.php");
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
    <title>Add a customer</title>
    <style>
        .a{
            position: relative;
            width: 100%;
            height: 500px;
            justify-content: center;
            align-items: center;
            display: flex;
        }
        .b{
            position: absolute;
            width: 400px;
            height: 100px;
            justify-content: center;
            align-items: center;
            display: flex;
        }
    </style>
    <?php
    include_once '../../Connects/open.php';
    $sql = "SELECT * FROM customer";
    $customer = mysqli_query($connect, $sql);
    include_once '../../Connects/close.php';
    ?>
</head>
<body>
<div class="grid">
    <div class="row sm-gutter ">
        <div class="col l-3">
            <div class="menu-right">
                <form role="search">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search">
                    </div>
                </form>
                <ul class="nav menu">
                    <li >
                        <a href="../Layout/Manager.php">
                            <svg class="glyph stroked dashboard-dial">
                                <use xlink:href="#stroked-dashboard-dial"></use>
                            </svg>
                            <i class="fa-solid fa-gauge" style="margin-right:8px"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="active">
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
                        <a href="" class="breadcrumb" style="pointer-events: none">
                            <i class="fa-solid fa-folder-open" style="margin-right: 10px;"></i>
                            Thêm khách hàng
                        </a>
                    </li>
                </ul>
                <h1 class="page-header"> Thêm khách hàng </h1>
                <form action="store.php" role="form" method="post">
                    <div class="form-group">
                        <label style="font-size: 2rem">Tên khách hàng</label>
                        <input name="name" required class="form-control" placeholder="" style="background-color: rgb(217, 217, 217); color: rgb(154, 156, 156);">
                    </div>
                    <div class="form-group">
                        <label style="font-size: 2rem">Email</label>
                        <input name="email" required class="form-control" placeholder="" style="background-color: rgb(217, 217, 217); color: rgb(154, 156, 156);">
                    </div>
                    <div class="form-group">
                        <label style="font-size: 2rem">Mật khẩu</label>
                        <input name="password" required class="form-control" placeholder="" style="background-color: rgb(217, 217, 217); color: rgb(154, 156, 156);">
                    </div>
                    <div class="form-group">
                        <label style="font-size: 2rem">Số điện thoại</label>
                        <input name="phone" required class="form-control" placeholder="" style="background-color: rgb(217, 217, 217); color: rgb(154, 156, 156);">
                    </div>
                    <div class="form-group">
                        <label>Giới tính</label>
                        <select name="gender" class="form-control">
                            <option value="1">Nam</option>
                            <option value="0">Nữ</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label style="font-size: 2rem">Địa chỉ</label>
                        <input name="address" required class="form-control" placeholder="" style="background-color: rgb(217, 217, 217); color: rgb(154, 156, 156);">
                    </div>
                    <button class="btn-default" style="font-size: 1.25rem">Thêm khách hàng</button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>