<?php
	 
	$conn2 = new PDO("mysql:host=localhost;dbname=sacolas", 'root', '');

	$conn = new PDO("mysql:host=localhost;dbname=usuarios", 'root', '');
	


	$servidor = "localhost";
	$usuario = "root";
	$senha = "";
	$dbname = "usuarios";
	$conn3 = mysqli_connect($servidor, $usuario, $senha, $dbname);
		
	
	$servidor = "localhost";
	$usuario = "root";
	$senha = "";
	$dbname = "sacolas";
	$conn4 = mysqli_connect($servidor, $usuario, $senha, $dbname);
?>