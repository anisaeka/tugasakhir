
<?php if($this->session->userdata('logged_in')) : ?>
<div class="container">



  <legend>Data Jadwal</legend>
  <div class="col-xs-12 col-sm-12 col-md-12">
  
    <table class="table table-striped">
      <thead>
        <th>No</th>
        <th>nama ruang</th>
        
        

      </thead>
      <tbody>
        <?php $number = 1; foreach($ruang as $row) { ?>
        <tr>
          <td>
           
              <?php echo $number++ ?>
            </a>
          </td>
          
          <td>
            
              <?php echo $row->nama_ruang ?>
            </a>
          </td>
          
          
          
        </tr>
        <?php } ?>
      </tbody>
    </table>
  
  </div>
</div>
<?php endif; ?>