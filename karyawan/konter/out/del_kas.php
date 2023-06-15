<?php
if ($data_level == "Karyawan") {
    if (isset($_GET['kode'])) {
        $sql_hapus = "DELETE FROM transaksi WHERE id_transaksi='" . $_GET['kode'] . "'";
        $query_hapus = mysqli_query($koneksi, $sql_hapus);

        if ($query_hapus) {
            echo "<script>
                Swal.fire({title: 'Hapus Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.value) {
                        window.location = 'index.php?page=o_data_kmk';
                    }
                })</script>";
        } else {
            echo "<script>
                Swal.fire({title: 'Hapus Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.value) {
                        window.location = 'index.php?page=o_data_kmk';
                    }
                })</script>";
        }
    }

    if (empty($_POST['pilih'])) {
?>
        <script language="JavaScript">
            alert('Oops! Data tidak terpilih...');
            document.location = 'index.php?page=o_data_kmk';
        </script>
<?php
    } else {
        $id  = $_POST['pilih'];
        $jml_pilih = count($id);

        for ($x = 0; $x < $jml_pilih; $x++) {
            $sql_hapus = "DELETE FROM transaksi WHERE id_transaksi='$id[$x]'";
            $query_hapus = mysqli_query($koneksi, $sql_hapus);
        }
        if ($query_hapus) {
            echo "<script>
            Swal.fire({title: 'Hapus Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
            }).then((result) => {
                if (result.value) {
                    window.location = 'index.php?page=i_data_kmk';
                }
            })</script>";
        } else {
            echo "Oops! Error 404...";
        }
    }
}
?>