<?php
include 'config/db_connect.php';
session_start();
if (empty($_SESSION['username'])) {
    $_SESSION['username'] = '';
}
?>

<html>
<head>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <title>線上訂餐網站</title>
    <style>

        .jumbotron {
            background-color: #0099cc;
            color: #ffffff;
            padding: 200px 50px;
            font-family: Montserrat, sans-serif;
        }
        body {
            font: 400 15px/1.8 Lato, sans-serif;
            color: #777777;
        }
        h3, h4 {
            margin: 10px 0 30px 0;
            letter-spacing: 10px;
            font-size: 20px;
            color: #111;
        }
        .container {
            padding: 50px 120px;
        }


        .bg-1 {
            background: #2d2d30;
            color: #bdbdbd;
        }
        .bg-1 h3 {color: #fff;}
        .bg-1 p {font-style: italic;}

        .row-procedure{
            padding-top:50px;
        }

        .thumbnail {
            padding: 0 0 15px 0;
            border: none;
            border-radius: 0;
        }
        .thumbnail p {
            margin-top: 15px;
            color: #555;
        }

        .btn {
            padding: 10px 20px;
            background-color: #333;
            color: #f1f1f1;
            border-radius: 0;
            transition: .2s;
        }
        .btn:hover, .btn:focus {
            border: 1px solid #333;
            background-color: #fff;
            color: #000;
        }

      h4 {
            background-color: #333;
            color: #fff !important;
            text-align: center;
            font-size: 30px;
        }

        .nav-tabs li a {
            color: #777;
        }
        #googleMap {
            width: 100%;
            height: 400px;
            -webkit-filter: grayscale(100%);
            filter: grayscale(100%);
        }
        .navbar {
            font-family: sans-serif;
            margin-bottom: 0;
            background-color: #2d2d30;
            border: 0;
            font-size: 11px !important;
            letter-spacing: 4px;
            opacity: 0.9;
        }
        .navbar li a, .navbar .navbar-brand {
            color: #d5d5d5 !important;
        }
        .navbar-nav li a:hover {
            color: #fff !important;
        }
        .navbar-nav li.active a {
            color: #fff !important;
            background-color: #29292c !important;
        }
        .navbar-default .navbar-toggle {
            border-color: transparent;
        }
        .open .dropdown-toggle {
            color: #fff;
            background-color: #555555 !important;
        }
        .dropdown-menu li a {
            color: #000 !important;
        }
        .dropdown-menu li a:hover {
            background-color: red !important;
        }
        footer {
            background-color: #2d2d30;
            color: #f5f5f5;
            padding: 32px;
        }
        footer a {
            color: #f5f5f5;
        }
        footer a:hover {
            color: #777;
            text-decoration: none;
        }
        .form-control {
            border-radius: 0;
        }
        textarea {
            resize: none;
        }
        .form-set{
            padding-top:10px;
        }

    </style>
    <script>
        var tempVal = 1;
        //function to get quantity
        $(document).ready(function () {

            $("select[name=quantity]").change(function () {
                tempVal = ($(this).find('option:selected').text());
            });
        });

        function getCal(id) {
            window.open("add_to_cart.php?id=" + id + "&quantity=" + tempVal, "_self");
        }
    </script>
</head>
<body id="myPage">
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">

        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">

                <?php if ($_SESSION['username'] != null) {
                   echo " <div>Welcome {$_SESSION['username']}<li><a href='../member_system/logout.php'>Logout</a></li></div>";

                } else {
                    echo " <li> <form class='form-inline form-set' method='post' action='../member_system/connect.php'>
                       Username: <input type='text' name='usr' class='form-control' size='6'>
                       Password:<input type='password' name='pw' class='form-control' size='6'>
                       <button type='submit ' style='display: none;'></button>
                    </form>
                    </li>";
                    echo "<li><a href='../member_system/register.php'><span class='glyphicon glyphicon-user'></span> Sign Up</a></li>";
 

                }


                ?>

            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="main.php">HOME</a></li>
                <li>
                    <a href="cart.php">
                        <?php

                        $sql = "SELECT COUNT(*)as total FROM cart_items ";
                        $result = $conn->query($sql);
                        $row = $result->fetch_assoc();
                        echo "CART <span class='badge' id='comparison-count'> {$row['total']} </span> ";
                        ?>
                    </a>
                </li>
                <li><a href="order.php">ORDER</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">FOODS
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="products.php?product=noodle">Noodles</a></li>
                        <li><a href="products.php?product=rice">Rice</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">DRINK
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="products.php?product=drink">Drink</a></li>
                    </ul>
                </li>

                <li>
                    <form class="form-inline form-set" method="get" action="search_products.php">
                        <input type="search" name="search" class="form-control" placeholder="search food here">
                        <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span>
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="jumbotron text-center">
    <h1>搜尋你的喜好</h1>
    <form class="form-inline" action="search_products.php" method="get">
        <input type="search" class="form-control" name="search" size="50" placeholder="find out your favourite foods">
        <button type="submit" class="btn">GO!</button>
    </form>
