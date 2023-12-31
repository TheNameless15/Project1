<?php
session_start();
if(!isset($_SESSION['email-ad'])){
    header("Location:../Account/login.php");
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
    <title>List's Customers</title>
</head>
<body>
<?php
include_once '../../Connects/open.php';
$search = "";
//Lấy giá trị được search về với điều kiện $_GET['search'] tồn tại
if(isset($_GET['search'])){
    $search = $_GET['search'];
}
//Khai báo số bản ghi 1 trang
$recordOnePage = 3;
//Query để lấy số bản ghi
$sqlCountRecord = "SELECT COUNT(*) AS count_record FROM customer WHERE name LIKE '%$search%'";
//Chạy query lấy số bản ghi
$countRecords = mysqli_query($connect, $sqlCountRecord);
//foreach để lấy số bản ghi
foreach ($countRecords as $countRecord){
    $records = $countRecord['count_record'];
}
//Tính số trang
$countPage = ceil($records / $recordOnePage);
//Lấy trang hiện tại (nếu không tồn tại page hiện tại thì page hiện tại = 1)
$page = 1;
if(isset($_GET['page'])){
    $page = $_GET['page'];
}
//Tính bản ghi bắt đầu của trang
$start = ($page - 1) * $recordOnePage;
//Query để lấy dữ liệu từ bảng classes trên db về
/*$sql ="select customer.* , orders.id as orders  from orders inner join customer on customer.id = orders.customer_id WHERE name LIKE '%$search%' LIMIT $start, $recordOnePage";*/
$sql = "SELECT * FROM customer WHERE name LIKE '%$search%' LIMIT $start, $recordOnePage";
//Chạy query
$customer = mysqli_query($connect, $sql);
include_once '../../Connects/close.php';
include_once '../Layout/Header.php';
?>
<!--<a href="Create.php">ADD</a>
<a href="../Account/Logout.php">Logout</a>
<a href="../Layout/Manager.php">Return To Manager</a>
<form method="get" action="">
    Search: <input type="text" name="search" value="<?php /*= $search; */?>"><br>
    <button>Search</button>
</form>
--><!--<table border="1px" cellspacing="0" cellpadding="0" width="100%">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Password</th>
        <th>Phone</th>
        <th>Gender</th>
        <th>Address</th>
        <th>Order</th>
    </tr>
    <?php
/*    foreach ($customer as $customer){
        */?>
        <tr>
            <td><a href="edit.php?id=<?php /*= $customer['id'] */?>">Edit</a><?php /*= $customer['id'] */?></td>
            <td><?php /*= $customer['name'] */?></td>
            <td><?php /*= $customer['email'] */?></td>
            <td><?php /*= $customer['password'] */?></td>
            <td><?php /*= $customer['phone'] */?></td>
            <td>
                <?php
/*                if($customer['gender'] == 0){
                    echo 'Nữ';
                } elseif ($customer['gender'] == 1){
                    echo 'Nam';
                }
                */?>
            </td>
            <td><?php /*= $customer['address'] */?></td>
            <td><a href="delete.php?id=<?php /*= $customer['id'] */?>">DELETE</a></td>
        </tr>
        <?php
/*    }
    */?>
</table>
<?php
/*for($i = 1; $i <= $countPage; $i++){
    */?>
    <a href="?page=<?php /*= $i */?>&search=<?php /*= $search */?>">
        <?php /*= $i */?>
    </a>
    --><?php
/*}
*/?>
<div class="grid">
    <div class="row sm-gutter ">
        <div class="col l-3">
            <div class="menu-right">
                <form role="search">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search" name="search" value="<?= $search; ?>">
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
                            Trang quản lí thành viên
                        </a>
                    </li>
                </ul>
                <h1 class="page-header">Danh sách thành viên </h1>

                <div class="list-member">
                    <div class="add-member">
                        <ul class="quanli-icon-title">
                            <li>
                                <a href="Create.php" class="icon-and-addmember">
                                    <i class="fa-solid fa-plus"></i>
                                    Thêm thành viên
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="table-member">
                        <table>
                            <thead>
                            <tr>
                                <th style="font-size: 1.5rem">
                                    <div class="use-member">ID</div>
                                    <div class="member-cell"></div>
                                </th>
                                <th style="font-size: 1.5rem">
                                    <div class="use-member">Họ tên</div>
                                    <div class="member-cell"></div>
                                </th>
                                <th style="font-size: 1.5rem">
                                    <div class="use-member">Email</div>
                                    <div class="member-cell"></div>
                                </th>
                                <th style="font-size: 1.5rem">
                                    <div class="use-member">Mật khẩu</div>
                                    <div class="member-cell"></div>
                                </th>
                                <th style="font-size: 1.5rem">
                                    <div class="use-member">Số điện thoại</div>
                                    <div class="member-cell"></div>
                                </th>
                                <th style="font-size: 1.5rem">
                                    <div class="use-member">Giới tính</div>
                                    <div class="member-cell"></div>
                                </th>
                                <th style="font-size: 1.5rem">
                                    <div class="use-member">Địa chỉ</div>
                                    <div class="member-cell"></div>
                                </th>
                                <th style="font-size: 1.5rem">
                                    <div class="use-member">Hành động</div>
                                    <div class="member-cell"></div>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($customer as $customer){
                                ?>
                                <tr>
                                    <td style="font-size: 1.5rem"><?= $customer['id'] ?></td>
                                    <td style="font-size: 1.5rem"><?= $customer['name'] ?></td>
                                    <td style="font-size: 1.5rem"><?= $customer['email'] ?></td>
                                    <td style="font-size: 1.5rem"><?= md5($customer['password']) ?></td>
                                    <td style="font-size: 1.5rem"><?= $customer['phone'] ?></td>
                                    <td style="font-size: 1.5rem">
                                        <?php
                                        if($customer['gender'] == 0){
                                            echo 'Nữ';
                                        } elseif ($customer['gender'] == 1){
                                            echo 'Nam';
                                        }
                                        ?>
                                    </td>
                                    <td style="font-size: 1.5rem"><?= $customer['address'] ?></td>

                                    <td class="form-group" align="center" >
                                        <a href="edit.php?id=<?=$customer['id']?>" class="pencil-primary">
                                            <i class="fa-solid fa-pencil"></i>
                                        </a>
                                        <a href="destroy.php?id=<?=$customer['id']?>" class="gliphycon-remove">
                                            <i class="fa-solid fa-circle-xmark"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                        </table>
                        <?php
                        for($i = 1; $i <= $countPage; $i++){
                            ?>
                            <a href="?page=<?= $i ?>&search=<?= $search ?>">
                                <?= $i ?>
                            </a>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</body>
</html>
