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
  </head>
  <body>

  <?php
    session_start();
    include('include/connect.php');
    $temp = $_GET['id'];

    $query = "SELECT * FROM product WHERE pro_id = '{$temp}'";
    $res = mysqli_query($con , $query);
    $row = mysqli_fetch_assoc($res);
    $x = 1;
    $i1 = $row['pro_image1'];
    $i2 = $row['pro_image2'];
    $i3 = $row['pro_image3'];
    $name = $row['pro_name'];
    $details = $row['pro_details'];
    $price = $row['pro_price'];
    $query3="SELECT * FROM cart WHERE cart_name = '{$name}'";
    $res2=mysqli_execute_query($con,$query3);
    $row = mysqli_fetch_assoc($res2);
    $num=mysqli_num_rows($res2);
    if($num==0){
    $query2 = "INSERT INTO `cart`(`cart_name`, `cart_details`, `cart_price`, `cart_i1`, `cart_i2`, `cart_i3`, `cart_quantity`) VALUES ('{$name}','{$details}','{$price}','{$i1}','{$i2}','{$i3}','{$x}')";
    $res3 = mysqli_query($con , $query2);
    }
    else {
      $num=$row['cart_quantity'];
      $num++;
      $query4 = "UPDATE cart SET cart_quantity = '{$num}' WHERE cart_name = '{$name}'";
      $res4 = mysqli_query($con , $query4);
    }
      ?>
      <script>
        alert("Item added successfully....");
        window.location.href = "http://localhost/E-commerce%20site/index.php?>";
      </script>

  <!-- <h1 class="mb-3" style="text-align : center; ">Item added successfully.</h1>
  <div style="text-align : center; "><a href="index.php"><button type="button" class="btn btn-primary">Back to home page</button></a></div> -->
  
  </body>
</html>





