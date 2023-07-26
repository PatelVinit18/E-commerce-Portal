<!DOCTYPE html>
<html lang="en">

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
  <?php include('user_header.php');?>
  <div class="row">
  <?php 
  session_start();
include('include/connect.php');

$query = "SELECT * FROM cart";
$res = mysqli_query($con , $query);
$count = mysqli_num_rows($res);
while ($res_query = mysqli_fetch_array(($res))) {
  $id2=$res_query['cart_id'];
  $i1 = $res_query['cart_i1'];
  $name = $res_query['cart_name'];
  $details = $res_query['cart_details'];
  $price = $res_query['cart_price'];
  $quantity = $res_query['cart_quantity'];
  echo "<div class='col-md-4 d-flex justify-content-center mt-2'>
      <div class='card' style='width: 18rem;'>
          <img src='./admin_code/Product_photos/$i1' class='card-img-top' alt='...'>
          <div class='card-body'>
              <h5 class='card-title'>$name</h5>
              <p class='card-text'>$details</p>
              <p class='card-text'>Quantity : $quantity</p>
              <a href='delete.php?id=$id2' class='btn btn-secondary' name='delete'>DELETE</a>
          </div>
      </div>
  </div>";
}
// $_SESSION['cart_count'] = $count;
?>
<div class="d-flex text-center" ">
<a class="m-auto" href=""><button type="button" class="btn btn-primary mt-2 mb-2">Order all</button></a>
</div>

<?php include('footer.php');?>
  </div>
</body>
</html>