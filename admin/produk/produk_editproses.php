<?php
	if(!defined("INDEX")) die("<center><h1>---<h1></center>");
    if (!empty($_POST['id'])){
		$idgaleri 		= uniqid();
		$nama_pic    	= $_FILES['gambar']['name'];
		$lokasi_gambar  = $_FILES['gambar']['tmp_name'];
		$tipe_gambar    = $_FILES['gambar']['type'];
		$ekstensigambar = explode('.', $nama_pic);
		$ekstensigambar = strtolower(end($ekstensigambar));
		$nama_gambar 	= $idgaleri.'.'.$ekstensigambar;
		$judul 			= htmlspecialchars($_POST['judul']);
		$keterangan 	= addslashes($_POST['keterangan']);
        if ($nama_pic != "") {
            // yang diupload gambar atau bukan
            $ekstensigambarvalid = ['jpg','jpeg','png'];
            $ekstensigambar = explode('.', $nama_pic);
            $ekstensigambar = strtolower(end($ekstensigambar));
            // ada nggak sebuah string didalam array
            if (!in_array($ekstensigambar, $ekstensigambarvalid)) {
                echo"<div class='container-fluid'><div class='row'><div class='col-lg-12'><h1 class='page-header'>bukan gambar!!</h1></div></div></div>";
				echo "<meta http-equiv ='refresh'content='1; url=?tampil=produk&c=$_POST[c]&ket=$_POST[ket]&p=$_POST[p]&hal=$_POST[hal]'>";
                die();
            }
        }
		if ($lokasi_gambar==""){
		    $mysqli->query("UPDATE galeri SET 
		    	judul 			= '$judul',
				jenis	 		= 'produk',
		    	keterangan 		= '$keterangan'
				WHERE id_galeri = ' $_POST[id]'") or die (mysqli_error());
		}else{
		    $data=  mysqli_fetch_array($mysqli->query("SELECT * FROM galeri WHERE id_galeri =' $_POST[id]'"));
		    if($data['gambar'] != "") unlink ("gambar/produk/$data[gambar]");
		    	move_uploaded_file($lokasi_gambar, "gambar/produk/$nama_gambar");	    	
		    	$mysqli->query("UPDATE galeri SET
		        judul		= '$judul',
				jenis 		= 'produk',
		        lokasi 		= 'gambar/produk/$nama_gambar',
		        keterangan 	= '$keterangan', 
		        gambar  	= '$nama_gambar' WHERE 
		        id_galeri 	= ' $_POST[id]'") or die(mysqli_error());    
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
		echo "<meta http-equiv ='refresh'content='1; url=?tampil=produk&c=$_POST[c]&ket=$_POST[ket]&p=$_POST[p]&hal=$_POST[hal]'>";
    }else{
        echo"<div class='container-fluid'><div class='row'><div class='col-lg-12'><h1 class='page-header'>KONTEN TIDAK ADA</h1></div></div></div>";
        echo "<meta http-equiv ='refresh'content='1; url=?tampil=beranda'>";
    }
?>