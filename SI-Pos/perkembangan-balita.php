<?php require_once('head.php'); 
	$sqlbb = mysqli_query($con, "SELECT * FROM history WHERE nik=$niku AND tipe='perk'");
	$chartbb = '';
	while ($databb = mysqli_fetch_array($sqlbb)) {
		$chartbb .= "{ periode:'".$databb['tgl_periksa']."', berat:".$databb['bb_balita']." },";
	}
	$chartbb = substr($chartbb, 0, -1);

	$sqltb = mysqli_query($con, "SELECT * FROM history WHERE nik=$niku AND tipe='perk'");
	$charttb = '';
	while ($datatb = mysqli_fetch_array($sqltb)) {
		$charttb .= "{ periode:'".$datatb['tgl_periksa']."', tinggi:".$datatb['tb_balita']." },";
	}
	$charttb = substr($charttb, 0, -1);
?>
		<div class="site-main-container">
			<!-- Start top-post Area -->
			<section class="top-post-area pt-10">
				<div class="container no-padding">
					<div class="row">
						<div class="col-lg-12">
						<div class="hero-nav-area" style="background: #FFD5D1">
							<h1 class="text-black">Perkembangan Balita</h1>
							<p class="text-black link-nav"><a style="color: black" href="index.php">Home</a>  <span class="lnr lnr-arrow-right"></span>Perkembangan Balita</p>
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
                                            <h3>Perkembangan Balita</h3><br>
                                        </div>
                                        <div class="col-md-6">
					                        <div class="white-box" style="width: 490px">
					                            <h4 align="center"><b>Berat Badan (kg)</b></h4>
					                            <div id="line-graph" style="width: 415px; height: 250px;"></div>
					                        </div>
					                    </div>
					                    <div class="col-md-6">
					                        <div class="white-box" style="width: 490px">
					                            <h4 align="center"><b>Tinggi Badan (cm)</b></h4>
					                            <div id="area-graph" style="width: 415px; height: 285px;"></div>
					                        </div>
					                    </div>
                                    </div>
                                    <br>
									<table class="table">
                                        <thead>
                                            <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Tanggal</th>
                                            <th scope="col">Tinggi Badan</th>
                                            <th scope="col">Berat Badan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php
			                              $no = 1;
			                              $sql = mysqli_query($con, "SELECT * FROM history WHERE nik=$niku AND tipe='perk'");
			                              while($data = mysqli_fetch_array($sql)){
			                              ?>
                                            <tr>
                                                <th scope="row"><?= $no ?></th>
                                                <td><?= $data['tgl_periksa']; ?></td>
                                                <td><?= $data['tb_balita']?> CM</td>
                                                <td><?= $data['bb_balita']?> KG</td>
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