<?php 

$kode_anggota = $_GET['kode_anggota'];

$tampilAnggota = $conn->query("SELECT * FROM anggota_perpustakaan WHERE kode_anggota = $kode_anggota") or die(mysqli_error($conn));
$view_anggota = $tampilAnggota->fetch_assoc();

if(isset($_POST['ubah'])) {
	$nisn_anggota = htmlspecialchars($_POST['nisn_anggota']);
	$nama_anggota = htmlspecialchars($_POST['nama_anggota']);
	$alamat_anggota = htmlspecialchars($_POST['alamat_anggota']);
	$no_hp_anggota = htmlspecialchars($_POST['no_hp_anggota']);
	$email_anggota = htmlspecialchars($_POST['email_anggota']);

    if(empty($nisn_anggota && $nama_anggota && $alamat_anggota && $no_hp_anggota && $email_anggota)) {
        echo "<script>alert('Pastikan anda sudah mengisi semua formulir.');</script>";
        echo "<script>window.location='?p=anggota&aksi=ubah&kode_anggota=$kode_anggota';</script>";
    } else {

        $sql = $conn->query("UPDATE anggota_perpustakaan SET nisn_anggota = '$nisn_anggota', nama_anggota = '$nama_anggota', alamat_anggota = '$alamat_anggota', no_hp_anggota = '$no_hp_anggota', email_anggota = '$email_anggota' WHERE kode_anggota = $kode_anggota");
        if ($view_anggota['nisn_anggota'] == $nisn_anggota) {
            echo "<script>alert('Data berhasil diubah.');window.location='?p=anggota';</script>";
       } else {
            if (!$sql) {
                if (mysqli_errno($conn) == 1062) {
                    echo "<script>alert('Data anggota duplikat. Cek NISN yang anda inputkan')</script>";
                } else {
                    echo "<script>alert('Data gagal diubah.')</script>";
                }
            } else {
                echo "<script>alert('Data berhasil diubah.');window.location='?p=anggota';</script>";
            }
       }

        // $sql = $conn->query("UPDATE anggota_perpustakaan SET nisn_anggota = '$nisn_anggota', nama_anggota = '$nama_anggota', alamat_anggota = '$alamat_anggota', no_hp_anggota = '$no_hp_anggota', email_anggota = '$email_anggota' WHERE kode_anggota = $kode_anggota") or die(mysqli_error($conn));
        // if($sql) {
        //     echo "<script>alert('Data Berhasil Diubah.');window.location='?p=anggota';</script>";
        // } else {
        //     echo "<script>alert('Data Gagal Diubah.');window.location='?p=anggota';</script>";
        // }
    }

}

?>

<h1 class="mt-4">Ubah Data Anggota</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="?p=anggota">Anggota</a></li>
    <li class="breadcrumb-item active">ubah data anggota</li>
</ol>
<div class="card-header mb-5">
	
	<form action="" method="post">
    <div class="form-group">
        <label class="small mb-1" for="nisn_anggota">Nomor Induk Anggota</label>
        <input class="form-control" id="nisn_anggota" name="nisn_anggota" value="<?= $view_anggota['nisn_anggota']; ?>" type="number" placeholder="Masukan nomor induk anggota" required/>
    </div>
    <div class="form-group">
        <label class="small mb-1" for="nama_anggota">Nama Anggota</label>
        <input class="form-control" id="nama_anggota" value="<?= $view_anggota['nama_anggota']; ?>" name="nama_anggota" type="text" placeholder="Masukan nama anggota" required/>
    </div>
    <div class="form-group">
        <label class="small mb-1" for="alamat_anggota">Alamat Anggota</label>
        <input class="form-control" id="alamat_anggota" value="<?= $view_anggota['alamat_anggota']; ?>" name="alamat_anggota" type="text" placeholder="Masukan alamat anggota" required/>
    </div>
    <div class="form-group">
        <label class="small mb-1" for="no_hp_anggota">Nomor Telepon</label>
        <input class="form-control" id="no_hp_anggota" value="<?= $view_anggota['no_hp_anggota']; ?>" name="no_hp_anggota" type="number" placeholder="Masukan nomor telepon anggota" required/>
    </div>
    <div class="form-group">
        <label class="small mb-1" for="jk">Jenis Kelamin</label>
        <input class="form-control" id="email_anggota" value="<?= $view_anggota['email_anggota']; ?>" name="email_anggota" type="email" placeholder="Masukan email anggota" required/>
    </div>
    <div class="form-group">
    	<button type="submit" class="btn btn-hijau" name="ubah">Ubah Data</button>
    </div>
	</form>
</div>