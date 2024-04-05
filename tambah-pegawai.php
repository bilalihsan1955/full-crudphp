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

$title = 'Tambah Data Pegawai';

include 'layout/header.php';

// check apakah tombol tambah ditekan
if (isset($_POST['tambah'])) {
    if (create_pegawai($_POST) > 0) {
        echo "<script>
                alert('Data pegawai Berhasil Ditambahkan');
                document.location.href = 'pegawai.php';
              </script>";
    } else {
        echo "<script>
                alert('Data pqgawai Gagal Ditambahkan');
                document.location.href = 'pegawai.php';
              </script>";
    }
}

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">
                        <ia class="fas fa-plus"></ia> Tambah Pegawai
                    </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="mahasiswa.php">Data Pegawai</a></li>
                        <li class="breadcrumb-item active">Tambah Pegawai</li>
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
                        <div class="form-group">
                            <label for="nama" class="form-label">Nama Pegawai</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama pegawai" required>
                        </div>

                        <div class="row">
                            <div class="form-group col-6">
                                <label for="divisi" class="form-label">Divisi Bidang</label>
                                <select name="divisi" id="divisi" class="form-control" required>
                                    <option value="">-- pilih Divisi Bidang --</option>
                                    <option value="Driver">Driver</option>
                                    <option value="Helper">Helper</option>
                                    <option value="mechanical technician">mechanical technician</option>
                                    <option value="AC technician">AC technician</option>
                                    <option value="Electrical technician">Electrical technician</option>
                                </select>
                            </div>

                            <div class="form-group col-6">
                                <label for="jk" class="form-label">Jenis Kelamin</label>
                                <select name="jk" id="jk" class="form-control" required>
                                    <option value="">-- pilih jenis kelamin --</option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="telepon" class="form-label">Telepon</label>
                            <input type="number" class="form-control" id="telepon" name="telepon" placeholder="masukkan nomor Telepon pegawai" required>
                        </div>

                        <div class="form-group">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea name="alamat" id="alamat"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder=" masukkan email pegawai" required>
                        </div>

                        <div class="form-group">
                            <label for="file"><b>Foto</b></label><br>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="foto" name="foto" onchange="previewImg()" required>
                                <label class="custom-file-label" for="file">Pilih gambar...</label>
                            </div>
                            <div class="mt-1">
                                <img src="" alt="" class="img-thumbnail img-preview" width="100px">
                            </div>
                        </div>

                        <button type="submit" name="tambah" class="btn btn-primary" style="float: right;">Tambah</button>
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