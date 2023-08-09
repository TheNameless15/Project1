<?php
$id = $_POST['id'];
$name = $_POST['name'];
$country = $_POST['country'];
include_once '../../Connects/open.php';
$sql = "UPDATE authors SET name = '$name',country ='$country' WHERE id = '$id'";
mysqli_query($connect, $sql);
mysqli_close($connect);
header('Location:index.php');
?>

