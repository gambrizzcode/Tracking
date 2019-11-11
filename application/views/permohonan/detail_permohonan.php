<div class="content-wrapper">  
    <section class="content-header">
        <h1>
        	Detail Permohonan
        </h1>
    </section>
    <section class="content">
        <div class="row">
        	<div class="col-md-12">
		        <div class="box box-success">
		        	<div class="box-header">
		        		<p>
							<a href="<?php echo site_url("c_permohonan/print_detail_permohonan/".$kd_reg); ?>" target="_blank" class="btn btn-flat btn-primary"><i class="fa fa-print"></i> Cetak </a>
							<a href="<?php echo site_url("c_permohonan/grid_permohonan"); ?>" class="btn btn-flat btn-warning"><i class="fa fa-arrow-left"></i> Kembali </a>
						</p>
		        	</div>
		        	<div class="box-body">
		        		<table class="table">
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
		        				<td><?php if($tgl_status == "0000-00-00"){echo "-";}else{echo date('d-m-Y',strtotime($tgl_status));} ?></td>
		        			</tr>
		        			<tr>
		        				<td align="right">Keterangan</td>
		        				<td><?php echo $ket; ?></td>
		        			</tr>
		        		</table>
		        	</div>
		        </div>
        	</div>
        </div>
    </section>
</div>