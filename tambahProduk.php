<?php
session_start();
if (!isset($_SESSION["login"])) {
  echo $_SESSION["login"];
  header("Location:login.php");
  exit;
}
require 'functions.php';
// register
if (isset($_POST["submit"])) {
  //cek data berhasil ditambahkan
  if (tambahProduk($_POST) > 0) {
    echo "
            <script>
                alert('data berhasil ditambahkan');
                document.location.href = 'product.php';
            </script>
        ";
  } else {
    $error = mysqli_error($connection);
    echo "
            <script>
                alert(<?php echo $error ?>);
            </script>
        ";
  }
}
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
      <div class="back">
        <a href="admin.php">
          <i class="fas fa-right-from-bracket"></i>
          Back
        </a>
      </div>
    </section>
    <!-- header end -->
    <!-- login section -->
    <section class="home">
      <div class="card">
        <div class="card-body">
          <h2 class="card-title">Tambah Produk</h2>
          <form action="" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
              <label for="nama" class="form-label">Nama Produk</label>
              <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="mb-3">
              <label for="deskripsi" class="form-label">Deskripsi</label>
              <input type="text" class="form-control" id="deskripsi" name="deskripsi" required>
            </div>
            <div class="mb-3">
              <!-- rating 1-5 -->
              <label for="rating" class="form-label">Rating</label>
              <select class="form-select" aria-label="Default select example" name="rating" id="rating" required>
                <option selected>Pilih Rating</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
              </select>

            </div>
            <div class="mb-3">
              <label for="harga" class="form-label">Kategori</label>
              <select class="form-select" aria-label="Default select example" name="kategori" id="kategori" required>
                <option selected>Pilih Kategori</option>
                <option value="Wedding Documentation">Wedding Documentation</option>
                <option value="Event Documentation">Event Documentation</option>
                <option value="Photobooth">Photobooth</option>
                <option value="Prewedding">Prewedding</option>
                <option value="Graduation">Graduation</option>
                <option value="Birthday">Birthday</option>
                <option value="Other">Other</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="gambar" class="form-label">Gambar</label>
              <input class="form-control" type="file" id="gambar" name="gambar" required>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Tambah</button>
          </form>
        </div>
      </div>
    </section>
    <!-- login section end -->
  </div>
</body>

</html>
