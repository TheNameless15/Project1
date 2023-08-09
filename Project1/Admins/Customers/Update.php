<?php
$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
/*$email = $_POST['email'];
$password = $_POST['password'];*/
include_once '../../Connects/open.php';
$sql = "UPDATE customers SET name = '$name' , '$name' ,'$' WHERE id = '$id'  ";
mysqli_query($connect , $sql);
include_once '../../Connects/close.php';
header('Location:Index.php');
?>