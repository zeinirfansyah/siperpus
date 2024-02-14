<?php 

    if(isset($_POST['tambah'])) {
        $judul_buku = htmlspecialchars($_POST['judul_buku']);
        $isbn = htmlspecialchars($_POST['isbn']);
        $pengarang_buku = htmlspecialchars($_POST['pengarang_buku']);
        $tahun_terbit = htmlspecialchars($_POST['tahun_terbit']);
        $jumlah_buku = htmlspecialchars($_POST['jumlah_buku']);
        $kategori_buku = htmlspecialchars($_POST['kategori_buku']);
        $penerbit_buku = htmlspecialchars($_POST['penerbit_buku']);
        $lokasi_buku = htmlspecialchars($_POST['lokasi_buku']);

        if(empty($judul_buku && $isbn && $pengarang_buku && $tahun_terbit && $jumlah_buku && $kategori_buku && $penerbit_buku && $lokasi_buku)) {
            echo "<script>alert('Pastikan anda sudah mengisi semua formulir.');window.location='?p=buku&aksi=tambah';</script>";
        } else {
            $sql = mysqli_query($conn, "INSERT INTO buku VALUES (null, '$judul_buku', '$isbn', '$pengarang_buku', '$tahun_terbit', '$jumlah_buku', '$jumlah_buku', '$kategori_buku', '$penerbit_buku', '$lokasi_buku')");
        
            if (!$sql) {
                if (mysqli_errno($conn) == 1062) {
                    echo "<script>alert('Data buku duplikat. Cek ISBN dan Judul yang anda inputkan')</script>";
                } else {
                    echo "<script>alert('Data gagal ditambahkan.')</script>";
                }
            } else {
                echo "<script>alert('Data berhasil ditambahkan.');window.location='?p=buku';</script>";
            }
        }

        

        // $sql = $conn->query("INSERT INTO buku VALUES (null, '$judul_buku', '$isbn', '$pengarang_buku', '$tahun_terbit', '$jumlah_buku', '$jumlah_buku', '$kategori_buku', '$penerbit_buku', '$lokasi_buku')") or die(mysqli_error($conn));
       
        // if($sql) {
        //     echo "<script>alert('Data Berhasil Ditambahkan.');window.location='?p=buku';</script>";
        // } else {
        //     echo "<script>alert('Data Gagal Ditambahkan.')</script>";
        // }
       
    }

?>

<h1 class="mt-4">Tambah Data Buku</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="?p=buku">Buku</a></li>
    <li class="breadcrumb-item active">tambah data buku</li>
</ol>
<div class="card-header mb-5">
	
	<form action="" method="post">
    <div class="form-group">
        <label class="small mb-1" for="judul_buku">Judul Buku</label>
        <input class="form-control" id="judul_buku" name="judul_buku" type="text" placeholder="Masukan judul buku"/>
    </div>
    <div class="form-group">
        <label class="small mb-1" for="isbn">ISBN</label>
        <input class="form-control" id="isbn" name="isbn" type="text" placeholder="Masukan isbn buku"/>
    </div>
    <div class="form-group">
        <label class="small mb-1" for="pengarang_buku">Pengarang</label>
        <input class="form-control" id="pengarang_buku" name="pengarang_buku" type="text" placeholder="Masukan pengarang buku"/>
    </div>
    <div class="form-group">
        <label class="small mb-1" for="tahun_terbit">Tahun Terbit</label>
        <select name="tahun_terbit" id="tahun_terbit" class="form-control">
        	<option value="">-- Pilih Tahun --</option>
        	<?php 
        	// menampilkan tahun terbit dari tahun 1991- hingga tahun sekarang
        	$tahun = date('Y');

        	for ($i = $tahun - 29; $i <= $tahun ; $i++) { ?>
        		<option value="<?= $i ?>"><?= $i ?></option>
        	<?php
        	}
        	?>
        </select>
    </div>
    <div class="form-group">
        <label class="small mb-1" for="jumlah_buku">Jumlah Buku</label>
        <input class="form-control" id="jumlah_buku" name="jumlah_buku" type="number" placeholder="Masukan jumlah buku"/>
    </div>
    <div class="form-group">
    	<label for="kategori_buku">Kategori Buku</label>
    	<select name="kategori_buku" id="kategori_buku" class="form-control">
    		<option value="">-- Pilih Kategori --</option>
    		<option value="Fiksi">Fiksi</option>
    		<option value="Non Fiksi">Non Fiksi</option>
    	</select>
    </div>
    <div class="form-group">
        <label class="small mb-1" for="penerbit_buku">Penerbit</label>
        <input class="form-control" id="penerbit_buku" name="penerbit_buku" type="text" placeholder="Masukan penerbit buku"/>
    </div>
    <div class="form-group">
    	<label for="lokasi_buku">Lokasi</label>
    	<select name="lokasi_buku" id="lokasi_buku" class="form-control">
    		<option value="">-- Pilih Rak --</option>
    		<option value="Rak 1">Rak 1</option>
    		<option value="Rak 2">Rak 2</option>
    		<option value="Rak 3">Rak 3</option>
    	</select>
    </div>
    <div class="form-group">
    	<button type="submit" class="btn btn-hijau" name="tambah">Tambah Data</button>
    </div>
	</form>
</div>