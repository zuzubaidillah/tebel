  <?php
  // if(!defined("INDEX")) header("Location: index.php");
  $nm_titel = "Web Site Resmi - ";

    //<!-- slider gambar slide -->
     include("slide_gmb_dt.php");
    //<!-- /.slider gambar slide -->
  $sql_ps = $mysqli->query("SELECT * FROM posting WHERE kategori='berita' ORDER BY tanggal desc LIMIT 8");
  $sql_gl = $mysqli->query("SELECT * FROM galeri WHERE jenis='galeri' ORDER BY tanggal desc LIMIT 8");
  
  $no = 1;
?>  
  <div class="container">
      <!-- Portfolio Section -->
      <br>
      <h2 class="text-center">BERITA TERKINI</h2><br>
      <div class="row">

        <?php 
          while($dt_ps = mysqli_fetch_array($sql_ps)) : 
          $tanggal    = tgl_indonesia($dt_ps['tanggal']);
        ?>

          <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-12 portfolio-item">
            <div class="shadow card h-100 bg-light">
              <a href="?tampil=berita-detail&k=<?= $dt_ps['idposting']; ?>">
                <img height="145" class="card-img-top" src="gambar/berita/<?= $dt_ps['gambar']; ?>" alt="">
              </a>
              <div class="card-body">
                <small class="pd-tgl"></small>
                <p class="card-subtitle f-11 text-muted"><?= $tanggal; ?></p>
                <p class="card-title">
                  <strong>
                  <a href="?tampil=berita-detail&k=<?= $dt_ps['idposting']; ?>"><?= strtoupper($dt_ps['judulposting']); ?></a>
                  </strong>
                </p>
                <!-- <p class="card-text"> -->
                  <?php 
                    // $isi = $dt_ps['isi'];
                    // substr($isi, 0,200);
                  ?>
                <!-- </p> -->
              </div>
            </div>
          </div>
        <?php $no++; endwhile; 

          if (mysqli_num_rows($sql_ps)>=8) : ?>
        <!-- untuk pagination -->
        <div class="col-md-12">
          <form method="post" action="?tampil=berita">
            <center>
              <button type="submit" name="tombol-lainnya" value="16" class="btn btn-md btn-dark bayangan">LIHAT LAINNYA</button>
            </center>
          </form>
        </div>
        <!-- /.untuk pagination -->
        <?php endif; ?>

      </div>
      <!-- /.row -->

      <hr>

      <!-- Call to Action Section -->
      <div class="row mb-4">
        <div class="col-md-8">
          <p>Desa Tebel adalah sebuah desa yang berada di kecamatan Bareng kabupaten Jombang. Desa Tebel juga mempunyai beberapa <strong>produk</strong> cirikhas dari Desa Tebel.</p>
        </div>
        <div class="col-md-4">
          <a class="btn btn-lg btn-secondary btn-block  bayangan" href="?tampil=produk">LIHAT PRODUK</a>
        </div>
      </div>
  </div>
  <?php
    $dt_tp = mysqli_fetch_array($mysqli->query("SELECT * FROM tampil WHERE id_tampil=1"));
  ?>
    <!-- Footer -->
    <footer class="py-4 bg-hitam">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h4 class="text-white">Informasi</h4><br>
            <p class="m-0 text-justify text-white"><?= $dt_tp['info']; ?></p>  
          </div>
          <div class="col-md-6">
            <h4 class="text-white ">Galeri</h4><br>
            <div class="row">
            <?php while($data_gl=mysqli_fetch_array($sql_gl)) : ?>
              <div class="col-lg-3 col-sm-4 col-6 mb-4">
                <a class="example-image-link" href="gambar/galeri/<?= $data_gl['gambar']; ?>" data-lightbox="example-set" data-title="<?= $data_gl['judul']; ?>">
                  <img height="50" width="80" title="<?= $data_gl['judul']; ?>" class="example-image" src="gambar/galeri/<?= $data_gl['gambar']; ?>" alt="">
                </a>
              </div>
            <?php endwhile; ?>
            </div>
          </div>
        </div>
      </div>
      <!-- /.container -->
    </footer>