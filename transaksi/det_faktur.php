<?php error_reporting(0); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>Detail Faktur | TOKO OBAT BERIZIN & KOSMETIK RENDY</title>

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

			<?php include 'header.php'; ?>

			<div id="page-wrapper">
				<div class="container-fluid">
					<!-- Page Heading -->
					<div class="row">
						<div class="col-lg-12">
							<h2 class="page-header">
								<i class="fa fa-shopping-cart"></i> Detail Faktur Pembelian
							</h2>
							<a class="btn" href="pembelian.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>
						</div>
					</div>
					<!-- /.row -->
				
					<?php
						$id_faktur = mysql_real_escape_string($_GET['id']);
						$det = mysql_query("SELECT * FROM detil_pembelian WHERE id_faktur='$id_faktur'")or die(mysql_error());
						$d=mysql_fetch_array($det)
					?>
					<table class="table">
						<tr>
							<th class="col-md-3" style="text-align: left">ID Faktur</th>
							<td style="text-align: left"><?php echo $d['id_faktur'] ?></td>
						</tr>
						<tr>
							<th class="col-md-3" style="text-align: left">Tanggal Pembelian</th>
							<td style="text-align: left"><?php $tanggal = $d['tanggal']; echo date('d-m-Y', strtotime($tanggal)); ?></td>
						</tr>
						<tr>
						<th></th>
						<td></td>
						</tr>
					</table>
					<div class="row">
						<div class="col-lg-12">
							<table width="100%" class="table table-bordered table-hover" id="dataTables-example">
								<thead>
									<tr>
										<th>ID Barang</th>
										<th>Nama Barang</th>
										<th>Harga Beli</th>
										<th>Jumlah Barang</th>
										<th>Sub Total</th>
									</tr>
								</thead>
								<tbody>
								<?php
									$id_faktur = mysql_real_escape_string($_GET['id']);
									$det = mysql_query("SELECT * FROM detil_pembelian WHERE id_faktur='$id_faktur'")or die(mysql_error());
									while($row=mysql_fetch_array($det)){
								?>
									<tr>
										<td><?php echo $row['id_barang']; ?></td>
										<td><?php echo $row['nama_barang']; ?></td>
										<td><?php echo $row['harga_beli']; ?></td>
										<td><?php echo $row['jumlah_barang']; ?></td>
										<td><?php echo $row['total']; ?></td>
									</tr>
									<?php } ?>
									<tr>
										<td colspan='4'><h4 align='center'><b>TOTAL PEMBELIAN</b></h4></td>
										<td><h4 align='center'><b>
											<?php $x=mysql_query("select sum(total) as total_beli from detil_pembelian where id_faktur='$id_faktur'");
												$xx=mysql_fetch_array($x);			
												echo "Rp. ". number_format($xx['total_beli']).",-";
											?></b></h4>
										</td>
									</tr>
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
		<script src="../assets/js/dataTables.responsive"></script>

		<!-- Bootstrap Core JavaScript -->
		<script src="../assets/js/bootstrap.min.js"></script>

		<!-- Morris Charts JavaScript -->
		<script src="../assets/js/plugins/morris/raphael.min.js"></script>
		<script src="../assets/js/plugins/morris/morris.min.js"></script>
		<script src="../assets/js/plugins/morris/morris-data.js"></script>
		
		<script type="text/javascript">
			$(document).ready(function(){
				$('#tanggal').datepicker({
					dateFormat: "yy-mm-dd",
					autoclose:true
				});
			});

			//validasi angka
			function validAngka(a)
			{
				if(!/^[0-9.]+$/.test(a.value))
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
