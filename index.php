<?php

session_start();

// membatasi halaman sebelum login
if (!isset($_SESSION["login"])) {
    echo "<script>
            alert('login dulu yaa bro);
            document.location.href = 'login.php';
          </script>";
    exit;
}

// membatasi halaman sesuai user login
if ($_SESSION["level"] != 1 and $_SESSION["level"] != 2) {
    echo "<script>
            alert('Perhatian anda tidak punya hak akses');
            document.location.href = 'akun.php';
          </script>";
    exit;
}

$title = 'Daftar Bus';

include 'layout/header.php';

$data_bus = select("SELECT * FROM data_bus ORDER BY id_bus DESC");

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><i class="fas fa-list"></i> Data Bus</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Data Bus</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid" style=" padding: 5vh;">

            <!-- Main content -->

            <div class="card" style=" padding: 2vh;">
                <div class="card-header">
                    <h3 class="card-title">Tabel Data Bus</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <a href="tambah-data_bus.php" class="btn btn-primary btn-sm mb-2"><i class="fas fa-plus"></i> Tambah</a>

                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Plat Nomor</th>
                                <th>Model</th>
                                <th>chasis Bus</th>
                                <th>Tanggal Pembuatan</th>
                                <th>Harga</th>
                                <th>Kondisi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($data_bus as $bus) : ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $bus['plat_no']; ?></td>
                                    <td><?= $bus['model']; ?></td>
                                    <td><?= $bus['chasis']; ?></td>
                                    <td><?= date('d/m/Y', strtotime($bus['tanggal_pembuatan'])); ?></td>
                                    <td>Rp. <?= number_format($bus['harga'], 0, ',', '.'); ?></td>
                                    <td><?= $bus['kondisi']; ?></td>
                                    <td width="20%" class="text-center">

                                        <a href="detail-data_bus.php?id_bus=<?= $bus['id_bus']; ?>" class="btn btn-secondary btn-sm"><i class="fas fa-eye"></i> Detail</a>

                                        <a href="ubah-data_bus.php?id_bus=<?= $bus['id_bus']; ?>" class="btn btn-success btn-sm"><i class="fas fa-edit"></i> Ubah</a>

                                        <a href="hapus-data_bus.php?id_bus=<?= $bus['id_bus']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Data Bus Akan Dihapus.?');"><i class="fas fa-trash-alt"></i> Hapus</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<?php include 'layout/footer.php'; ?>