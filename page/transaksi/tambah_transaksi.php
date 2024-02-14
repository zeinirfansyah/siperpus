<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
if (!isset($_SESSION['login_user'])) {
    header("Location: login.php");
}

$username =  $_SESSION['login_user'];

// ambil data petugas berdasarkan session login
$sql = mysqli_query($conn, "SELECT * FROM petugas_perpustakaan WHERE username_petugas = '$username'");
$data = mysqli_fetch_array($sql);
$nama_petugas = $data['nama_petugas'];
$kode_petugas = $data['kode_petugas'];


$tampilNamaBuku = $conn->query("SELECT * FROM buku ORDER BY kode_buku") or die(mysqli_error($conn));
$tampilNamaAnggota = $conn->query("SELECT * FROM anggota_perpustakaan ORDER BY kode_anggota") or die(mysqli_error($conn));
$tampilNamaPetugas = $conn->query("SELECT * FROM petugas_perpustakaan ORDER BY kode_petugas") or die(mysqli_error($conn));
// $sql = $conn->query("SELECT * FROM buku INNER JOIN anggota_perpustakaan ON buku.kode_buku = anggota_perpustakaan.id_anggota") or die(mysqli_error($conn));




$tgl_pinjam = date('Y-m-d');
$tujuh_hari = mktime(0,0,0, date('n'), date('j') + 7, date('Y'));
$kembali = date('Y-m-d', $tujuh_hari);

if(isset($_POST['tambah'])) {
    
    
    $tgl_pinjam = htmlspecialchars($_POST['tgl_pinjam']);
    $tanggal_kembali = htmlspecialchars($_POST['tanggal_kembali']);

    // casting to date biar sesuai sama tipe data di database
    $date_tgl_pinjam = date('Y-m-d', strtotime($tgl_pinjam));
    $date_tanggal_kembali = date('Y-m-d', strtotime($tanggal_kembali));
    

    $nama_buku = $_POST['buku'];
    $viewB = explode(".", $nama_buku);
    $kode_buku = $viewB[0];
    $judul = $viewB[1];
    
    $nama_anggota = $_POST['nama'];
    $viewN = explode(".", $nama_anggota);
    $kode_anggota = $viewN[0];
    $nisn = $viewN[1];


    $kode_petugas = htmlspecialchars($_POST['petugas']);
    $int_kode_petugas = intval($kode_petugas); // casting kode_petugas to int biar sesuai sama tipe data di database
    

    if(empty($int_kode_petugas && $kode_anggota && $kode_buku)) {
        echo "<script>alert('Pastikan anda sudah mengisi semua formulir.');window.location='?p=transaksi&aksi=tambah';</script>";
    }


    $sql = $conn->query("SELECT * FROM buku WHERE judul_buku = '$judul'") or die(mysqli_error($conn));
    while($data = $sql->fetch_assoc()) {
        $sisa = $data['stok_tersedia'];

        if($sisa == 0) {
            echo "<script>alert('Stok Buku Habis, Transaksi, tidak dapat dilakukan, silahkan tambahkan stok buku dulu.');window.location='?p=transaksi&aksi=tambah';</script>";
        } else {
            $conn->query("INSERT INTO transaksi(kode_petugas, kode_buku, kode_anggota, nisn_anggota, tanggal_pinjam, tanggal_kembali, status_transaksi) VALUES('$int_kode_petugas', '$kode_buku', '$kode_anggota', '$nisn', '$date_tgl_pinjam', '$date_tanggal_kembali', 'pinjam')") or die(mysqli_error($conn));
            $conn->query("UPDATE buku SET stok_tersedia = (stok_tersedia-1) WHERE kode_buku = '$kode_buku'") or die(mysqli_error($conn));
            echo "<script>alert('Data transaksi berhasil ditambahkan.');window.location='?p=transaksi';</script>";
        }
    }
}


?>

<h1 class="mt-4">Tambah Data Transaksi</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
    <li class="breadcrumb-item active">tambah data transaksi</li>
</ol>
<div class="card-header mb-5">
	
	<form action="" method="post">
    <div class="form-group">
        <label class="small mb-1" for="nama_anggota">Nama Peminjam</label>
        <select name="nama" id="nama_anggota" class="form-control">
            <option value="">-- Pilih Anggota Peminjam --</option>
            <?php 
            while ($viewAnggota = $tampilNamaAnggota->fetch_assoc()) {
            echo "<option value='$viewAnggota[kode_anggota].$viewAnggota[nisn_anggota].$viewAnggota[nama_anggota]'>$viewAnggota[nisn].$viewAnggota[nama_anggota]</option>";
            }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label class="small mb-1" for="nama_buku">Buku</label>
        <select name="buku" id="nama_buku" class="form-control">
            <option value="">-- Pilih Buku --</option>
            <?php 
            while ($viewBuku = $tampilNamaBuku->fetch_assoc()) {
            echo "<option value='$viewBuku[kode_buku].$viewBuku[judul_buku]'>$viewBuku[judul_buku]</option>";
            
            }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label class="small mb-1" for="nama_petugas">Petugas yang Melayani</label>
        <select name="petugas" id="nama_petugas" class="form-control" readonly="">
            <?php
            echo "<option value='$kode_petugas'>$nama_petugas</option>"
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="tgl_pinjam">Tanggal Pinjam</label>
        <input type="text" name="tgl_pinjam" id="tgl_pinjam" class="form-control" readonly="" value="<?= $tgl_pinjam ?>">
    </div>
    <div class="form-group">
        <label for="tanggal_kembali">Tanggal Kembali</label>
        <input type="text" name="tanggal_kembali" id="tanggal_kembali" class="form-control" readonly="" value="<?= $kembali ?>">
    </div>
    <div class="form-group">
    	<button type="submit" class="btn btn-hijau" name="tambah">Tambah Data</button>
    </div>
	</form>
</div>