<?php
session_start();
if (!isset($_SESSION["login"])) {
  echo $_SESSION["login"];
  header("Location:login.php");
  exit;
}
require 'functions.php';

$id = $_GET['id'];
$dataEdit = mysqli_query($connection, "SELECT * FROM admin WHERE id = $id");
$row = mysqli_fetch_assoc($dataEdit);

if (isset($_POST['editAdmin'])) {
  if (editAdmin($_POST) > 0) {
    echo "
        <script>
            alert('data berhasil diubah');
            document.location.href = 'admin.php';
        </script>
        ";
  } else {
    echo mysqli_error($connection);
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
      <a href="#" class="logo">
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
          <h2 class="card-title">Edit Admin</h2>
          <form action="" method="POST">
            <input type="hidden" name="id" value="<?= $row['id']; ?>">
            <div class="mb-3">
              <label for="username" class="form-label">Username</label>
              <input type="text" class="form-control" id="username" name="username" value="<?= $row['username']; ?>">
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email" value="<?= $row['email']; ?>">
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="mb-3">
              <label for="password2" class="form-label">Konfirmasi Password</label>
              <input type="password" class="form-control" id="password2" name="password2">
            </div>
            <button type="submit" class="btn btn-primary" name="editAdmin">Edit</button>
          </form>
        </div>
      </div>
    </section>
    <!-- login section end -->
