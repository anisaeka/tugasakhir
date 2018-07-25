<?php $this->load->view('layouts/header') ?>
<?php if($this->session->userdata('logged_in')) : ?>
<div class="container">

<?php echo form_open("Headline/search") ?>
<input class="form-control" type="text" name="search" value="" placeholder="Search...">
<input type="submit" class="btn btn-primary" value="Search">
<?php echo form_close() ?>
  <legend>Data Headline</legend>
  <div class="col-xs-12 col-sm-12 col-md-12">
  <?php if (isset($headline)) { ?>
    <table class="table table-striped">
      <thead>
        <th>Id</th>
        <th>Keterangan</th>
        <th>Image</th>
        <th>
          <a class="btn btn-primary" href="<?php echo site_url('headline/create') ?>">
            Tambah
          </a>
        </th>
      </thead>
      <tbody>
       <?php $number = 1; foreach($headline as $row) { ?>
        <tr>
          <td>
            <a href="<?php echo site_url('headline/show/'.$row->id) ?>">
              <?php echo $number++ ?>
            </a>
          </td>
          <td>
            <a href="<?php echo site_url('headline/show/'.$row->id) ?>">
              <?php echo $row->keterangan ?>
            </a>
          </td>
          <td>
          
          <img class="card-img-top" width="150" height="150" src="<?php echo base_url() .'./assets/image/'. $row->gambar ?>" alt="Card image cap">
            
          </td>
          
         
          
          <td>
            <?php echo form_open('headline/destroy/'.$row->id)  ?>
            <a class="btn btn-info" href="<?php echo site_url('headline/edit/'.$row->id) ?>">
              Ubah
            </a>
            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin?')">Hapus</button>
            <?php echo form_close() ?>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
    <?php echo (isset($links) ? $links : "") ?>
  <?php } else { ?>
  <div>Tidak ada data</div>
  <?php } ?>
  </div>
</div>
<?php endif; ?>
<?php $this->load->view('layouts/footer') ?>