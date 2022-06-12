<?php
  require_once('../config/koneksi.php');
  session_start();
  if(isset($_SESSION['kode'])){
    $kda = $_SESSION['kode'];
    $namaa = $_SESSION['nama'];
    $alamata = $_SESSION['alamat'];
    $hpa = $_SESSION['hp'];
    $unamea = $_SESSION['uname'];
  }else{
    header('location:../login.php?stat=session_timeout');
    exit();
  }
?>