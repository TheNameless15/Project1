<?php

$dataPoints = array(
    array("x"=> 10, "y"=> 41),
    array("x"=> 20, "y"=> 35, "indexLabel"=> "Lowest"),
    array("x"=> 30, "y"=> 50),
    array("x"=> 40, "y"=> 45),
    array("x"=> 50, "y"=> 52),
    array("x"=> 60, "y"=> 68),
    array("x"=> 70, "y"=> 38),
    array("x"=> 80, "y"=> 71, "indexLabel"=> "Highest"),
    array("x"=> 90, "y"=> 52),
    array("x"=> 100, "y"=> 60),
    array("x"=> 110, "y"=> 36),
    array("x"=> 120, "y"=> 49),
    array("x"=> 130, "y"=> 41)
);
include_once '../Layout/Header.php';
include_once '../../Connects/open.php';
$test= array();
$count = 0;
$sql = "SELECT date_buy ,ROUND(SUM(price*quantity)) AS SumDoanhThu , orders.* , order_details.* FROM orders inner join order_details on order_details.order_id = orders.id where status = 2  GROUP BY date_buy";
$order = mysqli_query($connect,$sql);
while ($row = mysqli_fetch_array($order)){
    if($row['status'] == 2){
        $test[$count]["label"] = $row["date_buy"];
        $test[$count]["y"]  = $row["SumDoanhThu"];
        $count = $count+1;
    }
}
$sqlNewest = "SELECT distinct date_buy ,ROUND(SUM(price*quantity)) AS SumDoanhThu FROM orders inner join order_details on order_details.order_id = orders.id GROUP BY date_buy order by date_buy desc limit 1";
$day = mysqli_query($connect,$sqlNewest);
$today = date('y-m-d');
$last7days = date('y-m-d',time() - 7 * (60*60*24));
$sqlWeeklyIncome = "SELECT MAX(date_buy), ROUND(SUM(price*quantity)) as SumDoanhThu From orders inner join order_details on order_details.order_id = orders.id WHERE (orders.date_buy between '$last7days' and '$today' ) and ( orders.status = 2 ) ";
$WeeklyIncome = mysqli_query($connect,$sqlWeeklyIncome);
$thisMonth = date('y-m-01');
include_once '../../Connects/close.php';
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
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
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<head>
    <script>
        window.onload = function () {

            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                exportEnabled: true,
                theme: "light1", // "light1", "light2", "dark1", "dark2"
                title:{
                    text: "Simple Column Chart with Index Labels"
                },
                axisY:{
                    includeZero: true
                },
                data: [{
                    type: "column", //change type to bar, line, area, pie, etc
                    //indexLabel: "{y}", //Shows y value on all Data Points
                    indexLabelFontColor: "#5A5757",
                    indexLabelPlacement: "outside",
                    dataPoints: <?php echo json_encode($test, JSON_NUMERIC_CHECK); ?>
                }]
            });
            chart.render();
        }
    </script>
</head>
<body>
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
            <div id="chartContainer" style="height: 370px; width: 100%;"></div>
            <div style="display: flex; justify-content: space-around">
                <div style="width: 150px; height: 150px; background: #0b0b0b ; display: block; justify-content: center;align-items: center ">
                    <h3 style="margin: 0px 20px">Doanh thu ngày hôm nay</h3>
                       <div style="margin: 25% 15%">
                            <span style="margin: 0px 20px;font-weight: bold;font-size: 2.25rem;padding: 0px 0px">
                            <?php
                            foreach ($day as $item){
                                echo '+'.$item['SumDoanhThu'].'$';
                            }
                            ?>
                        </span>
                       </div>
                </div>
                <div style="width: 150px; height: 150px; /*margin: 0px 100px*/; background: #0b0b0b ; display: block; justify-content: center;align-items: center ">
                    <h3 style="margin: 0px 20px">Doanh thu tong 7 ngay truoc </h3>
                        <div style="margin: 35% 15%">
                            <span style="margin: 0px 20px;font-weight: bold;font-size: 2.25rem;padding: 0px 0px">
                                <?php
                                    foreach ($WeeklyIncome as $item) {
                                        echo '+'.$item['SumDoanhThu'].'$';
                                    }
                                ?>
                    </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
</body>
</html>