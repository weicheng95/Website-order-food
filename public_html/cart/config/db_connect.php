<?php
$servername = "mysql.hostinger.in";
$username = "u280612819_cart";
$password = "cheng9595";
$dbname = "u280612819_cart";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
$conn->set_charset("utf8");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>