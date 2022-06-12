<?php require_once('head.php'); ?>
		<div class="site-main-container">
			<!-- Start top-post Area -->
			<section class="top-post-area pt-10">
				<div class="container no-padding">
					<div class="row">
						<div class="col-lg-12">
							<div class="hero-nav-area" style="background:  #FFD5D1">
								<h1 class="text-black">Catatan Imunisasi</h1>
								<p class="text-black link-nav"><a style="color: black" href="index.php">Home</a>  <span class="lnr lnr-arrow-right"></span>Catatan Imunisasi</p>
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
								<div class="content-wrap">
                                    <div class="row">
                                        <div class="col-lg-9">
                                            <h3>Catatan Imunisasi</h3>
                                        </div>
                                    </div>
                                    <br>
									<table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Balita</th>
                                    <th>Tanggal</th>
                                    <th>Jenis Imunisasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                              $no = 1;
                              $sql = mysqli_query($con, "SELECT * FROM imunisasi
                              inner join balita on imunisasi.kode_balita = balita.kode_balita WHERE balita.nik='$niku'");
                              while($data = mysqli_fetch_array($sql)){
                              ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $data['nama_balita'] ?></td>
                                    <td><?= $data['tgl_imunisasi'] ?></td>
                                    <td><?= $data['jenis_vaksin'] ?></td>
                                </tr>
                                <?php $no++;}?>
                            </tbody>
                        </table>
						</div>
						<!-- End single-post Area -->
					</div>
				</div>
			</div>
		</section>
		<!-- End latest-post Area -->
	</div>
<?php require_once('footer.php') ?>