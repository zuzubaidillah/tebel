<?php
session_start();
if (isset($_SESSION['id_user'])) {
    header("Location: ../admin.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login Admin</title>
    <!-- Bootstrap Core CSS -->
    <link href="../template/admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="../template/admin/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../template/admin/dist/css/sb-admin-2.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="../template/admin/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="icon" href="../gambar/favicon.png" type="image/ico" />
</head>
<body>
    <div class="container">
        <?php  
            include "../lib/koneksi.php";
            if(isset($_REQUEST['submit'] ) ){
                $username = $_REQUEST['username'];
                $password = $_REQUEST['password'];

                // if ($username=='kkn' and $password=='123'){
                //     $_SESSION['id_user'] = '160718';
                //     $_SESSION['username'] = 'PEMBUAT';
                //     $_SESSION['password'] = 'PEMBUAT';
                //     $_SESSION['level'] = '0'; 
                //     header("Location: ../admin.php");
                //     die();
                // }

                // cek username
                $sql = $mysqli->query("SELECT * FROM user WHERE username = '$username'");
                if (mysqli_num_rows($sql) === 1) {
                    // cek pasword
                    $row = mysqli_fetch_assoc($sql);
                    if ($row['level'] == 2) {
                        header("Location: ./index.php");
                        die();
                    }
                    if (password_verify($password, $row['password'])) {
                        $_SESSION['id_user']    = $row['id_user'];
                        $_SESSION['username']   = $row['username'];
                        $_SESSION['password']   = $row['password'];
                        $_SESSION['level']      = $row['level'];
                        $_SESSION['bagian']     = $row['bagian'];
                        header("Location: ../admin.php");
                        die();
                     }
                }
                    $_SESSION['err'] = '<strong>ERROR!</strong> Username dan Password tidak ditemukan.';
                    header('Location: ./');
                    die();
            } else {
        ?>
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
        <?php
        if(isset($_SESSION['err'])){
            $err = $_SESSION['err'];
            echo '<div class="alert alert-warning alert-message">'.$err.'</div>';
        }
        ?>
                    <div class="panel-heading">
                        <h3 class="panel-title">LogIn</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form">
                            <fieldset>
                                <div class="form-group">
                                    <input required class="form-control" placeholder="Username" name="username" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input autocomplete="off" required class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                    <button name="submit" class="btn btn-lg btn-success btn-block">Masuk</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
<?php } ?>
    </div>
    <!-- jQuery -->
    <script src="../template/admin/vendor/jquery/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../template/admin/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="../template/admin/vendor/metisMenu/metisMenu.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="../template/admin/dist/js/sb-admin-2.js"></script>
    <script type="text/javascript">
        $(".alert-message").alert().delay(1000).slideUp('slow');
    </script>
</body>

</html>
