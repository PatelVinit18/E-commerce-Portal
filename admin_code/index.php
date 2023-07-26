<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Swifty</title>
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
    <h3 class="text-center text-primary-emphasis container py-2" style="background-color: #F6F1F1;">Manage Details</h3>
    <div class="container text-center d-flex flex-column mb-3">
        <button><a href="insert_product.php" class="nav-link my-1">Insert Products</a></button>
        <button><a href="view_product.php" class="nav-link my-1">View Products</a></button>
        <button><a href="index.php?insert_categories" class="nav-link my-1">Insert Categories</a></button>
        <!-- <button><a href="" class="nav-link my-1">View Categories</a></button> -->
        <button><a href="orders.php" class="nav-link my-1">All Orders</a></button>
        <button><a href="" class="nav-link my-1">All Payments</a></button>
        <button><a href="user.php" class="nav-link my-1">List Users</a></button>
        <!-- <button><a href="" class="nav-link my-1">Log Out</a></button> -->
    </div>
    <div class="container my-5">
        <?php
        if (isset($_GET['insert_categories'])) {
            include('insert_categories.php');
        }
        if (isset($_GET['insert_brands'])) {
            include('insert_brands.php');
        }
        ?>
    </div>
    <div class="container" style="background-color: #F6F1F1;">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 border-top">
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

</html>