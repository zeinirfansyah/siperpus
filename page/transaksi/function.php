<?php 

error_reporting(E_ALL);
ini_set('display_errors', 1);
// Function terlambat
function terlambat($tanggal_dateline, $tanggal_kembali) {
	$tanggal_dateline_view = explode('-', $tanggal_dateline);
	$tanggal_dateline_view = $tanggal_dateline_view[2].'-'.$tanggal_dateline_view[1].'-'.$tanggal_dateline_view[0];

	$tanggal_kembali_view = explode('-', $tanggal_kembali);
	$tanggal_kembali_view = $tanggal_kembali_view[2].'-'.$tanggal_kembali_view[1].'-'.$tanggal_kembali_view[0];

	$selisih = strtotime($tanggal_kembali_view) - strtotime($tanggal_dateline_view);

	$selisih = $selisih/86400;
	if ($selisih >= 1) {
		$hasil_tanggal = floor($selisih);
	}else{
		$hasil_tanggal = 0;
	}
	return $hasil_tanggal;
}


?>