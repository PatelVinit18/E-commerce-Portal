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
    <div class="bg-light">
        <div class="container">
            <h1 class="text-center mt-3">
                Insert Product
            </h1>
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_name" class="form-label">Product name:</label>
                    <input type="text" name="product_name" id="product_name" class="form-control"
                        placeholder="Enter product name" autocomplete="off" required="required">
                </div>

                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_description" class="form-label">Product description:</label>
                    <input type="text" name="product_description" id="product_description" class="form-control"
                        placeholder="Enter product description" autocomplete="off" required="required">
                </div>

                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_title" class="form-label">Product title:</label>
                    <input type="text" name="product_title" id="product_title" class="form-control"
                        placeholder="Enter product title" autocomplete="off" required="required">
                </div>

                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_Image1" class="form-label">Product Image1:</label>
                    <input type="File" name="product_Image1" id="product_Image1" class="form-control" required="required">
                </div>

                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_Image2" class="form-label">Product Image2:</label>
                    <input type="file" name="product_Image2" id="product_Image2" class="form-control"
                        required="required">
                </div>

                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_Image3" class="form-label">Product Image3:</label>
                    <input type="file" name="product_Image3" id="product_Image3" class="form-control"
                        required="required">
                </div>

                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_price" class="form-label">Product price:</label>
                    <input type="text" name="product_price" id="product_price" class="form-control"
                        placeholder="Enter product price" autocomplete="off" required="required">
                </div>

                <div class="form-outline mb-4 w-50 m-auto">
                    <input type="submit" name="insert_product" class="btn btn-info mb-3 px-3" value="Insert Products">
                </div>
            </form>
        </div>
    </div>
</body>
<?php
include('../include/connect.php');
if (isset($_POST['insert_product'])) {
    $name = $_POST['product_name'];
    $description = $_POST['product_description'];
    $title = $_POST['product_title'];
    $price = $_POST['product_price'];

    $image1=$_FILES['product_Image1']['name'];
    $image2=$_FILES['product_Image2']['name'];
    $image3=$_FILES['product_Image3']['name'];

    $temp_image1=$_FILES['product_Image1']['tmp_name'];
    $temp_image2=$_FILES['product_Image2']['tmp_name'];
    $temp_image3=$_FILES['product_Image3']['tmp_name'];

    if ($name=='' or $description=='' or $title=='' or $price=='' or $image1=='' or $image2=='' or $image3=='') {
        echo "<script>alert('Please fill all the available fields')</script>";
        exit();
    }
    else {
        move_uploaded_file($temp_image1,"./Product_photos/$image1");
        move_uploaded_file($temp_image2,"./Product_photos/$image2");
        move_uploaded_file($temp_image3,"./Product_photos/$image3");

        $insert_query="INSERT INTO `product`(`pro_name`, `pro_details`, `pro_title`, `pro_price`, `pro_image1`, `pro_image2`, `pro_image3`) VALUES ('$name','$description','$title','$price','$image1','$image2','$image3')";
        $rel=mysqli_execute_query($con,$insert_query);
        if ($rel) {
            echo "<script>alert('Product inserted successfully')</script>";
        }
        else {
            echo "<script>alert('Product not inserted')</script>";
        }
    }
}
?>

</html>