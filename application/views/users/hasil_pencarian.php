<?php $this->load->view('users/layouts/header') ?>
<?php if($this->session->userdata('logged_in')) : ?>
<div class="container">


  <legend>Data Ruang Yang Tersedia</legend>
  <div class="col-xs-12 col-sm-12 col-md-12">
  <?php if (isset($ruang)) { ?>
    <table class="table table-striped">
      <thead>
        <th>No</th>
        <th>Nama Ruang</th>
        
        <th>
         
        </th>
      </thead>
      <tbody>
        <?php $number = 1; foreach($ruang as $row) { ?>
        <tr>
          <td>
            <a href="<?php echo site_url('search/show/'.$row->nama_ruang) ?>">
              <?php echo $number++ ?>
            </a>
          </td>
          <td>
            <a href="<?php echo site_url('search/show/'.$row->nama_ruang) ?>">
              <?php echo $row->nama_ruang ?>
            </a>
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
<?php $this->load->view('users/layouts/footer') ?>