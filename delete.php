<?php 

include('include/connect.php');
$id3=$_GET['id'];

$query1 = "SELECT cart_quantity FROM cart WHERE cart_id = '{$id3}'";
$res1 = mysqli_query($con , $query1);
$row1 = mysqli_fetch_assoc($res1);
echo $row1['cart_quantity'];
if($row1['cart_quantity'] <= 1){

$query = "DELETE FROM `cart` WHERE cart_id='{$id3}'";
$res = mysqli_execute_query($con,$query);



}
else{
  $num = $row1['cart_quantity'];
  $num--;
  $query2 = "UPDATE cart SET cart_quantity = '{$num}' WHERE cart_id='{$id3}'";
  $res2 = mysqli_query($con , $query2);
}
header("Location: http://localhost/E-commerce%20site/view_cart.php");
?>