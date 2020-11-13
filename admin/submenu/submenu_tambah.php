<?php
if(!defined("INDEX")) die("<center><h1>---<h1></center>");
    if (!empty($_POST['jenis'])) {
        $x = $mysqli->query("SELECT * from menu where id_menu = '$_POST[ket]'");
        $y = mysqli_fetch_array($x);
        if ($_POST['jenis']==2) {
            $sm = mysqli_fetch_array($mysqli->query("SELECT * from submenu where id_submenu=$_POST[p]"));
        }
        if ($_POST['ket']==1) {
            $jd = "Kategori Berita";
        }elseif ($_POST['ket']==2) {
            $jd = "Kategori Halaman";
        }elseif ($_POST['ket']==4) {
            $jd = "Kategori Produk";
        }else{
            $jd = "Nama Kegiatan";
        }
        ?>
        <div class="container-fluid">
            <!-- row (nested) -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tambah Kategori 
                        <?php 
                            if($_POST['jenis']==1){
                                if ($_POST['ket']==1) {
                                    echo "Berita";
                                }elseif ($_POST['ket']==2) {
                                    echo "Halaman";
                                }elseif ($_POST['ket']==4) {
                                    echo "Produk";
                                }else{
                                    echo "Galeri";
                                }
                            }else{
                                echo $sm['judul'];
                            }
                        ?>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <?php if($_POST['jenis']==2){
                $sql = $mysqli->query ("SELECT * FROM halaman WHERE idsub = '$_POST[p]' order by id_halaman asc") or die (mysqli_error());?>
                <div class="row">
                    <?php
                    while ($data = mysqli_fetch_array($sql)){
                        $sql_sub = mysqli_num_rows($mysqli->query("SELECT h.id_halaman, s.link FROM halaman h INNER JOIN submenu s ON h.id_halaman = s.link WHERE h.id_halaman=$data[id_halaman]"));
                        if ($sql_sub==0) {
                            ?>
                                <div class="col-xs-2">
                                    <small><?= strtolower(substr($data['judul'], 0,20)); ?></small>
                                </div>
                                <div class="col-xs-1">
                                    <small><?= $data['id_halaman']; ?></small>
                                </div>
                            <?php 
                        }
                    }
                    ?>
            </div>
            <?php } ?>
            <br>
            <!-- panel primary -->
            <div class="panel panel-primary">
                <!-- panel-body -->
                <div class="panel-body">
                    <!-- row (nested) -->
                    <div class="row">
                        <form name="tambah" method="post" action="?tampil=submenu_tambahproses">
                            <input type="hidden" name="id" value="<?php echo $_SESSION['id_user'];?>">
                            <input type="hidden" name="jenis" value="<?php echo $_POST['jenis'];?>">
                            <input type="hidden" name="ket" value="<?php echo $_POST['ket'];?>">
                            <input type="hidden" name="p" value="<?php echo $_POST['p'];?>">
                            <div class="col-lg-12">
                                <?php if($_POST['jenis']==1){?>
                                <div class="form-group">
                                    <label><?= $jd; ?></label>
                                    <input autocomplete="off" maxlength="40" autofocus required name="judul" class="form-control" placeholder="<?= $jd; ?>">
                                </div>
                                <?php } ?>
                                <div class="form-group">
                                    <label>No Urut</label>
                                    <input autofocus autocomplete="off" required name="urutan" class="form-control" placeholder="Urutan">
                                </div>                                    

                                <?php if($_POST['jenis']==2){?>

                                <div class="form-group">
                                    <label>Link</label>
                                    <input autocomplete="off" required name="link" maxlength="40" class="form-control" placeholder="masukkan id sesuai yang ada di halaman">
                                </div>

                                <?php }else{?>

                                <div class="row">
                                    <?php if($_POST['ket']==5) : ?>
                                        <div class="col-md-4">
                                            <label>Tanggal</label>
                                            <input type="date" name="tanggal" required class="form-control">
                                        </div>
                                    <?php endif; ?>
                                    <div class="col-md-8">
                                        <label>Link</label>
                                        <select name="link" class="form-control">
                                        <?php
                                            if ($_POST['ket']==1) {    
                                            echo "<option value='berita'>berita</option>";
                                            }else if ($_POST['ket']==4) {
                                            echo "<option value='produk'>produk</option>";    
                                            }else if ($_POST['ket']==5) {
                                            echo "<option value='galeri'>galeri</option>";    
                                            }else if ($_POST['ket']==2) {
                                            echo "<option value='halaman'>halaman</option>";    
                                            }
                                        ?>
                                        </select>
                                    </div>
                                </div>
                                <?php }?>
                                <br>
                                <button type="tambah" name="tambah" class="btn btn-outline btn-primary">Simpan</button>
                            </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- end panel primary -->
        </div>
        <?php 
    }else{
        echo"<div class='container-fluid'><div class='row'><div class='col-lg-12'><h1 class='page-header'>KONTEN TIDAK ADA</h1></div></div></div>";
    }
?>