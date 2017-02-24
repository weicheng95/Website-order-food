<?php
header('Content-Type:text/html; charset=utf-8');
include '../cart/config/db_connect.php';

?>

<html>
<head>
	<meta content="text/html"; charset="utf-8" http-equiv="content-type"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<style>
.form-horizontal{
	padding-top: 100px;
	padding-bottom: 50px;

}
</style>
</head>

<body>

<form method="post" class="form-horizontal" role="form" action="register_finish.php">
<div class="form-group">
<label class="control-label col-sm-5" for="username">Username: </label>
<div class="col-sm-3">
<input type="text" class="form-control" id="username" name="usr" placeholder="username used to login">
</div>
</div>

<div class="form-group">
<label class="control-label col-sm-5" for="password">Password: </label>
<div class="col-sm-3">
<input type="password" class="form-control" id="password" name="pw" placeholder="above 6 password number">
</div>
</div>

<div class="form-group">
<label class="control-label col-sm-5" for="password2">Enter Password again: </label>
<div class="col-sm-3">
<input type="password" class="form-control" id="password2" name="pw2" placeholder="above 6 password number">
</div>
</div>

<div class="form-group">
<label class="control-label col-sm-5" for="phone">Phone number:</label>
<div class="col-sm-3">
<input type="text" class="form-control" id="phone" name="phone" placeholder="989415111">
</div>
</div>

<div class="form-group">
<label class="control-label col-sm-5" for="address">Address: </label>
<div class="col-sm-3">
<input type="text" class="form-control" id="address" name="address" placeholder="市+區">
</div>
</div>

    <div class="form-group">
        <label class="control-label col-sm-5" for="email">Email: </label>
        <div class="col-sm-3">
            <input type="email" class="form-control" id="email" name="email" placeholder="example@gmail.com">
        </div>
    </div>
<div class="form-group">
<div class="col-sm-offset-5 col-sm-8">
<button type="submit" class="btn btn-default">Submit</button>
<a href="../cart/main.php" class="btn btn-info" role="button">Back to login page</a>
</div>
</div>

</form>


</body>

</html>
