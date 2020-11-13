<?php
    if(!defined("INDEX")) die("<center><h1>---<h1></center>");
    if (!empty($_POST['id'])) {
        $pos        = $mysqli->query ("SELECT * FROM submenu where id_submenu = '$_POST[p]'") or die (mysqli_error());
        $judul      = mysqli_fetch_array($pos);
        $judulpos   = $judul['judul'];
        $tampil     = $mysqli->query ("SELECT * FROM posting") or die (mysqli_error());
        $tampil     = $mysqli->query ("SELECT * FROM galeri WHERE id_galeri = '$_POST[id]'") or die (mysqli_error());
        $data       = mysqli_fetch_array($tampil);
        if ($_POST['p']=='slide') { 
            $nm_judul='Slide';
        }else{
            $nm_judul='Galeri ';
        }
        ?>
        <div class="container-fluid">
            <!-- row (nested) -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit <?php echo $nm_judul; echo $judulpos; ?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <!-- panel primary -->
            <div class="panel panel-primary">
                <!-- panel-body -->
                <div class="panel-body">
                    <!-- row (nested) -->
                    <div class="row">
                        <form name="edit" method="post" role="form" action="?tampil=galeri_editproses" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?php echo $data['id_galeri'];?>">
                            <input type="hidden" name="p" value="<?php echo $_POST['p'] ;?>" size="50">
                            <input type="hidden" name="c" value="<?php echo $_POST['c'] ;?>" size="50">
                            <?php if($_POST['p'] != "slide") : ?>
                            <input type="hidden" name="ket" value="<?php echo $_POST['ket'];?>">
                            <input type="hidden" name="hal" value="<?php echo $_POST['hal'] ;?>">
                            <input type="hidden" name="keterangan" value="-">
                            <?php endif; ?>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Gambar</label>
                                    <input type="file" name="gambar">
                                    <?php if ($_POST['p']=='slide') { ?>
                                        <img src="gambar/slide/<?php echo $data['gambar']; ?>" width="250"  />
                                        <img src="gambar/slide/1900x1080.png" width="250"  /><br>
                                    <?php }else{ ?>
                                        <img src="gambar/galeri/<?php echo $data['gambar']; ?>" width="250"  />
                                    <?php } ?>
                                </div>
                                <div class="form-group">
                                    <label>Judul <?= $nm_judul; ?></label>
                                    <input autocomplete="off" maxlength="60" autofocus required name="judul" value="<?php echo $data['judul']; ?>" class="form-control" placeholder="Judul Menu">
                                </div>
                                <?php if ($_POST['p']=='slide') : ?>
                                <div class="form-group">
                                    <label>Keterangan</label>
                                    <input autocomplete="off" maxlength="70" required name="keterangan" value="<?php echo $data['keterangan']; ?>" class="form-control" placeholder="keterangan">
                                </div>
                                <?php endif; ?>
                                <button type="submit" name="tambah" class="btn btn-outline btn-primary">Simpan</button>
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
        echo("<center><h1>---<h1></center>");
    }
?>