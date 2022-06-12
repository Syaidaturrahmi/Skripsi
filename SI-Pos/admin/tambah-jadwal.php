<?php require_once('head.php');
if(isset($_POST['tambah'])){
  //BAYI
    $tgl = $_POST['tgl'];
    $jam = $_POST['jam'];

    if ($tgl==null || $jam==null) {
        header('location:tambah-jadwal.php?stat=input_null');
    } else {
        # code...
        $add = mysqli_query($con, "INSERT INTO jadwal VALUES('','$tgl','$jam')");
        if($add){
            header('location:jadwal-posyandu.php?stat=input_success');
        }else{
            header('location:jadwal-posyandu.php?stat=input_failed');
        }
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
                                <?php require_once('alert.php'); ?>
                                <form method="post">
                                    <div class="sm-3">
                                        <label for="exampleInputEmail1" class="form-label">Tanggal</label>
                                        <input type="date" name="tgl" class="form-control" id="" aria-describedby="emailHelp">
                                    </div><br>
                                    <div class="sm-3">
                                        <label for="exampleInputPassword1" class="form-label">Jam</label>
                                        <input type="time" name="jam" class="form-control" id="">
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