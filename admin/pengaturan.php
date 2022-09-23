<?php error_reporting(0); ?>
<?php
	include '../koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>Pengaturan | TOKO OBAT BERIZIN & KOSMETIK RENDY</title>
		
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
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<div class="panel panel-default">
								<div class="panel-heading">
									<strong>Edit Data Diri</strong>
								</div>
								
								<div class="panel-body">
									<div class="row">
										<div class="col-lg-12">
											<form action="pengaturan_act.php" method="POST">
												<table class="table">
													<tr>
														<th class="col-md-2" style="text-align: left">ID Admin</th>
														<td><input type="text" class="form-control" name="id_admin" value="<?php echo $id; ?>" readonly></td>
													</tr>
													<tr>
														<th class="col-md-2" style="text-align: left">Nama Lengkap</th>
														<td><input type="text" class="form-control" name="nama_lengkap" value="<?php echo $login_session; ?>"></td>
													</tr>
													<tr>
														<th class="col-md-2" style="text-align: left">Jenis Kelamin</th>
														<td><input type="text" class="form-control" name="jenkel" value="<?php echo $jenkel; ?>"></td>
													</tr>
													<tr>
														<th class="col-md-2" style="text-align: left">Alamat</th>
														<td><input type="text" class="form-control" name="alamat" value="<?php echo $alamat; ?>"></td>
													</tr>
													<tr>
														<th class="col-md-2" style="text-align: left">Telepon</th>
														<td><input type="text" class="form-control" name="telp" value="<?php echo $telp; ?>"></td>
													</tr>
													<tr>
														<th class="col-md-2" style="text-align: left">Username</th>
														<td><input type="text" class="form-control" name="username" value="<?php echo $username; ?>" readonly></td>
													</tr>
													<tr>
														<th class="col-md-2" style="text-align: left">Password</th>
														<td><input type="text" class="form-control" name="password" value="<?php echo $password; ?>"></td>
													</tr>
													<tr>
														<td></td>
														<td style="text-align: left">
															<a href="index.php" type="reset" class="btn btn-default">BATAL</a>
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
