<?php error_reporting(0); ?>
<?php
	include '../koneksi.php';
	$id_barang=$_POST['id_barang'];
	$nama_barang=$_POST['nama_barang'];
	$harga_beli=$_POST['harga_beli'];
	$harga_jual=$_POST['harga_jual'];
	$stok=$_POST['stok'];
	$satuan=$_POST['satuan'];

	mysql_query("insert into barang values('$id_barang','$nama_barang','$harga_beli','$harga_jual','$stok','$satuan')");
	header("location:barang.php");
?>