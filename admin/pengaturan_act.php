<?php error_reporting(0); ?>
<?php 
include '../koneksi.php';
$id_admin=$_POST['id_admin'];
$nama_lengkap=$_POST['nama_lengkap'];
$jenkel=$_POST['jenkel'];
$alamat=$_POST['alamat'];
$telp=$_POST['telp'];
$username=$_POST['username'];
$password=$_POST['password'];

mysql_query("update admin set nama_lengkap='$nama_lengkap', jenkel='$jenkel', alamat='$alamat', telp='$telp', username='$username', password='$password' where id_admin='$id_admin'");
header("location:profil.php");

?>