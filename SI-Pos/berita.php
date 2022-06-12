<?php require_once('head.php');
if(isset($_GET['kode'])) {
	$kode = $_GET['kode'];
	$sql = mysqli_query($con, "SELECT * FROM phbs WHERE kode_phbs='$kode'");
	$data = mysqli_fetch_array($sql);
}
?>
		<div class="site-main-container">
			<!-- Start top-post Area -->
			<section class="top-post-area pt-10">
				<div class="container no-padding">
					<div class="row">
						<div class="col-lg-12">
							<div class="hero-nav-area" style="background: #FFD5D1">
								<h1 class="text-black">Berita</h1>
								<p class="text-black link-nav"><a style="color: black" href="index.php">Home</a>  <span class="lnr lnr-arrow-right"></span>Berita</p>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- End top-post Area -->
			<!-- Start latest-post Area -->
			<section class="latest-post-area pb-120">
				<div class="container no-padding">
					<div class="row">
						<div class="col-lg-12 post-list">
							<!-- Start single-post Area -->
							<div class="single-post-wrap">
								<div class="feature-img-thumb relative">
									<div class="overlay overlay-bg"></div>
									<img class="img-fluid" src="<?= $data['gambar']?>" alt="berita">
								</div>
								<div class="content-wrap">
									<h3 class="text-center"><?= $data['judul_berita']?></h3><br>
									<ul class="meta pb-20">
										<li><a href="#"><span class="lnr lnr-user"></span><?= $data['penulis_berita']?></a></li>
										<li><a href="#"><span class="lnr lnr-calendar-full"></span><?= $data['tgl_dibuat']?></a></li>
									</ul>
									<p>
										<?= $data['deskripsi_berita']?>
									</p>
						</div>
						<!-- End single-post Area -->
					</div>
				</div>
			</div>
		</section>
		<!-- End latest-post Area -->
	</div>
<?php require_once('footer.php') ?>