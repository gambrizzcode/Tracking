<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Tracking Layanan | Log in</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
	<b>Penelusuran</b><br>
	Permohonan
  </div>
  <div class="login-box-body">
	<p class="login-box-msg">Silahkan Login Terlebih Dahulu</p>

	<form action="<?php echo base_url(); ?>index.php/C_login/do_login" method="post">
	  <div class="form-group has-feedback">
		<input type="text" class="form-control" placeholder="Email" name="username">
		<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
	  </div>
	  <div class="form-group has-feedback">
		<input type="password" class="form-control" placeholder="Password" name="password">
		<span class="glyphicon glyphicon-lock form-control-feedback"></span>
	  </div>
	  <div class="row">
		<div class="col-xs-12">
		  <hr>
		  <button type="submit" class="btn btn-primary btn-block btn-flat">LOGIN</button>
		</div>
	  </div>
	</form>

  </div>
</div>
<script src="<?php echo base_url(); ?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
