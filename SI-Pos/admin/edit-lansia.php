<?php require_once('head.php');

if (isset($_GET['kode'])) {
  $kd = $_GET['kode'];
  $sql = mysqli_query($con, "SELECT * from lansia where nik='$kd'");
  $data = mysqli_fetch_array($sql);
  $nik = $data['nik'];
}

if (isset($_POST['ubah'])) {
  $nama = $_POST['nama'];
  $alamat = $_POST['alamat'];
  $tanggal = $_POST['tanggal'];
  $updated = date("Y-m-d H:i:s");

  $addlansia = mysqli_query($con, "UPDATE lansia set
    nama = '$nama',
    alamat = '$alamat',
    tanggal = '$tanggal',
    updated = '$updated'
    WHERE nik='$nik'
    ");

  if ($addlansia) {
    header('location:lansia.php?stat=update_success');
  } else {
    header('location:lansia.php?stat=update_failed');
  }
}
?>
<div class="container-fluid">
  <div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
      <h4 class="page-title">LANSIA</h4>
    </div>
    <!-- /.col-lg-12 -->
  </div>
  <!-- /row -->
  <div class="row">
    <div class="col-sm-12">
      <div class="white-box">
        <h3 class="box-title">Ubah Pendaftaran Lansia</h3>
        <div class="row">
          <?php require_once('alert.php'); ?>
          <div class="col-sm-6">
            <h4 style="text-align: center;">Data Lansia</h4>
            <form method="post">
              <div class="sm-3">
                <label for="nik" class="form-label">NIK</label>
                <input type="text" value="<?= $data['nik'] ?>" name="nik" class="form-control" id="nik" disabled>
              </div><br>
              <div class="sm-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" value="<?= $data['nama'] ?>" name="nama" class="form-control" id="nama">
              </div><br>
              <div class="sm-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat" aria-label="With textarea"><?= $data['alamat'] ?></textarea>
              </div><br>
              <div class="sm-3">
                <label for="tanggal" class="form-label">Tanggal Lahir</label>
                <input type="date" name="tanggal" value="<?= $data['tanggal'] ?>" class="form-control" id="tanggal" required>
              </div><br>
              <button type="submit" name="ubah" class="btn btn-success btn-lg"><i class="fa fa-check-square"></i>Simpan</button>
              <a href="lansia.php" class="btn btn-danger btn-lg"><i class="fa fa-times"></i>Batal</a>
          </div>

        </div>
      </div>
    </div>
  </div>
  <!-- /.row -->
</div>
<!-- /.container-fluid -->
<?php require_once('footer.php'); ?>