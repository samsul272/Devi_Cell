<?php
if ($data_level == "Karyawan") {
?>
  <div class="card card-danger">
    <div class="card-header">
      <h3 class="card-title">
        <i class="fa fa-edit"></i> Tambah Pengeluaran
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
              $kategori = mysqli_query($koneksi, "SELECT * FROM kategori where jenis_kat='Keluar' ORDER BY kategori ASC");
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
          <label class="col-sm-2 col-form-label">Pengeluaran (Rp.)</label>
          <div class="col-sm-4">
            <input type="text" class="form-control" id="keluar" name="keluar" placeholder="Jumlah Pengeluaran" required>
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
        <a href="?page=o_data_kmk" title="Kembali" class="btn btn-secondary">Batal</a>
      </div>
    </form>
  </div>


<?php

  if (isset($_POST['Simpan'])) {

    //menangkap post masuk
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

    //mulai proses simpan data
    $data_id = $_SESSION["ses_id"];
    if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
      if ($ukuran < 2097152) { // 2 mb = 2097152 byte
        $upload = move_uploaded_file($lokasi, $lokasitujuan . "/" . $nama);
        $sql_simpan = "INSERT INTO transaksi (tgl_transaksi,uraian,transaksi_foto, masuk,keluar,jenis, kode_pengguna) VALUES (
      '" . $_POST['tgl_transaksi'] . "',
      '" . $_POST['kategori'] . "',
      '" . $nama . "',
      '0',
      '" . $keluar_hasil . "',
      'Keluar',
      '" . $data_id . "')";
        $query_simpan = mysqli_query($koneksi, $sql_simpan);
        mysqli_close($koneksi);
        if ($query_simpan) {
          echo "<script>
    Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
    }).then((result) => {if (result.value){
      window.location = 'index2.php?page=o_data_kmk';
      }
    })</script>";
        } else {
          echo "<script>
    Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
    }).then((result) => {if (result.value){
      window.location = 'index2.php?page=o_add_kmk';
      }
    })</script>";
        }
      } else {
        echo "<script>
Swal.fire({title: 'Ukuran File Tidak Boleh Lebih Dari 2 Mb',text: '',icon: 'error',confirmButtonText: 'OK'
}).then((result) => {if (result.value){
  window.location = 'index2.php?page=o_add_kmk';
  }
})</script>";
      }
    } else {
      echo "<script>
Swal.fire({title: 'Ekstensi atau Format File Tidak Diperbolehkan',text: '',icon: 'error',confirmButtonText: 'OK'
}).then((result) => {if (result.value){
  window.location = 'index2.php?page=o_add_kmk';
  }
})</script>";
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