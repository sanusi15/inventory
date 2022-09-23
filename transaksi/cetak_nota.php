<?php error_reporting(0); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>Cetak Nota | TOKO OBAT BERIZIN & KOSMETIK RENDY</title>
		
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
			<?php include '../koneksi.php';
				  include 'header.php';
				  $tanggal    = date('d-m-Y');
			?>
			
			<div id="page-wrapper">
				<div class="row">
					<div class="col-lg-6">
						<div id="area-1">
							<div>
								<div align="center">
									<H2>
									<p>TOKO OBAT BERIZIN & KOSMETIK</p><br>
									<p>RENDY</p><br>
    								<p>PASAR SARILAMAK</p><br>
    							</H2>
								</div><br />
							</div>
							<div>
								<?php
									$no_nota = $_GET['no_nota'];
									$get = mysql_query("SELECT * FROM detil_penjualan WHERE no_nota='$no_nota'");
									$row = mysql_fetch_array($get)
								?>
								<span style="font-size: 14px; font-family: tahoma; margin-left: 0"><b>Nota</b> : <?php echo $row['no_nota']; ?></span><br />
								<span style="font-size: 14px; font-family: tahoma; margin-left: 0"><b>Tanggal</b> : <?php $tanggal = $row['tanggal'];
										echo date('d-m-Y', strtotime($tanggal)); ?></span><br />
								<span style="font-size: 14px; font-family: tahoma; margin-left: 0"><b>Kasir</b> : <?php echo $login_session;?></span>
							</div>
							<br />
							<div class="row col-lg-6">
								<table class="table table-bordered table-hover" style="margin-left: 0">
									<thead>
										<tr>
											<th><b>Nama Barang</b></th>
											<th><b>Harga Jual</b></th>
											<th><b>Qty</b></th>
											<th><b>Sub Total</b></th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<?php
												$no_nota = $_GET['no_nota'];
												$get = mysql_query("SELECT * FROM detil_penjualan WHERE no_nota='$no_nota'");
												while ($row=mysql_fetch_array($get)) {
											?>
											<td><?php echo $row['nama_barang']; ?></td>
											<td><?php echo $row['harga_jual']; ?></td>
											<td><?php echo $row['jumlah_barang']; ?></td>
											<td><?php echo $row['total']; ?></td>
										</tr>
										<?php } ?>
										<tr>
											<td colspan="3"><b>TOTAL</b></td>
											<td><?php $x=mysql_query("select sum(total) as total from detil_penjualan where no_nota='$no_nota'");
												$xx=mysql_fetch_array($x);			
												echo "". number_format($xx['total'])."";
											?></td>
										</tr>
										<tr>
											<td colspan="3"><b>BAYAR</b></td>
											<td><?php $b=mysql_query("select bayar from detil_penjualan where no_nota='$no_nota'");
												$a=mysql_fetch_array($b);			
												echo "". number_format($a['bayar'])."";
											?></td>
										</tr>
										<tr>
											<td colspan="3"><b>KEMBALI</b></td>
											<td><?php $bayar = $a['bayar'] - $xx['total'];
												echo "". number_format($bayar)."";
											?></td>
										</tr>
									</tbody>
								</table>
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
		
		<!-- Chart Style -->
		<script type="text/javascript" src="../assets/js/loader.js"></script>

		<script language='javascript'>
			$(document).ready(function() {
				$('#dataTables-example').DataTable({
					responsive: true
				});
			});
			
			window.load = print_d();
			function print_d(){
				window.print();
			}
		</script>
	</body>
</html>
