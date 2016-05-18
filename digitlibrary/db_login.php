<!--
	Nama		: M. Luthfiadi Setiapratama
	NIM 		: 24010313140096
	File 		: db_login.php
	Deskripsi 	: login database
	Tanggal 	: 30-11-2015
-->
<?php
	$db_host = 'localhost';	
	$db_database = 'db_perpus';	
	$db_username = 'root';	
	$db_password = '';	
	
	$db = new mysqli($db_host, $db_username, $db_password, $db_database);
	if ($db->connect_errno){
		die ("Could not connect to the database: <br />". $db->connect_error);
	}
?>