<?php
include 'config/db_connect.php';
$id = isset($_GET['id']) ? $_GET['id'] : "";
$name = isset($_GET['name']) ? $_GET['name'] : "";

$sql = "DELETE FROM cart_items WHERE id = '{$id}' AND (name='{$name}')";
if($conn->query($sql) == true)
{
    header('Location: cart.php?action=removed&id=' . $id . '&name=' . $name);

}else
{
    echo "Error: " . $sql . "<br>" . $conn->error;
}

?>

