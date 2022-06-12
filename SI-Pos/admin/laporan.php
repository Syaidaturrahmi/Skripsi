<?php require_once('head-laporan.php');
date_default_timezone_set('Asia/Jakarta');
$blnini = date('m');
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

$sql = mysqli_query($con, "SELECT *, (YEAR(CURRENT_DATE())-YEAR(b.tgl_lahir)) AS umur FROM imunisasi a
    INNER JOIN balita b ON a.kode_balita = b.kode_balita
    INNER JOIN user c ON a.nik = c.nik INNER JOIN perkembangan_balita d ON d.nik = c.nik ORDER BY jenkel ASC");
$data = mysqli_fetch_array($sql);
?>
<br><h2 class="text-center"><b>LAPORAN DATA BALITA</b></h2>
<h4 class="text-center fs-14">Posyandu Desa Sidua-dua</h4><hr>
<p style="text-align: center;"><?= $bulan[intval(substr($data['tgl_imunisasi'],6,2))-1]." ".substr($data['tgl_imunisasi'],0,4) ?></p>
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col" class="fw-bold" style="text-align: center;">No</th>
      <th scope="col" class="fw-bold" style="text-align: center;">Nama Bayi</th>
      <th scope="col" class="fw-bold" style="text-align: center;">Jenis Kelamin</th>
      <th scope="col" class="fw-bold" style="text-align: center;">Berat Badan (kg)</th>
      <th scope="col" class="fw-bold" style="text-align: center;">Tinggi Badan (cm)</th>
      <th scope="col" class="fw-bold" style="text-align: center;">Berat Badan Ideal (kg)</th>
      <th scope="col" class="fw-bold" style="text-align: center;">Jenis Imunisasi</th>
      <th scope="col" class="fw-bold" style="text-align: center;">Keterangan</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $no = 1;
    while($data = mysqli_fetch_array($sql)){
    ?>
    <tr>
      <th scope="row"><?= $no ?></th>
      <td><?php echo ucwords($data['nama_balita']);?></td>
      <td><?php if($data['jenkel']=='L') { echo "Laki-laki"; } else { echo "Perempuan"; }?></td>
      <td style="text-align: center;"><?= $data['bb_balita']?></td>
      <td style="text-align: center;"><?= $data['tb_balita']?></td>
      <td style="text-align: center;"><?php if($data['umur'] == 1) {
        echo "7,5 - 13,5";
      } elseif ($data['umur'] == 2) {
        echo "9,5 - 15,5";
      } elseif ($data['umur'] == 3) {
        echo "11 - 18";
      } elseif ($data['umur'] == 4) {
        echo "12,5 - 21";
      } else {
        echo "14 - 24";
      }?></td>
      <td><?= $data['jenis_vaksin']?></td>
      <td><?php if($data['umur'] == 1) {
        if($data['bb_balita'] < 7.5) {
          echo "Kekurangan Berat Badan (Wasting)";
        } elseif ($data['bb_balita'] >= 7.5 && $data['bb_balita'] < 13.5) {
          echo "Berat Badan Ideal";
        } else {
          echo "Kelebihan Berat Badan (Obesitas)";
        }
      } elseif ($data['umur'] == 2) {
        if($data['bb_balita'] < 9.5) {
          echo "Kekurangan Berat Badan (Wasting)";
        } elseif ($data['bb_balita'] >= 9.5 && $data['bb_balita'] < 15.5) {
          echo "Berat Badan Ideal";
        } else {
          echo "Kelebihan Berat Badan (Obesitas)";
        }
      } elseif ($data['umur'] == 3) {
        if($data['bb_balita'] < 11) {
          echo "Kekurangan Berat Badan (Wasting)";
        } elseif ($data['bb_balita'] >= 11 && $data['bb_balita'] < 18) {
          echo "Berat Badan Ideal";
        } else {
          echo "Kelebihan Berat Badan (Obesitas)";
        }
      } elseif ($data['umur'] == 4) {
        if($data['bb_balita'] < 12.5) {
          echo "Kekurangan Berat Badan (Wasting)";
        } elseif ($data['bb_balita'] >= 12.5 && $data['bb_balita'] < 21) {
          echo "Berat Badan Ideal";
        } else {
          echo "Kelebihan Berat Badan (Obesitas)";
        }
      } else {
        if($data['bb_balita'] < 14) {
          echo "Kekurangan Berat Badan (Wasting)";
        } elseif ($data['bb_balita'] >= 14 && $data['bb_balita'] < 24) {
          echo "Berat Badan Ideal";
        } else {
          echo "Kelebihan Berat Badan (Obesitas)";
        }
      }?></td>
    </tr>
  <?php $no++; }?>
  </tbody>
</table>
<?php require_once('footer-laporan.php'); ?>