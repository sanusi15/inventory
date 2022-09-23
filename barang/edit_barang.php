<?php error_reporting(0); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>Edit Barang | TOKO OBAT BERIZIN & KOSMETIK RENDY</title>
		
		<!-- CSS -->
		<link href="../assets/css/bootstrap.min.css" rel="stylesheet">
		<link href="../assets/css/sb-admin.css" rel="stylesheet">
		<link href="../assets/css/plugins/morris.css" rel="stylesheet">
		<link href="../assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	</head>

	<body>
		<div id="wrapper">
			
			<?php include 'header.php'; ?>

			<div id="page-wrapper">
				<?php
					include '../koneksi.php';
	
					$konek=mysql_query('SELECT * FROM barang');
					$id_barang=mysql_real_escape_string($_GET['id']);
					$det=mysql_query("select * from barang where id_barang='$id_barang'")or die(mysql_error());
					while($d=mysql_fetch_array($det)){
				?>
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<div class="panel panel-default">
								<div class="panel-heading">
									<strong>Edit Barang</strong>
								</div>
								
								<div class="panel-body">
									<div class="row">
										<div class="col-lg-12">
											<form action="update_barang.php" method="POST">
												<table class="table">
													<tr>
														<th class="col-md-2" style="text-align: left">ID Barang</th>
														<td><input type="text" class="form-control" name="id_barang" value="<?php echo $d['id_barang'] ?>" readonly></td>
													</tr>
													<tr>
														<th class="col-md-2" style="text-align: left">Nama Barang</th>
														<td><input type="text" class="form-control" name="nama_barang" value="<?php echo $d['nama_barang'] ?>"></td>
													</tr>
													
													<tr>
														<th class="col-md-2" style="text-align: left">Harga Beli</th>
														<td><input type="text" class="form-control" name="harga_beli" value="<?php echo $d['harga_beli'] ?>"></td>
													</tr>
													<tr>
														<th class="col-md-2" style="text-align: left">Harga Jual</th>
														<td><input type="text" class="form-control" name="harga_jual" value="<?php echo $d['harga_jual'] ?>"></td>
													</tr>
													<tr>
														<th class="col-md-2" style="text-align: left">Stok</th>
														<td><input type="text" class="form-control" name="stok" value="<?php echo $d['stok'] ?>" readonly></td>
													</tr>
													<tr>
														<th class="col-md-2" style="text-align: left">Satuan</th>
														<td><select class="form-control" name="satuan" id="satuan" onkeyup="validAngka(this)" required>
                              				<option value="satuan">Satuan</option>
											<option value="Pcs">Pcs</option>
											<option value="Dus">Dus</option>
											<option value="Botol">Botol</option>
											
										</select></td>
													</tr>
													<tr>
														<td></td>
														<td style="text-align: left">
															<a href="barang.php" type="reset" class="btn btn-default">BATAL</a>
															<button type="submit" name="submit" class="btn btn-primary">SIMPAN</button>
														</td>
													</tr>
												</table>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php 
						}
					?>
				</div>
			</div>
	
		<!-- jQuery -->
		<script src="../assets/js/jquery.js"></script>

		<!-- Bootstrap Core JavaScript -->
		<script src="../assets/js/bootstrap.min.js"></script>

		<!-- Morris Charts JavaScript -->
		<script src="../assets/js/plugins/morris/raphael.min.js"></script>
		<script src="../assets/js/plugins/morris/morris.min.js"></script>
		<script src="../assets/js/plugins/morris/morris-data.js"></script>
	</body>
</html>
