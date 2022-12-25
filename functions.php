<?php
// connection to database
$connection = mysqli_connect('localhost', 'root', '', 'aidogroup');
if (!$connection) {
  die("Database connection failed");
}
function registrasi($data)
{
  global $connection;


  $username = strtolower(stripcslashes($data['username']));
  $email = strtolower(stripcslashes($data['email']));
  $password = mysqli_real_escape_string($connection, $data['password']);
  $password2 = mysqli_real_escape_string($connection, $data['password2']);

  //cek konfirmasi password
  if ($password !== $password2) {
    echo "
        <script>
            alert('password anda tidak sama');
        </script>
        ";
    return false;
  }
  //cek username sudah ada atau belum
  $result = mysqli_query($connection, "SELECT username FROM admin WHERE username = '$username'");
  if (mysqli_fetch_assoc($result)) {
    echo "
        <script>
            alert('username sudah terdaftar');
        </script>
        ";
    return false;
  }
  //cek email sudah ada atau belum
  $result = mysqli_query($connection, "SELECT email FROM admin WHERE email = '$email'");
  if (mysqli_fetch_assoc($result)) {
    echo "
        <script>
            alert('email sudah terdaftar');
        </script>
        ";
    return false;
  }
  // enkripsi password
  // $password
  $password = password_hash($password, PASSWORD_DEFAULT);
  // var_dump($password);
  mysqli_query($connection, "INSERT INTO admin VALUES ('','$username','$email','$password')");
  return mysqli_affected_rows($connection);
}

function editAdmin($data)
{
  global $connection;

  $id = $data['id'];
  $username = strtolower(stripcslashes($data['username']));
  $email = strtolower(stripcslashes($data['email']));
  $password = mysqli_real_escape_string($connection, $data['password']);
  $password2 = mysqli_real_escape_string($connection, $data['password2']);

  //cek konfirmasi password
  if ($password !== $password2) {
    echo "
        <script>
            alert('password anda tidak sama');
        </script>
        ";
    return false;
  }

  // enkripsi password
  // $password=md5($password);
  $password = password_hash($password, PASSWORD_DEFAULT);
  // var_dump($password);
  mysqli_query($connection, "UPDATE admin SET username='$username', email='$email', password='$password' WHERE id='$id'");
  return mysqli_affected_rows($connection);
}
function hapusAdmin($id)
{
  global $connection;
  mysqli_query($connection, "DELETE FROM admin WHERE id=$id");
  return mysqli_affected_rows($connection);
}

function tambahProduk($data)
{
  global $connection;
  $nama = htmlspecialchars($data['nama']);
  $deskripsi = htmlspecialchars($data['deskripsi']);
  $kategori = htmlspecialchars($data['kategori']);
  //rating is integer
  $rating = htmlspecialchars($data['rating']);


  // upload gambar
  $gambar = upload();
  if (!$gambar) {
    return false;
  }

  $query = "INSERT INTO product VALUES ('','$nama','$deskripsi','$rating','$kategori','$gambar')";
  mysqli_query($connection, $query);
  return mysqli_affected_rows($connection);
}

function upload()
{
  $namaFile = $_FILES['gambar']['name'];
  $ukuranFile = $_FILES['gambar']['size'];
  $error = $_FILES['gambar']['error'];
  $tmpName = $_FILES['gambar']['tmp_name'];

  // cek apakah tidak ada gambar yang diupload
  if ($error === 4) {
    echo "
        <script>
            alert('pilih gambar terlebih dahulu');
        </script>
        ";
    return false;
  }

  // cek apakah yang diupload adalah gambar
  $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
  $ekstensiGambar = explode('.', $namaFile);
  $ekstensiGambar = strtolower(end($ekstensiGambar));
  if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
    echo "
        <script>
            alert('yang anda upload bukan gambar');
        </script>
        ";
    return false;
  }

  // cek jika ukurannya terlalu besar
  if ($ukuranFile > 10000000) {
    echo "
        <script>
            alert('ukuran gambar terlalu besar');
        </script>
        ";
    return false;
  }

  // lolos pengecekan, gambar siap diupload
  // generate nama gambar baru
  $namaFileBaru = uniqid();
  $namaFileBaru .= '.';
  $namaFileBaru .= $ekstensiGambar;

  move_uploaded_file($tmpName, 'img/' . $namaFileBaru);
  return $namaFileBaru;
}

function editProduk($data)
{
  global $connection;
  $id = $data['id'];
  $nama = htmlspecialchars($data['nama']);
  $deskripsi = htmlspecialchars($data['deskripsi']);
  $kategori = htmlspecialchars($data['kategori']);
  //rating is integer
  $rating = htmlspecialchars($data['rating']);
  $gambarLama = htmlspecialchars($data['gambarLama']);

  // cek apakah user pilih gambar baru atau tidak
  if ($_FILES['gambar']['error'] === 4) {
    $gambar = $gambarLama;
  } else {
    $gambar = upload();
    // delete gambar lama
    unlink('img/' . $gambarLama);
  }

  $query = "UPDATE product SET nama='$nama', deskripsi='$deskripsi', rating='$rating', kategori='$kategori', gambar='$gambar' WHERE id='$id'";
  mysqli_query($connection, $query);
  return mysqli_affected_rows($connection);
}

function hapusProduk($id)
{
  global $connection;
  // delete image
  $product = mysqli_query($connection, "SELECT * FROM product WHERE id = $id");
  $row = mysqli_fetch_assoc($product);
  $gambar = $row['gambar'];
  unlink('img/' . $gambar);
  // delete product
  mysqli_query($connection, "DELETE FROM product WHERE id=$id");
  return mysqli_affected_rows($connection);
}

function tambahBanner($data)
{
  global $connection;
  $judul = htmlspecialchars($data['judul']);
  $deskripsi = htmlspecialchars($data['deskripsi']);
  $gambar = upload();
  if (!$gambar) {
    return false;
  }

  $query = "INSERT INTO slideshow VALUES ('','$judul','$deskripsi','$gambar')";
  mysqli_query($connection, $query);
  return mysqli_affected_rows($connection);
}

function editBanner($data)
{
  global $connection;
  $id = $data['id'];
  $judul = htmlspecialchars($data['judul']);
  $deskripsi = htmlspecialchars($data['deskripsi']);
  $gambarLama = htmlspecialchars($data['gambarLama']);

  // cek apakah user pilih gambar baru atau tidak
  if ($_FILES['gambar']['error'] === 4) {
    $gambar = $gambarLama;
  } else {
    $gambar = upload();
    // delete gambar lama
    unlink('img/' . $gambarLama);
  }

  $query = "UPDATE slideshow SET judul='$judul', deskripsi='$deskripsi', gambar='$gambar' WHERE id='$id'";
  mysqli_query($connection, $query);
  return mysqli_affected_rows($connection);
}

function hapusBanner($id)
{
  global $connection;
  // delete image
  $product = mysqli_query($connection, "SELECT * FROM slideshow WHERE id = $id");
  $row = mysqli_fetch_assoc($product);
  $gambar = $row['gambar'];
  unlink('img/' . $gambar);
  // delete banner
  mysqli_query($connection, "DELETE FROM slideshow WHERE id=$id");
  return mysqli_affected_rows($connection);
}
