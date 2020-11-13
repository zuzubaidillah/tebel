<?php
if(!defined("INDEX")) die("<center><h1>---<h1></center>");
    if (!empty($_SESSION['username'])) {
        ?>
        <div id="menu">
            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a href="index.php" target="_blank">
                        <strong> Lihat</strong>
                    </a>
                    <!-- /.dropdown-user -->
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle">Menu Admin <i class="fa fa-caret-down"></i></a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="?tampil=submenu&jenis=1&ket=1"><i class="fa fa-camera-retro fa-fw"></i> Kategori Berita</a>
                        </li>
                        <li><a href="?tampil=submenu&jenis=1&ket=2"><i class="fa fa-tasks fa-fw"></i> Kategori Halaman</a>
                        </li>
                        <li><a href="?tampil=submenu&jenis=1&ket=4"><i class="fa fa-suitcase fa-fw"></i> Kategori Produk</a>
                        </li>
                        <li><a href="?tampil=submenu&jenis=1&ket=5"><i class="fa fa-picture-o fa-fw"></i> Kategori Galeri</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" href="?tampil=stafdesa&level=2">Staf Desa</a>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" href="?tampil=galeri&c=galeri&p=slide">Slide</a>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" href="?tampil=statistik&hal=1">Statistik</a>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="?tampil=stafdesa&level=1"><i class="fa fa-plus fa-fw"></i> Add User</a></li>
                        <li><a href="?tampil=datadiri"><i class="fa fa-user fa-fw"></i> Data Diri</a></li>
                        <li><a href="?tampil=tampilan"><i class="fa fa-gear fa-fw"></i> Tampilan</a></li>
                        <li class="divider"></li>
                        <li><a href="?tampil=keluar"><i class="fa fa-sign-out fa-fw"></i> Keluar</a></li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->
        </div>
        <?php 
    }else{
        header("Location: index.php");
        exit;
    }
?>