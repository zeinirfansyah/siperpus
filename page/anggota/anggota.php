<?php 

// jumlah record anggota
$data_anggota = mysqli_query($conn, "SELECT * FROM anggota_perpustakaan");
$jumlah_anggota = mysqli_num_rows($data_anggota);

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
    <h1 class="mt-4">Data Anggota</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="dashboard.php?p=anggota">Anggota</a> / </li>
    </ol>
    <div class="row mb-3">
        <div class="col-4">
            <div class="card card-info">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title">Anggota</h5>
                            <p class="card-text">Jumlah Anggota : <?php echo $jumlah_anggota; ?></p>  
                        </div>
                        <div class="col">
                            <img src="../../img/illustration/img7.svg" alt="" srcset="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a href="?p=anggota&aksi=tambah" class="btn btn-hijau mb-3">Tambah Anggota</a>
        </div>
    </div>
    <div class="card card-table mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size: 14px;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nomor Induk</th>
                            <th>Nama Anggota</th>
                            <th>Alamat</th>
                            <th>Nomor Telepon</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $halaman = 5;
                        $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
                        $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
                        $result = mysqli_query($conn, "SELECT * FROM anggota_perpustakaan");
                        $total = mysqli_num_rows($result);
                        $pages = ceil($total/$halaman);
                        $query = mysqli_query($conn, "SELECT * FROM anggota_perpustakaan order by kode_anggota desc LIMIT $mulai, $halaman") or die(mysql_error);
                        $no = $mulai+1;
            
                        // $no = 1;
                        while ($view_anggota = $query->fetch_assoc()) {
                        ?>

                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $view_anggota['nisn_anggota']; ?></td>
                            <td><?= $view_anggota['nama_anggota']; ?></td>
                            <td><?= $view_anggota['alamat_anggota']; ?></td>
                            <td><?= $view_anggota['no_hp_anggota']; ?></td>
                            <td><?= $view_anggota['email_anggota']; ?></td>
                            <td>
                                <a href="?p=anggota&aksi=ubah&kode_anggota=<?= $view_anggota['kode_anggota']; ?>" class="btn btn-hijau btn-sm">Ubah</a>
                                <a href="?p=anggota&aksi=hapus&kode_anggota=<?= $view_anggota['kode_anggota']; ?>" class="btn btn-merah btn-sm" onclick="return confirm('Yakin ?')">Hapus</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <div class="pagging">
                    <?php for ($i=1; $i <= $pages; $i++) { ?>
                    <a href="?p=anggota&halaman=<?php echo $i; ?>"><?php echo $i; ?></a>
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