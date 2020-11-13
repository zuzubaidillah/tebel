  <?php
    $dt_ps1     = mysqli_fetch_array($mysqli->query("SELECT * FROM user WHERE level=2 AND id_user=1"));
    $dt_ps2     = mysqli_fetch_array($mysqli->query("SELECT * FROM user WHERE level=2 AND id_user=2"));
    $dt_ps3     = mysqli_fetch_array($mysqli->query("SELECT * FROM user WHERE level=2 AND id_user=3"));
    $dt_ps4     = mysqli_fetch_array($mysqli->query("SELECT * FROM user WHERE level=2 AND id_user=4"));
    $dt_ps5     = mysqli_fetch_array($mysqli->query("SELECT * FROM user WHERE level=2 AND id_user=5"));
    $dt_ps6     = mysqli_fetch_array($mysqli->query("SELECT * FROM user WHERE level=2 AND id_user=6"));
    $dt_ps7     = mysqli_fetch_array($mysqli->query("SELECT * FROM user WHERE level=2 AND id_user=7"));
    $dt_ps8     = mysqli_fetch_array($mysqli->query("SELECT * FROM user WHERE level=2 AND id_user=8"));
    $dt_ps9     = mysqli_fetch_array($mysqli->query("SELECT * FROM user WHERE level=2 AND id_user=9"));
    $dt_ps10    = mysqli_fetch_array($mysqli->query("SELECT * FROM user WHERE level=2 AND id_user=10"));
    $dt_ps11    = mysqli_fetch_array($mysqli->query("SELECT * FROM user WHERE level=2 AND id_user=11"));
  ?>
  <div class="container">
      <!-- Team Members Row -->
      <div class="row">
          <div class="col-12"><h2 class="my-4">Staf Desa <span class="badge badge-secondary">desa tebel</span></h2></div>
      </div>
        <div class="row">
          <div class="col-2"></div>
          <div class="col-8 text-center mb-4">
            <img class="rounded-circle rounded img-fluid d-block mx-auto" src="gambar/user/<?= $dt_ps1['foto']; ?>" alt="">
            <h3 class="text-uppercase"><?= $dt_ps1['nama']; ?></h3>
              <p><?= $dt_ps1['job']; ?></p>            
          </div>
          <div class="col-2"></div>
        </div>

        <div class="row">
          <div class="col-5 text-center mb-4">
            <img class="rounded-circle rounded img-fluid d-block mx-auto" src="gambar/user/<?= $dt_ps2['foto']; ?>" alt="">
            <h3 class="text-uppercase"><?= $dt_ps2['nama']; ?></h3>
              <p><?= $dt_ps2['job']; ?></p>

          </div>
          <div class="col-2 text-center mb-4"></div>
          <div class="col-5 text-center mb-4">
            <img class="rounded-circle rounded img-fluid d-block mx-auto" src="gambar/user/<?= $dt_ps3['foto']; ?>" alt="">
            <h3 class="text-uppercase"><?= $dt_ps3['nama']; ?></h3>
              <p><?= $dt_ps3['job']; ?></p>
            
          </div>
        </div>

        <div class="row">
          <div class="col-5 text-center mb-4">
            <img class="rounded-circle rounded img-fluid d-block mx-auto" src="gambar/user/<?= $dt_ps4['foto']; ?>" alt="">
            <h3 class="text-uppercase"><?= $dt_ps4['nama']; ?></h3>
              <p><?= $dt_ps4['job']; ?></p>
            
          </div>
          <div class="col-2 text-center mb-4"></div>
          <div class="col-5 text-center mb-4">
            <img class="rounded-circle rounded img-fluid d-block mx-auto" src="gambar/user/<?= $dt_ps5['foto']; ?>" alt="">
            <h3 class="text-uppercase"><?= $dt_ps5['nama']; ?></h3>
              <p><?= $dt_ps5['job']; ?></p>
            
          </div>
        </div>

        <div class="row">
          <div class="col-5 text-center mb-4">
            <img class="rounded-circle rounded img-fluid d-block mx-auto" src="gambar/user/<?= $dt_ps6['foto']; ?>" alt="">
            <h3 class="text-uppercase"><?= $dt_ps6['nama']; ?></h3>
              <p><?= $dt_ps6['job']; ?></p>
            
          </div>
          <div class="col-2 text-center mb-4"></div>
          <div class="col-5 text-center mb-4">
            <img class="rounded-circle rounded img-fluid d-block mx-auto" src="gambar/user/<?= $dt_ps7['foto']; ?>" alt="">
            <h3 class="text-uppercase"><?= $dt_ps7['nama']; ?></h3>
              <p><?= $dt_ps7['job']; ?></p>
            
          </div>
        </div>

        <div class="row">
          <div class="col-5 text-center mb-4">
            <img class="rounded-circle rounded img-fluid d-block mx-auto" src="gambar/user/<?= $dt_ps8['foto']; ?>" alt="">
            <h3 class="text-uppercase"><?= $dt_ps8['nama']; ?></h3>
              <p><?= $dt_ps8['job']; ?></p>
            
          </div>
          <div class="col-2 text-center mb-4"></div>
          <div class="col-5 text-center mb-4">
            <img class="rounded-circle rounded img-fluid d-block mx-auto" src="gambar/user/<?= $dt_ps9['foto']; ?>" alt="">
            <h3 class="text-uppercase"><?= $dt_ps9['nama']; ?></h3>
              <p><?= $dt_ps9['job']; ?></p>
            
          </div>
        </div>

        <div class="row">
          <div class="col-5 text-center mb-4">
            <img class="rounded-circle rounded img-fluid d-block mx-auto" src="gambar/user/<?= $dt_ps10['foto']; ?>" alt="">
            <h3 class="text-uppercase"><?= $dt_ps10['nama']; ?></h3>
              <p><?= $dt_ps10['job']; ?></p>
            
          </div>
          <div class="col-2 text-center mb-4"></div>
          <div class="col-5 text-center mb-4">
            <img class="rounded-circle rounded img-fluid d-block mx-auto" src="gambar/user/<?= $dt_ps11['foto']; ?>" alt="">
            <h3 class="text-uppercase"><?= $dt_ps11['nama']; ?></h3>
              <p><?= $dt_ps11['job']; ?></p>
            
          </div>
        </div>

  </div>