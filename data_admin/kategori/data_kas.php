<?php
if ($data_level == "Administrator") {
	$sql = $koneksi->query("SELECT COUNT(id_kategori) as kategori from kategori");
	while ($data = $sql->fetch_assoc()) {
		$jml = $data['kategori'];
	}
?>
	<div class="card card-info">
		<div class="card-header">
			<h4>
				<i class="fa fa-table"></i> Data Kategori
			</h4>
			<p>Ada </i> <b><?php echo $jml; ?></b> jumlah data <b>Kategori</b></p>
		</div>
		<!-- /.card-header -->
		<div class="card-body">
			<div class="table-responsive">
				<div>
					<a href="?page=i_add_k" class="btn btn-primary">
						<i class="fa fa-plus"></i> &nbsp;Tambah Data</a>
				</div>
				<br>
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>No</th>
							<th>Kategori</th>
							<th class="sorting_asc_disabled sorting_desc_disabled">Aksi</th>
						</tr>
					</thead>
					<tbody>

						<?php
						$no = 1;
						$sql = $koneksi->query("select * from kategori where id_kategori order by id_kategori desc");
						while ($data = $sql->fetch_assoc()) {
						?>

							<tr>
								<td>
									<?php echo $no++; ?>
								</td>
								<td>
									<?php echo $data['kategori']; ?>
								</td>
								<td>
									<a href="?page=i_edit_k&kode=<?php echo $data['id_kategori']; ?>" title="Ubah" class="btn btn-success btn-sm">
										<i class="fa fa-edit"></i>
									</a>
									<a href="?page=i_del_k&kode=<?php echo $data['id_kategori']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="btn btn-danger btn-sm">
										<i class="fa fa-trash"></i>
									</a>
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
		</div>
		<!-- /.card-body -->