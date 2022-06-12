<?php require_once('head.php');

if(isset($_GET['kode'])){
  $kode = $_GET['kode'];
  $sql = mysqli_query($con, "SELECT * FROM phbs WHERE kode_phbs='$kode'");
  $data = mysqli_fetch_array($sql);
}

if(isset($_POST['up'])){
  $kodeb = $_POST['kode'];
  $judul = $_POST['judul'];
  $jenis = $_POST['jns'];
  $tempat = $_POST['tmpt'];
  $tgl = $_POST['tgl'];
  $des = $_POST['des'];
  $pen = $_POST['penulis'];
  $edit = $_POST['editor'];
  $terbit = $_POST['penerbit'];

  $ekstensi =  array('png','jpg','jpeg');
  $namafile = $_FILES['gmb']['name'];
  $ukfile = $_FILES['gmb']['size'];
  $ext = pathinfo($namafile, PATHINFO_EXTENSION);
  $lokasi = "../img/";
  $save = "img/";
  $up = "";

    if($namafile==null){
    $up = mysqli_query($con,"UPDATE phbs SET
    judul_berita='$judul',
    jenis_berita='$jenis',
    tempat_dibuat='$tempat',
    tgl_dibuat='$tgl',
    deskripsi_berita='$des',
    penulis_berita='$pen',
    editor_berita='$edit',
    penerbit='$terbit' WHERE kode_phbs='$kodeb'");
    if($up){
      header('location:berita.php?stat=update_success');
    }else{
      header('location:berita.php?stat=update_failed');
    }
  }else{
    if(!in_array($ext,$ekstensi)){
      header('location:berita.php?stat=wrong_file_ext');
    }else{
      if($ukfile < 1044070){
        move_uploaded_file($_FILES['gmb']['tmp_name'], $lokasi.$namafile);
        $up = mysqli_query($con,"UPDATE phbs SET
        judul_berita='$judul',
        jenis_berita='$jenis',
        tempat_dibuat='$tempat',
        tgl_dibuat='$tgl',
        deskripsi_berita='$des',
        penulis_berita='$pen',
        editor_berita='$edit',
        penerbit='$terbit',
        gambar='$save$namafile' WHERE kode_phbs='$kodeb'");
        if($up){
          header('location:berita.php?stat=update_success');
        }else{
          header('location:berita.php?stat=update_failed');
        }
      }else{
        header('location:berita.php?stat=size_file_too_large');
      }
    }
  }
  
}
?>
        <div class="container-fluid">
            <div class="row bg-title">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h4 class="page-title">BERITA</h4>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /row -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="white-box">
                        <h3 class="box-title">Ubah Berita</h3>
                        <div class="row">
                            <div class="col-sm-6">
                              <form method="post" action="" enctype="multipart/form-data">
                                <input type="hidden" name="kode" class="form-control" value="<?= $data['kode_phbs']?>">
                                  <div class="sm-3">
                                      <label for="exampleInputEmail1" class="form-label">Judul</label>
                                      <input type="text" value="<?= $data['judul_berita']?>" name="judul" class="form-control" id="" aria-describedby="emailHelp" placeholder="Masukkan judul berita">
                                  </div><br>
                                  <div class="sm-3">
                                      <label for="exampleInputEmail1" class="form-label">Jenis Berita</label>
                                      <input type="text" value="<?= $data['jenis_berita']?>" name="jns" class="form-control" id="" aria-describedby="emailHelp" placeholder="Masukkan link berita">
                                  </div><br>
                                  <div class="sm-3">
                                      <label for="exampleInputEmail1" class="form-label">Tempat Dibuat</label>
                                      <input type="text" value="<?= $data['tempat_dibuat']?>" name="tmpt" class="form-control" id="" aria-describedby="emailHelp" placeholder="Masukkan link gambar">
                                  </div><br>
                                  <div class="sm-3">
                                      <label for="exampleInputEmail1" class="form-label">Tanggal Berita</label>
                                      <input type="date" value="<?= $data['tgl_dibuat']?>" name="tgl" class="form-control" id="" aria-describedby="emailHelp">
                                  </div><br>
                          </div>
                          <div class="col-sm-6">
                                  <div class="sm-3">
                                      <label for="exampleInputPassword1" class="form-label">Deskripsi Berita</label>
                                      <textarea class="form-control" name="des" aria-label="With textarea" placeholder="Deskripsi Singkat Berita"><?= $data['deskripsi_berita']?>"</textarea>
                                  </div><br>
                                  <div class="sm-3">
                                      <label for="exampleInputEmail1" class="form-label">Penulis</label>
                                      <input type="text" value="<?= $data['penulis_berita']?>" name="penulis" class="form-control" id="" aria-describedby="emailHelp" placeholder="Masukkan link gambar">
                                  </div><br>
                                  <div class="sm-3">
                                      <label for="exampleInputEmail1" class="form-label">Editor</label>
                                      <input type="text" value="<?= $data['editor_berita']?>" name="editor" class="form-control" id="" aria-describedby="emailHelp" placeholder="Masukkan link gambar">
                                  </div><br>
                                  <div class="sm-3">
                                      <label for="exampleInputEmail1" class="form-label">Penerbit</label>
                                      <input type="text" value="<?= $data['penerbit']?>" name="penerbit" class="form-control" id="" aria-describedby="emailHelp" placeholder="Masukkan link gambar">
                                  </div><br>
                                  <div class="sm-3">
                                      <label for="exampleInputEmail1" class="form-label">Gambar</label>
                                      <input type="file" name="gmb" class="form-control" id="" aria-describedby="emailHelp" placeholder="Masukkan link gambar">
                                  </div><br>
                                  <hr>
                                  <button type="submit" class="btn btn-success btn-lg" name="up"><i class="fa fa-check-square"></i>Simpan</button>
                                  <a href="berita.php" class="btn btn-danger btn-lg"><i class="fa fa-times"></i>Batal</a>
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