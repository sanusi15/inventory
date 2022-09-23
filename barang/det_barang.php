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
		<title>Detail Barang | TOKO OBAT BERIZIN & KOSMETIK RENDY</title>
		
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
							<h2 class="page-header">
								<i class="glyphicon glyphicon-briefcase"></i> Detail Barang
							</h2>
							<a class="btn" href="barang.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>
						</div>
					</div>
					<!-- /.row -->
				
					<?php
						$id_barang = mysql_real_escape_string($_GET['id']);
						$det = mysql_query("SELECT * FROM barang WHERE id_barang='$id_barang'")or die(mysql_error());
						while($d=mysql_fetch_array($det)){
					?>
					<table class="table">
						<tr>
							<th class="col-md-3" style="text-align: left">ID Barang</th>
							<td style="text-align: left"><?php echo $d['id_barang'] ?></td>
						</tr>
						<tr>
							<th class="col-md-3" style="text-align: left">Nama Barang</th>
							<td style="text-align: left"><?php echo $d['nama_barang'] ?></td>
						</tr>
						
						<tr>
							<th class="col-md-3" style="text-align: left">Harga Beli</th>
							<td style="text-align: left">Rp. <?php echo number_format($d['harga_beli']); ?>,-</td>
						</tr>
						<tr>
							<th class="col-md-3" style="text-align: left">Harga Jual</th>
							<td style="text-align: left">Rp. <?php echo number_format($d['harga_jual']); ?>,-</td>
						</tr>
						<tr>
							<th class="col-md-3" style="text-align: left">Stok</th>
							<td style="text-align: left"><?php echo $d['stok'] ?></td>
						</tr>
						<tr>
							<th class="col-md-3" style="text-align: left">Satuan</th>
							<td style="text-align: left"><?php echo $d['satuan'] ?></td>
						</tr>
					</table>
					<?php
						}
					?>
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
