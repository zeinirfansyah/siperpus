<?php 
session_start();
require 'config.php';

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


$page = @$_GET['p'];
$aksi = @$_GET['aksi'];

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>
         <?php
            if($page == 'buku') {
                if($aksi == 'tambah') {
                    echo "Tambah Buku";
                } else if($aksi == 'ubah') {
                    echo "Ubah Buku";
                } else {
                    echo "Halaman Buku";
                }
                
            } else if($page == 'anggota') {
                if($aksi == 'tambah') {
                    echo "Tambah Anggota";
                } else if($aksi == 'ubah') {
                    echo "Ubah Anggota";
                } else {
                    echo "Halaman Anggota";
                }
            } else if($page == 'transaksi') {
                if($aksi == 'tambah') {
                    echo "Tambah Transaksi";
                } else {
                    echo "Halaman Transaksi";
                }
            } else if ($page == 'transaksi_selesai') {
                echo "Halaman Transaksi Selesai";
            } else if ($page == 'about') {
                echo "About SMK Negeri 0 Tasikmalaya";
            } else {
                echo "Dashboard";
            }
        ?>
    </title>

    <link rel="stylesheet" href="css/style.css">
  </head>
    <body>
    <div class="wrapper">
        <div class="sidebar">
                <div class="profile">
                    <h4>Selamat Datang</h4>
                    <h5><?= $nama_petugas ?></h5>
                </div>
                <hr>
                <ul>
                <li>
                    <a href="?p=about">
                        <span>About SMK Negeri 0 Tasikmalaya</span>
                    </a>
                </li>
                <li>
                    <a href="?p=buku">
                        <span>Data Buku</span>
                    </a>
                </li>
                <li>
                    <a href="?p=anggota">
                        <span>Data Anggota</span>
                    </a>
                </li>
                <li>
                    <a href="?p=transaksi">
                        <span>Transaksi</span>
                    </a>
                </li>
                <li>
                    <a href="?p=transaksi_selesai">
                        <span>Transaksi Selesai</span>
                    </a>
                </li>
                <li class="logout_item">
                    <a href="?p=profile">Profile</a>
                    <a href="logout.php">
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
           </div>
        </div>
        <div class="sidecontent">
            <main>
                <div class="container">
                <?php 

                if($page == 'buku') {
                    if($aksi == '') {
                        require_once 'page/buku/buku.php';
                    } else if($aksi == 'tambah') {
                        require_once 'page/buku/tambah_buku.php';
                    } else if($aksi == 'ubah') {
                        require_once 'page/buku/edit_buku.php';
                    } else if($aksi == 'hapus') {
                        require_once 'page/buku/hapus_buku.php';
                    }
                } else if($page == 'anggota') {
                    if($aksi == '') {
                        require_once 'page/anggota/anggota.php';
                    } else if($aksi == 'tambah') {
                        require_once 'page/anggota/tambah_anggota.php';
                    } else if($aksi == 'ubah') {
                        require_once 'page/anggota/edit_anggota.php';
                    } else if($aksi == 'hapus') {
                        require_once 'page/anggota/hapus_anggota.php';
                    }
                } else if($page == 'transaksi') {
                    if($aksi == '') {
                        require_once 'page/transaksi/transaksi.php';
                    } else if($aksi == 'tambah') {
                        require_once 'page/transaksi/tambah_transaksi.php';
                    } else if($aksi == 'kembali') {
                        require_once 'page/transaksi/kembali.php';
                    } else if($aksi == 'perpanjang') {
                        require_once 'page/transaksi/perpanjang.php';
                    } else if($aksi == 'laporan') {
                        require_once 'page/transaksi/laporan_transaksi.php';
                    }
                } else if ($page == 'transaksi_selesai') {
                    if($aksi == '') {
                        require_once 'page/transaksi/transaksi_selesai.php';
                    } else if($aksi == 'hapus') {
                        require_once 'page/transaksi/hapus_transaksi_selesai.php';
                    }
                } else if($page == 'about') {
                    require_once 'page/about/tentang_abroor.php';
                } else if($page == 'profile') {
                    if ($aksi == '') {
                        require_once 'page/petugas/profile_petugas.php';
                    } else if ($aksi == 'ubah') {
                        require_once 'page/petugas/edit_petugas.php';
                    }
                } else { 
                    require_once 'page/about/tentang_abroor.php';
                }
            ?>
                    
                </div>
            </main>
        </div>
    </div>
   

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>
