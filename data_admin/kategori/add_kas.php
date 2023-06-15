<?php
if ($data_level == "Administrator") {
?>
	<div class="card card-primary">
		<div class="card-header">
			<h3 class="card-title">
				<i class="fa fa-edit"></i> Tambah Kategori
			</h3>
		</div>
		<form action="" method="post" enctype="multipart/form-data">
			<div class="card-body">

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Nama Kategori</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" id="kategori" name="kategori" placeholder="Misal Pulsa" required>
					</div>
				</div>



				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Jenis Pemasukan atau Pengeluaran</label>
					<div class="col-sm-5">
						<select name="jenis_kat" class="form-control" required="required">
							<option value="" class="text-center">- Pilih -</option>
							<option value="Masuk">Masuk</option>
							<option value="Keluar">Keluar</option>
						</select>
					</div>
				</div>
			</div>

			<div class="card-footer">
				<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
				<a href="?page=i_data_k" title="Kembali" class="btn btn-secondary">Batal</a>
			</div>
		</form>
	</div>

<?php

	if (isset($_POST['Simpan'])) {

		//menangkap post masuk
		// $masuk = $_POST['masuk'];

		//mulai proses simpan data
		$sql_simpan = "INSERT INTO kategori (id_kategori, kategori, jenis_kat) VALUES (
        '" . "',
		'" . $_POST['kategori'] . "',
		'" . $_POST['jenis_kat'] . "')";
		$query_simpan = mysqli_query($koneksi, $sql_simpan);
		mysqli_close($koneksi);

		if ($query_simpan) {
			echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index2.php?page=i_data_k';
          }
      })</script>";
		} else {
			echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index2.php?page=i_add_k';
          }
      })</script>";
		}
	}
}
?>

</script>