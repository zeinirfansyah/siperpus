<?php 

error_reporting(E_ALL);
ini_set('display_errors', 1);

$kode_transaksi = $_GET['kode_transaksi'];
$id_judul_buku = $_GET['judul_buku'];



$conn->query("UPDATE transaksi SET tanggal_kembali = now(), status_transaksi = 'kembali' WHERE kode_transaksi = $kode_transaksi") or die(mysqli_error($conn));

$conn->query("UPDATE buku SET stok_tersedia = (stok_tersedia+1) WHERE judul_buku = '$id_judul_buku'") or die(mysqli_error($conn));


	echo "<script>alert('Proses, kembalian buku berhasil.');window.location='?p=transaksi';</script>";

?>