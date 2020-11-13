<?php
  $coon         = mysqli_num_rows($mysqli->query("SELECT * FROM submenu WHERE link='berita'"));
  $coon         = ceil($coon / 2);
  $sql_kt       = $mysqli->query("SELECT * FROM submenu WHERE link='berita' order by urutan LIMIT 0,$coon");
  $sql_kt2      = $mysqli->query("SELECT * FROM submenu WHERE link='berita' order by urutan LIMIT $coon,$coon");
?>
<!-- Categories Widget -->
<div class="shadow card mb-4">
  <h5 class="card-header">Kategori</h5>
  <div class="card-body">
    <div class="row">
      <div class="col-6">
        <ul class="list-unstyled mb-0">
          <?php while($iki_satu = mysqli_fetch_array($sql_kt)) : ?>
            <li>
              <a href="?tampil=berita&w=<?= $iki_satu['id_submenu']; ?>" class="text-uppercase"><?= $iki_satu['judul']; ?></a>
            </li>
          <?php endwhile; ?>
        </ul>
      </div>

      <div class="col-6">
        <ul class="list-unstyled mb-0">
          <?php while($iki_dua = mysqli_fetch_array($sql_kt2)) : ?>
            <li>
              <a href="?tampil=berita&w=<?= $iki_dua['id_submenu']; ?>" class="text-uppercase"><?= $iki_dua['judul']; ?></a>
            </li>
          <?php endwhile; ?>
        </ul>
      </div>
    </div>
  </div>
</div>

<!-- Produk -->
<?php
  $sql_produk         = $mysqli->query("SELECT * FROM galeri WHERE jenis='produk' ORDER BY tanggal desc LIMIT 8");
  $nm_produk          = mysqli_num_rows($sql_produk);
  if ($nm_produk>=1) :
?>
<div class="card shadow my-4">
  <h5 class="card-header">Produk</h5>
  <div class="card-body">
    <div class="row">
        <?php while($dt_produk = mysqli_fetch_array($sql_produk)) : ?>
      <div class="col-6 col-xs-12 col-md-12 col-lg-6 mb-2">
          <a title="<?= $dt_produk['judul']; ?>" href="?tampil=produk-detail&k=<?= $dt_produk['id_galeri']; ?>">
            <img width="100" height="60" class="" alt="Responsive image" src="gambar/produk/<?= $dt_produk['gambar']; ?>">
          </a>
      </div>
        <?php endwhile; ?>
    </div>
  </div>
</div>
<?php endif; ?>
<!-- Side Widget -->
<div class="shadow card my-4">
  <h5 class="card-header">Berita Terbaru</h5>
  <div class="card-body">
    <div class="row">
      <div class="col-lg-12">
        <table class="table table-hover">
          <tbody>
            <?php 
              $sql_br = $mysqli->query("SELECT * FROM posting WHERE kategori='berita' ORDER BY tanggal desc LIMIT 8");
              while($iki_berita = mysqli_fetch_array($sql_br)) : ?>
                <tr>
                  <td class="text-uppercase">
                    <a href="?tampil=berita-detail&k=<?= $iki_berita['idposting']; ?>"><?= $iki_berita['judulposting']; ?></a>
                  </td>
                </tr>
              <?php endwhile; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
          