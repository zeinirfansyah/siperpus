<?php 

// menangkap kode_buku di url
$kode_buku = $_GET['kode_buku'];

// menampilkan data db sesuai kode_buku
$sql = $conn->query("SELECT * FROM buku WHERE kode_buku = $kode_buku") or die(mysqli_error($conn));
$view_buku = $sql->fetch_assoc();

$tahun = $view_buku['tahun_terbit'];
$stok_tersedia = $view_buku['stok_tersedia'];


if(isset($_POST['ubah'])) {
	$judul_buku = htmlspecialchars($_POST['judul_buku']);
    $isbn = htmlspecialchars($_POST['isbn']);
    $pengarang_buku = htmlspecialchars($_POST['pengarang_buku']);
    $tahun_terbit = htmlspecialchars($_POST['tahun_terbit']);
    $jumlah_buku = htmlspecialchars($_POST['jumlah_buku']);
    $kategori_buku = htmlspecialchars($_POST['kategori_buku']);
    $penerbit_buku = htmlspecialchars($_POST['penerbit_buku']);
    $lokasi_buku = htmlspecialchars($_POST['lokasi_buku']);

    // hitung selisih data buku setelah diubah dan sebelum 
    $selisih_buku = $jumlah_buku - $view_buku['jumlah_buku'];

    $stok_buku = $stok_tersedia + $selisih_buku;

    if(empty($judul_buku && $isbn && $pengarang_buku && $tahun_terbit && $jumlah_buku && $kategori_buku && $penerbit_buku && $lokasi_buku)) {
        echo "<script>alert('Pastikan anda sudah mengisi semua formulir.');</script>";
        echo "<script>window.location='?p=buku&aksi=ubah&kode_buku=$kode_buku';</script>";
    } else {
        $sql = $conn->query("UPDATE buku SET judul_buku = '$judul_buku', isbn = '$isbn', pengarang_buku = '$pengarang_buku', tahun_terbit = '$tahun_terbit', jumlah_buku = '$jumlah_buku', stok_tersedia = '$stok_buku', kategori_buku = '$kategori_buku', penerbit_buku = '$penerbit_buku', lokasi_buku = '$lokasi_buku' WHERE kode_buku = '$kode_buku'");
        if ($view_buku['isbn'] == $isbn) { 
            if (!$sql) {
                if (mysqli_errno($conn) == 1062) {
                    echo "<script>alert('Data buku duplikat. Cek ISBN dan judul yang anda inputkan')</script>";
                } else {
                    echo "<script>alert('Data gagal diubah.')</script>";
                }
            } else {
                echo "<script>alert('Data berhasil diubah.');window.location='?p=buku';</script>";
            }
        } else {
            if (!$sql) {
                if (mysqli_errno($conn) == 1062) {
                    echo "<script>alert('Data buku duplikat. Cek ISBN dan judul yang anda inputkan')</script>";
                } else {
                    echo "<script>alert('Data gagal diubah.')</script>";
                }
            } else {
                echo "<script>alert('Data berhasil diubah.');window.location='?p=buku';</script>";
            }
        }
        
        // $sql = $conn->query("UPDATE buku SET judul_buku = '$judul_buku', isbn = '$isbn', pengarang_buku = '$pengarang_buku', tahun_terbit = '$tahun_terbit', jumlah_buku = '$jumlah_buku', stok_tersedia = '$stok_buku', kategori_buku = '$kategori_buku', penerbit_buku = '$penerbit_buku', lokasi_buku = '$lokasi_buku' WHERE kode_buku = '$kode_buku'") or die(mysqli_error($conn));
        // if($sql) {
        //     if ($jumlah_buku < $stok_buku) {
        //         $conn->query("UPDATE buku SET stok_tersedia = '$jumlah_buku' WHERE kode_buku = '$kode_buku'") or die(mysqli_error($conn));
        //     }
        //     echo "<script>alert('Data Berhasil Diubah.');window.location='?p=buku';</script>";
        // } else {
        //     echo "<script>alert('Data Gagal Diubah.');window.location='?p=buku';</script>";
        // }
    }
	
}

