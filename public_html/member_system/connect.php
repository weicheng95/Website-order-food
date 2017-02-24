<?php session_start(); ?>
<?php
header('Content-Type:text/html; charset=utf-8');
include '../cart/config/db_connect.php';


$usr = $_POST['usr'];
$pw = $_POST['pw'];


$query = "SELECT * FROM member where username='$usr' ";
$result = $conn->query($query);
$row = $result->fetch_assoc();


if($usr!='' && $pw!='' && $row['username'] ==$usr && $row['password']==$pw)
{
	 $_SESSION['username'] = $usr;
    header('Location: ../cart/main.php');

}
else
{
        echo '登入失敗!';
        echo '';
}



?>

