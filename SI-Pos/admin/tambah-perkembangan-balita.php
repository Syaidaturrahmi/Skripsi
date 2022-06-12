<?php require_once('head.php');
if(isset($_POST['tambah'])){
  //BAYI
  $ibu = $_POST['ibu'];
  $bayi = $_POST['bayi'];
  $tb = $_POST['tb'];
  $bb = $_POST['bb'];
  $tgl = $_POST['tgl'];
  $tipe = 'perk';

  if($ibu==null || $bayi==null || $tb==null || $bb==null || $tgl==null) {
    header('location:daftar-perkembangan-balita.php?stat=input_null');
  } else {
    $add = mysqli_query($con, "INSERT into perkembangan_balita VALUES('$bayi','$ibu','$bb','$tb','$tgl')");
    $history = mysqli_query($con, "INSERT INTO `history`(`kode_balita`, `nik`, `tipe`, `bb_balita`, `tb_balita`, `tgl_periksa`) VALUES ('$bayi','$ibu','$tipe','$bb','$tb','$tgl')");
    if($add && $history){
      header('location:perkembangan-balita.php?stat=input_success');
    }else{
      header('location:perkembangan-balita.php?stat=input_failed');
    }
  }
}
?>
        <div class="container-fluid">
            <div class="row bg-title">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h4 class="page-title">PERKEMBANGAN BALITA</h4>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /row -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="white-box">
                        <h3 class="box-title">Tambah Perkembangan Balita</h3>
                        <div class="row">
                          <?php require_once('alert.php'); ?>
                            <div class="col-sm-6">
                                <h4 style="text-align: center;">Biodata Balita</h4>
                                <form method="post">
                                  <div class="sm-3">
                                      <label for="exampleInputEmail1" class="form-label">Nama Ibu</label>
                                      <select class="form-control" name="ibu" required>
                                        <option value="">-- Pilih Nama Ibu --</option>
                                        <?php $sql = mysqli_query($con, "SELECT * FROM user WHERE akses='user'");
                                        while($datai = mysqli_fetch_array($sql)){?>
                                        <option value="<?= $datai['nik']?>"><?php echo ucwords($datai['nama']) ?></option>
                                        <?php } ?>
                                      </select>
                                  </div><br>
                                  <div class="sm-3">
                                      <label for="exampleInputPassword1" class="form-label">Nama Balita</label>
                                      <select class="form-control" name="bayi" required>
                                        <option value="">--Pilih Nama Balita--</option>
                                        <?php $sql = mysqli_query($con, "SELECT * FROM balita inner join user on user.nik=balita.nik");
                                        while($datab = mysqli_fetch_array($sql)){?>
                                        <option value="<?= $datab['kode_balita']?>"><?php echo ucwords($datab['nama_balita'])." | ".ucwords($datab['nama']) ?></option>
                                        <?php } ?>
                                      </select>
                                  </div><br>
                            </div>
                            <div class="col-sm-6"><br><br>
                                    <div class="sm-3">
                                        <label for="exampleInputPassword1" class="form-label">Tinggi Badan (Cm)</label>
                                        <input type="number" min="0" step=".1" name="tb" class="form-control" required>
                                    </div><br>
                                    <div class="sm-3">
                                        <label for="exampleInputPassword1" class="form-label">Berat Badan (Kg)</label>
                                        <input type="number" min="0" step=".1" name="bb" class="form-control" required>
                                    </div><br>
                                    <div class="sm-3">
                                        <label for="exampleInputPassword1" class="form-label">Tanggal Periksa</label>
                                        <input type="date" name="tgl" class="form-control" required>
                                    </div><br>
                                    <hr>
                                    <button name="tambah" class="btn btn-success btn-lg"><i class="fa fa-check-square"></i> Simpan</button>
                                    <a href="perkembangan-balita.php" class="btn btn-danger btn-lg"><i class="fa fa-times"></i> Batal</a>
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