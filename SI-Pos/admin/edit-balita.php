<?php require_once('head.php');

if(isset($_GET['kode'])){
  $kd = $_GET['kode'];
  $sql = mysqli_query($con, "SELECT * from balita where kode_balita='$kd'");
  $data = mysqli_fetch_array($sql);
  $nikibu = $data['nik'];
  $sql2 = mysqli_query($con, "SELECT * from user where nik='$nikibu'");
  $data2 = mysqli_fetch_array($sql2);
}

if(isset($_POST['tambah'])){
  //ORTU
  $niki = $_POST['nik'];
  $nuser = $_POST['nuser'];
  $tmuser = $_POST['tmuser'];
  $tluser = $_POST['tluser'];
  $alamat = $_POST['alamat'];
  $hp = $_POST['hp'];
  $agama = $_POST['agama'];
  $kerja = $_POST['kerja'];
  $ayah = $_POST['ayah'];
  $pass = md5($_POST['pass']);

  //BAYI
  $kdb = $_POST['kdb'];
  $nama = $_POST['bayi'];
  $tmbayi = $_POST['tmbayi'];
  $tlbayi = $_POST['tlbayi'];

    $adduser = mysqli_query($con,"UPDATE user set
    nama = '$nuser',
    tempat_lahir = '$tmuser',
    tgl_lahir = '$tluser',
    alamat = '$alamat',
    no_hp = '$hp',
    agama = '$agama',
    pekerjaan = '$kerja',
    nama_suami = '$ayah',
    password = '$pass'
    where nik = '$niki'");

    $addbayi = mysqli_query($con,"UPDATE balita set
    nama_balita='$nama',
    tempat_lahir='$tmbayi',
    tgl_lahir='$tlbayi'
    where kode_balita='$kdb'");
    if($adduser && $addbayi){
      header('location:balita.php?stat=update_success');
    }else{
      header('location:balita.php?stat=update_failed');
    }
  
}
?>
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
                        <h3 class="box-title">Ubah Pendaftaran Balita</h3>
                        <div class="row">
                          <?php require_once('alert.php'); ?>
                            <div class="col-sm-6">
                              <h4 style="text-align: center;">Data Orang Tua</h4>
                              <form method="post">
                                  <div class="sm-3">
                                      <label for="exampleInputEmail1" class="form-label">NIK</label>
                                      <input type="text" readonly value="<?= $data2['nik'] ?>" name="nik" class="form-control" id="" aria-describedby="emailHelp">
                                  </div><br>
                                  <div class="sm-3">
                                      <label for="exampleInputPassword1" class="form-label">Ibu Bayi</label>
                                      <input type="text" value="<?= $data2['nama'] ?>" name="nuser" class="form-control" id="">
                                  </div><br>
                                  <div class="sm-3">
                                      <label for="exampleInputPassword1" class="form-label">Tempat Lahir</label>
                                      <input type="text" value="<?= $data2['tempat_lahir'] ?>" name="tmuser" class="form-control" id="">
                                  </div><br>
                                  <div class="sm-3">
                                      <label for="exampleInputPassword1" class="form-label">Tanggal Lahir</label>
                                      <input type="date" value="<?= $data2['tgl_lahir'] ?>" name="tluser" class="form-control" id="">
                                  </div><br>
                                  <div class="sm-3">
                                      <label for="exampleInputPassword1" class="form-label">Alamat</label>
                                      <textarea class="form-control" name="alamat" aria-label="With textarea"><?= $data2['alamat'] ?></textarea>
                                  </div><br>
                                  <div class="sm-3">
                                      <label for="exampleInputPassword1" class="form-label">No HP</label>
                                      <input type="text" value="<?= $data2['no_hp'] ?>" name="hp" class="form-control" id="">
                                  </div><br>
                                  <div class="sm-3">
                                      <label for="exampleInputPassword1" class="form-label">Agama</label>
                                      <input type="text" value="<?= $data2['agama'] ?>" name="agama" class="form-control" id="">
                                  </div><br>
                                  <div class="sm-3">
                                      <label for="exampleInputPassword1" class="form-label">Pekerjaan</label>
                                      <input type="text" value="<?= $data2['pekerjaan'] ?>" name="kerja" class="form-control" id="">
                                  </div><br>
                                  <div class="sm-3">
                                      <label for="exampleInputPassword1" class="form-label">Nama Ayah</label>
                                      <input type="text" value="<?= $data2['nama_suami'] ?>" name="ayah" class="form-control" id="">
                                  </div><br>
                          </div>
                          <div class="col-sm-6">
                              <h4 style="text-align: center;">Data Balita</h4>
                              <input type="hidden" value="<?= $data['kode_balita'] ?>" name="kdb">
                                  <div class="sm-3">
                                      <label for="exampleInputEmail1" class="form-label">Nama Lengkap</label>
                                      <input type="text" value="<?= $data['nama_balita'] ?>" name="bayi" class="form-control" id="" aria-describedby="emailHelp">
                                  </div><br>
                                  <div class="sm-3">
                                      <label for="exampleInputPassword1" class="form-label">Tempat Lahir</label>
                                      <input type="text" value="<?= $data['tempat_lahir'] ?>" name="tmbayi" class="form-control" id="">
                                  </div><br>
                                  <div class="sm-3">
                                      <label for="exampleInputPassword1" class="form-label">Tanggal Lahir</label>
                                      <input type="date" value="<?= $data['tgl_lahir'] ?>" name="tlbayi" class="form-control" id="">
                                  </div>
                                  <hr>
                                  <div class="sm-3">
                                      <label for="exampleInputPassword1" class="form-label">Username</label>
                                      <input type="text" disabled value="<?= $data2['username'] ?>" name="uname" class="form-control" id="">
                                  </div><br>
                                    <div class="sm-3">
                                        <label for="exampleInputPassword1" class="form-label">Password Baru</label>
                                        <input type="password" name="pass" class="form-control" id="">
                                    </div><br>
                                  <button type="submit" name="tambah" class="btn btn-success btn-lg"><i class="fa fa-check-square"></i>Simpan</button>
                                  <a href="balita.php" class="btn btn-danger btn-lg"><i class="fa fa-times"></i>Batal</a>
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