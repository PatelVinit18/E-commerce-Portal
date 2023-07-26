<div class="container1">
        <nav class="navbar navbar-expand-lg" style="background-color: #F6F1F1;">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><i class="fa-solid fa-people-group"></i></a>
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
                        
                        <a href="login.php">
                            <button type="button" class="btn btn-success para ms-2" data-bs-toggle="modal"
                            data-bs-target="#loginmodal">Login</button>
                        </a>
                        
                        <a href="registration.php">
                        <button type="button" class="btn btn-danger para ms-2" data-bs-toggle="modal"
                            data-bs-target="#signupmodal">Sign
                            up</button>
                        </a>
                        
                    </ul>
                    <a class="nav-link me-1" href="view_cart.php"><i class="fa-solid fa-cart-shopping"></i></a>
                    <span>
<?php 
                    // session_start();
                    // $temp = $_SESSION['cart_count'];
                    // echo $temp;
                    include('include/connect.php');
                    $sql = "SELECT * FROM cart";
                    $res = mysqli_query($con , $sql);
                    $num = mysqli_num_rows($res);
                    echo $num;
?></span>
                  </a>
                </div>
        </div>
    </nav>
</div>