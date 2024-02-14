<?php 
 
// sum total buku
$hitung_buku = mysqli_query($conn, "SELECT SUM(jumlah_buku) AS jumlah_buku FROM buku");
$row_hitung_buku = mysqli_fetch_assoc($hitung_buku);
$total_buku = $row_hitung_buku['jumlah_buku'];

// hitung record buku
$data_buku = mysqli_query($conn, "SELECT * FROM buku");
$jumlah_row_buku = mysqli_num_rows($data_buku);

// menghitung stok tersedia 
$hitung_stok_tersedia = mysqli_query($conn, "SELECT SUM(stok_tersedia) AS stok_tersedia FROM buku");
$row_hitung_buku_tersedia = mysqli_fetch_assoc($hitung_stok_tersedia);
$total_stok_tersedia = $row_hitung_buku_tersedia['stok_tersedia'];

// menghitung buku dipinjam
$total_buku_dipinjam = $total_buku - $total_stok_tersedia;


// menghitung buku berkategori fiksi
$data_buku_fiksi = mysqli_query($conn, "SELECT * FROM buku where kategori_buku = 'Fiksi'");
$jumlah_buku_fiksi = mysqli_num_rows($data_buku_fiksi);

// menghitung buku berkategori non fiksi
$data_buku_non_fiksi = mysqli_query($conn, "SELECT * FROM buku where kategori_buku = 'Non Fiksi'");
$jumlah_buku_non_fiksi = mysqli_num_rows($data_buku_non_fiksi);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Buku</title>

    <link rel="stylesheet" href="../../css/style.css">

</head>
<body>
    <h1 class="mt-4">Data Buku</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="dashboard.php?p=buku">Buku</a> / </li>
    </ol>
    <div class="row mb-3">
        <div class="col">
            <!-- card -->
            <div class="card card-info">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title">Buku</h5>
                            <p class="card-text m-0">Jumlah Buku: <?= $jumlah_row_buku ?></p>
                            <p class="card-text">Total Buku: <?= $total_buku; ?></p>
                        </div>
                        <div class="col">
                            <img src="../../img/illustration/img4.svg" alt="" srcset="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <!-- card -->
            <div class="card card-info">
                <div class="card-body">
                <div class="row">
                        <div class="col">
                            <h5 class="card-title">Buku Tersedia</h5>
                            <p class="card-text m-0">Stok Tersedia: <?= $total_stok_tersedia; ?></p>
                            <p class="card-text">Buku Dipinjam: <?= $total_buku_dipinjam; ?></p>
                        </div>
                        <div class="col">
                            <img src="../../img/illustration/img3.svg" alt="" srcset="">
                        </div>
                </div>
                </div>
            </div>
        </div>
        <div class="col">
            <!-- card -->
            <div class="card card-info">
                <div class="card-body">
                    <div class="row">
                    <div class="col">
                        <h5 class="card-title">Kategori</h5>
                        <p class="card-text m-0">Jumlah Fiksi: <?= $jumlah_buku_fiksi; ?></p>
                        <p class="card-text">Jumlah Non-Fiksi: <?= $jumlah_buku_non_fiksi; ?></p>    
                    </div>
                    <div class="col-6">
                            <img src="../../img/illustration/img5.svg" alt="" srcset="">
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <a href="?p=buku&aksi=tambah" class="btn btn-hijau mb-3">Tambah Buku</a>
    </div>
    </div>
    <div class="card card-table mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size: 14px;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kategori</th>
                            <th>Judul</th>
                            <th>Pengarang</th>
                            <th>Penerbit</th>
                            <th>Tahun</th>
                            <th>ISBN</th>
                            <th>Jumlah</th>
                            <th>Stok</th>
                            <th>Rak</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $halaman = 5;
                        $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
                        $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
                        $result = mysqli_query($conn, "SELECT * FROM buku");
                        $total = mysqli_num_rows($result);
                        $pages = ceil($total/$halaman);
                        $query = mysqli_query($conn, "SELECT * FROM buku order by kode_buku desc LIMIT $mulai, $halaman" ) or die(mysql_error);
                        $no = $mulai+1;
            
                        // $no = 1;
                        while ($view_buku = $query->fetch_assoc()) {
                        ?>

                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $view_buku['kategori_buku']; ?></td>
                            <td><?= $view_buku['judul_buku']; ?></td>
                            <td><?= $view_buku['pengarang_buku']; ?></td>
                            <td><?= $view_buku['penerbit_buku']; ?></td>
                            <td><?= $view_buku['tahun_terbit']; ?></td>
                            <td><?= $view_buku['isbn']; ?></td>
                            <td><?= $view_buku['jumlah_buku']; ?></td>
                            <td><?= $view_buku['stok_tersedia']; ?></td>
                            <td><?= $view_buku['lokasi_buku']; ?></td>
                            
                            <td>
                                <a href="?p=buku&aksi=ubah&kode_buku=<?= $view_buku['kode_buku']; ?>" class="btn btn-hijau btn-sm">Ubah</a>
                                <a href="?p=buku&aksi=hapus&kode_buku=<?= $view_buku['kode_buku']; ?>" class="btn btn-merah btn-sm" onclick="return confirm('Yakin ?')">Hapus</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <div class="pagging">
                    <?php for ($i=1; $i <= $pages; $i++) { ?>
                    <a href="?p=buku&halaman=<?php echo $i; ?>"><?php echo $i; ?></a>
                    <?php }?>
                </div >
                <div class="indikator-halaman">
                    Halaman : <?php echo $page."/".$pages; ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>