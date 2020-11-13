<?php 
    session_start();
    if(!empty($_SESSION['username']) and !empty($_SESSION['password'])){
        include("lib/koneksi.php");
        define("INDEX",true);
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="description" content="">
            <meta name="author" content="">
            <title>Halaman Admin Desa Tebel</title>
            <link rel="icon" href="gambar/favicon.png" type="image/ico" />
            
            <!-- Bootstrap Core CSS -->
            <link href="template/admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
            <!-- MetisMenu CSS -->
            <link href="template/admin/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
            <link href="template/admin/vendor/bootstrap-social/bootstrap-social.css" rel="stylesheet">
            <!-- Custom CSS -->
            <link href="template/admin/dist/css/sb-admin-2.css" rel="stylesheet">
            <!-- Custom Fonts -->
            <link href="template/admin/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <!-- Include JS file. -->
            <style type="text/css">
                textarea {
                    z-index: -1;
                }
                /*-------------- submenu ---------------*/
                #menu li:hover ul{
                    display: block;
                }
                figure .image { display : inline-block ; border : 1px solid gray ; margin : 0 2px 0 1px ; background : #f5f2f0 ; } figure .align-left { float : left ; } figure .align-right { float : right ; } figure .image img { margin : 8px 8px 0 8px ; } figure .image figcaption { margin : 6px 8px 6px 8px ; text-align : center ; } 
                div .inblock {
                    display: inline-block;
                }
                div .labgambar {
                    display: block;
                }

            </style>
        <script type="text/JavaScript" src="template/admin/tinymce/tinymce.min.js"></script>
         <script type="text/JavaScript" src="template/admin/tinymce_mod.js">
        </script>
        </head>
            <body>
                <div id="wrapper">
                    <!-- Navigation -->
                    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="?tampil=beranda">Administrator Desa Tebel</a>
                        </div>
                        <!-- /.navbar-header -->
                        <?php include("admin/menu_atas.php") ?>
                        <?php include("admin/menu_kiri.php") ?>
                    </nav>
                    <div id="page-wrapper">
                        <?php include("konten/konten.php"); ?>
                    </div>
                    <!-- /#page-wrapper -->
                </div>
                <!-- /#wrapper -->
                <?php  
                    $dt=mysqli_fetch_array($mysqli->query("SELECT * FROM tampil"))
                ?>
                <!-- FOOTER -->
                <div id="footer" style="height: 65px; margin: 0 auto;  color: #1933EC; background-color:#f8f8f8; border:1px solid rgb(216, 215, 215);">
                    <p style="  padding: 12px 0 0; text-align: center;">
                        &copy;  Administrator Ds.Tebel&nbsp;<?php echo $dt['tahun']; ?> &nbsp;<br>
                        <small class="right">KKN UNWAHA 2018 - kelompok sekawan 4</small>
                    </p>
                </div>
                <!--END FOOTER -->
                <script src="template/admin/vendor/jquery/jquery.min.js"></script>
                <!-- Bootstrap Core JavaScript -->
                <script src="template/admin/vendor/bootstrap/js/bootstrap.min.js"></script>
                <!-- Metis Menu Plugin JavaScript -->
                <script src="template/admin/vendor/metisMenu/metisMenu.min.js"></script>
                <!-- Custom Theme JavaScript -->
                <script src="template/admin/dist/js/sb-admin-2.js"></script>
                <!-- <script src="template/admin/javascripts/jquery-3.2.1.slim.min.js"></script> -->
            </body>
        </html>
        <?php
    }else{
        header("Location: index.php");
        exit;
    }
?>