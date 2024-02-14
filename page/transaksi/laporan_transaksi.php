<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once '././config.php';
require_once '././library/vendor/autoload.php';
use Mpdf\Mpdf;

$semua_transaksi = [];
$data = mysqli_query($conn, "SELECT * FROM transaksi JOIN buku
                            ON transaksi.kode_buku = buku.kode_buku JOIN anggota_perpustakaan 
                            ON transaksi.kode_anggota = anggota_perpustakaan.kode_anggota JOIN petugas_perpustakaan
                            ON transaksi.kode_petugas = petugas_perpustakaan.kode_petugas");

while ($data_trans = $data->fetch_assoc()) {
    $semua_transaksi[] = $data_trans;
}


$html = 
'<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Export to PDF Transaksi</title>
    <style type="text/css">
        body {
            font-family: sans-serif;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        table th, table td {
            border: 1px solid #3c3c3c;
            padding: 3px 8px;
        }
        h2 {
            text-align: center;
        }
        hr {
            margin-bottom: 50px
        }
    </style>
</head>
<body>
<h2>Laporan Anggota</h2>
<hr>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
    <th>No</th>
    <th>Kode Transaksi</th>
    <th>Buku</th>
    <th>nama Peminjam</th>
    <th>Tanggal Pinjam</th>
    <th>Tanggal Kembali</th>
    <th>Status</th>
    </tr>';
    $no = 1;
    foreach($semua_transaksi as $key => $value) {
        $html .= '
                            <tr>
                                <td>'. $no++ .'</td>
                                <td>'. $value["kode_transaksi"] .'</td>
                                <td>'. $value["judul_buku"] .'</td>
                                <td>'. $value["nama_anggota"] .'</td>
                                <td>'. $value["tanggal_pinjam"] .'</td>
                                <td>'. $value["tanggal_kembali"] .'</td>
                                <td>'. $value["status_transaksi"] .'</td>
                            </tr>

                    ';
    }
$html .= '
</table>
</body>
</html>';

$mpdf = new \Mpdf\Mpdf();
	$mpdf->AddPage("P","","","","","15","15","15","15","","","","","","","","","","","","A4");
	$mpdf->WriteHTML($html);

$mpdf->Output();