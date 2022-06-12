<?php
  require_once('../config/koneksi.php');
  if(isset($_GET['kode'])){
    $kode = $_GET['kode'];
    $sql = mysqli_query($con, "select * from balita where kode_balita='$kode'");
    $data = mysqli_fetch_array($sql);
    $kdi = $data['nik'];
    $del = mysqli_query($con, "DELETE FROM user WHERE nik='$kdi'");
    $del2 = mysqli_query($con, "DELETE FROM balita WHERE kode_balita='$kode'");
    if($del && $del2){
      header('location:balita.php?stat=delete_success');
    }else{
      header('location:balita.php?stat=delete_failed');
    }
  }
?>