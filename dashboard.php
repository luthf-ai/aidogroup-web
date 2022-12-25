<?php
session_start();

if (!isset($_SESSION["login"])) {
  echo $_SESSION["login"];
  header("Location:login.php");
  exit;
}
require 'functions.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Aido Group</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="styles.css">
</head>

<body>
  <div class="wrapper">
    <!-- header start -->
    <section class="header">
      <a href="index.php" class="logo">
        <img src="/img/aidogroup.jpg" alt="logo">
        AIDO<span>GROUP</span>
      </a>
      <div class="admin-profile">
        <div class="admin-image">
          <img src="/img/user.jpg" alt="admin">
        </div>
        <div class="admin-name">
          <h4>Admin</h4>
          <small><a href="logout.php">Logout</a></small>
        </div>
      </div>
    </section>
    <!-- header end -->
    <!-- sidebar start -->
    <section class="sidebar">
      <ul>
        <li class="active">
          <a href="dashboard.php">
            <span><i class="fas fa-gauge"></i></span>
            <span>Dashboard</span>
          </a>
        <li>
          <a href="admin.php">
            <span><i class="fas fa-user"></i></span>
            <span>Admin List</span>
          </a>
        </li>
        <li>
          <a href="product.php">
            <span><i class="fas fa-database"></i></span>
            <span>Product Data</span>
          </a>
        </li>
        <li>
          <a href="banner.php">
            <span><i class="fas fa-image"></i></span>
            <span>Banner Data</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- sidebar end -->
    <!-- main container start -->
    <section class="main-container dashboard">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="card outer">
              <div class="card-header">
                <h4>Dashboard</h4>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="panel">
                    <h4>Admin</h4>
                    <h5><?php
                        $admin = mysqli_query($connection, "SELECT * FROM admin");
                        echo mysqli_num_rows($admin);
                        ?></h5>
                  </div>
                  <div class="panel">
                    <h4>Product</h4>
                    <h5><?php
                        $product = mysqli_query($connection, "SELECT * FROM product");
                        echo mysqli_num_rows($product);
                        ?></h5>
                  </div>
                  <div class="panel">
                    <h4>Banner</h4>
                    <h5><?php
                        $banner = mysqli_query($connection, "SELECT * FROM slideshow");
                        echo mysqli_num_rows($banner);
                        ?></h5>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- main container end -->
  </div>
</body>
