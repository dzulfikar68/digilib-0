<?php
	session_start();
	
	$message="";
	
	$nim=$_POST["nim"];
	$password=$_POST["password"];
	
	if(count($_POST) > 0) {
		$conn = mysql_connect("ap-cdbr-azure-southeast-b.cloudapp.net","bf00621f72c1dc","76435f6b");
		mysql_select_db("db_perpus",$conn);
		$result = mysql_query("SELECT * FROM mahasiswa WHERE nim='" . $nim . "' and password = '". $password."'");
		$row  = mysql_fetch_array($result);

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
