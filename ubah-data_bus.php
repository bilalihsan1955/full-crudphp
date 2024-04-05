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

$title = 'Ubah data bus';

include 'layout/header.php';

// mengambil id_barang dari url
$id_bus = (int)$_GET['id_bus'];

$bus = select("SELECT * FROM data_bus WHERE id_bus = $id_bus")[0];

// check apakah tombol ubah ditekan
if (isset($_POST['ubah'])) {
    if (update_bus($_POST) > 0) {
        echo "<script>
                alert('Data Bus Berhasil Diubah');
                document.location.href = 'index.php';
              </script>";
    } else {
        echo "<script>
                alert('Data Bus Gagal Diubah');
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
                    <h1 class="m-0"><i class="fas fa-edit"></i> Ubah Data Bus</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Data Data Bus</a></li>
                        <li class="breadcrumb-item active">Ubah Data Bus</li>
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

                    <input type="hidden" name="id_bus" value="<?= $bus['id_bus']; ?>">

                    <div class="mb-3">
                        <label for="plat_no" class="form-label">Plat Nomor</label>
                        <input disabled class="form-control" name="plat_no" value="<?= $bus['plat_no']; ?>">
                    </div>

                    <div class="mb-3">
                        <label for="model" class="form-label">Model Bus</label>
                        <input type="text" class="form-control" id="model" name="model" placeholder="masukkan model bus" required value="<?= $bus['model']; ?>">
                    </div>

                    <div class="mb-3">
                        <label for="karoseri" class="form-label">Karoseri Bus</label>
                        <input type="text" class="form-control" id="karoseri" name="karoseri" placeholder="masukkan model bus" required value="<?= $bus['karoseri']; ?>">
                    </div>

                    <div class="mb-3">
                        <label for="chasis" class="form-label">chasis Bus</label>
                        <input disabled type="text" class="form-control" id="chasis" name="chasis" placeholder="masukkan model bus" required value="<?= $bus['karoseri']; ?>">
                    </div>

                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal Pembuatan</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="masukkan tanggal pembuatan bus" required value="<?= $bus['tanggal_pembuatan']; ?>">
                    </div>

                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga Bus</label>
                        <input type="number" class="form-control" id="harga" name="harga" placeholder="masukkan harga bus." required value="<?= $bus['harga']; ?>">
                    </div>

                    <div class="mb-3">
                        <label for="kondisi" class="form-label">Kondisi Bus</label>
                        <input type="text" class="form-control" id="kondisi" name="kondisi" placeholder="masukkan kondisi bus" required value="<?= $bus['kondisi']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="file"><b>Foto</b></label><br>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="foto" name="foto" onchange="previewImg()">
                            <label class="custom-file-label" for="file">Pilih ulang gambar...</label>
                        </div>
                        <div class="mt-1">
                            <img src="assets-template/img/<?= $bus['foto']; ?>" alt="" class="img-thumbnail img-preview" width="100px">
                        </div>
                    </div>

                    <button type="submit" name="ubah" class="btn btn-primary" style="float: right;">Ubah data</button>

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