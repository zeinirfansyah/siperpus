<?php 
$kode_buku = $_GET['kode_buku'];

$conn->query("DELETE FROM buku WHERE kode_buku = $kode_buku") or die(mysqli_error($conn));
echo "<script>alert('Data Berhasil Dihapus.');window.location='?p=buku';</script>";



// // cek apakah kode buku sudah pernah melakukan transaksi
// $cekbuku_diTransaksi = $conn->query("SELECT * FROM transaksi WHERE kode_buku = $kode_buku") or die(mysqli_error($conn));

// // jika buku ada di tabel transaksi maka tidak bisa dihapus
// // jika tidak ada di tabel transaksi maka bisa dihapus
// if (mysqli_num_rows($cekbuku_diTransaksi) > 0) {
//     echo "<script>alert('Data tidak bisa dihapus karena sudah pernah melakukan peminjaman/pengembalian.');window.location='?p=buku';</script>";
// } else {
//     $conn->query("DELETE FROM buku WHERE kode_buku = $kode_buku") or die(mysqli_error($conn));
//     echo "<script>alert('Data Berhasil Dihapus.');window.location='?p=buku';</script>";
// }

?>