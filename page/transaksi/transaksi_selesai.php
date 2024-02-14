<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'function.php';


// hitung record peminjaman
$data_pinjam = mysqli_query($conn, "SELECT * FROM transaksi WHERE status_transaksi = 'pinjam'");
$jumlah_sedang_pinjam = mysqli_num_rows($data_pinjam);

// hitung record pengembalian
$data_kembali = mysqli_query($conn, "SELECT * FROM transaksi WHERE status_transaksi = 'kembali'");
$jumlah_sudah_kembali = mysqli_num_rows($data_kembali);

// hitung record transaksi hari ini
$data_transaksi_hari_ini = mysqli_query($conn, "SELECT * FROM transaksi WHERE tanggal_pinjam = CURDATE() or tanggal_kembali = CURDATE()");
$jumlah_transaksi_hari_ini = mysqli_num_rows($data_transaksi_hari_ini);

// hitung record peminjaman hari ini
$data_peminjaman_hari_ini = mysqli_query($conn, "SELECT * FROM transaksi WHERE status_transaksi = 'pinjam' and tanggal_pinjam = CURDATE()");
$jumlah_pinjam_hari_ini = mysqli_num_rows($data_peminjaman_hari_ini);

// hitung record pengembalian hari ini
$data_kembali_hari_ini = mysqli_query($conn, "SELECT * FROM transaksi WHERE status_transaksi = 'kembali' and tanggal_kembali = CURDATE()");
$jumlah_kembali_hari_ini = mysqli_num_rows($data_kembali_hari_ini);
?>
<div class="row">
    <div class="col">
        <h1 class="mt-4">Data Transaksi</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="dashboard.php?p=transaksi_selesai">Transaksi Selesai</a></li>
            <li class="breadcrumb-item active">data transaksi</li>
        </ol>
    </div>
    <div class="col-2 mt-5">
        <a target="_blank" href="?p=transaksi&aksi=laporan" class="btn btn-print mb-3">Print Transaksi</a>
    </div>
</div>
<div class="row mb-3">
    <div class="col">
        <!-- card -->
        <div class="card card-info">
            <div class="card-body">
                <div class="row">
                    <div class="col-7">
                        <h5 class="card-title">Pinjaman Berjalan</h5>
                        <p class="card-text m-0">Total Peminjaman: <?= $jumlah_sedang_pinjam ?></p>
                    </div>
                    <div class="col">
                        <img src="../../img/illustration/img1.svg" alt="">
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
                    <div class="col-7">
                        <h5 class="card-title">Pinjaman Selesai</h5>
                        <p class="card-text m-0">Total Pengembalian: <?= $jumlah_sudah_kembali ?></p>
                    </div>
                    <div class="col">
                        <img src="../../img/illustration/img2.svg" alt="">
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
                        <h5 class="card-title">Transaksi Hari Ini</h5>
                        <p class="card-text m-0">Peminjaman: <?= $jumlah_pinjam_hari_ini ?></p>
                        <p class="card-text m-0">Pengembalian: <?= $jumlah_kembali_hari_ini ?></p>
                    </div>
                    <div class="col">
                        <img src="../../img/illustration/img3.svg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        Data Transaksi
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Transaksi</th>
                        <th>Nama Peminjam</th>
                        <th>Buku Dipinjam</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $halaman = 5;
                    $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
                    $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
                    $result = mysqli_query($conn, "SELECT * FROM transaksi JOIN buku
                                                    ON transaksi.kode_buku = buku.kode_buku JOIN anggota_perpustakaan 
                                                    ON transaksi.kode_anggota = anggota_perpustakaan.kode_anggota JOIN petugas_perpustakaan
                                                    ON transaksi.kode_petugas = petugas_perpustakaan.kode_petugas WHERE status_transaksi = 'kembali'");
                    $total = mysqli_num_rows($result);
                    $pages = ceil($total/$halaman);
                    $query = mysqli_query($conn, "SELECT * FROM transaksi JOIN buku
                    ON transaksi.kode_buku = buku.kode_buku JOIN anggota_perpustakaan 
                    ON transaksi.kode_anggota = anggota_perpustakaan.kode_anggota JOIN petugas_perpustakaan
                    ON transaksi.kode_petugas = petugas_perpustakaan.kode_petugas WHERE status_transaksi = 'kembali'
                    order by kode_transaksi desc LIMIT $mulai, $halaman" ) or die(mysql_error);
                    $no = $mulai+1;

                    // $no = 1;
                    while ($view_data = $query->fetch_assoc()) {
                    ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $view_data['kode_transaksi'] ?></td>
                        <td><?= $view_data['nama_anggota']; ?></td>
                        <td><?= $view_data['judul_buku']; ?></td>
                        <td><?= $view_data['tanggal_pinjam']; ?></td>
                        <td><?= $view_data['tanggal_kembali']; ?></td>
                        <td><?= $view_data['status_transaksi']; ?></td>
                        <td>
                        <a href="?p=transaksi_selesai&aksi=hapus&kode_transaksi=<?= $view_data['kode_transaksi']; ?>" class="btn btn-merah btn-sm" onclick="return confirm('Yakin ?')">Hapus</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <div class="pagging">
                <?php for ($i=1; $i <= $pages; $i++) { ?>
                <a href="?p=transaksi_selesai&halaman=<?php echo $i; ?>"><?php echo $i; ?></a>
                <?php }?>
            </div >
            <div class="indikator-halaman">
                Halaman : <?php echo $page."/".$pages; ?>
            </div>
        </div>
    </div>
</div>