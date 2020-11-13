<?php
  session_start();
  include("lib/koneksi.php");
  include("lib/fungsi_tglindonesia.php");
  define("INDEX",true);
  require 'lib/functions.php';

  $ip      = ip_user();
  $browser = browser_user();
  $os      = os_user();

?>
<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="icon" href="gambar/favicon.png" type="image/ico"/>
    <!-- Bootstrap core CSS -->
    <link href="template/website/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="template/website/vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="template/website/css/lightbox.min.css">

    <!-- Custom styles for this template -->
    <link href="template/website/css/modern-business.css" rel="stylesheet">
    <style>
	    body {
	      background-color: #eae9e9;
	    }
    	p.card-subtitle.f-11.text-muted {
        	font-size: 12px;
      	}
      	.container div.pg_berita {
        	float: left;
        	display: none;
      	}
      	footer.bg-hitam{
      		background-color: #25292d;
      	}
        img.imgmt15px {
          margin-top:  15px;
        }
        .bayangan {
          box-shadow: 0 2px 2px rgba(0,0,0,5);
        }
    </style>
  </head>

  <body>
    <?php
	    //<!-- Navigation -->
	    include("menu_web_dt.php");
  		include("konten/konten_dt.php");
  		$dt = mysqli_fetch_array($mysqli->query("SELECT * FROM tampil"));
  		$th = $dt['tahun'];
  		?>
    
    <!-- Footer -->
    <footer class="py-4 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">&copy; <?= $th; ?> - Web Resmi Desa Tebel Kec.Bareng Kab.Jombang</p>
        <p class="m-0 text-center text-white"><small> KKN UNWAHA 2018 | kelompok sekawan 4 - Website Desa, Version 1.0.0</small></p>        
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="template/website/vendor/jquery/jquery.min.js" type="text/javascript"></script>
    <script src="template/website/js/lightbox-plus-jquery.min.js"></script>
    <!-- <script src="template/website/javascripts/jquery-3.2.1.slim.min.js"></script> -->
    <script src="template/website/vendor/bootstrap/js/bootstrap.bundle.min.js" type="text/javascript"></script>
    <script src="template/website/javascripts/show-more-items.js"></script>
    <script src="template/website/javascripts/app.js"></script>
  </body>
    <?php 
      global $nm_titel;
    ?>
    <title><?= $nm_titel; ?>Desa Tebel Kec.Bareng Kab.Jombang</title>
</html>
<?php
  $b    = $mysqli->query("SELECT * FROM online");
  $c    = mysqli_fetch_array($b);
  $on   ='1';
  $on   = $on+$c['session'];

  $mysqli->query("INSERT INTO online(session, waktu)VALUES('$on', '600')");

  $a    = $mysqli->query("SELECT * FROM online");
  $jml  = mysqli_num_rows($a);

  $sql        = "SELECT * FROM statistik ORDER BY tanggal DESC";
  $query      = $mysqli->query($sql);
  $row        = $query->fetch_assoc(); 

  $tgl        = date("Y/m/d");
  date_default_timezone_set("Asia/Jakarta");
  $waktu      = date ("h:i:s");
  $tanggal    = tgl_indonesia(date("Y/m/d"));
  $info       = $_SERVER['HTTP_USER_AGENT'];
  $ip_address =$_SERVER['REMOTE_ADDR'];
  $aqw        = $mysqli->query("SELECT * FROM statistik where tanggal = '$tgl'");
  $sql        = $mysqli->query("SELECT * FROM statistik where ip = '$ip_address' and tanggal = '$tgl'");
  $vxv        = mysqli_fetch_array($sql);
  $vx         = mysqli_num_rows($sql);
  if($vx==0){
    $mysqli->query("INSERT INTO statistik set
    ip      = '$ip_address',
    os      = '$os',
    browser = '$browser',
    jam     = '$waktu',
    tanggal = '$tgl'");
  }
?>