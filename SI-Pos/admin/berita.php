<?php require_once('head.php'); ?>
        <div class="container-fluid">
            <div class="row bg-title">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h4 class="page-title">BERITA</h4>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /row -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="white-box">
                        <h3 class="box-title">Kelola Berita</h3>
                            <div class="row">
                                <?php require_once('alert.php'); ?>
                                <div class="col-lg-10">
                                    <a href="tambah-berita.php" class="btn btn-success"><i class="fa fa-plus-circle"> </i>Tambah Berita</a>
                                </div>
                                <!-- <div class="col-lg-2">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Username" aria-label="Cari" aria-describedby="basic-addon1">
                                    </div>
                                </div> -->
                            </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Judul</th>
                                        <th>Tanggal</th>
                                        <th>Penulis</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php
                                  $no = 1;
                                  $sql = mysqli_query($con, "SELECT kode_phbs,judul_berita,tgl_dibuat,penulis_berita FROM phbs order by tgl_dibuat");
                                  while($data = mysqli_fetch_array($sql)){
                                  ?>
                                    <tr>
                                        <td><?= $no ?></td>
                                        <td><?= $data['judul_berita'] ?></td>
                                        <td><?= $data['tgl_dibuat'] ?></td>
                                        <td><?= $data['penulis_berita'] ?></td>
                                        <td>
                                            <a href="edit-berita.php?kode=<?= $data['kode_phbs'] ?>" class="btn btn-warning"><i class="fa fa-pencil-square"></i>Ubah</a>
                                            <a href="del-berita.php?kode=<?= $data['kode_phbs'] ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin?');"><i class="fa fa-trash-o"></i>Hapus</a>
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