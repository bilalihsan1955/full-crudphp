<?php

// fungsi menampilkan
function select($query)
{
    // panggil koneksi database
    global $db;

    $result = mysqli_query($db, $query);
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

// fungsi menambahkan data bus
function tambah_bus($post)
{
    global $db;

    $platnomor     = strip_tags($post['platnomor']);
    $model         = strip_tags($post['model']);
    $karoseri      = strip_tags($post['karoseri']);
    $chasis      = strip_tags($post['chasis']);
    $harga         = strip_tags($post['harga']);
    $tanggal       = strip_tags($post['tanggal']);
    $kondisi       = strip_tags($post['kondisi']);
    $foto          = upload_filebus();

    // query tambah data
    $query = "INSERT INTO data_bus VALUES(NULL, '$platnomor', '$model', '$karoseri', '$chasis', '$tanggal', '$harga', '$kondisi', '$foto')";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

// fungsi mengubah data bus
function update_bus($post)
{
    global $db;

    $id_bus      = strip_tags($post['id_bus']);
    // $platnomor       = strip_tags($post['plat_no']);
    $model           = strip_tags($post['model']);
    $karoseri        = strip_tags($post['karoseri']);
    $harga           = strip_tags($post['harga']);
    $tanggal         = strip_tags($post['tanggal']);
    $kondisi         = strip_tags($post['kondisi']);
    $fotoLama        = strip_tags($post['fotoLama']);

    // check upload foto baru atau tidak
    if ($_FILES['foto']['error'] == 4) {
        $foto = $fotoLama;
    } else {
        $foto = upload_file();
    }


    // query ubah data
    $query = "UPDATE data_bus SET model = '$model', karoseri = '$karoseri', tanggal_pembuatan = '$tanggal', harga = '$harga', kondisi = '$kondisi', foto = '$foto' WHERE id_bus = $id_bus";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

// fungsi menghapus data bus
function delete_bus($id_bus)
{
    global $db;

    // query hapus data bus
    $query = "DELETE FROM data_bus WHERE id_bus = $id_bus";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

// fungsi menambah data pegawai
function create_pegawai($post)
{
    global $db;

    $nama       = strip_tags($post['nama']);
    $divisi      = strip_tags($post['divisi']);
    $jk         = strip_tags($post['jk']);
    $telepon    = strip_tags($post['telepon']);
    $alamat     = $post['alamat'];
    $email      = strip_tags($post['email']);
    $foto       = upload_file();

    // check upload foto
    if (!$foto) {
        return false;
    }

    // query tambah data
    $query = "INSERT INTO pegawai VALUES(NULL, '$nama', '$divisi', '$jk', '$telepon', '$alamat', '$email', '$foto')";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

// fungsi mengubah data pegawai
function update_pegawai($post)
{
    global $db;

    $id_pegawai = strip_tags($post['id_pegawai']);
    $nama       = strip_tags($post['nama']);
    $divisi      = strip_tags($post['divisi']);
    $jk         = strip_tags($post['jk']);
    $telepon    = strip_tags($post['telepon']);
    $alamat     = $post['alamat'];
    $email      = strip_tags($post['email']);
    $fotoLama   = strip_tags($post['fotoLama']);

    // check upload foto baru atau tidak
    if ($_FILES['foto']['error'] == 4) {
        $foto = $fotoLama;
    } else {
        $foto = upload_file();
    }

    // query ubah data
    $query = "UPDATE pegawai SET nama = '$nama', divisi_bidang = '$divisi', jk = '$jk', telepon = '$telepon', alamat = '$alamat', email = '$email', foto = '$foto' WHERE id_pegawai = $id_pegawai";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

// fungsi mengupload file
function upload_file()
{
    $namaFile   = $_FILES['foto']['name'];
    $ukuranFile = $_FILES['foto']['size'];
    $error      = $_FILES['foto']['error'];
    $tmpName    = $_FILES['foto']['tmp_name'];

    // check file yang diupload
    $extensifileValid = ['jpg', 'jpeg', 'png'];
    $extensifile      = explode('.', $namaFile);
    $extensifile      = strtolower(end($extensifile));

    // check format/extensi file
    if (!in_array($extensifile, $extensifileValid)) {
        // pesan gagal
        echo "<script>
                alert('Format File Tidak Valid');
                document.location.href = 'pegawai.php';
              </script>";
        die();
    }

    // check ukuran file 2 MB
    if ($ukuranFile > 2048000) {
        // pesan gagal
        echo "<script>
                alert('Ukuran File Max 2 MB');
                document.location.href = 'pegawai.php';
              </script>";
        die();
    }

    // generate nama file baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $extensifile;

    // pindahkan ke folder local
    move_uploaded_file($tmpName, 'assets-template/img/' . $namaFileBaru);
    return $namaFileBaru;
}

function upload_filebus()
{
    $namaFile   = $_FILES['foto']['name'];
    $ukuranFile = $_FILES['foto']['size'];
    $error      = $_FILES['foto']['error'];
    $tmpName    = $_FILES['foto']['tmp_name'];

    // check file yang diupload
    $extensifileValid = ['jpg', 'jpeg', 'png'];
    $extensifile      = explode('.', $namaFile);
    $extensifile      = strtolower(end($extensifile));

    // check format/extensi file
    if (!in_array($extensifile, $extensifileValid)) {
        // pesan gagal
        echo "<script>
                alert('Format File Tidak Valid');
                document.location.href = 'index.php';
              </script>";
        die();
    }

    // check ukuran file 2 MB
    if ($ukuranFile > 20480000) {
        // pesan gagal
        echo "<script>
                alert('Ukuran File Max 2 MB');
                document.location.href = 'index.php';
              </script>";
        die();
    }

    // generate nama file baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $extensifile;

    // pindahkan ke folder local
    move_uploaded_file($tmpName, 'assets-template/img/' . $namaFileBaru);
    return $namaFileBaru;
}

// fungsi menghapus data pegawai
function delete_pegawai($id_pegawai)
{
    global $db;

    // ambil foto sesuai data yang dipilih
    $foto = select("SELECT * FROM pegawai WHERE id_pegawai = $id_pegawai")[0];
    unlink("assets-template/img/" . $foto['foto']);

    // query hapus data pegawai
    $query = "DELETE FROM pegawai WHERE id_pegawai = $id_pegawai";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

// fungsi tambah akun
function create_akun($post)
{
    global $db;

    $nama       = strip_tags($post['nama']);
    $username   = strip_tags($post['username']);
    $email      = strip_tags($post['email']);
    $password   = strip_tags($post['password']);
    $level      = strip_tags($post['level']);

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // query tambah data
    $query = "INSERT INTO akun VALUES(null, '$nama', '$username', '$email', '$password', '$level')";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

// fungsi ubah akun
function update_akun($post)
{
    global $db;

    $id_akun    = strip_tags($post['id_akun']);
    $nama       = strip_tags($post['nama']);
    $username   = strip_tags($post['username']);
    $email      = strip_tags($post['email']);
    $password   = strip_tags($post['password']);
    $level      = strip_tags($post['level']);

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // query ubah data
    $query = "UPDATE akun SET nama = '$nama', username = '$username', email = '$email', password = '$password', level = '$level' WHERE id_akun = $id_akun";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

// fungsi menghapus data akun
function delete_akun($id_akun)
{
    global $db;

    // query hapus data akun
    $query = "DELETE FROM akun WHERE id_akun = $id_akun";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}
