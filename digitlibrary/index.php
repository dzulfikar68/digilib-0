<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Login Perpustakaan</title>
		<link style="type/css" rel="stylesheet" href="index.css" />
		<link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
		<script src="assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<link href="assets/css/style.css" rel="stylesheet" type="text/css">
	</head>
	
	<body style="background-color:#444349;">
		<header>
			<h1 style="color:white; text-align:center;">Perpustakaan Online</h1>
		</header>
		
		<div class="container">
			<div class="well col-sm-4 col-sm-offset-4 login-box-t" style="background-color:#D9D9DB;">
				<h3>Masuk Sebagai</h3>
				
				<ul class="nav nav-tabs">
					<li class="active"><a data-toggle="tab" href="#home">Mahasiswa</a></li>
					<li><a data-toggle="tab" href="#menu1">Petugas</a></li>
				</ul>

				<div class="tab-content">
					<div id="home" class="tab-pane fade in active">
						<br/>
						<?php
							if(isset($_GET['input'])){
						?>
						
						<div class="alert alert-danger">
							<span class="glyphicon glyphicon-info-sign"></span> 
							NIM atau Password Salah!
						</div>
						
						<?php
							}
						?>
				
						<form action="login_mhs.php" method="post"><!--ke file proses login-->
							<div class="form-group has-feedback">
								<input class="form-control" type="text" name="nim" id="nim" placeholder="NIM" maxlength="30" required autofocus/><!--auto focus kursor-->
							</div>
							
							<div class="form-group has-feedback">
								<input class="form-control" type="password" name="password" id="password" placeholder="Kata Sandi" maxlength="30"  required/></td>
							</div>
							<input class="btn btn-primary btn-block" type="submit" value="Masuk"><!--tombol-->
						</form>
					</div>
				
					<div id="menu1" class="tab-pane fade">
						<br/>
						<?php
							if(isset($_GET['inputp'])){
						?>
					
						<div class="alert alert-danger">
							<span class="glyphicon glyphicon-info-sign"></span> 
							ID atau Password Salah!
						</div>
						
						<?php
							}
						?>
				
						<form action="login_petugas.php" method="post"><!--ke file proses login-->
							<div class="form-group has-feedback">
								<input class="form-control" type="text" name="idpetugas" id="idpetugas" placeholder="ID" maxlength="30" required autofocus/><!--auto focus kursor-->
							</div>
							
							<div class="form-group has-feedback">
								<input class="form-control" type="password" name="password" id="password" placeholder="Kata Sandi" maxlength="30"  required/></td>
							</div>
							
							<input class="btn btn-primary btn-block" type="submit" value="Masuk"><!--tombol-->
						</form>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>