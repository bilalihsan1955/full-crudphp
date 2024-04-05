<?php

session_start();

// membatasi halaman sebelum login
if (!isset($_SESSION["login"])) {
    echo "<script>
            alert('login dulu yaa');
            document.location.href = 'login.php';
          </script>";
    exit;
}

// membatasi halaman sesuai user login
if ($_SESSION["level"] != 1 and $_SESSION["level"] != 3) {
    echo "<script>
            alert('Perhatian anda tidak punya hak akses');
            document.location.href = 'akun.php';
          </script>";
    exit;
}

$title = 'Daftar Data Pegawai';

include 'layout/header.php';

// menampilkan data pegawai
$data_pegawai = select("SELECT * FROM pegawai ORDER BY id_pegawai DESC");

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><i class="fas fa-users"></i> Data Pegawai</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Data Pegawai</li>
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
                    <h3 class="card-title">Tabel Data Pegawai</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <a href="tambah-pegawai.php" class="btn btn-primary btn-sm mb-2"><i class="fas fa-plus"></i> Tambah</a>

                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Divisi Bidang</th>
                                <th>Jenis Kelamin</th>
                                <th>Telepon</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($data_pegawai as $pegawai) : ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $pegawai['nama']; ?></td>
                                    <td><?= $pegawai['divisi_bidang']; ?></td>
                                    <td><?= $pegawai['jk']; ?></td>
                                    <td><?= $pegawai['telepon']; ?></td>
                                    <td class="text-center" width="20%">
                                        <a href="detail-pegawai.php?id_pegawai=<?= $pegawai['id_pegawai']; ?>" class="btn btn-secondary btn-sm"><i class="fas fa-eye"></i> Detail</a>

                                        <a href="ubah-pegawai.php?id_pegawai=<?= $pegawai['id_pegawai']; ?>" class="btn btn-success btn-sm"><i class="fas fa-edit"></i> Ubah</a>

                                        <a href="hapus-pegawai.php?id_pegawai=<?= $pegawai['id_pegawai']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Data Pegawai Akan Dihapus.?');"><i class="fas fa-trash-alt"></i> Hapus</a>
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