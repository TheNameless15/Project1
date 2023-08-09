<?php
//Cho phÃ©p lÃ m viá»‡c vá»›i session
session_start();
//Kiá»ƒm tra tá»“n táº¡i email trÃªn session hay chÆ°a, náº¿u Ä‘Ã£ tá»“n táº¡i thÃ¬ cho nháº£y sang trang khÃ¡c
if(!isset($_SESSION['email'])){
    header("Location:../home/login.php");
}
?>
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
    <link rel="stylesheet" href="../assets/css/responsive.css">
    <link rel="stylesheet" href="../assets/css/manager.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="../assets/fonts/fontawesome-free-6.4.0-web/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400;700&display=swap"
          rel="stylesheet">
    <title>Update a author</title>
    <style>
        img{
            height: 100px;
            width: 50px;
        }
    </style>
    <script>
    </script>
</head>
<?php
$id = $_GET['id'];
include_once '../../Connects/open.php';
$sqlSelectCategory = "SELECT * FROM categories ";
$categories = mysqli_query($connect,$sqlSelectCategory);
$sqlSelectPublishers = "SELECT * FROM publishers";
$publishers = mysqli_query($connect,$sqlSelectPublishers);
$sqlSelectAuthors= "SELECT * FROM authors";
$authors = mysqli_query($connect,$sqlSelectAuthors);
$sql = "SELECT books.* , categories.name as cat_name , categories.id as cat_id  , publishers.id as pub_id  , publishers.name as pub_name , authors.name as au_name , authors.id as au_id FROM books inner join categories on books.category_id = categories.id inner join publishers on books.publisher_id = publishers.id inner join authors on books.author_id = authors.id  WHERE books.id = '$id'";
$books = mysqli_query($connect, $sql);
include_once '../../Connects/close.php';
foreach ($books AS $book){
    ?>
<form method="post" action="update.php" enctype="multipart/form-data">
    <div class="grid">
        <div class="row sm-gutter ">
            <div class="col l-3">
                <div class="menu-right">
                    <form role="search">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search">
                        </div>
                    </form>
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
                            <?=$book['name']?>
                        </a>
                    </li>
                </ul>
                <h1 class="page-header"><?=$book['name']?></h1>
                <div class="row sm-gutter">
                    <div class="col l-6">
                        <form action="" role="form" method="post">
                            <div class="form-group">
                                <label><?=$book['name']?></label>
                              <!--  <input name="prd_name" value="LAPTOP LENOVO IDEAPAD SLIM 5 PRO" required class="form-control" placeholder="">-->
                                <input type="text" name="name" value="<?= $book['name']?>" required class="form-control" placeholder="<?= $book['name']?>">
                            </div>
                            <div class="form-group">
                                <label>Số lượng hàng tồn</label>
                                <input type="number" name="quantity" value="<?= $book['quantity']?>" required class="form-control" placeholder="<?=$book['quantity']?>">
                            </div>
                            <div class="form-group">
                                <label>Giá sản phẩm</label>
                                <input type="number" name="price" value="<?= $book['price']?>" required class="form-control" placeholder="<?= $book['price']?>">
                            </div>

                            <div class="form-group">
                                <label> Mô tả sản phẩm</label>
                                <textarea name="prd_details" class="form-cotrol"  rows="3" style="width: 100%;height: 175px;font-size: 1.25rem" ><?=$book['description']?></textarea>
                            </div>
                            <!--<div class="form-group">
                                <label>Phụ kiện</label>
                                <input name="prd_accessories" value="Chuột , lót chuột , dụng cụ vệ sinh " type="text" required class="form-control" placeholder="">
                            </div>-->
                            <!--<div class="form-group">
                                <label>Khuyến mãi</label>
                                <input name="prd_promotion" value="Giảm 10%" type="text" required class="form-control" placeholder="">
                            </div>-->
                            <!--<div class="form-group">
                                <label>Tình trạng</label>
                                <input name="prd_new" value="Còn hàng" type="text" required class="form-control" placeholder="">
                            </div>-->
                            <!--<select name="category_id" class="form-control">
                                <option><?php /*= $book['cat_name'] */?></option>
                                <?php
/*                                          foreach($categories as $category){
                                                */?>
                                <option value="<?php /*= $category['id'] */?>">
                                    <?php /*= $category['name']*/?>
                                </option>
                                <?php
/*                                         }
                                            */?>
                            </select><br>
                            <select name="publisher_id" class="form-control">
                                <option><?php /*= $book['pub_name'] */?></option>
                                <?php
/*                                           foreach($publishers as $publisher){
                                                */?>
                                <option value="<?php /*= $publisher['id'] */?>">
                                    <?php /*= $publisher['name']*/?>
                                </option>
                                <?php
/*                                            }
                                            */?>
                            </select><br>
                            <select name="author_id" class="form-control">
                                <option><?php /*= $book['au_name']*/?></option>
                                <?php
/*                                           foreach($authors as $author){
                                               */?>
                                <option value="<?php /*= $author['id'] */?>">
                                    <?php /*= $author['name']*/?>
                                </option>
                                <?php
/*                                          }
                                           */?>
                            </select><br>-->
                        </form>
                    </div>
                    <div class="col l-6">
                        <select name="category_id" class="form-control">
                            <option><?= $book['cat_name'] ?></option>
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
                            <option><?= $book['pub_name'] ?></option>
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
                            <input type="file" required name="prd_image" onchange="chooseFile(this)" accept="image/jpeg, image/gif, image/png">
                            <br>
                            <div>
                                <img src="../../image/<?=$book['image']?>" alt="" id="prd-image" width="120px" height="150px">
                            </div>
                        </div>
                        <select name="author_id" class="form-control">
                            <option><?= $book['au_name']?></option>
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
                       <!-- <div class="form-group">
                            <label>Danh mục</label>
                            <select name="cat_id" class="form-control">
                                <option value="1">Lenovo</option>
                                <option value="2">Acer</option>
                                <option value="3">Dell</option>
                                <option value="4">Asus</option>
                                <option value="5">HP</option>
                                <option value="6">Msi</option>
                                <option value="7">Microsoft</option>
                                <option value="8">Gygabyte</option>
                                <option value="9">Samsung</option>
                            </select>
                        </div>-->
                        <!--<div class="form-group">
                            <label >Trạng thái</label>
                            <select name="prd_status" class="form-control">
                                <option value="1">Còn hàng</option>
                                <option value="0">Hết hàng</option>
                            </select>
                        </div>-->
                        <!--<div class="form-group">
                            <label >Sản phẩm nổi bật</label>
                            <div class="checkbox">
                                <label>
                                    <input name="prd_featured" type="checkbox" value="1">
                                    Nổi bật
                                </label>
                            </div>
                        </div>--><!--
                        <div class="form-group">
                            <label> Mô tả sản phẩm</label>
                            <textarea name="prd_details" class="form-cotrol"  rows="3" style="width: 100%;height: 175px;font-size: 1.25rem" ><?php /*=$book['description']*/?></textarea>
                        </div>-->
                            <button class="btn-default">Làm mới</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</form>
    <?php
}
?>
</body>
</html>

