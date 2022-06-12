<?php require_once('head.php'); 
  // $sql = mysqli_query($con, "SELECT * FROM `user` INNER JOIN balita ON balita.nik=user.nik WHERE user.nik='$niku'");
  // $data = mysqli_fetch_array($sql);
	$sql = mysqli_query($con, "SELECT * FROM `user` WHERE nik='$niku'");
	$data = mysqli_fetch_array($sql);
	$sql2 = mysqli_query($con, "SELECT * FROM `balita` WHERE nik='$niku'");
	$data2 = mysqli_fetch_array($sql2);
?>		
		<div class="site-main-container">
			<!-- Start top-post Area -->
			<section class="top-post-area pt-10">
				<div class="container no-padding">
					<div class="row">
						<div class="col-lg-12">
							<div class="hero-nav-area" style="background: #FFD5D1">
								<h1  class="text-black">Detail Data Balita</h1>
								<p class="text-black link-nav"><a style="color: black"  href="index.php">Home</a>  <span class="lnr lnr-arrow-right"></span><a style="color: black" href="data-balita.php">Data Balita</a> <span class="lnr lnr-arrow-right"></span>Detail Data Balita</p>
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
                                                <h3 style="text-align: center;">Data Orang Tua</h3><br>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">Nik</th>
                                                        <td><?= $data['nik'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Ibu Balita</th>
                                                        <td><?= ucwords($data['nama']) ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Tempat Lahir</th>
                                                        <td><?= $data['tempat_lahir'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Tanggal Lahir</th>
                                                        <td><?= $data['tgl_lahir'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Alamat</th>
                                                        <td><?= $data['alamat'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">No Hp</th>
                                                        <td><?= $data['no_hp'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Agama</th>
                                                        <td><?= $data['agama'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Pekerjaan</th>
                                                        <td><?= $data['pekerjaan'] ?></td>
                                                    </tr>
                                                    <!-- <tr>
                                                        <th scope="row">Umur</th>
                                                        <td><?= $data['tgl_lahir'] ?></td>
                                                    </tr> -->
                                                    <tr>
                                                        <th scope="row">Nama Ayah</th>
                                                        <td><?= ucwords($data['nama_suami']) ?></td>
                                                    </tr>
                                                    <!-- <tr>
                                                        <th scope="row">Anak Ke-</th>
                                                        <td><?= $data['tgl_lahir'] ?></td>
                                                    </tr> -->
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-lg-6">
                                        <table class="table table-borderless">
                                                <h3 style="text-align: center;">Data Balita</h3><br>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">Nama Lengkap</th>
                                                        <td><?= ucwords($data2['nama_balita']) ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Tempat Lahir</th>
                                                        <td><?= $data2['tempat_lahir'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Tanggal Lahir</th>
                                                        <td><?= $data2['tgl_lahir'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Jenis Kelamin</th>
                                                        <td><?php if($data2['jenkel'] == 'L') { echo "Laki-laki"; } else { echo "Perempuan"; } ?></td>
                                                    </tr>
                                                    <!-- <tr>
                                                        <th scope="row">Usia</th>
                                                        <td><?= $data['tgl_lahir'] ?></td>
                                                    </tr> -->
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