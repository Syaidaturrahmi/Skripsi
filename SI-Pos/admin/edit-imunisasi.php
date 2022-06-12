<?php require_once('head.php');
if(isset($_GET['kode'])){
  $kd = $_GET['kode'];
  $sql = mysqli_query($con, "SELECT * FROM imunisasi WHERE kode_balita='$kd'");
  $data = mysqli_fetch_array($sql);
  $nikibu = $data['nik'];
  $sql2 = mysqli_query($con, "SELECT * FROM balita inner join user on user.nik=balita.nik WHERE balita.nik = '$nikibu'");
  $data2 = mysqli_fetch_array($sql2);
}

if(isset($_POST['tambah'])){
  $imun = $_POST['imun'];
  $tgl = $_POST['tgl'];
  $tipe = 'imun';

  $add = mysqli_query($con, "UPDATE imunisasi SET jenis_vaksin='$imun',tgl_imunisasi='$tgl' WHERE kode_balita='$kd'");
  $history = mysqli_query($con, "INSERT into history_imun VALUES('$kd','$nikibu','$imun','$tgl')");
  if($add && $history){
    header('location:imunisasi.php?stat=update_success');
  }else{
    header('location:imunisasi.php?stat=update_failed');
  }
}
?>
     <div class="container-fluid">
            <div class="row bg-title">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h4 class="page-title">CATATAN IMUNISASI</h4>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /row -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="white-box">
                        <h3 class="box-title">Catatan Imunisasi</h3>
                        <div class="row">
                          <?php require_once('alert.php'); ?>
                            <div class="col-sm-6">
                                <h4 style="text-align: center;">Biodata Balita</h4>
                                <form method="post">
                                    <div class="sm-3">
                                        <label for="exampleInputEmail1" class="form-label">Nama Ibu</label>
                                        <input type="text" name="" class="form-control" id="" readonly value="<?php echo ucwords($data2['nama']) ?>">
                                    </div><br>
                                    <div class="sm-3">
                                        <label for="exampleInputPassword1" class="form-label">Nama Balita</label>
                                        <input type="text" name="" class="form-control" id="" readonly value="<?php echo ucwords($data2['nama_balita'])." | ".ucwords($data2['nama']) ?>">
                                    </div><br>
                                    <p><b style="color: red">Note:</b><br><br>* Jarak antara (interval) pemberian vaksin DPT-HB-Hib minimal 4 minggu (1 bulan). Jarak antara pemberian vaksin Polio minimal 4 minggu (1 bulan)<br>** Anak diatas umur 1 tahun (12 bulan) yang belum lengkap imunisasinya tetap harus diberikan imunisasi dasar lengkap. Sakit ringan seperti batuk, pilek, diare, demam ringan dan sakit kulit bukan halangan untuk imunisasi<br></p>
                            </div>
                            <div class="col-sm-6"><br><br>
                                    <div class="sm-3">
                                        <label for="exampleInputEmail1" class="form-label">Jenis Imunisasi</label>
                                        <select class="form-control" name="imun" id="imun">
                                          <option value="<?= $data['jenis_vaksin'] ?>"><?= $data['jenis_vaksin'] ?></option>
                                          <option value="HB-O (0-7 hari)" id="1">HB-O (0-7 hari)</option>
                                          <option value="BCG" id="1">BCG</option>
                                          <option value="*Polio 1" id="2">*Polio 1</option>
                                          <option value="*DPT-HB-Hib 1" id="2">*DPT-HB-Hib 1</option>
                                          <option value="*Polio 2" id="2">*Polio 2</option>
                                          <option value="*DPT-HB-Hib 2" id="2">*DPT-HB-Hib 2 </option>
                                          <option value="*Polio 3" id="2">*Polio 3</option>
                                          <option value="*DPT-HB-Hib 3" id="2">*DPT-HB-Hib 3</option>
                                          <option value="*Polio 4" id="2">*Polio 4</option>
                                          <option value="*IPV" id="2">*IPV</option>
                                          <option value="***Campak" id="1">***Campak</option>
                                          <option value="***DPT-HB-Hib Lanjutan" id="4">***DPT-HB-Hib Lanjutan</option>
                                          <option value="****Campak Lanjutan" id="5">****Campak Lanjutan</option>
                                          <option value="" id="5">-</option>
                                        </select>
                                    </div><br>
                                    <div class="sm-3">
                                        <label for="exampleInputPassword1" class="form-label">Tanggal Imunisasi</label>
                                        <input type="date" name="tgl" class="form-control" id="" value="<?= $data['tgl_imunisasi'] ?>" required>
                                    </div><br><br><br><p>*** Pemberian DPT-HB-Hib lanjutan diberikan minimal 12 bulan setelah pemberian imunisasi DPT-HB-Hib 3 dan dapat diberikan dalam renatng usia 18-24 bulan<br>**** Pemberian imunisasi campak lanjutan diberikan minimal 6 bulan setelah pemberian imunisasi campak terakhir dan dapat diberikan dalam rentang usia 18-24 bulan</p>
                                    <hr>
                                    <button name="tambah" class="btn btn-success btn-lg"><i class="fa fa-check-square"></i> Simpan</button>
                                    <a href="imunisasi.php" class="btn btn-danger btn-lg"><i class="fa fa-times"></i> Batal</a>
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