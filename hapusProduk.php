<?php
require 'functions.php';

$id = $_GET['id'];

if (hapusProduk($id) > 0) {
  echo "
        <script>
            alert('data berhasil dihapus');
            document.location.href = 'product.php';
        </script>
        ";
} else {
  echo "
        <script>
            alert('data gagal dihapus');
            document.location.href = 'product.php';
        </script>";
  echo "<script>alert('Error hapusProduk.php: " . mysqli_error($connection) . "');</script>";
}
