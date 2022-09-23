<?php error_reporting(0); ?>
<?php
	include '../koneksi.php';
	$tanggal		= $_POST['tanggal'];
	$no_nota		= $_POST['no_nota'];
	$id_barang		= $_POST['id_barang'];
	$nama_barang	= $_POST['nama_barang'];
	$harga_jual		= $_POST['harga_jual'];
	$jumlah_barang	= $_POST['jumlah_barang'];
	$total			= $_POST['total'];
	
	mysql_query("INSERT INTO detil_penjualan VALUES('$tanggal','$no_nota','$id_barang','$nama_barang','$harga_jual','$jumlah_barang','$total')");
	mysql_query("UPDATE barang SET stok=stok-$jumlah_barang WHERE id_barang='$id_barang'");
	mysql_query("TRUNCATE TABLE penjualan");
	header("location:penjualan.php");

	/*echo "<script>alert('Data Berhasil di Simpan!');window.location='tambah_transaksi.php';</script>";*/
?>