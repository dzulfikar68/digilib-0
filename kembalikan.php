<?php
	// connect database
	require_once('db_login.php');
	// Connect
	$con = mysqli_connect($db_host, $db_username, $db_password, $db_database);
	if (mysqli_connect_errno()){
		die ("Could not connect to the database: <br />". mysqli_connect_error( ));
	}
	$idpinjam=$_GET['idpinjam'];
	
	$query1 = "	UPDATE peminjaman 
				SET status_peminjaman='T' 
				WHERE idpinjam=".$idpinjam." ";
	$query2 = "	UPDATE detail_pinjam 
				SET tgl_kembali_real=CURDATE()
				WHERE idpinjam=".$idpinjam." ";
	$query3 = "	UPDATE buku INNER JOIN detail_pinjam
				ON buku.idbuku = detail_pinjam.idbuku
				SET buku.stock = buku.stock + 1
				WHERE detail_pinjam.idpinjam = ".$idpinjam." ";
	$result1 = mysqli_query($con,$query1);
	$result2 = mysqli_query($con,$query2);
	$result3 = mysqli_query($con,$query3);
	if (!$result1){
		die ("Could not query the database: <br />". mysqli_error($con));
	}elseif(!$result2){
		die ("Could not query the database: <br />". mysqli_error($con));
	}elseif(!$result3){
		die ("Could not query the database: <br />". mysqli_error($con));
	}elseif ($result1 && $result2 && $result3){
		header("Location:pengembalian.php");		
	}
?>