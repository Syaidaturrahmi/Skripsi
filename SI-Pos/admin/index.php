<?php require_once('head.php');
date_default_timezone_set('Asia/Jakarta');
$hariini = date('Y-m-d');
$sql = mysqli_query($con,"SELECT count(kode_balita) as jumlah from balita");
$cbayi = mysqli_fetch_array($sql);
$chart_data = '';

$sql1 = mysqli_query($con,"SELECT * from jadwal");
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

    $sqlpria = mysqli_query($con, "SELECT 
        (SELECT COUNT(nama_balita) AS jumlah FROM balita WHERE (YEAR(CURRENT_DATE()) - YEAR(tgl_lahir))=1 AND jenkel='L') AS pria1,
        (SELECT COUNT(nama_balita) AS jumlah FROM balita WHERE (YEAR(CURRENT_DATE()) - YEAR(tgl_lahir))=2 AND jenkel='L') AS pria2,
        (SELECT COUNT(nama_balita) AS jumlah FROM balita WHERE (YEAR(CURRENT_DATE()) - YEAR(tgl_lahir))=3 AND jenkel='L') AS pria3,
        (SELECT COUNT(nama_balita) AS jumlah FROM balita WHERE (YEAR(CURRENT_DATE()) - YEAR(tgl_lahir))=4 AND jenkel='L') AS pria4,
        (SELECT COUNT(nama_balita) AS jumlah FROM balita WHERE (YEAR(CURRENT_DATE()) - YEAR(tgl_lahir))=5 AND jenkel='L') AS pria5 FROM balita LIMIT 0,1");
    $datapria = mysqli_fetch_array($sqlpria);

    $sqlwanita = mysqli_query($con, "SELECT 
        (SELECT COUNT(nama_balita) AS jumlah FROM balita WHERE (YEAR(CURRENT_DATE()) - YEAR(tgl_lahir))=1 AND jenkel='P') AS wanita1,
        (SELECT COUNT(nama_balita) AS jumlah FROM balita WHERE (YEAR(CURRENT_DATE()) - YEAR(tgl_lahir))=2 AND jenkel='P') AS wanita2,
        (SELECT COUNT(nama_balita) AS jumlah FROM balita WHERE (YEAR(CURRENT_DATE()) - YEAR(tgl_lahir))=3 AND jenkel='P') AS wanita3,
        (SELECT COUNT(nama_balita) AS jumlah FROM balita WHERE (YEAR(CURRENT_DATE()) - YEAR(tgl_lahir))=4 AND jenkel='P') AS wanita4,
        (SELECT COUNT(nama_balita) AS jumlah FROM balita WHERE (YEAR(CURRENT_DATE()) - YEAR(tgl_lahir))=5 AND jenkel='P') AS wanita5 FROM balita LIMIT 0,1");
    $datawanita = mysqli_fetch_array($sqlwanita);

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

$sqlimun = mysqli_query($con, "SELECT 
(SELECT COUNT(b.nama_balita) AS jumlah FROM history_imun a INNER JOIN balita b ON b.kode_balita = a.kode_balita WHERE a.jenis_vaksin='HB-O (0-7 hari)' AND (TIMESTAMPDIFF( MONTH, tgl_lahir, now() ) % 12)<1) AS imun1,
(SELECT COUNT(b.nama_balita) AS jumlah FROM history_imun a INNER JOIN balita b ON b.kode_balita = a.kode_balita WHERE a.jenis_vaksin='' AND (TIMESTAMPDIFF( MONTH, tgl_lahir, now() ) % 12)<1) AS imun2,
(SELECT COUNT(b.nama_balita) AS jumlah FROM history_imun a INNER JOIN balita b ON b.kode_balita = a.kode_balita WHERE a.jenis_vaksin='BCG' AND (TIMESTAMPDIFF( MONTH, tgl_lahir, now() ) % 12)>=1 AND (TIMESTAMPDIFF( MONTH, tgl_lahir, now() ) % 12)<2) AS imun3,
(SELECT COUNT(b.nama_balita) AS jumlah FROM history_imun a INNER JOIN balita b ON b.kode_balita = a.kode_balita WHERE a.jenis_vaksin='*Polio 1' AND (TIMESTAMPDIFF( MONTH, tgl_lahir, now() ) % 12)>=1 AND (TIMESTAMPDIFF( MONTH, tgl_lahir, now() ) % 12)<2) AS imun4,
(SELECT COUNT(b.nama_balita) AS jumlah FROM history_imun a INNER JOIN balita b ON b.kode_balita = a.kode_balita WHERE a.jenis_vaksin='' AND (TIMESTAMPDIFF( MONTH, tgl_lahir, now() ) % 12)>=1 AND (TIMESTAMPDIFF( MONTH, tgl_lahir, now() ) % 12)<2) AS imun5,
(SELECT COUNT(b.nama_balita) AS jumlah FROM history_imun a INNER JOIN balita b ON b.kode_balita = a.kode_balita WHERE a.jenis_vaksin='*DPT-HB-Hib 1' AND (TIMESTAMPDIFF( MONTH, tgl_lahir, now() ) % 12)>=2 AND (TIMESTAMPDIFF( MONTH, tgl_lahir, now() ) % 12)<3) AS imun6,
(SELECT COUNT(b.nama_balita) AS jumlah FROM history_imun a INNER JOIN balita b ON b.kode_balita = a.kode_balita WHERE a.jenis_vaksin='*Polio 2' AND (TIMESTAMPDIFF( MONTH, tgl_lahir, now() ) % 12)>=2 AND (TIMESTAMPDIFF( MONTH, tgl_lahir, now() ) % 12)<3) AS imun7,
(SELECT COUNT(b.nama_balita) AS jumlah FROM history_imun a INNER JOIN balita b ON b.kode_balita = a.kode_balita WHERE a.jenis_vaksin='' AND (TIMESTAMPDIFF( MONTH, tgl_lahir, now() ) % 12)>=2 AND (TIMESTAMPDIFF( MONTH, tgl_lahir, now() ) % 12)<3) AS imun8,
(SELECT COUNT(b.nama_balita) AS jumlah FROM history_imun a INNER JOIN balita b ON b.kode_balita = a.kode_balita WHERE a.jenis_vaksin='*DPT-HB-Hib 2' AND (TIMESTAMPDIFF( MONTH, tgl_lahir, now() ) % 12)>=3 AND (TIMESTAMPDIFF( MONTH, tgl_lahir, now() ) % 12)<4) AS imun9,
(SELECT COUNT(b.nama_balita) AS jumlah FROM history_imun a INNER JOIN balita b ON b.kode_balita = a.kode_balita WHERE a.jenis_vaksin='*Polio 3' AND (TIMESTAMPDIFF( MONTH, tgl_lahir, now() ) % 12)>=3 AND (TIMESTAMPDIFF( MONTH, tgl_lahir, now() ) % 12)<4) AS imun10,
(SELECT COUNT(b.nama_balita) AS jumlah FROM history_imun a INNER JOIN balita b ON b.kode_balita = a.kode_balita WHERE a.jenis_vaksin='' AND (TIMESTAMPDIFF( MONTH, tgl_lahir, now() ) % 12)>=3 AND (TIMESTAMPDIFF( MONTH, tgl_lahir, now() ) % 12)<4) AS imun11,
(SELECT COUNT(b.nama_balita) AS jumlah FROM history_imun a INNER JOIN balita b ON b.kode_balita = a.kode_balita WHERE a.jenis_vaksin='*DPT-HB-Hib 3' AND (TIMESTAMPDIFF( MONTH, tgl_lahir, now() ) % 12)>=4 AND (TIMESTAMPDIFF( MONTH, tgl_lahir, now() ) % 12)<5) AS imun12,
(SELECT COUNT(b.nama_balita) AS jumlah FROM history_imun a INNER JOIN balita b ON b.kode_balita = a.kode_balita WHERE a.jenis_vaksin='*Polio 4' AND (TIMESTAMPDIFF( MONTH, tgl_lahir, now() ) % 12)>=4 AND (TIMESTAMPDIFF( MONTH, tgl_lahir, now() ) % 12)<5) AS imun13,
(SELECT COUNT(b.nama_balita) AS jumlah FROM history_imun a INNER JOIN balita b ON b.kode_balita = a.kode_balita WHERE a.jenis_vaksin='IPV' AND (TIMESTAMPDIFF( MONTH, tgl_lahir, now() ) % 12)>=4 AND (TIMESTAMPDIFF( MONTH, tgl_lahir, now() ) % 12)<5) AS imun14,
(SELECT COUNT(b.nama_balita) AS jumlah FROM history_imun a INNER JOIN balita b ON b.kode_balita = a.kode_balita WHERE a.jenis_vaksin='' AND (TIMESTAMPDIFF( MONTH, tgl_lahir, now() ) % 12)>=4 AND (TIMESTAMPDIFF( MONTH, tgl_lahir, now() ) % 12)<5) AS imun15,
(SELECT COUNT(b.nama_balita) AS jumlah FROM history_imun a INNER JOIN balita b ON b.kode_balita = a.kode_balita WHERE a.jenis_vaksin='***Campak' AND (TIMESTAMPDIFF( MONTH, tgl_lahir, now() ) % 12)>=5 AND (TIMESTAMPDIFF( MONTH, tgl_lahir, now() ) % 12)<10) AS imun16,
(SELECT COUNT(b.nama_balita) AS jumlah FROM history_imun a INNER JOIN balita b ON b.kode_balita = a.kode_balita WHERE a.jenis_vaksin='' AND (TIMESTAMPDIFF( MONTH, tgl_lahir, now() ) % 12)>=5 AND (TIMESTAMPDIFF( MONTH, tgl_lahir, now() ) % 12)<10) AS imun17,
(SELECT COUNT(b.nama_balita) AS jumlah FROM history_imun a INNER JOIN balita b ON b.kode_balita = a.kode_balita WHERE a.jenis_vaksin='***DPT-HB-Hib Lanjutan' AND (TIMESTAMPDIFF( MONTH, tgl_lahir, now() ) % 12)>=10) AS imun18,
(SELECT COUNT(b.nama_balita) AS jumlah FROM history_imun a INNER JOIN balita b ON b.kode_balita = a.kode_balita WHERE a.jenis_vaksin='****Campak Lanjutan' AND (TIMESTAMPDIFF( MONTH, tgl_lahir, now() ) % 12)>=10) AS imun19,
(SELECT COUNT(b.nama_balita) AS jumlah FROM history_imun a INNER JOIN balita b ON b.kode_balita = a.kode_balita WHERE a.jenis_vaksin='' AND (TIMESTAMPDIFF( MONTH, tgl_lahir, now() ) % 12)>=10) AS imun20 FROM balita LIMIT 0,1");
$dataimun = mysqli_fetch_array($sqlimun);
?>
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Dashboard</h4>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- row -->
                <div class="row">
                    <!--col -->
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="white-box">
                            <div class="col-in row">
                                <div class="col-md-6 col-sm-6 col-xs-6"> <i data-icon="E"
                                        class="linea-icon linea-basic"></i>
                                    <h4 class="text-muted vb"><b>JUMLAH BALITA</b></h4>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <h3 class="counter text-right m-t-15 text-danger"><?= $cbayi['jumlah']?></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->
                    <!--col -->
                    <div class="col-lg-4 col-md-2 col-sm-12 col-xs-12 pt-n2">
                        <div class="white-box" style="height: 155px">
                            <h4 class="text-muted mb-2"><b>JADWAL</b></h4>
                            <h5 class="text-muted vb"><?php if($jadwal['tanggal']==null){echo date('d-A-Y');}else{echo
                              substr($jadwal['tanggal'],8,2)." ".
                              $bulan[intval(substr($jadwal['tanggal'],6,2))-1]." ".
                              substr($jadwal['tanggal'],0,4);}?></h5>
                            <h5 class="text-muted vb">Posyandu Desa Sidua-dua</h5>
                            <h5 class="text-muted vb"><?php if($jadwal['jam']==null){echo '-';}else{echo $jadwal['jam'];}?></h5>
                        </div>
                    </div>
                    <!-- /.col -->
                    <!--col -->
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="white-box">
                            <div class="col-in row">
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <a href="laporan.php" class="btn btn-success btn-lg" target="_blank">
                                        <i class="fa fa-file-pdf-o fa-f"></i>
                                            <b>Cetak Laporan</b>
                                    </a>
                                    <h3 class="counter text-right m-t-15 text-primary"></h3>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
                <!-- .row berat badan -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="white-box" style="width: 490px">
                            <div id="bbp-graph" style="width: 425px; height: 300px;"></div><br>
                            <h3 class="text-center"><b>Rata-rata Berat Badan Balita Laki-laki</b></h3>
                            <table class="table table-bordered">
                                <tr class="text-center table-warning" style="background: lightblue;">
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
                        <div class="white-box" style="width: 490px">
                            <div id="bbw-graph" style="width: 425px; height: 300px;"></div><br>
                            <h3 class="text-center"><b>Rata-rata Berat Badan Balita Perempuan</b></h3>
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
                        <div class="white-box" style="width: 490px">
                            <div id="tbp-graph" style="width: 425px; height: 300px;"></div><br>
                            <h3 class="text-center"><b>Rata-rata Tinggi Badan Balita Laki-laki</b></h3>
                            <table class="table table-bordered">
                                <tr class="text-center table-warning" style="background: lightblue;">
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
                        <div class="white-box" style="width: 490px">
                            <div id="tbw-graph" style="width: 425px; height: 300px;"></div><br>
                            <h3 class="text-center"><b>Rata-rata Tinggi Badan Balita Perempuan</b></h3>
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
                <!-- .row catatan imunisasi -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="white-box">
                            <h3 class="text-center"><b>Catatan Imunisasi Balita</b></h3>
                            <table class="table table-bordered">
                                <tr class="text-center table-warning" style="background: lightgreen;">
                                    <th style="text-align: center; font-weight: bold;">Umur</th>
                                    <th style="text-align: center; font-weight: bold;">Jenis Vaksin</th>
                                    <th style="text-align: center; font-weight: bold;">Telah Divaksin</th>
                                    <th style="text-align: center; font-weight: bold; background: pink;">Belum Divaksin</th>
                                </tr>
                                <tr class="text-center table-light">
                                    <td><1 bulan</td>
                                    <td>HB-O (0-7 hari)</td>
                                    <td><?= $dataimun['imun1'] ?></td>
                                    <td style="background: lightgrey;"><?= $dataimun['imun2'] ?></td>
                                </tr>
                                <tr class="text-center table-light">
                                    <td rowspan="2"><2 bulan</td>
                                    <td>BCG</td>
                                    <td><?= $dataimun['imun3'] ?></td>
                                    <td style="background: lightgrey;"><?= $dataimun['imun5'] ?></td>
                                </tr>
                                <tr class="text-center table-light">
                                    <td>*Polio 1</td>
                                    <td><?= $dataimun['imun4'] ?></td>
                                    <td style="background: lightgrey;"><?= $dataimun['imun5'] ?></td>
                                </tr>
                                <tr class="text-center table-light">
                                    <td rowspan="2"><3 bulan</td>
                                    <td>*DPT-HB-Hib 1</td>
                                    <td><?= $dataimun['imun6'] ?></td>
                                    <td style="background: lightgrey;"><?= $dataimun['imun8'] ?></td>
                                </tr>
                                <tr class="text-center table-light">
                                    <td>*Polio 2</td>
                                    <td><?= $dataimun['imun7'] ?></td>
                                    <td style="background: lightgrey;"><?= $dataimun['imun8'] ?></td>
                                </tr>
                                <tr class="text-center table-light">
                                    <td rowspan="2"><4 bulan</td>
                                    <td>*DPT-HB-Hib 2</td>
                                    <td><?= $dataimun['imun9'] ?></td>
                                    <td style="background: lightgrey;"><?= $dataimun['imun11'] ?></td>
                                </tr>
                                <tr class="text-center table-light">
                                    <td>*Polio 3</td>
                                    <td><?= $dataimun['imun10'] ?></td>
                                    <td style="background: lightgrey;"><?= $dataimun['imun11'] ?></td>
                                </tr>
                                <tr class="text-center table-light">
                                    <td rowspan="3"><5 bulan</td>
                                    <td>*DPT-HB-Hib 3</td>
                                    <td><?= $dataimun['imun12'] ?></td>
                                    <td style="background: lightgrey;"><?= $dataimun['imun15'] ?></td>
                                </tr>
                                <tr class="text-center table-light">
                                    <td>*Polio 4</td>
                                    <td><?= $dataimun['imun13'] ?></td>
                                    <td style="background: lightgrey;"><?= $dataimun['imun15'] ?></td>
                                </tr>
                                <tr class="text-center table-light">
                                    <td>*IPV</td>
                                    <td><?= $dataimun['imun14'] ?></td>
                                    <td style="background: lightgrey;"><?= $dataimun['imun15'] ?></td>
                                </tr>
                                <tr class="text-center table-light">
                                    <td><10 bulan</td>
                                    <td>***Campak</td>
                                    <td><?= $dataimun['imun16'] ?></td>
                                    <td style="background: lightgrey;"><?= $dataimun['imun17'] ?></td>
                                </tr>
                                <tr class="text-center table-light">
                                    <td rowspan="2">>10 bulan</td>
                                    <td>***DPT-HB-Hib Lanjutan</td>
                                    <td><?= $dataimun['imun18'] ?></td>
                                    <td style="background: lightgrey;"><?= $dataimun['imun20'] ?></td>
                                </tr>
                                <tr class="text-center table-light">
                                    <td>****Campak Lanjutan</td>
                                    <td><?= $dataimun['imun19'] ?></td>
                                    <td style="background: lightgrey;"><?= $dataimun['imun20'] ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div><br>
                <!-- ./row catatan imunisasi -->
                <!-- .row jumlah balita  -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="white-box" style="width: 495px">
                            <div id="donutp" style="width: 425px; height: 350px;"></div><br>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="white-box" style="width: 495px">
                            <div id="donutw" style="width: 425px; height: 350px;"></div><br>
                        </div>
                    </div>
                </div>
                <!-- /.row jumlah balita -->
            </div>
        </div>

<?php require_once('footer.php'); ?>