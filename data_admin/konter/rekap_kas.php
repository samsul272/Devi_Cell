<?php

$sql = $koneksi->query("SELECT SUM(masuk) as tot_masuk  from transaksi where jenis='Masuk'");
while ($data = $sql->fetch_assoc()) {
	$masuk = $data['tot_masuk'];
}
?>

<?php
$sql = $koneksi->query("SELECT SUM(keluar) as tot_keluar  from transaksi where jenis='Keluar'");
while ($data = $sql->fetch_assoc()) {
	$keluar = $data['tot_keluar'];
}


?>

<div class="alert alert-info alert-dismissible">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<h5>
		<i class="icon fas fa-info"></i> Saldo Kas Konter Pulsa
	</h5>
	<h5>Pemasukan :
		<?php
		echo rupiah($masuk);
		?>
	</h5>

	<h5>Pengeluaran :
		<?php
		echo rupiah($keluar);
		?>
	</h5>
	<hr>

	<h3>Saldo Akhir :
		<?php
		$saldo = $masuk - $keluar;
		echo rupiah($saldo);
		?>
	</h3>
</div>

<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> &nbsp;Rekap Kas Konter Pulsa Devi Cell
		</h3>
	</div>

	<div>
		<a href="eksport.php" class="btn btn-success">
			<i class="fa fa-plus"></i> &nbsp;Eksport Excel atau Copy</a>
	</div>

	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<table id="example3" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th width="15">No</th>
						<th>Tanggal</th>
						<th>Kategori</th>
						<th width="75">Bukti Foto</th>
						<th>Pemasukan</th>
						<th>Pengeluaran</th>
					</tr>
				</thead>
				<tbody>

					<?php
					$no = 1;
					$sql = $koneksi->query("SELECT * FROM transaksi,kategori where id_kategori=uraian order by id_transaksi desc");
					while ($data = $sql->fetch_assoc()) {
					?>

						<tr>
							<td>
								<?php echo $no++; ?>
							</td>
							<td>
								<?php
								$tgl = $data['tgl_transaksi'];
								echo date("d-M-Y H:i:s", strtotime($tgl)); ?>
							</td>
							<td>
								<?php echo $data['kategori']; ?>
							</td>
							<td align="center">
								<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#lihat_transaksi_<?php echo $data['id_transaksi'] ?>">
									<i class="fa fa-eye"></i>
								</button>

								<div class="modal fade" id="lihat_transaksi_<?php echo $data['id_transaksi'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h4 class="modal-title" id="exampleModalLabel">Foto <?php echo $data['transaksi_foto'] ?></h4>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<center>
													<embed src="dist/img/bukti/<?php echo $data['transaksi_foto']; ?>" width="400px" alt="" class="img-responsive">
												</center>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
											</div>
										</div>
									</div>
								</div>
							</td>
							<td align="right">
								<?php echo rupiah($data['masuk']); ?>
							</td>
							<td align="right">
								<?php echo rupiah($data['keluar']); ?>
							</td>
						</tr>

					<?php
					}
					?>
				</tbody>
				</tfoot>
			</table>
		</div>
	</div>
	<!-- /.card-body -->