<?php
  //<!--   masukkan isi -->
  $nm_titel = "Produk - ";
  // pagination lihat lainya
  $sql_produk = $mysqli->query("SELECT * FROM galeri WHERE jenis='produk' ORDER BY tanggal desc");
  $nm_pr = mysqli_num_rows($sql_produk);
  ?>

    <!-- Page Content -->
    <div class="container">
  
      <!-- Portfolio Section -->
      <br>
      <h2 class="text-center">PRODUK <span class="badge badge-secondary">Desa Tebel</span></h2><br>
      <div class="container_ps row">

        <?php 
          while($dt_produk = mysqli_fetch_array($sql_produk)) : 
          $tanggal    = tgl_indonesia($dt_produk['tanggal']);
        ?>
          <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-12 portfolio-item pg_berita">
            <div class="shadow card h-100 bg-light">
              <a href="?tampil=produk-detail&k=<?= $dt_produk['id_galeri']; ?>">
                <img height="145" class="card-img-top" src="gambar/produk/<?= $dt_produk['gambar']; ?>" alt="">
              </a>
              <div class="card-body">
                <p class="card-subtitle f-11 text-muted"><?= $tanggal; ?></p>
                <p class="card-title">
                  <strong>
                  <a href="?tampil=produk-detail&k=<?= $dt_produk['id_galeri']; ?>"><?= strtoupper($dt_produk['judul']); ?></a>
                  </strong>
                </p>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
      </div>
      <!-- /.row -->
      <!-- untuk menambahkan baris agar rapi -->
      <?php
        $num_produk = mysqli_num_rows($sql_produk);
        if ($num_produk<=4) : ?>
          <br>
          <br>
          <br>
          <br>
        <?php endif; ?>        
      <!-- untuk menambahkan baris agar rapi -->

        <!-- untuk pagination -->
      <?php
        $num_produk = mysqli_num_rows($sql_produk);
        if ($num_produk>16) : ?>
        <div class="col-md-12">
            <center>
              <button id="tombol_pgberita" name="tombol-lainnya" class="btn btn-md btn-dark bayangan">LIHAT LAINNYA</button>
            </center>
        </div>
        <?php endif;
          if ($num_produk==0) {
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
          }elseif ($num_produk<5) {
            echo "<br>";
            echo "<br>";
          }
        ?>      
        <!-- /.untuk pagination -->
	</div><br>