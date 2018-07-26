<?php $this->load->view('users/layouts/header') ?>
<?php if($this->session->userdata('logged_in')) : ?>

<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
    </ol>
    
    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
      <center> <img src="<?php echo base_url('assets/image/header.jpg')?>" style="width:100%" alt="Image"></center>
        <div class="carousel-caption">
          
        </div>      
      </div>
      <?php foreach ($gambar as $key) { ?>
      <div class="item">
      <center><img src="<?php echo base_url() .'assets/image/'. $key->gambar ?>" style="width:50%" height="35%" alt="Image"></center>
        <div class="carousel-caption">
          
        </div>      
      </div>
    </div>


    <?php } ?>

    <!-- Left and right controls -->
   
</div>
<!--<div class="container text-center">    
  <h3>What We Do</h3><br>
  <div class="row">
    <div class="col-sm-4">
      <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
      <p>Current Project</p>
    </div>
    <div class="col-sm-4"> 
      <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
      <p>Project 2</p>    
    </div>
    <div class="col-sm-4">
      <div class="well">
       <p>Some text..</p>
      </div>
      <div class="well">
       <p>Some text..</p>
      </div>
    </div>-->
  </div>
</div>

<?php endif; ?>
<br>
  <?php $this->load->view('users/layouts/footer') ?>
</br>