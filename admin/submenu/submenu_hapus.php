<?php
	if(!defined("INDEX")) die("<center><h1>---<h1></center>");
	if (!empty($_POST['id'])) {
		$ket = $_POST['ket'];
		if ($ket==1) {
			$cn = $mysqli->query("SELECT * FROM posting WHERE jenisposting = '$_POST[id]'");
			while ($data =  mysqli_fetch_array($cn)) {
				unlink ("gambar/berita/$data[gambar]");
			}
			$mysqli->query ("DELETE FROM submenu WHERE id_submenu = '$_POST[id]'") or die (mysqli_error());
			$mysqli->query ("DELETE FROM posting WHERE jenisposting = '$_POST[id]'") or die (mysqli_error());
		}elseif ($ket==2) {
			$mysqli->query ("DELETE FROM submenu WHERE id_submenu = '$_POST[id]'") or die (mysqli_error());
			$mysqli->query ("DELETE FROM submenu WHERE id_menu = '$_POST[id]'") or die (mysqli_error());
			$mysqli->query ("DELETE FROM halaman WHERE idsub = '$_POST[id]'") or die (mysqli_error());
		}elseif ($ket==4) {
			$cn = $mysqli->query("SELECT * FROM galeri WHERE kategori='$_POST[id]' and jenis ='produk'");
			while ($data =  mysqli_fetch_array($cn)) {
				unlink ("gambar/produk/$data[gambar]");
			}
			$mysqli->query ("DELETE FROM submenu WHERE id_submenu = '$_POST[id]'") or die (mysqli_error());
			$mysqli->query ("DELETE FROM galeri WHERE kategori = '$_POST[id]'") or die (mysqli_error());
		}else{
			$cn = $mysqli->query("SELECT * FROM galeri  WHERE kategori='$_POST[id]' and jenis ='galeri'");
			while($data =  mysqli_fetch_array($cn)) {
				unlink ("gambar/galeri/$data[gambar]");
			}
			$mysqli->query ("DELETE FROM submenu WHERE id_submenu = '$_POST[id]'") or die (mysqli_error());
			$mysqli->query ("DELETE FROM galeri WHERE kategori = '$_POST[id]'") or die (mysqli_error());
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