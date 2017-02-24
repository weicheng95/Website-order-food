<?php
header('Content-Type:text/html; charset=utf-8');
include '../cart/config/db_connect.php';

$usr = $_POST['usr'];
$pw = $_POST['pw'];
$pw2 = $_POST['pw2'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$email = $_POST['email'];

if($usr!='' && $pw!='' && $pw2!='' && $pw==$pw2)
{
	$sql = "insert into member(username,password,phone,address,email) values('$usr','$pw','$phone','$address','$email')";

	if($conn->query($sql) === TRUE)
	{
		echo "success";

	}else
	{
		echo"register failed";
	}
}
else{
	echo"unauthorized access to this page";
}
?>

<html>
<head>
	<meta content="text/html"; charset="utf-8" http-equiv="content-type"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


</head>

<body>


<a href="../cart/main.php">Back to login page.</a>



</body>

</html>