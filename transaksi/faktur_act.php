<?php error_reporting(0); ?>
<?php
	include '../koneksi.php';
	$id_barang=$_GET['id'];
	mysql_query("DELETE FROM pembelian WHERE id_barang='$id_barang'");
	header("location:entri_pembelian.php");
?>