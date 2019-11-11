<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Detail Data Layanan</title>
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
			<h3>Detail Data layanan Kode : <?php echo $kd_layanan; ?></h3>
		</p>
		<input type="hidden" name="kd_layanan" id="kd_layanan" value="<?php echo $kd_layanan; ?>">
		<table class="table table-condensed">
			<tr>
				<td align="right">Nama layanan</td>
				<td><?php echo $nama_layanan; ?></td>
			</tr>
		</table>
		<hr>
		<!-- PAGE CONTENT ENDS -->
	</div>
</div>
<script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>