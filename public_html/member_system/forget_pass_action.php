<?php
include("../cart/config/db_connect.php");

$email = isset($_GET["forgetpass"])? $_GET["forgetpass"] : "";

$sql = "SELECT password FROM member WHERE email = '{$email}'";
$result = $conn->query($sql);

$row = $result->fetch_assoc();
echo "You password is {$row['password']}";
echo "<br>";
echo "<a href='member_login.php'>back to login page</a>"

?>

