<?php
	session_start();

	if(isset($_SESSION["idpetugas"])) {
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Perpustakaan</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<link href="assets/bootstrap/css/bootstrap-nav.css" rel="stylesheet" type="text/css">
	</head>
	<style type="text/css">
		aside {
			width: 380px;
			float: right;
			padding: 0px 0px 301px 20px;
			border-left: 3px solid #eeeeee;
			strip
			line-height: 20px}
		aside section a {
			display: block;
			padding: 10px;
			border-bottom: 1px solid #eeeeee;}
		aside h2 {
			padding: 30px 0px 10px 0px;
			color: #de6581;}
	</style>
	<body style="height:1500px">	
		<nav class="navbar-inverse navbar-fixed-top">
			<div class="container-fluid">
    
				<div>
					<ul class="nav navbar-nav">
						<li class="active"><a href="index_petugas.php"><span class="glyphicon glyphicon-home"></span>&nbsp;&nbsp;Beranda</a></li>
						<li><a href="peminjaman.php"><span class="glyphicon glyphicon-import"></span>&nbsp;&nbsp;Peminjaman</a></li>
						<li><a href="pengembalian.php"><span class="glyphicon glyphicon-export"></span>&nbsp;&nbsp;Pengembalian</a></li> 
					</ul>
	  
					<ul class="nav navbar-nav navbar-right">
						<li><a href="#"><span class="glyphicon glyphicon-user"></span> &nbsp; <?php echo $_SESSION['nama'];?> </a></li>
						<li><a href="logout_petugas.php"><span class="glyphicon glyphicon-log-out"></span> &nbsp; Keluar</a></li>
					</ul>  
				</div>
			</div>
		</nav>
  
		<div class="container">
			<div class="row">
			<div class="col-sm-7 col-sm-offset-1">
				<br><br><br>
				<h3>Selamat Datang di Perpustakaan Online</h3>
				<br>
				<div class="well col-sm-6">
					<img src="images/icon.png" alt="icon" />
					</br></br>
					<figcaption><?php 
					require_once('db_login.php');
		
					$connection = mysqli_connect($db_host, $db_username, $db_password);
					if (mysqli_connect_errno()){
						die ("Could not connect to the database: <br />".mysqli_connect_error());
					}
					
					$db_select=mysqli_select_db($connection,$db_database);
					if (!$db_select){
						die ("Could not select the database: <br />".mysqli_error($connection));
					}
					
					$query = "SELECT * FROM petugas
							 WHERE idpetugas = '".$_SESSION["idpetugas"]."' ";
					
					$result = mysqli_query($connection,$query);
					if (!$result){
						die ("Could not query the database: <br />". mysqli_error($connection));
					}		
						while ($row = mysqli_fetch_array($result)){ 
							echo "ID Petugas :{$row['idpetugas']}</br>"; 
							echo "Nama		 :{$row['nama']}</br>"; 
							echo "Email		 :{$row['email']}</br>";
						} 
					mysqli_close($connection);
					?></figcaption>
				</div>
			</div>

			<div class="col-sm-3 col-sm-offset-1">
				<aside>
					<section class="waktubuka">
					</br></br>
						<h2>Waktu Pelayanan</h2>
						<p>Senin-Jumat:</br>
						08.00-15.00</p>
						<br>
						<p>Sabtu:</br>
						08.00-12.00</p>
					</section>
					<section class="statistik">
						<h2>Statistik</h2>
						<p><?php 
						require_once('db_login.php');
			
						$connection = mysqli_connect($db_host, $db_username, $db_password);
						if (mysqli_connect_errno()){
							die ("Could not connect to the database: <br />".mysqli_connect_error());
						}
						
						$db_select=mysqli_select_db($connection,$db_database);
						if (!$db_select){
							die ("Could not select the database: <br />".mysqli_error($connection));
						}
						
						$query = "SELECT SUM(stock) FROM `buku`";
						
						$result = mysqli_query($connection,$query);
						if (!$result){
							die ("Could not query the database: <br />". mysqli_error($connection));
						}	
						
						while ($row = mysqli_fetch_array($result)){ 
								echo "Total Buku :{$row['SUM(stock)']} Buku</br>"; 
						}
						
						mysqli_close($connection);
						?></p>
					</section>
				</aside>
			</div>
		</div>
			<?php
			// connect database
			require_once('db_login.php');
			
			$connection = mysqli_connect($db_host, $db_username, $db_password);
			if (mysqli_connect_errno()){
				die ("Could not connect to the database: <br />".mysqli_connect_error());
			}

			$db_select=mysqli_select_db($connection,$db_database);
			if (!$db_select){
				die ("Could not select the database: <br />".mysqli_error($connection));
			}		

			$query1 = "	UPDATE detail_pinjam INNER JOIN peminjaman
						ON detail_pinjam.idpinjam = peminjaman.idpinjam
						SET detail_pinjam.keterlambatan = DATEDIFF(CURDATE(),peminjaman.tgl_kembali)
						WHERE peminjaman.status_peminjaman = 'Y' ";
			$query2 = "	UPDATE detail_pinjam 
						SET denda = keterlambatan * 1000 
						WHERE keterlambatan > 0 ";
			$result1 = mysqli_query($connection,$query1);
			$result2 = mysqli_query($connection,$query2);
			if (!$result1){
				die ("Could not query the database: <br />".mysqli_error($connection));
			}
			if (!$result2){
				die ("Could not query the database: <br />".mysqli_error($connection));
			}

			mysqli_close($connection);
			?>
		</div>

	</body>
</html>

<?php
}
?>