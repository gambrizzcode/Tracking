<div class="content-wrapper">  
	<section class="content-header">
		<h1>
			Form Permohonan
		</h1>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary">
					<div class="box-header">
						<p>
							<a href="<?php echo site_url("c_permohonan/grid_permohonan"); ?>" class="btn btn-flat btn-warning"><i class="fa fa-arrow-left"></i> Kembali </a>
						</p>
					</div>
					<div class="box-body">
						<?php if($kd_reg == ""){ ?>
						<form enctype="multipart/form-data" action="<?php echo site_url("c_permohonan/simpan_permohonan"); ?>" class="form-horizontal" role="form" accept="" method="POST" autocomplete="off">
						<?php }else{ ?>
						<form enctype="multipart/form-data" action="<?php echo site_url("c_permohonan/update_permohonan"); ?>" class="form-horizontal" role="form" accept="" method="POST" autocomplete="off">
						<?php } ?>

							<?php
							if($kd_reg == ""){
								$q_reg = $this->Mymodel->query_all("SELECT * FROM permohonan ORDER BY kd_reg DESC");
								$n_reg = $q_reg->num_rows();
								// $nopjg = strlen($n_reg);
								$norut = $n_reg+1;
								// if ($nopjg == 1) {
								// 	$norut = "000".$n_reg+1;
								// }elseif ($nopjg == 2) {
								// 	$norut = "00".$n_reg+1;
								// }elseif ($nopjg == 3) {
								// 	$norut = "0".$n_reg+1;
								// }else{
								// 	$norut = $n_reg+1;
								// }
								$uniqe = strtoupper(substr(md5(time()),0,3));
								$tahun = date('Y');
								$bulan = date('m');

								$kd_baru = "-".$uniqe."/".$tahun."/".$bulan."/".$norut;
								?>
								<input type="hidden" name="kd_reg" id="kd_reg" value="<?php echo $kd_baru; ?>">
								<!-- <input type="hidden" name="kd_reg" id="kd_reg" value=""> -->
								<?php
							}else{ ?>
								<div class="form-group">
									<label class="col-sm-3 control-label">Kode Registrasi</label>
									<div class="col-sm-5">
										<input type="text" class="form-control" disabled="disabled" value="<?php echo $kd_reg; ?>">										
									</div>
								</div>

								<input type="hidden" name="kd_reg" id="kd_reg" value="<?php echo $kd_reg; ?>">
							<?php } ?>

							<div class="form-group">
								<label class="col-sm-3 control-label">NIK</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" name="nik" id="nik" required="required" value="<?php echo $nik; ?>">
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label">Nama Lengkap</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" name="nama" id="nama" required="required" value="<?php echo $nama; ?>">
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label">Alamat</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" name="alamat" id="alamat" required="required" value="<?php echo $alamat; ?>">
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label">Rukun Tetangga (RT)</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" name="rt" id="rt" required="required" value="<?php echo $rt; ?>">
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label">Rukun Warga (RW)</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" name="rw" id="rw" required="required" value="<?php echo $rw; ?>">
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label">Kecamatan</label>
								<div class=col-sm-5>
									<select class="form-control" name="kec" id="kec" required="required">
										<option <?php if($kec == ""){echo "selected";}else{} ?> value="">--- Pilih Kecamatan ---</option>
										<?php
										$datakec = $this->Mymodel->query_all("SELECT * FROM kecamatan GROUP BY kec ORDER BY kec ASC");
										$fetchkec = $datakec->result();
										foreach ($fetchkec as $jec => $vec) { ?>
											<option <?php if($kec == $vec->kec){echo "selected";}else{} ?> value="<?php echo $vec->kec; ?>"><?php echo $vec->kec; ?></option>
										<?php } ?>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label">Desa</label>
								<div class=col-sm-5>
									<select class="form-control" name="desa" id="desa" required="required">
										<option <?php if($desa == ""){echo "selected";}else{} ?> value="">--- Pilih Desa ---</option>
										<option <?php if($desa == $desa){echo "selected";}else{} ?> value="<?php echo $desa; ?>"><?php echo $desa; ?></option>
									</select>
								</div>
							</div>

							<div class="form-group">
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
								<label class="col-sm-3 control-label">Status</label>
								<div class="col-sm-5">
									<select class="form-control" name="status" id="status" required="required">
										<option <?php if($status == ""){echo "selected";}else{} ?> value="">--- Pilih Status ---</option>
										<option <?php if($status == "PROSES"){echo "selected";}else{} ?> value="PROSES">PROSES</option>
										<option <?php if($status == "SELESAI"){echo "selected";}else{} ?> value="SELESAI">SELESAI</option>
									</select>
								</div>
							</div>

							<div class="form-group" id="wadah-tgl-status">
								<label class="col-sm-3 control-label">Tanggal Selesai</label>
								<div class="col-sm-5">
									<input type="date" class="form-control" name="tgl_status" id="tgl_status" value="<?php echo $tgl_status; ?>">
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label">Keterangan</label>
								<div class="col-sm-6">
									<textarea class="inieditor" name="ket" id="ket"><?php echo $ket; ?></textarea>
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