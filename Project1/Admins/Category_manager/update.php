<?php
$id = $_POST['id'];
$name = $_POST['name'];
include_once '../../Connects/open.php';
$sql = "UPDATE categories SET name = '$name' WHERE id = '$id'";
mysqli_query($connect, $sql);
mysqli_close($connect);
header('Location:index.php');
?>

