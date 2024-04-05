<?php

session_start();

// membatasi halaman sebelum login
if (!isset($_SESSION["login"])) {
  echo "<script>
            alert('login dulu dong');
            document.location.href = 'login.php';
          </script>";
  exit;
}

include 'config/app.php';

// menerima id barang yang dipilih pengguna
$id_bus = (int)$_GET['id_bus'];

if (delete_bus($id_bus) > 0) {
    echo "<script>
            alert('Data bus Berhasil Dihapus');
            document.location.href = 'index.php';
          </script>";
} else {
    echo "<script>
            alert('Data bus Gagal Dihapus');
            document.location.href = 'index.php';
          </script>";
}
