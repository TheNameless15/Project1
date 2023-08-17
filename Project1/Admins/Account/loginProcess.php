<?php
session_start();
$email = $_POST['email-ad'];
$password = $_POST['password-ad'];
include_once '../../Connects/open.php';
$sql = "SELECT *, COUNT(id) AS count_account FROM admins WHERE email = '$email' AND password = '$password'";
$accounts = mysqli_query($connect, $sql);
include_once '../../Connects/close.php';
foreach ($accounts as $account){
    $id = $account['id'];
    $count_account = $account['count_account'];
}
if($count_account == 0){
    echo 'Xin vui lòng kiểm tra lại mật khẩu hoặc tên đăng nhập ';
    header("Location:login.php");
} else {
    //LÆ°u id, email lÃªn session
    $_SESSION['id-ad'] = $id;
    $_SESSION['email-ad'] = $email;
    header("Location:../Layout/Manager.php");
}
?>
