<?php error_reporting(0); ?>
<?php
	include('login.php');
	include('koneksi.php');

	if(isset($_SESSION['login_user'])){
		header("location: admin/index.php");
	}
	if(isset($_POST['submit'])){
		var_dump($_POST['bulan']);
	}

	

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="assets/style.css">
		<title>Login | TOKO OBAT BERIZIN & KOSMETIK RENDY</title>
	</head>

	<style>
body {
  background: url(abu.jpeg);
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
  


}

</style>

	<body >
		<div class="login-card" style="margin-top: 200px">
			 <h1><b>LOGIN</b></h1><br>

			<form action="" method="post">
				<select name="bulan" id="">
					<?php
						$sql = mysqli_query($konek, "SELECT DISTINCT year(tanggal) as thn, month(tanggal) as bln FROM detil_penjualan ORDER BY tanggal DESC;");
						while ($data = mysqli_fetch_assoc($sql)) {
							$thn = $data['thn'];
							$bln = $data['bln'];
							echo '<option value="' . $thn . '-0' . $bln . '">'.$thn.'-0'.$bln.'</option>';
						}
					
					?>
				</select>
				<input type="text" id="username" name="username" placeholder="Username">
				<input type="password" id="password" name="password" placeholder="Password">
				<input type="submit" id="submit" name="submit" class="login login-submit" value="Login">
			</form>
    
			<div class="login-help">
				
			</div>
		</div>
	</body>
</html>
