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
.slider-main {
    display: flex;
    align-items: center;
    justify-content: center;
}

.card-img-top {
    width: 100%;
    height: 400px;
    object-fit: contain;
}
    </style>
</head>

<body>
  <?php
  include('include/connect.php');
  include('user_header.php');
  $id4=$_GET['id'];
  $sql="SELECT * FROM `product` WHERE pro_id={$id4}";
  $res_query=mysqli_query($con,$sql);
  $res=mysqli_fetch_assoc($res_query);
  $id2=$res['pro_id'];
  $i1 = $res['pro_image1'];
  $name = $res['pro_name'];
  $details = $res['pro_details'];
  $price = $res['pro_price']; 
  ?>
  <div class="container d-flex">
  <div class="row">
    <div class="col-4"></div>
    <div class="card mt-2" style="width: 18rem;">
    <div id="carouselExample" class="carousel slide">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="<?php echo "admin_code/Product_photos/".$res['pro_image1']; ?>" class="d-block w-100 card-img-top" alt="...">
      </div>
      <div class="carousel-item">
        <img src="<?php echo "admin_code/Product_photos/".$res['pro_image2']; ?>" class="d-block w-100 card-img-top" alt="...">
      </div>
      <div class="carousel-item">
        <img src="<?php echo "admin_code/Product_photos/".$res['pro_image3']; ?>" class="d-block w-100 card-img-top" alt="...">
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
  </div></div>
    <div class="col-8 ms-3">  <div class="details mt-2">
    <h1 class="mb-3">
      <?php echo $name ?>
    </h1>
    <p class="fs-2">
        Price : <?php echo $price ?>
    </p>
    <p class="fs-2">
        Details : <?php echo $details ?>
    </p>
  </div></div>
  

  </div>

<div class="container-fluid position-absolute bottom-0" style="background-color: #48ff45;">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 border-top container-md">
            <div class="col-md-4 d-flex align-items-center">
                <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
                    <svg class="bi" width="30" height="24">
                        <use xlink:href="#bootstrap" />
                    </svg>
                </a>
                <span class="mb-3 mb-md-0 text-muted">&copy; 2022 Company, Inc</span>
            </div>

            <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
                <li class="ms-3"><i class="fa-brands fa-twitter"></i></li>
                <li class="ms-3"><i class="fa-brands fa-instagram"></i></li>
                <li class="ms-3"><i class="fa-brands fa-facebook-f"></i></li>
            </ul>
        </footer>
    </div>
</body>