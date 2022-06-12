<?php require_once('head.php');

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
        <h3 class="box-title">Ubah Pendaftaran Ibu Hamil</h3>
        <div class="row">
          <?php require_once('alert.php'); ?>
          <div class="col-sm-6">
            <h4 style="text-align: center;">Data Ibu Hamil</h4>
            <form method="post">
              <div class="sm-3">
                <label for="exampleInputEmail1" class="form-label">NIK</label>
                <input type="text" readonly value="<?= $data['nik'] ?>" name="nik" class="form-control" id="" aria-describedby="emailHelp">
              </div><br>
              <div class="sm-3">
                <label for="exampleInputPassword1" class="form-label">Nama</label>
                <input type="text" value="<?= $data['nama'] ?>" name="nama" class="form-control" id="">
              </div><br>
              <div class="sm-3">
                <label for="exampleInputPassword1" class="form-label">Nama Suami</label>
                <input type="text" value="<?= $data['suami'] ?>" name="suami" class="form-control" id="">
              </div><br>
              <div class="sm-3">
                <label for="exampleInputPassword1" class="form-label">Alamat</label>
                <textarea class="form-control" name="alamat" aria-label="With textarea"><?= $data['alamat'] ?></textarea>
              </div><br>
              <div class="sm-3">
                <label for="tanggal" class="form-label">Tanggal Lahir</label>
                <input type="date" name="tanggal" value="<?= $data['tgl_lahir'] ?>" class="form-control" id="tanggal" required>
              </div><br>
              <button type="submit" name="ubah" class="btn btn-success btn-lg"><i class="fa fa-check-square"></i>Simpan</button>
              <a href="ibu-hamil.php" class="btn btn-danger btn-lg"><i class="fa fa-times"></i>Batal</a>
          </div>

        </div>
      </div>
    </div>
  </div>
  <!-- /.row -->
</div>
<!-- /.container-fluid -->
<?php require_once('footer.php'); ?>