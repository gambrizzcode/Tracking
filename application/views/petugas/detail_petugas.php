<div class="content-wrapper">  
    <section class="content-header">
        <h1>
        	Detail Petugas
        </h1>
    </section>
    <section class="content">
        <div class="row">
        	<div class="col-md-12">
		        <div class="box box-success">
		        	<div class="box-header">
		        		<p>
							<a href="<?php echo site_url("c_petugas/print_detail_petugas/".$kd_petugas); ?>" target="_blank" class="btn btn-flat btn-primary"><i class="fa fa-print"></i> Cetak </a>
							<a href="<?php echo site_url("c_petugas/grid_petugas"); ?>" class="btn btn-flat btn-warning"><i class="fa fa-arrow-left"></i> Kembali </a>
						</p>
		        	</div>
		        	<div class="box-body">
		        		<table class="table">
		        			<tr>
		        				<td align="right">Kode Petugas</td>
		        				<td><?php echo $kd_petugas; ?></td>
		        			</tr>
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
		        				<td align="right">Jenis Layanan</td>
		        				<td>
		        					<?php
		        					$datanly = $this->Mymodel->query_all("SELECT * FROM layanan WHERE kd_layanan = '$kd_layanan'");
		        					$fetchnly = $datanly->row();
		        					echo $fetchnly->kd_layanan." - ".$fetchnly->nama_layanan;
		        					?>
		        				</td>
		        			</tr>
		        		</table>
		        	</div>
		        </div>
        	</div>
        </div>
    </section>
</div>