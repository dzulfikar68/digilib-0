<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Perpustakaan</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
	</head>
	<body>
		<?php
			if (isset($_POST['search'])) {
						
						// here you would normally include some database connection
						include('db_login.php');
							
						$con = mysqli_connect($db_host, $db_username, $db_password,$db_database);
						
						if (mysqli_connect_errno()){
							die ("Could not connect to the database: <br />". mysqli_connect_error( ));
						}
						
/* 			// never trust what user wrote! We must ALWAYS sanitize user input
			$judul = mysqli_real_escape_string($con, $_POST['judul']);
			$pengarang = mysqli_real_escape_string($con, $_POST['pengarang']);
			$fakultas = mysqli_real_escape_string($con, $_POST['fakultas']);
			$judul = htmlentities($judul);
			$pengarang = htmlentities($pengarang);
			$fakultas = htmlentities($fakultas);		
			$no=1;
			function test_input($data){
				$data=trim($data);
				$data=stripslashes($data);
				$data=htmlspecialchars($data);
				return $data;
			}
								
			$judul=test_input($judul);
			$pengarang=test_input($pengarang);
			$fakultas=test_input($fakultas); */
						
						
						
						// never trust what user wrote! We must ALWAYS sanitize user input
						$search_box = mysqli_real_escape_string($con, $_POST['search']);
						$search_box = htmlentities($search_box);
						$no=1;
							
						function test_input($data){
							$data=trim($data);
							$data=stripslashes($data);
							$data=htmlspecialchars($data);
							return $data;
						}
								
						$search_box=test_input($search_box);
						if($search_box == ''){
							$error_nim= "Anda Belum Memasukkan NIM";
							$valid_nim= FALSE;
							} elseif(!preg_match("/^[0-9]/", $search_box)){
								$error_nim= "Format NIM Salah";
								$valid_nim= FALSE;
								} else{
									$valid_nim= TRUE;
								}
						if($valid_nim == FALSE){
							echo "<div class=\"alert alert-danger\">
									<span class=\"glyphicon glyphicon-remove\"></span> 
									".$error_nim."
						   	      </div>";
						} else{
						$q = "select nim from mahasiswa where nim='".$search_box."'";
						$r = mysqli_query($con,$q);
						if (!$r){
							die ("Could not query the database: <br />". mysqli_error($con));
						}
						$mhs=mysqli_num_rows($r);
						if($mhs == 0){
							echo "<div class=\"alert alert-danger\">
									<span class=\"glyphicon glyphicon-remove\"></span> 
									Mahasiswa Tidak Terdaftar
						   	      </div>";
						}else {
							
						// build your search query to the database
						$query="SELECT peminjaman.nim, peminjaman.idpinjam,peminjaman.tgl_pinjam,peminjaman.tgl_kembali, detail_pinjam.idbuku, detail_pinjam.denda 
								FROM detail_pinjam
								RIGHT JOIN peminjaman ON detail_pinjam.idpinjam = peminjaman.idpinjam
								WHERE peminjaman.nim = '".$search_box."'
								AND peminjaman.status_peminjaman = 'Y'
								";
						$result = mysqli_query($con,$query);
						if (!$result){
							die ("Could not query the database: <br />". mysqli_error($con));
						}
						$jml_buku=mysqli_num_rows($result);
						echo "<div class=\"alert alert-success\">
								<span class=\"glyphicon glyphicon-ok\"></span> 
								Sedang Pinjam <i>".$jml_buku."</i> Buku
							  </div>";
						if(($jml_buku==1) ||($jml_buku==2)){
						echo "<table class=\"table table-striped\">";
						echo "<tr align=\"center\">
								<td>NO</td>
								<td>NIM</td>
								<td>ID Pinjam</td>
								<td>ID Buku</td>
								<td>Tanggal Pinjam</td>
								<td>Tanggal Kembali</td>
								<td>Denda</td>
								<td>Aksi</td>
							  </tr>";
						while($row = mysqli_fetch_array($result)) {
							echo "<tr align=\"center\">";
								echo "<td>".$no."</td>";
								echo "<td>".$row['nim']."</td>";
								echo "<td>".$row['idpinjam']."</td>";
								echo "<td>".$row['idbuku']."</td>";
								echo "<td>".$row['tgl_pinjam']."</td>";
								echo "<td>".$row['tgl_kembali']."</td>";
								echo "<td>".$row['denda']."</td>";
								echo '<td><a href="kembalikan.php?idpinjam='.$row['idpinjam'].'" class=\'btn btn-primary\' role=\'button\'>Kembalikan</a></td>';
							echo "</tr>";
							$no++;
						}
						echo "</table>";
						}
					}
				}
			}
			mysqli_close($con);
		?>
</body>
</html>
