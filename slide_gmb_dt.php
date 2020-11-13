 <!-- if(!defined("INDEX")) die("<center><h1>---<h1></center>"); ?> -->
    <header>
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
        </ol>
        <?php  
          $sql_s = mysqli_fetch_array($mysqli->query ("SELECT * FROM galeri where jenis = 'slide' and id_galeri=141")) or die (mysqli_error());
          $sql_d = mysqli_fetch_array($mysqli->query ("SELECT * FROM galeri where jenis = 'slide' and id_galeri=142")) or die (mysqli_error());
          $sql_t = mysqli_fetch_array($mysqli->query ("SELECT * FROM galeri where jenis = 'slide' and id_galeri=143")) or die (mysqli_error());
          $sql_e = mysqli_fetch_array($mysqli->query ("SELECT * FROM galeri where jenis = 'slide' and id_galeri=144")) or die (mysqli_error());
          $sql_l = mysqli_fetch_array($mysqli->query ("SELECT * FROM galeri where jenis = 'slide' and id_galeri=145")) or die (mysqli_error());
        ?>
        <div class="carousel-inner" role="listbox">
          <!-- Slide One - Set the background image for this slide in the line below -->
          <div class="carousel-item img-fluid active" style="background-image: url('gambar/slide/<?= $sql_s['gambar']; ?>')">
            <div class="carousel-caption d-none d-md-block">
              <h3><?= strtoupper($sql_s['judul']); ?></h3>
              <p><?= $sql_s['keterangan']; ?></p>
            </div>
          </div>
          <!-- Slide One - Set the background image for this slide in the line below -->
          <div class="carousel-item img-fluid" style="background-image: url('gambar/slide/<?= $sql_d['gambar']; ?>')">
            <div class="carousel-caption d-none d-md-block">
              <h3><?= strtoupper($sql_d['judul']); ?></h3>
              <p><?= $sql_d['keterangan']; ?></p>
            </div>
          </div>
          <!-- Slide One - Set the background image for this slide in the line below -->
          <div class="carousel-item img-fluid" style="background-image: url('gambar/slide/<?= $sql_t['gambar']; ?>')">
            <div class="carousel-caption d-none d-md-block">
              <h3><?= strtoupper($sql_t['judul']); ?></h3>
              <p><?= $sql_t['keterangan']; ?></p>
            </div>
          </div>
          <!-- Slide One - Set the background image for this slide in the line below -->
          <div class="carousel-item img-fluid" style="background-image: url('gambar/slide/<?= $sql_e['gambar']; ?>')">
            <div class="carousel-caption d-none d-md-block">
              <h3><?= strtoupper($sql_e['judul']); ?></h3>
              <p><?= $sql_e['keterangan']; ?></p>
            </div>
          </div>
          <!-- Slide One - Set the background image for this slide in the line below -->
          <div class="carousel-item img-fluid" style="background-image: url('gambar/slide/<?= $sql_l['gambar']; ?>')">
            <div class="carousel-caption d-none d-md-block">
              <h3><?= strtoupper($sql_l['judul']); ?></h3>
              <p><?= $sql_l['keterangan']; ?></p>
            </div>
          </div>

        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </header>