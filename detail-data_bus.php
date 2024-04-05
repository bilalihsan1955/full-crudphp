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

$title = 'Detail bus';

include 'layout/header.php';

// mengambil id mahasiswa dari url
$id_bus = (int)$_GET['id_bus'];

// menampilkan data bus
$bus = select("SELECT * FROM data_bus WHERE id_bus = $id_bus")[0];

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">
                        <ia class="fas fa-user"></ia> Detail bus : <?= $bus['plat_no']; ?>
                    </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="bus.php">Data bus</a></li>
                        <li class="breadcrumb-item active">Detail bus</li>
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
                            <td>Plat Nomor</td>
                            <td>: <?= $bus['plat_no']; ?></td>
                        </tr>

                        <tr>
                            <td>Model Bus</td>
                            <td>: <?= $bus['model']; ?></td>
                        </tr>

                        <tr>
                            <td>Tanggal Pembuatan</td>
                            <td>: <?= date('d/m/Y', strtotime($bus['tanggal_pembuatan'])); ?></td>
                        </tr>

                        <tr>
                            <td>Harga</td>
                            <td>: Rp. <?= number_format($bus['harga'], 0, ',', '.'); ?></td>
                        </tr>

                        <tr>
                            <td>Kondisi</td>
                            <td>: <?= $bus['kondisi']; ?></td>
                        </tr>

                        <tr>
                            <td width="50%">Foto</td>
                            <td>
                                <a href="assets-template/img/<?= $bus['foto']; ?>">
                                    <img src="assets-template/img/<?= $bus['foto']; ?>" alt="foto" height="500vh">
                                </a>
                            </td>
                        </tr>
                    </table>

                    <a href="ubah-data_bus.php?id_bus=<?= $bus['id_bus']; ?>" class="btn btn-success btn-sm"><i class="fas fa-edit"></i> Ubah</a>
                    <a href="index.php" class="btn btn-secondary btn-sm" style="float: right ;">Kembali</a>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>

<?php include 'layout/footer.php'; ?>