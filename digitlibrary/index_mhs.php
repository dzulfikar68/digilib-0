<!DOCTYPE html>
<?php
	session_start();

	if(isset($_SESSION["nim"])) {
?>

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
					<li  class="active"><a href="index_mhs.php"><span class="glyphicon glyphicon-home"></span>&nbsp;&nbsp;Beranda</a></li>
					<li><a href="cari_buku.php"><span class="glyphicon glyphicon-search"></span>&nbsp;&nbsp;Pencarian Buku</a></li>
					<li><a href="riwayat_pinjam.php"><span class="glyphicon glyphicon-book"></span>&nbsp;&nbsp;Riwayat Peminjaman</a></li> 
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="#"><span class="glyphicon glyphicon-user"></span> &nbsp; <?php echo $_SESSION['nama'];?> </a></li>
					<li><a href="logout_mhs.php"><span class="glyphicon glyphicon-log-out"></span> &nbsp; Keluar</a></li>
				</ul>
			</div>
		</div>
		
		</nav>
			<div class="row">
				<div class="col-sm-7 col-sm-offset-1">
					<br/><br/><br/>
					<h3>&nbsp Selamat Datang di Perpustakaan Online</h3>
					<br><br><br>
					<?php
						// connect database
						require_once('db_login.php');
				
						$nim = $_SESSION['nim'];
		
						$connection = mysqli_connect($db_host, $db_username, $db_password);
						
						if (mysqli_connect_errno()){
							die ("Could not connect to the database: <br />".mysqli_connect_error());
						}

						$db_select=mysqli_select_db($connection,$db_database);
						
						if (!$db_select){
							die ("Could not select the database: <br />".mysqli_error($connection));
						}
				
						$query = "	SELECT status_peminjaman
									FROM peminjaman
									WHERE nim = ".$nim." 
									AND status_peminjaman = 'Y' ";
							
						$result = mysqli_query($connection,$query);
				
						if (!$result){
							die ("Could not query the database: <br />".mysqli_error($connection));
						}
				
						$row = mysqli_num_rows($result);
						
						if($row < 1){
							echo "<h3><i>Tidak Sedang Meminjam</i></h3>";
						} else {
							$query1 = " SELECT buku.judul, buku.pengarang, peminjaman.tgl_pinjam, peminjaman.tgl_kembali, detail_pinjam.denda 
										FROM detail_pinjam
										RIGHT JOIN peminjaman ON detail_pinjam.idpinjam = peminjaman.idpinjam
										LEFT JOIN buku ON detail_pinjam.idbuku = buku.idbuku
										WHERE peminjaman.nim = ".$nim."
										AND peminjaman.status_peminjaman = 'Y'
										ORDER BY buku.judul ";
							$query2 = "	UPDATE detail_pinjam INNER JOIN peminjaman
										ON detail_pinjam.idpinjam = peminjaman.idpinjam
										SET detail_pinjam.keterlambatan = DATEDIFF(CURDATE(),peminjaman.tgl_kembali)
										WHERE peminjaman.status_peminjaman = 'Y' ";
							$query3 = "	UPDATE detail_pinjam 
										SET denda = keterlambatan * 1000 
										WHERE keterlambatan > 0 ";
				
							$result1 = mysqli_query($connection,$query1);
							$result2 = mysqli_query($connection,$query2);
							$result3 = mysqli_query($connection,$query3);
				
							if (!$result1){
								die ("Could not query the database: <br />".mysqli_error($connection));
							}
							if (!$result2){
								die ("Could not query the database: <br />".mysqli_error($connection));
							}
							if (!$result3){
								die ("Could not query the database: <br />".mysqli_error($connection));
							}
							
							echo "<h3><i>Status Peminjaman Buku</i></h3>";
							echo "<table class=\"table table-striped\">
									<tr align=\"center\">
										<td>No</td>
										<td>Judul</td>
										<td>Pengarang</td>
										<td>Tanggal Pinjam</td>
										<td>Tanggal Kembali</td>
										<td>Denda</td>
									</tr>";
					
							$no=1;
							while ($row = mysqli_fetch_array($result1)){
								echo '<tr align=\'center\'>';
								echo '<td>'.$no.'</td>';
								echo '<td align=\'left\'>'.$row['judul'].'</td>';
								echo '<td align=\'left\'>'.$row['pengarang'].'</td>';
								echo '<td>'.$row['tgl_pinjam'].'</td>';
								echo '<td>'.$row['tgl_kembali'].'</td>';
								echo '<td>'.$row['denda'].'</td>';
								echo '</tr>';
								$no++;
							}
							echo '</table>';
							} //else
							mysqli_close($connection);
						?>
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
	</body>
</html>

<?php
	}
?>