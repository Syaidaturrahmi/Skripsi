<!DOCTYPE html>
<html lang="zxx" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="img/fav.png">
		<!-- Author Meta -->
		<meta name="author" content="colorlib">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title>Sistem Informasi Posyandu Desa Sidua-dua</title>
		<link rel="icon" type="image/png" sizes="16x16" href="img/logo.png">
		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
		<!-- CSS -->
		<link rel="stylesheet" href="css/linearicons.css">
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/magnific-popup.css">
		<link rel="stylesheet" href="css/nice-select.css">
		<link rel="stylesheet" href="css/animate.min.css">
		<link rel="stylesheet" href="css/owl.carousel.css">
		<link rel="stylesheet" href="css/jquery-ui.css">
		<link rel="stylesheet" href="css/main.css">
		<!-- Morris CSS -->
	    <link rel="stylesheet" href="morris/examples/lib/example.css">
	    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/prettify/r224/prettify.min.css">
	    <link rel="stylesheet" href="morris/morris.css">
	</head>
	<?php require_once('config/koneksi.php');
	require_once('session.php');
	?>
	<body style="width: 100%">
		<header>
			<div class="container main-menu" id="main-menu">
				<div class="row align-items-center justify-content-between">
					<nav id="nav-menu-container">
						<ul class="nav-menu">
							<?php if(!$niku){ ?>
								<li class="menu-active"><a href="index.php">Home</a></li>
								<li class="menu-active"><a href="info.php">Info</a></li>
							<?php } else {
								if($akses=='user'){ ?>
									<li class="menu-active"><a href="index.php">Home</a></li>
									<li><a href="data-balita.php">Data Balita</a></li>
									<li><a href="imunisasi.php">Catatan Imunisasi</a></li>
								    <li><a href="perkembangan-balita.php">Perkembangan Balita</a></li>
									<li class="menu-active"><a href="info.php">Info</a></li>
							<?php } } ?>
					    </ul>
					</nav><!-- #nav-menu-container -->
					<div class="navbar-right">
                        <ul class="nav-menu">
                            <!-- <li><a href="">Azka</a></li>
                            <li><a href="logout.php">Logout</a></li> -->
							<?php if(!$niku){ ?>
							<li><a href="login.php" style="margin-right: 25px">Login</a></li>
						<?php }else{
								if($akses=='user') { ?>
							<li><a href=""><?php echo $namau ?></a></li>
							<li><a href="logout.php">Logout</a></li>
						<?php } } ?>
                        </ul>
					</div>
				</div>
			</div>
		</header>