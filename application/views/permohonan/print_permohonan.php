<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Detail Data Permohonan</title>
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
			<h3>Detail Data Permohonan Kode : <?php echo $kd_reg; ?></h3>
		</p>
		<input type="hidden" name="kd_reg" id="kd_reg" value="<?php echo $kd_reg; ?>">
		<table class="table table-condensed">
			<tr>
				<td align="right">Kode Registrasi</td>
				<td><b><?php echo $kd_reg; ?></b></td>
			</tr>
			<tr>
				<td align="right">Tanggal</td>
				<td><?php echo date('H:i:s d-m-Y',strtotime($tanggal)); ?></td>
			</tr>
			<tr>
				<td align="right">NIK</td>
				<td><?php echo $nik; ?></td>
			</tr>
			<tr>
				<td align="right">Nama</td>
				<td><?php echo $nama; ?></td>
			</tr>
			<tr>
				<td align="right">Alamat</td>
				<td><?php echo $alamat; ?></td>
			</tr>
			<tr>
				<td align="right">Rukun Tetangga (RT)</td>
				<td><?php echo $rt; ?></td>
			</tr>
			<tr>
				<td align="right">Rukun Warga (RW)</td>
				<td><?php echo $rw; ?></td>
			</tr>
			<tr>
				<td align="right">Desa</td>
				<td><?php echo $desa; ?></td>
			</tr>
			<tr>
				<td align="right">Kecamatan</td>
				<td><?php echo $kec; ?></td>
			</tr>
			<tr>
				<td align="right">Jenis Layanan</td>
				<td>
					<?php
					$datanly = $this->Mymodel->query_all("SELECT * FROM layanan WHERE kd_layanan = '$kd_layanan'");
					$fetchnly = $datanly->row();
					echo $fetchnly->kd_layanan." - ".$fetchnly->nama_layanan;
					?>
				</td>
			</tr>
			<tr>
				<td align="right">Status</td>
				<td><?php echo $status; ?></td>
			</tr>
			<tr>
				<td align="right">Tanggal Status</td>
				<td><?php echo date('d-m-Y',strtotime($tgl_status)); ?></td>
			</tr>
			<tr>
				<td align="right">Keterangan</td>
				<td><?php echo $ket; ?></td>
			</tr>
		</table>
		<hr>
		<!-- PAGE CONTENT ENDS -->
	</div>
</div>
<script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>