<?php require_once('head.php');
if(isset($_GET['kode'])){
  $kd = $_GET['kode'];
  $sql = mysqli_query($con, "SELECT * FROM jadwal");
  $data = mysqli_fetch_array($sql);
}

if(isset($_POST['tambah'])){
  //BAYI
  $kode = $_POST['kd'];
  $tgl = $_POST['tgl'];
  $jam = $_POST['jam'];

  $add = mysqli_query($con, "UPDATE jadwal SET tanggal='$tgl',jam='$jam' where kode_jadwal='$kode'");
  if($add){
    header('location:jadwal-posyandu.php?stat=update_success');
  }else{
    header('location:jadwal-posyandu.php?stat=update_failed');
  }
}
?>
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
                            <div class="col-sm-6">
                                <form method="post">
                                  <input type="hidden" name="kd" value="<?= $data['kode_jadwal']?>">
                                    <div class="sm-3">
                                        <label for="exampleInputEmail1" class="form-label">Tanggal</label>
                                        <input type="date" value="<?= $data['tanggal']?>" name="tgl" class="form-control" id="" aria-describedby="emailHelp">
                                    </div><br>
                                    <div class="sm-3">
                                        <label for="exampleInputPassword1" class="form-label">Jam</label>
                                        <input type="time" value="<?= $data['jam']?>" name="jam" class="form-control" id="">
                                    </div><br>
                                    <button name="tambah" class="btn btn-success btn-lg"><i class="fa fa-check-square"></i> Simpan</button>
                                    <a href="jadwal-posyandu.php" class="btn btn-danger btn-lg"><i class="fa fa-times"></i> Batal</a>
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