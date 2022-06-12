<?php require_once('head.php'); ?>
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">IMUNISASI</h4>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title">Catatan Imunisasi</h3>
                        <div class="row">
                            <?php require_once('alert.php'); ?>
                            <div class="col-lg-10">
                                <a href="tambah-imunisasi.php" class="btn btn-success"><i class="fa fa-plus-circle"> </i>Tambah Catatan Imunisasi</a>
                            </div>
                            <!-- <div class="col-lg-2">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                            </div> -->
                        </div>
                    <div class="table-responsive">
                        <table class="table text-center">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Nama Bayi</th>
                                    <th class="text-center">Tanggal</th>
                                    <th class="text-center">Umur (Bulan)</th>
                                    <th class="text-center">Jenis Imunisasi</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                              $no = 1;
                              $sql = mysqli_query($con, "SELECT *,(TIMESTAMPDIFF( MONTH, b.tgl_lahir, now() ) % 12) AS umur FROM imunisasi a
                              inner join balita b on b.kode_balita = a.kode_balita");
                              while($data = mysqli_fetch_array($sql)){
                              ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?php echo ucwords($data['nama_balita']); ?></td>
                                    <td><?= $data['tgl_imunisasi'] ?></td>
                                    <td class="text-center"><?= $data['umur'] ?></td>
                                    <td><?= $data['jenis_vaksin'] ?></td>
                                    <td>
                                        <a href="edit-imunisasi.php?kode=<?= $data['kode_balita']?>" class="btn btn-warning"><i class="fa fa-pencil-square"></i> Ubah</a>
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