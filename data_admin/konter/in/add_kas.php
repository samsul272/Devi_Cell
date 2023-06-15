<?php
if ($data_level == "Administrator") {
?>
	<div class="card card-primary">
		<div class="card-header">
			<h3 class="card-title">
				<i class="fa fa-edit"></i> Tambah Pemasukan
			</h3>
		</div>


		<form action="" method="post" enctype="multipart/form-data">
			<div class="card-body">

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Kategori</label>
					<div class="col-sm-4">
						<select name="kategori" class="form-control" required="required">
							<option value="" class="text-center">- Pilih -</option>
							<?php
							$kategori = mysqli_query($koneksi, "SELECT * FROM kategori where jenis_kat='Masuk' ORDER BY kategori ASC");
							while ($k = mysqli_fetch_array($kategori)) {
							?>
								<option value="<?php echo $k['id_kategori']; ?>"><?php echo $k['kategori']; ?></option>
							<?php
							}
							?>
						</select>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Pemasukan</label>
					<div class="col-sm-4">
						<input type=" text" class="form-control" id="masuk" name="masuk" placeholder="Jumlah Pemasukan" required>
					</div>
				</div>

				<div class="form-group row" hidden>
					<label class="col-sm-2 col-form-label">Tanggal</label>
					<div class="col-sm-4">
						<input type="datetime" class="form-control" id="tgl_transaksi" name="tgl_transaksi" value="<?php echo date("Y-m-d H:i:s"); ?>" required>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Upload/Unggah Gambar</label>
					<div class="col-sm-4">
						<input type="file" name="foto" class="form-control">
						<small>File yang di perbolehkan *PDF | *JPG | *jpeg | *png </small>
					</div>
				</div>
			</div>

			<div class="card-footer">
				<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
				<a href="?page=i_data_km" title="Kembali" class="btn btn-secondary">Batal</a>
			</div>
	</div>
	</form>

<?php
	if (isset($_POST['Simpan'])) {

		//menangkap post masuk
		$masuk = $_POST['masuk'];

		//membuang Rp dan Titik
		$masuk_hasil = preg_replace("/[^0-9]/", "", $masuk);

		$ekstensi_diperbolehkan	= array('png', 'jpg', 'jpeg');
		$nama = $_FILES['foto']['name']; // mendapatkan nama gambar
		$x = explode('.', $nama); // memecah ekstensi menjadi string ditandai dengan .
		$ekstensi = strtolower(end($x)); // mengambil nama terakhir (end) dan menerima huruf kecil atau besar
		$ukuran	= $_FILES['foto']['size'];
		$lokasi = $_FILES['foto']['tmp_name'];

		// Menyiapkan tempat nemapung gambar yang diupload
		$lokasitujuan = "dist/img/bukti";

		$data_id = $_SESSION["ses_id"];
		if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
			if ($ukuran < 2097152) { // 2 mb = 2097152 byte
				$upload = move_uploaded_file($lokasi, $lokasitujuan . "/" . $nama);
				$sql_simpan = "INSERT INTO transaksi (tgl_transaksi, uraian, transaksi_foto, masuk, keluar, jenis, kode_pengguna) VALUES (
					'" . $_POST['tgl_transaksi'] . "',
					'" . $_POST['kategori'] . "',
					'" . $nama . "',
					'" . $masuk_hasil . "', 
					'0',
					'Masuk',
					'" . $data_id . "')";
				//mulai proses simpan data
				$query_simpan = mysqli_query($koneksi, $sql_simpan);
				mysqli_close($koneksi);
				if ($query_simpan) {
					echo "<script>
				  Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
				  }).then((result) => {if (result.value){
					  window.location = 'index2.php?page=i_data_km';
					  }
				  })</script>";
				} else {
					echo "<script>
				  Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
				  }).then((result) => {if (result.value){
					  window.location = 'index2.php?page=i_add_km';
					  }
				  })</script>";
				}
			} else {
				echo "<script>
			Swal.fire({title: 'Ukuran File Tidak Boleh Lebih Dari 2 Mb',text: '',icon: 'error',confirmButtonText: 'OK'
			}).then((result) => {if (result.value){
				window.location = 'index2.php?page=i_add_km';
				}
			})</script>";
			}
		} else {
			echo "<script>
			Swal.fire({title: 'Ekstensi atau Format File Tidak Diperbolehkan',text: '',icon: 'error',confirmButtonText: 'OK'
			}).then((result) => {if (result.value){
				window.location = 'index2.php?page=i_add_km';
				}
			})</script>";
		}
	}
}

?>

<script type="text/javascript">
	var masuk = document.getElementById('masuk');
	masuk.addEventListener('keyup', function(e) {
		// tambahkan 'Rp.' pada saat form di ketik
		// gunakan fungsi formatmasuk() untuk mengubah angka yang di ketik menjadi format angka
		masuk.value = formatmasuk(this.value, 'Rp ');
	});

	/* Fungsi formatmasuk */
	function formatmasuk(angka, prefix) {
		var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split = number_string.split(','),
			sisa = split[0].length % 3,
			masuk = split[0].substr(0, sisa),
			ribuan = split[0].substr(sisa).match(/\d{3}/gi);

		// tambahkan titik jika yang di input sudah menjadi angka ribuan
		if (ribuan) {
			separator = sisa ? '.' : '';
			masuk += separator + ribuan.join('.');
		}

		masuk = split[1] != undefined ? masuk + ',' + split[1] : masuk;
		return prefix == undefined ? masuk : (masuk ? 'Rp ' + masuk : '');
	}
</script>