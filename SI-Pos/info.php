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
								<h1 class="text-black">Informasi Posyandu</h1>
								<p class="text-black link-nav"><a style="color: black" href="index.php">Home</a>  <span class="lnr lnr-arrow-right"></span>Informasi Posyandu</p>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- End top-post Area -->
			<section>
				<div>
					<center><img style="width: 700px" align="center" src="img/keg1.jpeg"></center>
				</div>
			</section>
			<!-- Start latest-post Area -->
			<section class="latest-post-area pb-120">
				<div class="container no-padding">
					<div class="row">
						<div class="col-lg-12 post-list">
							<!-- Start single-post Area -->
							<div class="single-post-wrap">
								<div class="content-wrap text-center">
									<h3 class="mb-2">VISI</h3>
									<h6>Mewujudkan masyarakat sehat jasmani dan rohani untuk mencapai masa depan keluarga yang lebih baik</h6><br>
									<h3 class="mb-2">MISI</h3>
									<h6>1. Bayi, balita dan ibu hamil dapat mengubah taraf hidup dan kesehatannya menjadi lebih baik<br>2. Bayi, balita dan ibu hamil harus benar-benar dijaga oleh keluarga dan masyarakat sekitar</h6><br>
									<h3 class="mb-2">TUJUAN</h3>
									<h6>Bayi, balita dan ibu hamil dapat mengubah taraf hidup dan kesehatannya menjadi lebih baik<br>Untuk mencapai masyarakat yang sehat dan peduli terhadap diri sendiri dan lingkungan</h6>
								</div>
								<div class="content-wrap text-justify">
									<h6><b>Posyandu </b>adalah jenis pelayanan kepada anak berupa penimbangan untuk memantau pertumbuhan anak.<br><b>Manfaat Posyandu </b>adalah untuk memberikan layanan kesehatan ibu dan anak, imunisasi, gizi</h6><br>
									<h4 class="mb-2"><b>Penimbangan Balita</b></h4>
									<h6>Penimbangan balita dilakukan tiap bulan di posyandu. Penimbangan secara rutin di posyandu untuk pemantauan pertumbuhan dan mendeteksi sedini mungkin penyimpangan pertumbuhan balita.</h6><br>
									<h4 class="mb-2"><b>Imunisasi</b></h4>
									<h6>Di posyandu balita akan mendapatkan layanan imunisasi. Macam imunisasi yang diberikan di posyandu adalah sebagai berikut.<br>1. BCG untuk mencegah penyakit TBC.<br>2. DPT untuk mencegah penyakit difteri, pertusis (batuk rejan), tetanus.<br>3. Polio untuk mencegah penyakit kelumpuhan.</h6><br>
									<h4 class="mb-2"><b>Peningkatan Gizi</b></h4>
									<h6>Dengan adanya posyandu yang sasaran utamanya bayi dan balita, sangat tepat untuk meningkatkan gizi balita. Peningkatan gizi balita di posyandu yang dilakukan oleh kader berupa memberikan penyuluhan tentang ASI, status gizi balita, Imunisasi, stimulasi tumbuh kembang anak.</h6><br>
								</div>
							<!-- End single-post Area -->
							</div>
						</div>
					</div>
				</div>
			</section>
		<!-- End latest-post Area -->
	</div>
<?php require_once('footer.php') ?>