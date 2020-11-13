<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbf   = "desa_tebel160718";
$mysqli = mysqli_connect($host,$user,$pass,$dbf);


$lama = 30; // lama data yang tersimpan di database dan akan otomatis terhapus setelah 7 hari
// proses untuk melakukan penghapusan data
$mysqli->query("DELETE FROM statistik WHERE DATEDIFF(CURDATE(), tanggal) > $lama");

?>