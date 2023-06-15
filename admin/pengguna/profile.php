<?php
$data_id = $_SESSION["ses_id"];
$sql = mysqli_query($koneksi, "SELECT * FROM tb_pengguna where id_pengguna='$data_id'");
while ($data = mysqli_fetch_array($sql)) {
?>
    <div class="container bg-white p-3" style="border-radius: 10px;">
        <div class="row">
            <div class="col-md-5 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-3"><img class="rounded mt-3" width="300px" src="dist/img/profile/<?php echo $data["foto_profile"]; ?>">
                    <span class="font-weight-bold"><?php echo $data['username']; ?></span><span class="text-black-50"><?php echo $data["email"]; ?></span><span> </span>
                </div>
            </div>

            <div class="col-md-6">
                <div class="p-4 px-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile <?php echo $data['level']; ?></h4>
                    </div>


                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="row mt-3">
                            <input type='hidden' class="form-control" name="id_pengguna" value="<?php echo $data['id_pengguna']; ?>" readonly />
                            <div class="col-md-12"><label class="labels">Nama Pengguna</label><input type="text" name="nama_pengguna" class="form-control" value="<?php echo $data['nama_pengguna']; ?>"></div>
                            <div class="col-md-12"><label class="labels">Alamat Email</label><input type="email" name="email" class="form-control" value="<?php echo $data['email']; ?>"></div>
                            <div class="col-md-12"><label class="labels">Alamat Pengguna</label><input type="text" disabled name="alamat" class="form-control" value="<?php echo $data['alamat']; ?>"></div>
                            <div class="col-md-12"><label class="labels">Nomor Handphone</label><input type="number" class="form-control" id="no_hp" name="no_hp" value="<?php echo $data['no_hp']; ?>" /></div>
                            <div class="col-md-12"><label class="labels">username</label><input type="text" name="username" class="form-control" value="<?php echo $data['username']; ?>"></div>
                            <div class="col-md-12"><label class="labels">Password</label><input type="password" name="password" class="form-control" value="<?php echo $data['password']; ?>"></div>


                            <div class="col-md-12">
                                <label class="labels">Level Anda</label>
                                <select name="level" id="level" class="form-control" disabled readonly>
                                    <option value="">-- Pilih Level --</option>
                                    <?php
                                    //menhecek data yg dipilih sebelumnya
                                    if ($data['level'] == "Administrator") echo "<option value='Administrator' selected>Administrator</option>";
                                    else echo "<option value='Administrator'>Administrator</option>";

                                    if ($data['level'] == "Karyawan") echo "<option value='Karyawan' selected>Karyawan</option>";
                                    else echo "<option value='Karyawan'>Karyawan</option>";
                                    ?>
                                </select>
                            </div>

                            <div class="col-md-12">
                                <label class="labels">Rubah Foto Profile</label>
                                <input type="file" name="foto" class="form-control">
                                <!-- <small><?php echo $data['foto_profile'] ?></small> -->
                                <p class="help-block">&nbsp;Bila File <?php echo "<a class='fancybox btn btn-xs btn-primary' target=_blank href='dist/img/profile/$data[foto_profile]'>$data[foto_profile]</a>"; ?> tidak dirubah kosongkan saja</p>
                            </div>
                        </div>

                        <div class="text-center mt-3">
                            <input type="submit" name="Ubah" value="Edit Profile" class="btn btn-success">

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php
} ?>

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
        no_hp='" . $_POST['no_hp'] . "',
        username='" . $_POST['username'] . "',
        password='" . $_POST['password'] . "'
        WHERE id_pengguna='" . $_POST['id_pengguna'] . "'";
        $query_ubah = mysqli_query($koneksi, $sql_ubah);
        mysqli_close($koneksi);
        if ($query_ubah) {
            echo "<script>
            Swal.fire({title: 'Edit Data Profile Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
            }).then((result) => {if (result.value){
              window.location = 'index2.php?page=MyApp/profile';
              }
            })</script>";
        } else {
            echo "<script>
            Swal.fire({title: 'Edit Data Profile Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
            }).then((result) => {if (result.value){
              window.location = 'index2.php?page=MyApp/profile';
              }
            })</script>";
        }
    } else {
        if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
            if ($ukuran < 2097152) { // 2 mb = 2097152 byte
                $sql_ubah = "UPDATE tb_pengguna SET
        nama_pengguna='" . $_POST['nama_pengguna'] . "',
        email='" . $_POST['email'] . "',
        no_hp='" . $_POST['no_hp'] . "',
        username='" . $_POST['username'] . "',
        password='" . $_POST['password'] . "',
        foto_profile='" . $nama . "'
        WHERE id_pengguna='" . $_POST['id_pengguna'] . "'";
                $query_ubah = mysqli_query($koneksi, $sql_ubah);
                mysqli_close($koneksi);

                if ($query_ubah) {
                    echo "<script>
            Swal.fire({title: 'Edit Data Profile Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
            }).then((result) => {if (result.value){
              window.location = 'index2.php?page=MyApp/profile';
              }
            })</script>";
                } else {
                    echo "<script>
            Swal.fire({title: 'Edit Data Profile Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
            }).then((result) => {if (result.value){
              window.location = 'index2.php?page=MyApp/profile&kode=$data[id_pengguna]';
              }
            })</script>";
                }
            } else {
                echo "<script>
        Swal.fire({title: 'Ukuran File Tidak Boleh Lebih Dari 2 Mb',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {if (result.value){
          window.location = 'index2.php?page=MyApp/profile&kode=$data[id_pengguna]';
          }
        })</script>";
            }
        } else {
            echo "<script>
        Swal.fire({title: 'Ekstensi atau Format File Tidak Diperbolehkan',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {if (result.value){
          window.location = 'index2.php?page=MyApp/profile&kode=$data[id_pengguna]';
          }
        })</script>";
        }
    }
}
?>