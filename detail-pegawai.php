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

$title = 'Detail Pegawai';

include 'layout/header.php';

// mengambil id mahasiswa dari url
$id_pegawai = (int)$_GET['id_pegawai'];

// menampilkan data pegawai
$pegawai = select("SELECT * FROM pegawai WHERE id_pegawai = $id_pegawai")[0];

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">
                        <ia class="fas fa-user"></ia> Detail Pegawai : <?= $pegawai['nama']; ?>
                    </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="pegawai.php">Data Pegawai</a></li>
                        <li class="breadcrumb-item active">Detail Pegawai</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid" style=" padding: 5vh;">
            <div class="row">
                <div class="col-12 mb-5">
                    <table class="table table-bordered table-striped mt-3">
                        <tr>
                            <td>Nama</td>
                            <td>: <?= $pegawai['nama']; ?></td>
                        </tr>

                        <tr>
                            <td>Divisi Bidang</td>
                            <td>: <?= $pegawai['divisi_bidang']; ?></td>
                        </tr>

                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>: <?= $pegawai['jk']; ?></td>
                        </tr>

                        <tr>
                            <td>Telepon</td>
                            <td>: <?= $pegawai['telepon']; ?></td>
                        </tr>

                        <tr>
                            <td>Alamat</td>
                            <td>: <?= $pegawai['alamat']; ?></td>
                        </tr>

                        <tr>
                            <td>Email</td>
                            <td>: <?= $pegawai['email']; ?></td>
                        </tr>

                        <tr>
                            <td width="50%">Foto</td>
                            <td>
                                <a href="assets-template/img/<?= $pegawai['foto']; ?>">
                                    <img src="assets-template/img/<?= $pegawai['foto']; ?>" alt="foto" width="50%">
                                </a>
                            </td>
                        </tr>
                    </table>

                    <a href="ubah-pegawai.php?id_pegawai=<?= $pegawai['id_pegawai']; ?>" class="btn btn-success btn-sm"><i class="fas fa-edit"></i> Ubah</a>

                    <a href="index.php" class="btn btn-secondary btn-sm" style="float: right ;">Kembali</a>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>

<?php include 'layout/footer.php'; ?>