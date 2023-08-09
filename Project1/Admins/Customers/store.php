<?php
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$phone = $_POST['phone'];
$gender = $_POST['gender'];
$address = $_POST['address'];
//Mở kết nối
include_once '../../Connects/open.php';
//Viết query
$sql = "INSERT INTO customer( name,email,password,phone,gender,address) VALUES ('$name','$email','$password','$phone','$gender','$address')";
//Chạy query
mysqli_query($connect, $sql);
//Đóng kết nối
include_once '../../Connects/close.php';
//Quay về trang danh sách
header("Location:Index.php");
?>

