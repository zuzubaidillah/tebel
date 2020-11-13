<?php
  //<!--   masukkan isi -->
  // pagination lihat lainya
  $get_k        = $_GET['k'];
  $sql_gl       = $mysqli->query("SELECT * FROM galeri WHERE kategori=$get_k and jenis='galeri' ORDER BY tanggal desc");
  $dt_sm        = mysqli_fetch_array($mysqli->query("SELECT * FROM submenu WHERE id_submenu=$get_k"));
  $jd           = "GALERI ";
  $nm_titel     = "Galeri - ";
  $kategori     = $dt_sm['judul'];
  $nm_gl        = mysqli_num_rows($sql_gl);
  ?>

    <!-- Page Content -->
    <div class="container">
  
      <!-- Portfolio Section -->
      <br>
      <h2 class="text-center"><?= $jd; ?><span class="badge badge-secondary">Desa Tebel</span></h2>
      <h5 class="text-uppercase">Galeri : <?= $kategori; ?></h5><br>
      <div class="container_ps row">

        <?php 
          while($dt_gl        = mysqli_fetch_array($sql_gl)) :
            $tanggal          = tgl_indonesia($dt_gl['tanggal']);
        ?>
          <div class="col-lg-3 col-sm-6 col-6 portfolio-item pg_berita">
            <div class="shadow card h-100 bg-light">
              <a class="example-image-link" href="gambar/galeri/<?= $dt_gl['gambar']; ?>" data-lightbox="example-set" data-title="<?= $dt_gl['judul']; ?>">
                <img height="144" class="example-image card-img-top" src="gambar/galeri/<?= $dt_gl['gambar']; ?>" alt=""/>
              </a>
              <div class="card-body">
                <p class="card-title">
                  <strong>
                  <a><?= strtoupper($dt_gl['judul']); ?></a>
                  </strong>
                </p>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
      </div>
      <!-- /.row -->
      <!-- untuk menambahkan baris agar rapi -->
      <?php if ($nm_gl<=4) : ?> 
          <br>
          <br>
          <br>
          <br>
        <?php endif; ?>        
      <!-- untuk menambahkan baris agar rapi -->

        <?php if ($nm_gl>=16) : ?>
        <!-- untuk pagination -->
        <div class="col-md-12">
            <center>
              <button id="tombol_pgberita" name="tombol-lainnya" class="btn btn-md btn-dark bayangan">LIHAT LAINNYA</button>
            </center>
        </div>
        <!-- /.untuk pagination -->
        <?php endif; 

          if ($nm_gl==0) {
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
          }
        ?>
	</div><br>