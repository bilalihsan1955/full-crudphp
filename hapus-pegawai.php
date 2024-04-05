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

// menerima id mahasiswa yang dipilih pengguna
$id_pegawai = (int)$_GET['id_pegawai'];

if (delete_pegawai($id_pegawai) > 0) {
  echo "<script>
            alert('Data pegawai Berhasil Dihapus');
            document.location.href = 'pegawai.php';
          </script>";
} else {
  echo "<script>
            alert('Data pegawai Gagal Dihapus');
            document.location.href = 'pegawai.php';
          </script>";
}
