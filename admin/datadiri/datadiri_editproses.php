<?php
    if(!defined("INDEX")) die("<center><h1>---<h1></center>");
    if (!empty($_POST['id'])) {
        $dt_id_user     = uniqid();
        $tanggal        = date('ymd');
        $nama_foto      = $dt_id_user.''.$nama_pic;
        $nama           = htmlspecialchars($_POST['nama']);
        $alamat         = htmlspecialchars($_POST['alamat']);
        $job            = htmlspecialchars($_POST['job']);
        $username       = strtolower(stripslashes($_POST['username']));
        $password       = strtolower(mysqli_real_escape_string($mysqli, $_POST['password']));
        // enkripsi password
        $password = password_hash($password, PASSWORD_DEFAULT);

            $mysqli->query("UPDATE user SET 
                nama            = '$nama', 
                alamat          = '$alamat',
                job             = '$job',
                lp              = '$_POST[lp]',
                username        = '$username',
                password        = '$password'
                WHERE id_user   = '$_POST[id]'") or die (mysqli_error());
            
        echo "
                <div class='container-fluid'>
                    <div class='row'>
                        <div class='col-lg-12'>
                            <center>
                                <img src='gambar/loading2.gif'>
                                <h2 class='page-header' style='display: inline-block;'>
                                    Loading. . . . .
                                </h2>
                            </center>
                        </div>
                    </div>
                </div>
                ";
        echo "<meta http-equiv ='refresh'content='1; url=?tampil=datadiri'>";
    }else{
        echo"<div class='container-fluid'><div class='row'><div class='col-lg-12'><h1 class='page-header'>KONTEN TIDAK ADA</h1></div></div></div>";
        echo "<meta http-equiv ='refresh'content='1; url=?tampil=beranda'>";
    }
?>