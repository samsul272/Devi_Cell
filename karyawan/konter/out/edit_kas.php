<?php
if ($data_level == "Karyawan") {
  if (isset($_GET['kode'])) {
    $sql_cek = "SELECT * FROM transaksi WHERE id_transaksi='" . $_GET['kode'] . "'";
    $query_cek = mysqli_query($koneksi, $sql_cek);
    $data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
  }
?>

  <div class="card card-success">
    <div class="card-header">
      <h3 class="card-title"><i class="fa fa-edit"></i> Ubah Pengeluaran</h3>
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
            <input type="date" class="form-control" id="tgl_transaksi" name="tgl_transaksi" value="<?php echo $data_cek['tgl_transaksi']; ?>" />
          </div>
        </div>

      </div>
      <div class="card-footer">
        <input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
        <a href="?page=o_data_km" title="Kembali" class="btn btn-secondary">Batal</a>
      </div>
    </form>
  </div>



<?php

  if (isset($_POST['Ubah'])) {
    $data_id = $_SESSION["ses_id"];
    $sql_ubah = "UPDATE transaksi SET
        uraian='" . $_POST['kategori'] . "',
        keluar='" . $_POST['keluar'] . "',
        tgl_transaksi='" . $_POST['tgl_transaksi'] . "',
        kode_pengguna='" . $data_id . "'
        WHERE id_transaksi='" . $_POST['id_transaksi'] . "'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);
    mysqli_close($koneksi);

    if ($query_ubah) {
      echo "<script>
      Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=o_data_km';
        }
      })</script>";
    } else {
      echo "<script>
      Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=o_data_km';
        }
      })</script>";
    }
  }
}
?>