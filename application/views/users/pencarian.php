<?php $this->load->view('users/layouts/header') ?>

<div class="container">

<legend>Pencarian</legend>
<div class="col-xs-12 col-sm-12 col-md-12">

<!-- Form Elements -->
<div class="panel panel-default">
<div class="panel-heading">
Pencarian Kelas JTI
</div>
<div class="panel-body">
<div class="row">
<div class="col-lg-6">
<form role="form" method="post">
<div class="form-group">
<label>Masukkan Hari</label>
<select name="hari" class="form-control">
<option value="senin">Senin</option>
<option value="selasa">Selasa</option>
<option value="rabu">Rabu</option>
<option value="kamis">Kamis</option>
<option value="jumat">Jumat</option>
<option value="sabtu">Sabtu</option>
<option value="minggu">Minggu</option>
</select>
</div>



<div class="form-group">
<label>Jam</label>
<input type="number" min="1" max="12" class="form-control" id="jam" name="jam_awal" placeholder="jam">
</div>

<div class="form-group">
<label>Sampai Jam</label>
<input type="number" min="1" max="12" class="form-control" id="jam" name="jam_akhir" placeholder="jam">
</div>
<center>
<button type="submit" class="btn btn-primary">Search</button>


<button type="reset" class="btn btn-success">Cancel</button>
</center>
</div>
<?php echo (isset($hasil) ? $hasil : "") ?>
</div>
</div>
<?php $this->load->view('users/layouts/footer') ?>