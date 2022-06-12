<?php require_once('head.php');
if (isset($_GET['kode'])) {
    $kd = $_GET['kode'];
    $sql = mysqli_query($con, "SELECT * from ibu_hamil where nik='$kd'");
    $data = mysqli_fetch_array($sql);
    $nik = $data['nik'];
}

if (isset($_POST['tambah'])) {
    //ORTU
    $nik2 = $nik;
    $speksi = $_POST['speksi'];
    $tensi = $_POST['tensi'];
    $vitamin = $_POST['vitamin'];
    $tanggal = date("Y-m-d H:i:s");

    if ($nik == null || $speksi == null || $tensi == null || $vitamin == null) {
        header('location:riwayat-pemeriksaan-ibu.php?stat=input_null&kode=' . $data["nik"]);
    } else {
        $pemeriksaan = mysqli_query($con, "INSERT INTO pemeriksaan_ibu VALUES('$nik2','$speksi','$tensi','$vitamin','$tanggal')");
        if ($pemeriksaan) {
            header('location:riwayat-pemeriksaan-ibu.php?stat=input_success&kode=' . $data["nik"]);
        } else {
            header('location:riwayat-pemeriksaan-ibu.php?stat=input_failed&kode=' . $data["nik"]);
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
                <h3 class="box-title">Pemeriksaan Ibu <?= $data['nama'] ?> </h3>
                <div class="row">
                    <?php require_once('alert.php'); ?>
                    <div class="col-sm-6">
                        <h4 style="text-align: center;">Input Pemeriksaan</h4>
                        <form method="post">
                            <div class="sm-3">
                                <label for="nik" class="form-label">NIK</label>
                                <input type="text" value="<?= $data['nik'] ?>" name="nik" class="form-control" id="nik" aria-describedby="emailHelp" disabled>
                            </div><br>
                            <div class="sm-3">
                                <label for="speksi" class="form-label">Speksi</label>
                                <input type="text" name="speksi" class="form-control" id="speksi">
                            </div><br>
                            <div class="sm-3">
                                <label for="tensi" class="form-label">Tensi</label>
                                <input type="text" name="tensi" class="form-control" id="tensi">
                            </div><br>
                            <div class="sm-3">
                                <label for="vitamin" class="form-label">Vitamin</label>
                                <input type="text" name="vitamin" class="form-control" id="vitamin">
                            </div><br>
                    </div>
                    <button name="tambah" class="btn btn-success btn-lg"><i class="fa fa-check-square"></i> Simpan </button>
                    <a href="riwayat-pemeriksaan-ibu.php?kode=<?= $data['nik'] ?>" class="btn btn-danger btn-lg"><i class="fa fa-times"></i> Batal</a>
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