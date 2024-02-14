<?php
require_once '././config.php';

if (!isset($_SESSION['login_user'])) {
    header("Location: login.php");
}

$username =  $_SESSION['login_user'];

// ambil data petugas berdasarkan session login
$sql = mysqli_query($conn, "SELECT * FROM petugas_perpustakaan WHERE username_petugas = '$username'");
$data = mysqli_fetch_array($sql);
$nama_petugas = $data['nama_petugas'];
$kode_petugas = $data['kode_petugas'];
$alamat_petugas = $data['alamat_petugas'];
$no_hp_petugas = $data['no_hp_petugas'];
$username_petugas = $data['username_petugas'];
$email_petugas = $data['email_petugas'];
$password_petugas = $data['password_petugas'];



if(isset($_POST['ubah'])) {
    $u_nama_petugas = htmlspecialchars($_POST['nama_petugas']);
    $u_alamat_petugas = htmlspecialchars($_POST['alamat_petugas']);
    $u_no_hp_petugas = htmlspecialchars($_POST['no_hp_petugas']);
    $u_email_petugas = htmlspecialchars($_POST['email_petugas']);

    if(empty($u_nama_petugas) || empty($u_alamat_petugas) || empty($u_no_hp_petugas) || empty($u_email_petugas)) {
        echo "<script>alert('Pastikan anda sudah mengisi semua formulir.');</script>";
        echo "<script>window.location='?p=profile&aksi=ubah&username_petugas=$username';</script>";
    } else {
        $sql = $conn->query("UPDATE petugas_perpustakaan SET nama_petugas = '$u_nama_petugas', alamat_petugas = '$u_alamat_petugas', no_hp_petugas = '$u_no_hp_petugas', email_petugas = '$u_email_petugas', password_petugas = '$password_petugas'  WHERE username_petugas = '$username'") or die(mysqli_error($conn));
        if($sql) {
            echo "<script>alert('Data Berhasil Diubah.');window.location='?p=profile';</script>";
        } else {
            echo "<script>alert('Data Gagal Diubah.');window.location='?p=profile';</script>";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body>

<!-- card profile -->
<div class="card card-profile mb-4">
    <div class="card-body">
        <div class="row">
            <div class="col-4 p-4">
                <div class="col">
                    <p><h5>Hai <?=$nama_petugas?>,</h5>selamat datang di halaman profil. Kamu bisa ubah profil kamu di halaman ini.</p>
                    <hr>
                    <h5 class="card-title
                    ">Profile</h5>
                    <p class="card-text">Nama : <?=$nama_petugas?></p>
                    <p class="card-text">Alamat : <?=$alamat_petugas?></p>
                    <p class="card-text">No HP : <?=$no_hp_petugas?></p>
                    <p class="card-text">Username : <?=$username_petugas?></p>
                    <p class="card-text">Email : <?=$email_petugas?></p>
                </div>
            </div>
            <div class="col edit-form">
            <h1 class="mt-4">Ubah Data Petugas</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="?p=profile">Petugas</a></li>
                    <li class="breadcrumb-item active">ubah data petugas</li>
                </ol>
                <div class="card-header mb-5">
                    
                    <form action="" method="post">
                    <div class="form-group">
                        <label class="small mb-1" for="nama_petugas">Nama Petugas</label>
                        <input class="form-control" id="nama_petugas" name="nama_petugas" value="<?=$nama_petugas ?>" type="text" placeholder="Masukan nama petugas"/>
                    </div>
                    <div class="form-group">
                        <label class="small mb-1" for="alamat_petugas">Ubah Alamat</label>
                        <input class="form-control" id="alamat_petugas" value="<?= $alamat_petugas; ?>" name="alamat_petugas" type="text" placeholder="Masukan alamat petugas"/>
                    </div>
                    <div class="form-group">
                        <label class="small mb-1" for="no_hp_petugas">Ubah Nomor Handphone</label>
                        <input class="form-control" id="no_hp_petugas" value="<?= $no_hp_petugas; ?>" name="no_hp_petugas" type="number" placeholder="Masukan alamat petugas"/>
                    </div>
                    <div class="form-group">
                        <label class="small mb-1" for="email_petugas">Ubah Email</label>
                        <input class="form-control" id="email_petugas" value="<?= $email_petugas; ?>" name="email_petugas" type="email" placeholder="Masukan email petugas"/>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-hijau mt-3" name="ubah">Ubah Data</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- 
<a href="?p=profile&aksi=ubah&username_petugas=<?= $username; ?>" class="btn btn-hijau btn-sm">Ubah</a> -->
</body>
</html>