<?php
	$sql_st = $mysqli->query ("SELECT * FROM statistik ORDER BY tanggal DESC") or die (mysqli_error());
?>
<div class="container-fluid">
	<div class="row">
    	<div class="col-lg-12">
        	<h2>Statistik dari orang melihat Website Desa Tebel</h2>
		</div>
		<!-- /.col-lg-12 -->
	</div>
        <!-- /.row -->
        <hr>
    <div class="row">
		<div class="col-sm-12">
			<div class="panel panel-warning">
				<div class="panel-heading">Perhatian</div>
				<div class="panel-body">
					<p>Data ini akan secara otomatis menghapus ketika Data tersebut Lebih dari 30 hari.</p>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<th>#</th>
							<th>IP</th>
							<th>OS</th>
							<th>Browser</th>
							<th>Tanggal</th>
							<th>Jam</th>
						</tr>
					</thead>
					<tbody>
					<?php $no=1; while ($dt_st = mysqli_fetch_array($sql_st)) : ?>
						<tr>
							<td><?= $no; ?></td>
							<td><?= $dt_st['ip']; ?></td>
							<td><?= $dt_st['os']; ?></td>
							<td>@<?= $dt_st['browser']; ?></td>
							<td><?= $dt_st['tanggal']; ?></td>
							<td><?= $dt_st['jam']; ?></td>
						</tr>
					<?php $no++; endwhile; ?>
					</tbody>
				</table>
			</div>
			<!-- /.table-responsive -->
		</div>
	</div>
</div>