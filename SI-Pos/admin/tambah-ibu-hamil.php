<?php require_once('head.php');
if (isset($_POST['tambah'])) {
    //ORTU
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $suami = $_POST['suami'];
    $alamat = $_POST['alamat'];
    $tanggal = $_POST['tanggal'];
    $created = date("Y-m-d H:i:s");
    $updated = date("Y-m-d H:i:s");

    if ($nik == null || $nama == null || $suami == null || $alamat == null || $tanggal == null) {
        header('location:ibu-hamil.php?stat=input_null');
    } else {
        $addibu = mysqli_query($con, "INSERT INTO ibu_hamil VALUES('$nik','$nama','$suami','$alamat','$tanggal','$created','$updated')");
        if ($addibu) {
            header('location:ibu-hamil.php?stat=input_success');
        } else {
            header('location:ibu-hamil.php?stat=input_failed');
        }
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
                <h3 class="box-title">Pendaftaran Ibu Hamil</h3>
                <div class="row">
                    <?php require_once('alert.php'); ?>
                    <div class="col-sm-6">
                        <h4 style="text-align: center;">Data Ibu Hamil</h4>
                        <form method="post">
                            <div class="sm-3">
                                <label for="nik" class="form-label">NIK</label>
                                <input type="text" name="nik" class="form-control" id="nik" aria-describedby="emailHelp">
                            </div><br>
                            <div class="sm-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" name="nama" class="form-control" id="nama">
                            </div><br>
                            <div class="sm-3">
                                <label for="suami" class="form-label">Nama Suami</label>
                                <input type="text" name="suami" class="form-control" id="suami">
                            </div><br>
                            <div class="sm-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea class="form-control" id="alamat" name="alamat" aria-label="With textarea"></textarea>
                            </div><br>
                            <div class="sm-3">
                                <label for="tanggal" class="form-label">Tanggal Lahir</label>
                                <input type="date" name="tanggal" class="form-control" id="tanggal" required>
                            </div><br>
                    </div>
                    <button name="tambah" class="btn btn-success btn-lg"><i class="fa fa-check-square"></i> Daftar</button>
                    <a href="ibu-hamil.php" class="btn btn-danger btn-lg"><i class="fa fa-times"></i> Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.row -->
</div>
<!-- /.container-fluid -->
<?php require_once('footer.php'); ?>