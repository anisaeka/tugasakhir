<!-- Ruang/create_Ruang.php -->

<?php $this->load->view('layouts/header') ?>

<div class="container">
  <legend>Tambah Data Ruang</legend>
  <div class="col-xs-12 col-sm-12 col-md-12">
  <?php echo form_open('ruang/store'); ?>

    <div class="form-group">
      <label for="nama_ruang">Ruang</label>
      <input type="text" class="form-control" id="nama_ruang" name="nama_ruang" placeholder="Masukkan Nama Ruang">
    </div>

    <div class="form-group">
      <label for="jenis_ruang">Jenis Ruang</label>
      <input type="text" class="form-control" id="jenis_ruang" name="jenis_ruang" placeholder="Masukkan Jenis Ruang">
    </div>

    <div class="form-group">
      <label for="gedung">Gedung</label>
      <input type="text" class="form-control" id="gedung" name="gedung" placeholder="Masukkan Gedung">
    </div>

    <a class="btn btn-info" href="<?php echo site_url('ruang/') ?>">Kembali</a>
    <button type="submit" class="btn btn-primary">OK</button>
  <?php echo form_close() ?>
  </div>
</div>

<?php $this->load->view('layouts/footer') ?>