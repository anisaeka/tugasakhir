<?php $this->load->view('layouts/header') ?>
<?php if($this->session->userdata('logged_in')) : ?>
<div class="container">

<?php echo form_open("Ruang/search")?>
<input class="form-control" type="text" name="search" value="" placeholder="Search...">
<input type="submit"  class="btn btn-primary" value="Search">

<a href="<?php echo site_url("/ruang/"); ?>" class="btn btn-primary">Show All</a>
<?php echo form_close() ?>
  <legend>Data Ruang</legend>
  <div class="col-xs-12 col-sm-12 col-md-12">
  <?php if (isset($ruang)) { ?>
    <table class="table table-striped">
      <thead>
        <th>No</th>
        <th>Nama Ruang</th>
        <th>Jenis Ruang</th>
        <th>Gedung</th>
        <th>
          <a class="btn btn-primary" href="<?php echo site_url('ruang/create') ?>">
            Tambah
          </a>
        </th>
      </thead>
      <tbody>
        <?php $number = 1; foreach($ruang as $row) { ?>
        <tr>
          <td>
            <a href="<?php echo site_url('ruang/show/'.$row->nama_ruang) ?>">
              <?php echo $number++ ?>
            </a>
          </td>
          <td>
            <a href="<?php echo site_url('ruang/show/'.$row->nama_ruang) ?>">
              <?php echo $row->nama_ruang ?>
            </a>
          </td>
          <td>
            <a href="<?php echo site_url('ruang/show/'.$row->nama_ruang) ?>">
              <?php echo $row->jenis_ruang ?>
            </a>
          </td>
          <td>
            <a href="<?php echo site_url('ruang/show/'.$row->nama_ruang) ?>">
              <?php echo $row->gedung ?>
            </a>
          </td>
         
          
          <td>
            <?php echo form_open('ruang/destroy/'.$row->nama_ruang)  ?>
            <a class="btn btn-info" href="<?php echo site_url('ruang/edit/'.$row->nama_ruang) ?>">
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