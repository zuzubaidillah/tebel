<?php
if(!defined("INDEX")) die("<center><h1>---<h1></center>");
    if (!empty($_GET['level'])) {
        if($_GET['level']==1){
            $menu_judul = "User";
        }elseif($_GET['level']==2) {
            $menu_judul = "Staf Desa";
        }else{
            $menu_judul = "";
        }
        ?>

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Data <?php echo $menu_judul; ?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            
            <?php
                $sql_user = $mysqli->query("SELECT * from user where id_user=$_SESSION[id_user]");
                $num_user = mysqli_num_rows($sql_user);
                $dta_user = mysqli_fetch_array($sql_user);
            ?>
            <div class="row">
                <div class="col-md-12">            
                <!-- BAGIAN USER -->
                <?php
                // tampilkan tambah jika level user
                    if($_GET['level']==1){
                ?>
                    <?php if($_SESSION['bagian']=="admin") : ?>
                    <!-- /. level==1 adalah USER jika selain 1 maka STAFDESA -->
                    <form name="tambah" method="post" action="?tampil=stafdesa_tambah">
                        <input type="hidden" name="level" value="<?php echo $_GET['level'];?>">
                        <button type="tambah" class="btn btn-outline btn-primary btn-xs">Tambah <?php echo $menu_judul; ?></button>
                    </form>
                    <br>
                    <?php endif; ?>
                <?php
                    }
                ?>
                <!-- END./ BAGIAN STAFF DESA -->
                    <!-- Panel -->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                           	<table>
                                <thead>
                                    <tr>
                                        <th width="3%">#</th>
                                        <?php if($_SESSION['bagian']=="admin"){ ?>
                                        <th width="6%">Aksi</th>
                                        <?php }?>
                                        <?php if($_GET['level']==2){ ?>
                                        <th width="10%">Foto</th>
                                        <?php }?>                                        
                                        <th width="8%">Nama</th>
                                        <th width="10%">Pekerjaan</th>
                                        <th width="2%">Level</th>
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
                                        $no = 1;
                                        $sql = $mysqli->query ("SELECT * FROM user where level='$_GET[level]'") or die (mysqli_error());
                                        while ($data = mysqli_fetch_array($sql)){
                                    ?>
                                        <tr>
                                            <td width="2%"><?php echo $no; ?></td>
                                            <?php
                                                if($_SESSION['bagian']=="admin" and $_GET['level']==1){
                                            ?>
                                            <td width="6%">
                                                <form style="display: inline-block;" name="lihat" method="post" action="?tampil=stafdesa_edit">                                                    
                                                    <input type="hidden" name="id" value="<?php echo $data['id_user']; ?>">
                                                    <input type="hidden" name="level" value="3">
                                                    <button name="lihat" title="Lihat Data" type="lihat" class="btn btn-info btn-circle">
                                                        <i class="fa fa-eye "></i>
                                                    </button>
                                                </form>
                                                <form style="display: inline-block;" name="hapus" method="post" action="?tampil=stafdesa_hapus">
                                                            <input type="hidden" name="id" value="<?php echo $data['id_user']; ?>">
                                                            <input type="hidden" name="level" value="<?php echo $_GET['level'];?>">
                                                    <button onclick="return confirm('YAKIN DATA INI AKAN DIHAPUS??');" name="hapus" title="Hapus Data" type="hapus" class="btn btn-warning btn-circle">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </form>
                                            </td>
                                            <?php }elseif($_GET['level']==2) {
                                            ?>
                                            <td width="6%">
                                                <form style="display: inline-block;" name="lihat" method="post" action="?tampil=stafdesa_edit">
                                                    <input type="hidden" name="id" value="<?php echo $data['id_user']; ?>">
                                                    <input type="hidden" name="level" value="<?php echo $_GET['level'];?>">
                                                    <button name="lihat" title="Lihat Data" type="lihat" class="btn btn-info btn-circle">
                                                        <i class="fa fa-pencil-square "></i>
                                                    </button>
                                                </form>
                                            </td>
                                            <td width="5%">
                                                <img src="gambar/user/<?php echo $data['foto']; ?>" width="100">
                                            </td>
                                            <?php }?>
                                            <td width="8%">
                                                <?php echo $data['nama']; ?>
                                            </td>
                                            <td width="10%">
                                                <?php echo $data['job']; ?>
                                            </td>
                                            <td width="2%">
                                                <?php 
                                                    if($data['bagian']=="admin"){ 
                                                        echo "Admin";
                                                    }else{
                                                        echo "Staff Desa";
                                                    }
                                                ?>      
                                            </td>
                                        </tr>
                                    <?php 
                                        $no++ ; 
                                        }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                            <!-- /.panel-body -->
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