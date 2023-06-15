<?php

if (isset($_GET['kode'])) {
  $sql_cek = "SELECT * FROM tb_pengguna WHERE id_pengguna='" . $_GET['kode'] . "'";
  $query_cek = mysqli_query($koneksi, $sql_cek);
  $data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
?>

  <?php
  if ($data_level == "Administrator") {
  ?>

    <div class="card card-success">
      <div class="card-header">
        <h3 class="card-title"><i class="fa fa-edit"></i> Ubah Data</h3>
      </div>

      <form action="" method="post" enctype="multipart/form-data">
        <div class="card-body">

          <input type='hidden' class="form-control" name="id_pengguna" value="<?php echo $data_cek['id_pengguna']; ?>" readonly />

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Nama User</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" id="nama_pengguna" name="nama_pengguna" value="<?php echo $data_cek['nama_pengguna']; ?>" />
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Alamat Email</label>
            <div class="col-sm-6">
              <input type="email" class="form-control" id="email" name="email" value="<?php echo $data_cek['email']; ?>" />
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Alamat</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $data_cek['alamat']; ?>" />
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Nomor Handphone</label>
            <div class="col-sm-6">
              <input type="number" class="form-control" id="no_hp" name="no_hp" value="<?php echo $data_cek['no_hp']; ?>" />
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Username</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" id="username" name="username" value="<?php echo $data_cek['username']; ?>" />
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-6">
              <input type="password" class="form-control" id="pass" name="password" value="<?php echo $data_cek['password']; ?>" />
              <input id="mybutton" onclick="change()" type="checkbox" class="form-checkbox"> Lihat Password
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Level</label>
            <div class="col-sm-4">
              <select name="level" id="level" class="form-control">
                <option value="">-- Pilih Level --</option>
                <?php
                //menhecek data yg dipilih sebelumnya
                if ($data_cek['level'] == "Administrator") echo "<option value='Administrator' selected>Administrator</option>";
                else echo "<option value='Administrator'>Administrator</option>";

                if ($data_cek['level'] == "Karyawan") echo "<option value='Karyawan' selected>Karyawan</option>";
                else echo "<option value='Karyawan'>Karyawan</option>";
                ?>
              </select>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Upload File</label>
            <div class="col-sm-4">
              <input type="file" name="foto" class="form-control">
              <!-- <small><?php echo $data_cek['foto_profile'] ?></small> -->
              <p class="help-block">Bila File <?php echo "<a class='fancybox btn btn-xs btn-primary' target=_blank href='dist/img/profile/$data_cek[foto_profile]'>$data_cek[foto_profile]</a>"; ?> tidak dirubah kosongkan saja</p>
            </div>
          </div>

        </div>
        <div class="card-footer">
          <input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
          <a href="?page=MyApp/data_pengguna" title="Kembali" class="btn btn-secondary">Batal</a>
        </div>
      </form>
    </div>
<?php
  } else {
    echo "<script>
            Swal.fire({title: 'Halaman Error',text: '',icon: 'error',confirmButtonText: 'OK'
            }).then((result) => {if (result.value){
              window.location = 'index2.php?page=MyApp/profile';
              }
            })</script>";
  }
}
?>


<?php
if (isset($_POST['Ubah'])) {

  $ekstensi_diperbolehkan  = array('png', 'jpg', 'jpeg');
  $nama = $_FILES['foto']['name']; // mendapatkan nama gambar
  $x = explode('.', $nama); // memecah ekstensi menjadi string ditandai dengan .
  $ekstensi = strtolower(end($x)); // mengambil nama terakhir (end) dan menerima huruf kecil atau besar
  $ukuran  = $_FILES['foto']['size'];
  $lokasi = $_FILES['foto']['tmp_name'];

  // Menyiapkan tempat nemapung gambar yang diupload
  $lokasitujuan = "dist/img/profile/";
  $upload = move_uploaded_file($lokasi, $lokasitujuan . $nama);

  if ($nama == "") {
    $sql_ubah = "UPDATE tb_pengguna SET
        nama_pengguna='" . $_POST['nama_pengguna'] . "',
        email='" . $_POST['email'] . "',
        alamat='" . $_POST['alamat'] . "',
        no_hp='" . $_POST['no_hp'] . "',
        username='" . $_POST['username'] . "',
        password='" . $_POST['password'] . "',
        level='" . $_POST['level'] . "'
        WHERE id_pengguna='" . $_POST['id_pengguna'] . "'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);
    mysqli_close($koneksi);
    if ($query_ubah) {
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
              window.location = 'index2.php?page=MyApp/data_pengguna';
              }
            })</script>";
    }
  } else {
    if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
      if ($ukuran < 2097152) { // 2 mb = 2097152 byte
        $sql_ubah = "UPDATE tb_pengguna SET
        nama_pengguna='" . $_POST['nama_pengguna'] . "',
        email='" . $_POST['email'] . "',
        alamat='" . $_POST['alamat'] . "',
        no_hp='" . $_POST['no_hp'] . "',
        username='" . $_POST['username'] . "',
        password='" . $_POST['password'] . "',
        level='" . $_POST['level'] . "',
        foto_profile='" . $nama . "'
        WHERE id_pengguna='" . $_POST['id_pengguna'] . "'";
        $query_ubah = mysqli_query($koneksi, $sql_ubah);
        mysqli_close($koneksi);

        if ($query_ubah) {
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
              window.location = 'index2.php?page=MyApp/edit_pengguna&kode=$data_cek[id_pengguna]';
              }
            })</script>";
        }
      } else {
        echo "<script>
        Swal.fire({title: 'Ukuran File Tidak Boleh Lebih Dari 2 Mb',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {if (result.value){
          window.location = 'index2.php?page=MyApp/edit_pengguna&kode=$data_cek[id_pengguna]';
          }
        })</script>";
      }
    } else {
      echo "<script>
        Swal.fire({title: 'Ekstensi atau Format File Tidak Diperbolehkan',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {if (result.value){
          window.location = 'index2.php?page=MyApp/edit_pengguna&kode=$data_cek[id_pengguna]';
          }
        })</script>";
    }
  }
}
?>


<script type="text/javascript">
  function change() {
    var x = document.getElementById('pass').type;

    if (x == 'password') {
      document.getElementById('pass').type = 'text';
      document.getElementById('mybutton').innerHTML;
    } else {
      document.getElementById('pass').type = 'password';
      document.getElementById('mybutton').innerHTML;
    }
  }
</script>