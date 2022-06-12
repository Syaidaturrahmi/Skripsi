<?php
header('Content-Type: application/json');

require_once('../config/koneksi.php');

$sqlQuery = "SELECT id_paket,id_user,nama,input_by,count(input_by) as jml FROM tbl_katalog
INNER JOIN tbl_user on tbl_katalog.input_by = tbl_user.id_user GROUP BY nama";

$result = mysqli_query($con,$sqlQuery);

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

mysqli_close($con);

echo json_encode($data);
?>