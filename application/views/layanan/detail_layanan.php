<div class="content-wrapper">  
    <section class="content-header">
        <h1>
        	Detail layanan
        </h1>
    </section>
    <section class="content">
        <div class="row">
        	<div class="col-md-12">
		        <div class="box box-success">
		        	<div class="box-header">
		        		<p>
							<a href="<?php echo site_url("c_layanan/print_detail_layanan/".$kd_layanan); ?>" target="_blank" class="btn btn-flat btn-primary"><i class="fa fa-print"></i> Cetak </a>
							<a href="<?php echo site_url("c_layanan/grid_layanan"); ?>" class="btn btn-flat btn-warning"><i class="fa fa-arrow-left"></i> Kembali </a>
						</p>
		        	</div>
		        	<div class="box-body">
		        		<table class="table">
		        			<tr>
		        				<td align="right">Kode layanan</td>
		        				<td><?php echo $kd_layanan; ?></td>
		        			</tr>
		        			<tr>
		        				<td align="right">Nama layanan</td>
		        				<td><?php echo $nama_layanan; ?></td>
		        			</tr>
		        		</table>
		        	</div>
		        </div>
        	</div>
        </div>
    </section>
</div>