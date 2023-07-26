<?php 
session_start();
unset($_SESSION['loginname']);
include ('include/connect.php');
$sql = "DELETE FROM cart";
$res = mysqli_query($con , $sql); 
header("Location: http://localhost/E-commerce%20site/index.php");
?>