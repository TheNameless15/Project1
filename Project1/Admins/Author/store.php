<?php
$name = $_POST['name'];
$country = $_POST['country'];
include_once '../../Connects/open.php';
$sql = "INSERT INTO authors(name,country) VALUES ('$name','$country')";
mysqli_query($connect, $sql);
mysqli_close($connect);
header('Location:index.php');
?>