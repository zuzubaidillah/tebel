<?php
	if(!defined("INDEX")) die("<center><h1>---<h1></center>");
    if (!empty($_POST['id'])) {
		$sql_hlm = mysqli_fetch_array($mysqli->query("SELECT id_halaman FROM halaman WHERE id_halaman='$_POST[id]'"));
		$mysqli->query("UPDATE submenu SET link = '#' WHERE link = '$sql_hlm[id_halaman]'") or die (mysqli_error());
		$mysqli->query("DELETE FROM halaman WHERE id_halaman='$_POST[id]'") or die (mysqli_error());

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

