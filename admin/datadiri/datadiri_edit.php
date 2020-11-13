<?php
    if(!defined("INDEX")) die("<center><h1>---<h1></center>");
    if (!empty($_POST['id'])) {
        $sql_user = $mysqli->query("SELECT * FROM user WHERE id_user='$_SESSION[id_user]'") or die (mysqli_error());
        $dt_user = mysqli_fetch_array($sql_user);
        $nm_user = $dt_user['nama'];
        ?>

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Data Diri <?php echo $nm_user; ?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <center><label>BIODATA</label></center>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                                <form method="post" action="?tampil=datadiri_editproses" name="edit">
                                    <input type="hidden" name="id" value="<?php echo($_SESSION['id_user']); ?>">
                                <div class="form-group">
                                    <div class="col-xs-3">
                                        <label>Nama</label>
                                    </div>
                                    <div class="col-xs-9">
                                        <input autocomplete="off" maxlength="70" name="nama"  class="form-control" value="<?php echo $dt_user['nama'] ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-3">
                                        <label>Alamat</label>
                                    </div>
                                    <div class="col-xs-9">
                                        <input autocomplete="off" name="alamat" maxlength="100" class="form-control" value="<?php echo $dt_user['alamat'] ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-3">
                                        <label>Pekerjaan</label>
                                    </div>
                                    <div class="col-xs-9">
                                        <input autocomplete="off" name="job" maxlength="40" class="form-control" value="<?php echo $dt_user['job'] ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-3">
                                        <label>Jenis Kelamin</label>
                                    </div>
                                    <div class="col-xs-9">
                                        <label>
                                            <?php  
                                                if ($dt_user['lp']=="Laki - Laki") {
                                            ?>
                                            <input type="radio" name="lp" value="Laki - Laki" checked>Laki - Laki
                                            <input type="radio" name="lp" value="Perempuan">Perempuan
                                            <?php }else{
                                            ?>
                                            <input type="radio" name="lp" value="Laki - Laki">Laki - Laki
                                            <input type="radio" name="lp" value="Perempuan" checked>Perempuan
                                            <?php } ?>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-3">
                                        <label>Username</label>
                                    </div>
                                    <div class="col-xs-9">
                                        <input  autocomplete="off" maxlength="40" name="username" class="form-control" value="<?php echo $dt_user['username'] ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-3">
                                        <label>Password</label>
                                    </div>
                                    <div class="col-xs-9">
                                        <input  autocomplete="off" type="password"  name="password" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-3">
                                        <label>Bagian</label>
                                    </div>
                                    <div class="col-xs-9">
                                    <select name="bagian" class="form-control">
                                        <?php if ($_SESSION['bagian']=="admin") : ?>
                                            <option value="admin">Admin</option>
                                        <?php endif; ?>
                                        <option value="staf">Staf</option>
                                    </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-3">
                                    </div>
                                    <div class="col-xs-9">
                                        <button type="submit" name="edit" title="Selesai Edit" class="btn btn-info btn-circle btn-xl">
                                            <i class="fa fa-check"></i>
                                        </button>
                                    </div>
                                </div>
                                </form>
                            <!-- /.panel -->
                            </div>        
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php  
    }else{
        die("<center><h1>---<h1></center>");
    }
?>