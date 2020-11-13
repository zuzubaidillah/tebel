<?php
    if(!defined("INDEX")) die("<center><h1>---<h1></center>");
    if (!empty($_GET['jenis']) AND !empty($_GET['ket']) AND !empty($_GET['jenis']==1) or !empty($_GET['jenis']==2) ) {
        if ($_GET['ket']==1) {
            $sm = "Berita";
        }elseif ($_GET['ket']==2) {
            $sm = "Halaman";
        }elseif ($_GET['ket']==4) {
            $sm = "Produk";
        }else{
            $sm = "Galeri";
        }
        ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Daftar Kategori 
                        <?php 
                            if($_GET['jenis']==1){
                                echo "$sm";
                            }
                        ?>
                    </h1>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-md-8">
                    <?php if (1==$_GET['ket'] or 2==$_GET['ket'] or 4==$_GET['ket'] or 5==$_GET['ket']) : ?>
                    <form name="tambah" method="post" action="?tampil=submenu_tambah">
                        <input type="hidden" name="jenis" value="<?php echo $_GET['jenis'];?>">
                        <input type="hidden" name="ket" value="<?php echo $_GET['ket'];?>">
                        <input type="hidden" name="p" value="<?php echo $_GET['p'];?>">
                       <button type="submit" class="btn btn-outline btn-primary btn-md">Tambah Kategori</button>
                    </form>
                    <?php endif; ?>
                </div>
                <div class="col-md-4">
                    <form action="?tampil=submenu&jenis=<?= $_GET['jenis']; ?>&ket=<?= $_GET['ket']; ?>&hal=1" method="post">
                        <div class="input-group">
                            <input type="text" name="keyword" class="form-control" placeholder="Cari Judul..." autocomplete="off">
                            <span class="input-group-btn">
                                <button name="cari" class="btn btn-default" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
            <br>
            <!-- /.row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                           	<table>
                                <thead>
                                    <tr>
                                        <th width="3%">#</th>
                                        <th width="5%">Aksi</th>
                                        <th width="8%">Nama Kategori</th>
                                        <?php if ($_GET['ket']==5) { ?>
                                            <th width="10%">Tanggal</th>
                                        <?php }else{ ?>
                                            <th width="10%">Link</th>
                                        <?php } ?>
                                        <th width="5%">Urutan</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <tbody>
                                        <?php
                                            include ("lib/fungsi_tglindonesia.php");
                                            $hal       = isset($_GET['hal']) ? $_GET['hal'] : 1;
                                            $batas     = 10;
                                            $posisi    = ($hal-1)* $batas;
                                            $no        = $hal + ($hal - 1) * ($batas - 1);
                                            if (isset($_POST["cari"])) {
                                                if ($_GET['jenis']==1) {
                                                    $sql = $mysqli->query ("SELECT * FROM submenu WHERE judul LIKE '%$_POST[keyword]%' AND jenis = '$_GET[jenis]' AND id_menu = '$_GET[ket]' ORDER BY urutan ASC limit $posisi, $batas") or die (mysqli_error());
                                                }
                                            }else{
                                                if ($_GET['jenis']==1) {
                                                    $sql = $mysqli->query ("SELECT * FROM submenu WHERE jenis = '$_GET[jenis]' AND id_menu = '$_GET[ket]' ORDER BY urutan ASC limit $posisi, $batas") or die (mysqli_error());
                                                }
                                            }
                                            while ($data = mysqli_fetch_array($sql)){
                                                    $sqlmenu    = $mysqli->query("SELECT * FROM menu WHERE id_menu = '$data[id_menu]'");
                                                    $datamenu   = mysqli_fetch_array($sqlmenu);
                                        ?>
                                        <tr>
                                            <td width="1%"><?php echo $no; ?></td>
                                            <td width="5%">
                                                <?php if ($_GET['jenis']==1) : ?>
                                                    <a name="tambah" title="Tambah Data" href="?tampil=<?= strtolower($sm); ?>&c=<?= strtolower($sm); ?>&ket=<?= $_GET['ket']; ?>&p=<?= $data['id_submenu']; ?>&hal=1" class="btn btn-danger btn-circle">
                                                        <i class="fa fa-plus"></i>
                                                    </a>
                                                <?php endif; ?>
                                                <form style="display: inline-block;" name="edit" method="post" action="?tampil=submenu_edit">
                                                    <input type="hidden" name="id" value="<?php echo $data['id_submenu']; ?>">
                                                    <input type="hidden" name="jenis" value="<?php echo $_GET['jenis']; ?>">
                                                    <input type="hidden" name="ket" value="<?php echo $_GET['ket'];?>">
                                                    <input type="hidden" name="p" value="<?php echo $_GET['p'];?>">
                                                    <button name="edit" title="Edit Data" type="edit" class="btn btn-info btn-circle">
                                                        <i class="fa fa-pencil-square "></i>
                                                    </button>
                                                </form>
                                                <form style="display: inline-block;" name="hapus" method="post" action="?tampil=submenu_hapus">
                                                    <input type="hidden" name="id" value="<?php echo $data['id_submenu']; ?>">
                                                    <input type="hidden" name="jenis" value="<?php echo $_GET['jenis']; ?>">
                                                    <input type="hidden" name="ket" value="<?php echo $_GET['ket'];?>">
                                                    <button onclick="return confirm('YAKIN DATA SUBMENU AKAN DIHAPUS??');" name="hapus" title="Hapus Data" type="hapus" class="btn btn-warning btn-circle">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </form>
                                            </td>
                                            <td width="8%"><?php echo substr($data['judul'],0,20); ?></td>
                                            <?php if ($_GET['ket']==5) { $tanggal=tgl_indonesia($data['tanggal']); ?>
                                                <td width="10%"><?php echo $tanggal; ?></td>
                                            <?php }else{ ?>
                                                <td width="10%"><?php echo $data['link']; ?></td>
                                            <?php } ?>
                                            <td width="5%"><?php echo $data['urutan']; ?></td>
                                        </tr>
                                        <?php 
                                            $no++ ; 
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                            <!-- /.panel-body -->
                            <?php  
                            if (isset($_POST["cari"])) {
                                if ($_GET['jenis']==1) {
                                    $semua = $mysqli->query ("SELECT * FROM submenu WHERE judul LIKE '%$_POST[keyword]%' AND jenis = '$_GET[jenis]' AND id_menu = '$_GET[ket]' ORDER BY urutan ASC");
                                }
                                $jmldata    = mysqli_num_rows($semua);
                                $jmlhal     = ceil($jmldata/$batas);
                                $sebelumnya = $hal-1;
                                $berikutnya = $hal+1;
                                echo "
                                    <div class='row'>
                                        <div class='col-sm-6'>
                                            <div style='margin-top: 25px;'>Jumlah : $jmldata</div>
                                        </div>
                                            ";
                                        if($jmldata>$batas){
                                            echo "
                                            <div class='col-sm-6'>
                                                <div class='dataTables_info'>
                                                    <div class='text-center'>
                                                        ";
                                                        // bagian 1
                                                        if($hal > 1){
                                                            echo "
                                                            <form style='display: inline-block;' action='?tampil=submenu&jenis=$_GET[jenis]&ket=$_GET[ket]&hal=1' method='post'>
                                                                <input type='hidden' name='keyword' value='$_POST[keyword]'>
                                                                <button name='cari' type='submit'  class='btn btn-social-icon btn-default'><i class='fa fa-angle-double-left'></i></button>
                                                            </form>
                                                            <form style='display: inline-block;' action='?tampil=submenu&jenis=$_GET[jenis]&ket=$_GET[ket]&hal=$sebelumnya' method='post'>
                                                                <input type='hidden' name='keyword' value='$_POST[keyword]'>
                                                                <button name='cari' type='submit'  class='btn btn-social-icon btn-default'><i class='fa fa-angle-left'></i></button>
                                                            </form>
                                                            ";  
                                                        }else{
                                                            echo "
                                                                <button disabled class='btn btn-social-icon btn-default'><i class='fa fa-angle-double-left'></i></button>
                                                                <button disabled class='btn btn-social-icon btn-default'><i class='fa fa-angle-left'></i></button>
                                                            ";
                                                        }
                                                        // bagian 2
                                                        for($i=1; $i <= $jmlhal; $i++){
                                                            if($i==$hal)
                                                                echo "
                                                                    <button disabled class='btn btn-social-icon btn-default'><i>$i</i></button>
                                                                    ";
                                                            else
                                                                echo "
                                                                    <form style='display: inline-block;' action='?tampil=submenu&jenis=$_GET[jenis]&ket=$_GET[ket]&hal=$i' method='post'>
                                                                        <input type='hidden' name='keyword' value='$_POST[keyword]'>
                                                                        <button name='cari' type='submit' class='btn btn-social-icon btn-default'><i>$i</i></button>
                                                                    </form>
                                                                    ";
                                                        }
                                                        // bagian 3
                                                        if($hal < $jmlhal){
                                                            echo "
                                                            <form style='display: inline-block;' action='?tampil=submenu&jenis=$_GET[jenis]&ket=$_GET[ket]&hal=$berikutnya' method='post'>
                                                                <input type='hidden' name='keyword' value='$_POST[keyword]'>
                                                                <button name='cari' type='submit'  class='btn btn-social-icon btn-default'><i class='fa fa-angle-right'></i></button>
                                                            </form>
                                                            <form style='display: inline-block;' action='?tampil=submenu&jenis=$_GET[jenis]&ket=$_GET[ket]&hal=$jmlhal' method='post'>
                                                                <input type='hidden' name='keyword' value='$_POST[keyword]'>
                                                                <button name='cari' type='submit'  class='btn btn-social-icon btn-default'><i class='fa fa-angle-double-right'></i></button>
                                                            </form>
                                                            ";
                                                            $_SESSION['no_galeri'] = $no++;
                                                        }else{    
                                                            echo "
                                                                <button disabled class='btn btn-social-icon btn-default'><i class='fa fa-angle-right'></i></button>
                                                                <button disabled class='btn btn-social-icon btn-default'><i class='fa fa-angle-double-right'></i></button>
                                                            ";
                                                        }
                                                        echo "
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            ";
                                        }else{
                                        }
                            }else{
                                if ($_GET['jenis']==1) {
                                    $semua = $mysqli->query ("SELECT * FROM submenu WHERE jenis = '$_GET[jenis]' AND id_menu = '$_GET[ket]' ORDER BY urutan ASC") or die (mysqli_error());
                                }
                                $jmldata    = mysqli_num_rows($semua);
                                $jmlhal     = ceil($jmldata/$batas);
                                $sebelumnya = $hal-1;
                                $berikutnya = $hal+1;
                                echo "
                                    <div class='row'>
                                        <div class='col-sm-6'>
                                            <div style='margin-top: 25px;'>Jumlah : $jmldata</div>
                                        </div>
                                            ";
                                        if($jmldata>$batas){
                                            echo "
                                            <div class='col-sm-6'>
                                                <div class='dataTables_info'>
                                                    <ul class='pagination'>
                                                        ";
                                                        // bagian 1
                                                        if($hal > 1){
                                                            echo "<li class='paginate_button previous'>
                                                                        <a href='?tampil=submenu&jenis=$_GET[jenis]&ket=$_GET[ket]&hal=1'>&laquo;</a>
                                                                    </li>";
                                                            echo "<li class='paginate_button previous'>
                                                                        <a href='?tampil=submenu&jenis=$_GET[jenis]&ket=$_GET[ket]&hal=$sebelumnya'><</a>
                                                                    </li>";
                                                        }else{
                                                            echo "<li class='paginate_button previous disabled'>
                                                                        <a>&laquo;</a>
                                                                    </li>";
                                                            echo "<li class='paginate_button previous disabled'>
                                                                        <a><</a>
                                                                    </li>";
                                                        }
                                                        // bagian 2
                                                        for($i=1; $i <= $jmlhal; $i++){
                                                            if($i==$hal)
                                                                echo "<li class='paginate_button disabled'>
                                                                        <a>$i</a>
                                                                    </li>";
                                                            else
                                                                echo "<li class='paginate_button'>
                                                                        <a href='?tampil=submenu&jenis=$_GET[jenis]&ket=$_GET[ket]&hal=$i'>$i</a>
                                                                    </li>";
                                                        }
                                                        // bagian 3
                                                        if($hal < $jmlhal){
                                                            echo "<li class='paginate_button previous'>
                                                                        <a href='?tampil=submenu&jenis=$_GET[jenis]&ket=$_GET[ket]&hal=$berikutnya'>></a>
                                                                    </li>";
                                                            echo "<li class='paginate_button previous'>
                                                                        <a href='?tampil=submenu&jenis=$_GET[jenis]&ket=$_GET[ket]&hal=$jmlhal'>&raquo;</a>
                                                                    </li>";
                                                            $_SESSION['no_galeri'] = $no++;
                                                        }else{    
                                                            echo "<li class='paginate_button previous disabled'>
                                                                        <a>></a>
                                                                    </li>";
                                                            echo "<li class='paginate_button previous disabled'>
                                                                        <a>&raquo;</a>
                                                                    </li>";
                                                        }
                                                        echo "
                                                    </ul>
                                                </div>
                                            </div>
                                            </div>
                                            ";
                                        }else{
                                        }
                            }
                            ?>
                        </div>
                        <!-- /.panel -->
                    </div>
                </div>
            </div>
        </div>
        <?php 
    }else{
        echo"<div class='container-fluid'><div class='row'><div class='col-lg-12'><h1 class='page-header'>KONTEN TIDAK ADA</h1></div></div></div>";
    }
?>