<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Penelusuran Permohonan | Hasil</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">

</head>
<body class="hold-transition lockscreen" style="background-color: white">
	<br>
	<div class="row">
		<div class="col-md-12 col-xs-12">
			<div class="lockscreen-logo">
				<b>Penelusuran</b>&nbsp;Permohonan
			</div>
			<div class="lockscreen-name">
				Hasil Penelusuran dari <?php echo $jenis; ?> : <b><?php echo $kode; ?></b>
			</div>

			<br><hr><br>

			<?php
			if ($info == "ada") { ?>
				<div class="row">
					<div class="col-md-offset-2 col-md-8 form-horizontal" align="center">
						<div class="form-group">
							<label class="col-md-6 col-xs-6 text-right">
								Nomor Registrasi
							</label>
							<label class="col-md-6 col-xs-6 text-left">
								<b><?php echo $kd_reg; ?></b>
							</label>
						</div>
						<div class="form-group">
							<label class="col-md-6 col-xs-6 text-right">
								Tanggal
							</label>
							<label class="col-md-6 col-xs-6 text-left">
								<?php echo date('H:i:s d-m-Y',strtotime($tanggal)); ?>
							</label>
						</div>
						<div class="form-group">
							<label class="col-md-6 col-xs-6 text-right">
								NIK
							</label>
							<label class="col-md-6 col-xs-6 text-left">
								<?php echo $nik; ?>
							</label>
						</div>
						<div class="form-group">
							<label class="col-md-6 col-xs-6 text-right">
								Nama
							</label>
							<label class="col-md-6 col-xs-6 text-left">
								<?php echo $nama; ?>
							</label>
						</div>
						<div class="form-group">
							<label class="col-md-6 col-xs-6 text-right">
								Alamat
							</label>
							<label class="col-md-6 col-xs-6 text-left">
								<?php echo $alamat; ?>
							</label>
						</div>
						<div class="form-group">
							<label class="col-md-6 col-xs-6 text-right">
								Rukun Tetangga (RT)
							</label>
							<label class="col-md-6 col-xs-6 text-left">
								<?php echo $rt; ?>
							</label>
						</div>
						<div class="form-group">
							<label class="col-md-6 col-xs-6 text-right">
								Rukun Warga (RW)
							</label>
							<label class="col-md-6 col-xs-6 text-left">
								<?php echo $rw; ?>
							</label>
						</div>
						<div class="form-group">
							<label class="col-md-6 col-xs-6 text-right">
								Desa
							</label>
							<label class="col-md-6 col-xs-6 text-left">
								<?php echo $desa; ?>
							</label>
						</div>
						<div class="form-group">
							<label class="col-md-6 col-xs-6 text-right">
								Kecamatan
							</label>
							<label class="col-md-6 col-xs-6 text-left">
								<?php echo $kec; ?>
							</label>
						</div>
						<div class="form-group">
							<label class="col-md-6 col-xs-6 text-right">
								Jenis Layanan
							</label>
							<label class="col-md-6 col-xs-6 text-left">
								<?php
	        					$datanly = $this->Mymodel->query_all("SELECT * FROM layanan WHERE kd_layanan = '$kd_layanan'");
	        					$fetchnly = $datanly->row();
	        					echo $fetchnly->kd_layanan." - ".$fetchnly->nama_layanan;
	        					?>
							</label>
						</div>
						<div class="form-group">
							<label class="col-md-6 col-xs-6 text-right">
								Status
							</label>
							<label class="col-md-6 col-xs-6 text-left">
								<?php echo $status; ?>
							</label>
						</div>
						<div class="form-group">
							<label class="col-md-6 col-xs-6 text-right">
								Tanggal Status
							</label>
							<label class="col-md-6 col-xs-6 text-left">
								<?php if($tgl_status == "0000-00-00"){echo "-";}else{echo date('d-m-Y',strtotime($tgl_status));} ?>
							</label>
						</div>
						<div class="form-group">
							<label class="col-md-6 col-xs-6 text-right">
								Keterangan
							</label>
							<label class="col-md-6 col-xs-6 text-left">
								<?php echo $ket; ?>
							</label>
						</div>
					</div>
				</div>
			<?php }else{ ?>
				<div class="row">
					<div class="col-md-offset-2 col-md-8 form-horizontal" align="center">
						<h4>
							<strong><?php echo $info; ?></strong>
						</h4>
					</div>
				</div>
			<?php } ?>

			<br>

			<div align="center">
				<a href="<?php echo base_url(); ?>" class="btn btn-flat btn-danger" style="border-radius: 5px">
					<i class="fa fa-search"></i>
					Cari Lagi
				</a>
				&nbsp;&nbsp;
				<a href="https://wa.me/6281333381010" target="_blank" class="btn btn-flat btn-twitter" style="border-radius: 5px">
					<i class="fa fa-user-secret"></i>
					Hubungi Petugas
					<i class="fa fa-phone"></i>
				</a>
			</div>

			<br><hr><br>

			<div class="lockscreen-footer text-center">
				<strong>Copyright &copy; 2018 <a href="http://anmediacorp.com">ANMediaCorp Jember</a>.</strong> All rights reserved.
			</div>

			<br>
		</div>
	</div>

<script src="<?php echo base_url(); ?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>