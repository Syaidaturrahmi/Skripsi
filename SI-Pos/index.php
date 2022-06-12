<?php require_once('head.php');
date_default_timezone_set('Asia/Jakarta');
// $hariini = date('Y-m-d');

$sql1 = mysqli_query($con,"SELECT * FROM jadwal");
$jadwal = mysqli_fetch_array($sql1);
$bulan = array(
  'Januari',
  'Februari',
  'Maret',
  'April',
  'Mei',
  'Juni',
  'Juli',
  'Agustus',
  'September',
  'Oktober',
  'November',
  'Desember',
);

$sqlbbp = mysqli_query($con, "SELECT 
(SELECT COUNT(b.nama_balita) AS jumlah FROM perkembangan_balita a LEFT JOIn balita b ON b.kode_balita = a.kode_balita WHERE (YEAR(CURRENT_DATE()) - YEAR(b.tgl_lahir))=1 AND a.bb_balita<8.3 AND b.jenkel='L') AS wast1,
(SELECT COUNT(b.nama_balita) AS jumlah FROM perkembangan_balita a LEFT JOIn balita b ON b.kode_balita = a.kode_balita WHERE (YEAR(CURRENT_DATE()) - YEAR(b.tgl_lahir))=1 AND a.bb_balita>=8.3 AND a.bb_balita<11 AND b.jenkel='L') AS ideal1,
(SELECT COUNT(b.nama_balita) AS jumlah FROM perkembangan_balita a LEFT JOIn balita b ON b.kode_balita = a.kode_balita WHERE (YEAR(CURRENT_DATE()) - YEAR(b.tgl_lahir))=1 AND a.bb_balita>=11 AND b.jenkel='L') AS obe1,
(SELECT COUNT(b.nama_balita) AS jumlah FROM perkembangan_balita a LEFT JOIn balita b ON b.kode_balita = a.kode_balita WHERE (YEAR(CURRENT_DATE()) - YEAR(b.tgl_lahir))=2 AND a.bb_balita<10.5  AND b.jenkel='L') AS wast2,
(SELECT COUNT(b.nama_balita) AS jumlah FROM perkembangan_balita a LEFT JOIn balita b ON b.kode_balita = a.kode_balita WHERE (YEAR(CURRENT_DATE()) - YEAR(b.tgl_lahir))=2 AND a.bb_balita>=10.5  AND a.bb_balita<14.4 AND b.jenkel='L') AS ideal2,
(SELECT COUNT(b.nama_balita) AS jumlah FROM perkembangan_balita a LEFT JOIn balita b ON b.kode_balita = a.kode_balita WHERE (YEAR(CURRENT_DATE()) - YEAR(b.tgl_lahir))=2 AND a.bb_balita>=14.4 AND b.jenkel='L') AS obe2,
(SELECT COUNT(b.nama_balita) AS jumlah FROM perkembangan_balita a LEFT JOIn balita b ON b.kode_balita = a.kode_balita WHERE (YEAR(CURRENT_DATE()) - YEAR(b.tgl_lahir))=3 AND a.bb_balita<12.1 AND b.jenkel='L') AS wast3,
(SELECT COUNT(b.nama_balita) AS jumlah FROM perkembangan_balita a LEFT JOIn balita b ON b.kode_balita = a.kode_balita WHERE (YEAR(CURRENT_DATE()) - YEAR(b.tgl_lahir))=3 AND a.bb_balita>=12.1 AND a.bb_balita<17.2 AND b.jenkel='L') AS ideal3,
(SELECT COUNT(b.nama_balita) AS jumlah FROM perkembangan_balita a LEFT JOIn balita b ON b.kode_balita = a.kode_balita WHERE (YEAR(CURRENT_DATE()) - YEAR(b.tgl_lahir))=3 AND a.bb_balita>=17.2 AND b.jenkel='L') AS obe3,
(SELECT COUNT(b.nama_balita) AS jumlah FROM perkembangan_balita a LEFT JOIn balita b ON b.kode_balita = a.kode_balita WHERE (YEAR(CURRENT_DATE()) - YEAR(b.tgl_lahir))=4 AND a.bb_balita<13.6 AND b.jenkel='L') AS wast4,
(SELECT COUNT(b.nama_balita) AS jumlah FROM perkembangan_balita a LEFT JOIn balita b ON b.kode_balita = a.kode_balita WHERE (YEAR(CURRENT_DATE()) - YEAR(b.tgl_lahir))=4 AND a.bb_balita>=13.6 AND a.bb_balita<19.9 AND b.jenkel='L') AS ideal4,
(SELECT COUNT(b.nama_balita) AS jumlah FROM perkembangan_balita a LEFT JOIn balita b ON b.kode_balita = a.kode_balita WHERE (YEAR(CURRENT_DATE()) - YEAR(b.tgl_lahir))=4 AND a.bb_balita>=19.9 AND b.jenkel='L') AS obe4,
(SELECT COUNT(b.nama_balita) AS jumlah FROM perkembangan_balita a LEFT JOIn balita b ON b.kode_balita = a.kode_balita WHERE (YEAR(CURRENT_DATE()) - YEAR(b.tgl_lahir))=5 AND a.bb_balita<15.0 AND b.jenkel='L') AS wast5,
(SELECT COUNT(b.nama_balita) AS jumlah FROM perkembangan_balita a LEFT JOIn balita b ON b.kode_balita = a.kode_balita WHERE (YEAR(CURRENT_DATE()) - YEAR(b.tgl_lahir))=5 AND a.bb_balita>=15.0 AND a.bb_balita<22.6 AND b.jenkel='L') AS ideal5,
(SELECT COUNT(b.nama_balita) AS jumlah FROM perkembangan_balita a LEFT JOIn balita b ON b.kode_balita = a.kode_balita WHERE (YEAR(CURRENT_DATE()) - YEAR(b.tgl_lahir))=5 AND a.bb_balita>=22.6 AND b.jenkel='L') AS obe5 FROM perkembangan_balita LIMIT 0,1");
$chartbbp = mysqli_fetch_array($sqlbbp);

$sqlbbw = mysqli_query($con, "SELECT 
(SELECT COUNT(b.nama_balita) AS jumlah FROM perkembangan_balita a LEFT JOIn balita b ON b.kode_balita = a.kode_balita WHERE (YEAR(CURRENT_DATE()) - YEAR(b.tgl_lahir))=1 AND a.bb_balita<7.7 AND b.jenkel='P') AS wast1,
(SELECT COUNT(b.nama_balita) AS jumlah FROM perkembangan_balita a LEFT JOIn balita b ON b.kode_balita = a.kode_balita WHERE (YEAR(CURRENT_DATE()) - YEAR(b.tgl_lahir))=1 AND a.bb_balita>=7.7 AND a.bb_balita<10.5 AND b.jenkel='P') AS ideal1,
(SELECT COUNT(b.nama_balita) AS jumlah FROM perkembangan_balita a LEFT JOIn balita b ON b.kode_balita = a.kode_balita WHERE (YEAR(CURRENT_DATE()) - YEAR(b.tgl_lahir))=1 AND a.bb_balita>=10.5 AND b.jenkel='P') AS obe1,
(SELECT COUNT(b.nama_balita) AS jumlah FROM perkembangan_balita a LEFT JOIn balita b ON b.kode_balita = a.kode_balita WHERE (YEAR(CURRENT_DATE()) - YEAR(b.tgl_lahir))=2 AND a.bb_balita<9.7 AND b.jenkel='P') AS wast2,
(SELECT COUNT(b.nama_balita) AS jumlah FROM perkembangan_balita a LEFT JOIn balita b ON b.kode_balita = a.kode_balita WHERE (YEAR(CURRENT_DATE()) - YEAR(b.tgl_lahir))=2 AND a.bb_balita>=9.7 AND a.bb_balita<13.7 AND b.jenkel='P') AS ideal2,
(SELECT COUNT(b.nama_balita) AS jumlah FROM perkembangan_balita a LEFT JOIn balita b ON b.kode_balita = a.kode_balita WHERE (YEAR(CURRENT_DATE()) - YEAR(b.tgl_lahir))=2 AND a.bb_balita>=13.7 AND b.jenkel='P') AS obe2,
(SELECT COUNT(b.nama_balita) AS jumlah FROM perkembangan_balita a LEFT JOIn balita b ON b.kode_balita = a.kode_balita WHERE (YEAR(CURRENT_DATE()) - YEAR(b.tgl_lahir))=3 AND a.bb_balita<11.5 AND b.jenkel='P') AS wast3,
(SELECT COUNT(b.nama_balita) AS jumlah FROM perkembangan_balita a LEFT JOIn balita b ON b.kode_balita = a.kode_balita WHERE (YEAR(CURRENT_DATE()) - YEAR(b.tgl_lahir))=3 AND a.bb_balita>=11.5 AND a.bb_balita<16.5 AND b.jenkel='P') AS ideal3,
(SELECT COUNT(b.nama_balita) AS jumlah FROM perkembangan_balita a LEFT JOIn balita b ON b.kode_balita = a.kode_balita WHERE (YEAR(CURRENT_DATE()) - YEAR(b.tgl_lahir))=3 AND a.bb_balita>=16.5 AND b.jenkel='P') AS obe3,
(SELECT COUNT(b.nama_balita) AS jumlah FROM perkembangan_balita a LEFT JOIn balita b ON b.kode_balita = a.kode_balita WHERE (YEAR(CURRENT_DATE()) - YEAR(b.tgl_lahir))=4 AND a.bb_balita<13 AND b.jenkel='P') AS wast4,
(SELECT COUNT(b.nama_balita) AS jumlah FROM perkembangan_balita a LEFT JOIn balita b ON b.kode_balita = a.kode_balita WHERE (YEAR(CURRENT_DATE()) - YEAR(b.tgl_lahir))=4 AND a.bb_balita>=13 AND a.bb_balita<19.2 AND b.jenkel='P') AS ideal4,
(SELECT COUNT(b.nama_balita) AS jumlah FROM perkembangan_balita a LEFT JOIn balita b ON b.kode_balita = a.kode_balita WHERE (YEAR(CURRENT_DATE()) - YEAR(b.tgl_lahir))=4 AND a.bb_balita>=19.2 AND b.jenkel='P') AS obe4,
(SELECT COUNT(b.nama_balita) AS jumlah FROM perkembangan_balita a LEFT JOIn balita b ON b.kode_balita = a.kode_balita WHERE (YEAR(CURRENT_DATE()) - YEAR(b.tgl_lahir))=5 AND a.bb_balita<14.4 AND b.jenkel='P') AS wast5,
(SELECT COUNT(b.nama_balita) AS jumlah FROM perkembangan_balita a LEFT JOIn balita b ON b.kode_balita = a.kode_balita WHERE (YEAR(CURRENT_DATE()) - YEAR(b.tgl_lahir))=5 AND a.bb_balita>=14.4 AND a.bb_balita<21.7 AND b.jenkel='P') AS ideal5,
(SELECT COUNT(b.nama_balita) AS jumlah FROM perkembangan_balita a LEFT JOIn balita b ON b.kode_balita = a.kode_balita WHERE (YEAR(CURRENT_DATE()) - YEAR(b.tgl_lahir))=5 AND a.bb_balita>=21.7 AND b.jenkel='P') AS obe5 FROM perkembangan_balita LIMIT 0,1");
$chartbbw = mysqli_fetch_array($sqlbbw);

$sqlavgbbp = mysqli_query($con, "SELECT (SELECT AVG(a.bb_balita) AS AVG FROM perkembangan_balita a LEFT JOIN balita b ON b.kode_balita = a.kode_balita WHERE (YEAR(CURRENT_DATE()) - YEAR(b.tgl_lahir))=1 AND b.jenkel='L') AS avg1,
(SELECT AVG(a.bb_balita) AS AVG FROM perkembangan_balita a LEFT JOIN balita b ON b.kode_balita = a.kode_balita WHERE (YEAR(CURRENT_DATE()) - YEAR(b.tgl_lahir))=2 AND b.jenkel='L') AS avg2,
(SELECT AVG(a.bb_balita) AS AVG FROM perkembangan_balita a LEFT JOIN balita b ON b.kode_balita = a.kode_balita WHERE (YEAR(CURRENT_DATE()) - YEAR(b.tgl_lahir))=3 AND b.jenkel='L') AS avg3,
(SELECT AVG(a.bb_balita) AS AVG FROM perkembangan_balita a LEFT JOIN balita b ON b.kode_balita = a.kode_balita WHERE (YEAR(CURRENT_DATE()) - YEAR(b.tgl_lahir))=4 AND b.jenkel='L') AS avg4,
(SELECT AVG(a.bb_balita) AS AVG FROM perkembangan_balita a LEFT JOIN balita b ON b.kode_balita = a.kode_balita WHERE (YEAR(CURRENT_DATE()) - YEAR(b.tgl_lahir))=5 AND b.jenkel='L') AS avg5 FROM perkembangan_balita LIMIT 0,1");
$dataavgbbp = mysqli_fetch_array($sqlavgbbp);

$sqlavgbbw = mysqli_query($con, "SELECT (SELECT AVG(a.bb_balita) AS AVG FROM perkembangan_balita a LEFT JOIN balita b ON b.kode_balita = a.kode_balita WHERE (YEAR(CURRENT_DATE()) - YEAR(b.tgl_lahir))=1 AND b.jenkel='P') AS avg1,
(SELECT AVG(a.bb_balita) AS AVG FROM perkembangan_balita a LEFT JOIN balita b ON b.kode_balita = a.kode_balita WHERE (YEAR(CURRENT_DATE()) - YEAR(b.tgl_lahir))=2 AND b.jenkel='P') AS avg2,
(SELECT AVG(a.bb_balita) AS AVG FROM perkembangan_balita a LEFT JOIN balita b ON b.kode_balita = a.kode_balita WHERE (YEAR(CURRENT_DATE()) - YEAR(b.tgl_lahir))=3 AND b.jenkel='P') AS avg3,
(SELECT AVG(a.bb_balita) AS AVG FROM perkembangan_balita a LEFT JOIN balita b ON b.kode_balita = a.kode_balita WHERE (YEAR(CURRENT_DATE()) - YEAR(b.tgl_lahir))=4 AND b.jenkel='P') AS avg4,
(SELECT AVG(a.bb_balita) AS AVG FROM perkembangan_balita a LEFT JOIN balita b ON b.kode_balita = a.kode_balita WHERE (YEAR(CURRENT_DATE()) - YEAR(b.tgl_lahir))=5 AND b.jenkel='P') AS avg5 FROM perkembangan_balita LIMIT 0,1");
$dataavgbbw = mysqli_fetch_array($sqlavgbbw);

$sqltbp = mysqli_query($con, "SELECT 
(SELECT COUNT(b.nama_balita) AS jumlah FROM perkembangan_balita a LEFT JOIn balita b ON b.kode_balita = a.kode_balita WHERE (YEAR(CURRENT_DATE()) - YEAR(b.tgl_lahir))=1 AND a.tb_balita<71 AND b.jenkel='L') AS wast1,
(SELECT COUNT(b.nama_balita) AS jumlah FROM perkembangan_balita a LEFT JOIn balita b ON b.kode_balita = a.kode_balita WHERE (YEAR(CURRENT_DATE()) - YEAR(b.tgl_lahir))=1 AND a.tb_balita>=71 AND a.tb_balita<79.7 AND b.jenkel='L') AS ideal1,
(SELECT COUNT(b.nama_balita) AS jumlah FROM perkembangan_balita a LEFT JOIn balita b ON b.kode_balita = a.kode_balita WHERE (YEAR(CURRENT_DATE()) - YEAR(b.tgl_lahir))=1 AND a.tb_balita>=79.7 AND b.jenkel='L') AS obe1,
(SELECT COUNT(b.nama_balita) AS jumlah FROM perkembangan_balita a LEFT JOIn balita b ON b.kode_balita = a.kode_balita WHERE (YEAR(CURRENT_DATE()) - YEAR(b.tgl_lahir))=2 AND a.tb_balita<82.5 AND b.jenkel='L') AS wast2,
(SELECT COUNT(b.nama_balita) AS jumlah FROM perkembangan_balita a LEFT JOIn balita b ON b.kode_balita = a.kode_balita WHERE (YEAR(CURRENT_DATE()) - YEAR(b.tgl_lahir))=2 AND a.tb_balita>=82.5 AND a.tb_balita<91.7 AND b.jenkel='L') AS ideal2,
(SELECT COUNT(b.nama_balita) AS jumlah FROM perkembangan_balita a LEFT JOIn balita b ON b.kode_balita = a.kode_balita WHERE (YEAR(CURRENT_DATE()) - YEAR(b.tgl_lahir))=2 AND a.tb_balita>=91.7 AND b.jenkel='L') AS obe2,
(SELECT COUNT(b.nama_balita) AS jumlah FROM perkembangan_balita a LEFT JOIn balita b ON b.kode_balita = a.kode_balita WHERE (YEAR(CURRENT_DATE()) - YEAR(b.tgl_lahir))=3 AND a.tb_balita<89.4 AND b.jenkel='L') AS wast3,
(SELECT COUNT(b.nama_balita) AS jumlah FROM perkembangan_balita a LEFT JOIn balita b ON b.kode_balita = a.kode_balita WHERE (YEAR(CURRENT_DATE()) - YEAR(b.tgl_lahir))=3 AND a.tb_balita>=89.4 AND a.tb_balita<100.8 AND b.jenkel='L') AS ideal3,
(SELECT COUNT(b.nama_balita) AS jumlah FROM perkembangan_balita a LEFT JOIn balita b ON b.kode_balita = a.kode_balita WHERE (YEAR(CURRENT_DATE()) - YEAR(b.tgl_lahir))=3 AND a.tb_balita>=100.8 AND b.jenkel='L') AS obe3,
(SELECT COUNT(b.nama_balita) AS jumlah FROM perkembangan_balita a LEFT JOIn balita b ON b.kode_balita = a.kode_balita WHERE (YEAR(CURRENT_DATE()) - YEAR(b.tgl_lahir))=4 AND a.tb_balita<95.5  AND b.jenkel='L') AS wast4,
(SELECT COUNT(b.nama_balita) AS jumlah FROM perkembangan_balita a LEFT JOIn balita b ON b.kode_balita = a.kode_balita WHERE (YEAR(CURRENT_DATE()) - YEAR(b.tgl_lahir))=4 AND a.tb_balita>=95.5  AND a.tb_balita<108.2 AND b.jenkel='L') AS ideal4,
(SELECT COUNT(b.nama_balita) AS jumlah FROM perkembangan_balita a LEFT JOIn balita b ON b.kode_balita = a.kode_balita WHERE (YEAR(CURRENT_DATE()) - YEAR(b.tgl_lahir))=4 AND a.tb_balita>=108.2 AND b.jenkel='L') AS obe4,
(SELECT COUNT(b.nama_balita) AS jumlah FROM perkembangan_balita a LEFT JOIn balita b ON b.kode_balita = a.kode_balita WHERE (YEAR(CURRENT_DATE()) - YEAR(b.tgl_lahir))=5 AND a.tb_balita<102.0  AND b.jenkel='L') AS wast5,
(SELECT COUNT(b.nama_balita) AS jumlah FROM perkembangan_balita a LEFT JOIn balita b ON b.kode_balita = a.kode_balita WHERE (YEAR(CURRENT_DATE()) - YEAR(b.tgl_lahir))=5 AND a.tb_balita>=102.0  AND a.tb_balita<115.1 AND b.jenkel='L') AS ideal5,
(SELECT COUNT(b.nama_balita) AS jumlah FROM perkembangan_balita a LEFT JOIn balita b ON b.kode_balita = a.kode_balita WHERE (YEAR(CURRENT_DATE()) - YEAR(b.tgl_lahir))=5 AND a.tb_balita>=115.1 AND b.jenkel='L') AS obe5 FROM perkembangan_balita LIMIT 0,1");
$charttbp = mysqli_fetch_array($sqltbp);

$sqltbw = mysqli_query($con, "SELECT
(SELECT COUNT(b.nama_balita) AS jumlah FROM perkembangan_balita a LEFT JOIn balita b ON b.kode_balita = a.kode_balita WHERE (YEAR(CURRENT_DATE()) - YEAR(b.tgl_lahir))=1 AND a.tb_balita<68.8 AND b.jenkel='P') AS wast1,
(SELECT COUNT(b.nama_balita) AS jumlah FROM perkembangan_balita a LEFT JOIn balita b ON b.kode_balita = a.kode_balita WHERE (YEAR(CURRENT_DATE()) - YEAR(b.tgl_lahir))=1 AND a.tb_balita>=68.8 AND a.tb_balita<78.9 AND b.jenkel='P') AS ideal1,
(SELECT COUNT(b.nama_balita) AS jumlah FROM perkembangan_balita a LEFT JOIn balita b ON b.kode_balita = a.kode_balita WHERE (YEAR(CURRENT_DATE()) - YEAR(b.tgl_lahir))=1 AND a.tb_balita>=78.9 AND b.jenkel='P') AS obe1,
(SELECT COUNT(b.nama_balita) AS jumlah FROM perkembangan_balita a LEFT JOIn balita b ON b.kode_balita = a.kode_balita WHERE (YEAR(CURRENT_DATE()) - YEAR(b.tgl_lahir))=2 AND a.tb_balita<80.8 AND b.jenkel='P') AS wast2,
(SELECT COUNT(b.nama_balita) AS jumlah FROM perkembangan_balita a LEFT JOIn balita b ON b.kode_balita = a.kode_balita WHERE (YEAR(CURRENT_DATE()) - YEAR(b.tgl_lahir))=2 AND a.tb_balita>=80.8 AND a.tb_balita<89.9 AND b.jenkel='P') AS ideal2,
(SELECT COUNT(b.nama_balita) AS jumlah FROM perkembangan_balita a LEFT JOIn balita b ON b.kode_balita = a.kode_balita WHERE (YEAR(CURRENT_DATE()) - YEAR(b.tgl_lahir))=2 AND a.tb_balita>=89.9 AND b.jenkel='P') AS obe2,
(SELECT COUNT(b.nama_balita) AS jumlah FROM perkembangan_balita a LEFT JOIn balita b ON b.kode_balita = a.kode_balita WHERE (YEAR(CURRENT_DATE()) - YEAR(b.tgl_lahir))=3 AND a.tb_balita<88.1 AND b.jenkel='P') AS wast3,
(SELECT COUNT(b.nama_balita) AS jumlah FROM perkembangan_balita a LEFT JOIn balita b ON b.kode_balita = a.kode_balita WHERE (YEAR(CURRENT_DATE()) - YEAR(b.tgl_lahir))=3 AND a.tb_balita>=88.1 AND a.tb_balita<99.2 AND b.jenkel='P') AS ideal3,
(SELECT COUNT(b.nama_balita) AS jumlah FROM perkembangan_balita a LEFT JOIn balita b ON b.kode_balita = a.kode_balita WHERE (YEAR(CURRENT_DATE()) - YEAR(b.tgl_lahir))=3 AND a.tb_balita>=99.2 AND b.jenkel='P') AS obe3,
(SELECT COUNT(b.nama_balita) AS jumlah FROM perkembangan_balita a LEFT JOIn balita b ON b.kode_balita = a.kode_balita WHERE (YEAR(CURRENT_DATE()) - YEAR(b.tgl_lahir))=4 AND a.tb_balita<95.0 AND b.jenkel='P') AS wast4,
(SELECT COUNT(b.nama_balita) AS jumlah FROM perkembangan_balita a LEFT JOIn balita b ON b.kode_balita = a.kode_balita WHERE (YEAR(CURRENT_DATE()) - YEAR(b.tgl_lahir))=4 AND a.tb_balita>=95.0 AND a.tb_balita<106.9 AND b.jenkel='P') AS ideal4,
(SELECT COUNT(b.nama_balita) AS jumlah FROM perkembangan_balita a LEFT JOIn balita b ON b.kode_balita = a.kode_balita WHERE (YEAR(CURRENT_DATE()) - YEAR(b.tgl_lahir))=4 AND a.tb_balita>=106.9 AND b.jenkel='P') AS obe4,
(SELECT COUNT(b.nama_balita) AS jumlah FROM perkembangan_balita a LEFT JOIn balita b ON b.kode_balita = a.kode_balita WHERE (YEAR(CURRENT_DATE()) - YEAR(b.tgl_lahir))=5 AND a.tb_balita<101.1 AND b.jenkel='P') AS wast5,
(SELECT COUNT(b.nama_balita) AS jumlah FROM perkembangan_balita a LEFT JOIn balita b ON b.kode_balita = a.kode_balita WHERE (YEAR(CURRENT_DATE()) - YEAR(b.tgl_lahir))=5 AND a.tb_balita>=101.1 AND a.tb_balita<113.9 AND b.jenkel='P') AS ideal5,
(SELECT COUNT(b.nama_balita) AS jumlah FROM perkembangan_balita a LEFT JOIn balita b ON b.kode_balita = a.kode_balita WHERE (YEAR(CURRENT_DATE()) - YEAR(b.tgl_lahir))=5 AND a.tb_balita>=113.9 AND b.jenkel='P') AS obe5 FROM perkembangan_balita LIMIT 0,1");
$charttbw = mysqli_fetch_array($sqltbw);

$sqlavgtbp = mysqli_query($con, "SELECT 
(SELECT AVG(a.tb_balita) AS AVG FROM perkembangan_balita a LEFT JOIN balita b ON b.kode_balita = a.kode_balita WHERE (YEAR(CURRENT_DATE()) - YEAR(b.tgl_lahir))=1 AND b.jenkel='L') AS avg1,
(SELECT AVG(a.tb_balita) AS AVG FROM perkembangan_balita a LEFT JOIN balita b ON b.kode_balita = a.kode_balita WHERE (YEAR(CURRENT_DATE()) - YEAR(b.tgl_lahir))=2 AND b.jenkel='L') AS avg2,
(SELECT AVG(a.tb_balita) AS AVG FROM perkembangan_balita a LEFT JOIN balita b ON b.kode_balita = a.kode_balita WHERE (YEAR(CURRENT_DATE()) - YEAR(b.tgl_lahir))=3 AND b.jenkel='L') AS avg3,
(SELECT AVG(a.tb_balita) AS AVG FROM perkembangan_balita a LEFT JOIN balita b ON b.kode_balita = a.kode_balita WHERE (YEAR(CURRENT_DATE()) - YEAR(b.tgl_lahir))=4 AND b.jenkel='L') AS avg4,
(SELECT AVG(a.tb_balita) AS AVG FROM perkembangan_balita a LEFT JOIN balita b ON b.kode_balita = a.kode_balita WHERE (YEAR(CURRENT_DATE()) - YEAR(b.tgl_lahir))=5 AND b.jenkel='L') AS avg5 FROM perkembangan_balita LIMIT 0,1");
$dataavgtbp = mysqli_fetch_array($sqlavgtbp);

$sqlavgtbw = mysqli_query($con, "SELECT 
(SELECT AVG(a.tb_balita) AS AVG FROM perkembangan_balita a LEFT JOIN balita b ON b.kode_balita = a.kode_balita WHERE (YEAR(CURRENT_DATE()) - YEAR(b.tgl_lahir))=1 AND b.jenkel='P') AS avg1,
(SELECT AVG(a.tb_balita) AS AVG FROM perkembangan_balita a LEFT JOIN balita b ON b.kode_balita = a.kode_balita WHERE (YEAR(CURRENT_DATE()) - YEAR(b.tgl_lahir))=2 AND b.jenkel='P') AS avg2,
(SELECT AVG(a.tb_balita) AS AVG FROM perkembangan_balita a LEFT JOIN balita b ON b.kode_balita = a.kode_balita WHERE (YEAR(CURRENT_DATE()) - YEAR(b.tgl_lahir))=3 AND b.jenkel='P') AS avg3,
(SELECT AVG(a.tb_balita) AS AVG FROM perkembangan_balita a LEFT JOIN balita b ON b.kode_balita = a.kode_balita WHERE (YEAR(CURRENT_DATE()) - YEAR(b.tgl_lahir))=4 AND b.jenkel='P') AS avg4,
(SELECT AVG(a.tb_balita) AS AVG FROM perkembangan_balita a LEFT JOIN balita b ON b.kode_balita = a.kode_balita WHERE (YEAR(CURRENT_DATE()) - YEAR(b.tgl_lahir))=5 AND b.jenkel='P') AS avg5 FROM perkembangan_balita LIMIT 0,1");
$dataavgtbw = mysqli_fetch_array($sqlavgtbw);
?>
		<div class="site-main-container">
			<!-- Start top-post Area -->
			<section class="top-post-area pt-8">
				<div class="container no-padding">
					<div class="row small-gutters">
						<div class="col-lg-12">
							<div class="news-tracker-wrap"><br>
								<h1 style="text-align: center;">Selamat Datang di Sistem Informasi Posyandu Desa Sidua-dua</h1><br><br>
								<div class="single-latest-post row align-items-center">
									<div class="col-lg-4 post-left">
										<div class="feature-img relative">
											<div class="overlay overlay-bg"></div>
											<img class="img-fluid" src="img/keg1.jpeg" alt="Kegiatan Posyandu">
										</div>
									</div>
									<div class="col-lg-4 post-center">
										<div class="feature-img relative">
											<div class="overlay overlay-bg"></div>
											<img class="img-fluid" src="img/keg3.jpeg" alt="Kegiatan Posyandu">
										</div>
									</div>
									<div class="col-lg-4 post-right">
										<div class="feature-img relative">
											<div class="overlay overlay-bg"></div>
											<img class="img-fluid" src="img/keg3.jpeg" alt="Kegiatan Posyandu">
										</div>
									</div>
								</div><br>
								<!-- .row berat badan -->
				                <div class="row">
				                    <div class="col-md-6">
				                        <div class="white-box" style="width: 525px">
				                            <div id="bbp-graph" style="width: 525px; height: 300px;"></div><br>
                                    <h3 class="text-center"><b>Rata-rata Berat Badan Balita Laki-laki</b></h3><br>
                                    <table class="table table-bordered">
                                        <tr class="text-center" style="background: lightblue;">
                                            <th style="text-align: center; font-weight: bold;">Umur</th>
                                            <th style="text-align: center; font-weight: bold;">Berat Badan Ideal (kg)</th>
                                            <th style="text-align: center; font-weight: bold;">Rata-rata (kg)</th>
                                        </tr>
                                        <tr class="text-center table-light">
                                            <td><?php echo "<1 tahun" ?></td>
                                            <td>8,3 - 11</td>
                                            <td><?php if($dataavgbbp['avg1'] != null) { echo substr($dataavgbbp['avg1'],0,4); } else { echo "0"; } ?></td>
                                        </tr>
                                        <tr class="text-center table-light">
                                            <td><?php echo "<2 tahun" ?></td>
                                            <td>10,5 - 14,4</td>
                                            <td><?php if($dataavgbbp['avg2'] != null) { echo substr($dataavgbbp['avg2'],0,4); } else { echo "0"; } ?></td>
                                        </tr>
                                        <tr class="text-center table-light">
                                            <td><?php echo "<3 tahun" ?></td>
                                            <td>12,1 - 17,2</td>
                                            <td><?php if($dataavgbbp['avg3'] != null) { echo substr($dataavgbbp['avg3'],0,4); } else { echo "0"; } ?></td>
                                        </tr>
                                        <tr class="text-center table-light">
                                            <td><?php echo "<4 tahun" ?></td>
                                            <td>13,6 - 19,9</td>
                                            <td><?php if($dataavgbbp['avg4'] != null) { echo substr($dataavgbbp['avg4'],0,4); } else { echo "0"; } ?></td>
                                        </tr>
                                        <tr class="text-center table-light">
                                            <td><?php echo "<5 tahun" ?></td>
                                            <td>15,0 - 22,6</td>
                                            <td><?php if($dataavgbbp['avg5'] != null) { echo substr($dataavgbbp['avg5'],0,4); } else { echo "0"; } ?></td>
                                        </tr>
				                            </table>
				                        </div>
				                    </div>
				                    <div class="col-md-6">
				                        <div class="white-box" style="width: 525px">
				                            <div id="bbw-graph" style="width: 525px; height: 300px;"></div><br>
				                            <h3 class="text-center"><b>Rata-rata Berat Badan Balita Perempuan</b></h3><br>
                                    <table class="table table-bordered">
                                        <tr class="text-center table-warning" style="background: gold;">
                                            <th style="text-align: center; font-weight: bold;">Umur</th>
                                            <th style="text-align: center; font-weight: bold;">Berat Badan Ideal (kg)</th>
                                            <th style="text-align: center; font-weight: bold;">Rata-rata (kg)</th>
                                        </tr>
                                        <tr class="text-center table-light">
                                            <td><?php echo "<1 tahun" ?></td>
                                            <td>7,7 - 10,5</td>
                                            <td><?php if($dataavgbbw['avg1'] != null) { echo substr($dataavgbbw['avg1'],0,4); } else { echo "0"; } ?></td>
                                        </tr>
                                        <tr class="text-center table-light">
                                            <td><?php echo "<2 tahun" ?></td>
                                            <td>9,7 - 13,7</td>
                                            <td><?php if($dataavgbbw['avg2'] != null) { echo substr($dataavgbbw['avg2'],0,4); } else { echo "0"; } ?></td>
                                        </tr>
                                        <tr class="text-center table-light">
                                            <td><?php echo "<3 tahun" ?></td>
                                            <td>11,5 - 16,5</td>
                                            <td><?php if($dataavgbbw['avg3'] != null) { echo substr($dataavgbbw['avg3'],0,4); } else { echo "0"; } ?></td>
                                        </tr>
                                        <tr class="text-center table-light">
                                            <td><?php echo "<4 tahun" ?></td>
                                            <td>13 - 19,2</td>
                                            <td><?php if($dataavgbbw['avg4'] != null) { echo substr($dataavgbbw['avg4'],0,4); } else { echo "0"; } ?></td>
                                        </tr>
                                        <tr class="text-center table-light">
                                            <td><?php echo "<5 tahun" ?></td>
                                            <td>14,4 - 21,7</td>
                                            <td><?php if($dataavgbbw['avg5'] != null) { echo substr($dataavgbbw['avg5'],0,4); } else { echo "0"; } ?></td>
                                        </tr>
				                            </table>
				                        </div>
				                    </div>
				                </div><br>
				                <!-- /.row berat badan -->
					            <!-- .row tinggi badan -->
				                <div class="row">
				                    <div class="col-md-6">
				                        <div class="white-box" style="width: 525px">
				                            <div id="tbp-graph" style="width: 525px; height: 350px;"></div><br>
				                            <h3 class="text-center"><b>Rata-rata Tinggi Badan Balita Laki-laki</b></h3><br>
                                    <table class="table table-bordered">
                                        <tr class="text-center" style="background: lightblue;">
                                            <th style="text-align: center; font-weight: bold;">Umur</th>
                                            <th style="text-align: center; font-weight: bold;">Tinggi Badan Ideal (cm)</th>
                                            <th style="text-align: center; font-weight: bold;">Rata-rata (cm)</th>
                                        </tr>
                                        <tr class="text-center table-light">
                                            <td><?php echo "<1 tahun" ?></td>
                                            <td>71 - 79,7</td>
                                            <td><?php if($dataavgtbp['avg1'] != null) { echo substr($dataavgtbp['avg1'],0,4); } else { echo "0"; } ?></td>
                                        </tr>
                                        <tr class="text-center table-light">
                                            <td><?php echo "<2 tahun" ?></td>
                                            <td>82,5 - 91,7</td>
                                            <td><?php if($dataavgtbp['avg2'] != null) { echo substr($dataavgtbp['avg2'],0,4); } else { echo "0"; } ?></td>
                                        </tr>
                                        <tr class="text-center table-light">
                                            <td><?php echo "<3 tahun" ?></td>
                                            <td>89,4 - 100.8</td>
                                            <td><?php if($dataavgtbp['avg3'] != null) { echo substr($dataavgtbp['avg3'],0,4); } else { echo "0"; } ?></td>
                                        </tr>
                                        <tr class="text-center table-light">
                                            <td><?php echo "<4 tahun" ?></td>
                                            <td>95,5 - 108,2</td>
                                            <td><?php if($dataavgtbp['avg4'] != null) { echo substr($dataavgtbp['avg4'],0,4); } else { echo "0"; } ?></td>
                                        </tr>
                                        <tr class="text-center table-light">
                                            <td><?php echo "<5 tahun" ?></td>
                                            <td>102,0 - 115,1</td>
                                            <td><?php if($dataavgtbp['avg5'] != null) { echo substr($dataavgtbp['avg5'],0,4); } else { echo "0"; } ?></td>
                                        </tr>
				                            </table>
				                        </div>
				                    </div>
				                    <div class="col-md-6">
				                        <div class="white-box" style="width: 525px">
				                            <div id="tbw-graph" style="width: 525px; height: 350px;"></div><br>
				                            <h3 class="text-center"><b>Rata-rata Tinggi Badan Balita Perempuan</b></h3><br>
                                    <table class="table table-bordered">
                                        <tr class="text-center table-warning" style="background: gold;">
                                            <th style="text-align: center; font-weight: bold;">Umur</th>
                                            <th style="text-align: center; font-weight: bold;">Tinggi Badan Ideal (cm)</th>
                                            <th style="text-align: center; font-weight: bold;">Rata-rata (cm)</th>
                                        </tr>
                                        <tr class="text-center table-light">
                                            <td><?php echo "<1 tahun" ?></td>
                                            <td>68,8 - 78,9</td>
                                            <td><?php if($dataavgtbw['avg1'] != null) { echo substr($dataavgtbw['avg1'],0,4); } else { echo "0"; } ?></td>
                                        </tr>
                                        <tr class="text-center table-light">
                                            <td><?php echo "<2 tahun" ?></td>
                                            <td>80,8 - 89,9</td>
                                            <td><?php if($dataavgtbw['avg2'] != null) { echo substr($dataavgtbw['avg2'],0,4); } else { echo "0"; } ?></td>
                                        </tr>
                                        <tr class="text-center table-light">
                                            <td><?php echo "<3 tahun" ?></td>
                                            <td>88,1 - 99,2</td>
                                            <td><?php if($dataavgtbw['avg3'] != null) { echo substr($dataavgtbw['avg3'],0,4); } else { echo "0"; } ?></td>
                                        </tr>
                                        <tr class="text-center table-light">
                                            <td><?php echo "<4 tahun" ?></td>
                                            <td>95,0 - 106,9</td>
                                            <td><?php if($dataavgtbw['avg4'] != null) { echo substr($dataavgtbw['avg4'],0,4); } else { echo "0"; } ?></td>
                                        </tr>
                                        <tr class="text-center table-light">
                                            <td><?php echo "<5 tahun" ?></td>
                                            <td>101,1 -113,9</td>
                                            <td><?php if($dataavgtbw['avg5'] != null) { echo substr($dataavgtbw['avg5'],0,4); } else { echo "0"; } ?></td>
                                        </tr>
				                            </table>
				                        </div>
				                    </div>
				                </div><br>
				                <!-- /.row tinggi badan -->
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- End top-post Area -->
			<!-- Start latest-post Area -->
			<section class="latest-post-area pb-120">
				<div class="container no-padding">
					<div class="row">
						<div class="col-lg-8 post-list">
							<!-- Start latest-post Area -->
							<div class="latest-post-wrap">
								<h4 style="background: #2148AE" class="cat-title">Berita</h4>
								<?php
								$no = 1;
								$sql = mysqli_query($con, "SELECT * FROM phbs ORDER BY tgl_dibuat DESC");
								while($data = mysqli_fetch_array($sql)){
								?>
								<div class="single-latest-post row align-items-center">
									<div class="col-lg-5 post-left">
										<div class="feature-img relative">
											<div class="overlay overlay-bg"></div>
											<img class="img-fluid" src="<?= $data['gambar'] ?>" alt="berita">
										</div>
									</div>
									<div class="col-lg-7 post-right">
										<a href="berita.php?kode=<?= $data['kode_phbs']?>">
											<h4><?= $data['judul_berita']?></h4>
										</a>
										<ul class="meta">
											<li><a href="#"><span class="lnr lnr-user"></span><?= $data['penulis_berita']?></a></li>
											<li><a href="#"><span class="lnr lnr-calendar-full"></span><?= $data['tgl_dibuat']?></a></li>
										</ul>
										<p class="excert">
											<?php echo substr($data['deskripsi_berita'],0,100).". . .";?>
										</p>
									</div>
								</div>
							<?php $no++; }?>
							</div>
							<!-- End latest-post Area -->
						</div>
						<div class="col-lg-4">
							<div class="sidebars-area">
								<div class="single-sidebar-widget editors-pick-widget">
									<h6 style="background: #2148AE" class="title">Jadwal Posyandu</h6>
									<div class="editors-pick-post">
										<div class="feature-img-wrap relative">
										</div>
										<div class="details">
											<ul class="meta">
												<center>
                                                    <p>
                                                        <li><span class="lnr lnr-calendar-full"></span><?php if($jadwal['tanggal']==null){echo date('d-A-Y');}else{echo
												                                  substr($jadwal['tanggal'],8,2)." ".
												                                  $bulan[intval(substr($jadwal['tanggal'],6,2))-1]." ".
												                                  substr($jadwal['tanggal'],0,4);}?></li>
                                                    </p>
                                                    <p>
                                                        <li><span class="lnr lnr-home"></span>Posyandu Desa Sidua-dua</li>
                                                    </p>
                                                    <p>
                                                        <li><span class="lnr lnr-clock"></span><?php if($jadwal['jam']==null){echo '-';}else{echo $jadwal['jam'];}?></li>
                                                    </p>
                                                </center>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- End latest-post Area -->
		</div>
<?php require_once('footer.php'); ?>