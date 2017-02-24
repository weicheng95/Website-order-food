<?php
include 'layout_head.php';

if ($_SESSION['username'] == ''){
    echo "please login first";
    echo " <a href='../member_system/member_login.php'>Login</a>";
}else {

    echo 'thank you for buy our foods. You order will be arrived in 30 minutes';
    echo "<br>";
    $sql = "INSERT INTO member_order(order_no,name,price,quantity,id,category)
        SELECT order_no,name,price,quantity,id,category FROM cart_items";

    if ($conn->query($sql) === TRUE) {
        $sql_upd = "UPDATE member_order
              SET username = '{$_SESSION['username']}'
            ";
        if ($conn->query($sql_upd) === TRUE) {

            $conn->query("DELETE FROM cart_items");
            echo "<br>";
            echo "<a href='main.php'>BACK TO MAIN PAGE</a>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

}

?>

