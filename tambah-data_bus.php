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

$title = 'Tambah Barang';

include 'layout/header.php';

// check apakah tombol tambah ditekan
if (isset($_POST['tambah'])) {
    if (tambah_bus($_POST) > 0) {
        echo "<script>
                alert('Data Bus Berhasil Ditambahkan');
                document.location.href = 'index.php';
              </script>";
    } else {
        echo "<script>
                alert('Data Bus Gagal Ditambahkan');
                document.location.href = 'index.php';
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
                        <ia class="fas fa-plus"></ia> Tambah Data Bus
                    </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Data Data Bus</a></li>
                        <li class="breadcrumb-item active">Tambah Data Bus</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="row" style=" padding: 5vh;">
            <div class="container-fluid">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-goroup">
                        <label for="platnomor" class="form-label">Plat Nomor</label>
                        <input type="text" class="form-control" id="platnomor" name="platnomor" placeholder="masukkan plat nomor bus" required>
                        <span>data plat nomor yang dimasukkan harus benar tidak boleh salah</span>
                    </div>

                    <div class="mb-3">
                        <label for="model" class="form-label">Model Bus</label>
                        <input type="text" class="form-control" id="model" name="model" placeholder="masukkan model bus" required>
                    </div>

                    <div class="form-goroup">
                        <label for="karoseri" class="form-label">Karoseri Bus</label>
                        <input type="text" class="form-control" id="karoseri" name="karoseri" placeholder="masukkan karoseri bus" required>
                    </div>

                    <div class="form-goroup">
                        <label for="chasis" class="form-label">Chasis Bus</label>
                        <input type="text" class="form-control" id="chasis" name="chasis" placeholder="masukkan chasis bus" required>
                        <span>data chasis bus yang dimasukkan harus benar tidak boleh salah</span>
                    </div>

                    <div class="form-goroup">
                        <label for="tanggal" class="form-label">Tanggal Pembuatan</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="masukkan tanggal pembuatan bus" required>
                    </div>

                    <div class="form-goroup">
                        <label for="harga" class="form-label">Harga Bus</label>
                        <input type="number" class="form-control" id="harga" name="harga" placeholder="masukkan harga bus." required>
                    </div>

                    <div class="form-goroup">
                        <label for="kondisi" class="form-label">Kondisi Bus</label>
                        <input type="text" class="form-control" id="kondisi" name="kondisi" placeholder="masukkan kondisi bus" required>
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