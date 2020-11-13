<!-- if(!defined("INDEX")) die("<center><h1>---<h1></center>"); -->
<!-- <style>
    .dropdown:hover>.dropdown-menu{
      display: block;
    }
  </style> -->
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">

  <a href="?tampil=home">
    <img src="gambar/website desatebel.png" height="40" width="200">
  </a>

  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarResponsive">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="?tampil=home">HOME</a>
      </li>

      <?php
      $sql_sm = $mysqli->query("SELECT * FROM submenu WHERE id_menu=2 and jenis=1 order by urutan");
      while ($tm_sm = mysqli_fetch_array($sql_sm)) :
      ?>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?= strtoupper($tm_sm['judul']); ?>
          </a>
          <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdownPortfolio">
            <?php
            $sql_sm2 = $mysqli->query("SELECT * FROM halaman WHERE idsub='$tm_sm[id_submenu]'");
            while ($tm_sm2 = mysqli_fetch_array($sql_sm2)) :
            ?>
              <a class="dropdown-item" href="?tampil=halaman-detail&k=<?= $tm_sm2['id_halaman']; ?>"><?= strtolower($tm_sm2['judul']); ?></a>
            <?php endwhile; ?>
          </div>
        </li>
      <?php endwhile; ?>

      <li class="nav-item">
        <a class="nav-link" href="?tampil=berita">BERITA</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="?tampil=produk">PRODUK</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="?tampil=galeri">GALERI</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="?tampil=staf-desa">STAFDESA</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="?tampil=kontak">KONTAK</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="admin">LOGIN</a>
      </li>
    </ul>
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;

    <!-- form pencarian -->
    <!-- <ul class="nav navbar-nav navbar-right"> -->
    <form action="?tampil=berita" class="form-inline my-2 my-lg-0" method="post">
      <input name="keyword" class="form-control mr-sm-2" type="search" placeholder="Cari Berita Lalu Enter" aria-label="Search" autocomplete="off">
      <!-- <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button> -->
    </form>
    <!-- </ul> -->
    <!-- /. form pencarian -->

  </div>

</nav>