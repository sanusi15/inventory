<?php
include 'koneksi.php';

session_start();
$user_check=$_SESSION['login_user'];
$ses_sql=mysql_query("SELECT * FROM admin WHERE username='$user_check'");
$row = mysql_fetch_assoc($ses_sql);
$login_session = $row['nama_lengkap'];
$id = $row['id_admin'];
$jenkel = $row['jenkel'];
$alamat = $row['alamat'];
$telp = $row['telp'];
$username = $row['username'];
$password = $row['password'];

if(!isset($login_session)){
	header('Location: index.php');
}
?>