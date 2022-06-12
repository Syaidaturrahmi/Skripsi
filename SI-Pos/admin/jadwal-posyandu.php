<?php require_once('head.php'); ?>
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">POSYANDU</h4>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title">Jadwal Posyandu</h3>
                        <div class="row">
                            <?php 
                                require_once('alert.php'); 
                                $sql = mysqli_query($con, "SELECT * FROM jadwal");
                                $data = mysqli_fetch_array($sql);
                                $num = mysqli_num_rows($sql);

                                if($num==0) {
                            ?>
                            <div class="col-lg-10">
                                <a href="tambah-jadwal.php" class="btn btn-success"><i class="fa fa-plus-circle"> </i> Tambah Jadwal</a>
                            </div>
                        <?php } ?>
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
                                    <th>Tanggal</th>
                                    <th>Jam</th>
                                    <!-- <th>Aksi</th> -->
                                </tr>
                            </thead>
                            <tbody>
                              <?php
                              $no = 1;
                              $sql = mysqli_query($con, "SELECT * FROM jadwal");
                              while ($data = mysqli_fetch_array($sql)){ 
                              ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $data['tanggal'] ?></td>
                                    <td><?= $data['jam'] ?></td>
                                    <td>
                                        <!-- <a href="detail-balita.php" class="btn btn-primary"><i class="fa fa-list-alt"></i> Detail</a> -->
                                        <a href="edit-jadwal.php?kode=<?= $data['kode_jadwal']?>" class="btn btn-warning"><i class="fa fa-pencil-square"></i> Ubah</a>
                                    </td>
                                </tr>
                                <?php $no++; } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
<?php require_once('footer.php'); ?>