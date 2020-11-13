<?php
    if(!defined("INDEX")) die("<center><h1>---<h1></center>");
    if (!empty($_POST['p'])) {
        $pos        = $mysqli->query ("SELECT * FROM submenu where id_submenu = '$_POST[p]'") or die (mysqli_error());
        $judul      = mysqli_fetch_array($pos);
        $judulpos   = strtolower($judul['judul']);
        $tampil = $mysqli->query ("SELECT * FROM posting") or die (mysqli_error());
        $tampil = $mysqli->query ("SELECT * FROM posting WHERE idposting = '$_POST[id]'") or die (mysqli_error());
        $data = mysqli_fetch_array($tampil);
        ?>
        <div class="container-fluid">
            <!-- row (nested) -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Berita <?php echo $judulpos; ?></h1>
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
                        <form name="edit" method="post" role="form" action="?tampil=<?php echo $_POST['c']; ?>_editproses" enctype="multipart/form-data">                      
                            <input type="hidden" name="p" value="<?php echo $_POST['p'] ;?>" size="50">
                            <input type="hidden" name="ket" value="<?php echo $_POST['ket'] ;?>" size="50">
                            <input type="hidden" name="c" value="<?php echo $_POST['c'] ;?>" size="50">
                            <input type="hidden" name="hal" value="<?php echo $_POST['hal'] ;?>" size="50">
                            <input type="hidden" name="id" value="<?php echo $data['idposting'];?>" />
                            <div class="col-lg-12">                       
                                <div class="row">
                                    <div class="col-md-8">
                                        <label>Judul Berita</label>
                                        <input autocomplete="off" required maxlength="70" name="judul" value="<?php echo $data['judulposting']; ?>" class="form-control" placeholder="Judul Berita">
                                    </div>
                                    <div class="col-md-4">
                                        <label>Tanggal</label>
                                        <input required name="tanggal"  class="form-control" type="date" value="<?php echo $data['tanggal']; ?>">
                                    </div>
                                </div><br>
                                <div class="form-group">
                                    <label>Gambar</label><small>&nbsp;&nbsp;&nbsp;&nbsp;*jpg jpeg png</small>
                                    <input type="file" name="gambar">
                                    <img src="gambar/berita/<?php echo $data['gambar']; ?>" width="250"/>
                                    <img src="gambar/berita/700x400.png" width="250"  /><br>
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
                                    <label>Isi</label>
                                    <textarea name="isi">
                                    <?php echo $data['isi'];?>
                                    </textarea>
                                </div>
                                <button type="edit" name="edit" class="btn btn-outline btn-primary">Edit Selesai</button>
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