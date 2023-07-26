
<!DOCTYPE html>
<html>
<head>
  <title>Profile</title>
  <link rel="stylesheet" href="loginstyle.css">
  <style>
    
  </style>
</head>
<body>

<?php 
session_start();
include('include/connect.php');
$name = $_SESSION['loginname'];
$pwd = md5($_SESSION['loginpwd']);

$sql = "SELECT * FROM users WHERE uname = '{$name}' AND pwd = '{$pwd}'";

$res = mysqli_query($con , $sql);
$row = mysqli_fetch_assoc($res);
// print_r($row);
?>

<div class="content">
  <form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
  <div id="form">
          <p class="header">Update your Profile : </p>
          <label for="fname" class="labels">First name : </label><br>
          <input type="text" id="fname" name="ufname" class="field" value="<?php echo $row['fname'];?>"><br><br>

          <label for="lname" class="labels">Last name : </label><br>
          <input type="text" id="lname" name="ulname" class="field" value="<?php echo $row['lname'];?>"><br><br>

          <label for="uname" class="labels">user name : </label><br>
          <input type="text" id="uname" name="uname" class="field" value="<?php echo $row['uname'];?>"><br><br>

          <label for="pwd" class="labels">Old Password : </label><span id="s1"></span><br>
          <input type="password" id="pwd" name="uopwd" class="field"><br><br>

          <label for="npwd" class="labels">New Password : </label><span id="s2"></span><br>
          <input type="password" id="npwd" name="unpwd" class="field"><br><br>

          <label for="contact" class="labels">Contact :</label><br>
          <input type="text" id="contact" name="ucontact" class="field" value="<?php echo $row['contact'];?>"><br><br>
          <br><br>
          <input type="submit" id="sub" name="log" value="register">
          </div>
  </form>
</div>
<?php 

  if(isset($_POST['log'])){
  $newfname = $_POST['ufname'];
  $newlname = $_POST['ulname'];
  $newname = $_POST['uname'];
  $oldpwd = md5($_POST['uopwd']);
  $newpwd = md5($_POST['unpwd']);
  $number = $_POST['ucontact'];
  if($oldpwd == $pwd){
  if($newpwd != $oldpwd){
  $sql2 = "UPDATE users SET fname = '{$newfname}' , lname = '{$newlname}' , uname = '{$newname}' , pwd = '{$newpwd}' , contact = '{$number}' WHERE uname = '{$name}'";
  // echo $sql2;
  $res2 = mysqli_query($con , $sql2);
  ?>
  <a href=login.php id="link">Click here to login yourself</a>
  <?php
  }
  else{
    ?>
    <script>
      document.getElementById("s2").innerHTML = "*New password must be different...";
    </script>
    <?php
  }
}
else{
  ?>
  <script>
      document.getElementById("s1").innerHTML = "*Old password is incorrect...";
    </script>
  <?php
}
}
?>

</body>
</html>