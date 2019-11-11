<div class="content-wrapper">  
	<section class="content-header">
		<h1>
			Form Layanan
		</h1>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary">
					<div class="box-header">
						<p>
							<a href="<?php echo site_url("c_layanan/grid_layanan"); ?>" class="btn btn-flat btn-warning"><i class="fa fa-arrow-left"></i> Kembali </a>
						</p>
					</div>
					<div class="box-body">
						<?php if($kd_layanan == ""){ ?>
							<form enctype="multipart/form-data" action="<?php echo site_url("c_layanan/simpan_layanan"); ?>" class="form-horizontal" role="form" accept="" method="POST" autocomplete="off">
						<?php }else{ ?>
							<form enctype="multipart/form-data" action="<?php echo site_url("c_layanan/update_layanan"); ?>" class="form-horizontal" role="form" accept="" method="POST" autocomplete="off">
						<?php } ?>

						<?php if($kd_layanan == ""){ ?>
							<input type="hidden" name="kd_layanan" id="kd_layanan" value="">
							<?php }else{ ?>
							<div class=form-group>
								<label class="col-sm-3 control-label">Kode layanan</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" disabled="disabled" value="<?php echo $kd_layanan; ?>">										
								</div>
							</div>

							<input type="hidden" name="kd_layanan" id="kd_layanan" value="<?php echo $kd_layanan; ?>">
						<?php } ?>

							<div class=form-group>
								<label class="col-sm-3 control-label">Nama Layanan</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" name="nama_layanan" id="nama_layanan" required="required" value="<?php echo $nama_layanan; ?>">
								</div>
							</div>

							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-9">
									<button type="submit" name="Simpan" class="btn btn-flat btn-primary"><i class="fa fa-save"></i> Simpan Data</button> 
								</div>
							</div>

							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-9">
									<button type="reset" class="btn btn-flat btn-default"><i class="fa fa-refresh"></i> Reset Kolom </button>
								</div>
							</div>

						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>