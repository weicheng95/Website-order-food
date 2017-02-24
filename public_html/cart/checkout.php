<?php
include 'layout_head.php';

$action = isset($_GET['action']) ? $_GET['action'] : "";
$name = isset($_GET['name']) ? $_GET['name'] : "";

    $sql = "SELECT * FROM cart_items" ;
    $result = $conn->query($sql);

    if($result->num_rows>0) {
        echo "<table class='table table-hover table-responsive table-bordered'>";

        // our table heading
        echo "<tr>";
        echo "<th class='textAlignLeft'>Product Name</th>";
        echo "<th>Price (NTD)</th>";
        echo "<th>Quantity</th>";
        echo "</tr>";
        $total_price = 0;
        $total_qty = 0;
        while ($row = $result->fetch_assoc()) {


            echo "<tr>";
            echo "<td>{$row['name']}</td>";
            echo "<td>&#36;{$row['price']}</td>";
            echo "<td>{$row['quantity']}</td>";
            echo "</tr>";

            $total_price += ($row['price'] * $row['quantity']);
            $total_qty += $row['quantity'];
        }
    }
    echo "<tr>";
    echo "<td><b>Total</b></td>";
    echo "<td>&#36;{$total_price}</td>";
   
    echo "</tr>";
    echo "</table>";

//get user data from db and show it
    $sql = "SELECT * FROM member WHERE username = '{$_SESSION['username']}' ";
    $result = $conn->query($sql);
    if($result->num_rows>0){
        while($row = $result->fetch_assoc()){
            echo "<p><h4>username : {$row['username']} </h4></p>";
            echo "<p><h4>Phone Number: {$row['phone']} </h4></p>";
            echo "<p><h4>Address: {$row['address']} </h4></p>";
            echo "<p><h4>Email: {$row['email']} </h4></p>";
        }
    }
       echo "<a href='confirm_checkout.php' class='btn btn-success'>";
       echo "<span></span> Confirm";
       echo "</a>";





include 'layout_foot.php';

?>
