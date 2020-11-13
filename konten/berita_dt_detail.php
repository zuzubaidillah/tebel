<?php
    $id_posting = $_GET['k'];

    $sql_ps     = $mysqli->query("SELECT * FROM posting WHERE idposting=$id_posting");
    $dt_ps      = mysqli_fetch_array($sql_ps);
    $nm_ps      = mysqli_num_rows($sql_ps);

    if ($nm_ps==0) {
        echo"<div class='container-fluid'><div class='row'><div class='col-lg-12'><h1 class='page-header text-center'>KONTEN TIDAK ADA</h1></div></div></div>";
      echo "<meta http-equiv ='refresh'content='1; url=?tampil=home'>";
      die;
    }

    $dt_submenu = mysqli_fetch_array($mysqli->query("SELECT * FROM submenu WHERE id_submenu=$dt_ps[jenisposting]"));
    $kat_sm     = $dt_submenu['judul'];
    $nm_titel   = $dt_ps['judulposting'] ." - ";
    $judul      = preg_replace("/\s+/", "-",$dt_ps['judulposting']);
    $tanggal    = tgl_indonesia($dt_ps['tanggal']);
    $lihat      = $dt_ps['hits'];
    $sql_mn     = $mysqli->query("SELECT * from menu where jenis = 1 order by urutan");
    $data_mn    = mysqli_fetch_array($sql_mn);
    $mysqli->query("UPDATE posting set hits=hits+1 where idposting=$id_posting");
    $nama_powered = explode('.', $dt_ps['id_user']);
    $nama_powered = strtolower(end($nama_powered));
?>
    <!--   masukkan isi -->
    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <h2 class="mt-4 mb-3 text-uppercase"><?= $dt_ps['judulposting']; ?></h2>

      <ol class="breadcrumb shadow">
        <li class="breadcrumb-item">
          <a href="?tampil=home">Home</a>
        </li>
        <li class="breadcrumb-item active">
          <a href="?tampil=berita">Berita</a>
        </li>
        <li class="breadcrumb-item active">
          <a href="?tampil=berita&w=<?= $dt_submenu['id_submenu']; ?>"><?= $kat_sm; ?></a>
        </li>
        <li class="breadcrumb-item active text-tittel"><?= $judul; ?></li>
      </ol>

      <div class="row" >

        <!-- Post Content Column -->
        <div class="col-lg-8 col-md-8 col-sm-12 card shadow text-justifi">

          <!-- Preview Image -->
          <img class="img-fluid rounded" style="margin-top:  15px;" src="gambar/berita/<?= $dt_ps['gambar']; ?>" alt="">

          <hr>

          <!-- Date/Time -->
          <p style="margin: 1px; font-size: 16px;" class="font-italic lead">
            <strong>posting oleh :</strong> <?= $nama_powered .'<strong> | Hari : </strong>'. $tanggal .'<strong> |  Di Lihat : </strong>'. $lihat.'x'; ?>
          </p>
          <hr>

          <!-- Post Content -->
          <?= $dt_ps['isi']; ?>
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
        <div class="col-md-4">
          <?php include 'sidebar_kanan_dt.php'; ?>
        </div>
      </div>
      <!-- /.row -->
<br>
    </div>
    <!-- /.container -->
    <!-- /.masukkan isi -->