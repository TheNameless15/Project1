<?php
//Cho phép làm việc với session
session_start();
//Kiểm tra đã tồn tại số đth trên session hay chưa, nếu chưa tồn tại thì cho quay về account
if (!isset($_SESSION['email'])) {
    //Quay về trang account
    header("Location: ../Account/login.php");
}
?>
<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="../bootstrap.min.css/bootstrap.min.css">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
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
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--<style>
        body {
            max-width: 1000px;
            background-color: #F5F4F8;
        }
        .edit_order {
            margin-top: 20px;
            margin-left: 50px;
            width: 900px;
            border: 1px solid #d7d2d2;
            border-radius: 10px;
            background-color: white;
            padding: 20px 40px;
        }

        .status {
            position: center;
            height: 30px;
            width: 200px;
            border-radius: 4px;
            padding-left: 20px;
        }

        .confirm_order {
            position: center;
            width: 100px;
            top: 0;
            margin-left: 80%;
        }
    </style>-->
    <title> Edit Order </title>
</head>
<body>
<section>

</section>
<?php
include_once '../Layout/Header.php';
//Lấy id của sp
$id = $_GET['id'];
//Mo ket noi
include_once "../../Connects/open.php";
//Query
$sql = "SELECT order_details.book_id, order_details.order_id, order_details.price, order_details.quantity,
		        books.image AS image, books.name AS book_name, books.description,
		        orders.receiver_name, orders.receiver_phone,orders.receiver_address
        FROM order_details
        INNER JOIN books ON books.id = order_details.book_id
        INNER JOIN orders ON orders.id = order_details.order_id
        WHERE order_details.order_id = '$id'";
//Chạy query cua $sql chinh
$order_details = mysqli_query($connect, $sql);
// Chay query cua $sqlOrder de tim ai order
$sqlOrder = "SELECT * FROM orders where id = '$id'";
//Query người nhận
$orders = mysqli_query($connect,$sqlOrder);
//Đóng kết nối
include_once '../../Connects/close.php';
?>
<!--<div class="edit_order">
   <div style="display: flex; justify-content: space-between">
       <div>
            <h3 style="margin: 0 0"> Delivery address </h3>

           <?php
/*            foreach ($orders as $order){
           */?>
                <div style="display: flex; justify-content: space-between">
                    <div>
                        <h3 style="margin: 0 0"> Delivery address </h3>
                        Receiver Name: <?php /*= $order['receiver_name']; */?><br>
                        Receiver Phone: <?php /*= $order['receiver_phone']; */?><br>
                        Receiver Address:<?php /*= $order['receiver_address']; */?>
                    </div
                </div>
                <div>
                    <form method="post" action="process.php">
                        <input type="hidden" name="id" value="<?php /*= $order['id']; */?>">
                        <select class="status" name="status">
                            <option value="0" <?php /*if($order['status'] == 0 ){echo "SELECTED";}*/?>> Pending </option>
                            <option value="1"<?php /*if($order['status'] == 1 ){echo "SELECTED";}*/?>> Delivery </option>
                            <option value="2"<?php /*if($order['status'] == 2 ){echo "SELECTED";}*/?>> Completed </option>
                            <option value="3"<?php /*if($order['status'] == 3 ){echo "SELECTED";}*/?>> Canceled </option>
                        </select>
                        <button type="submit" style=" width: 50px; height: 34px" class="btn">
                            OK
                        </button>
                    </form>
                </div>
           <?php
/*            }
           */?>
        </div
    </div>

    <?php
/*    foreach ($order_details as $order_detail){
    */?>
    <table border="1" cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <td width="220px">
                <img width="180px" src="../../image/<?php /*= $order_detail['image']*/?>">
            </td>
            <td>
                <h3><?php /*= $order_detail['book_name']*/?></h3>
                <p style="font-size: 13px; width: 100%"><?php /*= $order_detail['description'] */?></p>
            </td>
            <td width="20%" >
                Amount: <?php /*= $order_detail['quantity'] */?><br>
                Price <?php /*= $order_detail['price'] */?>$
            </td>
        </tr>
        <?php
/*        }
        */?>
    </table>
