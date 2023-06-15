<?php
include "../inc/koneksi.php";

//FUNGSI RUPIAH
include "../inc/rupiah.php";

include "../inc/tgl_indo.php";
date_default_timezone_set('Asia/Jakarta');

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
$sql = $koneksi->query("SELECT SUM(masuk) as tot_masuk  from transaksi where jenis='Masuk'");
while ($data = $sql->fetch_assoc()) {
  $masuk = $data['tot_masuk'];
}

$sql = $koneksi->query("SELECT SUM(keluar) as tot_keluar  from transaksi where jenis='Keluar'");
while ($data = $sql->fetch_assoc()) {
  $keluar = $data['tot_keluar'];
}

$saldo = $masuk - $keluar;
?>
<?php
if ($data_level == "Administrator") {
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <title>Laporan Kas Full</title>
  </head>

  <body>
    <center>
      <h2 style="line-height: 0.2;">Laporan Rekapitulasi Kas Devi Cell</h2>
      <h3 style="line-height: 0.5;">Konter Pulsa Devi Cell</h3>
      <p>________________________________________________________________________</p>

      <table border="1" cellspacing="0">
        <thead>
          <tr>
            <th>No.</th>
            <th>Tanggal</th>
            <th>Uraian</th>
            <th>Pemasukan</th>
            <th>Pengeluaran</th>
          </tr>
        </thead>
        <tbody>
          <?php

          $no = 1;
          $sql_tampil = "SELECT * FROM transaksi,kategori where id_kategori=uraian order by tgl_transaksi asc";
          $query_tampil = mysqli_query($koneksi, $sql_tampil);
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
          <td colspan="3">Saldo Kas Masjid</td>
          <td colspan="2"><?php echo rupiah($masuk) ?> - <?php echo rupiah($keluar); ?> = <?php echo rupiah($saldo); ?></td>
        </tr>
      </table>
      <br><br>
      <table width="80%">
        <td align="right">Patila, <?php echo tgl_indo(date('Y-m-d')); ?></td>
      </table>
      <br><br><br>
      <table width="61%">
        <td align="right">Devi Cell</td>
        <tr>
          <td align="right">Tgl, tdd:&nbsp;&nbsp;</td>
        </tr>
      </table>
    </center>
  <?php } ?>

  <script>
    window.print();
  </script>
  </body>

  </html>