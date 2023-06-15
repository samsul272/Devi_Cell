  <div class="card card-secondary">
    <div class="card-header">
      <h3 class="card-title"><i class="fa fa-file"></i> Laporan Kas Konter berdasarkan Periode Tanggal dan Jenis Pemasukan atau Pengeluaran</h3>
    </div>
    <form action="./report/kas_konter_jenis.php" method="post" enctype="multipart/form-data" target="_blank">
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
          <label class="col-sm-2 col-form-label">Jenis Data</label>
          <div class="col-sm-4">
            <select name="jenis" class="form-control text-center" required="required">
              <option value="semua">- Pilih -</option>
              <option value="Keluar">Pemasukan</option>
              <option value="Masuk">Pengeluaran</option>
            </select>
          </div>
        </div>

        <button type="submit" class="btn btn-info" name="btnJenis" target="_blank">Cetak Jenis Data</button>
    </form>
  </div>