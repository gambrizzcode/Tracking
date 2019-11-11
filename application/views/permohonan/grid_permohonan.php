<div class="content-wrapper">  
	<section class="content-header">
		<h1>
			Grid Permohonan
		</h1>
		<div class="row">
			<div class="col-md-12" align="right">
				<a class="btn btn-social btn-facebook" href="<?php echo site_url("c_permohonan/form_permohonan"); ?>">
				<i class="fa fa-plus-circle"></i> Tambah Permohonan </a>
				<!-- <a class="btn btn-social btn-twitter" href="<?php //echo site_url("c_permohonan/cetak_permohonan"); ?>">
				<i class="fa fa-print"></i> Cetak </a> -->
				
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
				<form enctype="multipart/form-data" action="<?php echo site_url('c_permohonan/grid_permohonan') ?>" role="form" accept="" method="post" autocomplete="off">
					<div class="row">
						<div class="col-md-6 col-xs-6">
							<label>Dari Tanggal <i class="fa fa-calendar"></i></label>
							<input type="date" class="form-control" name="dari" id="dari" value="<?php echo $dari; ?>">
							<br>
							<label>Sampai Tanggal <i class="fa fa-calendar"></i></label>
							<input type="date" class="form-control" name="ke" id="ke" value="<?php echo $ke; ?>">
						</div>
						<div class="col-md-6 col-xs-6">
							<label>Filter Layanan <i class="fa fa-filter"></i></label>
							<select class="form-control" name="fillay" id="fillay">
								<option <?php if($fillay == ""){echo "selected";}else{} ?> value="">--- Semua Layanan ---</option>
								<?php
								$data_ly = $this->Mymodel->query_all("SELECT * FROM layanan ORDER BY kd_layanan ASC");
								$fetch_ly = $data_ly->result();
								foreach ($fetch_ly as $kely => $vely) { ?>
									<option <?php if($fillay == $vely->kd_layanan){echo "selected";}else{} ?> value="<?php echo $vely->kd_layanan; ?>"><?php echo $vely->kd_layanan." - ".$vely->nama_layanan; ?></option>
								<?php } ?>
							</select>
							<label style="display: none">Filter Layanan <i class="fa fa-filter" style="display: none"></i></label>
							<select class="form-control" name="" id="" style="display: none">
								<option value="">--- Semua Layanan ---</option>
								<option></option>
							</select>
							<br><br>
							<button type="submit" name="go" id="go" class="btn btn-social btn-google">
							<i class="fa fa-search"></i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;GO !! &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							</button>	
						</div>
					</div>
					<br>
				</form>
				<div class="box box-success">
					<div class="box-header">
						
					</div>
					<div class="box-body">
						<table class="table table-condensed table-hovered table-striped table-bordered table-responsive table-heleh" style="width: 100%">
							<thead>
								<tr>
									<th>#</th>
									<th>Tanggal</th>
									<th>No Reg</th>
									<th>NIK</th>
									<th>Nama</th>
									<th>Kec</th>
									<th>Layanan</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
		        				$no = 1;
		        				foreach ($qdatapermohonan as $kdt => $vdt) {
		        				?>
								<tr>
									<td><?php echo $no++; ?></td>
		        					<td><?php echo date('H:i:s - d-m-Y',strtotime($vdt->tanggal)); ?></td>
		        					<td><?php echo $vdt->kd_reg;  ?></td>
		        					<td><?php echo $vdt->nik;  ?></td>
		        					<td><?php echo $vdt->nama;  ?></td>
		        					<td><?php echo $vdt->kec;  ?></td>
		        					<td>
		        						<?php
		        						$datanly = $this->Mymodel->query_all("SELECT * FROM layanan WHERE kd_layanan = '$vdt->kd_layanan'");
			        					$fetchnly = $datanly->row();
			        					echo $fetchnly->nama_layanan;
		        						?>
		        					</td>
		        					<td><b style="<?php if($vdt->status == "PROSES"){echo "color: red";}else{echo "color: green";} ?>" title="<?php if($vdt->tgl_status == "0000-00-00"){}else{echo date('d-m-Y',strtotime($vdt->tgl_status));}  ?>"><?php echo $vdt->status;  ?></b></td>
		        					<td>
		        						<div class="btn-group">
											<button class="btn btn-xs btn-success" title="Detail" onclick="location='<?php echo site_url("c_permohonan/detail_permohonan/".$vdt->kd_reg); ?>'">
												<i class="fa fa-search"></i>
											</button>

											<button class="btn btn-xs btn-info" title="Edit" onclick="location='<?php echo site_url("c_permohonan/form_permohonan/".$vdt->kd_reg); ?>'">
												<i class="fa fa-pencil"></i>
											</button>

											<button class="btn btn-xs btn-danger" title="Hapus" onclick="var y = confirm('Yakin Hapus Petugas Ini ?');if(y == true){location='<?php echo site_url("c_permohonan/delete_permohonan/".$vdt->kd_reg); ?>';}else{}">
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

				<!--Pagging--> 
				<?php echo $pagging; ?>
				<!--End Pagging-->

			</div>
		</div>
	</section>
</div>