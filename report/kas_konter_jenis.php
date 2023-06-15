<?php
include "../inc/koneksi.php";
//FUNGSI RUPIAH
include "../inc/rupiah.php";

include "../inc/tgl_indo.php";
date_default_timezone_set('Asia/Jakarta');

$jenis = $_POST["jenis"];
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
$sql = $koneksi->query("SELECT SUM(masuk) as tot_masuk from transaksi where kode_pengguna='$data_id' and jenis='Masuk' and tgl_transaksi BETWEEN '$dt1' AND '$dt2'");
while ($data = $sql->fetch_assoc()) {
  $masuk = $data['tot_masuk'];
}

$sql = $koneksi->query("SELECT SUM(keluar) as tot_keluar from transaksi where kode_pengguna='$data_id' and jenis='Keluar' and tgl_transaksi BETWEEN '$dt1' AND '$dt2'");
while ($data = $sql->fetch_assoc()) {
  $keluar = $data['tot_keluar'];
}



$saldo = $masuk - $keluar;
// $saldo2 = $masuk1 - $masuk2;

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
            <th>Tanggal</th>
            <th>Kategori</th>
            <?php if ($jenis == 'Keluar') { ?>
              <th>Pemasukan</th>
            <?php } elseif ($jenis == 'Masuk') { ?>
              <th>Pengeluaran</th>
            <?php } ?>
          </tr>
        </thead>
        <tbody>
          <?php

          if (isset($_POST["btnJenis"])) { {
              if ($jenis == 'Masuk') {
                $sql_tampil = "SELECT * FROM transaksi,kategori where kode_pengguna='$data_id' and id_kategori=uraian and tgl_transaksi BETWEEN '$dt1' AND '$dt2' and jenis='Masuk' order by id_transaksi desc";
                $query_tampil = mysqli_query($koneksi, $sql_tampil);
                $no = 1;
                while ($data = mysqli_fetch_array($query_tampil, MYSQLI_BOTH)) {
          ?>
                  <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php $tgl = $data['tgl_transaksi'];
                        echo date("d/M/Y", strtotime($tgl)) ?>&emsp14;&emsp14;&emsp14;&emsp14;</td>

                    <td><?php echo $data['kategori']; ?>&emsp14;&emsp14;&emsp14;&emsp14;&emsp14;&emsp14;&emsp14;&emsp14;</td>
                    <td align="right"><?php echo rupiah($data['masuk']); ?></td>

                  </tr>
                <?php
                  $no++;
                }
              } elseif ($jenis == 'Keluar') {
                $sql_tampil = "SELECT * FROM transaksi,kategori where kode_pengguna='$data_id' and id_kategori=uraian and tgl_transaksi BETWEEN '$dt1' AND '$dt2' and jenis='Keluar' order by id_transaksi desc";
                $query_tampil = mysqli_query($koneksi, $sql_tampil);
                $no = 1;
                while ($data = mysqli_fetch_array($query_tampil, MYSQLI_BOTH)) {
                ?>
                  <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php $tgl = $data['tgl_transaksi'];
                        echo date("d/M/Y", strtotime($tgl)) ?></td>
                    <td><?php echo $data['kategori']; ?></td>
                    <td align="right"><?php echo rupiah($data['keluar']); ?></td>
                  </tr>
              <?php

                }
              }
              ?>
        </tbody>
        <tr>
          <?php if ($jenis == 'Masuk') { ?>
            <td colspan="3">Total Pemasukan</td>
            <td colspan="2"><?php echo rupiah($masuk); ?>&emsp14;&emsp14;&emsp14;&emsp14;</td>
        </tr>
        <tr>
        <?php } elseif ($jenis == 'Keluar') { ?>
          <td colspan="3">Total Pengeluaran</td>
          <td colspan="2"><?php echo rupiah($keluar); ?>&emsp14;&emsp14;&emsp14;&emsp14;</td>
        <?php } ?>
        </tr>
      </table>
    </center>
<?php
            }
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