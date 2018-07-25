<?php $this->load->view('layouts/header') ?>
<?php if($this->session->userdata('logged_in')) : ?>
<div class="container">
  <legend>Edit Kelas</legend>
  <div class="col-xs-12 col-sm-12 col-md-12">
  <?php echo form_open('kelas/update/'.$data->id); ?>
    <?php echo form_hidden('id', $data->id) ?>
    <div class="form-group">
      <label for="kelas">Kelas</label>
      <input type="text" class="form-control" id="kelas" name="kelas" placeholder="Masukkan Kelas" value="<?php echo $data->kelas ?>">
    </div>

    <a class="btn btn-info" href="<?php echo site_url('kelas/') ?>">Kembali</a>
    <button type="submit" class="btn btn-primary">OK</button>
  <?php echo form_close() ?>
  </div>
</div>
<?php endif; ?>
<?php $this->load->view('layouts/footer') ?>