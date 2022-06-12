<?php
  require_once('../config/koneksi.php');
  if(isset($_GET['kode'])){
    $kode = $_GET['kode'];
    $del = mysqli_query($con, "DELETE FROM phbs WHERE kode_phbs='$kode'");
    if($del){
      header('location:berita.php?stat=delete_success');
    }else{
      header('location:berita.php?stat=delete_failed');
    }
  }
?>