<?php

    // if(!defined("INDEX")) die("<h1>---<h1>");
    if(isset($_GET['tampil'])) $tampil = $_GET['tampil'];

    else $tampil = "home";

    if ($tampil == "home") include("home_dt.php");
	elseif($tampil == "berita") include("konten/berita_dt.php");
	elseif($tampil == "berita-detail") include("konten/berita_dt_detail.php");
    elseif($tampil == "halaman-detail") include("konten/halaman_detail.php");
    elseif($tampil == "produk") include("konten/produk_dt.php");
    elseif($tampil == "produk-detail") include("konten/produk_dt_detail.php");
	elseif($tampil == "galeri") include("konten/galeri_dt.php");
    elseif($tampil == "galeri-album") include("konten/galeri_album_dt.php");
    elseif($tampil == "kontak") include("konten/kontak_dt.php");
    elseif($tampil == "staf-desa") include("konten/stafdesa_dt.php");
    else include 'konten/error404_dt.php';

?>