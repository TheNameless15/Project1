<?php
session_start();
$email = $_POST['email'];
$password = $_POST['password'];
include_once '../../Connects/open.php';
$sql = "SELECT *, COUNT(id) AS count_account FROM customer WHERE email = '$email' AND password = '$password'";
$accounts = mysqli_query($connect, $sql);
foreach ($accounts as $account){
    $id = $account['id'];
    $count_account = $account['count_account'];
}
if($count_account == 0){
    echo 'Kiá»ƒm tra láº¡i máº­t kháº©u hoáº·c email';
    header("Location:login.php");
} else {
    //LÆ°u id, email lÃªn session
    $_SESSION['id'] = $account['id'];
    $_SESSION['email'] = $email;
    header("Location:../../Customer/Layout/Main.php");
}
include_once '../../Connects/close.php';

?>

