<?php
if(!defined("INDEX")) die("<center><h1>---<h1></center>");
    if (!empty($_GET['p']) and !empty($_GET['c']) and !empty($_GET['c']=='berita') and $_GET['ket']==1) {
        $pos		= $mysqli->query ("SELECT * FROM submenu where id_submenu = '$_GET[p]'") or die (mysqli_error());
        $judul		= mysqli_fetch_array($pos);
        $judulpos	= $judul['judul'];
        // $tampil     = $mysqli->query ("SELECT * FROM posting") or die (mysqli_error());
        ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="page-header">Berita <?php echo $judulpos; ?></h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <form name="tambah" method="post" action="?tampil=<?php echo $_GET['c'];?>_tambah">
                        <input type="hidden" name="ket" value="<?php echo $_GET['ket']; ?>">
                        <input type="hidden" name="p" value="<?php echo $_GET['p']; ?>">
                        <input type="hidden" name="hal" value="<?php echo $_GET['hal'];?>">
                        <input type="hidden" name="c" value="<?php echo $_GET['c'];?>">
                       <button type="tambah" class="btn btn-outline btn-primary">Tambah</button>
                    </form>
                </div>
                <div class="col-md-4">
                    <form action="?tampil=berita&c=<?= $_GET['c']; ?>&ket=<?= $_GET['ket']; ?>&p=<?= $_GET['p']; ?>&hal=1" method="post">
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
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                           	<table>
                                <thead>
                                    <tr>
                                        <th width="3%">#</th>
                                        <th width="5%">Aksi</th>
                                        <th width="8%">Judul</th>
                                        <th width="10%">Gambar</th>
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
                                        	$hal       = isset($_GET['hal']) ? $_GET['hal'] : 1;
                                        	$batas     = 50;
                                        	$posisi    = ($hal-1)* $batas;
                                        	$no        = $hal + ($hal - 1) * ($batas - 1);
                                            if (isset($_POST["cari"])) {
                                                // $berita = cari($_POST["keyword"]);
                                        		$tampil = $mysqli->query ("SELECT * FROM posting where judulposting LIKE '%$_POST[keyword]%' and jenisposting = '$_GET[p]' order by idposting DESC limit $posisi, $batas") or die (mysqli_error());
                                        	}else{
                                        		$tampil = $mysqli->query ("SELECT * FROM posting where jenisposting = '$_GET[p]' order by tanggal desc limit $posisi, $batas") or die (mysqli_error());
                                        	}
                                        	while ($data   = mysqli_fetch_array($tampil)){
                                        	   $tanggal    = tgl_indonesia($data['tanggal']);
                                    	?>
                                        <tr>
                                            <td width="1%"><?php echo $no; ?></td>
                                            <td width="5%">
                                                    <a target="_blank" name="lihat" title="lihat Data" href="index.php?tampil=berita-detail&k=<?= $data['idposting']; ?>" class="btn btn-danger btn-circle">
                                                        <i class="fa fa-eye "></i>
                                                    </a>
                                                <form style="display: inline-block;" name="edit" method="post" action="?tampil=<?php echo $_GET['c']; ?>_edit">
                                                    <input type="hidden" name="id" value="<?php echo $data['idposting']; ?>">
                                                    <input type="hidden" name="p" value="<?php echo $_GET['p']; ?>">
                                                    <input type="hidden" name="ket" value="<?php echo $_GET['ket'];?>">
                                                    <input type="hidden" name="c" value="<?php echo $_GET['c'];?>">
                                                    <input type="hidden" name="hal" value="<?php echo $_GET['hal'];?>">
                                                    <button name="edit" title="Edit Data" type="edit" class="btn btn-info btn-circle">
                                                        <i class="fa fa-pencil-square "></i>
                                                    </button>
                                                </form>
                                                <form style="display: inline-block;" onclick="return confirm('YAKIN DATA BRITA AKAN DIHAPUS??');" name="hapus" method="post" action="?tampil=<?php echo $_GET['c']; ?>_hapus">
                                                    <input type="hidden" name="id" value="<?php echo $data['idposting']; ?>">
                                                    <input type="hidden" name="p" value="<?php echo $_GET['p']; ?>">
                                                    <input type="hidden" name="ket" value="<?php echo $_GET['ket'];?>">
                                                    <input type="hidden" name="c" value="<?php echo $_GET['c'];?>">
                                                    <input type="hidden" name="hal" value="<?php echo $_GET['hal'];?>">
                                                    <button name="hapus" title="Hapus Data" type="hapus" class="btn btn-warning btn-circle">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </form>
                                            </td>
                                            <td width="8%"><?php echo $data['judulposting']; ?></td>
                                            <?php 
                                        		if($data['gambar']==''){
                                        			$v = '-';
                                        		}else{
                                        			$v = '1';
                                        		}
                                        	?>
                                            <td width="10%"><img src="gambar/berita/<?php echo $data['gambar']; ?>" width="100"  /></td>
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
                            if (isset($_POST["cari"])) {
                                $semua      = $mysqli->query("SELECT * FROM posting where judulposting LIKE '%$_POST[keyword]%' and jenisposting = '$_GET[p]'");
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
                                                            <form style='display: inline-block;' action='?tampil=berita&c=$_GET[c]&ket=$_GET[ket]&p=$_GET[p]&hal=1' method='post'>
                                                                <input type='hidden' name='keyword' value='$_POST[keyword]'>
                                                                <button name='cari' type='submit'  class='btn btn-social-icon btn-default'><i class='fa fa-angle-double-left'></i></button>
                                                            </form>
                                                            <form style='display: inline-block;' action='?tampil=berita&c=$_GET[c]&ket=$_GET[ket]&p=$_GET[p]&hal=$sebelumnya' method='post'>
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
                                        }else{
                                        }
                            }else{
                                $semua      = $mysqli->query("SELECT * FROM posting where jenisposting = '$_GET[p]'");
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
                            ?>
                        </div>
                    </div>
                    <!-- /.panel -->
                </div>        
            </div>
        </div>
        <?php
    }else{
        echo"<div class='container-fluid'><div class='row'><div class='col-lg-12'><h1 class='page-header'>KONTEN TIDAK ADA</h1></div></div></div>";
        echo "<meta http-equiv ='refresh'content='1; url=?tampil=beranda'>";
    }
?>