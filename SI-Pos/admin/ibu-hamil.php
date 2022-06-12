<?php require_once('head.php'); ?>
<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">IBU HAMIL</h4>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /row -->
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <h3 class="box-title">Kelola Data Ibu Hamil</h3>
                <div class="row">
                    <?php require_once('alert.php'); ?>
                    <div class="col-lg-10">
                        <a href="tambah-ibu-hamil.php" class="btn btn-success"><i class="fa fa-plus-circle"> </i>Tambah Ibu Hamil</a>
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
                                <th>Nik</th>
                                <th>Nama</th>
                                <th>Suami</th>
                                <th>Alamat</th>
                                <th>Usia</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $sql = mysqli_query($con, "SELECT * FROM ibu_hamil");
                            while ($data = mysqli_fetch_array($sql)) {
                            ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?php echo ucwords($data['nik']) ?></td>
                                    <td><?= $data['nama'] ?></td>
                                    <td><?= $data['suami'] ?></td>
                                    <td><?= $data['alamat'] ?></td>
                                    <td><?php $lahir = new DateTime($data['tgl_lahir']);
                                         $today = new DateTime();
                                         $umur = $today->diff($lahir);
                                         echo $umur->y;
                                    ?> Tahun</td>
                                    <td>
                                        <a href="edit-ibu-hamil.php?kode=<?= $data['nik'] ?>" class="btn btn-warning"><i class="fa fa-pencil-square"></i>Ubah</a>
                                        <a href="del-ibu-hamil.php?kode=<?= $data['nik'] ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin?');"><i class="fa fa-trash-o"></i>Hapus</a>
                                        <a href="riwayat-pemeriksaan-ibu.php?kode=<?= $data['nik'] ?>" class="btn btn-success"><i class="fa fa-pencil-square"></i>Pemeriksaan</a>
                                    </td>
                                </tr>
                            <?php $no++;
                            } ?>
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