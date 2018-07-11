<?php $this->load->view('layouts/header') ?>

<div class="container">
  <legend>User Details</legend>
  <div class="col-xs-12 col-sm-12 col-md-12">
  <?php echo form_open('user_admin/show/'.$data->user_id); ?>
    <?php echo form_hidden('user_id', $data->user_id) ?>
    <div class="form-group">
      <label for="nama">Nama  : </label>
      <?php echo $data->nama ?>
    </div>
    <div class="form-group">
      <label for="nim">NIM : </label>
     <?php echo $data->nim ?>
    </div>
    <div class="form-group">
      <label for="email">E-mail : </label>
      <?php echo $data->email ?>
    </div>
    <div class="form-group">
      <label for="username">Username : </label>
      <?php echo $data->username ?>
    </div>
    <div class="form-group">
      <label for="password">password : </label>
      <?php echo $data->password ?>
    </div>
    <div class="form-group">
      <label for="register_date">Register Date : </label>
     <?php echo $data->register_date ?>
    </div>
    <div class="form-group">
      <label for="level_id">Status : </label>
      <?php foreach($user_level as $key){ 
        if($key->level_id == $data->fk_level_id){ 
            echo $key->nama_level ; 
        }
    }?>
    </div>

    <a class="btn btn-info" href="<?php echo site_url('user_admin/') ?>">Kembali</a>
   
  <?php echo form_close() ?>
  </div>
</div>

<?php $this->load->view('layouts/footer') ?>