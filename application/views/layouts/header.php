
<!DOCTYPE html>
<html>
<head>
	
	<title>Admin JTI</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/js/jquery-ui/jquery-ui.css')?>">
	<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.js')?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.js')?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.js')?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-ui/jquery-ui.js')?>"></script>	
</head>
<body>
	<div class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="../../UAS2/page/beranda.php" class="navbar-brand">Sistem Informasi Pengelola Jadwal </a>
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<div class="collapse navbar-collapse">				
				<ul class="nav navbar-nav navbar-right">
					
					<li><a class="dropdown-toggle" data-toggle="dropdown" role="button" href="#">Hy , Admin &nbsp&nbsp<span class="glyphicon glyphicon-user"></span></a></li>
				</ul>
			</div>
		</div>
	</div>

	<!-- modal input -->
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

		<div class="row"></div>
		<ul class="nav nav-pills nav-stacked">
			<li class="active"><a href="<?php echo site_url('welcome/')?>"><span class="glyphicon glyphicon-home"></span>  Dashboard</a></li>			
			<li><a href="<?php echo site_url('jadwal/')?>"><span class="glyphicon glyphicon-briefcase"></span>  Data Jadwal</a></li>
			<li><a href="kelola_kategori.php"><span class="glyphicon glyphicon-briefcase"></span>  Data Ruang</a></li>        												
			<li><a href="kelola_pengguna.php"><span class="glyphicon glyphicon-user"></span>  Data Pengguna</a></li>
			<li><a href="../../uas2/logout.php"><span class="glyphicon glyphicon-log-out"></span>  Logout</a></li>			
		</ul>
	</div>
	<div class="col-md-10">