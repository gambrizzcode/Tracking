<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Penelusuran Permohonan | Cari</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">

</head>
<body class="hold-transition lockscreen" style="background-color: white" onload="langsung()">
<div class="lockscreen-wrapper">
	<div class="lockscreen-logo">
		<b>Penelusuran</b>&nbsp;Permohonan
	</div>
	<div class="lockscreen-name">Dispendukcapil Jember</div><br><hr><br>

	<form method="post" action="<?php echo site_url("c_track/cek_dulu"); ?>" enctype="multipart/form-data" accept="" autocomplete="on">
		<div class="input-group">		
			<input type="text" class="form-control input-lg" placeholder="No Registrasi / NIK" id="kode" name="kode" style="border-top-left-radius: 5px;border-bottom-left-radius: 5px" required="required">

			<div class="input-group-btn">
				<button type="submit" class="btn btn-lg btn-flat btn-primary" style="border-top-right-radius: 5px;border-bottom-right-radius: 5px"><i class="fa fa-search"></i></button>
			</div>
		</div>
		<br>
		<div class="text-center">
			<a href="https://wa.me/6281333381010" target="_blank" class="btn btn-flat btn-twitter" style="border-radius: 5px">
				<i class="fa fa-user-secret"></i>
				Hubungi Petugas
				<i class="fa fa-phone"></i>
			</a>
		</div>
	</form>

	<br><hr><br>

	<div class="lockscreen-footer text-center">
		<strong>Copyright &copy; 2018 <a href="http://anmediacorp.com">ANMediaCorp Jember</a>.</strong> All rights reserved.
	</div>
</div>
<script type="text/javascript">
	function langsung() {
		document.getElementById('kode').focus();
	}
</script>
<script src="<?php echo base_url(); ?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>