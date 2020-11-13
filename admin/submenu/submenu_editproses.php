<?php
	if(!defined("INDEX")) die("<center><h1>---<h1></center>");        
	$judul 		= htmlspecialchars($_POST['judul']);   
	$link 		= htmlspecialchars($_POST['link']);   
	$ket 		= htmlspecialchars($_POST['ket']);   
	$urutan 	= htmlspecialchars($_POST['urutan']);
	
	if (!empty($_POST['judul'])) {
		if ($_POST['jenis']==2) {
			$sql_link = $mysqli->query("SELECT * FROM halaman WHERE id_halaman='$link'");
			if (mysqli_num_rows($sql_link) === 0) {
	        	echo"<div class='container-fluid'><div class='row'><div class='col-lg-12'><h1 class='page-header'>INPUT LINK TIDAK TERSEDIA DI HALAMAN</h1></div></div></div>";
				echo "<meta http-equiv ='refresh'content='1; url=?tampil=submenu&jenis=$_POST[jenis]&ket=$_POST[ket]&p=$_POST[p]'>";
				die;
			}
			$mysqli->query ("UPDATE submenu SET
			judul	= '$judul',
			link	= '$link',
			id_menu	= '$_POST[p]',
			urutan	= '$urutan' WHERE id_submenu='$_POST[id]'") 
			or die (mysqli_error());
		}else{
			$mysqli->query ("UPDATE submenu SET
			judul	= '$judul',
			link	= '$link',
			id_menu	= '$ket',
			urutan	= '$urutan' WHERE id_submenu='$_POST[id]'") 
			or die (mysqli_error());
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
			echo "<meta http-equiv ='refresh'content='1; url=?tampil=beranda'>";
    }
?>