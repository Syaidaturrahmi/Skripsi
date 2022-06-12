<?php
header('Content-Type: application/json');

require_once('../config/koneksi.php');

$sqlQuery = "SELECT id_paket,tgl_input,nama_pekerjaan,count(tgl_input) as jml FROM tbl_katalog GROUP BY tgl_input";

$result = mysqli_query($con,$sqlQuery);

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

mysqli_close($con);

echo json_encode($data);
?>