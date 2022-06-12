<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 4 admin, bootstrap 4, css3 dashboard, bootstrap 4 dashboard, severny admin bootstrap 4 dashboard, frontend, responsive bootstrap 4 admin template, pixel  design, pixel  dashboard bootstrap 4 dashboard template">
    <meta name="description"
        content="Pixel Admin is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>Sistem Informasi Posyandu Desa Sidua-dua</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/pixel-admin-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../img/logo.png">
    <!-- Bootstrap Core CSS -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!-- toast CSS -->
    <link href="plugins/bower_components/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="css/colors/blue-dark.css" id="theme" rel="stylesheet">
    <!-- Morris CSS -->
    <link rel="stylesheet" href="admin/morris/examples/lib/example.css">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/prettify/r224/prettify.min.css">
    <link rel="stylesheet" href="admin/morris/morris.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<?php
ob_start();
require_once('../config/koneksi.php');
require_once('../session.php');
?>
<body>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header"> 
                <a class="navbar-toggle hidden-sm hidden-md hidden-lg "
                    href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i
                        class="fa fa-bars"></i></a>
                <div class="top-left-part"><a class="logo" href="index.php"><b><img
                                src="../img/logo.png" alt="home" width="40px" height="40px" /></b><span
                            class="hidden-xs"><img src="../img/logo-text.png" alt="home" width="140px" height="40px" /></span></a>
                </div>
                <ul class="nav navbar-top-links navbar-right pull-right">
                    <li>
                        <a class="profile-pic" href=""> <b class="hidden-xs"><?= $namau ?></b> </a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>
        <!-- Left navbar-header -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse slimscrollsidebar">
                <ul class="nav" id="side-menu">
                    <li style="padding: 10px 0 0;">
                        <a href="index.php" class="waves-effect"><i class="fa fa-clock-o fa-fw"
                                aria-hidden="true"></i><span class="hide-menu">Dashboard</span></a>
                    </li>
                    <li>
                        <a href="berita.php" class="waves-effect"><i class="fa fa-file-word-o fa-fw"
                                aria-hidden="true"></i><span class="hide-menu">Berita</span></a>
                    </li>
                    <li>
                        <a href="jadwal-posyandu.php" class="waves-effect"><i class="fa fa-table fa-fw"
                                aria-hidden="true"></i><span class="hide-menu">Jadwal</span></a>
                    </li>
                    <li>
                        <a href="balita.php" class="waves-effect"><i class="fa fa-user fa-fw"
                                aria-hidden="true"></i><span class="hide-menu">Balita</span></a>
                    </li>
                    <li>
                        <a href="imunisasi.php" class="waves-effect"><i class="fa fa-medkit fa-fw"
                                aria-hidden="true"></i><span class="hide-menu">Imunisasi</span></a>
                    </li>
                    <li>
                        <a href="perkembangan-balita.php" class="waves-effect"><i class="fa fa-line-chart fa-fw"
                                aria-hidden="true"></i><span class="hide-menu">Perkembangan Balita</span></a>
                    </li>
                    <li>
                        <a href="ibu-hamil.php" class="waves-effect"><i class="fa fa-user fa-fw"
                                aria-hidden="true"></i><span class="hide-menu">Ibu Hamil</span></a>
                    </li>                   
                    <li>
                        <a href="lansia.php" class="waves-effect"><i class="fa fa-user fa-fw"
                                aria-hidden="true"></i><span class="hide-menu">Lansia</span></a>
                    </li>
                </ul>
                <div class="center p-20">
                    <span class="hide-menu"><a href="logout.php" class="btn btn-danger btn-block btn-rounded waves-effect waves-light"><i class="fa fa-user fa-fw"></i> Logout</a></span>
                </div>
            </div>
        </div>
        <!-- Left navbar-header end -->
        <div id="page-wrapper">