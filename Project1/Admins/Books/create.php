<?php
//Cho phÃ©p lÃ m viá»‡c vá»›i session
session_start();
//Kiá»ƒm tra tá»“n táº¡i email trÃªn session hay chÆ°a, náº¿u Ä‘Ã£ tá»“n táº¡i thÃ¬ cho nháº£y sang trang khÃ¡c
if(!isset($_SESSION['email'])){
    header("Location:../Account/login.php");
}
?>
<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="../assets/css/grid.css">
    <link rel="stylesheet" href="../assets/css/responsive.css">
    <link rel="stylesheet" href="../assets/css/manager.css">
    <link rel="stylesheet" href="../assets/css/member.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="../assets/fonts/fontawesome-free-6.4.0-web/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400;700&display=swap"  rel="stylesheet">
    <title>Add a book</title>
    <style>
        .a{
            position: relative;
            width: 100%;
            height: 500px;
            justify-content: center;
            align-items: center;
            display: flex;
        }
        .b{
            position: absolute;
            width: 400px;
            height: 100px;
            justify-content: center;
            align-items: center;
            display: flex;
        }
        textarea {
            width: 100%;
            height: 150px;
            padding: 12px 20px;
            box-sizing: border-box;
            border: 2px solid #ccc;
            border-radius: 4px;
            background-color: #f8f8f8;
            font-size: 16px;
            resize: none;
        }
    </style>
    <script>
        function chooseFile(fileInput){
            if(fileInput.files && fileInput.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#image').attr('src', e.target.result);
                }
                reader.readAsDataURL(fileInput.files[0]);
            }
        }
    </script>
    <?php
    //Má»Ÿ káº¿t ná»‘i
    include_once '../../Connects/open.php';
    include_once '../Layout/Header.php';
    //Query
    $sql4 = "SELECT * FROM authors";
    $authors = mysqli_query($connect, $sql4);
    $sql3 = "SELECT * FROM categories";
    $categories = mysqli_query($connect , $sql3);
    $sql2 = "SELECT * FROM publishers";
    $publishers = mysqli_query($connect , $sql2);
    $sql = "SELECT * FROM Books";
    //Cháº¡y query
    $books = mysqli_query($connect, $sql);
    //ÄÃ³ng káº¿t ná»‘i
    include_once '../Layout/Header.php';
    include_once '../../Connects/close.php';
    ?>
</head>
<body>
<!--<div class="a">
    <div class="b">
        <form method="post" action="store.php" enctype="multipart/form-data">
      ID	<input type="hidden" name="id"> <br>
            Name <input type="text" name="name" > <br>
            Quantity	<input type="number" name="quantity"> <br>
            Price	<input type="number" name="price"> <br>
            Description	<input type="text" name="description"><br>
            Publishers <select name="publisher_id">
                    <option>-Choose-</option>
                <?php
/*            foreach ($publishers as $publisher){
                */?>
                <option value="<?php /*= $publisher['id'] */?>">
                    <?php /*= $publisher['name']*/?>
                </option>
                <?php
/*            }
            //Pick ten cua nha san xuat ( Thuong se co lien quan voi id luon)
            */?>
            </select>
            <br>
            Category: <select name="category_id">
                <option> - Choose - </option>
                <?php
/*               foreach ($categories as $cat){
                    */?>
                    <option value="<?php /*= $cat['id'] */?>">
                        <?php /*= $cat['name'] */?>
                    </option>
                    <?php
/*                }
                */?>
            </select><br>
            Image: <input type="file" name="image"><br>
            Author: <select name="author_id">
                <option> - Choose - </option>
                <?php
/*                foreach ($authors as $a){
                    */?>
                    <option value="<?php /*= $a['id'] */?>">
                        <?php /*= $a['name'] */?>
                    </option>
                    <?php
/*                }
                */?>
            </select><br>
            <button>Add</button>
        </form>

    </div>
