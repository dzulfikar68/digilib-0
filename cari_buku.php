<!DOCTYPE html>
<?php
	session_start();

	if(isset($_SESSION["nim"])) {
?>

<html lang="en">
	<head>
		<title>Pencarian Buku</title>
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
			
			//--------------------------
		?>
		<script type="text/javascript">
			$(function() {
				$(".search_button").click(function() {
					// getting the value that user typed
					var searchString    = $("#search_box").val();
					// forming the queryString
					var data            = 'search='+ searchString;
					
					// if searchString is not empty
					if(searchString) {
						// ajax call
						$.ajax({
						type: "POST",
						url: "tabel_buku.php",
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
				
				$(".search_button1").click(function() {
					// getting the value that user typed
					var searchString1    = $("#judul").val();
					var searchString2    = $("#pengarang").val();
					var searchString3    = $("#fakultas").val();
					searchString3 = encodeURIComponent(searchString3.trim())
					
					// forming the queryString
					var data = 'judul='+ searchString1 +'&pengarang='+ searchString2+'&fakultas='+ searchString3;
					
					// if searchString is not empty
					if(searchString1 || searchString2 || searchString3) {
						// ajax call
						$.ajax({
						type: "POST",
						url: "tabel_buku1.php",
						data: data,
						beforeSend: function(html) { // this happens before actual call
							$("#results").html(''); 
							$("#searchresults").show();
							$(".judul").html(searchString1);
							$(".pengarang").html(searchString2);
							$(".fakultas").html(searchString3);
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
						<li><a href="index_mhs.php"><span class="glyphicon glyphicon-home"></span>&nbsp;&nbsp;Beranda</a></li>
						<li class="active"><a href="cari_buku.php"><span class="glyphicon glyphicon-search"></span>&nbsp;&nbsp;Pencarian Buku</a></li>
						<li><a href="riwayat_pinjam.php"><span class="glyphicon glyphicon-book"></span>&nbsp;&nbsp;Riwayat Peminjaman</a></li> 
					</ul>
	  
					<ul class="nav navbar-nav navbar-right">
						<li><a href="#"><span class="glyphicon glyphicon-user"></span> &nbsp; <?php echo $_SESSION['nama'];?> </a></li>
						<li><a href="logout_mhs.php"><span class="glyphicon glyphicon-log-out"></span> &nbsp; Keluar</a></li>
					</ul>
	  
				</div>
			</div>
		</nav>
		
		<div class="container">
			<br/><br/><br/><br/>
			<div class="row">
				<div class="well col-md-4" style="background-color:#eee;">	
					<h3>Pencarian Buku</h3>
						<form class="form-horizontal" method="post" action="tabel_buku.php">
							<div class="form-group ">
								<div class="col-sm-10">
									<input type="text" name="search" id="search_box" class='form-control search_box' placeholder="Masukkan Kata Kunci Pencarian">
								</div>
							</div>
							<div class="form-group">
								<div class=" col-sm-10">
									<button type="submit" value="search" class="btn btn-primary search_button">Cari</button>
								</div>
							</div>
						</form>
			
						<br/><br/>
						<button data-toggle="collapse" data-target="#demo" class="btn btn-primary">Pencarian Lebih Detail</button>
						
						<div id="demo" class="collapse">
						<br>
						<form class="form-horizontal" method="POST" action="tabel_buku1.php">
							<div class="form-group ">	
								<div class="form-group">		
									<div class="col-sm-10 col-sm-offset-1">
										<input type="text" name="judul" id="judul" class='form-control judul' placeholder="Masukkan Judul Buku">
									</div>
								</div>
						
								<div class="form-group">
									<div class="col-sm-10 col-sm-offset-1">
										<input type="text" name="pengarang" id="pengarang" class='form-control pengarang' placeholder="Masukkan Nama Pengarang">
									</div>
								</div>
				
								<div class="form-group">
									<div class="col-sm-10 col-sm-offset-1">
										<select name="fakultas" id="fakultas" class="form-control">
											<option value=""> Pilih Fakultas </option>
											<?php
												$query = "select * from fakultas";
			
												$result = mysqli_query($connection,$query);
												if (!$result){
													die ("Could not query the database: <br />". mysqli_error($connection));
												}
								
												while ($row = mysqli_fetch_array($result)){ 
													$fid = $row['idfakultas']; 
													$fname = $row['nama']; 
													echo '<option value='.$fid.'>'.$fname.'<br/></option>';
												} 
											?> 
										</select>
									</div>
								</div>
				
								<div class="form-group">
									<div class="col-sm-10 col-sm-offset-1">
										<button type="submit" value="search" class="btn btn-primary search_button1">Cari</button>
									</div>
								</div>
							</div>
						</form>
					</div>
					<br><br>
				</div>
				
				<div class="well col-md-7 col-md-offset-1" style="background-color:#eee;">
					<h3> Hasil Pencarian </h3>
					<div id="searchresults"><ul id="results" class="update"></ul></div>
					<br>
				</div>
		</div>	
	</body>
</html>

<?php
}
?>