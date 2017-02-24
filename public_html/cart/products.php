<?php
$product = isset($_GET['product']) ? $_GET['product'] : "";
setcookie("product_category",$product);
include 'layout_head.php';

$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
$perPage = isset($_GET['per-page']) && $_GET['per-page'] <=50 ? (int)$_GET['per-page'] : 6;
$action = isset($_GET['action']) ? $_GET['action'] : "";
$name = isset($_GET['name']) ? $_GET['name'] : "";
//get product from main and navigation

$start = ($page>1) ? ($page * $perPage) - $perPage : 0;
//set current product

if ($action == 'added') {
    echo "<div class='alert alert-info'>";
    echo "<strong>{$name}</strong> was added to your cart!";
    echo "</div>";
}
//get products from db
$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM products WHERE category = '{$product}' LIMIT $start,$perPage ";


$result = $conn->query($sql);
$total =$conn ->query("select FOUND_ROWS() as total")->fetch_array()['total'];
$pages = ceil($total/ $perPage);
//show data
if ($result->num_rows > 0) {

   echo" <div class='container-fluid bg-3 text-center'>
    <div class='row'>";
    while ($row = $result->fetch_assoc()) {
        echo"
    <div class='col-sm-4'>
     <br><br>
      <a target='_blank' href='img/products_img/{$row['name']}.jpg'><img src='img/products_img/{$row['name']}.jpg' class='img-rounded' height='200' width='200'></a>
       <p>{$row['name']}</p>
       <p>{$row['price']}</p>
       <p><select id='quantity' name='quantity'>
        <option value='1'>1</option>
        <option value='2'>2</option>
        <option value='3'>3</option>
        <option value='4'>4</option>
        <option value='5'>5</option>
        </select></p>
        <p><button type='button' class='btn btn-primary' id='btn-1' onclick='getCal({$row['id']})'>
        <span class='glyphicon glyphicon-shopping-cart'></span> Add to cart</button></p>
        
    </div>
 

        
     ";
    }
echo "</div>
</div> ";

} // tell the user if there's no products in the database
else {
    echo "No products found.";
}

echo "<ul class=\"pagination\">";

for($x=1;$x<=$pages;$x++){
echo "<li ";
    if($page === $x){
        echo "class=\"active\" ";
    }
    echo "><a href='?page=$x&perPage=$perPage&product=$product'>$x</a></li>";
}

echo "</ul>";
?>

<?php echo
include 'layout_foot.php';
?>




