<?php
if ($data_level == "Karyawan") {
?>
	<div class="alert alert-danger alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h5>
			<i class="icon fas fa-info"></i> Total Pengeluaran Pembelian Pulsa
		</h5>
		<?php
		$sql = $koneksi->query("SELECT SUM(keluar) as tot_keluar from transaksi where kode_pengguna='$data_id' and jenis='Keluar'");
		while ($data = $sql->fetch_assoc()) {
		?>
			<h2>
			<?php echo rupiah($data['tot_keluar']);
		} ?>
			</h2>
			<h5>Pengeluaran Hari ini
				<?php
				$tgl = date("Y/m/d");
				$sql = $koneksi->query("SELECT SUM(keluar) as keluar from transaksi where kode_pengguna='$data_id' and jenis='Keluar' and tgl_transaksi='$tgl'");
				while ($data = $sql->fetch_assoc()) {
				?><?php echo rupiah($data['keluar']); ?></h5>
		<?php
				}
		?>
	</div>

	<div class="card card-info">
		<div class="card-header">
			<h3 class="card-title">
				<i class="fa fa-table"></i> &nbsp;Kas Konter Pulsa Keluar
			</h3>
		</div>
		<!-- /.card-header -->
		<div class="card-body">

			<!------ Form Action ------>
			<form action="?page=o_del_kmk" method="POST" name="postform" enctype="multipart/form-data">
				<div class="table-responsive">
					<div>
						<a href="?page=o_add_kmk" class="btn btn-primary">
							<i class="fa fa-plus"></i> &nbsp;Tambah Data</a>&nbsp;
					</div>
					<br>
					<table id="example2" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th width="5">No</th>
								<th>Tanggal</th>
								<th>Kategori</th>
								<th class="sorting_asc_disabled sorting_desc_disabled text-center" width="75">Bukti Foto</th>
								<th class="text-right">Harga</th>

							</tr>
						</thead>
						<tbody>

							<?php
							$no = 1;
							$sql = mysqli_query($koneksi, "SELECT * FROM transaksi,kategori where kode_pengguna='$data_id' and id_kategori=uraian and jenis='keluar' order by id_transaksi desc");
							while ($data = mysqli_fetch_array($sql)) {
							?>

								<tr>
									<td>
										<?php echo $no++; ?>
									</td>
									<td>
										<?php
										$tgl = $data['tgl_transaksi'];
										echo date("d-M-Y, H:i:s", strtotime($tgl)); ?>
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
			</form>
		</div>
	<?php } ?>
	<!-- /.card-body -->