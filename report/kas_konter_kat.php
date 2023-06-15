<?php
include "../inc/koneksi.php";
//FUNGSI RUPIAH
include "../inc/rupiah.php";

include "../inc/tgl_indo.php";
date_default_timezone_set('Asia/Jakarta');

$kategori = $_POST["kategori"];
$dt1 = $_POST["tgl_1"];
$dt2 = $_POST["tgl_2"];

session_start();
if (isset($_SESSION["ses_username"]) == "") {
  header("location: login");
} else {
  $data_id = $_SESSION["ses_id"];
  $data_nama = $_SESSION["ses_nama"];
  $data_user = $_SESSION["ses_username"];
  $data_level = $_SESSION["ses_level"];
}

?>

<?php
$sql = $koneksi->query("SELECT SUM(masuk) as tot_masuk from transaksi,kategori where kode_pengguna='$data_id' and id_kategori=uraian and id_kategori='$kategori' and jenis='Masuk' and tgl_transaksi BETWEEN '$dt1' AND '$dt2'");
while ($data = $sql->fetch_assoc()) {
  $masuk = $data['tot_masuk'];
}

$sql = $koneksi->query("SELECT SUM(keluar) as tot_keluar from transaksi,kategori where kode_pengguna='$data_id' and id_kategori=uraian and id_kategori='$kategori' and jenis='Keluar' and tgl_transaksi BETWEEN '$dt1' AND '$dt2'");
while ($data = $sql->fetch_assoc()) {
  $keluar = $data['tot_keluar'];
}

$sql = $koneksi->query("SELECT SUM(masuk) as tot_masuk from transaksi,kategori where kode_pengguna='$data_id' and id_kategori=uraian and id_kategori='$kategori' AND jenis='Masuk' and tgl_transaksi BETWEEN '$dt1' AND '$dt2'");
while ($data = $sql->fetch_assoc()) {
  $kategori1 = $data['tot_masuk'];
}

$sql = $koneksi->query("SELECT SUM(keluar) as tot_keluar from transaksi,kategori where kode_pengguna='$data_id' and id_kategori=uraian and id_kategori='$kategori' AND jenis='Keluar' and tgl_transaksi BETWEEN '$dt1' AND '$dt2'");
while ($data = $sql->fetch_assoc()) {
  $kategori2 = $data['tot_keluar'];
}


$saldo = $masuk - $keluar;
$saldo2 = $kategori1 - $kategori2;

?>

<?php
if ($data_level == "Karyawan") {
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <title>Laporan Kas Konter Pulsa</title>
  </head>

  <body>
    <center>
      <h2 style="line-height: 0.2;">Laporan Rekapitulasi Kas Konter Pulsa</h2>
      <h3 style="line-height: 0.5;">Konter Pulsa Devi Cell</h3>
      <p style="line-height: 0.1;">Periode : <?php $a = $dt1;
                                              echo tgl_indo(date("Y-m-d", strtotime($a))) ?> s/d <?php $b = $dt2;
                                                                                                  echo tgl_indo(date("Y-m-d", strtotime($b))) ?>
      <p>________________________________________________________________________</p>

      <table border="1" cellspacing="0">
        <thead>
          <tr>
            <th>No.</th>
            <th>&emsp;Tanggal&emsp;</th>
            <th>
              <center>&emsp;&emsp;&emsp;&emsp;Kategori&emsp;&emsp;&emsp;&emsp;<center>
            </th>
            <th>Pemasukan</th>
            <th>Pengeluaran</th>
          </tr>
        </thead>
        <tbody>
          <?php

          if (isset($_POST["btnKat"])) { {

              $sql_tampil = "SELECT * FROM transaksi,kategori where kode_pengguna='$data_id' and id_kategori=uraian and id_kategori='$kategori' and tgl_transaksi BETWEEN '$dt1' AND '$dt2' order by id_transaksi desc";
              $query_tampil = mysqli_query($koneksi, $sql_tampil);
              $no = 1;
              while ($data = mysqli_fetch_array($query_tampil, MYSQLI_BOTH)) {
          ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php $tgl = $data['tgl_transaksi'];
                      echo date("d/M/Y", strtotime($tgl)) ?></td>

                  <td><?php echo $data['kategori']; ?></td>

                  <td align="right"><?php echo rupiah($data['masuk']); ?></td>
                  <td align="right"><?php echo rupiah($data['keluar']); ?></td>
                </tr>
              <?php
                $no++;
              }
              ?>
        </tbody>
        <tr>
          <td colspan="3">Total Pemasukan</td>
          <td colspan="2"><?php echo rupiah($masuk); ?></td>
        </tr>
        <tr>
          <td colspan="4">Total Pengeluaran</td>
          <td><?php echo rupiah($keluar); ?></td>
        </tr>
        <tr>
          <td colspan="3">Total Keuangan</td>
          <td colspan="2"><?php echo rupiah($saldo); ?></td>
        </tr>
      </table>
    </center>
<?php }
          }
?>

<br><br>
<table width="80%">
  <td align="right">Patila, <?php echo tgl_indo(date('Y-m-d')); ?></td>
</table>
<br><br><br>
<table width="71%">
  <td align="right">Devi Cell</td>
  <tr>
    <td align="right">Tgl, tdd:&nbsp;&nbsp;</td>
  </tr>
</table>
</center>

<?php
} ?>

<script>
  window.print();
</script>
  </body>

  </html>