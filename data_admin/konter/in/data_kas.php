<?php
if ($data_level == "Administrator") {
?>
	<div class="alert alert-success alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h5>
			<i class="icon fas fa-info"></i> Total Pemasukan Penjualan Pulsa
		</h5>
		<?php
		$sql = $koneksi->query("SELECT SUM(masuk) as tot_masuk from transaksi where kode_pengguna='$data_id' and jenis='Masuk'");
		while ($data = $sql->fetch_assoc()) {
		?>
			<h2>
			<?php echo rupiah($data['tot_masuk']);
		} ?>
			</h2>
			<h5>Pemasukan Hari ini
				<?php
				$tgl = date("Y/m/d");
				$tgl2 = date("Y/m/d", strtotime($tgl . '+ 1 days'));
				$sql = $koneksi->query("SELECT SUM(masuk) as masuk from transaksi where kode_pengguna='$data_id' and jenis='Masuk' and tgl_transaksi BETWEEN '$tgl' and '$tgl2'");
				while ($data = $sql->fetch_assoc()) {
				?><?php echo rupiah($data['masuk']); ?></h5>
		<?php
				}
		?>

	</div>

	<div class="card card-info">
		<div class="card-header">
			<h3 class="card-title">
				<i class="fa fa-table"></i> &nbsp;Pemasukan Konter Pulsa
			</h3>
		</div>
		<!-- /.card-header -->
		<div class="card-body">


			<!-------- Form Action -------->
			<form action="?page=i_del_km" method="POST" name="postform" enctype="multipart/form-data">
				<div class="table-responsive">
					<div>
						<a href="?page=i_add_km" class="btn btn-primary">
							<i class="fa fa-plus"></i> &nbsp;Tambah Data</a> <input class="btn btn-danger" type="submit" name="hapus" value="Hapus Data Ceklis" onclick="return confirm('Apakah kamu yakin menghapus data yang dipilih?');">
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
								<th class="sorting_asc_disabled sorting_desc_disabled" width="100">Aksi</th>
							</tr>
						</thead>
						<tbody>

							<?php
							$no = 1;
							// select * from tabel_transaksi,tabel_kategori dimana id_kategori=uraian atau id_kategori = kolom transaksi di uraian
							$sql = mysqli_query($koneksi, "SELECT * FROM transaksi,kategori where id_kategori=uraian and jenis='masuk' order by id_transaksi desc");
							while ($data = mysqli_fetch_array($sql)) {
							?>

								<tr>
									<td>
										<?php echo $no++; ?>
									</td>
									<td>
										<?php
										$tgl = $data['tgl_transaksi'];
										echo date("d-M-Y, H:i:s", strtotime($tgl));
										// echo tgl_indo(date("Y-m-d", strtotime($tgl))); 
										?>
									</td>
									<td>
										<?php echo $data['kategori']; ?>
									</td>
									<td align="center">
										<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#lihat_transaksi_<?php echo $data['id_transaksi'] ?>">
											<i class="fa fa-eye"></i>
										</button>

										<!-- Modal -->
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
									<td>
										<a href="?page=i_edit_km&kode=<?php echo $data['id_transaksi']; ?>" title="Ubah" class="btn btn-success btn-sm">
											<i class="fa fa-edit"></i>
										</a>
										<!-- <a href="?page=i_del_km&kode=< echo $data['id_transaksi']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="btn btn-danger btn-sm">
											<i class="fa fa-trash">&nbsp;</i> -->
										</a>
										&nbsp;&nbsp;&nbsp;<input type="checkbox" name="pilih[]" value="<?php echo $data['id_transaksi'] ?>" />
									</td>
								</tr>
						<?php
							}
						}
						?>
						</tbody>
						</tfoot>
					</table>
				</div>
			</form>
		</div>

		<!-- /.card-body -->