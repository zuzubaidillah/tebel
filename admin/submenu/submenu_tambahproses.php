<?php
	if(!defined("INDEX")) die("<center><h1>---<h1></center>");
	if (!empty($_POST['id'])) {
		$link = htmlspecialchars($_POST['link']);
		$urutan = htmlspecialchars($_POST['urutan']);

		if (!isset($_POST['tanggal'])) {
			$tanggal = date('ymd');
		}else{
			$tanggal = $_POST['tanggal'];
		}

		if ($_POST['jenis']==2) {
			// info jika link yang dimasukkan sudah digunaan
			$sql_subm = $mysqli->query("SELECT * FROM submenu WHERE link='$link'");
			if (mysqli_num_rows($sql_subm) === 1) {
	        	echo"<div class='container-fluid'><div class='row'><div class='col-lg-12'><h1 class='page-header'>INPUT LINK SUDAH DIGUNAKAN</h1></div></div></div>";
				echo "<meta http-equiv ='refresh'content='1; url=?tampil=submenu&jenis=$_POST[jenis]&ket=$_POST[ket]&p=$_POST[p]'>";
				die;
			}
			// info jika link yang dimasukkan tidak tersedia
			$sql_link = $mysqli->query("SELECT * FROM halaman WHERE id_halaman='$link'");
			$dt = mysqli_fetch_array($sql_link);
			if (mysqli_num_rows($sql_link) === 0) {
	        	echo"<div class='container-fluid'><div class='row'><div class='col-lg-12'><h1 class='page-header'>LINK TIDAK TERSEDIA DI HALAMAN</h1></div></div></div>";
				echo "<meta http-equiv ='refresh'content='1; url=?tampil=submenu&jenis=$_POST[jenis]&ket=$_POST[ket]&p=$_POST[p]'>";
				die;
			}
			// input submenu dengan jenis 2 = buat sub menu WEB
	        $mysqli->query ("INSERT INTO submenu set
				judul	= '$dt[judul]',
				id_menu	= '$_POST[p]',
				jenis	= '$_POST[jenis]',
				link	= '$link',
				tanggal	= '$tanggal',
				urutan	= '$urutan'") or die (mysqli_error());
		}else{
			// input submenu dengan jenis 1 = buat sub menu ADMINISTRATOR
			$judul = htmlspecialchars($_POST['judul']);
	        $mysqli->query ("INSERT INTO submenu set
				judul	= '$judul',
				id_menu	= '$_POST[ket]',
				jenis	= '$_POST[jenis]',
				link	= '$link',
				tanggal	= '$tanggal',
				urutan	= '$urutan'") or die (mysqli_error());
		}
		echo "
			<div class='container-fluid'>
				<div class='row'>
					<div class='col-lg-12'>
						<center>
							<img src='gambar/loading2.gif'>
							<h2 class='page-header' style='display: inline-block;'>
								Loading. . . . .
							</h2>
						</center>
					</div>
				</div>
			</div>
			";
		if ($_POST['jenis']==2) {		
			echo "<meta http-equiv ='refresh'content='1; url=?tampil=submenu&jenis=$_POST[jenis]&ket=$_POST[ket]&p=$_POST[p]'>";
		}else{
			echo "<meta http-equiv ='refresh'content='1; url=?tampil=submenu&jenis=$_POST[jenis]&ket=$_POST[ket]'>";
		}
    }else{
        echo"<div class='container-fluid'><div class='row'><div class='col-lg-12'><h1 class='page-header'>KONTEN TIDAK ADA</h1></div></div></div>";
    }
?>