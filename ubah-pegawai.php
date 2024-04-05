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

$title = 'Ubah pegawai';

include 'layout/header.php';

// check apakah tombol ubah ditekan
if (isset($_POST['ubah'])) {
    if (update_pegawai($_POST) > 0) {
        echo "<script>
                alert('Data pegawai Berhasil Diubah');
                document.location.href = 'pegawai.php';
              </script>";
    } else {
        echo "<script>
                alert('Data pegawai Gagal Diubah');
                document.location.href = 'pegawai.php';
              </script>";
    }
}

// ambil id pegawai dari url
$id_pegawai = (int)$_GET['id_pegawai'];

// query ambil data pegawai
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
                        <ia class="fas fa-edit"></ia> Ubah Pegawai
                    </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="pegawai.php">Data Pegawai</a></li>
                        <li class="breadcrumb-item active">Ubah Pegawai</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row" style=" padding: 5vh;">
                <div class="col-12 mb-5">
                    <form action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id_pegawai" value="<?= $pegawai['id_pegawai']; ?>">
                        <input type="hidden" name="fotoLama" value="<?= $pegawai['foto']; ?>">

                        <div class="form-group">
                            <label for="nama" class="form-label">Nama pegawai</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama pegawai..." required value="<?= $pegawai['nama']; ?>">
                        </div>

                        <div class="row">
                            <div class="form-group col-6">
                                <label for="divisi" class="form-label">Divisi Bidang</label>
                                <select name="divisi" id="divisi" class="form-control" required>
                                    <?php $divisi = $pegawai['divisi_bidang']; ?>
                                    <option value="Driver" <?= $divisi == 'Driver' ? 'selected' : null ?>>Driver</option>
                                    <option value="Helper" <?= $divisi == 'Helper' ? 'selected' : null ?>>Helper</option>
                                    <option value="mechanical technician" <?= $divisi == 'mechanical technician' ? 'selected' : null ?>>mechanical technician</option>
                                    <option value="AC technician" <?= $divisi == 'AC technician' ? 'selected' : null ?>>AC technician</option>
                                    <option value="Electrical technician" <?= $divisi == 'Electrical technician' ? 'selected' : null ?>>Electrical technician</option>
                                </select>
                            </div>

                            <div class="form-group col-6">
                                <label for="jk" class="form-label">Jenis Kelamin</label>
                                <select name="jk" id="jk" class="form-control" required>
                                    <?php $jk = $pegawai['jk']; ?>
                                    <option value="Laki-Laki" <?= $jk == 'Laki-Laki' ? 'selected' : null  ?>>Laki-Laki</option>
                                    <option value="Perempuan" <?= $jk == 'Perempuan' ? 'selected' : null  ?>>Perempuan</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="telepon" class="form-label">Telepon</label>
                            <input type="number" class="form-control" id="telepon" name="telepon" placeholder="Telepon..." required value="<?= $pegawai['telepon']; ?>">
                        </div>

                        <div class="form-group">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea name="alamat" id="alamat"><?= $pegawai['alamat']; ?></textarea>
                        </div>

                        <div class="form-group">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="email..." required value="<?= $pegawai['email']; ?>">
                        </div>

                        <div class="form-group">
                            <label for="file"><b>Foto</b></label><br>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="foto" name="foto" onchange="previewImg()">
                                <label class="custom-file-label" for="file">Pilih ulang gambar...</label>
                            </div>
                            <div class="mt-1">
                                <img src="assets-template/img/<?= $pegawai['foto']; ?>" alt="" class="img-thumbnail img-preview" width="100px">
                            </div>
                        </div>

                        <button type="submit" name="ubah" class="btn btn-primary" style="float: right;">Ubah</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>

<!-- preview image -->
<script>
    function previewImg() {
        const gambar = document.querySelector('#foto');
        const gambarLabel = document.querySelector('.custom-file-label');
        const imgPreview = document.querySelector('.img-preview');

        gambarLabel.textContent = gambar.files[0].name;

        const fileGambar = new FileReader();
        fileGambar.readAsDataURL(gambar.files[0]);

        fileGambar.onload = function(e) {
            imgPreview.src = e.target.result;
        }
    }
</script>

<?php include 'layout/footer.php'; ?>
