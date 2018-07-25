<?php $this->load->view('users/layouts/header') ?>
<?php if($this->session->userdata('logged_in')) : ?>
<div class="container">
<?php echo form_open() ?>
<input class="form-control" type="text" name="search" value="" placeholder="Search...">
<input type="submit" class="btn btn-primary" href="<?php echo site_url('jadwal/search') ?>" value="Go">
<?php echo form_close() ?>
  <legend>Data Jadwal</legend>
  <div class="col-xs-12 col-sm-12 col-md-12">
  <?php if ($jadwal) { ?>
    <table class="table table-striped">
      <thead>
        <th>No</th>
        <th>Mata Kuliah</th>
        <th>Dosen</th>
        <th>Hari</th>
        <th>Jumlah Jam</th>
        <th>Jam Mulai</th>
        <th>Jam Berakhir</th>
        <th>Nama Ruang</th>
        <th>Kelas</th>


        <th>
        <a class="glyphicon glyphicon-print" href="<?php echo site_url('Reporting/print/'.$this->input->post("search")) ?>">
           Reporting
        </a>
        </th>

    <!--    <th>
          <a class="btn btn-primary" href="<?php echo site_url('jadwal/create') ?>">
            Tambah
          </a>
        </th> -->
      </thead>
      <tbody>
        <?php $number = 1; foreach($jadwal as $row) { ?>
        <tr>
          <td>
            <a href="<?php echo site_url('jadwal/show/'.$row->id) ?>">
              <?php echo $number++ ?>
            </a>
          </td>
          <td>
            <a href="<?php echo site_url('jadwal/show/'.$row->id) ?>">
              <?php echo $row->mata_kuliah ?>
            </a>
          </td>
          <td>
            <a href="<?php echo site_url('jadwal/show/'.$row->id) ?>">
              <?php echo $row->dosen ?>
            </a>
          </td>
          <td>
            <a href="<?php echo site_url('jadwal/show/'.$row->id) ?>">
              <?php echo $row->hari ?>
            </a>
          </td>
          <td>
            <a href="<?php echo site_url('jadwal/show/'.$row->id) ?>">
              <?php echo $row->jam ?>
            </a>
          </td>
          <td>
            <a href="<?php echo site_url('jadwal/show/'.$row->id) ?>">
              <?php echo $row->mulai_jam ?>
            </a>
          </td>
          <td>
            <a href="<?php echo site_url('jadwal/show/'.$row->id) ?>">
              <?php echo $row->akhir_jam ?>
            </a>
          </td>
          <td>
            <a href="<?php echo site_url('jadwal/show/'.$row->id) ?>">
              <?php echo $row->nama_ruang ?>
            </a>
          </td>
          <td>
            <a href="<?php echo site_url('jadwal/show/'.$row->id) ?>">
              <?php echo $row->kelas ?>
            </a>
          </td>
          
          <td>
            <?php echo form_open('jadwal/destroy/'.$row->id)  ?>
            <a class="btn btn-info" href="<?php echo site_url('jadwal/edit/'.$row->id) ?>">
              Ubah
            </a>
            <!--<button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin?')">Hapus</button>
            <?php echo form_close() ?> -->
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
    <?php echo $links ?>
  <?php } else { ?>
  <div>Tidak ada data</div>
  <?php } ?>
  </div>
</div>

<?php endif; ?>
<?php $this->load->view('users/layouts/footer') ?>