?>

<h1 class="mt-4">Ubah Data Buku</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="?p=buku">Buku</a></li>
    <li class="breadcrumb-item active">ubah data buku</li>
</ol>
<div class="card-header mb-5">
	
<form action="" method="post">
    <div class="form-group">
        <label class="small mb-1" for="judul_buku">Judul Buku</label>
        <input class="form-control" id="judul_buku" name="judul_buku" type="text" placeholder="Masukan judul buku" value="<?= $view_buku['judul_buku']; ?>" required/>
    </div>
    <div class="form-group">
        <label class="small mb-1" for="isbn">ISBN</label>
        <input class="form-control" id="isbn" name="isbn" type="text" placeholder="Masukan isbn buku" value="<?= $view_buku['isbn']; ?>" required/>
    </div>
    <div class="form-group">
        <label class="small mb-1" for="pengarang_buku">Pengarang</label>
        <input class="form-control" id="pengarang_buku" name="pengarang_buku" type="text" placeholder="Masukan pengarang buku" value="<?= $view_buku['pengarang_buku']; ?>" required/>
    </div>
    <div class="form-group">
        <label class="small mb-1" for="tahun_terbit">Tahun Terbit</label>
        <select name="tahun_terbit" id="tahun_terbit" class="form-control">
        	<option value="">-- Pilih Tahun --</option>
        	<?php 
        	// menampilkan tahun terbit dari tahun 1991- hingga tahun sekarang
        	$tahun = date('Y');

        	for ($i = $tahun - 29; $i <= $tahun ; $i++) { ?>
        		<option value="<?= $i ?>" <?php if($view_buku['tahun_terbit'] == $i){echo "selected";} ?> ><?= $i ?></option>
        	<?php
        	}
        	?>
        </select>
    </div>
    <div class="form-group">
        <label class="small mb-1" for="jumlah_buku">Jumlah Buku</label>
        <input type="number" class="form-control" id="jumlah_buku" name="jumlah_buku" type="number" placeholder="Masukan jumlah buku" value="<?= $view_buku['jumlah_buku']; ?>" required/>
    </div>
    <!-- kategori buku -->
    <div class="form-group">
    	<label for="kategori_buku">Kategori Buku</label>
    	<select name="kategori_buku" id="kategori_buku" class="form-control" required>
    		<option value="">-- Pilih Kategori --</option>
    		<option value="Fiksi" <?php if($view_buku['kategori_buku'] == 'Fiksi'){echo "selected";} ?> >Fiksi</option>
    		<option value="Non Fiksi" <?php if($view_buku['kategori_buku'] == 'Non Fiksi'){echo "selected";} ?> >Non Fiksi</option>
        </select>            
        </div>
    <div class="form-group">
        <label class="small mb-1" for="penerbit_buku">Penerbit</label>
        <input class="form-control" id="penerbit_buku" name="penerbit_buku" type="text" placeholder="Masukan penerbit buku"  value="<?= $view_buku['penerbit_buku']; ?>" required/>
    </div>
    <div class="form-group">
    	<label for="lokasi_buku">Lokasi</label>
    	<select name="lokasi_buku" id="lokasi_buku" class="form-control" required>
    		<option value="">-- Pilih Rak --</option>
    		<option value="Rak 1" <?php if($view_buku['lokasi_buku'] == 'Rak 1'){echo "selected";} ?> >Rak 1</option>
    		<option value="Rak 2" <?php if($view_buku['lokasi_buku'] == 'Rak 2'){echo "selected";} ?> >Rak 2</option>
    		<option value="Rak 3" <?php if($view_buku['lokasi_buku'] == 'Rak 3'){echo "selected";} ?> >Rak 3</option>
    	</select>
    </div>
    <div class="form-group">
    	<button type="submit" class="btn btn-hijau" name="ubah">Ubah Data</button>
    </div>
	</form>
</div>