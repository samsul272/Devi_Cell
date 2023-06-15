<?php
$data_id = $_SESSION["ses_id"];
$data_nama = $_SESSION["ses_nama"];
$data_level = $_SESSION["ses_level"];
?>

<?php // informasi pemasukan hari ini
$tanggal = date('Y-m-d');
$sql = $koneksi->query("SELECT SUM(masuk) as tot_masuk from transaksi where kode_pengguna='$data_id' and jenis='Masuk' and tgl_transaksi='$tanggal'");
while ($data = $sql->fetch_assoc()) {
	$tmasuk = $data['tot_masuk'];
}

$sql = $koneksi->query("SELECT SUM(keluar) as tot_keluar  from transaksi where kode_pengguna='$data_id' and jenis='Keluar' and tgl_transaksi='$tanggal'");
while ($data = $sql->fetch_assoc()) {
	$tkeluar = $data['tot_keluar'];
}
?>

<?php
$sql = $koneksi->query("SELECT SUM(masuk) as tot_masuk  from transaksi where kode_pengguna='$data_id' and jenis='Masuk'");
while ($data = $sql->fetch_assoc()) {
	$masuk = $data['tot_masuk'];
}

$sql = $koneksi->query("SELECT SUM(keluar) as tot_keluar  from transaksi where kode_pengguna='$data_id' and jenis='Keluar'");
while ($data = $sql->fetch_assoc()) {
	$keluar = $data['tot_keluar'];
}

$saldo = $tmasuk - $tkeluar;
?>

<?php
$sql = $koneksi->query("SELECT SUM(masuk) as tot_masuk  from transaksi where kode_pengguna='$data_id' and jenis='Masuk'");
while ($data = $sql->fetch_assoc()) {
	$smasuk = $data['tot_masuk'];
}

$sql = $koneksi->query("SELECT SUM(keluar) as tot_keluar  from transaksi where kode_pengguna='$data_id' and jenis='Keluar'");
while ($data = $sql->fetch_assoc()) {
	$skeluar = $data['tot_keluar'];
}

$ssaldo = $smasuk - $skeluar;
?>

<div class="card card-secondary">
	<div class="card-header">
		<h3 class="card-title"><i class="fas fa-info-circle"></i> &nbsp;Kotak Informasi</h3>
	</div>
	<div class="card-body">
		<div class="form-group row">
			<h2>Selamat Datang <b><?php echo $data_nama; ?></b> di Konter Pulsa Devi Cell</h2>
		</div>
		<div class="form-group row">
			<p>Anda Masuk sebagai <b>Karyawan</b>, sedikit informasi kolom dibawah memiliki beberapa fungsi di antaranya:</p>
			<ul>
				<li>Kolom berwarna <b style="color:green;">hijau</b> logo + memberikan informasi pemasukan yang telah dilakukan hari ini!</li>
				<li>Kolom berwarna <b style="color:green;">hijau</b> logo arah panah atas memberikan informasi semua pemasukan yang telah dilakukan</li>
				<li>Kolom berwarna <b style="color:red;">merah</b> logo - memberikan informasi Pengeluaran yang telah dilakukan hari ini!</li>
				<li>Kolom berwarna <b style="color:red;">hijau</b> logo arah panah bawah memberikan informasi semua pengeluaran yang telah dilakukan</li>
				<li>Kolom berwarna <b style="color:blue;">biru</b> memberikan informasi semua jumlah Pemasukan dan Pengeluaran yang telah dilakukan</li>
			</ul>
		</div>
	</div>
</div>




<div class="row">
	<div class="col-lg-4 col-6">
		<!-- small box -->
		<div class="small-box bg-success">
			<div class="inner">
				<h5>
					<?php echo rupiah($tmasuk); ?>
				</h5>
				<p>Pemasukan Hari ini</p>
			</div>
			<div class="icon">
				<i class="ion ion-plus-round"></i>
			</div>
			<a href="?page=i_data_kmk" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>


	<div class="col-lg-4 col-6">
		<!-- small box -->
		<div class="small-box bg-success">
			<div class="inner">
				<h5>
					<?php echo rupiah($masuk); ?>
				</h5>

				<p>Total Pemasukan</p>
			</div>
			<div class="icon">
				<i class="ion ion-arrow-up-a"></i>
			</div>
			<a href="?page=i_data_kmk" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>

	<div class="col-lg-4 col-6">
		<!-- small box -->
		<div class="small-box bg-danger">
			<div class="inner">
				<h5>
					<?php echo rupiah($tkeluar); ?>
				</h5>

				<p>Pengeluaran Hari Ini</p>
			</div>
			<div class="icon">
				<i class="ion ion-minus-round"></i>
			</div>
			<a href="?page=o_data_kmk" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>

	<div class="col-lg-4 col-6">
		<!-- small box -->
		<div class="small-box bg-danger">
			<div class="inner">
				<h5>
					<?php echo rupiah($keluar); ?>
				</h5>

				<p>Total Pengeluaran</p>
			</div>
			<div class="icon">
				<i class="ion ion-arrow-down-a"></i>
			</div>
			<a href="?page=o_data_kmk" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>

	<div class="col-lg-4 col-6">
		<!-- small box -->
		<div class="small-box bg-info">
			<div class="inner">
				<h5>
					<?php echo rupiah($saldo); ?>
				</h5>

				<p>Saldo Kas Konter Pulsa</p>
			</div>
			<div class="icon">
				<i class="ion ion-stats-bars"></i>
			</div>
			<a href="?page=rekap_kmk" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
</div>

<!---- Dokumentasi Foto Konter Pulsa ---->
<!-------- Dokumentasi Foto ---------->
<div class="card card-secondary">
	<div class="card-deck">
		<div class="card">
			<img class="card-img-top rounded-top" src="dist/img/TJ.jpg" alt="Card image cap">
			<div class="card-body">
				<h5 class="card-title">Konter Pulsa Devi Cell - Pusat</h5>
				<p class="card-text"></p>
				<p class="card-text"><small class="text-muted">Upload 16 Mei 2023</small></p>
			</div>
		</div>
		<div class="card">
			<img class="card-img-top rounded-top" src="dist/img/Pembasean.jpeg" alt="Card image cap">
			<div class="card-body">
				<h5 class="card-title">Konter Pulsa Devi Cell di Pembasean</h5>
				<p class="card-text"></p>
				<p class="card-text"><small class="text-muted">Upload 16 Mei 2023</small></p>
			</div>
		</div>
		<div class="card">
			<img class="card-img-top rounded-top" src="dist/img/Binangun.jpeg" alt="Card image cap">
			<div class="card-body">
				<h5 class="card-title">Konter Pulsa Devi Cell di Binangun</h5>
				<p class="card-text"></p>
				<p class="card-text"><small class="text-muted">Upload 16 Mei 2023</small></p>
			</div>
		</div>
	</div>
</div>