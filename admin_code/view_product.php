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
    <style>
      .img {
    width: 100%;
    height: 200px;
    object-fit: contain;
}
    </style>
</head>
<body>
  
  <div class="row">
  <?php 
  // session_start();
include('../include/connect.php');

$query = "SELECT * FROM product";
$res = mysqli_query($con , $query);
$count = mysqli_num_rows($res);
while ($res_query = mysqli_fetch_array(($res))) {
  $id2=$res_query['pro_id'];
  $i1 = $res_query['pro_image1'];
  $i2 = $res_query['pro_image2'];
  $i3 = $res_query['pro_image3'];
  $name = $res_query['pro_name'];
  $details = $res_query['pro_details'];
  $price = $res_query['pro_price'];
  ?>
  <div class="col-md-4 d-flex justify-content-center mt-2">
      <div class="card" style="width: 18rem;">
      <div id="carouselExample" class="carousel slide">
      <div class="carousel-inner">
        <div class="carousel-item active img">
          <img src="Product_photos/<?php echo $i1;?>" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item img">
          <img src="Product_photos/<?php echo $i2;?>" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item img">
          <img src="Product_photos/<?php echo $i3;?>" class="d-block w-100" alt="...">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
          <div class="card-body">
              <h5 class="card-title"><?php echo $name;?></h5>
              <p class="card-text"><?php echo $details;?></p>
              <a href="delete.php?id=<?php echo $id2;?>" class="btn btn-secondary" name="delete">DELETE</a>
              <a href="../view_more.php?id=<?php echo $id2;?>" class="btn btn-secondary" name="delete">View more</a>
          </div>
      </div>
  </div>
  <?php
}
// $_SESSION['cart_count'] = $count;
// include('footer.php');
?>
  </div>
</body>
</html>
