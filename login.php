<?php
session_start();
include 'functions.php';

// if (isset($_SESSION["login"])) {
//   header("location:admin.php");
//   exit;
// }

if (isset($_POST["login"])) {
  $username = $_POST["username"];
  $password = $_POST["password"];


  $result = mysqli_query($connection, "SELECT * FROM admin WHERE username='$username'");

  if (mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);

    if (password_verify($password, $row["password"])) {
      //set session
      $_SESSION["login"] = true;

      //redirect ke halaman index.php
      header("Location:dashboard.php");
      exit;
    }
  }
  $error = true;
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
    </section>
    <!-- header end -->
    <!-- login section -->
    <section class="home">
      <!-- add error notification -->
      <?php if (isset($error)) : ?>
        <p style="color: red; background-color: lightpink; width: 100%; padding: 1rem;">Username / Password salah</p>
      <?php endif; ?>
      <!-- card login -->
      <div class="card">
        <div class="card-body">
          <h2 class="card-title">Login</h2>
          <form action="" method="POST">
            <div class="mb-3">
              <label for="username" class="form-label">Username</label>
              <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username">
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password">
            </div>
            <button type="submit" class="btn btn-primary" name="login">Login</button>
          </form>
        </div>
      </div>
      <!-- card login end -->
    </section>
    <!-- login section end -->
  </div>
</body>

</html>
