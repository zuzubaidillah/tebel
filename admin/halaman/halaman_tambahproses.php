<?php
if(!defined("INDEX")) die("<center><h1>---<h1></center>");
    if (!empty($_POST['p'])) {
		$isi    		= addslashes($_POST['isi']);
		$judul 			= htmlspecialchars($_POST['judul']);
		$p 				= htmlspecialchars($_POST['p']);
		$urutan			= htmlspecialchars($_POST['urutan']);
		$tanggal 		= date('ymd');
		$dt_user		= mysqli_fetch_array($mysqli->query("SELECT * FROM user WHERE id_user=$_SESSION[id_user]"));
		$idplusnama		= $_SESSION['id_user'].'.'.$dt_user['nama'];
		
		$mysqli->query("INSERT INTO halaman SET
		    judul   = '$judul',
		    urutan   = '$urutan',
			id_user = '$idplusnama',
			idsub 	= '$p',
			tanggal = '$tanggal',
		    isi     = '$isi'") or die (mysqli_error());
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
		echo "<meta http-equiv ='refresh'content='1; url=?tampil=$_POST[c]&c=$_POST[c]&ket=$_POST[ket]&p=$_POST[p]&hal=1'>";
    }else{
        echo"<div class='container-fluid'><div class='row'><div class='col-lg-12'><h1 class='page-header'>KONTEN TIDAK ADA</h1></div></div></div>";
        echo "<meta http-equiv ='refresh'content='1; url=?tampil=beranda'>";
    }
?>

