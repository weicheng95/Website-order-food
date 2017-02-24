<?php
header('Content-Type:text/html; charset=utf-8');
include("login.inc.php");


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
        padding-left:80px;
        padding-right:50px;
        border-style: solid;
        
    }
    .row{
        padding-top: 150px;
    }
    .font-1{
        text-align: center;
    }
    
    </style>
    </head>
        
    <body>

<div class="container-fluid">
<div class="row">
<div class="col-md-4">
</div>

<div class="col-md-4 bg-1">
<h4 class="font-1"><strong>會員登入</strong></h4>
	<form method="post" class="form-inline" role="form" action="connect.php">
	<div class="form-group">
    <label for="username">Username: </label>
    <input class="form-control" id="username" name="usr" type="text">
    </div><br><br>

    <div class="form-group">
    <label class="control-label" for="password">Password: </label>
    <input class="form-control" id="password" name="pw" type="password"> 
    </div><br><br>

    <div class="form-group ">
    <button type="submit" class="btn btn-default">Submit</button>
    <button type="submit" class="btn btn-danger">Forget password</button>
    <a href="register.php" class="btn btn-info" role="button">Register</a>
    </div><br><br>
    
   
    </form>
 </div>

 <div class="col-md-4">
 </div>

 </div>
 </div>

   
   




</body>
</html>


