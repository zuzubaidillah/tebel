<?php
if(!defined("INDEX")) die("<center><h1>---<h1></center>");
    if (!empty($_POST['level'])) {
		$nama 				= strtolower(htmlspecialchars($_POST['nama']));
		$bagian				= strtolower(htmlspecialchars($_POST['bagian']));
		$job 				= strtolower(htmlspecialchars($_POST['job']));
		$alamat 			= strtolower(htmlspecialchars($_POST['alamat']));
        $username 			= strtolower(stripslashes($_POST['username']));
        $password 			= $mysqli->real_escape_string($_POST['password']);
        
        // username sudah ada atau belum
        $result = mysqli_num_rows($mysqli->query("SELECT username FROM user WHERE username = '$username'"));
        if ($result > 0) {
                echo"<div class='container-fluid'><div class='row'><div class='col-lg-12'><h1 class='page-header'>USERNAME SUDAH DIPAKAI!!</h1></div></div></div>";
                echo "<meta http-equiv ='refresh'content='1; url=?tampil=stafdesa&level=1'>";
            die;
        }
		// enkripsi password
		$password = password_hash($password, PASSWORD_DEFAULT);

		    $mysqli->query("INSERT INTO user SET
			nama		= '$nama',
			job			= '$job',
			alamat		= '$alamat',
			username	= '$username',
			password	= '$password',
			lp			= '$_POST[lp]',
			created		= '$_POST[id_user]',
			bagian		= '$bagian',
			level		= '1'") or die(mysqli_error());

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