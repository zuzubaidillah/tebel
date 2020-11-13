<?php
if(!defined("INDEX")) header("Location: index.php");
    if (!empty($_SESSION['username'])) {
        //$use    = mysqli_query("SELECT * FROM user");
        // $use = $mysqli->query("SELECT * FROM user WHERE id_user = '1'");
        $use    = $mysqli->query("SELECT * FROM user WHERE id_user = '$_SESSION[id_user]'");
        $dat    = mysqli_fetch_array($use);
        $a  = $mysqli->query("SELECT * FROM posting");
        $b  = $mysqli->query("SELECT * FROM halaman");
        $g  = $mysqli->query("SELECT * FROM galeri WHERE jenis='galeri'");
        $p  = $mysqli->query("SELECT * FROM galeri WHERE jenis='produk'");
        $aa = number_format(mysqli_num_rows($a));
        $bb = number_format(mysqli_num_rows($b));
        $tt = number_format($aa+$bb);
        $gg = number_format(mysqli_num_rows($g));
        $pp = number_format(mysqli_num_rows($p));
        $zz = number_format($gg+$pp);
        ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Beranda</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-4 col-md-4 col-xs-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-laptop fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $aa; ?></div>
                                    <div>Jumlah Berita</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-xs-4">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $bb; ?></div>
                                    <div>Jumlah Halaman</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-xs-4">
                            <div class="panel panel-yellow">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-shopping-cart fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge"><?php echo $tt; ?></div>
                                            <div>Jumlah Total</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-xs-4">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-briefcase fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $pp; ?></div>
                                    <div>Jumlah Produk</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-xs-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-camera-retro fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $gg; ?></div>
                                    <div>Jumlah Galeri</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-xs-4">
                            <div class="panel panel-yellow">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-shopping-cart fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge"><?php echo $zz; ?></div>
                                            <div>Jumlah Total</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                </div>
            </div>
        </div>
        <?php
    }else{
        header("Location: index.php");
        exit;
    }
// }  else {
//     echo "<meta http-equiv ='refresh'content='1; url=index.php'>";
// }
?>