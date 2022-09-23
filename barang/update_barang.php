<?php error_reporting(0); ?>
<?php 
include '../koneksi.php';
$id_barang=$_POST['id_barang'];
$nama_barang=$_POST['nama_barang'];
$harga_beli=$_POST['harga_beli'];
$harga_jual=$_POST['harga_jual'];
$stok=$_POST['stok'];
$satuan=$_POST['satuan'];

mysql_query("update barang set nama_barang='$nama_barang', harga_beli='$harga_beli',
			harga_jual='$harga_jual', stok='$stok', satuan='$satuan' where id_barang='$id_barang'");
header("location:barang.php");

?>