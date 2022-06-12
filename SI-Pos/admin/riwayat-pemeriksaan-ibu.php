<?php require_once('head.php'); ?>
<?php
if (isset($_GET['kode'])) {
    $kd = $_GET['kode'];
    $sql = mysqli_query($con, "SELECT * from ibu_hamil where nik='$kd'");
    $data = mysqli_fetch_array($sql);
    $nik = $data['nik'];
}

if (isset($_POST['ubah'])) {
    $nama = $_POST['nama'];
    $suami = $_POST['suami'];
    $alamat = $_POST['alamat'];
    $tanggal = $_POST['tanggal'];

    $addibu = mysqli_query($con, "UPDATE ibu_hamil set
      nama = '$nama',
      suami = '$suami',
      alamat = '$alamat',
      tgl_lahir = '$tanggal'
      WHERE nik='$nik'
      ");

    if ($addibu) {
        header('location:ibu-hamil.php?stat=update_success');
    } else {
        header('location:ibu-hamil.php?stat=update_failed');
    }
}
?>
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
                <h3 class="box-title">Riwayat Pemeriksaan <?= $data['nama'] ?> </h3>
                <div class="row">
                    <?php require_once('alert.php'); ?>
                    <div class="col-lg-10">
                        <a href="pemeriksaan-ibu-hamil.php?kode=<?= $data['nik'] ?>" class="btn btn-success"><i class="fa fa-plus-circle"> </i>Tambah Pemeriksaan</a>
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
                                <th>Speksi</th>
                                <th>Tensi</th>
                                <th>Vitamin</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $mynik = $data['nik'];
                            $sql = mysqli_query($con, "SELECT * FROM pemeriksaan_ibu WHERE nik='$mynik'");
                            while ($data2 = mysqli_fetch_array($sql)) {
                            ?>
                                <tr>
                                    <td><?= $no ?></td>                                   
                                    <td><?= $data2['speksi'] ?></td>
                                    <td><?= $data2['tensi'] ?></td>
                                    <td><?= $data2['vitamin'] ?></td>
                                    <td><?= $data2['tanggal'] ?></td>
                                    
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