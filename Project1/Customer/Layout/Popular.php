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
    $recordOnePage = 5;
    //Query để lấy số bản ghi
    $sqlCountRecord = "SELECT COUNT(*) AS count_record FROM books WHERE name LIKE '%$search%'";
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
    include_once 'Header.php';
    $start = ($page - 1) * $recordOnePage;
    $sqlCategoriesBooks = "SELECT books.* , categories.name as book_categories , categories.id  from books inner join categories on books.category_id = categories.id WHERE books.name LIKE '%$search%' LIMIT $start, $recordOnePage";
    $books = mysqli_query($connect,$sqlCategoriesBooks);
    $sqlPopularity = "SELECT books.*, categories.id as catego_id , categories.name as cat_name , COUNT(book_id) FROM books INNER JOIN categories ON books.category_id = categories.id INNER JOIN order_details ON books.id = order_details.book_id  GROUP BY books.id ORDER BY COUNT(book_id) desc LIMIT $start, $recordOnePage";
    $popularity = mysqli_query($connect,$sqlPopularity);
    $sqlCategories = "SELECT * FROM categories";
    $categories = mysqli_query($connect,$sqlCategories);
    include_once '../../Connects/close.php';
    ?>
</head>
<body>
<div class="app__container">
    <div class="grid">
        <div class="grid__row app__content">
            <div class="grid__column-2">
                <nav class="category">
                    <h3 class="category_heading">
                        <i class="category_heading-icon fa-solid fa-list"></i>
                        Danh mục
                    </h3>
                    <?php
                    foreach ($categories as $category){
                        ?>
                        <ul class="category-list">
                            <li class="category-item ">
                                <a href="List.php?id=<?= $category['id']?>" class="category-item_link"> <?= $category['name']?> </a>
                            </li>
                            <!--Mỗi categories trong database nó sẽ tự hiện ra kết hợp với việc nó hiện đúng tên. Khi click vào nó sẽ truyền id cho List.php để hiện thị đúng sản phẩm thuộc danh mục đó-->
                        </ul>
                        <?php
                    }
                    ?>
                </nav>
            </div>

            <div class="grid__column-10" style="height: 600px">
                <div class="home-filter">
                    <span class="home-filter__label">Sắp xếp theo</span>
                    <a href="Popular.php" class="home-filter__btn btn" style="background: rgb(236,43,43);text-decoration: none">Phổ biến</a>
                    <a href="Newest.php" class="home-filter__btn btn btn-primary" style="background: none;text-decoration: none">Mới nhất</a>
                    <a href="Best_Seller.php" class="home-filter__btn btn" style="text-decoration: none">Bán chạy</a>

                    <div class="select-input">
                        <span class="select-input_label">Giá</span>
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
                        <?php foreach ($popularity as $value)
                        {
                            ?>
                            <div class="grid__column-2-4">
                                <a href="Product-details.php?id=<?= $value['id'] ?>" class="home-product-item">
                                    <div class="home-product-item__img " style="padding-top: 0%"> <img src="../../image/<?= $value['image']?>" style="width: 100% ;height:200px; "> </div>
                                    <h4 class="home-product-item__name"> <?= $value['name']?></h4>
                                    <div class="home-product-item__price">
                                        <!--<span class="home-product-item__price-old"><?php /*= $book['price']*/?>$</span>-->
                                        <span class="home-product-item__price-current" style="font-size: 2rem"><?= $value['price'] ?>$</span>
                                    </div>
                                    <div class="home-product-item__action">
                                            <span class="home-product-item__like  home-product-item__like--liked">
                                                <i class="home-product-item__like-icon-empty fa-regular fa-heart"></i>
                                                <i class="home-product-item__like-icon-fill fa-solid fa-heart"></i>
                                                <!-- <i class="fa-sharp fa-solid fa-heart"></i> -->
                                            </span>
                                        <div class="home-product-item__rating">
                                            <i class="home-product-item__start-gold fa-sharp fa-solid fa-star"></i>
                                            <i class="home-product-item__start-gold fa-sharp fa-solid fa-star"></i>
                                            <i class="home-product-item__start-gold fa-sharp fa-solid fa-star"></i>
                                            <i class="home-product-item__start-gold fa-sharp fa-solid fa-star"></i>
                                            <i class="home-product-item__start-gold fa-sharp fa-solid fa-star"></i>
                                        </div>
                                        <span class="home-product-item__sold">1 Đã bán</span>
                                    </div>
                                    <div class="home-product-item__origin">
                                        <span class="home-product-item__brand"><?= $value['cat_name']?></span>
                                        <span class="home-product-item__origin-name"></span>
                                    </div>
                                    <div class="home-product-item__favourite">
                                        <i class="fa-solid fa-check"></i>
                                        <span> Yêu thích</span>
                                    </div>
                                    <div class="home-product-item__sale-off">
                                        <span class="home-product-item__sale-off-percent">14%</span>
                                        <span class="home-product-item__sale-off-label">GIẢM</span>
                                    </div>
                                </a>
                                <span class="addtocart" style="margin-top: 10px" >
                                    <div class="pretext">
                                        <a href="../cart/add-to-cart.php?id=<?= $value['id']?>" style="text-decoration: none;">
                                            <i class="fas fa-cart-plus"></i> ADD TO CART
                                    </div>
                                </span>
                            </div>
                            <?php
                        }
                        ?>
                        <ul class="pagination  home-product__pagination">
                            <?php
                            for($i = 1; $i <= $countPage; $i++){
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
    </div>
</div>
<?php
include_once 'Footer.php';
?>
</body>
</html>
