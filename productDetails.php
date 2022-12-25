<?php
require 'functions.php';

$id = $_GET['id'];
$data = mysqli_query($connection, "SELECT * FROM product WHERE id = '$id'");

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
      <nav class="navbar">
        <a href="/index.php">Home</a>
        <a href="/index.php">About</a>
        <a href="/services.php">Services</a>
        <a href="/index.php">Contact</a>
      </nav>
    </section>
    <!-- header end -->
    <!-- detail produk start -->
    <section class="detail">
      <?php

      while ($product = mysqli_fetch_assoc($data)) {
      ?>
        <div class="pro">
          <div class="thumbnail">
            <img src="/img/<?php echo $product['gambar']; ?>" alt="product">
          </div>
          <div class="desc">
            <h5><?php echo $product['nama']; ?></h5>
            <span><?php echo $product['kategori']; ?></span>
            <div class="star">
              <?php
              for ($i = 0; $i < $product['rating']; $i++) {
              ?>
                <i class="fas fa-star"></i>
              <?php
              }
              ?>
              <!-- add hollow star for leftover -->
              <?php
              for ($i = 0; $i < 5 - $product['rating']; $i++) {
              ?>
                <i class="far fa-star"></i>
              <?php
              }
              ?>
            </div>
            <p><?php echo $product['deskripsi']; ?></p>
          </div>
        </div>
      <?php
      }
      ?>
  </div>








  <!-- footer start -->
  <section id="contact" class="footer">
    <footer class="section-p1">
      <div class="col">
        <a href="#" class="logo">
          <img src="/img/aidogroup.jpg" alt="logo">
          AIDO<span>GROUP</span>
        </a>
        <h4>Contact</h4>
        <p><strong>Alamat: </strong>Dusun Klewer RT 12 RW 03, Desa Sumberagung, Kecamatan Kepohbaru, Kab.
          Bojonegoro, Jawa Timur, 62194</p>
        <p><strong>Phone: </strong>0813-3275-6777</p>
        <p><strong>Jam: </strong>08:00 - 20:00 WIB</p>
        <div class="follow">
          <h4>Follow Us</h4>
          <a href="https://www.facebook.com/aido.aido.98" target="_blank"><i class="fab fa-facebook-f"></i></a>
          <a href="https://www.instagram.com/aido_group/" target="_blank"><i class="fab fa-instagram"></i></a>
          <a href="https://www.youtube.com/channel/UC1zgo87gQRqhcVPyzhktplA" target="_blank"><i class="fab fa-youtube"></i></a>
        </div>
      </div>
      <div class="col">
        <h4>Quick Links</h4>
        <a href="/index.php">Home</a>
        <a href="/index.php">About</a>
        <a href="/services.php">Services</a>
        <a href="/index.php">Contact</a>
    </footer>
  </section>
  </div>
  <!-- footer end -->
  <script src="app.js"></script>
</body>

</html>
