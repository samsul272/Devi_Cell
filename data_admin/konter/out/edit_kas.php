<?php
if ($data_level == "Administrator") {
  if (isset($_GET['kode'])) {
    $sql_cek = "SELECT * FROM transaksi WHERE id_transaksi='" . $_GET['kode'] . "'";
    $query_cek = mysqli_query($koneksi, $sql_cek);
    $data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
  }
?>

  <div class="card card-success">
    <div class="card-header">
      <h3 class="card-title">
        <i class="fa fa-edit"></i> Ubah Pengeluaran
      </h3>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
      <div class="card-body">

        <input type='hidden' class="form-control" name="id_transaksi" value="<?php echo $data_cek['id_transaksi']; ?>" readonly />

        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Kategori</label>
          <div class="col-sm-4">
            <select name="kategori" class="form-control" required="required">
              <option value="" class="text-center">- Pilih -</option>
              <?php
              $kategori = mysqli_query($koneksi, "SELECT * FROM kategori where jenis_kat='Keluar' ORDER BY kategori ASC");
              while ($k = mysqli_fetch_array($kategori)) {
              ?>
                <option <?php if ($data_cek['uraian'] == $k['id_kategori']) {
                          echo "selected='selected'";
                        } ?> value="<?php echo $k['id_kategori']; ?>"><?php echo $k['kategori']; ?></option>
              <?php } ?>
            </select>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Pengeluaran</label>
          <div class="col-sm-4">
            <input type="text" class="form-control" id="keluar" name="keluar" value="Rp <?php echo number_format(($data_cek['keluar']), 0, '', '.') ?>" />
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Tanggal</label>
          <div class="col-sm-4">
            <input type="datetime" class="form-control" id="tgl_transaksi" name="tgl_transaksi" value="<?php echo $data_cek['tgl_transaksi']; ?>" />
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Upload File</label>
          <div class="col-sm-4">
            <input type="file" name="foto" class="form-control">
            <!-- <small><?php echo $data_cek['transaksi_foto'] ?></small> -->
            <p class="help-block">Bila File Bukti Foto <?php echo "<a class='font-weight-bold' target=_blank href='dist/img/bukti/$data_cek[transaksi_foto]'>$data_cek[transaksi_foto]</a>"; ?> tidak dirubah, kosongkan saja</p>
          </div>
        </div>
      </div>

      <div class="card-footer">
        <input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
        <a href="?page=i_data_km" title="Kembali" class="btn btn-secondary">Batal</a>
      </div>
    </form>
  </div>



<?php

  if (isset($_POST['Ubah'])) {

    //menangkap post keluar
    $keluar = $_POST['keluar'];

    //membuang Rp dan Titik
    $keluar_hasil = preg_replace("/[^0-9]/", "", $keluar);

    $ekstensi_diperbolehkan  = array('png', 'jpg', 'jpeg');
    $nama = $_FILES['foto']['name']; // mendapatkan nama gambar
    $x = explode('.', $nama); // memecah ekstensi menjadi string ditandai dengan .
    $ekstensi = strtolower(end($x)); // mengambil nama terakhir (end) dan menerima huruf kecil atau besar
    $ukuran  = $_FILES['foto']['size'];
    $lokasi = $_FILES['foto']['tmp_name'];

    // Menyiapkan tempat nemapung gambar yang diupload
    $lokasitujuan = "dist/img/bukti";
    $upload = move_uploaded_file($lokasi, $lokasitujuan . "/" . $nama);


    if ($nama == "") {
      $sql_ubah = "UPDATE transaksi SET
        uraian='" . $_POST['kategori'] . "',
        keluar='" . $keluar_hasil . "',
        tgl_transaksi='" . $_POST['tgl_transaksi'] . "'
        WHERE id_transaksi='" . $_POST['id_transaksi'] . "'";
      $query_ubah = mysqli_query($koneksi, $sql_ubah);
      mysqli_close($koneksi);
      if ($query_ubah) {
        echo "<script>
		  Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
		  }).then((result) => {if (result.value)
			{window.location = 'index2.php?page=o_data_km';
			}
		  })</script>";
      } else {
        echo "<script>
		  Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
		  }).then((result) => {if (result.value)
			{window.location = 'index2.php?page=o_data_km';
			}
		  })</script>";
      }
    } else {
      $sql_ubah = "UPDATE transaksi SET
        uraian='" . $_POST['kategori'] . "',
		    transaksi_foto = '" . $nama . "',
        keluar='" . $keluar_hasil . "',
        tgl_transaksi='" . $_POST['tgl_transaksi'] . "'
        WHERE id_transaksi='" . $_POST['id_transaksi'] . "'";
      $query_ubah = mysqli_query($koneksi, $sql_ubah);
      mysqli_close($koneksi);

      if ($query_ubah) {
        echo "<script>
      Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index2.php?page=o_data_km';
        }
      })</script>";
      } else {
        echo "<script>
      Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index2.php?page=o_data_km';
        }
      })</script>";
      }
    }
  }
}


?>

<script type="text/javascript">
  var keluar = document.getElementById('keluar');
  keluar.addEventListener('keyup', function(e) {
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatkeluar() untuk mengubah angka yang di ketik menjadi format angka
    keluar.value = formatkeluar(this.value, 'Rp ');
  });

  /* Fungsi formatkeluar */
  function formatkeluar(angka, prefix) {
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
      split = number_string.split(','),
      sisa = split[0].length % 3,
      keluar = split[0].substr(0, sisa),
      ribuan = split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if (ribuan) {
      separator = sisa ? '.' : '';
      keluar += separator + ribuan.join('.');
    }

    keluar = split[1] != undefined ? keluar + ',' + split[1] : keluar;
    return prefix == undefined ? keluar : (keluar ? 'Rp ' + keluar : '');
  }
</script>