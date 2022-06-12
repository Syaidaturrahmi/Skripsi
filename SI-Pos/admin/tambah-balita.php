<?php require_once('head.php');
if(isset($_POST['tambah'])){
  //ORTU
  $nik = $_POST['nik'];
  $nuser = $_POST['nuser'];
  $tmuser = $_POST['tmuser'];
  $tluser = $_POST['tluser'];
  $alamat = $_POST['alamat'];
  $hp = $_POST['hp'];
  $agama = $_POST['agama'];
  $kerja = $_POST['kerja'];
  $ayah = $_POST['ayah'];
  $jenkel = $_POST['jenkel'];
  $akses = 'user';
  $uname = $_POST['uname'];
  $pass = md5($_POST['pass']);

  //BAYI
  $nama = $_POST['bayi'];
  $tmbayi = $_POST['tmbayi'];
  $tlbayi = $_POST['tlbayi'];

  if($nik==null || $nuser==null || $tmuser==null || $alamat==null || $hp==null || $agama==null || $kerja==null || $ayah==null || $uname==null || $pass==null || $nama==null || $tmbayi==null || $tlbayi==null) {
    header('location:pendaftaran-balita.php?stat=input_null');
  } else {
    $adduser = mysqli_query($con,"INSERT INTO user VALUES('$nik','$nuser','$tmuser','$tluser','$alamat',
    '$hp','$agama','$kerja','$ayah','$akses','$uname','$pass')");
  $addbayi = mysqli_query($con,"INSERT INTO balita VALUES('','$nik','$nama','$tmbayi','$tlbayi','$jenkel')");
  if($adduser && $addbayi){
    header('location:balita.php?stat=input_success');
  }else{
    header('location:balita.php?stat=input_failed');
  }
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
                        <h3 class="box-title">Pendaftaran Balita</h3>
                        <div class="row">
                            <?php require_once('alert.php'); ?>
                            <div class="col-sm-6">
                                <h4 style="text-align: center;">Data Orang Tua</h4>
                                <form method="post">
                                    <div class="sm-3">
                                        <label for="exampleInputEmail1" class="form-label">NIK</label>
                                        <input type="text" name="nik" class="form-control" id="" aria-describedby="emailHelp">
                                    </div><br>
                                    <div class="sm-3">
                                        <label for="exampleInputPassword1" class="form-label">Ibu Bayi</label>
                                        <input type="text" name="nuser" class="form-control" id="">
                                    </div><br>
                                    <div class="sm-3">
                                        <label for="exampleInputPassword1" class="form-label">Tempat Lahir</label>
                                        <input type="text" name="tmuser" class="form-control" id="">
                                    </div><br>
                                    <div class="sm-3">
                                        <label for="exampleInputPassword1" class="form-label">Tanggal Lahir</label>
                                        <input type="date" name="tluser" class="form-control" id="">
                                    </div><br>
                                    <div class="sm-3">
                                        <label for="exampleInputPassword1" class="form-label">Alamat</label>
                                        <textarea class="form-control" name="alamat" aria-label="With textarea"></textarea>
                                    </div><br>
                                    <div class="sm-3">
                                        <label for="exampleInputPassword1" class="form-label">No HP</label>
                                        <input type="text" name="hp" class="form-control" id="">
                                    </div><br>
                                    <div class="sm-3">
                                        <label for="exampleInputPassword1" class="form-label">Agama</label>
                                        <input type="text" name="agama" class="form-control" id="">
                                    </div><br>
                                    <div class="sm-3">
                                        <label for="exampleInputPassword1" class="form-label">Pekerjaan</label>
                                        <input type="text" name="kerja" class="form-control" id="">
                                    </div><br>
                                    <div class="sm-3">
                                        <label for="exampleInputPassword1" class="form-label">Nama Ayah</label>
                                        <input type="text" name="ayah" class="form-control" id="">
                                    </div><br>
                            </div>
                            <div class="col-sm-6">
                                <h4 style="text-align: center;">Data Balita</h4>
                                    <div class="sm-3">
                                        <label for="exampleInputEmail1" class="form-label">Nama Lengkap</label>
                                        <input type="text" name="bayi" class="form-control" id="" aria-describedby="emailHelp">
                                    </div><br>
                                    <div class="sm-3">
                                        <label for="exampleInputPassword1" class="form-label">Tempat Lahir</label>
                                        <input type="text" name="tmbayi" class="form-control" id="">
                                    </div><br>
                                    <div class="sm-3">
                                        <label for="exampleInputPassword1" class="form-label">Tanggal Lahir</label>
                                        <input type="date" name="tlbayi" class="form-control" id="">
                                    </div><br>
                                    <div class="sm-3">
                                        <label for="exampleInputPassword1" class="form-label">Jenis Kelamin</label>
                                        <select class="form-control" name="jenkel">
                                          <option value="L">Laki-laki</option>
                                          <option value="P">Perempuan</option>
                                        </select>
                                    </div><br>
                                    <div class="sm-3">
                                        <label for="exampleInputPassword1" class="form-label">Username</label>
                                        <input type="text" name="uname" class="form-control" id="">
                                    </div><br>
                                    <div class="sm-3">
                                        <label for="exampleInputPassword1" class="form-label">Password</label>
                                        <input type="password" name="pass" class="form-control" id="">
                                    </div><br>
                                    <button name="tambah" class="btn btn-success btn-lg"><i class="fa fa-check-square"></i> Daftar</button>
                                    <a href="balita.php" class="btn btn-danger btn-lg"><i class="fa fa-times"></i> Batal</a>
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