<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
include_once '../../Connects/open.php';
$last7days
?>
<form action="" method="post">
    Date 1: <input type="date" name="date_buy1" value="<?= $date1 ?>">
    Date 1: <input type="date" name="date_buy2" value="<?= $date2 ?>">
    <button type="submit">Gửi</button>
</form>
<?php
if(isset($_POST['date_buy2'])) {
    $sql = "SELECT MAX(date_buy) ,ROUND(SUM(price*quantity)) AS SumDoanhThu FROM orders inner join order_details on order_details.order_id = orders.id where date_buy between #$date1# and #$date2# order by date_buy ;";
    $orders = mysqli_query($connect,$sql);
    foreach ($orders as $order){
        echo $order['SumDoanhThu'];
    }
}
include_once '../../Connects/close.php';
?>
</body>
</html>