

<?php

  $uid = $_GET['id'];
  echo $uid;

  $conn = mysqli_connect("localhost","root","","wpproject");
  $sql = "DELETE FROM users WHERE u_id = '{$uid}'";
  if(mysqli_query($conn , $sql)){
    header("Location: http://localhost/E-commerce%20site/admin_code/user.php");
  }
  else{
    echo " Can't delete the record.";
  }
?>