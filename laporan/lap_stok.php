<?php error_reporting(0); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>Stok Barang | TOKO OBAT BERIZIN & KOSMETIK RENDY</title>
		
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
								<i class="fa fa-fw fa-file"></i> Laporan Stok Barang
							</h2>
							<button style="margin-bottom:20px" onClick="print_d()" class="btn btn-primary pull-left"><span class="glyphicon glyphicon-print"></span> CETAK</button>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
								<thead>
									<tr>
										<th>Nomor</th>
										<th>ID Barang</th>
										<th>Nama Barang</th>
										<th>Stok</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$no=1;
										while ($row=mysql_fetch_array($konek))
										{
									?>
									<tr>
										<td><?php echo $no++; ?></td>
										<td><?php echo $row['id_barang']; ?></td>
										<td><?php echo $row['nama_barang']; ?></td>
										<td align="center"><?php echo $row['stok']; ?> <?php echo $row['satuan']; ?></td>
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
			$(document).ready(function() {
				$('#dataTables-example').DataTable({
					responsive: true
				});
			});
			
			function print_d(){
				window.open("cetak_lapstok.php","_blank");
			}
		</script>

	</body>
</html>
