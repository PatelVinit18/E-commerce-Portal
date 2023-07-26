<?php 
include ('include/connect.php');
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Registration</title>
    <link rel="stylesheet" href="registration.css">
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
  </head>
  <body>
    <?php include('user_header.php');?>
  <div id="content">
      <h1 id="header">Register...</h1>
        <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
          <div id="form">
          <label for="fname" class="labels">Enter First name : </label><br>
          <input type="text" id="fname" name="ufname" class="field"><br><br>
          <label for="lname" class="labels">Enter Last name : </label><br>
          <input type="text" id="lname" name="ulname" class="field"><br><br>
          <label for="uname" class="labels">Create user name : </label><br>
          <input type="text" id="uname" name="uname" class="field"><br><br>
          <label for="pwd" class="labels">Create Password : </label><br>
          <input type="password" id="pwd" name="upwd" class="field"><br><br>
          <label for="contact" class="labels">Contact number : </label><br>
          <input type="text" id="contact" name="ucontact" class="field"><br><br>
          <!-- <label for="urole" class="labels">Select your role : </label><br>
          <select id="role" class="field" name="urole"> -->
            <!-- <option  value="" ></option>
            <option  value="admin">Admin</option>
            <option  value="buyer">Buyer</option> -->
          <!-- </select> -->

          <input type="submit" id="sub" name="log" value="register" onclick="return alert('You are registered successfully..');">
          </div>
        </form>
      
    </div> 
    <?php include('footer.php');?>       
  </body>
</html>

<?php 

if(isset($_POST['log'])){

  $fname = $_POST['ufname'];
  $lname = $_POST['ulname'];
  $uname = $_POST['uname'];
  $pwd = md5($_POST['upwd']);
  $num = $_POST['ucontact'];
  $role = "buyer";

  
  $conn = mysqli_connect("localhost" , "root" , "" , "WPProject");

  
  $query = "INSERT INTO users(fname , lname , uname , pwd , role , contact) VALUES ('{$fname}' , '{$lname}' , '{$uname}' , '{$pwd}' , '{$role}' , '{$num}')" ;
  $result = mysqli_query($conn , $query);
  
  echo "<script>alert('Registration Successfull...');</script>";
  ?>
  <script>
   window.location.href = "http://localhost/E-commerce%20site/login.php";
  </script>
  <?php 
} 

?>