<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script>
        var tempVal=1;
        //function to get quantity
        $( document ).ready(function() {

            $("select[name=quantity]").change(function(){
                tempVal = ($(this).find('option:selected').text());
            });
        });

        function getCal(id) {
            window.open("add_to_cart.php?id="+id+"&quantity="+tempVal, "_self");
        }
    </script>
</head>
<body>
<?php
include 'layout_head.php';


$search = isset($_GET['search']) ? $_GET['search'] :'';



$result = $conn->query("SELECT * FROM products WHERE name LIKE '%$search%' OR name LIKE '' ");

if ($result->num_rows > 0) {

    echo" <div class='container-fluid bg-3 text-center'>
    <div class='row'>";
    while ($row = $result->fetch_assoc()) {
        echo"
    <div class='col-sm-4'>
     <br><br>
      <a href='img/products_img/{$row['name']}.jpg'><img src='img/products_img/{$row['name']}.jpg' class='img-rounded' height='200' width='200'></a>
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

}else{
    echo "no foods found";
} // tell the user if there's no products in the database

include 'layout_foot.php';
?>
</body>
</html>


