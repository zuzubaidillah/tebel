<?php
    if(!defined("INDEX")) die("<center><h1>---<h1></center>");
    if (!empty($_POST['c'])) {
        // security mengatasi url &p=12 diubah2
        $sql_sbb = $mysqli->query ("SELECT * FROM submenu where id_submenu = '$_POST[p]' AND link='galeri'") or die (mysqli_error());
            $nm_smb     = mysqli_num_rows($sql_sbb);
        if ($nm_smb==0) {
            echo"<div class='container-fluid'><div class='row'><div class='col-lg-12'><h1 class='page-header'>DiCEKAL</h1></div></div></div>";
            echo "<meta http-equiv ='refresh'content='1; url=?tampil=beranda'>";
                die;
        }
        $pos        = $mysqli->query ("SELECT * FROM submenu where id_submenu = '$_POST[p]'") or die (mysqli_error());
        $judul      = mysqli_fetch_array($pos);
        $tampil = $mysqli->query ("SELECT * FROM posting") or die (mysqli_error());
        if ($_POST['p']=='slide') {
            $judulpos = "Daftar Slide";
        }else{
            $judulpos = "Tambah Galeri ".$judul['judul'];
        }
        ?>
        <div class="container-fluid">
            <!-- row (nested) -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?php echo $judulpos; ?></h1>
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
                        <form name="tambah" method="post" action="?tampil=galeri_tambahproses" enctype="multipart/form-data">
                            <input type="hidden" name="p" value="<?php echo $_POST['p'] ;?>" size="50">
                            <input type="hidden" name="ket" value="<?php echo $_POST['ket'] ;?>" size="50">
                            <input type="hidden" name="c" value="<?php echo $_POST['c'] ;?>" size="50">
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-md-8">
                                        <label>Judul Galeri</label>
                                        <input autocomplete="off" maxlength="60" autofocus required name="judul" class="form-control" placeholder="Judul" value="gambar">
                                    </div>
                                </div><br>
                                <div class="form-group">
                                    <label class="labgambar">Gambar</label>
                                    <input name="gambar" type="file" class="inblock"><small>gambar wajib diisi     *jpg jpeg png</small>
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="tambah" class="btn btn-outline btn-primary">Simpan</button>
                                </div>
                            </div>&nbsp;&nbsp;&nbsp;
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