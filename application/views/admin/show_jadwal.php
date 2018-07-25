<?php $this->load->view('layouts/header') ?>
<?php if($this->session->userdata('logged_in')) : ?>
<div class="container">
  <legend>Tambah Jadwal</legend>
  <div class="col-xs-12 col-sm-12 col-md-12">
  <?php echo form_open('jadwal/show/'.$data->id); ?>
    <?php echo form_hidden('id', $data->id) ?>
    <div class="form-group">
      <label for="mata_kuliah">Mata Kuliah : </label>
      <?php echo $data->mata_kuliah ?>
    </div>
    <div class="form-group">
      <label for="dosen">Dosen : </label>
     <?php echo $data->dosen ?>
    </div>
    <div class="form-group">
      <label for="hari">Hari : </label>
      <?php echo $data->hari ?>
    </div>
    <div class="form-group">
      <label for="jam">Jumlah Jam : </label>
      <?php echo $data->jam ?>
    </div>
    <div class="form-group">
      <label for="mulai_jam">Mulai Jam : </label>
      <?php echo $data->mulai_jam ?>
    </div>
    <div class="form-group">
      <label for="akhir_jam">Sampai Jam : </label>
     <?php echo $data->akhir_jam ?>
    </div>
    <div class="form-group">
      <label for="nama_ruang">Ruang Kelas : </label>
      <?php foreach($ruang as $key){ 
        if($key->nama_ruang == $data->nama_ruang){ 
            echo $key->nama_ruang ; 
        }
    }?>
    </div>
    <div class="form-group">
      <label for="kelas">Kelas : </label>
     <?php echo $data->kelas ?>
    </div>

    <a class="btn btn-info" href="<?php echo site_url('jadwal/') ?>">Kembali</a>
   
  <?php echo form_close() ?>
  </div>
</div>
<?php endif; ?>
<?php $this->load->view('layouts/footer') ?>