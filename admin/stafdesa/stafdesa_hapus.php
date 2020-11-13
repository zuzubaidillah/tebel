<?php
if(!defined("INDEX")) die("<center><h1>---<h1></center>");
    if (!empty($_POST['id'])) {
		$sql_user = mysqli_fetch_array($mysqli->query("SELECT * FROM user WHERE id_user='$_POST[id]'"));
		if($sql_user['foto'] != "") unlink ("gambar/user/$sql_user[foto]");
		$mysqli->query ("DELETE FROM user WHERE id_user='$_POST[id]'") or die (mysqli_error());
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

		echo "<meta http-equiv ='refresh'content='1; url=?tampil=stafdesa&level=$_POST[level]'>";
    }else{
        echo"<div class='container-fluid'><div class='row'><div class='col-lg-12'><h1 class='page-header'>KONTEN TIDAK ADA</h1></div></div></div>";
        echo "<meta http-equiv ='refresh'content='1; url=?tampil=beranda'>";
    }

?>