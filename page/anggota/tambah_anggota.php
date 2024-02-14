<?php 
if(isset($_POST['tambah'])) {
	$nisn_anggota = htmlspecialchars($_POST['nisn_anggota']);
	$nama_anggota = htmlspecialchars($_POST['nama_anggota']);
	$alamat_anggota = htmlspecialchars($_POST['alamat_anggota']);
	$no_hp_anggota = htmlspecialchars($_POST['no_hp_anggota']);
	$email_anggota = htmlspecialchars($_POST['email_anggota']);

    if(empty($nisn_anggota && $nama_anggota && $alamat_anggota && $no_hp_anggota && $email_anggota)) {
        echo "<script>alert('Pastikan anda sudah mengisi semua formulir.');window.location='?p=anggota&aksi=tambah';</script>";
    } else {
        $sql = mysqli_query($conn, "INSERT INTO anggota_perpustakaan VALUES (null, '$nisn_anggota', '$nama_anggota', '$alamat_anggota', '$no_hp_anggota', '$email_anggota')");
        if (!$sql) {
            if (mysqli_errno($conn) == 1062) {
                echo "<script>alert('Data anggota duplikat. Cek NISN yang anda inputkan')</script>";
            } else {
                echo "<script>alert('Data gagal ditambahkan.')</script>";
            }
        } else {
            echo "<script>alert('Data berhasil ditambahkan.');window.location='?p=anggota';</script>";
        }
    }

    

    // } else {
    //     $sql = $conn->query("INSERT INTO anggota_perpustakaan VALUES (null, '$nisn_anggota', '$nama_anggota', '$alamat_anggota', '$no_hp_anggota', '$email_anggota')") or die(mysqli_error($conn));
    //     if($sql) {
    //         echo "<script>alert('Data Berhasil Ditambahkan.');window.location='?p=anggota';</script>";
    //     } else {
    //         echo "<script>alert('Data Gagal Ditambahkan.')</script>";
    //     }  
    // }

	
}

?>

<h1 class="mt-4">Tambah Data Anggota</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="?p=anggota">Anggota</a></li>
    <li class="breadcrumb-item active">tambah data anggota</li>
</ol>
<div class="card-header mb-5">
	
	<form action="" method="post">
    <div class="form-group">
        <label class="small mb-1" for="nisn_anggota">nisn_anggota</label>
        <input class="form-control" id="nisn_anggota" name="nisn_anggota" type="number" placeholder="Masukan nomor induk anggota" require/>
    </div>
    <div class="form-group">
        <label class="small mb-1" for="nama_anggota">Nama Anggota</label>
        <input class="form-control" id="nama_anggota" name="nama_anggota" type="text" placeholder="Masukan nama anggota" require/>
    </div>
    <div class="form-group">
        <label class="small mb-1" for="alamat_anggota">Alamat Anggota</label>
        <input class="form-control" id="alamat_anggota" name="alamat_anggota" type="text" placeholder="Masukan alamat anggota" require/>
    </div>
    <div class="form-group">
        <label class="small mb-1" for="no_hp_anggota">Nomor Telepon Anggota</label>
        <input class="form-control" id="no_hp_anggota" name="no_hp_anggota" type="number" placeholder="Masukan nomor telepon anggota" require/>
    </div>
    <div class="form-group">
        <label class="small mb-1" for="email_anggota">Nomor Email Anggota</label>
        <input class="form-control" id="email_anggota" name="email_anggota" type="email" placeholder="Masukan email anggota" require/>
    </div>
    <div class="form-group">
    	<button type="submit" class="btn btn-hijau" name="tambah">Tambah Data</button>
    </div>
	</form>
</div>