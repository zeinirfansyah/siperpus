<?php 

error_reporting(E_ALL);
ini_set('display_errors', 1);

$kode_transaksi = $_GET['kode_transaksi'];
$id_judul = $_GET['judul_buku'];
$id_tanggal_kembali = $_GET['tanggal_kembali'];
$lambat = $_GET['lambat'];

// jika buku yang di pinjam tidak di kembalikan, lewat dari 7 hari (terlambat) tidak bisa meminjam buku lagi, sehingga kembalikan bukunya dulu.
if($lambat > 3) {
	echo "<script>alert('Pinjam buku tidak dapat di perpanjang, karena lebih dari 7 hari... kembalikan bukunya terlebih dahulu, lalu pinjam lagi.');window.location='?p=transaksi';</script>";
} else {
	$view_tanggal_kembali = explode('-', $id_tanggal_kembali);
	$next7Hari = mktime(0,0,0, $view_tanggal_kembali[1], $view_tanggal_kembali[2]  + 7, $view_tanggal_kembali[0]); // mktime(hour, minute, second, month, day, year)
	$hari_next = date('Y-m-d', $next7Hari);

	$sql = $conn->query("UPDATE transaksi SET tanggal_kembali = '$hari_next' WHERE kode_transaksi = $kode_transaksi") or die(mysqli_error($conn));

	if($sql) {
		echo "<script>alert('Perpanjang jangka waktu buku berhasil.');window.location='?p=transaksi';</script>";
	} else {
		echo "<script>alert('Perpanjang gagal.');window.location='?p=transaksi';</script>";
	}
}

?>