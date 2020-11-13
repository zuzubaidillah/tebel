<?php
    $id_halaman = $_GET['k'];
    $sql_hl     = $mysqli->query("SELECT * FROM halaman WHERE id_halaman=$id_halaman");
    $dt_hl      = mysqli_fetch_array($sql_hl);
    $nm_ps      = mysqli_num_rows($sql_hl);

    if ($nm_ps==0) {
        echo"<div class='container-fluid'><div class='row'><div class='col-lg-12'><h1 class='page-header text-center'>KONTEN TIDAK ADA</h1></div></div></div>";
      echo "<meta http-equiv ='refresh'content='1; url=?tampil=home'>";
      die;
    }
    
    $nm_titel   = $dt_hl['judul'] ." - ";
    $judul      = preg_replace("/\s+/", "-",$dt_hl['judul']);
    $tanggal    = tgl_indonesia($dt_hl['tanggal']);
    //sql dari sidebar kanan buat kategori
    $sql_mn     = $mysqli->query("SELECT * from menu where jenis = 1 order by urutan");
    $data_mn    = mysqli_fetch_array($sql_mn);
    // $judul = $judul;
?>
    <!--   masukkan isi -->
    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
    <h2 class="mt-4 mb-3 text-uppercase"><?= $dt_hl['judul']; ?></h2>

      <ol class="breadcrumb shadow">
        <li class="breadcrumb-item">
          <a href="?tampil=home">Home</a>
        </li>
        <li class="breadcrumb-item active">
          <a href="#">Halaman</a>
        </li>
        <li class="breadcrumb-item active text-tittel"><?= $judul; ?></li>
      </ol>

      <div class="row" >

        <!-- Post Content Column -->
        <div class="col-lg-8 col-md-8 col-sm-12 card shadow text-justifi">

          <hr>

          <!-- Post Content -->
          <?= $dt_hl['isi']; ?>
          
          <br>
          <br>
          <hr>
          <blockquote class="blockquote">
            <footer class="blockquote-footer">
              <strong> Hari : </strong><?= $tanggal; ?>
            </footer>
          </blockquote>
          
        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">
          <?php include 'sidebar_kanan_dt.php'; ?>
        </div>

      </div>
      <!-- /.row -->
<br>
    </div>
    <!-- /.container -->
    <!-- /.masukkan isi -->