<?php
if ($data_level == "Administrator") {
	if (isset($_GET['kode'])) {
		$sql_cek = "SELECT * FROM kategori WHERE id_kategori='" . $_GET['kode'] . "'";
		$query_cek = mysqli_query($koneksi, $sql_cek);
		$data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
	}
?>

	<div class="card card-success">
		<div class="card-header">
			<h3 class="card-title">
				<i class="fa fa-edit"></i> Ubah Pemasukan
			</h3>
		</div>
		<form action="" method="post" enctype="multipart/form-data">
			<div class="card-body">

				<input type='hidden' class="form-control" name="id_kategori" value="<?php echo $data_cek['id_kategori']; ?>" readonly />

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Kategori</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" id="kategori" name="kategori" value="<?php echo $data_cek['kategori']; ?>" />
					</div>
				</div>

			</div>
			<div class="card-footer">
				<input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
				<a href="?page=i_data_k" title="Kembali" class="btn btn-secondary">Batal</a>
			</div>
		</form>
	</div>



<?php

	if (isset($_POST['Ubah'])) {

		//menangkap post masuk
		// $masuk = $_POST['masuk'];

		//membuang Rp dan Titik
		// $masuk_hasil = preg_replace("/[^0-9]/", "", $masuk);

		$sql_ubah = "UPDATE kategori SET
        kategori='" . $_POST['kategori'] . "'
        WHERE id_kategori='" . $_POST['id_kategori'] . "'";
		$query_ubah = mysqli_query($koneksi, $sql_ubah);
		mysqli_close($koneksi);

		if ($query_ubah) {
			echo "<script>
      Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index2.php?page=i_data_k';
        }
      })</script>";
		} else {
			echo "<script>
      Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index2.php?page=i_data_k';
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