</div>
-->
<form method="post" action="store.php" enctype="multipart/form-data">
<div class="grid">
    <div class="row sm-gutter ">
        <div class="col l-3">
            <div class="menu-right">
                <!--<form role="search">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search">
                    </div>
                </form>-->
                <ul class="nav menu">
                    <li class="active">
                        <a href="../Layout/Manager.php">
                            <svg class="glyph stroked dashboard-dial">
                                <use xlink:href="#stroked-dashboard-dial"></use>
                            </svg>
                            <i class="fa-solid fa-gauge" style="margin-right:8px"></i>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="../Customers/Index.php">
                            <svg class="glyph stroked male user"> <!---->
                                <use xlink:herf="#stroked-male-user"></use>
                            </svg>
                            <i class="fa-solid fa-person-military-pointing" style="margin-right:8px"></i>
                            Quản lí thành viên
                        </a>
                    </li>
                    <li>
                        <a href="../Category_manager/Index.php">
                            <svg class="glyph stroked open folder">
                                <use xlink:herf="#stroked-open-folder"></use>
                            </svg>
                            <i class="fa-solid fa-folder-open" style="margin-right:8px"></i>
                            Quản lí danh mục
                        </a>
                    </li>
                    <li>
                        <a href="../Books/Index.php">
                            <svg class="glyph stroked bag ">
                                <use xlink:herf="#stroked-bag"></use>
                            </svg>
                            <i class="fa-solid fa-bag-shopping" style="margin-right:8px"></i>
                            Quản lí sản phẩm
                        </a>
                    </li>
                    <li>
                        <a href="../Cart/index.php">
                            <svg class="glyph stroked two massege">
                                <use xlink:herf="#stroked-two-massege"></use>
                            </svg>
                            <i class="fa-solid fa-comment" style="margin-right:8px"></i>
                            Quản lí đơn hàng
                        </a>
                    </li>
                    <li>
                        <a href="../publishers/Index.php">
                            <svg class="glyph stroked chain">
                                <use xlink:herf="#stroked-chain"></use>
                            </svg>
                            <i class="fa-solid fa-rectangle-ad" style="margin-right:8px"></i>
                            Quản lí nhà xuất bản
                        </a>
                    </li>

                    <li>
                        <a href="../Author/Index.php">
                            <svg class="glyph stroked gear">
                                <use xlink:herf="#stroked-gear"></use>
                            </svg>
                            <i class="fa-solid fa-pen-nib" style="margin-right:8px"></i>
                            Tác giả
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col l-9">
            <div class="menu-left">
                <ul class="icon-and-title">
                    <li class="icon-home">
                        <a href="" class="breadcrumb">
                            <i class="fa-solid fa-users" style="margin-right: 10px;"></i>
                            Trang thêm sản phẩm
                        </a>
                    </li>
                </ul>
                <h1 class="page-header">Thêm sản phẩm</h1>
                <div class="row sm-gutter"><div class="col l-6">
                            <div class="form-group">
                                <label>Tên sản phẩm</label>
                                <input name="name" required class="form-control" placeholder="">
                            </div>
                            <div class="form-group">
                            <label>Số lượng sản phẩm</label>
                            <input name="quantity" type="text" required class="form-control" placeholder="">
                            </div>
                            <div class="form-group">
                                <label>Giá sản phẩm</label>
                                <input name="price" type="number" min="0" required class="form-control" placeholder="">
                            </div>
                            <div class="form-group">
                            <label> Mô tả sản phẩm</label>
                            <textarea name="description" class="form-cotrol"  rows="3" style="width: 100%;height: 175px;font-size: 1.25rem" ></textarea>
                            </div>
                    </div>
                    <div class="col l-6">
                        <select name="category_id" class="form-control">
                            <option>--Choose--</option>
                            <?php
                            foreach($categories as $category){
                                ?>
                                <option value="<?= $category['id'] ?>">
                                    <?= $category['name']?>
                                </option>
                                <?php
                            }
                            ?>
                        </select><br>
                        <select name="publisher_id" class="form-control">
                            <option>--Choose--</option>
                            <?php
                            foreach($publishers as $publisher){
                                ?>
                                <option value="<?= $publisher['id'] ?>">
                                    <?= $publisher['name']?>
                                </option>
                                <?php
                            }
                            ?>
                        </select><br>
                        <div class="form-group">
                            <label>Ảnh sản phẩm</label>
                            <input type="file"  name="image" >
                            <br>
                        </div>
                        <select name="author_id" class="form-control">
                            <option>--Choose--</option>
                            <?php
                            foreach($authors as $author){
                                ?>
                                <option value="<?= $author['id'] ?>">
                                    <?= $author['name']?>
                                </option>
                                <?php
                            }
                            ?>
                        </select><br>
                            <button name="sbm" type="submit" class="btn-sucess">Thêm mới</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</form>
</body>
</html>