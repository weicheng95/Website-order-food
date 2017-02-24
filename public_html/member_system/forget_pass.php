<?php
header('Content-Type:text/html; charset=utf-8');
include("../cart/config/db_connect.php");
?>
<html>
<head>
    <meta content="text/html"; charset="utf-8" http-equiv="content-type">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <style>
        .bg-1{
            padding-top: 20px;
            padding-bottom:2s0px;
            padding-left:20px;
            padding-right:20px;
            border-style: solid;

        }
        .row{
            padding-top: 150px;
        }


    </style>
</head>

<body>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
        </div>

        <div class="col-md-4 bg-1">
        <form action="forget_pass_action.php"  method="get">
            <label for forgetpass>Enter your email:</label>
            <input type="email" name="forgetpass">
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
        </div>

        <div class="col-md-4">
        </div>

    </div>
</div>







</body>
</html>


