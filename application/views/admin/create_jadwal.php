<?php $this->load->view('layouts/header') ?>
<?php if($this->session->userdata('logged_in')) : ?>
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
      <input type="text" class="form-control" id="mulai_jam" name="mulai_jam" placeholder="Masukkan Jam Mulai">
    </div><div class="form-group">
      <label for="akhir_jam">Sampai Jam</label>
      <input type="text" class="form-control" id="akhir_jam" name="akhir_jam" placeholder="Masukkan Jam Berakhirnya ">
      <div class="form-group">
      <label for="nama_ruang">Ruang Kelas</label>
      <select name="nama_ruang" class="form-control" required>
      <option selected> pilih ruang kelas </option>
      <?php foreach($ruang as $key){ ?>
      <option value="<?php echo $key->nama_ruang ;?>">  <?php echo $key->nama_ruang ; ?></option>
      <?php } ?>
      </select>
    </div>
    <div class="form-group">
      <label for="kelas">Kelas</label>
      <input type="text" class="form-control" id="kelas" name="kelas" placeholder="Masukkan Kelas">
    </div>

    <a class="btn btn-info" href="<?php echo site_url('jadwal/') ?>">Kembali</a>
    <button type="submit" class="btn btn-primary">OK</button>
  <?php echo form_close() ?>
  </div>
</div>
<?php endif; ?>
<?php $this->load->view('layouts/footer') ?>