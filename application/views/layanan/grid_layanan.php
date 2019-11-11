<div class="content-wrapper">  
	<section class="content-header">
		<h1>
			Grid Layanan
		</h1>
		<div class="row">
			<div class="col-md-12" align="right">
				<a class="btn btn-social btn-facebook" href="<?php echo site_url("c_layanan/form_layanan"); ?>">
				<i class="fa fa-plus-circle"></i> Tambah Layanan </a>
				<!-- <a class="btn btn-social btn-twitter" href="<?php //echo site_url("c_layanan/cetak_layanan"); ?>">
				<i class="fa fa-print"></i> Cetak </a> -->
				<!-- <a class="btn btn-social btn-google" href="<?php //echo '#'; ?>">
				<i class="fa fa-search"></i> GO !! </a> -->
			</div>
		</div>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div>
					<h2>
						<?php echo $this->session->flashdata('pesan'); ?>
					</h2>
				</div>
				<div class="box box-success">
					<div class="box-header">
						
					</div>
					<div class="box-body">
						<table class="table table-condensed table-hovered table-striped table-bordered table-responsive table-heleh" style="width: 100%">
							<thead>
								<tr>
									<th>#</th>
									<th>Kode Layanan</th>
									<th>Nama Layanan</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
		        				$no = 1;
		        				foreach ($qdatalayanan as $kdt => $vdt) {
		        				?>
								<tr>
									<td><?php echo $no++; ?></td>
									<td><?php echo $vdt->kd_layanan;  ?></td>
		        					<td><?php echo $vdt->nama_layanan; ?></td>
		        					<td>
		        						<div class="btn-group">
											<button class="btn btn-xs btn-success" title="Detail" onclick="location='<?php echo site_url("c_layanan/detail_layanan/".$vdt->kd_layanan); ?>'">
												<i class="fa fa-search"></i>
											</button>

											<button class="btn btn-xs btn-info" title="Edit" onclick="location='<?php echo site_url("c_layanan/form_layanan/".$vdt->kd_layanan); ?>'">
												<i class="fa fa-pencil"></i>
											</button>

											<button class="btn btn-xs btn-danger" title="Hapus" onclick="var y = confirm('Yakin Hapus Petugas Ini ?');if(y == true){location='<?php echo site_url("c_layanan/delete_layanan/".$vdt->kd_layanan); ?>';}else{}">
												<i class="fa fa-trash-o"></i>
											</button>
										</div>
		        					</td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>