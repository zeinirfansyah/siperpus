<?php 
$kode_anggota = $_GET['kode_anggota'];



// $query_delete = $conn->query("DELETE FROM anggota_perpustakaan WHERE kode_anggota = $kode_anggota") or die(mysqli_error($conn));
// echo "<script>alert('Data Berhasil Dihapus.');window.location='?p=anggota';</script>";

// cek apakah kode anggota sudah pernah melakukan transaksi
$cekAnggota_diTransaksi = $conn->query("SELECT * FROM transaksi WHERE kode_anggota = $kode_anggota") or die(mysqli_error($conn));

// jika anggota ada di tabel transaksi maka tidak bisa dihapus
// jika tidak ada di tabel transaksi maka bisa dihapus
// if (mysqli_num_rows($cekAnggota_diTransaksi) > 0) {
//     echo "<script>alert('Data tidak bisa dihapus karena sudah pernah melakukan transaksi.');window.location='?p=anggota';</script>";
// } else {
//     $conn->query("DELETE FROM anggota_perpustakaan WHERE kode_anggota = $kode_anggota") or die(mysqli_error($conn));
//     echo "<script>alert('Data Berhasil Dihapus.');window.location='?p=anggota';</script>";
// }

$conn->query("DELETE FROM anggota_perpustakaan WHERE kode_anggota = $kode_anggota") or die(mysqli_error($conn));
echo "<script>alert('Data Berhasil Dihapus.');window.location='?p=anggota';</script>";

?>