<?php session_start(); ?>
<?php
// connect to database
include 'config/db_connect.php';

if (empty($_SESSION['username'])){
    $_SESSION['username']='';
}
?>
<html>
<head>

    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <title>線上訂餐網站</title>
    <style>

        body {
            font: 400 15px/1.8 Lato, sans-serif;
            color: #777777;
        }
        .container {
            padding: 50px 120px;
        }
        .nav-tabs li a {
            color: #777;
        }
        .form-set{
            padding-top: 8px;
        }
        .navbar {
            font-family:sans-serif;
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
            background-color: #555 !important;
        }
        .dropdown-menu li a {
            color: #000 !important;
        }
        .dropdown-menu li a:hover {
            background-color: red !important;
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
    </style>
    <script>
        var tempVal=1;
        //function to get quantity
        $( document ).ready(function() {

            $("select[name=quantity]").change(function(){
                tempVal = ($(this).find('option:selected').text());
            });
        });

        function getCal(id) {
            window.open("add_to_cart.php?id="+id+"&quantity="+tempVal, "_self");
        }
    </script>
</head>
<body>
<nav class="navbar navbar-default">
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
                        echo "Cart <span class='badge' id='comparison-count'> {$row['total']} </span> ";
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

<!-- container -->
<div class="container">
