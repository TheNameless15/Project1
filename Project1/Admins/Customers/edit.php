<?php
session_start();
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
    <title>Update a customer</title>
</head>
<?php
$id = $_GET['id'];
include_once '../../Connects/open.php';
$sql = "SELECT * FROM customer WHERE id = '$id'";
$customers = mysqli_query($connect, $sql);
include_once '../../Connects/close.php';
?>
<!--<form method="post" action="Update.php">

    <input type="hidden" name="id" value="<?php /*= $customer['id'] */?>">
    Name: <input type="text" name="name" value="<?php /*= $customer['name'] */?>"><br>
    Email: <input type="text" name="email" value="<?php /*= $customer['email'] */?>"><br>
    Password: <input type="text" name="password" value="<?php /*= $customer['password'] */?>"><br>
    Phone: <input type="text" name="phone" value="<?php /*= $customer['phone'] */?>"><br>
    Gender: <input type="radio" name="gender" value="0" checked> Ná»¯
    <input type="radio" name="gender" value="1"
        <?php
/*        if($customer['gender'] == 1){
            echo 'checked';
        }
        */?>
    > Nam <br>
    Address: <input type="text" name="address" value="<?php /*= $customer['address'] */?>"><br>
    <button>Update</button>
    <?php
/*    }
    */?>
</form>-->
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
                        <a href="" class="breadcrumb">
                            <i class="fa-solid fa-users" style="margin-right: 10px;"></i>
                            Khách hàng
                        </a>
                    </li>
                </ul>
                <h1 class="page-header">  Khách hàng  </h1>
                <?php  foreach ($customers AS $customer){
                    ?>
                    <form method="post" action="Update.php" role="form" >
                        <input type="hidden" name="id" id="id" value="<?=$customer['id']?>">
                        <div class="form-group">
                            <label>Tên khách hàng</label>
                            <input name="name" value="<?=$customer['name']?>"  required class="form-control" placeholder="">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input name="email" value="<?=$customer['email']?>" required class="form-control" placeholder="">
                        </div>
                        <div class="form-group">
                            <label>Mật khẩu</label>
                            <input name="password" value="<?=md5($customer['password'])?>" required class="form-control" placeholder="m5">
                        </div>
                        <div class="form-group">
                            <label>Số điện thoại</label>
                            <input name="phone" value="<?=$customer['phone']?>" required class="form-control" placeholder="">
                        </div>
                        <div class="form-group">
                            <label>Giới tính</label>
                            <input name="gender" value="<?=$customer['gender']?>" required class="form-control" placeholder="">
                        </div>
                        <div class="form-group">
                            <label>Địa chỉ</label>
                            <input name="address" value="<?=$customer['address']?>" required class="form-control" placeholder="">
                        </div>
                        <button class="btn-update">Cập Nhật</button>
                    </form>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>

</body>
</html>

