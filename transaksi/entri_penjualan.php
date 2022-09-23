<?php error_reporting(0); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>Entri Penjualan | TOKO OBAT BERIZIN & KOSMETIK RENDY</title>

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
				/*$tanggal    = date('Y-m-d');*/
				
				$konek=mysql_query('SELECT * FROM detil_penjualan');
					function autonumber($tabel, $kolom, $lebar=0, $awalan=''){
						$query= mysql_query("SELECT no_nota FROM detil_penjualan ORDER BY no_nota DESC LIMIT 1");
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
					
				if (isset($_POST['tambah'])) {
					$id_barang		= $_POST['id_barang'];
					$nama_barang	= $_POST['nama_barang'];
					$harga_jual		= $_POST['harga_jual'];
					$jumlah_barang	= $_POST['jumlah_barang'];
					$total			= $_POST['total'];

					$cekid = mysql_query("SELECT * FROM penjualan WHERE id_barang = '$id_barang'");
					if (mysql_num_rows($cekid) <> 0) {
						echo "<script>alert('Barang Sudah Dikeranjang!');window.location='entri_penjualan.php';</script>";
					}else{
						$tambah = mysql_query("INSERT INTO penjualan VALUES('$id_barang','$nama_barang','$harga_jual','$jumlah_barang','$total')");
					}
				}
				
				if (isset($_POST['submit'])) {
					$tanggal			= $_POST['tanggal'];
					$no_nota			= $_POST['no_nota'];
					$getidbarang		= mysql_fetch_array(mysql_query("SELECT id_barang FROM penjualan"));
					$getnamabarang		= mysql_fetch_array(mysql_query("SELECT nama_barang FROM penjualan"));
					$gethargajual		= mysql_fetch_array(mysql_query("SELECT harga_jual FROM penjualan"));
					$getjumlahbarang	= mysql_fetch_array(mysql_query("SELECT jumlah_barang FROM penjualan"));
					$gettotal			= mysql_fetch_array(mysql_query("SELECT total FROM penjualan"));
					$id_barang		    = $getidbarang['id_barang'];
					$nama_barang		= $getnamabarang['nama_barang'];
					$harga_jual		    = $gethargajual['harga_jual'];
					$jumlah_barang		= $getjumlahbarang['jumlah_barang'];
					$total				= $gettotal['total'];
					$bayar				= $_POST['bayar'];
					
					$simpan = mysql_query("SELECT * FROM penjualan");
					while ($a=mysql_fetch_row($simpan)){
						mysql_query("INSERT INTO detil_penjualan VALUES ('$tanggal','$no_nota','$a[0]','$a[1]','$a[2]','$a[3]','$a[4]','$bayar')");
						mysql_query("UPDATE barang SET stok=stok-'$a[3]' WHERE id_barang='$a[0]'");
					}
					mysql_query("TRUNCATE TABLE penjualan");
					echo "<script>alert('Struk Siap di Cetak!');window.location='cetak_nota.php?no_nota=$no_nota';</script>";
				}
			?>

			<div id="page-wrapper">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<div class="panel panel-default">
								<div class="panel-heading">
									<strong>Entri Penjualan</strong>
								</div>
								
								<div class="panel-body">
									<div class="row">
										<div class="col-lg-12">
											<form action="entri_penjualan.php" method="POST" enctype="multipart/form-data" class="form-horizontal">
												<div class="form-group row">
													<label class="col-md-1 form-control-label" for="text-input">Tanggal</label>
													<div class="col-md-2"><?php date_default_timezone_set('Asia/Jakarta'); ?>
														<input type="text" class="form-control" name="tanggal" value="<?php echo date('Y-m-d'); ?>" readonly>
													</div>
													<label class="col-md-1 col-md-offset-1 form-control-label" for="text-input">No Nota</label>
													<div class="col-md-2">
														<input type="text" class="form-control" name="no_nota" value="<?php echo autonumber("detil_penjualan", "no_nota", 9, "N") ?>" readonly>
													</div>
												</div>
												<hr>
												<div class="form-group row">
													<label class="col-md-2 form-control-label" for="text-input">ID Barang</label>
													<div class="col-md-2">
														<input type="text" id="id_barang" name="id_barang" class="form-control" placeholder="ID Barang" readonly>
													</div>
													<button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">CARI</button>
												</div>
												<div class="form-group row">
													<label class="col-md-2 form-control-label" for="text-input">Nama Barang</label>
													<div class="col-md-3">
														<input type="text" id="nama_barang" name="nama_barang" class="form-control" placeholder="Nama Barang" readonly>
													</div>
													<div class="col-md-2">
														<input type="text" id="harga_jual" name="harga_jual" class="form-control" placeholder="Harga Jual" onkeyup="sum()" readonly>
													</div>
													<div class="col-md-2">
														<input type="text" id="stok" name="stok" class="form-control" placeholder="Stok" readonly>
													</div>
												</div>
												<hr>
												<div class="form-group row">
													<label class="col-md-2 form-control-label" for="text-input">Jumlah Barang</label>
													<div class="col-md-2">
														<input type="text" id="jumlah_barang" name="jumlah_barang" class="form-control" placeholder="Jumlah Barang" onkeyup="validAngka(this); sum()">
													</div>
													<div class="col-md-2 col-md-offset-1">
														<input type="text" id="total" name="total" class="form-control" placeholder="Total" readonly>
													</div>
													<button name="tambah" type="submit" id="tambah" class="btn btn-info">TAMBAH</button>
												</div>
												<div class="form-group row" id="tampil">
													<label class="col-md-2 form-control-label" for="text-input"></label>
													<div class="col-md-10 table-responsive">
														<table class="table">
															<tr>
																<th>No.</th>
																<th>ID Barang</th>
																<th>Nama Barang</th>
																<th>Harga Jual</th>
																<th>Jumlah Barang</th>
																<th>Sub Total</th>
																<th>Pilihan</th>
															</tr>
															<tr>
																<?php
																	$no = 1;
																	$get = mysql_query("SELECT * FROM penjualan");
																	while ($tampil=mysql_fetch_array($get)) {
																?>
																<td><?php echo $no++; ?></td>
																<td><?php echo $tampil['id_barang']; ?></td>
																<td><?php echo $tampil['nama_barang']; ?></td>
																<td><?php echo $tampil['harga_jual']; ?></td>
																<td><?php echo $tampil['jumlah_barang'];?></td>
																<td><?php echo $tampil['total'];?></td>
																<td><a onclick="{ location.href='hapus_brg.php?id=<?php echo $tampil['id_barang']; ?>' }" class="btn btn-danger btn-xs">Hapus</a></td>
															</tr>
																<?php } ?>
														</table>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-md-2 form-control-label" for="text-input">TOTAL BELANJA</label>
													<div class="col-md-2">
														<?php $x=mysql_query("select sum(total) as total_belanja from penjualan");
															$xx=mysql_fetch_array($x);
														?>
														<b><input style="font-size: 24px" type="text" id="total_belanja" name="total_belanja" class="form-control" placeholder="0" value="<?php echo $xx['total_belanja']; ?>" onkeyup="sum1()" readonly></b>
													</div>
													<label class="col-md-2 col-md-offset-1 form-control-label" for="text-input">PEMBAYARAN</label>
													<div class="col-md-2">
														<b><input style="font-size: 24px" type="text" id="bayar" name="bayar" class="form-control" placeholder="0" onkeyup="validAngka(this); sum1()"></b>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-md-2 col-md-offset-5 form-control-label" for="text-input">KEMBALI</label>
													<div class="col-md-2">
														<b><input style="font-size: 24px" type="text" id="kembali" name="kembali" class="form-control" placeholder="0" readonly></b>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-md-2 form-control-label" for="text-input"></label>
													<div class="col-md-5">
														<a href="penjualan.php" type="reset" class="btn btn-default">BATAL</a>
														<button type="submit" name="submit" class="btn btn-primary">CETAK</button>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<!-- Modal Barang -->
					<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title" id="myModalLabel">Pilih Barang</h4>
								</div>
								<div class="modal-body">
									<div class="row">
										<div class="col-lg-12">
											<div class="table-responsive">
												<table width="100%" class="table table-striped table-bordered table-hover" id="dataTablesBarang">
													<thead>
														<tr>
															<th>ID Barang</th>
															<th>Nama Barang</th>
															<th>Harga Jual</th>
															<th>Stok</th>
															<th>Opsi</th>
														</tr>
													</thead>
													<tbody>
														<?php
															$get = mysql_query("SELECT * FROM barang");
															while ($tampil=mysql_fetch_array($get)) {
														?>
														<tr>
															<td id='id_barang_<?php echo $tampil['id_barang'];?>'><?php echo $tampil['id_barang']; ?></td>
															<td id='nama_barang_<?php echo $tampil['id_barang'];?>'><?php echo $tampil['nama_barang']; ?></td>
															<td id='harga_jual_<?php echo $tampil['id_barang'];?>'><?php echo $tampil['harga_jual']; ?></td>
															<td id='stok_<?php echo $tampil['id_barang'];?>'><?php echo $tampil['stok']; ?> <?php echo $tampil['satuan']; ?></td>
															<td><button onclick="pilihBarang('<?php echo $tampil['id_barang']; ?>')" class="btn btn-info btn-xs">Pilih</button></td>
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

		<script language='javascript'>
		  function validAngka(a)
		{
			if(!/^[0-9.]+$/.test(a.value))
			{
				a.value = a.value.substring(0,a.value.length-1000);
			}
		}
			function pilihBarang(id_barang){
				id_barang    = $('#id_barang_'+id_barang).html();
				nama_barang  = $('#nama_barang_'+id_barang).html();
				harga_jual = $('#harga_jual_'+id_barang).html();
				stok  = $('#stok_'+id_barang).html();

				$('#id_barang').val(id_barang);
				$('#nama_barang').val(nama_barang);
				$('#harga_jual').val(harga_jual);
				$('#stok').val(stok);
				$('#myModal').modal('hide');
			}
			
			$(document).ready(function() {
				$('#dataTablesBarang').DataTable({
					responsive: true
				});
			});
			
			function sum() {
				var txtFirstNumberValue = document.getElementById('harga_jual').value;
				var txtSecondNumberValue = document.getElementById('jumlah_barang').value;
				var result = parseInt(txtFirstNumberValue) * parseInt(txtSecondNumberValue);
				if (!isNaN(result)) {
					document.getElementById('total').value = result;
				}
			}
			
			function sum1() {
				var txtFirstNumberValue = document.getElementById('total_belanja').value;
				var txtSecondNumberValue = document.getElementById('bayar').value;
				var result = parseInt(txtSecondNumberValue) - parseInt(txtFirstNumberValue);
				if (!isNaN(result)) {
					document.getElementById('kembali').value = result;
				}
			}
		</script>
	</body>
</html>