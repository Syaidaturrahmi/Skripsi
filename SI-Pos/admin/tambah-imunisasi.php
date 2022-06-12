<?php require_once('head.php');
if(isset($_POST['tambah'])){
  //BAYI
  $ibu = $_POST['ibu'];
  $bayi = $_POST['bayi'];
  $imun = $_POST['imun'];
  $tgl = $_POST['tgl'];
  $tipe = 'imun';

  if($ibu==null || $bayi==null || $tgl==null) {
    header('location:imunisasi.php?stat=input_null');
  } else {
    $add = mysqli_query($con, "INSERT into imunisasi VALUES('$bayi','$ibu','$imun','$tgl')");
    $history = mysqli_query($con, "INSERT into history_imun VALUES('$bayi','$ibu','$imun','$tgl')");
    if($add && $history){
      header('location:imunisasi.php?stat=input_success');
    }else{
      header('location:imunisasi.php?stat=input_failed');
    }

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
                        <h3 class="box-title">Pendaftaran Imunisasi</h3>
                        <div class="row">
                          <?php require_once('alert.php'); ?>
                            <div class="col-sm-6">
                                <h4 style="text-align: center;">Biodata Balita</h4>
                                <form method="post">
                                    <div class="sm-3">
                                        <label for="exampleInputEmail1" class="form-label">Nama Ibu</label>
                                        <select class="form-control" name="ibu" required>
                                          <option value="">--Pilih Nama Ibu--</option>
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
                                    <p><b style="color: red">Note:</b><br><br>* Jarak antara (interval) pemberian vaksin DPT-HB-Hib minimal 4 minggu (1 bulan). Jarak antara pemberian vaksin Polio minimal 4 minggu (1 bulan)<br>** Anak diatas umur 1 tahun (12 bulan) yang belum lengkap imunisasinya tetap harus diberikan imunisasi dasar lengkap. Sakit ringan seperti batuk, pilek, diare, demam ringan dan sakit kulit bukan halangan untuk imunisasi<br></p>
                            </div>
                            <div class="col-sm-6"><br><br>
                                    <div class="sm-3">
                                        <label for="exampleInputEmail1" class="form-label">Jenis Imunisasi</label>
                                        <select class="form-control" name="imun" id="imun">
                                          <option value="">-- Pilih Jenis Vaksin --</option>
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
                                        </select>
                                    </div><br>
                                    <div class="sm-3">
                                        <label for="exampleInputPassword1" class="form-label">Tanggal Imunisasi</label>
                                        <input type="date" name="tgl" class="form-control" id="" required>
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