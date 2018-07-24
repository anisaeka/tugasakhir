<?php $this->load->view('layouts/header') ?>

<div class="container">

<?php echo form_open("User_admin/search")?>
<input class="form-control" type="text" name="search" value="" placeholder="Search...">
<input type="submit" class="btn btn-primary" value="Search">
  <legend>Data user</legend>
  <div class="col-xs-12 col-sm-12 col-md-12">
  <?php if (isset($user)) { ?>
    <table class="table table-striped">
      <thead>
        <th>No</th>
        <th>Nama</th>
        <th>Nim</th>
        <th>Email</th>
        <th>Username</th>
        <th>Password</th>
        <th>Tanggal Pendaftaran</th>
        <th>Status</th>
      
        <th>
          <a class="btn btn-primary" href="<?php echo site_url('user_admin/create') ?>">
            Tambah
          </a>
        </th>
      </thead>
      <tbody>
        <?php $number = 1; foreach($user as $row) { ?>
        <tr>
          <td>
            <a href="<?php echo site_url('user_admin/show/'.$row->user_id) ?>">
              <?php echo $number++ ?>
            </a>
          </td>
          <td>
            <a href="<?php echo site_url('user_admin/show/'.$row->user_id) ?>">
              <?php echo $row->nama ?>
            </a>
          </td>
          <td>
            <a href="<?php echo site_url('user_admin/show/'.$row->user_id) ?>">
              <?php echo $row->nim ?>
            </a>
          </td>
          <td>
            <a href="<?php echo site_url('user_admin/show/'.$row->user_id) ?>">
              <?php echo $row->email ?>
            </a>
          </td>
          <td>
            <a href="<?php echo site_url('user_admin/show/'.$row->user_id) ?>">
              <?php echo $row->username ?>
            </a>
          </td>
          <td>
            <a href="<?php echo site_url('user_admin/show/'.$row->user_id) ?>">
              <?php echo $row->password ?>
            </a>
          </td>
          <td>
            <a href="<?php echo site_url('user_admin/show/'.$row->user_id) ?>">
              <?php echo $row->register_date ?>
            </a>
          </td>
          <td>
            <a href="<?php echo site_url('user_admin/show/'.$row->user_id) ?>">
              <?php foreach($user_level as $key){ 
        if($key->level_id == $row->fk_level_id){
          echo $key->nama_level;
        }

        }?>
            </a>
          </td>
          
          <td>
            <?php echo form_open('user_admin/destroy/'.$row->user_id)  ?>
            <a class="btn btn-info" href="<?php echo site_url('user_admin/edit/'.$row->user_id) ?>">
              Ubah
            </a>
            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin?')">Hapus</button>
            <?php echo form_close() ?>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
    <?php echo $links ?>
  <?php } else { ?>
  <div>User tidak ada data</div>
  <?php } ?>
  </div>
</div>

<?php $this->load->view('layouts/footer') ?>