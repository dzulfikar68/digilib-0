<?php
	session_start();

	if(isset($_SESSION["idpetugas"])) {
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Peminjaman Buku</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<link href="assets/bootstrap/css/bootstrap-nav.css" rel="stylesheet" type="text/css">
		<?php
			require_once('db_login.php');
			
			// Connect
			$connection = mysqli_connect($db_host, $db_username, $db_password, $db_database);
			
			if (mysqli_connect_errno()){
				die ("Could not connect to the database: <br />". mysqli_connect_error( ));
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
			
			mysqli_close($connection);
			//--------------------------
		?>
		<script type="text/javascript">
			$(function() {
 
				$(".search_button").click(function() {
					// getting the value that user typed
					var searchString = $("#search_box").val();
					
					// forming the queryString
					var data = 'search='+ searchString;
					
					// if searchString is not empty
					if(searchString) {
						// ajax call
						$.ajax({
						type: "POST",
						url: "peminjaman_cekStatus.php",
						data: data,
						beforeSend: function(html) { // this happens before actual call
							$("#results").html(''); 
							$("#searchresults").show();
							$(".search_box").html(searchString);
						},
					
						success: function(html){ // this happens after we get results
							$("#results").show();
							$("#results").append(html);
						}			
						});    
					} 
				return false;
				});
				
			});
		</script>
	</head>
	
	<body style="height:1500px">	
		<nav class="navbar-inverse navbar-fixed-top">
			<div class="container-fluid">
    
				<div>
					<ul class="nav navbar-nav">
						<li><a href="index_petugas.php"><span class="glyphicon glyphicon-home"></span>&nbsp;&nbsp;Beranda</a></li>
						<li class="active"><a href="peminjaman.php"><span class="glyphicon glyphicon-import"></span>&nbsp;&nbsp;Peminjaman</a></li>
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
			<br/><br/><br/><br/>
			<div class="row">
				<div class="well col-md-5" style="background-color:#eee;">
					<h3>Cek Status Peminjaman</h3>
					
					<form class="form-horizontal" method="post" action="peminjaman_cekStatus.php">
						<div class="form-group">
							<div class="col-sm-10">
								<input type="text" name="search" id="search_box" class='form-control search_box' placeholder="Masukkan NIM Mahasiswa">
							</div>
						</div>
						  
						<div class="form-group">
							<div class=" col-sm-10">
								<button type="submit" value="search" class="btn btn-default search_button">CARI</button>
							</div>
						</div>
					</form>
				</div>
				
				
				<div class="well col-md-6 col-md-offset-1" style="background-color:#eee;">
					<h3>Form Peminjaman</h3>
					<?php
					// connect database
					require_once('db_login.php');
					// Connect
					$con = mysqli_connect($db_host, $db_username, $db_password, $db_database);
					if (mysqli_connect_errno()){
						die ("Could not connect to the database: <br />". mysqli_connect_error( ));
					}
					
					$idpetugas=$_SESSION["idpetugas"];
					
					function test_input($data){
						$data=trim($data);
						$data=stripslashes($data);
						$data=htmlspecialchars($data);
						return $data;
					}
					
					if (isset($_POST["submit"])){
						$nim = $_POST['nim'];
						$idbuku = $_POST['idbuku'];
						
						$nim = test_input($_POST['nim']);
						$cek_mhs="	SELECT nim FROM mahasiswa 
									WHERE nim='".$nim."' ";
						$cek_nim="	SELECT nim FROM peminjaman 
									WHERE nim='".$nim."'
									AND status_peminjaman = 'Y' ";
						$result_mhs  = mysqli_query($con,$cek_mhs) or die(mysqli_error($con));
						$result_nim  = mysqli_query($con,$cek_nim) or die(mysqli_error($con));
						$row_mhs = mysqli_fetch_array($result_mhs);
						$row_nim = mysqli_num_rows($result_nim);
						if ($nim == ''){
							$error_nim = "<text style=\"color:red;\" class=\"glyphicon glyphicon-remove\">&nbsp;Harap Masukkan NIM</text>";
							$valid_nim = FALSE;
						}elseif (!preg_match("/^[0-9]/",$nim)) {
							$error_nim = "<text style=\"color:red;\" class=\"glyphicon glyphicon-remove\">&nbsp;Format NIM Salah</text>";
							$valid_nim = FALSE;
						}elseif($row_mhs == 0){
							$error_nim= "<text style=\"color:red;\" class=\"glyphicon glyphicon-remove\">&nbsp;Mahasiswa Tidak Terdaftar</text>";
							$valid_nim= FALSE;
						}elseif($row_nim > 1){
							$error_nim= "<text style=\"color:red;\" class=\"glyphicon glyphicon-remove\">&nbsp;Mahasiswa Sudah Pinjam 2 Buku</text>";
							$valid_nim= FALSE;
						}else{
							$valid_nim = TRUE;
						}
						
						$idbuku = test_input($_POST['idbuku']);
						$cek_buku="	SELECT idbuku FROM buku 
									WHERE idbuku='".$idbuku."' ";
						$cek_stok="	SELECT idbuku FROM buku 
									WHERE idbuku='".$idbuku."'
									AND stock = 0 ";
						$result_buku  = mysqli_query($con,$cek_buku)  or die(mysqli_error($con));
						$result_stok  = mysqli_query($con,$cek_stok)  or die(mysqli_error($con));
						$row_buku = mysqli_fetch_array($result_buku);
						$row_stok = mysqli_fetch_array($result_stok);
						if ($idbuku == ''){
							$error_idbuku = "<text style=\"color:red;\" class=\"glyphicon glyphicon-remove\">&nbsp;Harap Masukkan ID Buku</text>";
							$valid_idbuku = FALSE;
						}elseif($row_buku == 0){
							$error_idbuku= "<text style=\"color:red;\" class=\"glyphicon glyphicon-remove\">&nbsp;Buku Tidak Ditemukan</text>";
							$valid_idbuku= FALSE;
						}elseif($row_stok > 0){
							$error_idbuku= "<text style=\"color:red;\" class=\"glyphicon glyphicon-remove\">&nbsp;Stok Buku Habis</text>";
							$valid_idbuku= FALSE;
						}else{
							$valid_idbuku = TRUE;
						}
						
						//update data into database
						if ($valid_nim && $valid_idbuku == TRUE){ 
							//Asign a query
							$query1 = " INSERT INTO peminjaman (nim, idpetugas, tgl_pinjam, tgl_kembali, status_peminjaman)
										VALUES ('".$nim."','".$idpetugas."',CURDATE(),DATE_ADD(CURDATE(), INTERVAL 2 WEEK),'Y')";
							$query2 = "	INSERT INTO detail_pinjam (idbuku, idpetugas)
										VALUES ('".$idbuku."','".$idpetugas."')";
							$query3 = "	UPDATE buku
										SET stock = stock - 1
										WHERE idbuku = '".$idbuku."' ";
							// Execute the query
							$result1 = mysqli_query($con,$query1);
							$result2 = mysqli_query($con,$query2);
							$result3 = mysqli_query($con,$query3);
							if (!$result1){
								die ("Could not query the database1: <br />". mysqli_error($con));
							}else if (!$result2){
								die ("Peminjaman buku berhasil ditambahkan<br />". mysqli_error($con));
							}else if (!$result3){
								die ("Could not query the database3: <br />". mysqli_error($con));
							}else if ($result1 && $result2 && $result3){
								echo "<div class=\"alert alert-success\">
									<span class=\"glyphicon glyphicon-ok\"></span> 
									Data Telah Ditambahkan
						   	      </div>";		
							}
						}
						}
					?>
					<form class="form-horizontal" method="POST" autocomplete="on" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
						<div class="form-group">
							<label class="col-sm-2 control-label">NIM</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="nim" id="nim" placeholder="Masukkan NIM">
								<?php if(!empty($error_nim)) echo $error_nim; ?>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-2 control-label">ID Buku</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="idbuku" id="idbuku" placeholder="Masukkan ID Buku">
								<?php if(!empty($error_idbuku)) echo $error_idbuku; ?>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<button type="submit" name="submit" class="btn btn-default" value="submit">SUBMIT</button>
							</div>
						</div>
					</form>
				</div>
			</div>
			
			<div class="row">
				<div class="well col-md-5" style="background-color:#eee;">
					<h3> Hasil Pencarian </h3>
					<div id="searchresults"><ul id="results" class="update"></ul></div>
				</div>
			</div>
		</div>

	</body>
</html>

<?php
		mysqli_close($con);
	}
?>