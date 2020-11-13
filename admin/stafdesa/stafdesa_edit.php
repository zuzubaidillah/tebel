<?php
if(!defined("INDEX")) die("<center><h1>---<h1></center>");
    if (!empty($_POST['id'])) {
        $sql = $mysqli->query ("SELECT * FROM user WHERE id_user='$_POST[id]'") or die (mysqli_error());
        $data = mysqli_fetch_array($sql);
        if($_POST['level']==2){
            $user_judul = "Edit Staf Desa";
        }elseif($_POST['level']==3) {
            $user_judul = "Lihat User";
        }
        ?>
        <div class="container-fluid">
            <!-- row (nested) -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?php echo $user_judul; ?></h1>
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
                        <form enctype="multipart/form-data" name="edit" role="form" action="?tampil=stafdesa_editproses" method="post">

                            <!-- <input type="hidden" name="id_user" value="<?php //echo $_SESSION['id_user'];?>"/> -->
                            <input type="hidden" name="id" value="<?php echo $data['id_user'];?>"/>
                            <input type="hidden" name="level" value="<?php echo $data['level'];?>"/>
                            <!-- <input type="hidden" name="getlevel" value="<?php //echo $_POST['level'];?>"/> -->

                            <?php  
                              if($_POST['level']==3){  
                                ?>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input autocomplete="off" maxlength="70" readonly name="nama" value="<?php echo $data['nama']; ?>" class="form-control" placeholder="Nama user">
                                </div>
                                <div class="form-group">
                                    <label>Bagian</label>
                                    <input autocomplete="off" maxlength="40" readonly name="job" value="<?php echo $data['job']; ?>" class="form-control" placeholder="Bagian Pekerjaan">
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input autocomplete="off"  maxlength="70" readonly name="alamat" value="<?php echo $data['alamat']; ?>" class="form-control" placeholder="Alamat">
                                </div>
                                <div class="form-group">
                                    <label>Jenis Kelamin</label><br>
                                    <?php
                                    if ($data['lp']=='Laki - Laki') {
                                    echo "
                                    <label class='radio-inline'>
                                        <input type='radio' name='lp' checked>Laki - Laki
                                    </label>
                                    <label class='radio-inline'>
                                        <input type='radio' name='lp'>Perempuan
                                    </label>
                                    "; 
                                    }else{
                                    echo "
                                    <label class='radio-inline'>
                                        <input type='radio' name='lp' >Laki - Laki
                                    </label>
                                    <label class='radio-inline'>
                                        <input type='radio' name='lp' checked>Perempuan
                                    </label>
                                    ";                                 
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input readonly value="<?php echo $data['username']; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input readonly  value="<?php echo $data['password']; ?>" class="form-control">
                                </div>
                                <?php  
                                    $sql_us     = $mysqli->query("SELECT * FROM user WHERE id_user='$data[created]'");
                                    $dt_created = mysqli_fetch_array($sql_us);
                                        $nm = $dt_created['nama'];
                                ?>
                                <div class="form-group">
                                    <label>Di Buat Oleh</label>
                                    <input readonly name="created" value="<?php echo $nm; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Bagian</label>
                                    <input value="<?php echo $data['bagian']; ?>" class="form-control" readonly>
                                </div>
                            </div>
                            <?php  
                                }else{
                            ?>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input autocomplete="off" maxlength="70" required name="nama" value="<?php echo $data['nama']; ?>" class="form-control" placeholder="Nama user">
                                </div>
                                <div class="form-group">
                                    <label>Bagian</label>
                                    <input readonly autocomplete="off" maxlength="40" required name="job" value="<?php echo $data['job']; ?>" class="form-control" placeholder="Bagian Pekerjaan">
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input autocomplete="off" maxlength="70" required name="alamat" value="<?php echo $data['alamat']; ?>" class="form-control" placeholder="Alamat">
                                </div>                                
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Jenis Kelamin</label><br>
                                    <?php
                                    if ($data['lp']=='Laki - Laki') {
                                    echo "
                                    <label class='radio-inline'>
                                        <input type='radio' name='lp' id='Laki - Laki' value='Laki - Laki' checked>Laki - Laki
                                    </label>
                                    <label class='radio-inline'>
                                        <input type='radio' name='lp' id='Perempuan' value='Perempuan'>Perempuan
                                    </label>
                                    "; 
                                    }else{
                                    echo "
                                    <label class='radio-inline'>
                                        <input type='radio' name='lp' id='Laki - Laki' value='Laki - Laki'>Laki - Laki
                                    </label>
                                    <label class='radio-inline'>
                                        <input type='radio' name='lp' id='Perempuan' value='Perempuan' checked>Perempuan
                                    </label>
                                    ";                                 
                                    }
                                    ?>
                                </div>
                                <div class="form-group">
                                    <label>Foto</label>
                                    <input type="file" name="gambar">
                                    <img width="150" src="gambar/user/<?php echo $data['foto'];?>">
                                    <img width="150" src="gambar/user/200x200.jpg">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <button type="submit" name="edit" class="btn btn-outline btn-primary">Edit Selesai</button>
                            </div>                    
                            <?php  } ?>
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