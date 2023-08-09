<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" type= "text/css" href="../assets/css/base.css">
    <link rel="stylesheet" type= "text/css" href="../assets/css/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="../assets/fonts/fontawesome-free-6.4.0-web/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400;700&display=swap"
    <link href="../assets/js/main.js" rel="stylesheet" >
    <title>Document</title>
</head>
<body>
<?php
$account = $_GET['id'];
//Xem xem có thiếu session lấy không. Tiện gắn $_Session[id] vào $ account luôn ?
if(isset($_SESSION['id'])){
    $account = $_SESSION['id'];
}
include_once '../../Connects/open.php';
include_once '../Layout/Header.php';
//Query
$sql = "SELECT order_details.book_id, order_details.order_id, order_details.price, order_details.quantity,
		        books.image AS image, books.name AS book_name, books.description,
		        orders.receiver_name, orders.receiver_phone,orders.receiver_address,orders.*,
                categories.name as cat_name , categories.id as cat_id , publishers.id as pub_id, 
                publishers.name as pub_name ,authors.id as au_id , authors.name as au_name,
                ROUND(SUM(order_details.price * order_details.quantity)) as TongDonHang
        FROM order_details
        INNER JOIN books ON books.id = order_details.book_id
        INNER JOIN orders ON orders.id = order_details.order_id
        inner join categories on books.category_id = categories.id 
        inner join publishers on books.publisher_id = publishers.id 
        inner join authors on books.author_id = authors.id
        WHERE order_details.order_id = '$account'";
//Chạy query cua $sql chinh
$order_details = mysqli_query($connect, $sql);
// Chay query cua $sqlOrder de tim ai order
$sqlOrder = "SELECT * FROM orders where id = '$account'";
//Query người nhận
$orders = mysqli_query($connect,$sqlOrder);
//Đóng kết nối
$sqlDetails = "SELECT books.* , categories.name as cat_name , categories.id as cat_id , publishers.id as pub_id , publishers.name as pub_name ,authors.id as au_id , authors.name as au_name FROM books inner join categories on books.category_id = categories.id inner join publishers on books.publisher_id = publishers.id inner join authors on books.author_id = authors.id WHERE books.id = '$account' ";
$books = mysqli_query($connect,$sqlDetails);
include_once '../../Connects/close.php';
?>
<div style="width: 100%;height: 80%">
<table cellpadding="0" cellspacing="0" align="center" style="margin-bottom:125px " >
<tr>
    <th>Order ID</th>
    <th>Book Price</th>
    <th>Book Quantity</th>
    <th>Book Image</th>
    <th>Book Description</th>
    <th>Book Author</th>
    <th>Book Publisher</th>
    <th>Book Categories</th>
<!--    <th>Giá</th>-->
<!--    <th>Số lượng</th>-->
<!--    <th>Thông tin mô tả</th>-->
   <!-- <th>Tác Giả</th>
    <th>Nhà sản xuất</th>
    <th>Thể loại</th>-->
</tr>
    <tr>
      <!--  <?php
/*       foreach ($orders as $order){
        */?>
            <td><?php /*=$order['id']*/?></td>
            <td>
                <?php
/*               if ($order['status'] == 0){echo "Pending";}
                else if ($order['status'] == 1){echo "Delivering";}
                else if ($order['status'] == 2){echo "Completed";}
                else if ($order['status'] == 3){echo "Canceled";}
                */?>
            </td>
            <td>
                <?php /*=$order['date_buy']*/?>
            </td>
        --><?php
/*       }
        */?>

       <?php  $money = 0;
       foreach ($order_details as $order_detail) {?>
               <tr>
        <td style="font-size: 1.5rem"> <?= $order_detail['book_name']?></td>
        <td style="font-size: 1.5rem"><?= $order_detail['price']?></td>
        <td style="font-size: 1.5rem"><?= $order_detail['quantity']?></td>
        <td style="font-size: 1.5rem"><img width="180px" src="../../image/<?= $order_detail['image']?>"></td>
        <td style="font-size: 1.5rem"><?= $order_detail['description']?></td>
        <td style="font-size: 1.5rem"><?= $order_detail['au_name']?></td>
        <td style="font-size: 1.5rem"><?= $order_detail['pub_name']?></td>
        <td style="font-size: 1.5rem"><?= $order_detail['cat_name']?></td>
        </tr>
        <?php
        $money =+ $money;
        $money = $order_detail['price'] * $order_detail['quantity'];
       }
        ?>
    <tr>
    <tr>
        <td colspan="8">
            <?php
            Echo 'Tổng Tiền Đơn Hàng  : '. $money;
            //Hiển thị tổng tiền của các sp có trong cart
            ?>
        </td>
    </tr>
</table>
</div>
<div style="height: 20%">
<?php
        include_once '../Layout/Footer.php'
        ?>

</div>
</body>
</html>