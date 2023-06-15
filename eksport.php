<?php
session_start();
if (isset($_SESSION["ses_username"]) == "") {
    header("location: login");
} else {
    $data_id = $_SESSION["ses_id"];
    $data_nama = $_SESSION["ses_nama"];
    $data_user = $_SESSION["ses_username"];
    $data_level = $_SESSION["ses_level"];
}
//import koneksi ke database
include './inc/koneksi.php';
include './inc/rupiah.php';
include './inc/enk.php'
?>
<?php
if ($data_level == "Administrator") {
?>
    <html>

    <head>
        <title>Keuangan Devi Cell</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    </head>

    <body>
        <div class="container">
            <h2>Data Keuangan Konter Pulsa Devi Cell</h2>
            <h4>Desa Patila, Dusun Tulung Rejo</h4>

            <div>
                <a href="index2.php?page=rekap_km" class="btn btn-primary">
                    <i class="fa fa-plus"></i> &nbsp;Kembali</a>
            </div>
            <div class="data-tables datatable-dark">

                <!-- Masukkan table nya disini, dimulai dari tag TABLE -->
                <div class="table-responsive">
                    <table id="mauexport" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="15">No</th>
                                <th>Tanggal</th>
                                <th>Kategori</th>
                                <th>Pemasukan</th>
                                <th>Pengeluaran</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $no = 1;
                            $sql = $koneksi->query("SELECT * FROM transaksi,kategori where id_kategori=uraian order by id_transaksi desc");
                            while ($data = $sql->fetch_assoc()) {
                            ?>

                                <tr>
                                    <td>
                                        <?php echo $no++; ?>
                                    </td>
                                    <td>
                                        <?php $tgl = $data['tgl_transaksi'];
                                        echo date("d/M/Y", strtotime($tgl)) ?>
                                    </td>
                                    <td>
                                        <?php echo $data['kategori']; ?>
                                    </td>

                                    <td align="right">
                                        <?php echo rupiah($data['masuk']); ?>
                                    </td>
                                    <td align="right">
                                        <?php echo rupiah($data['keluar']); ?>
                                    </td>
                                </tr>

                            <?php
                            }
                            ?>
                        </tbody>
                        </tfoot>
                    </table>
                </div>

            </div>
        </div>

    <?php } ?>

    <script>
        $(document).ready(function() {
            $('#mauexport').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'excel', 'pdf'
                ]
            });
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>



    </body>

    </html>