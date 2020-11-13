<?php
if(!defined("INDEX")) die("<center><h1>---<h1></center>");
    if (!empty($_POST['level'])) {
        if($_POST['level']==1){
        $menu_judul = "User";
        }else{
        $menu_judul = "Staf Desa";
        }
        ?>
        <div class="container-fluid">
            <!-- row (nested) -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tambah <?php echo $menu_judul; ?></h1>
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
                        <form name="tambah" role="form" action="?tampil=stafdesa_tambahproses" method="post">
                            <input type="hidden" name="id_user" value="<?php echo $_SESSION['id_user'];?>">
                            <input type="hidden" name="level" value="<?php echo $_POST['level'];?>">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input autocomplete="off" maxlength="70" autofocus required name="nama" class="form-control" placeholder="Nama">
                                </div>
                                <div class="form-group">
                                    <label>Bagian</label>
                                    <input autocomplete="off" maxlength="40" required name="job" class="form-control" placeholder="Pekerjaan Bagian">
                                </div>     
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input autocomplete="off" maxlength="70" required name="alamat" class="form-control" placeholder="Alamat">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input autocomplete="off" maxlength="70" required type="text" name="username" class="form-control" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input autocomplete="off"  required type="password" name="password" class="form-control" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <label>Jenis Kelamin</label><br>
                                    <label class="radio-inline">
                                        <input type="radio" name="lp" id="Laki - Laki" value="Laki - Laki" checked>Laki - Laki
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="lp" id="Perempuan" value="Perempuan">Perempuan
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label>Bagian</label><br>
                                    <select name="bagian" class="form-control">
                                        <?php if ($_SESSION['bagian']=="admin") : ?>
                                            <option value="admin">Admin</option>
                                        <?php endif; ?>
                                        <option value="staf">Staf</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" name="tambah" class="btn btn-outline btn-primary">Simpan</button>
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