<?php
  $host = "localhost";
  $usr = "root";
  $pw = "";
  $db = "posyandu";
  $con = mysqli_connect($host,$usr,$pw,$db);
  if(!$con){ ?>
    <script>alert('Koneksi Gagal!');</script><?php
  }
?>