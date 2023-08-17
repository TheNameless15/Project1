<?php
session_start();

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
    <title>Cart</title>

</head>
<body>
<?php
include_once '../Layout/Header.php';
include_once '../../Connects/open.php';
$search = "";
//Lấy giá trị được search về với điều kiện $_GET['search'] tồn tại
if(isset($_GET['search'])){
    $search = $_GET['search'];
}
//Khai báo số bản ghi 1 trang
$recordOnePage = 3;
//Query để lấy số bản ghi
$sqlCountRecord = "SELECT COUNT(*) AS count_record FROM orders WHERE id LIKE '%$search%'";
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
$sql = " SELECT orders.*, customer.name as cus_name, customer.id as cus_id from orders inner join customer on customer.id = orders.customer_id  WHERE (orders.date_buy LIKE '%$search%') OR (customer.name LIKE '$search') order by orders.id desc LIMIT $start, $recordOnePage";
$orders = mysqli_query($connect, $sql);
include_once '../../Connects/close.php';
?>
<!--<a href="../Account/Logout.php">Logout</a>
<a href="../Layout/Manager.php">Return To Manager</a>
<table cellspacing="0" cellpadding="0" border="1">
    <tr>
        <th>Orders ID</th>
        <th>Orders Date</th>
        <th>Customer ID</th>
        <th>Status</th>
        <th>Orders Details</th>
    </tr>

        <?php
/*        //Sql lấy thông tin sp theo id
        foreach ($orders as $order){
        */?>
                <tr>
        <td><?php /*= $order['id'] */?></td>
        <td><?php /*= $order['date_buy']*/?></td>
        <td><?php /*= $order['cus_name']*/?></td>
        <td>
            <?php
/*            if ($order['status'] == 0){
                echo "Pending";
            }
            elseif ($order['status'] == 1 ){
                echo "Delivering";
            }
            elseif ($order['status'] == 2 ){
                echo "Completed";
            }
            elseif ($order['status'] == 3 ){
                echo "Canceled";
            }
            */?>
        </td>
        <td>
            <a href="order_details.php?id=<?php /*= $order['id'] */?>"><i class="fa-solid fa-book"></i></a>
        </td>
        <td>
            <a href="Confirm.php?id=<?php /*= $order['id'] */?>"><i class="fa-solid fa-car fa-lg"></i></a>
        </td>-->

        <?php
/*        }
        */?>
    <div class="grid">
        <div class="row sm-gutter ">
            <div class="col l-3">
                <div class="menu-right">
                    <form role="search">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="search" name="search" value="<?= $search; ?>">
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
                        <li class="active">
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
                                Trang quản lý đơn hàng
                            </a>
                        </li>
                    </ul>
                    <h1 class="page-header">Danh sách đơn hàng </h1>

                    <div class="list-member">
                        <div class="add-member">
                            <ul class="quanli-icon-title">
                                <li>
                                    <a href="Income.php" class="icon-and-addmember">
                                        Xem doanh thu
                                    </a>
                                </li>
                                <!--Thêm một button doanh thu không có biểu đồ có khi [ thêm mấy cái khối div để nhìn số liệu? hay là mình cứ thế thêm vào income]-->
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
                                        <div class="use-member">Ngày mua</div>
                                        <div class="member-cell"></div>
                                    </th>
                                    <th style="font-size: 1.5rem">
                                        <div class="use-member">Tên Khách Hàng</div>
                                        <div class="member-cell"></div>
                                    </th>
                                    <th style="font-size: 1.5rem">
                                        <div class="use-member">Trạng Thái</div>
                                        <div class="member-cell"></div>
                                    </th>
                                    <th style="font-size: 1.5rem">
                                        <div class="use-member">Xem chi tiết đơn hàng</div>
                                        <div class="member-cell"></div>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($orders as $order){
                                    ?>
                                    <tr>
                                        <td style="font-size: 1.5rem"><?= $order['id'] ?></td>
                                        <td style="font-size: 1.5rem"><?= $order['date_buy']?></td>
                                        <td style="font-size: 1.5rem"><?= $order['cus_name']?></td>
                                        <td style="font-size: 1.5rem">
                                            <?php
                                            if ($order['status'] == 0){
                                                echo "Pending";
                                            }
                                            elseif ($order['status'] == 2 ){
                                                echo "Delivering";
                                            }
                                            elseif ($order['status'] == 3 ){
                                                echo "Completed";
                                            }
                                            elseif ($order['status'] == 4 ){
                                                echo "Canceled";
                                            }
                                            elseif ($order['status'] == 1 ){
                                                echo "Approved";
                                            }
                                            ?>
                                        </td>
                                        <td>
                                             <div class="add-member" style="margin-top: 20px;width: 80%;">
                                                <ul class="quanli-icon-title">
                                                    <li>
                                                        <a href="order_details.php?id=<?= $order['id'] ?>"><i class="fa-solid fa-book"></i></a>
                                                    </li>
                                                </ul>
                                             </div>
                                        </td>
                                       <!-- <td>
                                            <a href="Confirm.php?id=<?php /*= $order['id']*/?>"><i class="fa-solid fa-car fa-lg"></i></a>
                                        </td>-->
                                    </tr>
                                    <?php
                                }
                                ?>
                                </tbody>
                            </table>
                            <div class="panel-footer">
                                <nav align="center">
                                    <?php
                                    for($i = 1; $i <= $countPage; $i++){
                                        ?>
                                        <a href="?page=<?= $i ?>&search=<?= $search ?>">
                                            <?= $i ?>
                                        </a>
                                        <?php
                                    }
                                    ?>
                                </nav>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</body>
</html>