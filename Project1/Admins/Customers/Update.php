<?php
$id = $_POST['id'];
$name =  $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$phone = $_POST['phone'];
$gender = $_POST['gender'];
$address = $_POST['address'];
/*$email = $_POST['email'];
$password = $_POST['password'];*/
include_once '../../Connects/open.php';
$sql = "UPDATE customer SET name = '$name' , email = '$email' , password = '$password', 
        phone = '$phone',gender = '$gender',address = '$address' WHERE id = '$id'";
mysqli_query($connect , $sql);
include_once '../../Connects/close.php';
header('Location:Index.php');
?>