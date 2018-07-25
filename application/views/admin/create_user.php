<?php $this->load->view('layouts/header') ?>
<?php if($this->session->userdata('logged_in')) : ?>
<div class="container">
  <legend>Tambah user_admin</legend>
  <div class="col-xs-12 col-sm-12 col-md-12">
  <?php echo form_open('user_admin/store'); ?>

    <div class="form-group">
      <label for="nama">Nama</label>
      <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama">
    </div>
    <div class="form-group">
      <label for="nim">Nim</label>
      <input type="text" class="form-control" id="nim" name="nim" placeholder="Masukkan nim">
    </div>
    <div class="form-group">
      <label for="email">E-mail</label>
      <input type="text" class="form-control" id="email" name="email" placeholder="Masukkan email">
    </div>
    <div class="form-group">
      <label for="username">Username</label>
      <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username">
    </div><div class="form-group">
      <label for="password">Password</label>
      <input type="text" class="form-control" id="password" name="password" placeholder="Masukkan Password">
    </div><div class="form-group">
    <div class="form-group">
      <label>Konfirmasi Password</label>
      <input type="password" class="form-control" name="password2" placeholder="Ulangi Password">
    <div class="form-group">
      <label for="level_id">Status User</label>
      <select name="level_id" class="form-control" required>
      <option selected> pilih status user </option>
      <?php foreach($user_level as $key){ ?>
      <option value="<?php echo $key->level_id ;?>">  <?php echo $key->nama_level ; ?></option>
      <?php } ?>
      </select>
    </div>

    <a class="btn btn-info" href="<?php echo site_url('user_admin/') ?>">Kembali</a>
    <button type="submit" class="btn btn-primary">OK</button>
  <?php echo form_close() ?>
  </div>
</div>
<?php endif; ?>
<?php $this->load->view('layouts/footer') ?>