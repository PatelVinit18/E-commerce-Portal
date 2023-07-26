<?php 
session_start();
?>

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
    <link rel="shortcut icon" href="./assets/images/logo/favicon.ico" type="image/x-icon">
  <!--
    - custom css link
  -->
  <link rel="stylesheet" href="./assets/css/style-prefix.css">
  <!--
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">
</head>

<body>
<?php 
if(isset($_SESSION['loginname'])){
    $name = $_SESSION['loginname'];
    ?>
    <div class="container1">
    <nav class="navbar navbar-expand-lg" style="background-color:#F6F1F1;">
        <div class="container-fluid">
            <a class="header-logo" href="#"> <img src="./assets/images/logo/logo.svg" alt="swifty logo" widht="120" height="41"</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About Us</a>
                    </li>
                    <?php 
                    
                    include('include/connect.php');
                    $sql = "SELECT * FROM users WHERE uname = '{$name}'";
                    $res = mysqli_query($con , $sql);
                    $row = mysqli_fetch_assoc($res);
                    if($row['role']=="admin"){
                        ?>
                        
                        <li class="nav-item">
                        <a class="nav-link" href="admin_code/index.php">Admin Panel</a>
                        </li>
                        
                        <?php
                    }
                    
                    ?>    
                </ul>
                <div class="searchbar d-flex">
                <p
                    class="mt-2">Welcome,<?php echo $name;?></p>
                <a href="update_profile.php" class="mx-2">
                    <button type="button" class="btn btn-danger para ms-2" data-bs-toggle="modal"
                        data-bs-target="#signupmodal">Update profile</button>
                    </a>
                <a href="logout.php" class="mx-2">
                    <button type="button" class="btn btn-danger para ms-2" data-bs-toggle="modal"
                        data-bs-target="#signupmodal">log
                        out</button>
                    </a>
                            <!-- <?php include ('include/connect.php');
                                  $text = $_['search_bar'];
                                  echo $text;
                            ?> -->
                </div>
                <a class="nav-link me-3" href="view_cart.php"><i class="fa-solid fa-cart-shopping"></i></a>
                <span id="span">
<?php 
                // session_start();
                // $temp = $_SESSION['cart_count'];
                // echo $temp; 
                $sql = "SELECT * FROM cart";
                $res = mysqli_query($con , $sql);
                $num = mysqli_num_rows($res);echo $num;
       
?></span>
              </a>
            </div>
    </div>
</nav>
</div>
<?php
}
else{
    include('user_header.php');
   ?>   
<?php 
}
?>



    <nav class="navbar navbar-expand-lg mb-3" style="background-color:#F6F1F1;">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 mx-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Electronics Items
                        </a>
                        <ul class="dropdown-menu">
                            <?php
                            include('include/connect.php');
                            $select = 'SELECT * FROM `electronics item`';
                            $exe = mysqli_execute_query($con, $select);
                            while ($res = mysqli_fetch_array($exe)) {
                                ?>
                                <li><a class="dropdown-item" href='index.php?id=<?php echo $res['ele_id']; ?>'>
                                        <?php echo $res['ele_name']; ?>
                                    </a></li>
                                <?php
                            }
                            ?>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Men's Fashion
                        </a>
                        <ul class="dropdown-menu">
                            <?php
                            include('include/connect.php');
                            $select = "SELECT * FROM `men's fashion`";
                            $exe = mysqli_execute_query($con, $select);
                            while ($res = mysqli_fetch_array($exe)) {
                                ?>
                                <li><a class="dropdown-item" href='index.php?id=<?php echo $res['men_id']; ?>'>
                                        <?php echo $res['men_name']; ?>
                                    </a></li>
                                <?php
                            }
                            ?>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Women's Fashion
                        </a>
                        <ul class="dropdown-menu">
                            <?php
                            include('include/connect.php');
                            $select = "SELECT * FROM `women's fashion`";
                            $exe = mysqli_execute_query($con, $select);
                            while ($res = mysqli_fetch_array($exe)) {
                                ?>
                                <li><a class="dropdown-item" href='index.php?id=<?php echo $res['women_id']; ?>'>
                                        <?php echo $res['women_name']; ?>
                                    </a></li>
                                <?php
                            }
                            ?>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Beauty
                        </a>
                        <ul class="dropdown-menu">
                            <?php
                            include('include/connect.php');
                            $select = "SELECT * FROM `beauty`";
                            $exe = mysqli_execute_query($con, $select);
                            while ($res = mysqli_fetch_array($exe)) {
                                ?>
                                <li><a class="dropdown-item" href='index.php?id=<?php echo $res['beauty_id']; ?>'>
                                        <?php echo $res['beauty_name']; ?>
                                    </a></li>
                                <?php
                            }
                            ?>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class='row'>
        <?php
        if (!isset($_GET['id'])) {
            include('home.html');
        }
        if (isset($_GET['id'])) {
            $ids=$_GET['id'];
            // $_SESSION['future']=$ids;
        if ($ids=='1') {
            if(isset($_SESSION['loginname'])){
            $sql = "SELECT * FROM `product` WHERE pro_title='mobile'";
            $res = mysqli_execute_query($con, $sql);
            while ($res_query = mysqli_fetch_array(($res))) {
                $id2=$res_query['pro_id'];
                $i1 = $res_query['pro_image1'];
                $name = $res_query['pro_name'];
                $details = $res_query['pro_details'];
                $price = $res_query['pro_price'];
                echo "<div class='col-md-4 d-flex justify-content-center mt-2'>
                    <div class='card' style='width: 18rem;'>
                        <img src='./admin_code/Product_photos/$i1' class='card-img-top' alt='...'>
                        <div class='card-body'>
                            <h5 class='card-title'>$name</h5>
                            <p class='card-text'>$details</p>
                            
                            <a href='cart.php?id=$id2' class='btn btn-info'>Add to cart</a>
                            <a href='view_more.php?id=$id2' class='btn btn-secondary'>View More</a>
                        </div>
                    </div>
                </div>";
            }
        }
        else{
            ?>
            <script>
                alert("Please login first...");
            </script>
            <?php
        } 
        }

        if ($ids=='2') {
            if(isset($_SESSION['loginname'])){
            $sql = "SELECT * FROM `product` WHERE pro_title='earphone'";
            $res = mysqli_execute_query($con, $sql);
            while ($res_query = mysqli_fetch_array(($res))) {
                $id2=$res_query['pro_id'];
                $i1 = $res_query['pro_image1'];
                $name = $res_query['pro_name'];
                $details = $res_query['pro_details'];
                $price = $res_query['pro_price'];
                echo "<div class='col-md-4 d-flex justify-content-center mt-2'>
                    <div class='card' style='width: 18rem;'>
                        <img src='./admin_code/Product_photos/$i1' class='card-img-top' alt='...'>
                        <div class='card-body'>
                            <h5 class='card-title'>$name</h5>
                            <p class='card-text'>$details</p>
                            <a href='cart.php?id=$id2' class='btn btn-info'>Add to cart</a>
                            <a href='view_more.php?id=$id2' class='btn btn-secondary'>View More</a>
                        </div>
                    </div>
                </div>";
            }
        }
        else{
            ?>
            <script>
                alert("Please login first...");
            </script>
            <?php
        } 
        }

        if ($ids=='3') {
            if(isset($_SESSION['loginname'])){
            $sql = "SELECT * FROM `product` WHERE pro_title='speaker'";
            $res = mysqli_execute_query($con, $sql);
            while ($res_query = mysqli_fetch_array(($res))) {
                $id2=$res_query['pro_id'];
                $i1 = $res_query['pro_image1'];
                $name = $res_query['pro_name'];
                $details = $res_query['pro_details'];
                $price = $res_query['pro_price'];
                echo "<div class='col-md-4 d-flex justify-content-center mt-2'>
                    <div class='card' style='width: 18rem;'>
                        <img src='./admin_code/Product_photos/$i1' class='card-img-top' alt='...'>
                        <div class='card-body'>
                            <h5 class='card-title'>$name</h5>
                            <p class='card-text'>$details</p>
                            <a href='cart.php?id=$id2' class='btn btn-info'>Add to cart</a>
                            <a href='view_more.php?id=$id2' class='btn btn-secondary'>View More</a>
                        </div>
                    </div>
                </div>";
            }
        }
        else{
            ?>
            <script>
                alert("Please login first...");
            </script>
            <?php
        } 
        }

        if ($ids=='4') {
            if(isset($_SESSION['loginname'])){
            $sql = "SELECT * FROM `product` WHERE pro_title='camera'";
            $res = mysqli_execute_query($con, $sql);
            while ($res_query = mysqli_fetch_array(($res))) {
                $id2=$res_query['pro_id'];
                $i1 = $res_query['pro_image1'];
                $name = $res_query['pro_name'];
                $details = $res_query['pro_details'];
                $price = $res_query['pro_price'];
                echo "<div class='col-md-4 d-flex justify-content-center mt-2'>
                    <div class='card' style='width: 18rem;'>
                        <img src='./admin_code/Product_photos/$i1' class='card-img-top' alt='...'>
                        <div class='card-body'>
                            <h5 class='card-title'>$name</h5>
                            <p class='card-text'>$details</p>
                            <a href='cart.php?id=$id2' class='btn btn-info'>Add to cart</a>
                            <a href='view_more.php?id=$id2' class='btn btn-secondary'>View More</a>
                        </div>
                    </div>
                </div>";
            }
        }
        else{
            ?>
            <script>
                alert("Please login first...");
            </script>
            <?php
        } 
        }

        if ($ids=='101') {
            if(isset($_SESSION['loginname'])){
            $sql = "SELECT * FROM `product` WHERE pro_title='shirt(men)'";
            $res = mysqli_execute_query($con, $sql);
            while ($res_query = mysqli_fetch_array(($res))) {
                $id2=$res_query['pro_id'];
                $i1 = $res_query['pro_image1'];
                $name = $res_query['pro_name'];
                $details = $res_query['pro_details'];
                $price = $res_query['pro_price'];
                echo "<div class='col-md-4 d-flex justify-content-center mt-2'>
                    <div class='card' style='width: 18rem;'>
                        <img src='./admin_code/Product_photos/$i1' class='card-img-top' alt='...'>
                        <div class='card-body'>
                            <h5 class='card-title'>$name</h5>
                            <p class='card-text'>$details</p>
                            <a href='cart.php?id=$id2' class='btn btn-info'>Add to cart</a>
                            <a href='view_more.php?id=$id2' class='btn btn-secondary'>View More</a>
                        </div>
                    </div>
                </div>";
            }
        }
        else{
            ?>
            <script>
                alert("Please login first...");
            </script>
            <?php
        } 
        }

        if ($ids=='102') {
            if(isset($_SESSION['loginname'])){
            $sql = "SELECT * FROM `product` WHERE pro_title='jeans(men)";
            $res = mysqli_execute_query($con, $sql);
            while ($res_query = mysqli_fetch_array(($res))) {
                $id2=$res_query['pro_id'];
                $i1 = $res_query['pro_image1'];
                $name = $res_query['pro_name'];
                $details = $res_query['pro_details'];
                $price = $res_query['pro_price'];
                echo "<div class='col-md-4 d-flex justify-content-center mt-2'>
                    <div class='card' style='width: 18rem;'>
                        <img src='./admin_code/Product_photos/$i1' class='card-img-top' alt='...'>
                        <div class='card-body'>
                            <h5 class='card-title'>$name</h5>
                            <p class='card-text'>$details</p>
                            <a href='cart.php?id=$id2' class='btn btn-info'>Add to cart</a>
                            <a href='view_more.php?id=$id2' class='btn btn-secondary'>View More</a>
                        </div>
                    </div>
                </div>";
            }
        }
        else{
            ?>
            <script>
                alert("Please login first...");
            </script>
            <?php
        } 
        }

        if ($ids=='103') {
            if(isset($_SESSION['loginname'])){
            $sql = "SELECT * FROM `product` WHERE pro_title='shoes(men)'";
            $res = mysqli_execute_query($con, $sql);
            while ($res_query = mysqli_fetch_array(($res))) {
                $id2=$res_query['pro_id'];
                $i1 = $res_query['pro_image1'];
                $name = $res_query['pro_name'];
                $details = $res_query['pro_details'];
                $price = $res_query['pro_price'];
                echo "<div class='col-md-4 d-flex justify-content-center mt-2'>
                    <div class='card' style='width: 18rem;'>
                        <img src='./admin_code/Product_photos/$i1' class='card-img-top' alt='...'>
                        <div class='card-body'>
                            <h5 class='card-title'>$name</h5>
                            <p class='card-text'>$details</p>
                            <a href='cart.php?id=$id2' class='btn btn-info'>Add to cart</a>
                            <a href='view_more.php?id=$id2' class='btn btn-secondary'>View More</a>
                        </div>
                    </div>
                </div>";
            }
        }
        else{
            ?>
            <script>
                alert("Please login first...");
            </script>
            <?php
        } 
        }

        if ($ids=='104') {
            if(isset($_SESSION['loginname'])){
            $sql = "SELECT * FROM `product` WHERE pro_title='shoes(men)'";
            $res = mysqli_execute_query($con, $sql);
            while ($res_query = mysqli_fetch_array(($res))) {
                $id2=$res_query['pro_id'];
                $i1 = $res_query['pro_image1'];
                $name = $res_query['pro_name'];
                $details = $res_query['pro_details'];
                $price = $res_query['pro_price'];
                echo "<div class='col-md-4 d-flex justify-content-center mt-2'>
                    <div class='card' style='width: 18rem;'>
                        <img src='./admin_code/Product_photos/$i1' class='card-img-top' alt='...'>
                        <div class='card-body'>
                            <h5 class='card-title'>$name</h5>
                            <p class='card-text'>$details</p>
                            <a href='cart.php?id=$id2' class='btn btn-info'>Add to cart</a>
                            <a href='view_more.php?id=$id2' class='btn btn-secondary'>View More</a>
                        </div>
                    </div>
                </div>";
            }
        }
        else{
            ?>
            <script>
                alert("Please login first...");
            </script>
            <?php
        } 
        }

        if ($ids=='201') {
            if(isset($_SESSION['loginname'])){
            $sql = "SELECT * FROM `product` WHERE pro_title='cloth(women)'";
            $res = mysqli_execute_query($con, $sql);
            while ($res_query = mysqli_fetch_array(($res))) {
                $id2=$res_query['pro_id'];
                $i1 = $res_query['pro_image1'];
                $name = $res_query['pro_name'];
                $details = $res_query['pro_details'];
                $price = $res_query['pro_price'];
                echo "<div class='col-md-4 d-flex justify-content-center mt-2'>
                    <div class='card' style='width: 18rem;'>
                        <img src='./admin_code/Product_photos/$i1' class='card-img-top' alt='...'>
                        <div class='card-body'>
                            <h5 class='card-title'>$name</h5>
                            <p class='card-text'>$details</p>
                            <a href='cart.php?id=$id2' class='btn btn-info'>Add to cart</a>
                            <a href='view_more.php?id=$id2' class='btn btn-secondary'>View More</a>
                         </div>
                    </div>
                </div>";
            }
        }
        else{
            ?>
            <script>
                alert("Please login first...");
            </script>
            <?php
        } 
        }

        if ($ids=='202') {
            if(isset($_SESSION['loginname'])){
            $sql = "SELECT * FROM `product` WHERE pro_title='shoes(women)'";
            $res = mysqli_execute_query($con, $sql);
            while ($res_query = mysqli_fetch_array(($res))) {
                $id2=$res_query['pro_id'];
                $i1 = $res_query['pro_image1'];
                $name = $res_query['pro_name'];
                $details = $res_query['pro_details'];
                $price = $res_query['pro_price'];
                echo "<div class='col-md-4 d-flex justify-content-center mt-2'>
                    <div class='card' style='width: 18rem;'>
                        <img src='./admin_code/Product_photos/$i1' class='card-img-top' alt='...'>
                        <div class='card-body'>
                            <h5 class='card-title'>$name</h5>
                            <p class='card-text'>$details</p>
                            <a href='cart.php?id=$id2' class='btn btn-info'>Add to cart</a>
                            <a href='view_more.php?id=$id2' class='btn btn-secondary'>View More</a>
                        </div>
                    </div>
                </div>";
            }
        }
        else{
            ?>
            <script>
                alert("Please login first...");
            </script>
            <?php
        } 
        }

        if ($ids=='203') {
            if(isset($_SESSION['loginname'])){
            $sql = "SELECT * FROM `product` WHERE pro_title='purse(women)'";
            $res = mysqli_execute_query($con, $sql);
            while ($res_query = mysqli_fetch_array(($res))) {
                $id2=$res_query['pro_id'];
                $i1 = $res_query['pro_image1'];
                $name = $res_query['pro_name'];
                $details = $res_query['pro_details'];
                $price = $res_query['pro_price'];
                echo "<div class='col-md-4 d-flex justify-content-center mt-2'>
                    <div class='card' style='width: 18rem;'>
                        <img src='./admin_code/Product_photos/$i1' class='card-img-top' alt='...'>
                        <div class='card-body'>
                            <h5 class='card-title'>$name</h5>
                            <p class='card-text'>$details</p>
                            <a href='cart.php?id=$id2' class='btn btn-info'>Add to cart</a>
                            <a href='view_more.php?id=$id2' class='btn btn-secondary'>View More</a>
                        </div>
                    </div>
                </div>";
            }
        }
        else{
            ?>
            <script>
                alert("Please login first...");
            </script>
            <?php
        } 
        }

        if ($ids=='204') {
            if(isset($_SESSION['loginname'])){
            $sql = "SELECT * FROM `product` WHERE pro_title='watch(women)'";
            $res = mysqli_execute_query($con, $sql);
            while ($res_query = mysqli_fetch_array(($res))) {
                $id2=$res_query['pro_id'];
                $i1 = $res_query['pro_image1'];
                $name = $res_query['pro_name'];
                $details = $res_query['pro_details'];
                $price = $res_query['pro_price'];
                echo "<div class='col-md-4 d-flex justify-content-center mt-2'>
                    <div class='card' style='width: 18rem;'>
                        <img src='./admin_code/Product_photos/$i1' class='card-img-top' alt='...'>
                        <div class='card-body'>
                            <h5 class='card-title'>$name</h5>
                            <p class='card-text'>$details</p>
                            <a href='cart.php?id=$id2' class='btn btn-info'>Add to cart</a>
                            <a href='view_more.php?id=$id2' class='btn btn-secondary'>View More</a>
                        </div>
                    </div>
                </div>";
            }
        }
        else{
            ?>
            <script>
                alert("Please login first...");
            </script>
            <?php
        } 
        }

        if ($ids=='301') {
            if(isset($_SESSION['loginname'])){
            $sql = "SELECT * FROM `product` WHERE pro_title='perfume'";
            $res = mysqli_execute_query($con, $sql);
            while ($res_query = mysqli_fetch_array(($res))) {
                $id2=$res_query['pro_id'];
                $i1 = $res_query['pro_image1'];
                $name = $res_query['pro_name'];
                $details = $res_query['pro_details'];
                $price = $res_query['pro_price'];
                echo "<div class='col-md-4 d-flex justify-content-center mt-2'>
                    <div class='card' style='width: 18rem;'>
                        <img src='./admin_code/Product_photos/$i1' class='card-img-top' alt='...'>
                        <div class='card-body'>
                            <h5 class='card-title'>$name</h5>
                            <p class='card-text'>$details</p>
                            <a href='cart.php?id=$id2' class='btn btn-info'>Add to cart</a>
                            <a href='view_more.php?id=$id2' class='btn btn-secondary'>View More</a>
                        </div>
                    </div>
                </div>";
            }
        }
        else{
            ?>
            <script>
                alert("Please login first...");
            </script>
            <?php
        } 
        }

        if ($ids=='302') {
            if(isset($_SESSION['loginname'])){
            $sql = "SELECT * FROM `product` WHERE pro_title='hair gel'";
            $res = mysqli_execute_query($con, $sql);
            while ($res_query = mysqli_fetch_array(($res))) {
                $id2=$res_query['pro_id'];
                $i1 = $res_query['pro_image1'];
                $name = $res_query['pro_name'];
                $details = $res_query['pro_details'];
                $price = $res_query['pro_price'];
                echo "<div class='col-md-4 d-flex justify-content-center mt-2'>
                    <div class='card' style='width: 18rem;'>
                        <img src='./admin_code/Product_photos/$i1' class='card-img-top' alt='...'>
                        <div class='card-body'>
                            <h5 class='card-title'>$name</h5>
                            <p class='card-text'>$details</p>
                            <a href='cart.php?id=$id2' class='btn btn-info'>Add to cart</a>
                            <a href='view_more.php?id=$id2' class='btn btn-secondary'>View More</a>
                        </div>
                    </div>
                </div>";
            }
        }
        else{
            ?>
            <script>
                alert("Please login first...");
            </script>
            <?php
        } 
        }

        if ($ids=='303') {
            if(isset($_SESSION['loginname'])){
            $sql = "SELECT * FROM `product` WHERE pro_title='shower gel'";
            $res = mysqli_execute_query($con, $sql);
            while ($res_query = mysqli_fetch_array(($res))) {
                $id2=$res_query['pro_id'];
                $i1 = $res_query['pro_image1'];
                $name = $res_query['pro_name'];
                $details = $res_query['pro_details'];
                $price = $res_query['pro_price'];
                echo "<div class='col-md-4 d-flex justify-content-center mt-2'>
                    <div class='card' style='width: 18rem;'>
                        <img src='./admin_code/Product_photos/$i1' class='card-img-top' alt='...'>
                        <div class='card-body'>
                            <h5 class='card-title'>$name</h5>
                            <p class='card-text'>$details</p>
                            <a href='cart.php?id=$id2' class='btn btn-info'>Add to cart</a>
                            <a href='view_more.php?id=$id2' class='btn btn-secondary'>View More</a>
                        </div>
                    </div>
                </div>";
            }
        }
        else{
            ?>
            <script>
                alert("Please login first...");
            </script>
            <?php
        } 
        }

        if ($ids=='304') {
            if(isset($_SESSION['loginname'])){
            $sql = "SELECT * FROM `product` WHERE pro_title='moisturizer'";
            $res = mysqli_execute_query($con, $sql);
            while ($res_query = mysqli_fetch_array(($res))) {
                $id2=$res_query['pro_id'];
                $i1 = $res_query['pro_image1'];
                $name = $res_query['pro_name'];
                $details = $res_query['pro_details'];
                $price = $res_query['pro_price'];
                echo "<div class='col-md-4 d-flex justify-content-center mt-2'>
                    <div class='card' style='width: 18rem;'>
                        <img src='./admin_code/Product_photos/$i1' class='card-img-top' alt='...'>
                        <div class='card-body'>
                            <h5 class='card-title'>$name</h5>
                            <p class='card-text'>$details</p>
                            <a href='cart.php?id=$id2' class='btn btn-info'>Add to cart</a>
                            <a href='view_more.php?id=$id2' class='btn btn-secondary'>View More</a>
                        </div>
                    </div>
                </div>";
            }
        }
        else{
            ?>
            <script>
                alert("Please login first...");
            </script>
            <?php
        } 
        }
    }
    ?>
    </div>
    <?php include('footer.php');?>
</body>

</html>