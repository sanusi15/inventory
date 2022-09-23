<?php error_reporting(0); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>Pembelian | TOKO OBAT BERIZIN & KOSMETIK RENDY</title>

		<!-- CSS -->
		<link href="../assets/css/bootstrap.min.css" rel="stylesheet">
		<link href="../assets/css/sb-admin.css" rel="stylesheet">
		<link href="../assets/css/plugins/morris.css" rel="stylesheet">
		<link href="../assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link href="../assets/css/jquery-ui/jquery-ui.css" rel="stylesheet">
		
		<!-- CSS DataTables-->
		<link href="../assets/css/dataTables.bootstrap.min.css" rel="stylesheet">
		<link href="../assets/css/dataTables.responsive.css" rel="stylesheet">
	</head>

	<body>
		<div id="wrapper">

			<?php
				include 'header.php';
				include '../koneksi.php';
			?>

			<div id="page-wrapper">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<h2 class="page-header">
								<i class="fa fa-shopping-cart"></i> Transaksi Pembelian
							</h2>
							<a href="entri_pembelian.php" style="margin-bottom:20px" class="btn btn-info col-md-2"><span class="glyphicon glyphicon-pencil"></span> <b>Entri Pembelian</b></a>
						</div>
					</div>
				
				
				<!-- /.row -->
				<div class="row">
					<div class="col-lg-12">
						<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
							<thead>
								<tr>
									<th>Tanggal</th>
									<th>ID Faktur</th>
									<th>Pilihan</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$get = mysql_query("SELECT DISTINCT id_faktur, tanggal FROM detil_pembelian");
									while ($tampil=mysql_fetch_array($get)) {
								?>
								<tr>
									<td><?php $tanggal = $tampil['tanggal'];
										echo date('d-m-Y', strtotime($tanggal)); ?></td>
									<td><?php echo $tampil['id_faktur']; ?></td>
									<td>
										<a href="det_faktur.php?id=<?php echo $tampil['id_faktur']; ?>" class="btn btn-info">Detail</a>
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

		<!-- jQuery -->
		<script src="../assets/js/jquery.js"></script>
		<script src="../assets/js/jquery-3.2.0.min.js"></script>
		<script src="../assets/css/jquery-ui/jquery-ui.js" type="text/javascript"></script>
		
		<!-- Javascript DataTables-->
		<script src="../assets/js/jquery.dataTables.js"></script>
		<script src="../assets/js/dataTables.bootstrap.js"></script>
		<script src="../assets/js/dataTables.responsive.js"></script>

		<!-- Bootstrap Core JavaScript -->
		<script src="../assets/js/bootstrap.min.js"></script>

		<!-- Morris Charts JavaScript -->
		<script src="../assets/js/plugins/morris/raphael.min.js"></script>
		<script src="../assets/js/plugins/morris/morris.min.js"></script>
		<script src="../assets/js/plugins/morris/morris-data.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				$('#dataTables-example').DataTable({
					responsive: true
				});
			});
		</script>
	</body>
</html>