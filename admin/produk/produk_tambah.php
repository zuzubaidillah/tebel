<?php
    if(!defined("INDEX")) die("<center><h1>---<h1></center>");
    if (!empty($_POST['c'])) {
        // security mengatasi url &p=12 diubah2
        $sql_sbb = $mysqli->query ("SELECT * FROM submenu where id_submenu = '$_POST[p]' AND link='produk'") or die (mysqli_error());
            $nm_smb     = mysqli_num_rows($sql_sbb);
        if ($nm_smb==0) {
            echo"<div class='container-fluid'><div class='row'><div class='col-lg-12'><h1 class='page-header'>DiCEKAL</h1></div></div></div>";
            echo "<meta http-equiv ='refresh'content='1; url=?tampil=beranda'>";
                die;
        }

        $pos        = $mysqli->query ("SELECT * FROM submenu where id_submenu = '$_POST[p]'") or die (mysqli_error());
        $judul      = mysqli_fetch_array($pos);
        $judulpos   = $judul['judul'];
        $tampil = $mysqli->query ("SELECT * FROM posting") or die (mysqli_error());
        ?>
        <div class="container-fluid">
            <!-- row (nested) -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tambah Produk <?php echo $judulpos; ?></h1>
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
                        <form name="tambah" method="post" action="?tampil=produk_tambahproses" enctype="multipart/form-data">
                            <input type="hidden" name="c" value="<?php echo $_POST['c'] ;?>" size="50">
                            <input type="hidden" name="ket" value="<?php echo $_POST['ket'] ;?>" size="50">
                            <input type="hidden" name="p" value="<?php echo $_POST['p'] ;?>" size="50">
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-md-8">
                                        <label>Nama Produk</label>
                                        <input autocomplete="off" maxlength="40" autofocus required name="judul" class="form-control" placeholder="Judul">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label style="display: block;">Gambar Produk</label>
                                    <input name="gambar" type="file" style="display: inline-block;"><small>gambar wajib diisi     *jpg jpeg png</small><br>
                                    <img src="gambar/produk/700x400.png" width="250"/>
                                </div>
                                <div class="col-lg-12">
                                    <div class="panel panel-red">
                                        <div class="panel-heading">
                                            Pemberitahuan
                                        </div>
                                        <div class="panel-body">
                                            <p>Jika didalam keterangan anda akan memasukkan gambar. Tolong anda masuk kan Script ini agar gambar tersebut dapat menjadi resolusi <strong>class="img-fluid"</strong><br>
                                                Caranya : MASUKKAN GAMBAR TERLEBIH DAHULU Lalu Klik tanda ini <strong><></strong> lalu pilih Kode Gambar yaitu < img src=""><br>
                                                Setelah itu tambahkan scrip seperti ini <strong>class="img-fluid"</strong><br>
                                                Contoh : <br>
                                                < img <strong>class="img-fluid"</strong> src="" >
                                            </p>
                                        </div>
                                    </div>
                                    <!-- /.col-lg-4 -->
                                </div>
                                <div class="form-group"><br>
                                    <label>Isi</label>
                                    <textarea class="tynimce" name="keterangan" cols="91" rows="15"></textarea>
                                </div>
                                <button type="submit" name="tambah" class="btn btn-outline btn-primary">Simpan</button>
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
        echo"<div class='container-fluid'><div class='row'><div class='col-lg-12'><h1 class='page-header'>KONTEN TIDAK ADA</h1></div></div></div>";
    }
?>