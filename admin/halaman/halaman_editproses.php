<?php
	if(!defined("INDEX")) die("<center><h1>---<h1></center>");
    if (!empty($_POST['id'])) {
		$isi    = addslashes($_POST['isi']);
		$judul = htmlspecialchars($_POST['judul']);

		$mysqli->query("UPDATE halaman SET
		    judul   = '$judul',
		    isi     = '$isi' WHERE id_halaman='$_POST[id]'") or die (mysqli_error());
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
		echo "<meta http-equiv ='refresh'content='1; url=?tampil=$_POST[c]&c=$_POST[c]&ket=$_POST[ket]&p=$_POST[p]&hal=$_POST[hal]'>";
    }else{
        echo"<div class='container-fluid'><div class='row'><div class='col-lg-12'><h1 class='page-header'>KONTEN TIDAK ADA</h1></div></div></div>";
        echo "<meta http-equiv ='refresh'content='1; url=?tampil=beranda'>";
    }
?>