<?php
    if(!defined("INDEX")) die("<center><h1>---<h1></center>");
    $sql=mysqli_fetch_array($mysqli->query("SELECT * FROM submenu where link='$_GET[c]'"));
    if (!empty($_GET['p']) and $_GET['ket']==$sql['id_menu'] and $_GET['c']=='produk') {
        $pos        = $mysqli->query("SELECT * FROM submenu where id_submenu='$_GET[p]'") or die (mysqli_error());
        $judul      = mysqli_fetch_array($pos);
        $judulpos   = $judul['judul'];
        $tampil     = $mysqli->query ("SELECT * FROM posting") or die (mysqli_error());
        $semua      = $mysqli->query("SELECT * FROM galeri where kategori='produk'");
        $jmldata    = mysqli_num_rows($semua);
        ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Daftar Produk <?php echo $judulpos; ?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <?php if ($_GET['p']!='slide') {?>
            <div class="row">
                <div class="col-md-8">
                    <form name="tambah" method="post" action="?tampil=produk_tambah">
                        <input type="hidden" name="c" value="<?php echo $_GET['c']; ?>">
                        <input type="hidden" name="ket" value="<?php echo $_GET['ket']; ?>">
                        <input type="hidden" name="p" value="<?php echo $_GET['p']; ?>">
                       <button type="tambah" class="btn btn-outline btn-primary">Tambah</button>
                    </form>
                </div>
                <div class="col-md-4">
                    <form action="?tampil=produk&c=<?= $_GET['c']; ?>&ket=<?= $_GET['ket']; ?>&p=<?= $_GET['p']; ?>&hal=1" method="post">
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
            <?php } ?>
            <div class="row">
                <div class="col-md-12">
                    <?php if ($_GET['p']!='slide') {?><br><?php } ?>
                    <div class="panel panel-primary">
                        <!-- panel-heading -->
                        <div class="panel-heading">
                           	<table>
                                <thead>
                                    <tr>
                                        <th width="3%">#</th>
                                        <th width="7%">Aksi</th>
                                        <th width="13%">Gambar</th>
                                        <th width="15%">Nama</th>
                                        <th width="5%">Tanggal</th>
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
                                                $hal    = isset($_GET['hal']) ? $_GET['hal'] : 1;
                                                $batas  = 50;
                                                $posisi = ($hal-1)* $batas;
                                                $no = $hal + ($hal - 1) * ($batas - 1);
                                                if (isset($_POST["cari"])) {
                                                    $tampil = $mysqli->query("SELECT * FROM galeri WHERE judul LIKE '%$_POST[keyword]%' and kategori='$_GET[p]' order by id_galeri desc limit $posisi, $batas") or die (mysqli_error());
                                                }else{
                                                    $tampil = $mysqli->query("SELECT * FROM galeri WHERE kategori='$_GET[p]' order by id_galeri desc limit $posisi, $batas") or die (mysqli_error());
                                                }
                                                    while($data=mysqli_fetch_array($tampil)){
                                                        $tanggal    = tgl_indonesia($data['tanggal']);
                                            ?>
                                            <tr>
                                                <td width="2%"><?php echo $no; ?></td>
                                                <td width="5%">
                                                    <a target="_blank" name="lihat" title="lihat Data" href="index.php?tampil=produk-detail&k=<?= $data['id_galeri']; ?>" class="btn btn-danger btn-circle">
                                                        <i class="fa fa-eye "></i>
                                                    </a>
                                                    <form style="display: inline-block;" name="edit" method="post" action="?tampil=produk_edit">
                                                        <input type="hidden" name="id" value="<?php echo $data['id_galeri']; ?>">
                                                        <input type="hidden" name="p" value="<?php echo $_GET['p']; ?>">
                                                        <input type="hidden" name="ket" value="<?php echo $_GET['ket'];?>">
                                                        <input type="hidden" name="c" value="<?php echo $_GET['c'];?>">
                                                        <input type="hidden" name="hal" value="<?php echo $_GET['hal'];?>">
                                                        <button name="edit" title="Edit Data" type="edit" class="btn btn-info btn-circle">
                                                            <i class="fa fa-pencil-square "></i>
                                                        </button>
                                                    </form>
                                                    <?php if ($_GET['p']!='slide') {?>
                                                    <form style="display: inline-block;" name="hapus" method="post" action="?tampil=produk_hapus">
                                                        <input type="hidden" name="id" value="<?php echo $data['id_galeri']; ?>">
                                                        <input type="hidden" name="c" value="<?php echo $_GET['c'];?>">
                                                        <input type="hidden" name="ket" value="<?php echo $_GET['ket'];?>">
                                                        <input type="hidden" name="p" value="<?php echo $_GET['p']; ?>">
                                                        <input type="hidden" name="hal" value="<?php echo $_GET['hal']; ?>">
                                                        <button onclick="return confirm('YAKIN DATA PRODUK AKAN DIHAPUS??');" name="hapus" title="Hapus Data" type="hapus" class="btn btn-warning btn-circle">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                    </form>
                                                    <?php } ?>
                                                </td>
                                                <td width="5%">
                                                    <img src="gambar/produk/<?php echo $data['gambar']; ?>" width="150" />
                                                </td>
                                                <td width="15%"><?php echo $data['judul']; ?></td>
                                                <td width="5%"><?php echo $tanggal; ?></td>
                                            </tr>
                                            <?php 
                                                $no++ ; 
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            <?php  
                            if ($_GET['p']!='slide') {
                                if (isset($_POST["cari"])) {
                                    $semua      = $mysqli->query("SELECT * FROM galeri where judul LIKE '%$_POST[keyword]%' and kategori = '$_GET[p]'");
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
                                                                <form style='display: inline-block;' action='?tampil=produk&c=$_GET[c]&ket=$_GET[ket]&p=$_GET[p]&hal=1' method='post'>
                                                                    <input type='hidden' name='keyword' value='$_POST[keyword]'>
                                                                    <button name='cari' type='submit'  class='btn btn-social-icon btn-default'><i class='fa fa-angle-double-left'></i></button>
                                                                </form>
                                                                <form style='display: inline-block;' action='?tampil=produk&c=$_GET[c]&ket=$_GET[ket]&p=$_GET[p]&hal=$sebelumnya' method='post'>
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
                                                                        <form style='display: inline-block;' action='?tampil=$_GET[c]&c=$_GET[c]&ket=$_GET[ket]&p=$_GET[p]&hal=$i' method='post'>
                                                                            <input type='hidden' name='keyword' value='$_POST[keyword]'>
                                                                            <button name='cari' type='submit' class='btn btn-social-icon btn-default'><i>$i</i></button>
                                                                        </form>
                                                                        ";
                                                            }
                                                            // bagian 3
                                                            if($hal < $jmlhal){
                                                                echo "
                                                                <form style='display: inline-block;' action='?tampil=$_GET[c]&c=$_GET[c]&ket=$_GET[ket]&p=$_GET[p]&hal=$berikutnya' method='post'>
                                                                    <input type='hidden' name='keyword' value='$_POST[keyword]'>
                                                                    <button name='cari' type='submit'  class='btn btn-social-icon btn-default'><i class='fa fa-angle-right'></i></button>
                                                                </form>
                                                                <form style='display: inline-block;' action='?tampil=$_GET[c]&c=$_GET[c]&ket=$_GET[ket]&p=$_GET[p]&hal=$jmlhal' method='post'>
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
                                            }
                                }else{
                                        $semua      = $mysqli->query("SELECT * FROM galeri where kategori = '$_GET[p]'");
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
                                                                            <a href='?tampil=$_GET[c]&c=$_GET[c]&ket=$_GET[ket]&p=$_GET[p]&hal=1'>&laquo;</a>
                                                                        </li>";
                                                                echo "<li class='paginate_button previous'>
                                                                            <a href='?tampil=$_GET[c]&c=$_GET[c]&ket=$_GET[ket]&p=$_GET[p]&hal=$sebelumnya'><</a>
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
                                                                            <a href='?tampil=$_GET[c]&c=$_GET[c]&ket=$_GET[ket]&p=$_GET[p]&hal=$i'>$i</a>
                                                                        </li>";
                                                            }
                                                            // bagian 3
                                                            if($hal < $jmlhal){
                                                                echo "<li class='paginate_button previous'>
                                                                            <a href='?tampil=$_GET[c]&c=$_GET[c]&ket=$_GET[ket]&p=$_GET[p]&hal=$berikutnya'>></a>
                                                                        </li>";
                                                                echo "<li class='paginate_button previous'>
                                                                            <a href='?tampil=$_GET[c]&c=$_GET[c]&ket=$_GET[ket]&p=$_GET[p]&hal=$jmlhal'>&raquo;</a>
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
                            }
                            ?>
                            </div>
                            <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>        
            </div>
        </div>
        <?php 
    }else{
        // echo"<div class='container-fluid'><div class='row'><div class='col-lg-12'><h1 class='page-header'>KONTEN TIDAK ADA</h1></div></div></div>";
        // echo "<meta http-equiv ='refresh'content='1; url=?tampil=beranda'>";
    }
?>