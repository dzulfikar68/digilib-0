<?php
	session_start();
	
	$message="";
	
	$nim=$_POST["nim"];
	$password=$_POST["password"];
	
	if(count($_POST) > 0) {
		$conn = mysqli_connect("localhost", "root", "");

		$db_select = mysqli_select_db($conn, "db_perpus");
		if (!$db_select){
			die ("Could not select the database: <br />".mysqli_error($conn));
		}
		
		$q = "SELECT * FROM mahasiswa WHERE nim='" . $nim . "' and password = '". $password."'";
		$result = mysqli_query($conn, $q);
		if (!$result){
			die ("Could not query the database: <br />". mysqli_error($conn));
		}	

		$row = mysqli_fetch_array($result);

		if(is_array($row)) {
			$_SESSION["nama"] = $row[nama];
			$_SESSION["nim"] = $row[nim];
		}
	}
	
	if(isset($_SESSION["nim"])) {
		header("Location:index_mhs.php");
	}else{
		header("Location:index.php?input=incorrect");
	}
?>
