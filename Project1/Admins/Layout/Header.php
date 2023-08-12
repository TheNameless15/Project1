<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="../assets/css/grid.css">
    <link rel="stylesheet" href=../assets/css/responsive.css">
    <link rel="stylesheet" href="../assets/css/manager.css">
    <link rel="stylesheet" href="../assets/css/member.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="../assets/fonts/fontawesome-free-6.4.0-web/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400;700&display=swap"
          rel="stylesheet">
    <title>Document</title>
</head>
<body>
<?php
include_once "../../Connects/open.php";
?>

<header class="header">
    <!-- LOGO SHOP -->
    <div class="header-logo hide-on-tablet ">
        <a href="../Layout/Manager.php" class="header_logo-link">
            <img src="../../Customer/assets/img/download.png"  alt="Logo" class="header_logo-img">
        </a>
    </div>
    <div class="icon-login-logout">
        <a href="#" class="option-admin-logout-flie">

            <i class="icon-admin fa-solid fa-user-secret"></i>
            <div class="title-admin">
                <span>Admin</span>
            </div>
            <i class="icon-admin-down fa-sharp fa-solid fa-caret-down"></i>

        </a>
        <ul class="option-admin" role="menu">
          <!--  <li class="option-of-admin-file"
                style="font-size: 17px; margin-top: 14px; margin-bottom:10px ; display:block">
                <a href="">
                    <i class="icon-flie fa-solid fa-user-tie" style="margin-right:4px"></i>
                    <span>Hồ sơ</span>
                </a>
            </li>-->
            <li class="option-of-admin-file" style="font-size: 17px; margin-bottom:14px;">
                <a href="../Account/Logout.php">
                    <i class="icon-logout fa-solid fa-circle-xmark" style="margin-right:3px;margin-top: 25px"></i>
                    <span>Đăng xuất</span>
                </a>
            </li>
        </ul>
    </div>
</header>
</body>
</html>