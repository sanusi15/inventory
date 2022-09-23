<?php error_reporting(0); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>Barang | TOKO OBAT BERIZIN & KOSMETIK RENDY</title>
		
		<!-- CSS -->
		<link href="../assets/css/bootstrap.min.css" rel="stylesheet">
		<link href="../assets/css/sb-admin.css" rel="stylesheet">
		<link href="../assets/css/plugins/morris.css" rel="stylesheet">
		<link href="../assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		
		<!-- CSS DataTables-->
		<link href="../assets/css/dataTables.bootstrap.min.css" rel="stylesheet">
		<link href="../assets/css/dataTables.responsive.css" rel="stylesheet">
	</head>

	<body>
		<div id="wrapper">
			
			<?php include 'header.php'; ?>
			
			<div id="page-wrapper">
				<?php
					include '../koneksi.php';
					
					$konek=mysql_query('SELECT * FROM barang');
					function autonumber($tabel, $kolom, $lebar=0, $awalan=''){
						$query= mysql_query("SELECT id_barang FROM barang ORDER BY id_barang DESC LIMIT 1");
						$jumlahrecord = mysql_num_rows($query);
						if($jumlahrecord == 0)
						$nomor=1;
						else{
							$row=mysql_fetch_array($query);
							$nomor=intval(substr($row[0],strlen($awalan)))+1;
						}
						if($lebar>0)
							$angka = $awalan.str_pad($nomor,$lebar,"0",STR_PAD_LEFT);
						else
							$angka = $awalan.$nomor;
							return $angka;
					}
				?>
				
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<h2 class="page-header">
								<i class="glyphicon glyphicon-briefcase"></i> Data Barang
							</h2>
							<button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2"><span class="glyphicon glyphicon-plus"></span> <b>Tambah Barang</b></button>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
								<thead>
									<tr>
										<th>ID Barang</th>
										<th>Nama Barang</th>
										<th>Harga Beli</th>
										<th>Stok</th>
										<th>Pilihan</th>
									</tr>
								</thead>
								<tbody>
									<?php
										while ($row=mysql_fetch_array($konek))
										{
									?>
									<tr>
										<td><?php echo $row['id_barang']; ?></td>
										<td><?php echo $row['nama_barang']; ?></td>
							
										<td align="center">Rp. <?php echo number_format($row['harga_beli']); ?>,-</td>
										<td align="center"><?php echo $row['stok']; ?> <?php echo $row['satuan']; ?></td>
										<td align="center">
											<a href="det_barang.php?id=<?php echo $row['id_barang']; ?>" class="btn btn-info">Detail</a>
											<a href="edit_barang.php?id=<?php echo $row['id_barang']; ?>" class="btn btn-warning">Edit</a>
											<a onclick="if(confirm('Yakin Ingin Menghapus Data Ini ???')){ location.href='hapus_barang.php?id=<?php echo $row['id_barang']; ?>' }" class="btn btn-danger">Hapus</a>
										</td>
									</tr>
									<?php
										}
									?>
								</tbody>
							</table>
						</div>
					</div>
					
					<!-- Modal 1 -->
					<div id="myModal" class="modal fade">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									<h4 class="modal-title">Tambah Barang Baru</h4>
								</div>
								<div class="modal-body">
									<form action="barang_act.php" method="post">
										<div class="form-group">
											<label>ID Barang</label>
											<input type="text" id="text-input" name="id_barang" class="form-control" value="<?php echo autonumber("barang", "id_barang", 7, "B") ?>" readonly>
										</div>
										<div class="form-group">
											<label>Nama Barang</label>
											<input name="nama_barang" type="text" class="form-control" placeholder="Nama Barang" maxlength="50">
										</div>
										
										<div class="form-group">
											<label>Harga Beli</label>
											<input type="text" id="text-input" name="harga_beli" class="form-control" placeholder="Harga Beli" maxlength="10" onkeyup="validAngka(this)" required>
										</div>
										<div class="form-group">
											<label>Harga Jual</label>
											<input type="text" id="text-input" name="harga_jual" class="form-control" placeholder="Harga Jual" maxlength="10" onkeyup="validAngka(this)" required>
										</div>
										<div class="form-group">
											<label>Stok Awal</label>
											<input type="text" id="text-input" name="stok" class="form-control" placeholder="Stok Awal" maxlength="10" onkeyup="validAngka(this)" required>
										</div>
										<div class="form-group">
										<label>Satuan</label>
                              			<select class="form-control" name="satuan" id="satuan" onkeyup="validAngka(this)" required>
                              				<option value="satuan">Satuan</option>
											<option value="Pcs">Pcs</option>
											<option value="Dus">Dus</option>
											<option value="Botol">Botol</option>
											
										</select>
								</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
											<input type="submit" class="btn btn-primary" value="Simpan">
										</div>
									</form>
							</div>
						</div>
					</div>
					
					<!-- Modal 2 -->
					<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog" style="width:1000px">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title" id="myModalLabel">Pencarian Barang</h4>
								</div>
								<div class="modal-body">
									<table id="lookup" class="table table-bordered table-hover table-striped">
										<thead>
											<tr>
												<th>ID</th>
												<th>Barang</th>
												<th>Harga Beli</th>
												<th>Sisa</th>
												<th>Pilihan</th>
											</tr>
										</thead>
										<tbody>
											<?php
												$query = mysql_query('SELECT * FROM barang');
												while ($row = mysql_fetch_array($query)) {
											?>
											<tr>
												<td><?php echo $row['id_barang']; ?></td>
												<td><?php echo $row['nama_barang']; ?></td>
												<td><?php echo $row['harga_beli']; ?></td>
												<td><?php echo $row['sisa'];?> <?php echo $row['satuan'];?></td>
												<td>
													<a href="det_barang.php?id=<?php echo $row['id_barang']; ?>" class="btn btn-info">Detail</a>
													<a href="edit_barang.php?id=<?php echo $row['id_barang']; ?>" class="btn btn-warning">Edit</a>
													<a onclick="if(confirm('Yakin Ingin Menghapus Data Ini ???')){ location.href='hapus_barang.php?id=<?php echo $row['id_barang']; ?>' }" class="btn btn-danger">Hapus</a>
												</td>
											</tr>
											<?php
												}
											?>
										</tbody>
									</table>  
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	
		<!-- jQuery -->
		<script src="../assets/js/jquery.js"></script>
		<script src="../assets/js/jquery-3.2.0.min.js"></script>
		
		<!-- Javascript DataTables-->
		<script src="../assets/js/jquery.dataTables.js"></script>
		<script src="../assets/js/dataTables.bootstrap.js"></script>
		<script src="../assets/js/dataTables.responsive"></script>

		<!-- Bootstrap Core JavaScript -->
		<script src="../assets/js/bootstrap.min.js"></script>

		<!-- Morris Charts JavaScript -->
		<script src="../assets/js/plugins/morris/raphael.min.js"></script>
		<script src="../assets/js/plugins/morris/morris.min.js"></script>
		<script src="../assets/js/plugins/morris/morris-data.js"></script>

		<script language='javascript'>
			//validasi angka
			function validAngka(a)
			{
				if(!/^[0-9.]+$/.test(a.value))
				{
					a.value = a.value.substring(0,a.value.length-1000);
				}
			}

			//validasi huruf
			function validHuruf(a)
			{
				if(!/^[a-zA-Z]+$/.test(a.value))
				{
					a.value = a.value.substring(0,a.value.length-1000);
				}
			}
			
			$(document).ready(function() {
				$('#dataTables-example').DataTable({
					responsive: true
				});
			});
		</script>

	</body>
</html>
