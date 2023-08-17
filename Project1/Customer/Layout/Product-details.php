
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product's Detail</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="../assets/css/grid.css">
    <link rel="stylesheet" href="../assets/css/responsive.css">
    <link rel="stylesheet" href="../assets/css/product.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="../assets/fonts/fontawesome-free-6.4.0-web/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400;700&display=swap" rel="stylesheet">
    <meta name="robots" content="noindex,follow" />
    <style>
        *{
            color: black;
        }
    </style>
</head>
<body>

<?php
//Lấy id của sp
$id = $_GET['id'];
//Mở kết nối
session_start();
include_once '../Layout/Header.php';
include_once '../../Connects/open.php';
//Viết query
$sql = "SELECT * FROM books WHERE id = '$id'";
//Chạy query
$books = mysqli_query($connect, $sql);
//Đóng kết nối
$sqlPublisher = "SELECT * FROM publishers";
$sqlCategories = "SELECT * FROM categories";
$sqlAuthors = "SELECT * FROM authors";
$au = mysqli_query($connect,$sqlAuthors);
$pub = mysqli_query($connect,$sqlPublisher);
$cat = mysqli_query($connect,$sqlCategories);
include_once '../../Connects/close.php';
?>
    <?php
    foreach ($books as $book){
        ?>
 <!--   Name: <?php /*= $book['name'] */?><br>
    Price: <?php /*= $book['price'] */?><br>
    Quantity: <?php /*= $book['quantity'] */?><br>-->
        <nav class="product">
            <div class="product_heading">
                <h1>
                   <?=$book['name']?>
                </h1>
            </div>
            <div class="row sm-gutter app__content">
                <div class="col l-5">
                    <a class="product_left">
                        <div class="product-img">
                            <img src="../../image/<?= $book['image']?>" alt="" class="product-img-sp1" style="height: 670px">
                            <!-- <div class="product_icons-directional">
                              <i class="product_icon-left fa-solid fa-angle-left"></i>
                              <i class="product_icon-right fa-solid fa-angle-right"></i>
                            </div> -->
                        </div>
                    </a>
                </div>
                <div class="col l-7">
                    <div class="product_right">
                        <div class="product_details-info">
                            <div class="product_details-meta">
                                <!--<div class="product_details-sku">
                                    Mã sản phẩm: <span class="sku"><?php /*= $book['id']*/?></span>
                                </div>-->
                                <!--<div class="product_details-separator"></div>
                                <div class="product_details-evaluate">
                                    Đánh giá :
                                </div>
                                <div class="product_details-icon-stars">
                                    <i class=" fa-sharp fa-solid fa-star "></i>
                                    <i class=" fa-sharp fa-solid fa-star"></i>
                                    <i class=" fa-sharp fa-solid fa-star"></i>
                                    <i class=" fa-sharp fa-solid fa-star"></i>
                                    <i class=" fa-sharp fa-solid fa-star"></i>
                                </div>
                                <a href="#" class="count-rate"> 0</a>
                                <div class="product_details-separator"></div>
                                <a href="#" class="product_details-view-counter">
                                    Bình luận :
                                    <span class="counter-number"> 0</span>
                                </a>
                                <div class="product_details-separator"></div>
                                <div class="product_details-view-counter">
                                    Lượt xem :
                                    <span class="counter-number">300</span>
                                </div>
                            </div>
                            <div class="product_details-meta" style="margin-top:0;">
                                <a href="" class="like-product" titl="">
                                    <i class="fa-sharp fa-solid fa-heart" style="color:red"></i>
                                    Muốn mua
                                </a>-->
                            </div>
                            <div class="product-summary-item" style="padding: 0;">
                          <!--      <div class="product-summary-item-title">Thông số sản phẩm này</div>-->
                                <ul class="product-summary-item-ul flex-wrap" id="">
                                    <li>
                                      <h5 style="font-weight: bold">Thông tin mô tả: <br> <?= $book['description']?> </h5>
                                    </li>
                                    <li>
                                        <br>
                                        <h5>Tên tác giả: <?php foreach($au as $a){ if($a['id'] == $book['author_id']){ echo $a['name'];}}?> </h5>
                                    </li>
                                    <li>
                                        <br>
                                        <h5>Thể loại sách:<?php foreach($cat as $ca){ if($ca['id'] == $book['category_id']){ echo $ca['name'];}}?></h5>

                                    </li>
                                    <li>
                                        <br>
                                       <h5>Nhà xuất bản:  <?php foreach($pub as $pu){ if($pu['id'] == $book['publisher_id']){ echo $pu['name'];}}?></h5>
                                    </li>
                                </ul>
                            </div>
                            <div class="price-2021" id="product-info-price">
                                <!--<p style="margin-top:-5px ; font-size: 15px; color:white">Giá khuyến mãi:</p>-->
                                <!--<span class="price_old">20.500.000đ</span>-->
                                <div class="price_new">
                                    <p style="font-size: 14px;">Giá ưu đãi đặc biệt:</p>
                                    <strong class="price_promotion" id="js-pd-price" data-price="1750000">
                                        <?= number_format($book['price'],0,',',',');?>đ
                                    </strong>
                                    <strong class="price_promotion" id="js-pd-price" data-price="1750000"></strong>
                                </div>
                                <!--<div class="product_summary-item ribbons">
                                    <div class="yellow-ribbon">Không có bảo hành</div>
                                </div>-->
                            </div>
                            <div class="box-number-quan-detail">
                            <!--    <span class="number-product-want-buy">Số lượng:</span>-->
                                <span class="new-cart-quantity">
                         <!-- <a href="#" class="quantity-change" data-value="-1">-</a>-->
<!--                                    <input type="number" value="<?php /*= $quantity; */?>" name="quantity[<?php /*= $id; */?>]" min="1" class="buy-quantity quantity-change">
-->                         <!-- <a href="#" class="add quantity-change" date-value="1">+</a>-->
                        </span>
                              <!--  <a href="../cart/add-to-cart.php?id=<?php /*= $id */?>" onclick="" class="them-vao-gio-hang">
                                    <i class="fa-solid fa-cart-plus"></i>
                                    <span>Thêm vào giỏ hàng</span>
                                </a>-->
                               <!-- <a href="" class="like-product" title="Thích sản phẩm này " onclick="">
                                    <i class="fa-sharp fa-solid fa-heart" style="color:red"></i>
                                </a>-->
                            </div>
                            <div class="clear"></div>
                            <div id="button-buy" class="d-flex flex-wrap justify-content-start">
                                <div class="top-button">
                                    <a href="../cart/add-to-cart.php?id=<?=$book['id']?>" onclick="" class="buy-now" style="padding-top: 40px;font-size: 40px">
                                        <!--<span>Đặt mua ngay</span>-->
                                        Thêm vào giỏ hàng
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <?php
}
include_once '../Layout/Footer.php';
?>
</body>
</html>