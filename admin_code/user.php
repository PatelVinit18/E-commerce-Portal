<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="tables.css">
    <style>
      .head{
  background-color: grey;
}
.links{
  background-color: rgb(1, 159, 144);

  border: 2px solid black;
  display: inline-block;
  margin : 3px 5px;
  text-decoration: none;
  color : white;
}
.tables{
  width : 600px;
  margin : auto;
  outline-offset: 10px;
}

.data{
  text-align: center;
  font-weight: 600;
}
.head{
  background-color: grey;
}
tr:nth-child(odd){
  background-color: rgba(101, 211, 255, 0.719);
}
a{
  color: black;
  text-decoration: none;
}
    </style>
  </head>
  <body>
<?php

  $conn = mysqli_connect("localhost","root","","wpproject");  
  $sql1 = "SELECT * FROM users WHERE role='admin' ORDER BY u_id DESC ";
  $res = mysqli_query($conn , $sql1);

  if(mysqli_num_rows($res)>0){
    ?>
      <table border="3" class="tables">
      <caption>Admin table</caption>
      <thead>
      <th class="head">S No.</th>
      <th class="head">Full name</th>
      <th class="head">User name</th>
      <th class="head">Contact</th>
      <th class="head">Role</th>
    </thead>
    <?php

  while($row = mysqli_fetch_assoc($res)){
      ?>

    <tr>
      <td class="data"><?php echo $row['u_id'];?></td>
      <td class="data"><?php echo $row['fname'] . " " . $row['lname'];?></td>
      <td class="data"><?php echo $row['uname'];?></td>
      <td class="data"><?php echo $row['contact'];?></td>
      <td class="data"><?php echo $row['role'];?></td>
    </tr>
    
      <?php
    } ?>
    </table>
  <?php } 
  else{
    echo "NO data for admin...";
  }
?> 
  <?php 
  
  $sql2 = "SELECT * FROM users WHERE role='buyer' ORDER BY u_id";
  $res2 = mysqli_query($conn , $sql2);
  
  if(mysqli_num_rows($res2)>0){
    ?>
<br><br><br>
<table border='3' class="tables">
  <caption>Users table</caption>
  <thead>
    <th class="head">S No.</th>
    <th class="head">Full name</th>
    <th class="head">User name</th>
    <th class="head">Contact</th>
    <th class="head">Role</th>
    <th class="head">Action</th>
  </thead>

    <?php
    while($row = mysqli_fetch_assoc($res2)){
  ?>

  <tr>
    <td class="data"><?php echo $row['u_id'];?></td>
    <td class="data"><?php echo $row['fname'] . " " . $row['lname'];?></td>
    <td class="data"><?php echo $row['uname'];?></td>
    <td class="data"><?php echo $row['contact'];?></td>
    <td class="data"><?php echo $row['role'];?></td>
    <td class="data"><a href="admin-user-delete.php?id=<?php echo $row['u_id']?>">DELETE</a></td>
  </tr>
  
   <?php
    }
    ?>
    </table>
    <?php
  }
?>
  </body>
</html>