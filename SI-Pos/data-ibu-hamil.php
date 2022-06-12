<?php require_once('head.php'); 
	$sql = mysqli_query($con, "SELECT * FROM `ibu` WHERE nik='$nik'");
	$data = mysqli_fetch_array($sql);
?>		
		<div class="site-main-container">
			<!-- Start top-post Area -->
			<section class="top-post-area pt-10">
				<div class="container no-padding">
					<div class="row">
						<div class="col-lg-12">
							<div class="hero-nav-area" style="background: #FFD5D1">
								<h1  class="text-black">Detail Data Ibu Hamil</h1>
								<p class="text-black link-nav"><a style="color: black"  href="index.php">Home</a>  <span class="lnr lnr-arrow-right"></span><a style="color: black" href="data-ibu-hamil.php">Data Ibu Hamil</a> <span class="lnr lnr-arrow-right"></span>Detail Data Ibu Hamil</p>
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
                                        <div class="col-lg-6">
                                            <table class="table table-borderless">
                                                <h3 style="text-align: center;">Data Ibu Hamil</h3><br>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">Nik</th>
                                                        <td><?= $data['nik'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Nama</th>
                                                        <td><?= ucwords($data['nama']) ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Nama Suami</th>
                                                        <td><?= $data['nama_suami'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Alamat</th>
                                                        <td><?= $data['alamat'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Usia</th>
                                                        <td><?= $data['Usia'] ?></td>
                                                    </tr>                                                   
                                                </tbody>
                                            </table>
                                        </div>                                        
                                    </div>
                                </div> 
						</div>
						<!-- End single-post Area -->
					</div>
				</div>
			</div>
		</section>
		<!-- End latest-post Area -->
	</div>
<?php require_once('footer.php') ?>