<?php
	session_start();
	
	$message="";
	
	$idpetugas=$_POST["idpetugas"];
	$password=$_POST["password"];
	
	if(count($_POST) > 0) {
		$conn = mysql_connect("ap-cdbr-azure-southeast-b.cloudapp.net","bf00621f72c1dc","76435f6b");
		mysql_select_db("db_perpus",$conn);
		$result = mysql_query("SELECT * FROM petugas WHERE idpetugas='" . $idpetugas . "' and password = '". $password."'");
		$row  = mysql_fetch_array($result);

		if(is_array($row)) {
			$_SESSION["nama"] = $row[nama];
			$_SESSION["idpetugas"] = $row[idpetugas];
		}
	}
	
	if(isset($_SESSION["idpetugas"])) {
		header("Location:index_petugas.php");
	}else{
		header("Location:index.php?inputp=incorrect");
		
	}
?>
