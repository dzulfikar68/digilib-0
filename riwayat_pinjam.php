<<?php
	session_start();

	if(isset($_SESSION["nim"])) {
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Riwayat Peminjaman Buku</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<link href="assets/bootstrap/css/bootstrap-nav.css" rel="stylesheet" type="text/css">
	</head>
	
	<body style="height:1500px">
	
		<nav class="navbar-inverse navbar-fixed-top">
		  <div class="container-fluid">
			
			<div>
			  <ul class="nav navbar-nav">
				<li><a href="index_mhs.php"><span class="glyphicon glyphicon-home"></span>&nbsp;&nbsp;Beranda</a></li>
				<li><a href="cari_buku.php"><span class="glyphicon glyphicon-search"></span>&nbsp;&nbsp;Pencarian Buku</a></li>
				<li class="active"><a href="riwayat_pinjam.php"><span class="glyphicon glyphicon-book"></span>&nbsp;&nbsp;Riwayat Peminjaman</a></li> 
			  </ul>
			  
			  <ul class="nav navbar-nav navbar-right">
				<li><a href="#"><span class="glyphicon glyphicon-user"></span> &nbsp; <?php echo $_SESSION['nama'];?> </a></li>
				<li><a href="logout_mhs.php"><span class="glyphicon glyphicon-log-out"></span> &nbsp; Keluar</a></li>
			  </ul>
			  
			</div>
		  </div>
		</nav>
		  
		<div class="container">
		  <br/><br/><br/>
		  <h3>Riwayat Peminjaman Buku</h3>
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
			
			//QUERY UPDATE DENDA--------
			$query_a ="	UPDATE detail_pinjam INNER JOIN peminjaman
						ON detail_pinjam.idpinjam = peminjaman.idpinjam
						SET detail_pinjam.keterlambatan = DATEDIFF(CURDATE(),peminjaman.tgl_kembali)
						WHERE peminjaman.status_peminjaman = 'Y' ";
			$query_b =" UPDATE detail_pinjam 
						SET denda = keterlambatan * 1000 
						WHERE keterlambatan > 0 ";
				
			$result_a = mysqli_query($connection,$query_a);
			$result_b = mysqli_query($connection,$query_b);
			
			if (!$result_a){
				die ("Could not query the database: <br />".mysqli_error($connection));
			}
			if (!$result_b){
				die ("Could not query the database: <br />".mysqli_error($connection));
			}
			//--------------------------
			
			$query1 = "	SELECT status_peminjaman
						FROM peminjaman
						WHERE nim = ".$nim." 
						AND status_peminjaman = 'T' ";
		
			$query2 = "	SELECT status_peminjaman
						FROM peminjaman
						WHERE nim = ".$nim." 
						AND status_peminjaman = 'Y' ";
							
			$result1 = mysqli_query($connection,$query1);			
			$result2 = mysqli_query($connection,$query2);
		
			if (!$result1){
				die ("Could not query the database: <br />".mysqli_error($connection));
			}
		
			if (!$result2){
				die ("Could not query the database: <br />".mysqli_error($connection));
			}
		
			$row1 = mysqli_num_rows($result1);
			$row2 = mysqli_num_rows($result2);
		
			if(($row1 < 1) && ($row2 < 1)){
				echo 'Belum Pernah Meminjam';
			}
		
			else {
				$query = " 	SELECT buku.judul, buku.pengarang, peminjaman.tgl_pinjam, detail_pinjam.tgl_kembali_real, detail_pinjam.denda, peminjaman.status_peminjaman
							FROM detail_pinjam
							RIGHT JOIN peminjaman ON detail_pinjam.idpinjam = peminjaman.idpinjam
							LEFT JOIN buku ON detail_pinjam.idbuku = buku.idbuku
							WHERE peminjaman.nim = ".$nim."
							ORDER BY peminjaman.tgl_pinjam DESC";
				
				$result = mysqli_query($connection,$query);
				
				if (!$result){
					die ("Could not query the database: <br />".mysqli_error($connection));
				}
		
				echo "<table class=\"table table-striped\">
						<tr align=\"center\">
						<td>No</td>
						<td>Judul</td>
						<td>Pengarang</td>
						<td>Tanggal Pinjam</td>
						<td>Tanggal Dikembalikan</td>
						<td>Denda</td>
						<td>Status</td>
					  </tr>";

				$no=1;
				while ($row = mysqli_fetch_array($result)){
					echo '<tr align=\'center\'>';
					echo '<td>'.$no.'</td>';
					echo '<td align=\'left\'>'.$row['judul'].'</td>';
					echo '<td align=\'left\'>'.$row['pengarang'].'</td>';
					echo '<td>'.$row['tgl_pinjam'].'</td>';
						if ($row['tgl_kembali_real'] == null){
							echo '<td>-</td>';
						}elseif ($row['tgl_kembali_real'] != null){
							echo '<td>'.$row['tgl_kembali_real'].'</td>';
						}
					echo '<td>'.$row['denda'].'</td>';
						if ($row['status_peminjaman'] == 'Y'){
							echo '<td>Belum Dikembalikan</td>';
						}elseif($row['status_peminjaman'] == 'T'){
							echo '<td>Sudah Dikembalikan</td>';
						}
					echo '</tr>';
					$no++;
				}
				echo '</table>';
			} //else
			
			mysqli_close($connection);
		?>
		</div>
	</body>
</html>
<?php
}
?>