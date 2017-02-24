
<?php
include 'layout_head.php';


$action = isset($_GET['action']) ? $_GET['action'] : "";
$name = isset($_GET['name']) ? $_GET['name'] : "";

//show message when product removed
if($action=='removed'){
    echo "<div class='alert alert-info'>";
    echo "<strong>{$name}</strong> was removed from your cart!";
    echo "</div>";
}
    //get data from db(cart_items)
    $sql = "SELECT * FROM cart_items" ;
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
        echo "<th>Action</th>";
        echo "</tr>";
        $total_price = 0;
        $total_qty = 0;
        while ($row = $result->fetch_assoc()) {


            echo "<tr>";
            echo "<td>{$row['name']}</td>";
            echo "<td>&#36;{$row['price']}</td>";
            echo "<td>{$row['quantity']}</td>";
            echo "<td>";
            echo "<a href='remove_from_cart.php?id={$row['id']}&name={$row['name']}' class='btn btn-danger'>";
            echo "<span class='glyphicon glyphicon-remove'></span> Remove from cart";
            echo "</a>";
            echo "</td>";
            echo "</tr>";

            $total_price += ($row['price'] * $row['quantity']);
            $total_qty += $row['quantity'];
        }

        echo "<tr>";
        echo "<td><b>Total</b></td>";
        echo "<td>&#36;{$total_price}</td>";
        echo "<td>{$total_qty}</td>";
        echo "<td>";
        echo "<a href='checkout.php' class='btn btn-success'>";
        echo "<span class='glyphicon glyphicon-shopping-cart'></span> Checkout";
        echo "</a>";
        echo "</td>";
        echo "</tr>";

        echo "</table>";
        echo "</div>";
        echo "</div>";
    }
else{
    echo "<div class='alert alert-danger'>";
    echo "<strong>No products found</strong> in your cart!";
    echo "</div>";
}

?>
<?php
include 'layout_foot.php';
?>