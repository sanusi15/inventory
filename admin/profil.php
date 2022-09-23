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
		<title>My Profile | TOKO OBAT BERIZIN & KOSMETIK RENDY</title>
		
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
					<!-- Page Heading -->
					<div class="row">
						<div class="col-lg-12">
							<h2>
								<i class="fa fa-user"></i> My Profile
							</h2>
						</div>
					</div>
					<!-- /.row -->
					<table class="table">
						<tr>
							<th class="col-md-3" style="text-align: left">ID Admin</th>
							<td style="text-align: left"><?php echo $id;?></td>
						</tr>
						<tr>
							<th class="col-md-3" style="text-align: left">Nama Lengkap</th>
							<td style="text-align: left"><?php echo $login_session;?></td>
						</tr>
						<tr>
							<th class="col-md-3" style="text-align: left">Jenis Kelamin</th>
							<td style="text-align: left"><?php echo $jenkel;?></td>
						</tr>
						<tr>
							<th class="col-md-3" style="text-align: left">Alamat</th>
							<td style="text-align: left"><?php echo $alamat;?></td>
						</tr>
						<tr>
							<th class="col-md-3" style="text-align: left">Telepon</th>
							<td style="text-align: left"><?php echo $telp;?></td>
						</tr>
						<tr>
							<th class="col-md-3" style="text-align: left">Username</th>
							<td style="text-align: left"><?php echo $username;?></td>
						</tr>
						<tr>
							<th class="col-md-3" style="text-align: left">Password</th>
							<td style="text-align: left"><?php echo $password;?></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
						</tr>
					</table>
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
