<?php 
	session_start();
	include_once 'conexao.php';

	//cadastro de operadores no banco de dados

	$operador= filter_input(INPUT_POST, 'operador');
	$nome = filter_input(INPUT_POST, 'nome');


	try {
		$sql = "CREATE TABLE IF NOT EXISTS cadastro_op( id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, operador INT(6) NOT NULL, nome VARCHAR(255) NOT NULL, created DATETIME NOT NULL)";
		$conn->exec($sql);
		if (!$sql === false) {
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql2 = "INSERT INTO cadastro_op (operador, nome, created) VALUES ('$operador', '$nome', NOW())";
		 	$conn->exec($sql2);
		} 
	}catch(PDOException $e) {
	 	 echo $sql . "<br>" . $e->getMessage();
		}

	$conn = null;

	if(!$sql === false){
		$_SESSION['msg'] = "<p style='color:green;'>Operador Cadastrado com Sucesso!</p>";
		header("Location: cadastro.php");
		
	}else{
		$_SESSION['msg'] = "<p style='color:red;'>Operador Não Cadastrado com Sucesso!</p>";
		header("Location: cadastro.php");
		
	}




	//criação de usuarios que farão login
		
	
?>