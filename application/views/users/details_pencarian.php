<?php $this->load->view('users/layouts/header') ?>
<?php if($this->session->userdata('logged_in')) : ?>
<div class="container">
  <legend>Details Ruang</legend>
  <div class="col-xs-12 col-sm-12 col-md-12">
  <?php echo form_open('search/show/'.$data->nama_ruang); ?>
    <?php echo form_hidden('id', $data->nama_ruang) ?>
    <div class="form-group">
      <label for="nama_ruang">Nama Ruang : </label>
      <?php echo $data->nama_ruang ?>
    </div>
    <div class="form-group">
      <label for="jenis_ruang">Jenis Ruang : </label>
      <?php echo $data->jenis_ruang ?>
    </div>
    <div class="form-group">
      <label for="gedung">Gedung : </label>
      <?php echo $data->gedung ?>
    </div>

    <a class="btn btn-info"  href = "javascript:history.back()" >Kembali</a>
   
  <?php echo form_close() ?>
  </div>
</div>
<?php endif; ?>
<?php $this->load->view('users/layouts/footer') ?>