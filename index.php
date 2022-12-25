<?php
include_once 'functions.php';
$bannerQuery = 'SELECT * FROM slideshow ORDER BY id ASC';
// limit product to 12
$productQuery = 'SELECT * FROM product ORDER BY id ASC LIMIT 12';
session_start();
session_destroy();
session_unset();
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
            <a href="#" class="logo">
                <img src="/img/aidogroup.jpg" alt="logo">
                AIDO<span>GROUP</span>
            </a>

            <nav class="navbar">
                <a href="#">Home</a>
                <a href="#about">About</a>
                <a href="/services.php">Services</a>
                <a href="#contact">Contact</a>
            </nav>

            <div id="menu-btn" class="fas fa-bars"></div>
        </section>
        <!-- header end -->
        <!-- home start -->
        <section class="home" id="home">
            <!-- carousell bootstrap with slideshow row -->
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <?php
                    $i = 0;
                    $bannerResult = mysqli_query($connection, $bannerQuery);
                    while ($banner = mysqli_fetch_assoc($bannerResult)) {
                        $active = '';
                        if ($i == 0) {
                            $active = 'active';
                        }
                    ?>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?php echo $i; ?>" class="<?php echo $active; ?>" aria-current="true" aria-label="Slide <?php echo $i; ?>"></button>
                    <?php
                        $i++;
                    }
                    ?>
                </div>
                <div class="carousel-inner">
                    <?php
                    $i = 0;
                    $bannerResult = mysqli_query($connection, $bannerQuery);
                    while ($banner = mysqli_fetch_assoc($bannerResult)) {
                        $active = '';
                        if ($i == 0) {
                            $active = 'active';
                        }
                    ?>
                        <div class="carousel-item <?php echo $active; ?>">
                            <img src="/img/<?php echo $banner['gambar']; ?>" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h1><?php echo $banner['judul']; ?></h1>
                                <p><?php echo $banner['deskripsi']; ?></p>
                            </div>
                        </div>
                    <?php
                        $i++;
                    }
                    ?>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </section>
        <!-- home end -->

        <!-- about start -->
        <section class="about" id="about">
            <div class="image">
                <img src="/img/aidogroup.png" alt="logo">
            </div>
            <div class="content">
                <h3>Tentang Kami</h3>
                <p>Aido group merupakan sebuah usaha yang bergerak dalam berbagai bidang, mulai dari Photography, Konveksi, Percetakan, dan juga bergerak dalam beberapa bidang Teknologi. Aido Group didirikan pada tahun 2013 bermula dari sebuah Internet Cafe yang menyediakan jasa Print, dan menjual alat ATK. Hingga sekarang menjadi usaha yang cukup populer di daerahnya. Kedepannya AidoGroup akan terus berkembang dan meningkat kualitasnya. </p>
            </div>
        </section>
        <!-- about end -->
        <!-- services start -->

        <section id="product1" class="section-p1">
            <h2>Produk Unggulan</h2>
            <p class="sub-title">Produk dan Jasa unggulan kami</p>
            <div class="pro-container">
                <?php
                $productResult = mysqli_query($connection, $productQuery);
                while ($product = mysqli_fetch_assoc($productResult)) {
                ?>
                    <div class="pro">
                        <div class="thumbnail">
                            <img src="/img/<?php echo $product['gambar']; ?>" alt="product">
                        </div>
                        <div class="desc">
                            <span><?php echo $product['kategori']; ?></span>
                            <h5><?php echo $product['nama']; ?></h5>
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
                            <a href="productDetails.php?id=<?= $product["id"]; ?>" class="readmore">Read More</a>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </section>
        <!-- end services -->
        <!-- footer start -->
        <section id="contact" class="footer">
            <footer class="section-p1">
                <div class="col kiri">
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
                <div class="col kanan">
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
