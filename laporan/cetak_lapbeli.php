<?php error_reporting(0); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>Laporan Pembelian | TOKO OBAT BERIZIN & KOSMETIK RENDY</title>
		
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
				  $tanggal_cetak    = date('d-m-Y');
			?>
			<div id="page-wrapper">
				<div class="row">
					<div class="col-lg-12">
						<div id="area-1">
							<div>
								<div align="center">
									<H2>
									<p>TOKO OBAT BERIZIN & KOSMETIK</p><br>
									<p>RENDY</p><br>
    								<p>PASAR SARILAMAK</p><br>
    							</H2>
								</div>
								<hr>
								<div align="center">
									<h3><u>LAPORAN PEMBELIAN</u></h3>
								</div>
							</div>
							<br />
							<div>
								<?php
									$tanggal = $_POST['tanggal'];
									$get = mysql_query("SELECT * FROM detil_penjualan WHERE tanggal='$tanggal'");
									$row = mysql_fetch_array($get)
								?>
							
								<br />
								<span style="margin-left: 120px"><b>Tanggal Pembelian : <?php $tanggal = $row['tanggal'];
										echo date('d-m-Y', strtotime($tanggal)); ?></b></span>
								<br />
								<hr>
								<table width="780px" border="1" cellspacing="0" align="center">
									<tr>
										<td align="center"><b>No.</b></td>
										<td align="center"><b>Nama Barang</b></td>
										<td align="center"><b>Harga Beli</b></td>
										<td align="center"><b>Jumlah Barang</b></td>
										<td align="center"><b>Sub Total</b></td>
									</tr>
									<tr>
										<<?php
											$no = 1;
											$tanggal = $_POST['tanggal'];
											$get = mysql_query("SELECT * FROM detil_pembelian WHERE tanggal='$tanggal'");
											while ($row=mysql_fetch_array($get)) {
										?>
										<td align="center"><?php echo $no++; ?></td>
										<td><?php echo $row['nama_barang']; ?></td>
										<td><?php echo $row['harga_beli']; ?></td>
										<td><?php echo $row['jumlah_barang']; ?></td>
										<td><?php echo "Rp. ". number_format($row['total']).""; ?></td>
									</tr>
									<?php } ?>
									<tr>
										<td colspan="4" align="center" style="font-size: 16px"><b>TOTAL PEMBELIAN</b></td>
										<?php $x=mysql_query("select sum(total) as total from detil_pembelian where id_faktur='$id_faktur'");
												$xx=mysql_fetch_array($x);
											?>
										<td align="center" style="font-size: 16px"><b><?php echo "". number_format($xx['total']).""; ?></b></td>
									</tr>
								</table>
								<br />
								<span style="margin-left: 120px"><b><i>Tanggal Cetak : <?php echo $tanggal_cetak; ?></i></b></span>
								<br />

								<div align="right">
									<table width="150px" border="0" height="150px">
										<tr>
											<td align="right"><b>Admin</b></td>
										</tr>
										<tr>
											<td align="right">( <?php echo $login_session;?> )</td>
										</tr>
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
