<?php
  //<!--   masukkan isi -->
  // pagination lihat lainya
  // get w adalah kategori berita tersebut
  if (!isset($_GET['w'])) {
    if (!isset($_POST["keyword"]) or empty($_POST['keyword'])) {
      $sql_ps = $mysqli->query("SELECT * FROM posting WHERE kategori='berita' ORDER BY tanggal DESC");
      $jd = "semua berita ";
      $nm_titel = "Semua Berita - ";
    }else{
      $keyword = $_POST['keyword'];
      $sql_ps = $mysqli->query("SELECT * FROM posting WHERE judulposting LIKe '%$keyword%' ORDER BY tanggal DESC");
      $jd = "berita ". $keyword . " ";
      $nm_titel = "Cari " . $keyword . " - ";
    }
  }else{
    $get_w      = $_GET['w'];
    // var_dump($get_w);die;
    $sql_ps     = $mysqli->query("SELECT * FROM posting WHERE jenisposting='$get_w' ORDER BY tanggal DESC");
    $sql_p2     = $mysqli->query("SELECT * FROM posting WHERE jenisposting='$get_w' ORDER BY tanggal DESC");
    $dt_ps2     = mysqli_fetch_array($sql_p2);
    $data_kt    = mysqli_fetch_array($mysqli->query("SELECT * FROM submenu WHERE id_submenu='$dt_ps2[jenisposting]'"));
    $jd         = "Berita ";
    $nm_titel   = "Berita - ";
    $kategori   = $data_kt['judul'];
  }
  $nm_ps = mysqli_num_rows($sql_ps);
  ?>

    <!-- Page Content -->
    <div class="container">
  
      <!-- Portfolio Section -->
      <br>
      <h2 class="text-center text-uppercase"><?= $jd; ?><span class="badge badge-secondary">Desa Tebel</span></h2><br>
      <?php if (isset($_GET['w'])) : ?>
      <h5 class="text-uppercase">Kategori : <?= $kategori; ?></h5><br>
      <?php endif; ?>
      <div class="container_ps row">

        <?php 
          while($dt_ps = mysqli_fetch_array($sql_ps)) : 
          $tanggal    = tgl_indonesia($dt_ps['tanggal']);
        ?>
          <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-12 portfolio-item pg_berita">
            <div class="shadow card h-100 bg-light">
              <a href="?tampil=berita-detail&k=<?= $dt_ps['idposting']; ?>">
                <img height="144" class="card-img-top" src="gambar/berita/<?= $dt_ps['gambar']; ?>" alt="">
              </a>
              <div class="card-body">
                <p class="card-subtitle f-11 text-muted"><?= $tanggal; ?></p>
                <p class="card-title">
                  <strong>
                  <a href="?tampil=berita-detail&k=<?= $dt_ps['idposting']; ?>"><?= strtoupper($dt_ps['judulposting']); ?></a>
                  </strong>
                </p>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
      </div>
      <!-- /.row -->
      <!-- untuk menambahkan baris agar rapi -->
      <?php if ($nm_ps<=4) : ?>
          <br>
          <br>
          <br>
        <?php endif; ?>   
      <!-- untuk menambahkan baris agar rapi -->
        
        <?php if ($nm_ps>=16) : ?>
        <!-- untuk pagination -->
        <div class="col-md-12">
            <center>
              <button id="tombol_pgberita" name="tombol-lainnya" class="btn btn-md btn-dark bayangan">LIHAT LAINNYA</button>
            </center>
        </div>
        <!-- /.untuk pagination -->
        <?php endif; 
          if ($nm_ps==0) {
            echo "<br>";
            echo "<br>";
            echo "<br>";
            echo "<br>";
            echo "<br>";
            echo "<br>";
            echo "<br>";
            echo "<br>";
            echo "<br>";
            echo "<br>";
            echo "<br>";
            echo "<br>";
          }elseif ($nm_ps<5) {
            echo "<br>";
            echo "<br>";            
          }
        ?>
	</div><br>