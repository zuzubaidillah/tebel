<?php
	if(!defined("INDEX")) die("<center><h1>---<h1></center>");
    if (!empty($_POST['id'])) {
		$iduser 		= uniqid();
		$nama_pic    	= $_FILES['gambar']['name'];
		$lokasi_gambar  = $_FILES['gambar']['tmp_name'];
		$tipe_gambar    = $_FILES['gambar']['type'];
		$nama_gambar 	= $iduser.' '.$nama_pic;    
		$nama = htmlspecialchars($_POST['nama']);   
		// $job = htmlspecialchars($_POST['job']);    
		$alamat = htmlspecialchars($_POST['alamat']);   

        if ($nama_pic != "") {
            // yang diupload gambar atau bukan
            $ekstensigambarvalid = ['jpg','jpeg','png'];
            $ekstensigambar = explode('.', $nama_pic);
            $ekstensigambar = strtolower(end($ekstensigambar));
            // ada nggak sebuah string didalam array
            if (!in_array($ekstensigambar, $ekstensigambarvalid)) {
                echo"<div class='container-fluid'><div class='row'><div class='col-lg-12'><h1 class='page-header'>bukan gambar!!</h1></div></div></div>";
				echo "<meta http-equiv ='refresh'content='1; url=?tampil=stafdesa&level=$_POST[level]'>";
                die();
            }
        }
			if ($lokasi_gambar==""){
			    $mysqli->query("UPDATE user SET 
			    	nama		= '$nama',
					alamat		= '$alamat]',
					lp			= '$_POST[lp]'
					WHERE id_user = '$_POST[id]'") or die (mysqli_error());
			}else{
			    $data =  mysqli_fetch_array($mysqli->query("SELECT * FROM user WHERE id_user =' $_POST[id]'"));
			    if($data['foto'] != "") unlink ("gambar/user/$data[foto]");
			    	move_uploaded_file($lokasi_gambar, "gambar/user/$nama_gambar");
			    	$mysqli->query("UPDATE user SET
			    	nama		= '$nama',
					alamat		= '$alamat]',
					lp			= '$_POST[lp]',
				    foto  		= '$nama_gambar'
			        WHERE id_user 	= ' $_POST[id]'") or die(mysqli_error());    
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
		echo "<meta http-equiv ='refresh'content='1; url=?tampil=stafdesa&level=$_POST[level]'>";
	}else{
        echo"<div class='container-fluid'><div class='row'><div class='col-lg-12'><h1 class='page-header'>KONTEN TIDAK ADA</h1></div></div></div>";
        echo "<meta http-equiv ='refresh'content='1; url=?tampil=beranda'>";
    }
?>