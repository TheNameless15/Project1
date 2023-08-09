<?php
$id=$_GET['id'];
include_once '../../Connects/open.php';
$sql = "DELETE FROM authors WHERE id='$id'";
mysqli_query($connect,$sql);
include_once '../../Connects/close.php';
header('Location:index.php');
?>