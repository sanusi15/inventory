<?php error_reporting(0); ?>
<?php 
	include '../koneksi.php';
	$id_barang=$_GET['id'];
	mysql_query("delete from barang where id_barang='$id_barang'");
	header("location:barang.php");
?>