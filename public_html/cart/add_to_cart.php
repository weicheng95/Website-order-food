
<?php
include 'config/db_connect.php';


$id = isset($_GET['id']) ? $_GET['id'] : "";
$quantity = isset($_GET['quantity']) ? $_GET['quantity'] : "";

//check for the product exist in cart
$sql = "SELECT id,name from cart_items WHERE id = '{$id}'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $sql = "UPDATE cart_items
            SET quantity = quantity + '{$quantity}'
            WHERE id ='{$row['id']}' ";


    if ($conn->multi_query($sql) === TRUE) {
        header('Location: products.php?action=added&id=' . $id . '&name=' . "{$row['name']}" . '&quantity=' . $quantity . '&product=' . $_COOKIE['product_category']);
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

   }

//else product no exist in cart
    else {
//insert product into cart
    $sql = "INSERT INTO cart_items(id,name,category,price)
            SELECT id,name,category,price FROM products WHERE id = '{$id}' 
            ";

    if ($conn->query($sql) === TRUE) {
        $sql_upd = "UPDATE cart_items
            SET quantity = '{$quantity}'
            WHERE id  = '{$id}'
            ";
        if ($conn->query($sql_upd) === TRUE) {
            $sql_name = " SELECT name FROM products WHERE id = '{$id}'";
            $result = $conn->query($sql_name);
            $row = $result->fetch_assoc();
            header('Location: products.php?action=added&id=' . $id . '&name=' . "{$row['name']}" . '&quantity=' . $quantity . '&product=' . $_COOKIE['product_category']);
        }
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    //insert quantity into cart

}


?>

