<?php
if(isset($_GET['tampil'])) $tampil = $_GET['tampil'];
else $tampil = "beranda";

if ($tampil == "beranda") include("admin/beranda.php");
elseif($tampil == "keluar") include("admin/keluar.php");
elseif($tampil == "tampilan") include("admin/tampilan.php");
elseif($tampil == "statistik") include("admin/statistik_dt.php");

elseif($tampil == "submenu") include("admin/submenu/submenu_tampil.php");
elseif($tampil == "submenu_tambah") include("admin/submenu/submenu_tambah.php");
elseif($tampil == "submenu_tambahproses") include("admin/submenu/submenu_tambahproses.php");
elseif($tampil == "submenu_edit") include("admin/submenu/submenu_edit.php");
elseif($tampil == "submenu_editproses") include("admin/submenu/submenu_editproses.php");
elseif($tampil == "submenu_hapus") include("admin/submenu/submenu_hapus.php");

elseif($tampil == "halaman") include("admin/halaman/halaman_tampil.php");
elseif($tampil == "halaman_tambah") include("admin/halaman/halaman_tambah.php");
elseif($tampil == "halaman_tambahproses") include("admin/halaman/halaman_tambahproses.php");
elseif($tampil == "halaman_edit") include("admin/halaman/halaman_edit.php");
elseif($tampil == "halaman_editproses") include("admin/halaman/halaman_editproses.php");
elseif($tampil == "halaman_hapus") include("admin/halaman/halaman_hapus.php");

elseif($tampil == "produk") include("admin/produk/produk_tampil.php");
elseif($tampil == "produk_tambah") include("admin/produk/produk_tambah.php");
elseif($tampil == "produk_tambahproses") include("admin/produk/produk_tambahproses.php");
elseif($tampil == "produk_edit") include("admin/produk/produk_edit.php");
elseif($tampil == "produk_editproses") include("admin/produk/produk_editproses.php");
elseif($tampil == "produk_hapus") include("admin/produk/produk_hapus.php");

elseif($tampil == "galeri") include("admin/galeri/galeri_tampil.php");
elseif($tampil == "galeri_tambah") include("admin/galeri/galeri_tambah.php");
elseif($tampil == "galeri_tambahproses") include("admin/galeri/galeri_tambahproses.php");
elseif($tampil == "galeri_edit") include("admin/galeri/galeri_edit.php");
elseif($tampil == "galeri_editproses") include("admin/galeri/galeri_editproses.php");
elseif($tampil == "galeri_hapus") include("admin/galeri/galeri_hapus.php");

elseif($tampil == "berita") include("admin/berita/berita_tampil.php");
elseif($tampil == "berita_tambah") include("admin/berita/berita_tambah.php");
elseif($tampil == "berita_tambahproses") include("admin/berita/berita_tambahproses.php");
elseif($tampil == "berita_edit") include("admin/berita/berita_edit.php");
elseif($tampil == "berita_editproses") include("admin/berita/berita_editproses.php");
elseif($tampil == "berita_hapus") include("admin/berita/berita_hapus.php");

elseif($tampil == "datadiri") include("admin/datadiri/datadiri_tampil.php");
elseif($tampil == "datadiri_edit") include("admin/datadiri/datadiri_edit.php");
elseif($tampil == "datadiri_editproses") include("admin/datadiri/datadiri_editproses.php");
elseif($tampil == "ganti_password") include("admin/datadiri/ganti_password.php");
elseif($tampil == "ganti_password_proses") include("admin/datadiri/ganti_password_proses.php");

elseif($tampil == "stafdesa") include("admin/stafdesa/stafdesa_tampil.php");
elseif($tampil == "stafdesa_tambah") include("admin/stafdesa/stafdesa_tambah.php");
elseif($tampil == "stafdesa_tambahproses") include("admin/stafdesa/stafdesa_tambahproses.php");
elseif($tampil == "stafdesa_edit") include("admin/stafdesa/stafdesa_edit.php");
elseif($tampil == "stafdesa_editproses") include("admin/stafdesa/stafdesa_editproses.php");
elseif($tampil == "stafdesa_hapus") include("admin/stafdesa/stafdesa_hapus.php");

else 
        echo"<div class='container-fluid'><div class='row'><div class='col-lg-12'><h1 class='page-header'>KONTEN TIDAK ADA</h1></div></div></div>";

?>