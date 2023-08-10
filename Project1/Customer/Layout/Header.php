
<div class="app" xmlns="http://www.w3.org/1999/html">
    <header class="header">
        <div class="grid">
            <nav class="header__navbar">
                <ul class="header__navbar-list">
                    <li class="header__navbar-item  header__navbar-item--has-op  header__navbar-item--separate"><!--
                        <strong>Nguyễn Quốc Huy</strong>--> <!-- Làm thế nào để code tên khách hàng vào đây-->
                       <!-- <div class="header_op">
                            <img src="../assets/img/One_piece.png" alt="Warning Logo" class="header__op-img">
                        </div>-->
                       <!-- <i class="fa-regular fa-user"></i>-->
                        <!--<i class="header__navbar-icon fa-brands fa-dev"></i>-->
                    <?php
                    include_once '../../Connects/open.php';
                    if(isset($_SESSION['id'])){
                        $account = $_SESSION['id'];
                        $sql = "SELECT * From customer where id = $account";
                        $user = mysqli_query($connect,$sql);
                        foreach ($user as $value){
                            echo $value['name'];
                        }
                    }
                    else{
                    }
                    ?>
                    </li><!-- Để xem gắn cái gì vào đây-->
                    <li class="header__navbar-item">
                            <!--<span class="header__navbar-title--no-pointer">Kết nối</span>-->
                        <a href="" class="header__navbar-icon-link">
                            <!--<i class="header__navbar-icon far fa-message"></i>-->
                        </a>

                        <a href="" class="header__navbar-icon-link">
                            <!--<i class="header__navbar-icon fa-solid fa-phone"></i>-->
                        </a>
                    </li>
                </ul>

                <ul class="header__navbar-list">
                 <!--   <li class="header__navbar-item header__navbar-item--has-notification">
                        <i class="header__navbar-icon far fa-bell"></i>
                       <a href="" class="header__navbar-item-link">Thông báo</a>

                    </li>-->
                    <li class="header__navbar-item">
                        <!--<i class="header__navbar-icon fa-regular fa-circle-question"></i>-->
                        <a href="Guide.php" class="header__navbar-item-link"><i class="header__navbar-icon fa-regular fa-circle-question"></i>Trợ giúp</a>
                    </li>
                    <li class="header__navbar-item header_navbar-user">
                        <i class="fa-regular fa-user"></i>
                        <span class="header_navbar-user-name">Tài khoản</span>
                        <ul class="header__navbar-user-menu">
                           <!-- <li class="header__navbar-user-item">
                                <a href="../../Admins/Customers/Index.php" id="<?php /*= '$id' */?>">Tài khoản của tôi</a>
                            </li>-->
                            <li class="header__navbar-user-item">
                                <a href="../cart/History.php?id=<?= $_SESSION['id']?>">Đơn mua</a>
                            </li>
                            <li class="header__navbar-user-item">
                                <a href="../cart/index.php">Giỏ hàng</a>
                            </li>
                            <li class="header__navbar-user-item header__navbar-user-item--separate">
                                <a href="../Account/Logout.php">Đăng xuất</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <!-- HEADER WITH SEARCH -->
            <?php
    //Nhúng header vào
    //Nhúng file open.php để mở kết nối
    //Khai báo biến search
    $search = "";
    //Lấy giá trị được search về với điều kiện $_GET['search'] tồn tại
    if(isset($_GET['search'])){
        $search = $_GET['search'];
    }
    ?>
            <div class="header-with-search">
                <div class="header-logo" style="margin-right: 50px">
                    <a href="../Layout/Main.php" class="header_logo-link" ">
                        <img src="../../image/pngtree-education-book-logo-template-vector-illustration-design-png-image_5405269.png" alt="Logo" class="header_logo-img"  style="width: 100px ; height: 65px">
                    </a>
                </div>
                <div class="header_search" style="background: none">
                    <div class="header_search-input-wrap">
                        <!-- Cái action nhắm mục đích không bị bug khi bấm vào tìm kiếm ( nghĩa là nếu danh mục + tìm kiếm = BUG ) -->
                        <form action="Main.php" method="get" style="height: 100%">
                        <input type="text" class="header_search-input" placeholder="Bạn muốn tìm gì ?" name="search" value="<?= $search; ?>">
                    </div>
                    <button class="header-icon-search">
                        <i class="fa-solid fa-magnifying-glass header-search-tantai"></i>
                    </button>
                </form>
                </div>
                <!-- CART -->
                <a href="../cart/index.php"> <div class="header_cart" style="margin-left: 40px">
                    <div class="header_cart-wrap">
                        <i class="header_cart-icon  fa-solid fa-cart-shopping"></i>
                        </div>
                    </div>
                </a>
                </div>
            </div>

        </div>
    </header>
                </div>
            </div>
            </div>
</div>
