<?php
include 'layout_head.php';
$sql="DELETE FROM member_order";
if($conn->query($sql)===true){
    echo "delete success";
    echo " <a href='main.php'>Main Page</a>";
}else{
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>