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
$imgSource ='';
$sql = "SELECT * FROM books WHERE id = '$id'";
$books = mysqli_query($connect, $sql);
include_once '../../Connects/close.php';
foreach ($books AS $book){
    ?>

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
                <form method="post" action="update.php" enctype="multipart/form-data">
                <h1 class="page-header"><?=$book['name']?></h1>
                <div class="row sm-gutter">
                    <div class="col l-6">
                        <form action="update.php" role="form" method="post">
                            <input type="hidden" name="id" id="id" value="<?=$book['id']?>">
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
                                <textarea name="description" class="form-cotrol"  rows="3" style="width: 100%;height: 175px;font-size: 1.25rem" ><?=$book['description']?></textarea>
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
                    </div>
                    <div class="col l-6">
                        <select name="category_id" id="" class="form-control">
                            <?php
                            foreach ($categories as $category) {
                                ?>
                                <option value="<?= $category['id'] ?>"
                                    <?php
                                    if ($book['category_id'] == $category['id']) {
                                        echo 'selected';
                                    }
                                    ?>
                                >
                                    <?= $category['name'] ?> </option>
                                <?php
                            }
                            ?>
                        </select>
                        <br>
                        <select name="publisher_id" class="form-control">
                            <?php
                            foreach($publishers as $publisher){
                                ?>
                                <option value="<?= $publisher['id'] ?>"
                                    <?php
                                    if ($book['publisher_id'] == $publisher['id']) {
                                        echo 'selected';
                                    }
                                    ?>
                                >
                                    <?= $publisher['name']?>
                                </option>
                                <?php
                            }
                            ?>
                        </select><br>
                        <div class="form-group">
                            <label>Ảnh sản phẩm</label>
                            <input name="image" type="file" value="../images/<?= $book['image'] ?>"
                                   accept="image/*"/>
                            <br>
                            <?php
                            $imgSource = $book['image'];
                            ?>
                            <div>
                                <img src="../../image/<?=$book['image']?>"  width="120px" height="150px" alt="">
                            </div>
                        </div>
                        <select name="author_id" class="form-control">
                            <?php
                            foreach($authors as $author){
                                ?>
                                <option value="<?= $author['id'] ?>"
                                <?php
                                if ($book['category_id'] == $author['id']) {
                                    echo 'SELECTED';
                                }
                                ?>
                                >
                                    <?= $author['name']?>
                                </option>
                                <?php
                            }
                            ?>
                        </select><br>
                            <button class="btn-default">Làm mới</button>
                    </form>

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
<script>
    // Get a reference to our file input
    const fileInput = document.querySelector('input[type="file"]');

    // Create a new File object
    const myFile = new File(['strings'], '<?=$imgSource?>', {
        type: 'text/plain',
        lastModified: new Date(),
    });

    // Now let's create a DataTransfer to get a FileList
    const dataTransfer = new DataTransfer();
    dataTransfer.items.add(myFile);
    fileInput.files = dataTransfer.files;
</script>
