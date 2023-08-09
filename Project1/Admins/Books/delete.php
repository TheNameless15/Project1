<?php
//Lấy id của bản ghi cần xóa
$id = $_GET['id'];
//Mở kết nối
include_once '../../Connects/open.php';
//Viết query để xóa bản ghi
$sql = "DELETE FROM books WHERE id = '$id'";
//Chạy query
mysqli_query($connect, $sql);
//Đóng kết nối
include_once '../../Connects/close.php';
//Quay về danh sách
header('Location:index.php');
?>