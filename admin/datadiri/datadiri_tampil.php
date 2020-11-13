<?php
    if(!defined("INDEX")) die("<center><h1>---<h1></center>");
    // if (!empty($_POST['id'])) {
        $sql_user = $mysqli->query("SELECT * FROM user WHERE id_user='$_SESSION[id_user]'") or die (mysqli_error());
        $dt_user = mysqli_fetch_array($sql_user);
        $nm_user = $dt_user['nama'];
        ?>

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Data Diri <?php echo $nm_user; ?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <center> Biodata</center>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                                        <div class="col-md-3 col-xs-3">
                                            <label>Nama</label>
                                        </div>
                                        <div class="col-md-9 col-xs-9">
                                            <input readonly class="form-control" value="<?php echo $dt_user['nama'] ?>">
                                        </div>
                                        <div class="col-md-3 col-xs-3">
                                            <label>Alamat</label>
                                        </div>
                                        <div class="col-md-9 col-xs-9">
                                            <input readonly class="form-control" value="<?php echo $dt_user['alamat'] ?>">
                                        </div>
                                        <div class="col-md-3 col-xs-3">
                                            <label>Pekerjaan</label>
                                        </div>
                                        <div class="col-md-9 col-xs-9">
                                            <input readonly class="form-control" value="<?php echo $dt_user['job'] ?>">
                                        </div>
                                        <div class="col-md-3 col-xs-3">
                                            <label>Jenis Kelamin</label>
                                        </div>
                                        <div class="col-md-9 col-xs-9">
                                            <input readonly class="form-control" value="<?php echo $dt_user['lp'] ?>">
                                        </div>
                                        <div class="col-md-3 col-xs-3">
                                            <label>Bagian</label>
                                        </div>
                                        <div class="col-md-9 col-xs-9">
                                            <input readonly class="form-control" value="<?php echo $dt_user['bagian'] ?>">
                                        </div>
                                        <div class="col-md-3 col-xs-3">
                                        </div>
                                        <div class="col-md-9 col-xs-9">
                                            <form method="post" action="?tampil=datadiri_edit" name="edit">
                                                <button type="submit" name="edit" title="Edit User" class="btn btn-info btn-circle btn-xl">
                                                    <input type="hidden" name="id" value="<?php echo($_SESSION['id_user']); ?>">
                                                        <i class="fa fa-sign-in fax3"></i>
                                                </button>
                                            </form>
                                        </div>                           
                            </div>
                        </div>
                </div>        
            </div>
        </div>
        <?php 
    // }else{
    //     die("<center><h1>---<h1></center>");
    // }
?>