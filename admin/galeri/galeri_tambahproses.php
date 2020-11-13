<?php
	if(!defined("INDEX")) die("<center><h1>---<h1></center>");
    if (!empty($_POST['p'])) {
		$idgaleri 		= uniqid();
		$nama_pic  		= $_FILES['gambar']['name'];
		$lokasi_gambar  = $_FILES['gambar']['tmp_name'];
		$tipe_gambar    = $_FILES['gambar']['type'];
		$tanggal        = date("ymd");
		$ekstensigambar = explode('.', $nama_pic);
		$ekstensigambar = strtolower(end($ekstensigambar));
		$nama_gambar 	= $idgaleri.'.'.$ekstensigambar;
		$judul 			= htmlspecialchars($_POST['judul']);
		$p 				= htmlspecialchars($_POST['p']);

	            // yang diupload gambar atau bukan
	            $ekstensigambarvalid = ['jpg','jpeg','png'];
	            $ekstensigambar = explode('.', $nama_pic);
	            $ekstensigambar = strtolower(end($ekstensigambar));
	            // ada nggak sebuah string didalam array
	            if (!in_array($ekstensigambar, $ekstensigambarvalid)) {
	                echo"<div class='container-fluid'><div class='row'><div class='col-lg-12'><h1 class='page-header'>bukan gambar!!</h1></div></div></div>";
	                echo "<meta http-equiv ='refresh'content='1; url=?tampil=$_POST[c]&c=$_POST[c]&ket=$_POST[ket]&p=$_POST[p]&hal=1'>";
	                die;
	            }
	            
		if ($lokasi_gambar==""){
		    $mysqli->query("INSERT INTO galeri SET
			judul 		= '$judul', 
			jenis 		= 'galeri',
			lokasi 		= 'gambar/galeri/$nama_gambar', 
			kategori 	= '$p',
			keterangan 	= '-',
			tanggal 	= '$tanggal'") or die(mysqli_error());
		}else{
		    move_uploaded_file($lokasi_gambar,"gambar/galeri/$nama_gambar");
		    $mysqli->query("INSERT INTO galeri SET
		        judul 		= '$judul', 
				jenis 		= 'galeri', 
		        lokasi 		= 'gambar/galeri/$nama_gambar',
		        kategori 	= '$p',
				keterangan 	= '-',
		        tanggal 	= '$tanggal',
		        gambar  	= '$nama_gambar'") or die(mysqli_error());
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
        	echo "<meta http-equiv ='refresh'content='1; url=?tampil=$_POST[c]&c=$_POST[c]&ket=$_POST[ket]&p=$_POST[p]&hal=1'>";
    }else{
        echo"<div class='container-fluid'><div class='row'><div class='col-lg-12'><h1 class='page-header'>KONTEN TIDAK ADA</h1></div></div></div>";
        echo "<meta http-equiv ='refresh'content='1; url=?tampil=beranda'>";
    }
?>