</div>

<div id="introduction" class="container text-center">
    <h3><em>WHY WE MAKE THIS?</em></h3>
    <p>現在大家都很忙、忙到連吃東西的時間都沒有。<br>為了解決大家的問題，我們決定寫一個網站，讓大家透過這個網站，不需要浪費時間在等待食物的製作。
        <br>透過網路訂購的方式，把食物送到您面前。</p>
    <br>
    <div class="row row-procedure">
        <h3><em>訂購流程</em></h3>
        <div class="col-sm-4">
            <p class="text-center"><strong>STEP 1</strong></p><br>
            <a href="#step1" data-toggle="collapse">
                <p>註冊帳號</p>
            </a>
            <div id="step1" class="collapse">
                <p>點選Sign Up註冊帳號</p>
                <p>輸入的你個人資料</p>
            </div>
        </div>
        <div class="col-sm-4">
            <p class="text-center"><strong>STEP 2</strong></p><br>
            <a href="#step2" data-toggle="collapse">
                <p>選擇你的喜好</p>
            </a>
            <div id="step2" class="collapse">
                <p>我們網站應有盡有</p>

            </div>
        </div>
        <div class="col-sm-4">
            <p class="text-center"><strong>STEP 3</strong></p><br>
            <a href="#step3" data-toggle="collapse">
                <p>等待食物送到您面前</p>
            </a>
            <div id="step3" class="collapse">
                <p>貨到付費</p>

            </div>
        </div>
    </div>
</div>
<br><br>
<!-- Container-->
<div id="popular" class="bg-1">
    <div class="container">
        <h3 class="text-center">推薦美食</h3><br>

        <div class="row text-center">
            <?php $result = $conn->query("SELECT * FROM products ORDER BY RAND() LIMIT 3");
            while ($row = $result->fetch_assoc()) {
                echo "<div class='col-sm-4''>";
                echo "<div class='thumbnail'>";
                echo " <img src='img/products_img/{$row['name']}.jpg' height='500' width='400'>";
                echo "<p><strong>{$row['name']}</strong></p>";
                echo "<p>NTD {$row['price']}</p>";
                echo "<p><button type='button' class='btn btn-primary' id='btn-1' onclick='getCal({$row['id']})'>
                  <span class='glyphicon glyphicon-shopping-cart'></span> Add to cart</button></p>";
            echo "</div>";
            echo "</div>";
            }
            ?>
        </div>

    </div>
</div>
<br>
<div id="contact" class="container">
<h3 class="text-center">OUR TEAM MEMBERS</h3>
<ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#member1">劉偉承</a></li>
    <li><a data-toggle="tab" href="#member2">陳彥嘉</a></li>
    <li><a data-toggle="tab" href="#member3">陳祺媛</a></li>
    <li><a data-toggle="tab" href="#member4">洪宇謙</a></li>
</ul>

<div class="tab-content">
    <div id="member1" class="tab-pane fade in active">

        <h3>程式開發總監</h3>
    </div>
    <div id="member2" class="tab-pane fade">

        <h3>程式開發、規劃開發流程及彙整、PM</h3>
    </div>
    <div id="member3" class="tab-pane fade">
        <h3>程式開發、資料庫建檔、測試人員</h3>
    </div>
    <div id="member4" class="tab-pane fade">
        <h3>程式開發、報告、測試人員、美術總監</h3>
    </div>
</div>
    <br>

</div>


<div id="googleMap"></div>

<!-- Add Google Maps -->
<script src="http://maps.googleapis.com/maps/api/js"></script>
<script>
    var myCenter = new google.maps.LatLng(22.757878, 120.338268);

    function initialize() {
        var mapProp = {
            center: myCenter,
            zoom: 12,
            scrollwheel: false,
            draggable: false,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);

        var marker = new google.maps.Marker({
            position: myCenter,
        });

        marker.setMap(map);
    }

    google.maps.event.addDomListener(window, 'load', initialize);
</script>

<!-- Footer -->
<footer class="text-center">
    <a class="up-arrow" href="#myPage" data-toggle="tooltip" title="TO TOP">
        <span class="glyphicon glyphicon-chevron-up"></span>
    </a><br><br>
    <p>MADE BY <strong>GROUP N</strong></p>
</footer>


</body>
</html>



