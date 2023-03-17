<?php 
	session_start();
	date_default_timezone_set('America/sao_paulo');
	include_once 'conexao.php';

	//cadastro de operadores no banco de dados

	if (isset($_POST['cadastrarOperador'])) {
		$operador = $_POST['operador'];
		$nome = strtoupper($_POST['nome']);

		$pesquisa_op = $conn2->prepare("SELECT * FROM cadastro_op WHERE operador = '$operador'");
		$pesquisa_op->execute();
		$row = $pesquisa_op->fetch(); 
		$resultado_nome_op = $row['nome'];
		$resultado_op = $row['operador'];

		if (isset($resultado_op)) {
			
			$_SESSION['msg'] = "<p><script>alert('Operador já vinculado ao usuário: $resultado_nome_op');</script></p>";
			header("Location: cadastro.php");
		}else{
			echo "<script>alert('Operador Cadastrado com Sucesso!');</script>";
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql2 = "INSERT INTO cadastro_op (operador, nome, created) VALUES ('$operador', '$nome', NOW())";
			$conn->exec($sql2);
			
			$_SESSION['msg'] = "<p><script>alert('Operador Cadastrado com Sucesso!');</script></p>";
			header("Location: cadastro.php");
		}
	}
?>