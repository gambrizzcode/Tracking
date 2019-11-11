<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Detail Data Petugas</title>
		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />		
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
	</head>
<script type="text/javascript">
	function prin() {
		window.print();
		// window.location("<?php //site_url('c_user'); ?>");
	}
</script>
<body onload="prin()" class="no-skin">
<div class="row" align="center">
	<div class="col-xs-12" align="center">
		<!-- PAGE CONTENT BEGINS -->
		<p align="center">
			<h3>Detail Data Petugas Kode : <?php echo $kd_petugas; ?></h3>
		</p>
		<input type="hidden" name="kd_petugas" id="kd_petugas" value="<?php echo $kd_petugas; ?>">
		<table class="table table-condensed">
			<tr>
				<td align="right">Nama Petugas</td>
				<td><?php echo $nama_petugas; ?></td>
			</tr>
			<tr>
				<td align="right">Username</td>
				<td><?php echo $username; ?></td>
			</tr>
			<tr>
				<td align="right">Password</td>
				<td><b title="<?php echo $password; ?>">(********)</b></td>
			</tr>
			<tr>
				<td align="right">Kode Layanan</td>
				<td>
					<?php
					$datanly = $this->Mymodel->query_all("SELECT * FROM layanan WHERE kd_layanan = '$kd_layanan'");
					$fetchnly = $datanly->row();
					echo $fetchnly->kd_layanan;
					?>
				</td>
			</tr>
			<tr>
				<td align="right">Jenis Layanan</td>
				<td>
					<?php echo $fetchnly->nama_layanan; ?>
				</td>
			</tr>
		</table>
		<hr>
		<!-- PAGE CONTENT ENDS -->
	</div>
</div>
<script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>