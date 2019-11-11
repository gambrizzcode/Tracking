<div class="content-wrapper">  
	<section class="content-header">
		<h1>
			Form Petugas
		</h1>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary">
					<div class="box-header">
						<p>
							<a href="<?php echo site_url("c_petugas/grid_petugas"); ?>" class="btn btn-flat btn-warning"><i class="fa fa-arrow-left"></i> Kembali </a>
						</p>
					</div>
					<div class="box-body">
						<?php if($kd_petugas == ""){ ?>
							<form enctype="multipart/form-data" action="<?php echo site_url("c_petugas/simpan_petugas"); ?>" class="form-horizontal" role="form" accept="" method="POST" autocomplete="off">
						<?php }else{ ?>
							<form enctype="multipart/form-data" action="<?php echo site_url("c_petugas/update_petugas"); ?>" class="form-horizontal" role="form" accept="" method="POST" autocomplete="off">
						<?php } ?>			

							<?php
							if($kd_petugas == ""){
								// $qptg = $this->Mymodel->query_all("SELECT * FROM petugas ORDER BY kd_petugas DESC");
								// $recptg = $qptg->row();
								// $angka = $recptg->kd_petugas;
								// $kd_baru = $angka+1;
								?>
								<!-- <input type="hidden" name="kd_petugas" id="kd_petugas" value="<?php //echo $kd_baru; ?>"> -->
								<input type="hidden" name="kd_petugas" id="kd_petugas" value="">
								<?php
							}else{ ?>
								<div class=form-group>
									<label class="col-sm-3 control-label">Kode Petugas</label>
									<div class="col-sm-5">
										<input type="text" class="form-control" disabled="disabled" value="<?php echo $kd_petugas; ?>">										
									</div>
								</div>

								<input type="hidden" name="kd_petugas" id="kd_petugas" value="<?php echo $kd_petugas; ?>">
							<?php } ?>

							<div class=form-group>
								<label class="col-sm-3 control-label">Nama Lengkap</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" name="nama_petugas" id="nama_petugas" required="required" value="<?php echo $nama_petugas; ?>">
								</div>
							</div>

							<div class=form-group>
								<label class="col-sm-3 control-label">Username</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" name="username" id="username" required="required" value="<?php echo $username; ?>">
								</div>
							</div>

							<div class=form-group>
								<label class="col-sm-3 control-label">Password</label>
								<div class="col-sm-5">
									<input type="password" class="form-control" name="password" id="password" required="required" value="<?php echo $password; ?>">
								</div>
							</div>

							<div class=form-group>
								<label class="col-sm-3 control-label">Confirm Password</label>
								<div class="col-sm-5">
									<input type="password" class="form-control" name="confirm" id="confirm" required="required" value="<?php echo $password; ?>">
								</div>
							</div>

							<div class=form-group>
								<label class="col-sm-3 control-label">Jenis Layanan</label>
								<div class="col-sm-5">
									<select class="form-control" name="kd_layanan" id="kd_layanan" required="required">
										<option <?php if($kd_layanan == ""){echo "selected";}else{} ?> value="">--- Pilih Jenis Layanan ---</option>
										<?php
										$data_ly = $this->Mymodel->query_all("SELECT * FROM layanan ORDER BY kd_layanan ASC");
										$fetch_ly = $data_ly->result();
										foreach ($fetch_ly as $kely => $vely) { ?>
											<option <?php if($kd_layanan == $vely->kd_layanan){echo "selected";}else{} ?> value="<?php echo $vely->kd_layanan; ?>"><?php echo $vely->kd_layanan." - ".$vely->nama_layanan; ?></option>
										<?php } ?>
									</select>
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