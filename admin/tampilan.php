<?php
if(!defined("INDEX")) die("<center><h1>---<h1></center>");
    $dt=mysqli_fetch_array($mysqli->query("SELECT * FROM tampil WHERE id_tampil=1"));
    if(isset($_REQUEST['submit'])){
        $titel      = htmlspecialchars($_REQUEST['titel']);
        $tahun      = htmlspecialchars($_REQUEST['tahun']);
        $email      = htmlspecialchars($_REQUEST['email']);
        $notelpon   = htmlspecialchars($_REQUEST['notelpon']);
        $info       = addslashes($_REQUEST['info']);
        $sql=$mysqli->query("UPDATE tampil SET 
            titel       = '$titel',
            notelpon    = '$notelpon',
            email       = '$email',
            info        = '$info',
            tahun       = '$tahun' WHERE id_tampil=1");
        if($sql > 0){
            echo "
                    <div class='container-fluid'>
                        <div class='row'>
                            <div class='col-lg-12'>
                                <center>
                                    <img src='../gambar/loading2.gif'>
                                    <h2 class='page-header' style='display: inline-block;'>
                                        Loading. . . . .
                                    </h2>
                                </center>
                            </div>
                        </div>
                    </div>
                    ";
            echo "<meta http-equiv ='refresh'content='1; url=?tampil=tampilan'>";
            die();
        } else {
            echo 'ada ERROR dg query';
        }
    } else {
?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h2>Update Tampilan</h2>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <hr>
        <form method="post" action="?tampil=tampilan" class="form-horizontal" role="form" >
            <div class="form-group">
                <label for="titel" class="col-sm-2 control-label">Titel WebSite</label>
                <div class="col-sm-8">
                    <input autocomplete="off" maxlength="40" type="text" value="<?php echo $dt['titel']; ?>" class="form-control" id="titel" name="titel" placeholder="Nama Titel" required autofocus>
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="col-sm-2 control-label">E-mail</label>
                <div class="col-sm-7">
                    <input autocomplete="off" type="text" maxlength="50" value="<?php echo $dt['email']; ?>" class="form-control" id="email" name="email" placeholder="E-Mail" required>
                </div>
            </div>
            <div class="form-group">
                <label for="notelpon" class="col-sm-2 control-label">No Telpon</label>
                <div class="col-sm-6">
                    <input type="text" maxlength="15" value="<?php echo $dt['notelpon']; ?>" class="form-control" id="notelpon" name="notelpon" placeholder="No Telpon" required>
                </div>
            </div>
            <div class="form-group">
                <label for="tahun" class="col-sm-2 control-label">Tahun</label>
                <div class="col-sm-5">
                    <input autocomplete="off" type="text" value="<?php echo $dt['tahun']; ?>" class="form-control" id="tahun" name="tahun" placeholder="Tahun" required>
                </div>
            </div>
            <div class="form-group">
                <label for="info" class="col-sm-2 control-label">Informasi</label>
                <div class="col-sm-5">
                    <textarea id="info" name="info"><?php echo $dt['info']; ?></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
<?php
    }
?>