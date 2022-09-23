<?php error_reporting(0); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>Laporan Penjualan | TOKO OBAT BERIZIN & KOSMETIK RENDY</title>
	</head>

	<body>
		<?php
			include '../koneksi.php';
		?>
		<div>
				<div style="margin-left: 0; margin-top: 0">
					<img src="head.png" style="width: 350px" alt="Logo Zikra"/><br>
				</div>
				<br />
		</div>
		<div style="margin-left: 0">
			<?php
				$no_nota = $_POST['no_nota'];
				$get = mysql_query("SELECT * FROM detil_penjualan WHERE no_nota='$no_nota'");
				$row = mysql_fetch_array($get)
			?>
			<span style="font-size: 12px; font-family: tahoma"><b>No. Nota</b> : <?php echo $row['no_nota']; ?></span>
			<br />
			<span style="font-size: 12px; font-family: tahoma"><b>Tanggal</b> : <?php echo $row['tanggal']; ?></span>
			<br />
			<span style="font-size: 12px; font-family: tahoma"><b>Kasir</b> : <?php echo $login_session;?></span>
			<br />
			==================================================
			<table width="360px" border="0" cellspacing="0" style="font-size: 14px; font-family: tahoma">
				<tr>
					<th width="200px">Nama Barang</th>
					<th width="60px">Harga</th>
					<th width="30px">Qty</th>
					<th width="60px">Subtotal</th>
				</tr>
				<tr>
					<?php
						$no_nota = $_POST['no_nota'];
						$get = mysql_query("SELECT * FROM detil_penjualan WHERE no_nota='$no_nota'");
						while ($row=mysql_fetch_array($get)) {
					?>
					<td><?php echo $row['nama_barang']; ?></td>
					<td><?php echo $row['harga_jual']; ?></td>
					<td><?php echo $row['jumlah_barang']; ?></td>
					<td><?php echo $row['total']; ?></td>
				</tr>
				<tr>
					<td colspan="2" align="right">Total</td>
					<td colspan="2" align="right">41.000</td>
				</tr>
				<tr>
					<td colspan="2" align="right">Bayar</td>
					<td colspan="2" align="right">45.000</td>
				</tr>
				<tr>
					<td colspan="2" align="right">Kembali</td>
					<td colspan="2" align="right">4.000</td>
				</tr>
				<tr>
					<td colspan="4">=============================================</td>
				</tr>
			</table>
			<br />
			<div style="margin-left: 130px">
				<span style="font-size: 12px; font-family: tahoma"><b>===== Terima Kasih =====</b></span><br />
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
