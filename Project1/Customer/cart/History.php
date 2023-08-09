
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" type= "text/css" href="../assets/css/base.css">
    <link rel="stylesheet" type= "text/css" href="../assets/css/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="../assets/fonts/fontawesome-free-6.4.0-web/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400;700&display=swap"
    <link href="../assets/js/main.js" rel="stylesheet" >
</head>
<body>
<?php
//Lấy $id gắn vào account?
$account = $_GET['id'];
//Xem xem có thiếu session lấy không. Tiện gắn $_Session[id] vào $ account luôn ?
if(isset($_SESSION['id'])){
    $account = $_SESSION['id'];
}
// Không ngờ nó làm được thế này ảo vl
// Có khi cần hỏi thầy về cái này chí mình vừa mới ấy bừa
include_once '../Layout/Header.php';
include_once '../../Connects/open.php';
$sql = "SELECT * FROM orders where customer_id =  '$account' order by date_buy  desc";
$orders = mysqli_query($connect,$sql);
include_once '../../Connects/close.php';
?>
<div style="height: 500px">
    <table cellspacing="0" cellpadding="0" border="1">
        <tr align="center">
            <th>STT</th>
            <th>Ngày mua</th>
            <th>Tình trạng</th>
            <!-- <th>Đơn giá</th>
             <th>Thành tiền</th>-->
            <th>Xem chi tiết</th>
            <th>Hành động</th>
        </tr>
        <?php foreach($orders as $order){?>
            <tr>
                <td><?= $order['id'] ?></td>
                <td><?= $order['date_buy']?></td>
                <td>
                    <?php
                    if ($order['status'] == 0){echo "Pending";}
                    else if ($order['status'] == 1){echo "Delivering";}
                    else if ($order['status'] == 2){echo "Completed";}
                    else if ($order['status'] == 3){echo "Canceled";}
                    ?>
                </td>
                <td><a href="History_Order_Details.php?id=<?= $order['id']?>">Orders Details</a></td>
                <td><a href="Cancel-orders.php?id=<?= $order['id']?>">Cancel orders</a></td>
            </tr>
            <?php
        }?>
    </table>
</div>
<?php
include_once '../Layout/Footer.php';
?>
</body>
</html>