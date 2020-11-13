
    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">KONTAK
        <small>Desa Tebel</small>
      </h1>

      <ol class="breadcrumb shadow">
        <li class="breadcrumb-item">
          <a href="?tampil=home">Home</a>
        </li>
        <li class="breadcrumb-item active">Kontak</li>
      </ol>

      <?php
        $dt_tampil = mysqli_fetch_array($mysqli->query("SELECT * FROM tampil"));

      ?>
      <!-- Content Row -->
      <div class="row">
        <!-- Map Column -->
        <div class="col-lg-8 mb-4 card shadow">
          <!-- Embedded Google Map -->
          <!-- <iframe width="100%" height="400px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps"></iframe> -->
          <iframe width="100%" height="400px" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15816.188124083375!2d112.27496021885366!3d-7.67809319602196!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e78686052f78a9f%3A0xb35f2ef73dd5db60!2sTebel%2C+Bareng%2C+Jombang+Regency%2C+East+Java!5e0!3m2!1sen!2sid!4v1530432294810" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" allowfullscreen></iframe>
        </div>
        <!-- Contact Details Column -->
        <div class="col-lg-4 mb-4 card shadow"><hr>
          <h3>Kontak</h3>
          <p>
            Desa Tebel
            <br>Kec. Jombang Kab. Jombang Prov. Jawa Timur - Indonesia
            <br>
          </p>
          <p>
            <abbr title="Phone">No Telpon </abbr> : <?= $dt_tampil['notelpon']; ?>
          </p>
          <p>
            <abbr title="Email">E-mail </abbr> :
            <a href="mailto:<?= $dt_tampil['email']; ?>"><?= $dt_tampil['email']; ?>
            </a>
          </p><hr>
        </div>
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container -->