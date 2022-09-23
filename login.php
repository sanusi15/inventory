<?php
	session_start();
	$error='';
	if (isset($_POST['submit'])) {
		if (empty($_POST['username']) || empty($_POST['password'])) {
			$error = "Username or Password is invalid";
		}
		else{
			$username=$_POST['username'];
			$password=$_POST['password'];
				
			include 'koneksi.php';
			$query = mysql_query("select * from admin where password='$password' AND username='$username'");
			$rows = mysql_num_rows($query);
			if ($rows > 1) {
				$_SESSION['login_user']=$username; // Membuat Sesi/session
				header("location: admin/index2.php"); // Mengarahkan ke halaman profil
			}
			else {
				$error = "Username atau Password belum terdaftar";
			}
		}
	}
?>