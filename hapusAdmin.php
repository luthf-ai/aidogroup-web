<?php
require 'functions.php';

$id = $_GET['id'];

if (hapusAdmin($id) > 0) {
  echo "
        <script>
            alert('data berhasil dihapus');
            document.location.href = 'admin.php';
        </script>
        ";
} else {
  echo "
        <script>
            alert('data gagal dihapus');
            document.location.href = 'admin.php';
        </script>";
  echo "<script>alert('Error hapusAdmin.php: " . mysqli_error($connection) . "');</script>";
}
