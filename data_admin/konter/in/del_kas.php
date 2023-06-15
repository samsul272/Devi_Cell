<?php
if ($data_level == "Administrator") {
    if (isset($_GET['kode'])) {
        $sql_hapus = "DELETE FROM transaksi WHERE id_transaksi='" . $_GET['kode'] . "'";
        $query_hapus = mysqli_query($koneksi, $sql_hapus);

        if ($query_hapus) {
            echo "<script>
                Swal.fire({title: 'Hapus Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.value) {
                        window.location = 'index2.php?page=i_data_km';
                    }
                })</script>";
        } else {
            echo "<script>
                Swal.fire({title: 'Hapus Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.value) {
                        window.location = 'index2.php?page=i_data_km';
                    }
                })</script>";
        }
    }

    if (empty($_POST['pilih'])) {
?>
        <script language="JavaScript">
            alert('Oops! Data tidak terpilih...');
            document.location = 'index2.php?page=i_data_km';
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
        ?>
            <?php echo "<script>
                Swal.fire({title: 'Hapus Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.value) {
                        window.location = 'index2.php?page=i_data_km';
                    }
                })</script>";
            ?>
<?php
        } else {
            echo "Oops! Error 404...";
        }
    }
}
?>