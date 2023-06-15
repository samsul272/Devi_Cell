  <div class="card card-secondary">
    <div class="card-header">
      <h3 class="card-title"><i class="fa fa-file"></i> Laporan Kas Konter berdasarkan Periode Tanggal dan Kategori</h3>
    </div>
    <form action="./report/kas_konter_kat.php" method="post" enctype="multipart/form-data" target="_blank">
      <div class="card-body">
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Tanggal Awal</label>
          <div class="col-sm-4">
            <input type="date" class="form-control" id="tgl_1" name="tgl_1">
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Tanggal Akhir</label>
          <div class="col-sm-4">
            <input type="date" class="form-control" id="tgl_2" name="tgl_2">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Kategori</label>
          <div class="col-sm-4">
            <select name="kategori" class="form-control" required="required">
              <option value="semua">- Semua Kategori -</option>
              <?php
              $kategori = mysqli_query($koneksi, "SELECT * FROM kategori");
              while ($k = mysqli_fetch_array($kategori)) {
              ?>
                <option <?php if (isset($_GET['kategori'])) {
                          if ($_GET['kategori'] == $k['id_kategori']) {
                            echo "selected='selected'";
                          }
                        } ?> value="<?php echo $k['id_kategori']; ?>"><?php echo $k['kategori']; ?></option>
              <?php
              }
              ?>
            </select>
          </div>
        </div>


        <button type="submit" class="btn btn-info" name="btnKategori" target="_blank">Cetak Kategori</button>
        <a href="./report/kas_konter_full.php" class="btn btn-primary" target="_blank">Cetak Semua</a>

    </form>
  </div>