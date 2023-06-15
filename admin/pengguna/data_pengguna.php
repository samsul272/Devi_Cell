<?php
if ($data_level == "Administrator") {
?>
	<div class="card card-info">
		<div class="card-header">
			<h3>
				<i class="fa fa-table"></i> &nbsp;Data User
			</h3>

			<!-- Menampilkan jumlah data user -->
			<?php
			$sql = $koneksi->query("SELECT COUNT(id_pengguna) as pengguna from tb_pengguna");
			while ($data = $sql->fetch_assoc()) {
				$jml = $data['pengguna'];
			}
			?>
			<p>Ada </i><b><?php echo $jml; ?></b> jumlah data <b>User</b></p>
		</div>
		<!-- /.card-header -->
		<div class="card-body">
			<div class="table-responsive">
				<div>
					<a href="?page=MyApp/add_pengguna" class="btn btn-primary">
						<i class="fa fa-edit"></i> Tambah Data</a>
				</div>
				<br>
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama User</th>
							<th>Alamat Email</th>
							<th>Alamat</th>
							<th>Nomor Handphone</th>
							<th>Username</th>
							<th>Level</th>
							<th>Foto Profile</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>

						<?php
						$no = 1;
						$sql = $koneksi->query("select * from tb_pengguna");
						while ($data = $sql->fetch_assoc()) {
						?>

							<tr>
								<td>
									<?php echo $no++; ?>
								</td>
								<td>
									<?php echo $data['nama_pengguna']; ?>
								</td>
								<td>
									<?php echo $data['email']; ?>
								</td>
								<td>
									<?php echo $data['alamat']; ?>
								</td>
								<td>
									<?php echo $data['no_hp']; ?>
								</td>
								<td>
									<?php echo $data['username']; ?>
								</td>
								<td>
									<?php echo $data['level']; ?>
								</td>
								<td>
									<img src="dist/img/profile/<?php echo $data['foto_profile']; ?>" width="50px" name="foto">
								</td>
								<td>
									<a href="?page=MyApp/edit_pengguna&kode=<?php echo $data['id_pengguna']; ?>" title="Ubah" class="btn btn-success btn-sm">
										<i class="fa fa-edit"></i>
									</a>
									<a href="?page=MyApp/del_pengguna&kode=<?php echo $data['id_pengguna']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="btn btn-danger btn-sm">
										<i class="fa fa-trash"></i>
									</a>
								</td>
							</tr>

					<?php
						}
					} else {
						echo 'Data ERROR';
					}
					?>
					</tbody>
					</tfoot>
				</table>
			</div>
		</div>
		<!-- /.card-body -->