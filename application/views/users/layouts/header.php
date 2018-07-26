
<!DOCTYPE html>
<html>
<head>
	
	<title>Sistem Pencarian Kelas JTI</title>

   <!-- Core CSS - Include with every page -->
   <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/js/jquery-ui/jquery-ui.css')?>">
	<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.js')?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.js')?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.js')?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-ui/jquery-ui.js')?>"></script>	

</head>
<body>
<?php if($this->session->userdata('logged_in')) : ?>
	<div class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="" class="navbar-brand">Sistem Informasi Pencarian Kelas </a>
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<div class="collapse navbar-collapse">				
				<ul class="nav navbar-nav navbar-right">
        <a class="dropdown-toggle" data-toggle="dropdown" role="button" href="#">Hy , <?php echo $nama_user ?> &nbsp&nbsp<span class="glyphicon glyphicon-user"></span></a></li>
    </ul>
			</div>
		</div>
	</div>
  <?php endif; ?>
  <!-- modal input -->
  <?php if($this->session->userdata('logged_in')) : ?>
	<div id="modalpesan" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Pesan Notification</h4>
				</div>
				<div class="modal-body">
				
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>						
				</div>
				Mail.com123
			</div>
		</div>
	</div>

	<div class="col-md-2">
		<div class="row">
			<div class="col-xs-6 col-md-12">
					<a class="thumbnail">
						<img class="img-responsive" src="<?php echo base_url('assets/logo.png')?>">
					</a>
				</div>
    </div>
    <?php endif; ?>
    <?php if($this->session->userdata('logged_in')) : ?>
		<div class="row"></div>
		<ul class="nav nav-pills nav-stacked">
			<li class="active"><a href="<?php echo site_url('user/index')?>"><span class="glyphicon glyphicon-home"></span> Home</a></li>			
			<li><a href="<?php echo site_url('user_jadwal/')?>"><span class="glyphicon glyphicon-list-alt"></span>  Jadwal</a></li>
			<li><a href="<?php echo site_url('user_pencarian/')?>"><span class="glyphicon glyphicon-search"></span>  Pencarian</a></li>      				
			<li><a href="<?php echo site_url('user/logout')?>"><span class="glyphicon glyphicon-log-out"></span>  Logout</a></li>			
		</ul>
  </div>
  <?php endif; ?>
	<div class="col-md-10">