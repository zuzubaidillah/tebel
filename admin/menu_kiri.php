<?php
    if(!defined("INDEX")) die("<center><h1>---<h1></center>");
        $data=mysqli_fetch_array($mysqli->query("SELECT * FROM user where id_user='$_SESSION[id_user]'"));
        $nama = $data['nama'];
?>
<!-- /a-group -->
<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <!-- /bagian admin -->
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <p style="font-size: 16px; color: blue;"><?php echo $nama; ?><br>
                        <small style="font-size: 12px;">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-circle text-success"></i> Online
                        </small>
                    </p>
                </div>
            </li>
            <!-- END/bagian admin -->
            <!-- /menu kiri admin -->
            <li>
                <a href="?tampil=beranda" style="text-transform: lowercase;"><i class="fa fa-dashboard fa-fw"></i> beraNDA</a>
            </li>
             <?php
                $menu = $mysqli->query("SELECT * from menu where jenis = 1 order by urutan");
                $tampil = mysqli_fetch_array($menu);
                    echo "<li>
                            <a href='#'><i class='fa fa-camera-retro fa-fw' style='text-transform: lowercase;'></i> Berita<span class='fa arrow'></span></a>";
                        echo "<ul class='nav nav-second-level'>";
                            $submenu1    = $mysqli->query("SELECT * from submenu where id_menu=1 order by urutan");
                            while ($sub1 = mysqli_fetch_array($submenu1)){
                            echo "<li><a  style='text-transform: lowercase;' href='?tampil=$sub1[link]&c=$sub1[link]&ket=$sub1[id_menu]&p=$sub1[id_submenu]&hal=1'><i class='fa fa-minus'></i>  $sub1[judul]</a></li>";
                            }
                        echo "</ul>";
                    echo "</li>";

                    echo "<li>
                            <a href='#'><i class='fa fa-tasks fa-fw'></i> Halaman<span class='fa arrow'></span></a>";
                        echo "<ul class='nav nav-second-level'>";
                            $submenu2    = $mysqli->query("SELECT * from submenu where id_menu=2 and jenis=1 order by urutan");
                            while ($sub2 = mysqli_fetch_array($submenu2)){
                            echo "<li><a style='text-transform: lowercase;' href='?tampil=$sub2[link]&c=$sub2[link]&ket=$sub2[id_menu]&p=$sub2[id_submenu]&hal=1'><i class='fa fa-minus'></i>  $sub2[judul] </a></li>";
                            }
                        echo "</ul>";
                    echo "</li>";
                    
                    echo "<li>
                            <a href='#'><i class='fa fa-suitcase fa-fw'></i> Produk<span class='fa arrow'></span></a>";
                        echo "<ul class='nav nav-second-level'>";
                            $submenu4    = $mysqli->query("SELECT * from submenu where id_menu=4 order by urutan");
                            while ($sub4 = mysqli_fetch_array($submenu4)){
                            echo "<li><a style='text-transform: lowercase;' href='?tampil=$sub4[link]&c=$sub4[link]&ket=$sub4[id_menu]&p=$sub4[id_submenu]&hal=1'><i class='fa fa-minus'></i>  $sub4[judul] </a></li>";
                            }
                        echo "</ul>";
                    echo "</li>";

                    echo "<li>
                            <a href='#'><i class='fa fa-picture-o fa-fw'></i> Galeri<span class='fa arrow'></span></a>";
                        echo "<ul class='nav nav-second-level'>";
                        $submenu4    = $mysqli->query("SELECT * from submenu where id_menu=5 order by urutan");
                        while ($sub5 = mysqli_fetch_array($submenu4)){
                        echo "<li><a style='text-transform: lowercase;' href='?tampil=$sub5[link]&c=$sub5[link]&ket=$sub5[id_menu]&p=$sub5[id_submenu]&hal=1'><i class='fa fa-minus'></i>  $sub5[judul] </a></li>";
                        }
                        echo "</ul>";
                    echo "</li>";
            ?>

        </ul>
    </div>
</div>