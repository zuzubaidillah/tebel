<?php
    if(!defined("INDEX")) die("<center><h1>---<h1></center>");
    if (!empty($_POST['p'])) {
        // security mengatasi url &p=12 diubah2
        $sql_sbb = $mysqli->query ("SELECT * FROM submenu where id_submenu = '$_POST[p]' AND link='halaman'") or die (mysqli_error());
            $nm_smb     = mysqli_num_rows($sql_sbb);
        if ($nm_smb==0) {
            echo"<div class='container-fluid'><div class='row'><div class='col-lg-12'><h1 class='page-header'>DiCEKAL</h1></div></div></div>";
            echo "<meta http-equiv ='refresh'content='1; url=?tampil=beranda'>";
                die;
        }
        $pos        = $mysqli->query ("SELECT * FROM submenu where id_submenu = '$_POST[p]'") or die (mysqli_error());
        $judul      = mysqli_fetch_array($pos);
        $judulpos   = $judul['judul'];
        ?>
        <div class="container-fluid">
            <!-- row (nested) -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tambah Halaman <?php echo $judulpos; ?></h1>
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
                        <form name="tambah" role="form" action="?tampil=halaman_tambahproses" method="post">
                            <input type="hidden" name="c" value="<?php echo $_POST['c'];?>">
                            <input type="hidden" name="p" value="<?php echo $_POST['p']; ?>">
                            <input type="hidden" name="ket" value="<?php echo $_POST['ket'];?>">
                            <input type="hidden" name="hal" value="<?php echo $_POST['hal'];?>">
                            <div class="col-lg-12">
                                <div class="form-group">
                                        <label>Judul Halaman</label>
                                        <input autocomplete="off" maxlength="70" required name="judul" class="form-control" placeholder="Judul Halaman" autofocus>
                                </div>
                                <div class="form-group">
                                        <label>Urutan</label>
                                        <input maxlength="3" required name="urutan" class="form-control" placeholder="Urutan Halaman">
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
                                <div class="form-group">
                                    <label>Isi Halaman</label>
                                    <textarea class="tynimce" name="isi" cols="91" rows="15"></textarea>
                                </div>                                 
                                <button type="tambah" name="tambah" class="btn btn-outline btn-primary">Simpan</button>
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