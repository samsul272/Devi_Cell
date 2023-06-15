<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title"><i class="fa fa-edit"></i> Tambah Data</h3>
  </div>
  <form action="" method="post" enctype="multipart/form-data">
    <div class="card-body">

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Nama User</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" id="nama_pengguna" name="nama_pengguna" placeholder="Nama user" required>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Alamat Email</label>
        <div class="col-sm-6">
          <input type="email" class="form-control" id="email" name="email" placeholder="Alamat Email ditandai dengan @" required>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Alamat</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat Konter Pulsa">
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Nomor Handphone</label>
        <div class="col-sm-6">
          <input type="number" class="form-control" id="no_hp" name="no_hp" placeholder="Masukkan Nomor Hp yg bisa dihubungi">
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Username</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" id="username" name="username" placeholder="Username">
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-6">
          <input type="password" class="form-control" id="password" name="password" placeholder="Password">
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Upload/Unggah Foto Profile</label>
        <div class="col-sm-4">
          <input type="file" name="foto" class="form-control">
          <small>File yang di perbolehkan *PDF | *JPG | *jpeg | *png </small>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Level</label>
        <div class="col-sm-4">
          <select name="level" id="level" class="form-control">
            <option>- Pilih -</option>
            <option>Administrator</option>
            <option>Karyawan</option>
          </select>
        </div>
      </div>

    </div>
    <div class="card-footer">
      <input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
      <a href="?page=MyApp/data_pengguna" title="Kembali" class="btn btn-secondary">Batal</a>
    </div>
  </form>
</div>

<?php

if (isset($_POST['Simpan'])) {

  $ekstensi_diperbolehkan  = array('png', 'jpg', 'jpeg');
  $nama = $_FILES['foto']['name']; // mendapatkan nama gambar
  $x = explode('.', $nama); // memecah ekstensi menjadi string ditandai dengan .
  $ekstensi = strtolower(end($x)); // mengambil nama terakhir (end) dan menerima huruf kecil atau besar
  $ukuran  = $_FILES['foto']['size'];
  $lokasi = $_FILES['foto']['tmp_name'];

  // Menyiapkan tempat nemapung gambar yang diupload
  $lokasitujuan = "dist/img/profile";

  $data_id = $_SESSION["ses_id"];
  if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
    if ($ukuran < 2097152) { // 2 mb = 2097152 byte
      $upload = move_uploaded_file($lokasi, $lokasitujuan . "/" . $nama);
      //mulai proses simpan data
      $sql_simpan = "INSERT INTO tb_pengguna (nama_pengguna,email,alamat,no_hp,username,password,foto_profile,level) VALUES (
        '" . $_POST['nama_pengguna'] . "',
        '" . $_POST['email'] . "',
        '" . $_POST['alamat'] . "',
        '" . $_POST['no_hp'] . "',
        '" . $_POST['username'] . "',
        '" . $_POST['password'] . "',
        '" . $nama . "',
        '" . $_POST['level'] . "')";
      $query_simpan = mysqli_query($koneksi, $sql_simpan);
      mysqli_close($koneksi);

      if ($query_simpan) {
        echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index2.php?page=MyApp/data_pengguna';
          }
      })</script>";
      } else {
        echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index2.php?page=MyApp/add_pengguna';
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
//selesai proses simpan data
?>