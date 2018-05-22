<?php $this->load->view('layouts/header') ?>

<div class="container">
  <legend>Tambah Jadwal</legend>
  <div class="col-xs-12 col-sm-12 col-md-12">
  <?php echo form_open('jadwal/store'); ?>

    <div class="form-group">
      <label for="mata_kuliah">Mata Kuliah</label>
      <input type="text" class="form-control" id="mata_kuliah" name="mata_kuliah" placeholder="Masukkan Mata Kuliah">
    </div>
    <div class="form-group">
      <label for="dosen">Dosen</label>
      <input type="text" class="form-control" id="dosen" name="dosen" placeholder="Masukkan Nama Dosen">
    </div>
    <div class="form-group">
      <label for="hari">Hari</label>
      <input type="text" class="form-control" id="hari" name="hari" placeholder="Masukkan Hari">
    </div>
    <div class="form-group">
      <label for="jam">Jumlah Jam</label>
      <input type="text" class="form-control" id="jam" name="jam" placeholder="Masukkan Jumlah Jam">
    </div><div class="form-group">
      <label for="mulai_jam">Mulai Jam</label>
      <input type="time" class="form-control" id="mulai_jam" name="mulai_jam" placeholder="Masukkan Jam Mulai">
    </div><div class="form-group">
      <label for="akhir_jam">Sampai Jam</label>
      <input type="time" class="form-control" id="akhir_jam" name="akhir_jam" placeholder="Masukkan Jam Berakhirnya ">
    <div class="form-group">
      <label for="nama_ruang">Ruang</label>
      <select name="nama_ruang" class="form-control" required>
      <option> pilih Ruang </option>
      <option> asf </option>
      </select>
    </div>
    <div class="form-group">
      <label for="kelas">Kelas</label>
      <input type="text" class="form-control" id="kelas" name="kelas" placeholder="Masukkan Kelas">
    </div>

    <a class="btn btn-info" href="<?php echo site_url('jabatan/') ?>">Kembali</a>
    <button type="submit" class="btn btn-primary">OK</button>
  <?php echo form_close() ?>
  </div>
</div>

<?php $this->load->view('layouts/footer') ?>