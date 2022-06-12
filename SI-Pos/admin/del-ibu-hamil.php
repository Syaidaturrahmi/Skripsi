<?php
  require_once('../config/koneksi.php');
  if(isset($_GET['kode'])){
    $kode = $_GET['kode'];
    $sql = mysqli_query($con, "SELECT * FROM ibu_hamil WHERE nik='$kode'");
    $data = mysqli_fetch_array($sql);
    $kdi = $data['nik'];
    $del = mysqli_query($con, "DELETE FROM ibu_hamil WHERE nik='$kdi'");
    if($del){
      header('location:ibu-hamil.php?stat=delete_success');
    }else{
      header('location:ibu-hamil.php?stat=delete_failed');
    }
  }
?>