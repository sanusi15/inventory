<?php error_reporting(0); ?>
<?php
	include '../koneksi.php';
	include '../session.php';
?>

<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<!-- Brand and toggle get grouped for better mobile display -->
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="../admin/index.php">TOKO OBAT BERIZIN & KOSMETIK RENDY</a>
	</div>
				
	<!-- Top Menu Items -->
	<ul class="nav navbar-right top-nav">
		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <b><?php echo $login_session;?></b> <b class="caret"></b></a>
			<ul class="dropdown-menu">
				<li>
					<a href="../admin/profil.php"><i class="fa fa-fw fa-user"></i> My Profile</a>
				</li>
				<li>
					<a href="../admin/pengaturan.php"><i class="fa fa-fw fa-gear"></i> Pengaturan</a>
				</li>
				<li class="divider"></li>
				<li>
					<a href="../logout.php"><i class="fa fa-fw fa-power-off"></i> Keluar</a>
				</li>
			</ul>
		</li>
	</ul>
	
	<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
	<div class="collapse navbar-collapse navbar-ex1-collapse">
		<ul class="nav navbar-nav side-nav">
			<li>
				<a href="../admin/index.php"><i class="glyphicon glyphicon-home"></i> Home</a>
			</li>
			<li>
			
			<li>
				<a href="../barang/barang.php"><i class="glyphicon glyphicon-briefcase"></i> Barang</a>
			</li>
			<li class="active">
				<a href="javascript:;" data-toggle="collapse" data-target="#transaksi"><i class="glyphicon glyphicon-inbox"></i> Transaksi <i class="fa fa-fw fa-caret-down"></i></a>
				<ul id="transaksi" class="collapse">
					<li class='nav-item'>
						<a class='nav-link' href='pembelian.php'><i class='fa fa-shopping-cart'></i> Pembelian</a>
					</li>
					<li class='nav-item'>
						<a class='nav-link' href='penjualan.php'><i class='fa fa-shopping-cart'></i> Penjualan</a>
					</li>
				</ul>
			</li>
			<li>
				<a href="javascript:;" data-toggle="collapse" data-target="#laporan"><i class="fa fa-fw fa-file"></i> Laporan <i class="fa fa-fw fa-caret-down"></i></a>
				<ul id="laporan" class="collapse">
					<li class='nav-item'>
						<a class='nav-link' href='../laporan/lap_stok.php'><i class='fa fa-fw fa-file'></i> Stok Barang</a>
					</li>
					<li class='nav-item'>
						<a class='nav-link' href='../laporan/lap_beli.php'><i class='fa fa-fw fa-file'></i> Laporan Pembelian</a>
					</li>
					<li class='nav-item'>
						<a class='nav-link' href='../laporan/lap_jual.php'><i class='fa fa-fw fa-file'></i> Laporan Penjualan</a>
					</li>
				</ul>
			</li>
		</ul>
	</div>
</nav>