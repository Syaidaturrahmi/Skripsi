<?php
  require_once('config/koneksi.php');
  session_start();
  if(isset($_SESSION['niku'])){
    $niku = $_SESSION['niku'];
    $namau = $_SESSION['namau'];
    $akses = $_SESSION['akses'];
  }
  else{
  	$niku = null;
  	$namau = null;
  	$akses = null;
  }
?>