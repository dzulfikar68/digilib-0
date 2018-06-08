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
			if (isset($_POST['judul']) || ($_POST['pengarang']) || ($_POST['fakultas'])) {
			
			// here you would normally include some database connection
			include('db_login.php');
				
			$con = mysqli_connect($db_host, $db_username, $db_password,$db_database);
			
			if (mysqli_connect_errno()){
				die ("Could not connect to the database: <br />". mysqli_connect_error( ));
			}
			// never trust what user wrote! We must ALWAYS sanitize user input
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
			$fakultas=test_input($fakultas);
					
			if(($judul == '') && ($pengarang == '') && ($fakultas == '')){
				$error_key= "Kata Kunci Belum Dimasukkan";
				$valid_key= FALSE;
			} else{
				$valid_key= TRUE;
			}
					
			if($valid_key == FALSE){
				echo "<div class=\"alert alert-danger\">
						<span class=\"glyphicon glyphicon-remove\"></span> 
					    ".$error_key."
					  </div>";
			} else{
				$query = " 	SELECT buku.idbuku, buku.judul, buku.pengarang, fakultas.nama, buku.stock 
							FROM buku,fakultas 
							WHERE buku.judul LIKE '%".$judul."%' 
							AND buku.pengarang LIKE '%".$pengarang."%' 
							AND buku.idfakultas LIKE '%".$fakultas."%' 
							AND buku.idfakultas = fakultas.idfakultas ";
							
				$result = mysqli_query($con,$query);
				if (!$result){
					die ("Could not query the database: <br />". mysqli_error($con));
				}
				
				$book=mysqli_num_rows($result);
				if($book == null){
					echo "<div class=\"alert alert-danger\">
							<span class=\"glyphicon glyphicon-remove\"></span> 
							Buku Tidak Tersedia
						  </div>";
				}else {	
					echo "<table class=\"table table-striped\">";
					echo "<tr align=\"center\">
							<td>No</td>
							<td>ID Buku</td>
							<td>Judul</td>
							<td>Pengarang</td>
							<td>Fakultas</td>
							<td>Stok</td>
						  </tr>";
					while($row = mysqli_fetch_array($result)) {
						echo "<tr align=\"center\">";
						echo "<td>".$no."</td>";
						echo "<td align=\"left\">".$row['idbuku']."</td>";
						echo "<td align=\"left\">".$row['judul']."</td>";
						echo "<td align=\"left\">".$row['pengarang']."</td>";
						echo "<td>".$row['nama']."</td>";
						echo "<td>".$row['stock']."</td>";
						echo "</tr>";
						$no++;
					}
					echo "</table>";
				}
				mysqli_close($con);
			}
			}
		?>
	</body>
</html>
