<?php 

error_reporting(E_ALL);
ini_set('display_errors', 1);

$kode_transaksi = $_GET['kode_transaksi'];



$conn->query("DELETE FROM transaksi WHERE kode_transaksi = $kode_transaksi") or die(mysqli_error($conn));
echo "<script>alert('Data Berhasil Dihapus.');window.location='?p=transaksi_selesai';</script>";

