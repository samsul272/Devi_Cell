<section id="basic-horizontal-layouts">
  <div class="row match-height">
    <div class="col-md-6 col-12">
      <div class="card">
        <div class="card-header bg-warning">
          <h4 class="card-title">Cetak berdasarkan Kategori Tertentu</h4>
        </div>
        <div class="card-content">
          <div class="card-body">
            <form action="./report/kas_konter_kat.php" method="post" class="form form-horizontal">
              <div class="form-body">
                <div class="row">
                  <div class="col-md-4">
                    <label>Tanggal Mulai</label>
                  </div>
                  <div class="col-md-8 form-group">
                    <input type="date" class="form-control" id="tgl_1" name="tgl_1" required>
                  </div>
                  <div class="col-md-4">
                    <label>Tanggal Sampai</label>
                  </div>
                  <div class="col-md-8 form-group">
                    <input type="date" class="form-control" id="tgl_2" name="tgl_2" required>
                  </div>
                  <div class="col-md-4">
                    <label>Kategori</label>
                  </div>
                  <div class="col-md-8 form-group">
                    <select name="kategori" class="form-control" required="required">
                      <option value="" class="text-center">- Pilih -</option>
                      <?php
                      $kategori = mysqli_query($koneksi, "SELECT * FROM kategori ORDER BY kategori ASC");
                      while ($k = mysqli_fetch_array($kategori)) {
                      ?>
                        <option value="<?php echo $k['id_kategori']; ?>"><?php echo $k['kategori']; ?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>


                  <div class="col-12 d-flex justify-content-end">
                    <button type="submit" name="btnKat" target="_blank" class="btn btn-warning me-1 mb-1">Cetak Kategori</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-6 col-12">
      <div class="card">
        <div class="card-header bg-primary">
          <h4 class="card-title">Cetak Pemasukan or Pengeluaran</h4>
        </div>
        <div class="card-content">
          <div class="card-body">
            <form action="./report/kas_konter_jenis.php" method="post" class="form form-horizontal">
              <div class="form-body">
                <div class="row">
                  <div class="col-md-4">
                    <label>Tanggal Mulai</label>
                  </div>
                  <div class="col-md-8 form-group">
                    <input type="date" class="form-control" id="tgl_1" name="tgl_1" required>
                  </div>
                  <div class="col-md-4">
                    <label>Tanggal Sampai</label>
                  </div>
                  <div class="col-md-8 form-group">
                    <input type="date" class="form-control" id="tgl_2" name="tgl_2" required>
                  </div>
                  <div class="col-md-4">
                    <label>Jenis Data</label>
                  </div>
                  <div class="col-md-8 form-group">
                    <select name="jenis" class="form-control" required="required">
                      <option value="">- Pilih Jenis Data -</option>
                      <option value="Masuk">Pemasukan</option>
                      <option value="Keluar">Pengeluaran</option>
                    </select>
                  </div>

                  <div class="col-sm-12 d-flex justify-content-end">
                    <button type="submit" name="btnJenis" target="_blank" class="btn btn-primary me-1 mb-1">Cetak Periode</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="basic-horizontal-layouts">
  <div class="row match-height">
    <div class="col-md-6 col-12">
      <div class="card">
        <div class="card-header bg-light">
          <h4 class="card-title">Cetak Periode/ Tanggal tertentu</h4>
        </div>
        <div class="card-content">
          <div class="card-body">
            <form action="./report/kas_konter_per.php" method="post" class="form form-horizontal">
              <div class="form-body">
                <div class="row">
                  <div class="col-md-4">
                    <label>Tanggal Mulai</label>
                  </div>
                  <div class="col-md-8 form-group">
                    <input type="date" class="form-control" id="tgl_1" name="tgl_1" required>
                  </div>
                  <div class="col-md-4">
                    <label>Tanggal Sampai</label>
                  </div>
                  <div class="col-md-8 form-group">
                    <input type="date" class="form-control" id="tgl_2" name="tgl_2" required>
                  </div>
                  <div class="col-sm-12 d-flex justify-content-end">
                    <button type="submit" name="btnCetak" target="_blank" class="btn btn-primary me-1 mb-1">Cetak Periode</button>
                    <a href="./report/kas_konter_full.php" class="btn btn-danger me-1 mb-1 ml-1" target="_blank"><i class="fa fa-print"></i> Cetak Semua</a>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>