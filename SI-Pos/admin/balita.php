<?php require_once('head.php'); ?>
        <div class="container-fluid">
            <div class="row bg-title">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h4 class="page-title">BALITA</h4>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /row -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="white-box">
                        <h3 class="box-title">Kelola Data Balita</h3>
                            <div class="row">
                                <?php require_once('alert.php'); ?>
                                <div class="col-lg-10">
                                    <a href="tambah-balita.php" class="btn btn-success"><i class="fa fa-plus-circle"> </i>Tambah Balita</a>
                                </div>
                                <!-- <div class="col-lg-2">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Pencarian" aria-label="Username" aria-describedby="basic-addon1">
                                    </div>
                                </div> -->
                            </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Balita</th>
                                        <th>Tempat Lahir</th>
                                        <th>Usia</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php
                                  $no = 1;
                                  $sql = mysqli_query($con, "SELECT *,YEAR(CURRENT_DATE) - YEAR(tgl_lahir) AS usia FROM balita");
                                  while($data = mysqli_fetch_array($sql)){
                                  ?>
                                    <tr>
                                        <td><?= $no ?></td>
                                        <td><?php echo ucwords($data['nama_balita']) ?></td>
                                        <td><?= $data['tempat_lahir'] ?></td>
                                        <td><?= $data['usia'] ?>Tahun</td>
                                        <td>
                                            <a href="edit-balita.php?kode=<?= $data['kode_balita'] ?>" class="btn btn-warning"><i class="fa fa-pencil-square"></i>Ubah</a>
                                            <a href="del-balita.php?kode=<?= $data['kode_balita'] ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin?');"><i class="fa fa-trash-o"></i>Hapus</a>
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
        <!-- /.container-fluid -->
<?php require_once('footer.php'); ?>