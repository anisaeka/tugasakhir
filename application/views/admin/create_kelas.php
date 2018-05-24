<!-- kelas/create_kelas.php -->

<?php $this->load->view('layouts/header') ?>

<div class="container">
  <legend>Tambah Data Kelas</legend>
  <div class="col-xs-12 col-sm-12 col-md-12">
  <?php echo form_open('pegawai/store'); ?>

    <div class="form-group">
      <label for="nama_kelas">Kelas</label>
      <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" placeholder="Masukkan Nama Kelas">
    </div>

    <a class="btn btn-info" href="<?php echo site_url('kelas/') ?>">Kembali</a>
    <button type="submit" class="btn btn-primary">OK</button>
  <?php echo form_close() ?>
  </div>
</div>

<?php $this->load->view('layouts/footer') ?>