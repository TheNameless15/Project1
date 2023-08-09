<?php
$id = $_POST['id'];
$status = $_POST['status'];
include_once '../../Connects/open.php';
$sql = "UPDATE orders SET status = '$status' where id = '$id'";
$orders = mysqli_query($connect,$sql);
include_once '../../Connects/close.php';
header('Location:./index.php');
?>