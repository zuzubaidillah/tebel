<?php
function tgl_indonesia($tgl){
    $tanggal    = substr($tgl, 8,2);
    $nama_bulan = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
    $h = date('D', strtotime($tgl));
    $nama_hari = array(
    	'Sun' => "Minggu",
    	'Mon' => "Senin",
		'Tue' => "Selasa",
		'Wed' => "Rabu",
		'Thu' => "Kamis",
		'Fri' => "Jum'at",
		'Sat' => "Sabtu");
    $bulan  = $nama_bulan[substr($tgl,5,2) - 1];
    $hari = $nama_hari[$h];
    $tahun  = substr($tgl,0,4);
    
    return $hari.', '.$tanggal.' '.$bulan.' '.$tahun;
}
?>