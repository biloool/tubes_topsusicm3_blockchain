<script>   
    $('#notifications').slideDown('slow').delay(3000).slideUp('slow');
</script>
<div id="notifications"><?php echo $this->session->flashdata('message'); ?></div>
<div class="container" style="margin-top:20px">
    <form class="form-inline my-2 my-lg-0" style="float:right" action="<?php echo base_url()?>index.php/home/data_cek">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Cek Data</button>
    </form>
		<h2>Data Biodata</h2>
		
		<hr>
		
		<table class="table table-striped table-hover table-sm table-bordered">
			<thead class="thead-dark">
				<tr>
					<th>NO.</th>
					<th>Nama Depan</th>
					<th>Nama Belakang</th>
					<th>Jenis Kelamin</th>
					<th>Nomor HP</th>
					<th>Alamat</th>
				</tr>
			</thead>
			<tbody>
				<?php
				if($list > 0){
					$no = 1;
					foreach ($list as $data_pool){
                        echo "<tr>";
                        echo "<td>$no</td>";
                        echo "<td>$data_pool->nama_depan</td>";
                        echo "<td>$data_pool->nama_belakang</td>";
                        echo "<td>$data_pool->jenis_kelamin</td>";
                        echo "<td>$data_pool->no_hp</td>";
                        echo "<td>$data_pool->alamat</td>";
                        $no++;
                    }
				//jika query menghasilkan nilai 0
				}else{
					echo '
					<tr>
						<td colspan="6">Tidak ada data.</td>
					</tr>
					';
				}
				?>
			<tbody>
		</table>
		
	</div>