<?php
session_start();
if (!isset($_SESSION['email'])){
    header('Location: ../Account/Login.php');
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BookBKACAD</title><!--
    <link rel="stylesheet" type="text/css" href="../../Project_1/Css/Roboto-BoldItalic.ttf">-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" type= "text/css" href="../assets/css/base.css">
    <link rel="stylesheet" type= "text/css" href="../assets/css/main.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/product-details.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/app.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="../assets/fonts/fontawesome-free-6.4.0-web/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400;700&display=swap"
    <link href="../assets/fonts/fontawesome-free-6.4.0-web/js/all.js" rel="stylesheet" >

    <?php
    //Nhúng header vào
    //Nhúng file open.php để mở kết nối

    include_once '../../Connects/open.php';
    //Khai báo biến search
    $search = "";
    //Lấy giá trị được search về với điều kiện $_GET['search'] tồn tại
    if(isset($_GET['search'])){
        $search = $_GET['search'];
    }
    //Khai báo số bản ghi 1 trang
    $recordOnePage = 10;
    //Query để lấy số bản ghi
    $sqlCountRecord = "select COUNT(*) AS count_record from books inner join categories ON books.category_id = categories.id WHERE books.name LIKE '%$search%' GROUP BY categories.id";
    //Chạy query lấy số bản ghi
    $countRecords = mysqli_query($connect, $sqlCountRecord);
    //foreach để lấy số bản ghi
    foreach ($countRecords as $countRecord){
        $records = $countRecord['count_record'];
    }
    //Tính số trang
    $countPage = ceil($records / $recordOnePage);
    //Lấy trang hiện tại (nếu không tồn tại page hiện tại thì page hiện tại = 1)
    $page = 1;
    if(isset($_GET['page'])){
        $page = $_GET['page'];
    }
    //Tính bản ghi bắt đầu của trang
    $start = ($page - 1) * $recordOnePage;
    //Query để lấy dữ liệu từ bảng classes trên db về
    /* $sql = "SELECT * FROM books WHERE name LIKE '%$search%' LIMIT $start, $recordOnePage";*/
    //Chạy query
    /* $books = mysqli_query($connect, $sql);*/
    //Đóng kết nối
    $id = $_GET['id'];
    $sqlCategoriesBooks = "SELECT books.* , categories.name as book_categories , categories.id  from books inner join categories on books.category_id = categories.id WHERE books.name LIKE '%$search%' LIMIT $start, $recordOnePage";
    $find = mysqli_query($connect,$sqlCategoriesBooks);
    $sql = "SELECT books.* , categories.name as book_categories , categories.id  from books inner join categories on books.category_id = categories.id where categories.id = '$id' ";
    $books = mysqli_query($connect,$sql);
    $sqlCategories = "SELECT * FROM categories";
    $categories = mysqli_query($connect,$sqlCategories);
    include_once 'Header.php';
    include_once '../../Connects/close.php';
    ?>
    <style>
        .fa-cart-plus{
            background:#0652DD;
        }
        .addtocart{
            display:block;
            padding:0.5em 1em 0.5em 1em;
            border-radius:100px;
            border:none;
            font-size:1em;
            position:relative;
            background:#0652DD;
            cursor:pointer;
            height:2em;
            width:10em;
            overflow:hidden;
            transition:transform 0.1s;
            z-index:1;
        }
        .addtocart:hover{
            transform:scale(1.1);
        }
        .pretext{
            color:#fff;
            background:#0652DD;
            position:absolute;
            top:0;
            left:0;
            height:100%;
            width:100%;
            display:flex;
            justify-content:center;
            align-items:center;
            font-family: 'Quicksand', sans-serif;
        }
        i{
            margin-right:10px;
        }
        .done{
            background:#be2edd;
            position:absolute;
            width:100%;
            top:0;
            left:0;
            transition:transform 0.3s ease;

            transform:translate(-110%) skew(-40deg);
        }
        .posttext{
            background:#be2edd;
        }
        .fa-check{
            background:#be2edd;
        }

    </style>
</head>
<body>
<div class="app__container" style="background: rgb(217,214,214)">
    <div class="grid">
        <div class="grid__row app__content">
            <div class="grid__column-2">
                <nav class="category">
                    <h3 class="category_heading">
                        <i class="category_heading-icon fa-solid fa-list"></i>
                        Danh mục
                    </h3>
                    <!--Cần chỉnh lại category xong hỏi thầy làm thế nào để hiển thị danh mục-->
                    <!-- <ul class="category-list">
                         <li class="category-item ">
                             <i class="category-item--mochichip fa-solid fa-hands-holding-child"></i>
                             <a href="#" class="category-item_link">Sách đời sống </a>

                         </li>
                         <li class="category-item">
                             <i class="category-item--mochichip fa-solid fa-book"></i>
                             <a href="#" class="category-item_link">Tài liệu học tập</a>
                         </li>
                         <li class="category-item">
                             <i class="category-item--mochichip fa-solid fa-masks-theater"></i>
                             <a href="#" class="category-item_link">Truyện tranh</a>
                         </li>
                         <li class="category-item">
                             <i class="category-item--mochichip fa-solid fa-vihara"></i>
                             <a href="#" class="category-item_link">Văn hóa sử sách</a>
                         </li>

                         <li class="category-item">
                             <i class="category-item--mochichip fa-solid fa-atom"></i>
                             <a href="#" class="category-item_link"  >Sách khoa học</a>
                         </li>
                         <li class="category-item">
                             <i class="category-item--mochichip fa-solid fa-seedling"></i>
                             <a href="#" class="category-item_link">Thiên nhiên - Con người</a>
                         </li>
                     </ul>-->
                    <?php
                    foreach ($categories as $category){
                        ?>
                        <ul class="category-list">
                            <li class="category-item ">
                                <a href="List.php?id=<?= $category['id']?>" class="category-item_link"> <?= $category['name']?> </a>
                            </li>
                        </ul>
                        <?php
                    }
                    ?>
                </nav>
            </div>
            <div class="grid__column-10" style="height: auto">
                <div class="home-filter" style="background: rgb(133,131,131)">
                    <span class="home-filter__label">Sắp xếp theo</span>
                    <a class="home-filter__btn btn" href="Popular.php" style="text-decoration: none;background: rgb(255,255,255);color: rgb(16,13,13);font-weight: normal">Phổ biến</a>
                    <a class="home-filter__btn btn btn-primary" href="Newest.php" style="background: rgb(255,255,255);text-decoration: none;color: rgb(16,13,13);font-weight: normal">Mới nhất</a>
                    <a class="home-filter__btn btn" href="Best_Seller.php" style="text-decoration: none;background: rgb(255,255,255);color: rgb(16,13,13);font-weight: normal" >Bán chạy</a>
                    <div class="select-input" style="background: #ffffff;">
                        <span class="select-input_label" style="color:rgb(16,13,13);">Giá</span>
                        <i class="fa-solid fa-caret-down"></i>

                        <ul class="select-input__list">
                            <li class="select-input__item">
                                <a href="Cheapest.php" class="select-input__link">- Giá thấp đến cao</a>
                            </li>
                            <li class="select-input__item">
                                <a href="Expensive.php" class="select-input__link">- Giá cao đến thấp</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="home-product">
                    <div class="grid__row">
                        <!-- Grid->Row->Column -->
                        <!-- Product item -->
                        <?php foreach ($books as $book)
                        {
                            ?>
                            <div class="grid__column-2-4">
                                <a href="Product-details.php?id=<?= $book['id'] ?>" class="home-product-item" style="background: rgba(255,255,255)">
                                    <div class="home-product-item__img " style="padding-top: 0%">
                                        <img src="../../image/<?= $book['image']?>" style="width: 100% ;height:200px; ">
                                    </div>
                                    <h4 class="home-product-item__name" style="color: black"> <?= $book['name']?></h4>
                                    <div class="home-product-item__price" style="display: flex; justify-content: space-between">
                                        <span class="home-product-item__brand" style="font-size: 1.1rem;color: rgb(0,0,0)"><?= $book['book_categories']?></span>
                                        <span class="home-product-item__price-current" style="font-size: 1.5rem"><?= $book['price'] ?>đ</span>
                                    </div>
                                    <div class="home-product-item__action">
                                            <span class="home-product-item__like  home-product-item__like--liked">
                                                <i class="home-product-item__like-icon-empty fa-regular fa-heart"></i>
                                            </span>
                                    </div>
                                    <div class="home-product-item__origin">
                                        <span class="home-product-item__origin-name"></span>
                                    </div>
                                </a>
                                <span class="addtocart" style="margin-top: 10px" >
                                    <div class="pretext">
                                        <a href="../cart/add-to-cart.php?id=<?= $book['id']?>" style="text-decoration: none;color: white">
                                            <i class="fas fa-cart-plus"></i> ADD TO CART
                                    </div>
                                </span>
                            </div>
                            <?php
                        }
                        ?>
                        <ul class="pagination  home-product__pagination">
                            <?php
                            for($i = 1; $i <= $countPage; ++$i){
                                ?>
                                <li class="pagination-item">
                                    <a href="?page=<?= $i ?>&search=<?= $search ?>" class="pagination-item__link">
                                        <?= $i ?>
                                    </a>
                                </li>
                                <?php
                            }
                            ?>
                        </ul>
                    </div>
                </div>
                <div class="grid__full-width product__show">
                    <div class="grid__column-12">

                    </div>
                </div>
            </div>
        </div>

        <?php
        include_once 'Footer.php';
        ?>
</body>
</html>
