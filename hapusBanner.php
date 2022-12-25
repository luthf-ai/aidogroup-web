<?php
require 'functions.php';

$id = $_GET['id'];

if (hapusBanner($id) > 0) {
  echo "
        <script>
            alert('data berhasil dihapus');
            document.location.href = 'banner.php';
        </script>
        ";
} else {
  echo "
        <script>
            alert('data gagal dihapus');
            document.location.href = 'banner.php';
        </script>";
  echo "<script>alert('Error hapusBanner.php: " . mysqli_error($connection) . "');</script>";
}
