<?php 
session_start();
?>

<!-- <?php 
include('user_header.php');
?> -->
<!DOCTYPE html>
<html>
  <head>
  <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style1.css">
    <script src="javascript.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="javascript.js">
   <link rel="stylesheet" href="loginstyle.css">
  </head>
  <body>
  <div class="content">
    <div class="header">
      <h1 id="header">Login...</h1>
      </div>
      <div id="form">
        <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
          <div id="data">
          <label for="name" class="labels">Enter user name : </label><br>
          <input type="text" id="name" name="uname" class="field"><br><br>

          <label for="pwd" class="labels">Enter password : <span class="error" id="pwde"></span></label><br>
          <input type="password" id="pwd" name="upwd" class="field"><br><br>
          
          <input type="submit" id="sub" name="log">
          </div>
        </form>
       
      </div>
    </div>

    <div>

    </div>
<?php 
      if(isset($_POST['log'])){   
      $_SESSION['loginpwd'] = $_POST['upwd'];   
      $name = $_POST['uname'];
      $password = md5($_POST['upwd']);

      $conn = mysqli_connect("localhost" , "root" , "" , "WPProject");
      $sql = "SELECT * FROM users WHERE uname = '{$name}' AND pwd='{$password}'";
      $res = mysqli_query($conn , $sql);
      $row = mysqli_fetch_assoc($res);

      if(mysqli_num_rows($res) > 0){
        // header("Location: http://localhost/E-commerce%20site/index.php");
        $_SESSION['loginname'] = $name;
        // $_SESSION['loginpwd'] = md5($row['pwd']);
        ?>
        <script>
          window.location.href="http://localhost/E-commerce%20site/index.php" ;
        </script>
<?php
      }
      else{
        $sql2 = "SELECT * FROM users WHERE uname = '{$name}'";
        $res2 = mysqli_query($conn , $sql2);
        if(mysqli_num_rows($res2)>0){
    ?>

        <script>
          document.getElementById("pwde").innerHTML="Password is incorrect.";
        </script>
<?php
  }
 
 else{
?>
 
 <h1 id="notfound">User not found</h1>
 <div id="linkdiv">
 <a href=registration.php id="link">Click here to register yourself</a>
 </div>
<?php  
 }
}
}
?>
  </body>
</html>