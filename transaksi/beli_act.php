<?php error_reporting(0); ?>
<?php
include '../koneksi.php';
$tanggal=$_POST['tanggal'];
$id_faktur=$_POST['id_faktur'];
$nomor_faktur=$_POST['nomor_faktur'];
$id_barang=$_POST['id_barang'];
$nama_barang=$_POST['nama_barang'];
$nama_sales=$_POST['nama_sales'];
$harga_beli=$_POST['harga_beli'];
$jumlah=$_POST['jumlah'];
$total_bayar=$_POST['total_bayar'];
	
mysql_query("INSERT INTO pembelian VALUES('$tanggal','$id_faktur','$nomor_faktur','$id_barang','$nama_barang','$nama_sales','$harga_beli','$jumlah','$total_bayar')");
mysql_query("UPDATE barang SET stok=stok+$jumlah WHERE id_barang='$id_barang'");
header("location:pembelian.php");

/*echo "<script>alert('Data Berhasil di Simpan!');window.location='tambah_transaksi.php';</script>";*/
?>