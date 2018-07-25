<!-- Ruang/create_Ruang.php -->
<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!-- Begin page content -->
<?php $this->load->view('layouts/header') ?>
<?php if($this->session->userdata('logged_in')) : ?>
<div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tbody>
                                      <?php echo (isset($message))? : "";?>
                                      <?php    
                                        $this->form_validation->set_error_delimiters('<div class="alert alert-warning" role="alert">', '</div>');
                                      ?>
                                      <?php echo validation_errors(); ?>
                                      <?php echo form_open('headline/create', array('enctype'=>'multipart/form-data')); ?>
                                            
                                      <div class="form-group">
                                       <label for="keterangan">Keterangan</label>
                                      <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Masukkan Keterangan Gambar">
                                                 </div>
                                            
                                            <tr>
                                              <th>Poster / Gambar</th>
                                              <td>
                                              <div class="form-group">
                                              <input class="form-control" value="<?php echo set_value('gambar') ?>" type="file" name="gambar">
                                              </div>
                                              </td>
                                            </tr>
                                           
                                              <td colspan="3"><button class="btn btn-default"><input type="submit" name="submit" value="Simpan"></button></td>
                                            </tr>
                                      </form>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
      </div>
      <?php endif; ?>
<?php $this->load->view('layouts/footer') ?>