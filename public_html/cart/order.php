
<?php
include 'layout_head.php';

$sql = "SELECT username FROM member_order";
$result = $conn->query($sql);
$username = $result->fetch_assoc();

if($username['username']===$_SESSION['username']){
    $sql = "SELECT name,price,quantity,username FROM member_order" ;
    $result = $conn->query($sql);

    if($result->num_rows>0) {
        echo "<div class='container-fluid'>
            <div class='row'>
        ";
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
        echo "<tr>";
        echo "<td><b>Total</b></td>";
        echo "<td>&#36;{$total_price}</td>";
        echo "<td>{$total_qty}</td>";
        echo "</td>";
        echo "</tr>";
        echo "</table>";
        echo "<button class='btn btn-danger'><a href='delete_order.php'>CLEAR YOUR ORDER</a></button>";
        echo "</div>";
        echo "</div>";
    }
    else{
        echo "<div class='alert alert-danger'>";
        echo "<strong>You have no order anything yet</strong>";
        echo "</div>";
    }
}else{
    echo "<div class='alert alert-danger'>";
    echo "<strong>You have no order anything yet</strong>";
    echo "</div>";
}


?>
<?php
include 'layout_foot.php';
?>