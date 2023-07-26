<?php
include('../include/connect.php');
if (isset($_POST['insert_cat'])) {
  $Group = $_POST['group'];
  $cat_title = $_POST['cat_title'];
  if ($Group == '1') {
    $select_query = "SELECT * FROM `electronics item` WHERE ele_name='$cat_title'";
    $res_select = mysqli_query($con, $select_query);
    $numvar = mysqli_num_rows($res_select);
    if ($numvar > 0) {
      echo "<script>alert('This category is already present inside electronics item')</script>";
    } else {
      $insert_query = "INSERT INTO `electronics item`(`ele_name`) VALUES ('$cat_title')";
      $res = mysqli_query($con, $insert_query);
      if ($res) {
        echo "<script>alert('category has been inserted successfully in electronics item')</script>";
      }
    }
  } if ($Group == '2') {
    $select_query = "SELECT * FROM `men's fashion` WHERE men_name='$cat_title'";
    $res_select = mysqli_query($con, $select_query);
    $numvar = mysqli_num_rows($res_select);
    if ($numvar > 0) {
      echo "<script>alert('This category is already present inside Men's Fashion')</script>";
    } else {
      // echo "<script>alert('ok')</script>";
      $insert_query = "INSERT INTO `men's fashion`(`men_name`) VALUES ('$cat_title')";
      $res = mysqli_query($con, $insert_query);
      if ($res) {
        echo "<script>alert('category has been inserted successfully in Men's Fashion')</script>";
      }
    }
  } if ($Group == '3') {
    $select_query = "SELECT * FROM `women's fashion` WHERE women_name='$cat_title'";
    $res_select = mysqli_query($con, $select_query);
    $numvar = mysqli_num_rows($res_select);
    if ($numvar > 0) {
      echo "<script>alert('This category is already present inside Women's Fashion')</script>";
    } else {
      $insert_query = "INSERT INTO `women's fashion`(`women_name`) VALUES ('$cat_title')";
      $res = mysqli_query($con, $insert_query);
      if ($res) {
        echo "<script>alert('category has been inserted successfully in Women's Fashion')</script>";
      }
    }
  } if ($Group == '4') {
    $select_query = "SELECT * FROM `beauty` WHERE beauty_name='$cat_title'";
    $res_select = mysqli_query($con, $select_query);
    $numvar = mysqli_num_rows($res_select);
    if ($numvar > 0) {
      echo "<script>alert('This category is already present inside Beauty')</script>";
    } else {
      $insert_query = "INSERT INTO `beauty`(`beauty_name`) VALUES ('$cat_title')";
      $res = mysqli_query($con, $insert_query);
      if ($res) {
        echo "<script>alert('category has been inserted successfully in Beauty')</script>";
      }
    }
  }
}
?>
<h2 class="text-center">Insert Categories</h2>
<form action="" method="post" class="mb-2">
  <div class="input-group">
    <select class="form-select" id="inputGroupSelect04" aria-label="Example select with button addon" name='group'>
      <option value="1">Electronics Items</option>
      <option value="2">Men's Fashion</option>
      <option value="3">Women's Fashion</option>
      <option value="4">Beauty</option>
    </select>
  </div>
  <div class="input-group w-90 bg-info mb-3 mt-2">
    <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
    <input type="text" class="form-control" name="cat_title" placeholder="Insert Categories" aria-label="Categories"
      aria-describedby="basic-addon1">
  </div>
  <div class="input-group w-10 mb-2 m-auto">
    <!-- <input type="submit" class="bg-info border-0 p-2 my-3" name="insert_cat" value="Insert Categories"> -->
    <button class="bg-info p-2 my-3 border-0" name="insert_cat">Insert Categories</button>
  </div>
</form>