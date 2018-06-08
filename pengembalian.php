<?php
	session_start();

	if(isset($_SESSION["idpetugas"])) {
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Pengembalian Buku</title>
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
						url: "pengembalian_cariMHS.php",
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
						<li><a href="peminjaman.php"><span class="glyphicon glyphicon-import"></span>&nbsp;&nbsp;Peminjaman</a></li>
						<li class="active"><a href="pengembalian.php"><span class="glyphicon glyphicon-export"></span>&nbsp;&nbsp;Pengembalian</a></li> 
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
				<div class="well col-md-10 col-md-offset-1" style="background-color:#eee;">
			<h3>Cari Mahasiswa</h3>
					<form class="form-horizontal" method="post" action="pengembalian_cariMHS.php">
						<div class="form-group">
							<div class="col-sm-5">
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
				</div>
				<br>
			<div class="row">
				<div class="well col-md-10 col-md-offset-1" style="background-color:#eee;">
					<h3> Hasil Pencarian </h3>
					<div id="searchresults"><ul id="results" class="update"></ul></div>
					<br/>
				</div>
			</div>	
		</div>
	</body>
</html>

<?php
}
?>