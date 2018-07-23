<!DOCTYPE html>

<?php

session_start();

include "function.php";

$koneksi = new mysqli ("localhost","root","","db_perpustakaan");

$konek = mysqli_connect ("localhost","root","","db_perpustakaan");

if ($_SESSION['admin'] || $_SESSION['user']) {

    ?>

    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>Perpustakaan</title>
      <!-- BOOTSTRAP STYLES-->
      <link href="assets/css/bootstrap.css" rel="stylesheet" />
      <!-- FONTAWESOME STYLES-->
      <link href="assets/css/font-awesome.css" rel="stylesheet" />
      <!-- CUSTOM STYLES-->
      <link href="assets/css/custom.css" rel="stylesheet" />
      <!-- GOOGLE FONTS-->
      <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
      <!-- TABLE STYLES-->
      <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
      <!-- Theme style -->
      <link href="assets/css/style.css" rel="stylesheet" type="text/css" />
      <!-- Ionicons -->
      <link href="assets/css/ionicons.min.css" rel="stylesheet" type="text/css" />
      <!-- Morris chart -->
      <link href="assets/css/morris/morris.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Perpustakaan</a> 
            </div>
            <div style="color: white;
            padding: 15px 50px 5px 50px;
            float: right;
            font-size: 16px;"> <?php echo date('d-M-Y'); ?> &nbsp; <a href="logout.php" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>   
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li class="text-center">
                        <img src="assets/img/perpus.png" class="user-image img-responsive"/>
                    </li>

                    <li>
                        <a href="index.php"><i class="fa fa-dashboard"></i>Dashboard</a>
                    </li>

                    <li>
                        <a href="?page=anggota"><i class="fa fa-user"></i>Data Anggota</a>
                    </li>

                    <li>
                        <a href="?page=buku"><i class="fa fa-book"></i>Data Buku</a>
                    </li>

                    <li>
                        <a href="?page=user"><i class="fa fa-book"></i>Data Pengguna</a>
                    </li>

                    <li>
                        <a href="?page=transaksi"><i class="fa fa-edit"></i>Transaksi</a>
                    </li>

                </ul>

            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">

                    <?php
                    error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

                    $page = $_GET['page'];
                    $aksi = $_GET['aksi'];

                    if ($page == "anggota") {
                        if ($aksi == "") {
                            include "page/anggota/anggota.php";
                        }elseif ($aksi == "tambah") {
                            include "page/anggota/tambah.php";
                        }elseif ($aksi == "ubah") {
                            include "page/anggota/ubah.php";
                        }elseif ($aksi == "hapus") {
                            include "page/anggota/hapus.php";
                        }
                    }elseif ($page == "buku") {
                        if ($aksi == "") {
                            include "page/buku/buku.php";
                        }elseif ($aksi == "tambah") {
                            include "page/buku/tambah.php";
                        }elseif ($aksi == "ubah") {
                            include "page/buku/ubah.php";
                        }elseif ($aksi == "hapus") {
                            include "page/buku/hapus.php";
                        }
                    }elseif ($page == "transaksi") {
                        if ($aksi == "") {
                            include "page/transaksi/transaksi.php";
                        }elseif ($aksi == "tambah") {
                            include "page/transaksi/tambah.php";
                        }elseif ($aksi == "kembali") {
                            include "page/transaksi/kembali.php";
                        }elseif ($aksi == "perpanjang") {
                            include "page/transaksi/perpanjang.php";
                        }
                    }elseif ($page == "user") {
                        if ($aksi == "") {
                            include "page/user/user.php";
                        }elseif ($aksi == "tambah") {
                            include "page/user/tambah.php";
                        }elseif ($aksi == "ubah") {
                            include "page/user/ubah.php";
                        }elseif ($aksi == "hapus") {
                            include "page/user/hapus.php";
                        }

                    }elseif ($page == ""){
                        include "home.php";
                    }
                    ?>

                </div>
            </div>
            <!-- /. ROW  -->

        </div>
        <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->
</div>
<!-- /. WRAPPER  -->
<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
<!-- JQUERY SCRIPTS -->
<script src="assets/js/jquery-1.10.2.js"></script>
<!-- BOOTSTRAP SCRIPTS -->
<script src="assets/js/bootstrap.min.js"></script>
<!-- METISMENU SCRIPTS -->
<script src="assets/js/jquery.metisMenu.js"></script>
<!-- DATA TABLE SCRIPTS -->
<script src="assets/js/dataTables/jquery.dataTables.js"></script>
<script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
<script>
    $(document).ready(function () {
        $('#dataTables-example').dataTable();
    });
</script>
<!-- CUSTOM SCRIPTS -->
<script src="assets/js/custom.js"></script>


</body>
</html>

<?php

}else{
    header("location:login.php");
}

?>