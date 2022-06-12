<?php require_once('head.php'); ?>
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">PERKEMBANGAN BALITA</h4>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title">Perkembangan Balita</h3>
                        <div class="row">
                            <?php require_once('alert.php'); ?>
                            <div class="col-lg-10">
                                <a href="tambah-perkembangan-balita.php" class="btn btn-success"><i class="fa fa-plus-circle"> </i>Tambah Perkembangan Balita</a>
                            </div>
                            <!-- <div class="col-lg-2">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                            </div> -->
                        </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Balita</th>
                                    <th>Tanggal</th>
                                    <th>Tinggi Badan</th>
                                    <th>Berat Badan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php
                              $no = 1;
                              $sql = mysqli_query($con, "SELECT *,YEAR(CURRENT_DATE) - YEAR(tgl_lahir) AS usia FROM perkembangan_balita
                              inner join balita on balita.kode_balita=perkembangan_balita.kode_balita");
                              while($data = mysqli_fetch_array($sql)){
                              ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?php echo ucwords($data['nama_balita']); ?></td>
                                    <td><?= $data['tgl_periksa'] ?></td>
                                    <td><?= $data['tb_balita'] ?></td>
                                    <td><?= $data['bb_balita'] ?></td>
                                    <td>
                                        <a href="edit-perkembangan-balita.php?kode=<?= $data['kode_balita']?>" class="btn btn-warning"><i class="fa fa-pencil-square"></i> Ubah</a>
                                    </td>
                                </tr>
                                <?php $no++;}?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
<?php require_once('footer.php'); ?>