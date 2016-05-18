<?php
	session_start();

	unset($_SESSION['idpetugas']);
	unset($_SESSION['password']);

	session_destroy(); 

	header('location:index.php');
?>