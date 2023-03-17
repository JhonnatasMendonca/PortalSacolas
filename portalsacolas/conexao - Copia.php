<?php
	 
	$conn2 = new PDO("mysql:host=srvsave264;dbname=atacadao", 'filial264', 'senhafilial');

	$conn = new PDO("mysql:host=srvsave264;dbname=atacadao", 'filial264', 'senhafilial');
	


	$servidor = "srvsave264";
	$usuario = "filial264";
	$senha = "senhafilial";
	$dbname = "atacadao";
	$conn3 = mysqli_connect($servidor, $usuario, $senha, $dbname);
		
	
	$servidor = "srvsave264";
	$usuario = "filial264";
	$senha = "senhafilial";
	$dbname = "atacadao";
	$conn4 = mysqli_connect($servidor, $usuario, $senha, $dbname);
?>