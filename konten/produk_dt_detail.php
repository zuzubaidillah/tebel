<?php
    $id_galeri = $_GET['k'];
    $sql_pr     = $mysqli->query("SELECT * FROM galeri WHERE id_galeri=$id_galeri");
    $dt_pr      = mysqli_fetch_array($sql_pr);
    $nm_ps      = mysqli_num_rows($sql_pr);

    if ($nm_ps==0) {
        echo"<div class='container-fluid'><div class='row'><div class='col-lg-12'><h1 class='page-header text-center'>KONTEN TIDAK ADA</h1></div></div></div>";
      echo "<meta http-equiv ='refresh'content='1; url=?tampil=home'>";
      die;
    }
    
    $dt_submenu = mysqli_fetch_array($mysqli->query("SELECT * FROM submenu WHERE id_submenu=$dt_pr[kategori]"));
    $kat_sm     = $dt_submenu['judul'];
    $nm_titel   = $dt_pr['judul'] ." - ";
    $judul      = preg_replace("/\s+/", "-",$dt_pr['judul']);
    $tanggal    = tgl_indonesia($dt_pr['tanggal']);
?>
    <!--   masukkan isi -->
    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <h2 class="mt-4 mb-3 text-uppercase"><?= $dt_pr['judul']; ?></h2>

      <ol class="breadcrumb shadow">
        <li class="breadcrumb-item">
          <a href="?tampil=home">Home</a>
        </li>
        <li class="breadcrumb-item active">
          <a href="?tampil=produk">Produk</a>
        </li>
        <!-- <li class="breadcrumb-item active">
          <a href="?tampil=berita"><?= $kat_sm; ?></a>
        </li> -->
        <li class="breadcrumb-item active text-tittel"><?= $judul; ?></li>
      </ol>

      <div class="row" >

        <!-- Post Content Column -->
        <div class="col-lg-8 col-md-8 col-sm-12 card shadow text-justifi">

          <!-- Preview Image -->
          <img title="<?= $dt_pr['judul']; ?>" class="img-fluid rounded" style="margin-top:  15px;" src="gambar/produk/<?= $dt_pr['gambar']; ?>" alt="">

          <hr>

          <!-- Date/Time -->
          <p style="margin: 1px; font-size: 16px;" class="font-italic lead">
            <strong>Hari : </strong> <?= $tanggal .'<strong> |  Produk dari : </strong>'. $kat_sm .' Desa Tebel'; ?>
          </p>
          <hr>

          <!-- Post Content -->
          <?= $dt_pr['keterangan']; ?>
          <br>
          <br>
          <blockquote class="blockquote">
            <footer class="blockquote-footer">Terima Kasih Telah
              <cite title="Source Title">Berkunjung<img src="template/admin/tinymce/plugins/emoticons/img/smiley-smile.gif" alt="smile" /></cite>
            </footer>
          </blockquote>
          <hr>
        </div>

        <br>
        <!-- Sidebar Widgets Column -->
        <div class="col-lg-4 col-md-4 col-sm-12">
          <?php include 'sidebar_kanan_dt.php'; ?>
        </div>
      </div>
      <!-- /.row -->
<br>
    </div>
    <!-- /.container -->
    <!-- /.masukkan isi -->