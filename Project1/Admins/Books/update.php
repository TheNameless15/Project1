<?php
$id = $_POST['id'];
$name = $_POST['name'];
$quantity = $_POST['quantity'];
$price = $_POST['price'];
$description = $_POST['description'];
$category_id = $_POST['category_id'];
$publisher_id = $_POST['publisher_id'];
$image = $_FILES['image']['name'];
$author_id = $_POST['author_id'];
include_once '../../Connects/open.php';
$sql = "UPDATE books SET name = '$name',quantity ='$quantity',price ='$price',description ='$description', category_id = '$category_id' , publisher_id = '$publisher_id' ,image ='$image',author_id ='$author_id' WHERE id = '$id'";
mysqli_query($connect, $sql);
mysqli_close($connect);
//Kiểm tra ảnh đã tồn tại trong folder chưa
if(!file_exists('../../image/' . $image)){
    //Lấy path của ảnh
    $path = $_FILES['image']['tmp_name'];
    //Lưu ảnh
    move_uploaded_file($path, '../../image/' . $image);
}
//Quay về trang danh sách
header('Location:index.php');
?>