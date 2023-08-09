<?php
/*//Cho phÃ©p lÃ m viá»‡c vá»›i session
session_start();
//Kiá»ƒm tra tá»“n táº¡i email trÃªn session hay chÆ°a, náº¿u Ä‘Ã£ tá»“n táº¡i thÃ¬ cho nháº£y sang trang khÃ¡c
if(isset($_SESSION['email'])){
    header("Location:../../Customer/Layout/Main.php");
}
*/?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            font-family: 'poppins',sans-serif;
        }
        section{
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            width: 100%;
            background-color: black;
            background-position: center;
            background-size: cover;
            background-image: url("../../image/lovepik-books-in-the-sky-background-image_400062995.jpg");

        }
        .form-box{
            position: relative;
            width: 400px;
            height: 700px;
            background: transparent;
            border: 2px solid rgba(206, 158, 158, 0.5);
            border-radius: 20px;
            backdrop-filter: blur(55px);
            display: flex;
            justify-content: center;
            align-items: center;

        }
        h2{
            font-size: 2em;
            color: #fff;
            text-align: center;
        }
        .inputbox{
            position: relative;
            margin: 30px 0;
            width: 310px;
            border-bottom: 2px solid #fff;
        }
        .inputbox label{
            position: absolute;
            top: 50%;
            left: 5px;
            transform: translateY(-50%);
            color: #fff;
            font-size: 1em;
            pointer-events: none;
            transition: .5s;
        }
        input:focus ~ label,
        input:valid ~ label{
            top: -5px;
        }
        .inputbox input {
            width: 100%;
            height: 50px;
            background: transparent;
            border: none;
            outline: none;
            font-size: 1em;
            padding:0 35px 0 5px;
            color: #fff;
        }
        .inputbox ion-icon{
            position: absolute;
            right: 8px;
            color: #fff;
            font-size: 1.2em;
            top: 20px;
        }
        .forget{
            margin: -15px 0 15px ;
            font-size: .9em;
            color: #fff;
            display: flex;
            justify-content: space-between;
        }

        .forget label input{
            margin-right: 3px;

        }
        .forget label a{
            color: #fff;
            text-decoration: none;
        }
        .forget label a:hover{
            text-decoration: underline;
        }
        button{
            width: 100%;
            height: 40px;
            border-radius: 40px;
            background: #fff;
            border: none;
            outline: none;
            cursor: pointer;
            font-size: 1em;
            font-weight: 600;
        }
        .register{
            font-size: .9em;
            color: #fff;
            text-align: center;
            margin: 25px 0 10px;
        }
        .register p a{
            text-decoration: none;
            color: #fff;
            font-weight: 600;
        }
        .register p a:hover{
            text-decoration: underline;
        }

    </style>

</head>
<body>
<section>
    <div class="form-box">
        <div class="form-value">
            <form method="post" action="registerProcess.php">
                <h2>Đăng Ký</h2>
                <div class="inputbox">
                    <input type="text" name="name">
                    <label for="name">Họ và tên</label>
                </div>
                <div class="inputbox">
                    <ion-icon name="mail-outline"></ion-icon>
                    <input type="email" required name="email">
                    <label for="email">Email</label>
                </div>
                <div class="inputbox">
                    <ion-icon name="lock-closed-outline"></ion-icon>
                    <input type="password" required name="password">
                    <label for="password">Password</label>
                </div>
                <div class="inputbox">
                    <input type="number" name="phone">
                    <label for="phone">Phone number</label>
                </div>
                <div >
                    <label for="gender" style="padding-bottom:45px">Giới tính</label>
                    <input type="radio" name="gender" value="0"> Female
                    <input type="radio" name="gender" value="1"> Male <br>
                </div>
                <div class="inputbox">
                    <input type="text" name="address">
                    <label for="address">Địa chỉ</label>
                </div>
                <button style="margin-top: 50px">Đăng ký</button>
            </form>
        </div>
    </div>
</section>
</body>
</html>