</div>-->
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
                    <li class="active">
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
                            Trang quản lí orders
                        </a>
                    </li>
                </ul>
                <h1 class="page-header">
                    <?php
                    foreach ($orders as $order){
                        ?>
                        <h1>Tên khách hàng: <?= $order['receiver_name'] ?></h1>
                        <h1>Số điện thoại: <?= $order['receiver_phone'] ?></h1>
                        <h1>Địa chỉ: <?= $order['receiver_address'] ?></h1>
                        <?php
                    }
                    ?>
                </h1>

                <div class="list-member">
                    <!-- <div class="add-member">
                         <ul class="quanli-icon-title">
                             <li>
                                 <a href="Create.php" class="icon-and-addmember">
                                     <i class="fa-solid fa-plus"></i>
                                     Thêm thành viên
                                 </a>
                             </li>
                         </ul>
                         </div>-->
                    <div class="table-member">
                        <table>
                            <thead>
                            <tr>
                               <!-- <th style="font-size: 1.5rem">
                                    <div class="use-member">Tên Người Nhận</div>
                                    <div class="member-cell"></div>
                                </th>
                                <th style="font-size: 1.5rem">
                                    <div class="use-member">Số điện thoại</div>
                                    <div class="member-cell"></div>
                                </th>
                                <th style="font-size: 1.5rem">
                                    <div class="use-member">Địa chỉ</div>
                                    <div class="member-cell"></div>
                                </th>-->
                                <th style="font-size: 1.5rem">
                                    <div class="use-member">Tên Sản Phẩm</div>
                                    <div class="member-cell"></div>
                                </th>
                                <th style="font-size: 1.5rem">
                                    <div class="use-member">Giá</div>
                                    <div class="member-cell"></div>
                                </th>
                                <th style="font-size: 1.5rem">
                                    <div class="use-member">Ảnh Sản Phẩm</div>
                                    <div class="member-cell"></div>
                                </th>
                                <th style="font-size: 1.5rem">
                                    <div class="use-member">Số lượng order</div>
                                    <div class="member-cell"></div>
                                </th>
                                <th style="font-size: 1.5rem">
                                    <div class="use-member">Thông tin mô tả sản phẩm</div>
                                    <div class="member-cell"></div>
                                </th>
                               <!-- <th style="font-size: 1.5rem">
                                    <div class="use-member">Chỉnh status</div>
                                    <div class="member-cell"></div>
                                </th>
                                <th style="font-size: 1.5rem">
                                    <div class="use-member">Hành Động</div>
                                    <div class="member-cell"></div>
                                </th>-->
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php  foreach ($order_details as $order_detail) {?>
                                    <td style="font-size: 1.5rem"> <?= $order_detail['book_name']?></td>
                                    <td style="font-size: 1.5rem"><?= $order_detail['price']?></td>
                                    <td style="font-size: 1.5rem"><img width="180px" src="../../image/<?= $order_detail['image']?>"></td>
                                    <td style="font-size: 1.5rem"><?= $order_detail['quantity']?></td>
                                    <td style="font-size: 1.5rem"><?= $order_detail['description']?></td>
                                        <? }foreach ($orders as $order){?>
                                   <!-- <td>
                                        <form method="post" action="process.php">
                                            <input type="hidden" name="id" value="<?php /*= $order['id']; */?>">
                                            <select class="status" name="status">
                                                <option value="0"<?php /*if($order['status'] == 0 ){echo "SELECTED";}*/?>> Pending </option>
                                                <option value="1"<?php /*if($order['status'] == 1 ){echo "SELECTED";}*/?>> Delivery </option>
                                                <option value="2"<?php /*if($order['status'] == 2 ){echo "SELECTED";}*/?>> Completed </option>
                                                <option value="3"<?php /*if($order['status'] == 3 ){echo "SELECTED";}*/?>> Canceled </option>
                                            </select>
                                    </td>-->
                                    <!--<td>
                                        <button type="submit"  class="add-member" style="margin-right: 20px">
                                            OK
                                        </button>
                                        </form>
                                    </td>-->
                                </tr>
                                <?php
                            }
                            ?>
                            <tr>
                                <td colspan="10">
                                    <form method="post" action="process.php">
                                        <input type="hidden" name="id" value="<?= $order['id']; ?>">
                                        <select class="status" name="status" style="width: 150px;margin-left: 22px;padding:5px">
                                            <option value="0"<?php if($order['status'] == 0 ){echo "SELECTED";}?>> Pending </option>
                                            <option value="1"<?php if($order['status'] == 1 ){echo "SELECTED";}?>> Delivery </option>
                                            <option value="2"<?php if($order['status'] == 2 ){echo "SELECTED";}?>> Completed </option>
                                            <option value="3"<?php if($order['status'] == 3 ){echo "SELECTED";}?>> Canceled </option>
                                        </select>
                                        <button type="submit"  class="add-member" style="margin: 20px 42%; ">
                                            OK
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>

