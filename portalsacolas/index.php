<?php
	session_start();
	if (isset($_SESSION["usuario"])) {
		$adm = $_SESSION["usuario"][1];
		$nome = $_SESSION["usuario"][0];
	}else{
		echo "<script>window.location = 'login2.php'</script>";
	}
	include 'header.php';
	include 'conexao.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Portal-sacolas</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="faixa">
		<h2>Bem-vindo!!</h2>
		<h4><?php echo($nome) ?></h4>
	</div><!--faixa-->
<table>
	<?php 
	//retirada
if(isset($_POST['retirar'])){
	$data_mes = date('m');
	if ($data_mes == 1) {

		$cpd = "CREATE TABLE IF NOT EXISTS sacolas_cpd_janeiro( id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY, operador INT(6) NOT NULL, nome VARCHAR(255) NOT NULL, retirada INT NOT NULL, devolvidas INT NOT NULL, total INT NOT NULL, data DATE NOT NULL, created DATETIME NOT NULL, nome_lancado VARCHAR(100) NOT NULL)";
		$conn2->exec($cpd);
		$Operador = $_POST['operador'];
		$Nome = $_POST['nome'];
		$Retirada = $_POST['retirada'];
		$Data = $_POST['data'];
		$Devolvidas = "";
		$total = "";
		$nome2 = $_SESSION["usuario"][0];

		$pesquisa_nome = $conn->prepare("SELECT * FROM cadastro_usuarios_lancamentos WHERE nome = '$nome2'");
		$pesquisa_nome->execute();
		$row = $pesquisa_nome->fetch();
		$result_nome = $row['nome'];

		try{
			$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO sacolas_cpd_janeiro(id, operador, nome, retirada, devolvidas, data, created, total, nome_lancado) VALUES(null, '$Operador', '$Nome', '$Retirada', '$Devolvidas', '$Data', NOW(), '$total', '$result_nome')";
			$conn2->exec($sql);
			$last_id = $conn2->lastInsertId();
		}catch(PDOException $e) {
			echo $sql . "<br>" . $e->getMessage();
		}

		$sql = "CREATE TABLE IF NOT EXISTS sacolas_janeiro( id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY, operador INT(6) NOT NULL, nome VARCHAR(255) NOT NULL, retirada INT NOT NULL, devolvidas INT NOT NULL, total INT NOT NULL, data DATE NOT NULL, created DATETIME NOT NULL, nome_lancado VARCHAR(100) NOT NULL)";
		$conn2->exec($sql);
		if(!$sql === false){
			$Operador = $_POST['operador'];
			$Nome = $_POST['nome'];
			$Retirada = $_POST['retirada'];
			$Data = $_POST['data'];
			$Devolvidas = "";
			$total = "";
			$nome2 = $_SESSION["usuario"][0];

				$pesquisa_nome = $conn->prepare("SELECT * FROM cadastro_usuarios_lancamentos WHERE nome = '$nome2'");
				$pesquisa_nome->execute();
				$row = $pesquisa_nome->fetch();
				$result_nome = $row['nome'];
			try{
				$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "INSERT INTO sacolas_janeiro(id, operador, nome, retirada, devolvidas, data, created, total, nome_lancado) VALUES(null, '$Operador', '$Nome', '$Retirada', '$Devolvidas', '$Data', NOW(), '$total', '$result_nome')";
				$conn2->exec($sql);
				$last_id = $conn2->lastInsertId();
			}catch(PDOException $e) {
				echo $sql . "<br>" . $e->getMessage();
			}

			$conta_devolvida2 = $conn2->prepare("SELECT devolvidas FROM sacolas_janeiro WHERE operador = '$Operador'AND data = '$Data'");
			$conta_devolvida2->execute();
			$row = $conta_devolvida2->fetch(); 
			$valor_devolvido2 = $row['devolvidas'];

			$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$checagem = $conn2->prepare("SELECT operador, nome, data FROM sacolas_janeiro WHERE operador = '$Operador' AND nome = '$Nome' AND data = '$Data'");
			$checagem->execute();
			if (!$checagem === false) {
				$checagem2 = $conn2->prepare("SELECT * FROM  sacolas_janeiro WHERE operador = '$Operador' AND nome = '$Nome' AND data = '$Data'");
				$checagem2->execute();
				$row = $checagem2->fetch();
				$id = $row['id'];
				$retirada2 = $row['retirada'];
				echo "<script>alert('Retiradas Existente: $retirada2 Sacolas');</script>";


				try{
					$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$sql2 = "UPDATE sacolas_janeiro SET operador = '$Operador', nome = '$Nome', retirada = '$Retirada',devolvidas = '$Devolvidas', data = '$Data', total = '$total',created = NOW(), nome_lancado = '$result_nome' WHERE id = '$id' ";
					$conn2->exec($sql2);
				}catch(PDOException $e) {
					echo $sql2 . "<br>" . $e->getMessage();
				}
				$checagem3 = "SELECT COUNT(*) AS Contagem_registro FROM sacolas_janeiro WHERE operador = '$Operador' AND nome = '$Nome' AND retirada = '$Retirada' AND devolvidas = '$Devolvidas' AND data = '$Data'";
				$sql3 = $conn2->prepare($checagem3);
				$sql3->execute();
				$row2 = $sql3->fetch(PDO::FETCH_ASSOC);
				if ($row2['Contagem_registro'] >= 2) {
					try{
						$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						$sql2 = "DELETE  FROM  sacolas_janeiro WHERE operador = '$Operador' AND nome = '$Nome' AND retirada = '$Retirada' AND devolvidas = '$Devolvidas' AND data = '$Data' AND id = '$last_id'";
						$conn2->exec($sql2);
					}catch(PDOException $e) {
						echo $sql2 . "<br>" . $e->getMessage();
					}

					$checagem4 = $conn2->prepare("SELECT * FROM  sacolas_janeiro WHERE operador = '$Operador' AND nome = '$Nome' AND data = '$Data'");
					$checagem4->execute();
					$row = $checagem4->fetch();
					$retirada3 = $row['retirada'];
					echo "<script>alert('Retiradas Atual: $retirada3 Sacolas');</script>";


					$Retirada4 = $_POST['retirada'];
					$listagem2 = $conn2->prepare("SELECT SUM('$retirada2' + '$Retirada4') as soma_retirada FROM sacolas_janeiro WHERE operador = '$Operador' AND nome = '$Nome' AND retirada = '$Retirada' AND devolvidas = '$Devolvidas' AND data = '$Data'");
					$listagem2->execute();
					$row = $listagem2->fetch(); 
					$soma = $row['soma_retirada'];
					echo "<script>alert('$Nome já Retirou: $soma Sacolas');</script>";

					try{
							$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql2 = "UPDATE sacolas_janeiro SET retirada = '$soma' WHERE id = '$id' ";
							$conn2->exec($sql2);
					}catch(PDOException $e) {
							echo $sql2 . "<br>" . $e->getMessage();
					}

					try{
						$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						$sql = "UPDATE sacolas_janeiro SET devolvidas = '$valor_devolvido2', created = NOW(), nome_lancado = '$result_nome'  WHERE operador = '$Operador'AND data = '$Data'";
						$conn2->exec($sql);
					}catch(PDOException $e) {
						echo $sql . "<br>" . $e->getMessage();
					}

					$listagem3 = $conn2->prepare("SELECT SUM(retirada - devolvidas) as soma_retirada FROM sacolas_janeiro WHERE operador = '$Operador'AND data = '$Data' ");
					$listagem3->execute();
					$row = $listagem3->fetch(); 
					$soma = $row['soma_retirada'];
					try{
						$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						$sql = "UPDATE sacolas_janeiro SET total = '$soma', created = NOW(), nome_lancado = '$result_nome'  WHERE operador = '$Operador'AND data = '$Data'";
						$conn2->exec($sql);
					}catch(PDOException $e) {
						echo $sql . "<br>" . $e->getMessage();
					}

				}			
			}				
		}			
	}
}

			//devolução
if(isset($_POST['devolver'])){
	$data_mes = date('m');
	if ($data_mes == 1){
		$sql = "CREATE TABLE IF NOT EXISTS sacolas_cpd_janeiro( id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY, operador INT(6) NOT NULL, nome VARCHAR(255) NOT NULL, retirada INT NOT NULL, devolvidas INT NOT NULL, total INT NOT NULL, data DATE NOT NULL, created DATETIME NOT NULL, nome_lancado VARCHAR(100) NOT NULL)";
		$conn2->exec($sql);
		
			$Operador = $_POST['operador'];
			$Nome = $_POST['nome'];
			$Devolvidas = $_POST['devolvida'];
			$Data = $_POST['data'];	
			$nome2 = $_SESSION["usuario"][0];

				$pesquisa_nome = $conn->prepare("SELECT * FROM cadastro_usuarios_lancamentos WHERE nome = '$nome2'");
				$pesquisa_nome->execute();
				$row = $pesquisa_nome->fetch();
				$result_nome = $row['nome'];


			try{
				$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "INSERT INTO sacolas_cpd_janeiro(id, operador, nome, retirada, devolvidas, data, created, total, nome_lancado) VALUES(null, '$Operador', '$Nome', 0, '$Devolvidas', '$Data', NOW(), 0, '$result_nome')";
				$conn2->exec($sql);
			}catch(PDOException $e) {
				echo $sql . "<br>" . $e->getMessage();
			}

		$sql = "CREATE TABLE IF NOT EXISTS sacolas_janeiro( id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY, operador INT(6) NOT NULL, nome VARCHAR(255) NOT NULL, retirada INT NOT NULL, devolvidas INT NOT NULL, total INT NOT NULL, data DATE NOT NULL, created DATETIME NOT NULL, nome_lancado VARCHAR(100) NOT NULL)";
		$conn2->exec($sql);
		if(!$sql === false){
			$Operador = $_POST['operador'];
			$Devolvidas = $_POST['devolvida'];
			$Data = $_POST['data'];	
			$nome2 = $_SESSION["usuario"][0];

				$pesquisa_nome = $conn->prepare("SELECT * FROM cadastro_usuarios_lancamentos WHERE nome = '$nome2'");
				$pesquisa_nome->execute();
				$row = $pesquisa_nome->fetch();
				$result_nome = $row['nome'];

			$conta_devolvida = $conn2->prepare("SELECT devolvidas FROM sacolas_janeiro WHERE operador = '$Operador'AND data = '$Data'");
			$conta_devolvida->execute();
			$row = $conta_devolvida->fetch(); 
			$valor_devolvido = $row['devolvidas'];

			try{
				$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "UPDATE sacolas_janeiro SET devolvidas = '$Devolvidas', created = NOW(), nome_lancado = '$result_nome' WHERE operador = '$Operador'AND data = '$Data'";
				$conn2->exec($sql);
			}catch(PDOException $e) {
				echo $sql . "<br>" . $e->getMessage();
			}

			$listagem2 = $conn2->prepare("SELECT SUM('$valor_devolvido' + devolvidas) as soma_retirada FROM sacolas_janeiro WHERE operador = '$Operador'AND data = '$Data' ");
			$listagem2->execute();
			$row = $listagem2->fetch(); 
			$soma = $row['soma_retirada'];

			$listagem2 = $conn2->prepare("SELECT SUM(retirada - devolvidas) as soma_retirada FROM sacolas_janeiro WHERE operador = '$Operador'AND data = '$Data' ");
			$listagem2->execute();
			$row = $listagem2->fetch(); 
			$soma = $row['soma_retirada'];
			try{
				$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "UPDATE sacolas_janeiro SET total = '$soma', created = NOW(),  nome_lancado = '$result_nome'  WHERE operador = '$Operador'AND data = '$Data'";
				$conn2->exec($sql);
			}catch(PDOException $e) {
				echo $sql . "<br>" . $e->getMessage();
			}
		}		
	}
}


//retirada
if(isset($_POST['retirar'])){
	$data_mes = date('m');
	if ($data_mes == 2) {

		$cpd = "CREATE TABLE IF NOT EXISTS sacolas_cpd_fevereiro( id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY, operador INT(6) NOT NULL, nome VARCHAR(255) NOT NULL, retirada INT NOT NULL, devolvidas INT NOT NULL, total INT NOT NULL, data DATE NOT NULL, created DATETIME NOT NULL, nome_lancado VARCHAR(100) NOT NULL)";
		$conn2->exec($cpd);
		$Operador = $_POST['operador'];
		$Nome = $_POST['nome'];
		$Retirada = $_POST['retirada'];
		$Data = $_POST['data'];
		$Devolvidas = "";
		$total = "";
		$nome2 = $_SESSION["usuario"][0];

		$pesquisa_nome = $conn->prepare("SELECT * FROM cadastro_usuarios_lancamentos WHERE nome = '$nome2'");
		$pesquisa_nome->execute();
		$row = $pesquisa_nome->fetch();
		$result_nome = $row['nome'];

		try{
			$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO sacolas_cpd_fevereiro(id, operador, nome, retirada, devolvidas, data, created, total, nome_lancado) VALUES(null, '$Operador', '$Nome', '$Retirada', '$Devolvidas', '$Data', NOW(), '$total', '$result_nome')";
			$conn2->exec($sql);
			$last_id = $conn2->lastInsertId();
		}catch(PDOException $e) {
			echo $sql . "<br>" . $e->getMessage();
		}

		$sql = "CREATE TABLE IF NOT EXISTS sacolas_fevereiro( id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY, operador INT(6) NOT NULL, nome VARCHAR(255) NOT NULL, retirada INT NOT NULL, devolvidas INT NOT NULL, total INT NOT NULL, data DATE NOT NULL, created DATETIME NOT NULL, nome_lancado VARCHAR(100) NOT NULL)";
		$conn2->exec($sql);
		if(!$sql === false){
			$Operador = $_POST['operador'];
			$Nome = $_POST['nome'];
			$Retirada = $_POST['retirada'];
			$Data = $_POST['data'];
			$Devolvidas = "";
			$total = "";
			$nome2 = $_SESSION["usuario"][0];

				$pesquisa_nome = $conn->prepare("SELECT * FROM cadastro_usuarios_lancamentos WHERE nome = '$nome2'");
				$pesquisa_nome->execute();
				$row = $pesquisa_nome->fetch();
				$result_nome = $row['nome'];
			try{
				$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "INSERT INTO sacolas_fevereiro(id, operador, nome, retirada, devolvidas, data, created, total, nome_lancado) VALUES(null, '$Operador', '$Nome', '$Retirada', '$Devolvidas', '$Data', NOW(), '$total', '$result_nome')";
				$conn2->exec($sql);
				$last_id = $conn2->lastInsertId();
			}catch(PDOException $e) {
				echo $sql . "<br>" . $e->getMessage();
			}

			$conta_devolvida2 = $conn2->prepare("SELECT devolvidas FROM sacolas_fevereiro WHERE operador = '$Operador'AND data = '$Data'");
			$conta_devolvida2->execute();
			$row = $conta_devolvida2->fetch(); 
			$valor_devolvido2 = $row['devolvidas'];

			$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$checagem = $conn2->prepare("SELECT operador, nome, data FROM sacolas_fevereiro WHERE operador = '$Operador' AND nome = '$Nome' AND data = '$Data'");
			$checagem->execute();
			if (!$checagem === false) {
				$checagem2 = $conn2->prepare("SELECT * FROM  sacolas_fevereiro WHERE operador = '$Operador' AND nome = '$Nome' AND data = '$Data'");
				$checagem2->execute();
				$row = $checagem2->fetch();
				$id = $row['id'];
				$retirada2 = $row['retirada'];
				echo "<script>alert('Retiradas Existente: $retirada2 Sacolas');</script>";


				try{
					$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$sql2 = "UPDATE sacolas_fevereiro SET operador = '$Operador', nome = '$Nome', retirada = '$Retirada',devolvidas = '$Devolvidas', data = '$Data', total = '$total',created = NOW(), nome_lancado = '$result_nome' WHERE id = '$id' ";
					$conn2->exec($sql2);
				}catch(PDOException $e) {
					echo $sql2 . "<br>" . $e->getMessage();
				}
				$checagem3 = "SELECT COUNT(*) AS Contagem_registro FROM sacolas_fevereiro WHERE operador = '$Operador' AND nome = '$Nome' AND retirada = '$Retirada' AND devolvidas = '$Devolvidas' AND data = '$Data'";
				$sql3 = $conn2->prepare($checagem3);
				$sql3->execute();
				$row2 = $sql3->fetch(PDO::FETCH_ASSOC);
				if ($row2['Contagem_registro'] >= 2) {
					try{
						$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						$sql2 = "DELETE  FROM  sacolas_fevereiro WHERE operador = '$Operador' AND nome = '$Nome' AND retirada = '$Retirada' AND devolvidas = '$Devolvidas' AND data = '$Data' AND id = '$last_id'";
						$conn2->exec($sql2);
					}catch(PDOException $e) {
						echo $sql2 . "<br>" . $e->getMessage();
					}

					$checagem4 = $conn2->prepare("SELECT * FROM  sacolas_fevereiro WHERE operador = '$Operador' AND nome = '$Nome' AND data = '$Data'");
					$checagem4->execute();
					$row = $checagem4->fetch();
					$retirada3 = $row['retirada'];
					echo "<script>alert('Retiradas Atual: $retirada3 Sacolas');</script>";


					$Retirada4 = $_POST['retirada'];
					$listagem2 = $conn2->prepare("SELECT SUM('$retirada2' + '$Retirada4') as soma_retirada FROM sacolas_fevereiro WHERE operador = '$Operador' AND nome = '$Nome' AND retirada = '$Retirada' AND devolvidas = '$Devolvidas' AND data = '$Data'");
					$listagem2->execute();
					$row = $listagem2->fetch(); 
					$soma = $row['soma_retirada'];
					echo "<script>alert('$Nome já Retirou: $soma Sacolas');</script>";

					try{
							$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql2 = "UPDATE sacolas_fevereiro SET retirada = '$soma' WHERE id = '$id' ";
							$conn2->exec($sql2);
					}catch(PDOException $e) {
							echo $sql2 . "<br>" . $e->getMessage();
					}

					try{
						$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						$sql = "UPDATE sacolas_fevereiro SET devolvidas = '$valor_devolvido2', created = NOW(), nome_lancado = '$result_nome'  WHERE operador = '$Operador'AND data = '$Data'";
						$conn2->exec($sql);
					}catch(PDOException $e) {
						echo $sql . "<br>" . $e->getMessage();
					}

					$listagem3 = $conn2->prepare("SELECT SUM(retirada - devolvidas) as soma_retirada FROM sacolas_fevereiro WHERE operador = '$Operador'AND data = '$Data' ");
					$listagem3->execute();
					$row = $listagem3->fetch(); 
					$soma = $row['soma_retirada'];
					try{
						$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						$sql = "UPDATE sacolas_fevereiro SET total = '$soma', created = NOW(), nome_lancado = '$result_nome'  WHERE operador = '$Operador'AND data = '$Data'";
						$conn2->exec($sql);
					}catch(PDOException $e) {
						echo $sql . "<br>" . $e->getMessage();
					}

				}			
			}				
		}			
	}
}
			//devolução
if(isset($_POST['devolver'])){
	$data_mes = date('m');
	if ($data_mes == 2){
		$sql = "CREATE TABLE IF NOT EXISTS sacolas_cpd_fevereiro( id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY, operador INT(6) NOT NULL, nome VARCHAR(255) NOT NULL, retirada INT NOT NULL, devolvidas INT NOT NULL, total INT NOT NULL, data DATE NOT NULL, created DATETIME NOT NULL, nome_lancado VARCHAR(100) NOT NULL)";
		$conn2->exec($sql);
		
			$Operador = $_POST['operador'];
			$Nome = $_POST['nome'];
			$Devolvidas = $_POST['devolvida'];
			$Data = $_POST['data'];	
			$nome2 = $_SESSION["usuario"][0];

				$pesquisa_nome = $conn->prepare("SELECT * FROM cadastro_usuarios_lancamentos WHERE nome = '$nome2'");
				$pesquisa_nome->execute();
				$row = $pesquisa_nome->fetch();
				$result_nome = $row['nome'];


			try{
				$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "INSERT INTO sacolas_cpd_fevereiro(id, operador, nome, retirada, devolvidas, data, created, total, nome_lancado) VALUES(null, '$Operador', '$Nome', 0, '$Devolvidas', '$Data', NOW(), 0, '$result_nome')";
				$conn2->exec($sql);
			}catch(PDOException $e) {
				echo $sql . "<br>" . $e->getMessage();
			}

		$sql = "CREATE TABLE IF NOT EXISTS sacolas_fevereiro( id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY, operador INT(6) NOT NULL, nome VARCHAR(255) NOT NULL, retirada INT NOT NULL, devolvidas INT NOT NULL, total INT NOT NULL, data DATE NOT NULL, created DATETIME NOT NULL, nome_lancado VARCHAR(100) NOT NULL)";
		$conn2->exec($sql);
		if(!$sql === false){
			$Operador = $_POST['operador'];
			$Devolvidas = $_POST['devolvida'];
			$Data = $_POST['data'];	
			$nome2 = $_SESSION["usuario"][0];

				$pesquisa_nome = $conn->prepare("SELECT * FROM cadastro_usuarios_lancamentos WHERE nome = '$nome2'");
				$pesquisa_nome->execute();
				$row = $pesquisa_nome->fetch();
				$result_nome = $row['nome'];

			$conta_devolvida = $conn2->prepare("SELECT devolvidas FROM sacolas_fevereiro WHERE operador = '$Operador'AND data = '$Data'");
			$conta_devolvida->execute();
			$row = $conta_devolvida->fetch(); 
			$valor_devolvido = $row['devolvidas'];

			try{
				$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "UPDATE sacolas_fevereiro SET devolvidas = '$Devolvidas', created = NOW(), nome_lancado = '$result_nome' WHERE operador = '$Operador'AND data = '$Data'";
				$conn2->exec($sql);
			}catch(PDOException $e) {
				echo $sql . "<br>" . $e->getMessage();
			}
			$listagem2 = $conn2->prepare("SELECT SUM('$valor_devolvido' + devolvidas) as soma_retirada FROM sacolas_fevereiro WHERE operador = '$Operador'AND data = '$Data' ");
			$listagem2->execute();
			$row = $listagem2->fetch(); 
			$soma = $row['soma_retirada'];
			$listagem2 = $conn2->prepare("SELECT SUM(retirada - devolvidas) as soma_retirada FROM sacolas_fevereiro WHERE operador = '$Operador'AND data = '$Data' ");
			$listagem2->execute();
			$row = $listagem2->fetch(); 
			$soma = $row['soma_retirada'];
			try{
				$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "UPDATE sacolas_fevereiro SET total = '$soma', created = NOW(),  nome_lancado = '$result_nome'  WHERE operador = '$Operador'AND data = '$Data'";
				$conn2->exec($sql);
			}catch(PDOException $e) {
				echo $sql . "<br>" . $e->getMessage();
			}
		}		
	}
}



//retirada
if(isset($_POST['retirar'])){
	$data_mes = date('m');
	if ($data_mes == 3) {

		$cpd = "CREATE TABLE IF NOT EXISTS sacolas_cpd_marco( id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY, operador INT(6) NOT NULL, nome VARCHAR(255) NOT NULL, retirada INT NOT NULL, devolvidas INT NOT NULL, total INT NOT NULL, data DATE NOT NULL, created DATETIME NOT NULL, nome_lancado VARCHAR(100) NOT NULL)";
		$conn2->exec($cpd);
		$Operador = $_POST['operador'];
		$Nome = $_POST['nome'];
		$Retirada = $_POST['retirada'];
		$Data = $_POST['data'];
		$Devolvidas = "";
		$total = "";
		$nome2 = $_SESSION["usuario"][0];

		$pesquisa_nome = $conn->prepare("SELECT * FROM cadastro_usuarios_lancamentos WHERE nome = '$nome2'");
		$pesquisa_nome->execute();
		$row = $pesquisa_nome->fetch();
		$result_nome = $row['nome'];

		try{
			$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO sacolas_cpd_marco(id, operador, nome, retirada, devolvidas, data, created, total, nome_lancado) VALUES(null, '$Operador', '$Nome', '$Retirada', '$Devolvidas', '$Data', NOW(), '$total', '$result_nome')";
			$conn2->exec($sql);
			$last_id = $conn2->lastInsertId();
		}catch(PDOException $e) {
			echo $sql . "<br>" . $e->getMessage();
		}

		$sql = "CREATE TABLE IF NOT EXISTS sacolas_marco( id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY, operador INT(6) NOT NULL, nome VARCHAR(255) NOT NULL, retirada INT NOT NULL, devolvidas INT NOT NULL, total INT NOT NULL, data DATE NOT NULL, created DATETIME NOT NULL, nome_lancado VARCHAR(100) NOT NULL)";
		$conn2->exec($sql);
		if(!$sql === false){
			$Operador = $_POST['operador'];
			$Nome = $_POST['nome'];
			$Retirada = $_POST['retirada'];
			$Data = $_POST['data'];
			$Devolvidas = "";
			$total = "";
			$nome2 = $_SESSION["usuario"][0];

				$pesquisa_nome = $conn->prepare("SELECT * FROM cadastro_usuarios_lancamentos WHERE nome = '$nome2'");
				$pesquisa_nome->execute();
				$row = $pesquisa_nome->fetch();
				$result_nome = $row['nome'];
			try{
				$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "INSERT INTO sacolas_marco(id, operador, nome, retirada, devolvidas, data, created, total, nome_lancado) VALUES(null, '$Operador', '$Nome', '$Retirada', '$Devolvidas', '$Data', NOW(), '$total', '$result_nome')";
				$conn2->exec($sql);
				$last_id = $conn2->lastInsertId();
			}catch(PDOException $e) {
				echo $sql . "<br>" . $e->getMessage();
			}

			$conta_devolvida2 = $conn2->prepare("SELECT devolvidas FROM sacolas_marco WHERE operador = '$Operador'AND data = '$Data'");
			$conta_devolvida2->execute();
			$row = $conta_devolvida2->fetch(); 
			$valor_devolvido2 = $row['devolvidas'];

			$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$checagem = $conn2->prepare("SELECT operador, nome, data FROM sacolas_marco WHERE operador = '$Operador' AND nome = '$Nome' AND data = '$Data'");
			$checagem->execute();
			if (!$checagem === false) {
				$checagem2 = $conn2->prepare("SELECT * FROM  sacolas_marco WHERE operador = '$Operador' AND nome = '$Nome' AND data = '$Data'");
				$checagem2->execute();
				$row = $checagem2->fetch();
				$id = $row['id'];
				$retirada2 = $row['retirada'];
				echo "<script>alert('Retiradas Existente: $retirada2 Sacolas');</script>";


				try{
					$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$sql2 = "UPDATE sacolas_marco SET operador = '$Operador', nome = '$Nome', retirada = '$Retirada',devolvidas = '$Devolvidas', data = '$Data', total = '$total',created = NOW(), nome_lancado = '$result_nome' WHERE id = '$id' ";
					$conn2->exec($sql2);
				}catch(PDOException $e) {
					echo $sql2 . "<br>" . $e->getMessage();
				}
				$checagem3 = "SELECT COUNT(*) AS Contagem_registro FROM sacolas_marco WHERE operador = '$Operador' AND nome = '$Nome' AND retirada = '$Retirada' AND devolvidas = '$Devolvidas' AND data = '$Data'";
				$sql3 = $conn2->prepare($checagem3);
				$sql3->execute();
				$row2 = $sql3->fetch(PDO::FETCH_ASSOC);
				if ($row2['Contagem_registro'] >= 2) {
					try{
						$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						$sql2 = "DELETE  FROM  sacolas_marco WHERE operador = '$Operador' AND nome = '$Nome' AND retirada = '$Retirada' AND devolvidas = '$Devolvidas' AND data = '$Data' AND id = '$last_id'";
						$conn2->exec($sql2);
					}catch(PDOException $e) {
						echo $sql2 . "<br>" . $e->getMessage();
					}

					$checagem4 = $conn2->prepare("SELECT * FROM  sacolas_marco WHERE operador = '$Operador' AND nome = '$Nome' AND data = '$Data'");
					$checagem4->execute();
					$row = $checagem4->fetch();
					$retirada3 = $row['retirada'];
					echo "<script>alert('Retiradas Atual: $retirada3 Sacolas');</script>";


					$Retirada4 = $_POST['retirada'];
					$listagem2 = $conn2->prepare("SELECT SUM('$retirada2' + '$Retirada4') as soma_retirada FROM sacolas_marco WHERE operador = '$Operador' AND nome = '$Nome' AND retirada = '$Retirada' AND devolvidas = '$Devolvidas' AND data = '$Data'");
					$listagem2->execute();
					$row = $listagem2->fetch(); 
					$soma = $row['soma_retirada'];
					echo "<script>alert('$Nome já Retirou: $soma Sacolas');</script>";

					try{
							$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql2 = "UPDATE sacolas_marco SET retirada = '$soma' WHERE id = '$id' ";
							$conn2->exec($sql2);
					}catch(PDOException $e) {
							echo $sql2 . "<br>" . $e->getMessage();
					}

					try{
						$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						$sql = "UPDATE sacolas_marco SET devolvidas = '$valor_devolvido2', created = NOW(), nome_lancado = '$result_nome'  WHERE operador = '$Operador'AND data = '$Data'";
						$conn2->exec($sql);
					}catch(PDOException $e) {
						echo $sql . "<br>" . $e->getMessage();
					}

					$listagem3 = $conn2->prepare("SELECT SUM(retirada - devolvidas) as soma_retirada FROM sacolas_marco WHERE operador = '$Operador'AND data = '$Data' ");
					$listagem3->execute();
					$row = $listagem3->fetch(); 
					$soma = $row['soma_retirada'];
					try{
						$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						$sql = "UPDATE sacolas_marco SET total = '$soma', created = NOW(), nome_lancado = '$result_nome'  WHERE operador = '$Operador'AND data = '$Data'";
						$conn2->exec($sql);
					}catch(PDOException $e) {
						echo $sql . "<br>" . $e->getMessage();
					}

				}			
			}				
		}			
	}
}

			//devolução
if(isset($_POST['devolver'])){
	$data_mes = date('m');
	if ($data_mes == 3){
		$sql = "CREATE TABLE IF NOT EXISTS sacolas_cpd_marco( id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY, operador INT(6) NOT NULL, nome VARCHAR(255) NOT NULL, retirada INT NOT NULL, devolvidas INT NOT NULL, total INT NOT NULL, data DATE NOT NULL, created DATETIME NOT NULL, nome_lancado VARCHAR(100) NOT NULL)";
		$conn2->exec($sql);
		
			$Operador = $_POST['operador'];
			$Nome = $_POST['nome'];
			$Devolvidas = $_POST['devolvida'];
			$Data = $_POST['data'];	
			$nome2 = $_SESSION["usuario"][0];

				$pesquisa_nome = $conn->prepare("SELECT * FROM cadastro_usuarios_lancamentos WHERE nome = '$nome2'");
				$pesquisa_nome->execute();
				$row = $pesquisa_nome->fetch();
				$result_nome = $row['nome'];


			try{
				$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "INSERT INTO sacolas_cpd_marco(id, operador, nome, retirada, devolvidas, data, created, total, nome_lancado) VALUES(null, '$Operador', '$Nome', 0, '$Devolvidas', '$Data', NOW(), 0, '$result_nome')";
				$conn2->exec($sql);
			}catch(PDOException $e) {
				echo $sql . "<br>" . $e->getMessage();
			}

		$sql = "CREATE TABLE IF NOT EXISTS sacolas_marco( id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY, operador INT(6) NOT NULL, nome VARCHAR(255) NOT NULL, retirada INT NOT NULL, devolvidas INT NOT NULL, total INT NOT NULL, data DATE NOT NULL, created DATETIME NOT NULL, nome_lancado VARCHAR(100) NOT NULL)";
		$conn2->exec($sql);
		if(!$sql === false){
			$Operador = $_POST['operador'];
			$Devolvidas = $_POST['devolvida'];
			$Data = $_POST['data'];	
			$nome2 = $_SESSION["usuario"][0];

				$pesquisa_nome = $conn->prepare("SELECT * FROM cadastro_usuarios_lancamentos WHERE nome = '$nome2'");
				$pesquisa_nome->execute();
				$row = $pesquisa_nome->fetch();
				$result_nome = $row['nome'];

			$conta_devolvida = $conn2->prepare("SELECT devolvidas FROM sacolas_marco WHERE operador = '$Operador'AND data = '$Data'");
			$conta_devolvida->execute();
			$row = $conta_devolvida->fetch(); 
			$valor_devolvido = $row['devolvidas'];

			try{
				$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "UPDATE sacolas_marco SET devolvidas = '$Devolvidas', created = NOW(), nome_lancado = '$result_nome' WHERE operador = '$Operador'AND data = '$Data'";
				$conn2->exec($sql);
			}catch(PDOException $e) {
				echo $sql . "<br>" . $e->getMessage();
			}
			$listagem2 = $conn2->prepare("SELECT SUM('$valor_devolvido' + devolvidas) as soma_retirada FROM sacolas_marco WHERE operador = '$Operador'AND data = '$Data' ");
			$listagem2->execute();
			$row = $listagem2->fetch(); 
			$soma = $row['soma_retirada'];
			$listagem2 = $conn2->prepare("SELECT SUM(retirada - devolvidas) as soma_retirada FROM sacolas_marco WHERE operador = '$Operador'AND data = '$Data' ");
			$listagem2->execute();
			$row = $listagem2->fetch(); 
			$soma = $row['soma_retirada'];
			try{
				$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "UPDATE sacolas_marco SET total = '$soma', created = NOW(),  nome_lancado = '$result_nome'  WHERE operador = '$Operador'AND data = '$Data'";
				$conn2->exec($sql);
			}catch(PDOException $e) {
				echo $sql . "<br>" . $e->getMessage();
			}
		}		
	}
}


//retirada
if(isset($_POST['retirar'])){
	$data_mes = date('m');
	if ($data_mes == 4) {

		$cpd = "CREATE TABLE IF NOT EXISTS sacolas_cpd_abril( id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY, operador INT(6) NOT NULL, nome VARCHAR(255) NOT NULL, retirada INT NOT NULL, devolvidas INT NOT NULL, total INT NOT NULL, data DATE NOT NULL, created DATETIME NOT NULL, nome_lancado VARCHAR(100) NOT NULL)";
		$conn2->exec($cpd);
		$Operador = $_POST['operador'];
		$Nome = $_POST['nome'];
		$Retirada = $_POST['retirada'];
		$Data = $_POST['data'];
		$Devolvidas = "";
		$total = "";
		$nome2 = $_SESSION["usuario"][0];

		$pesquisa_nome = $conn->prepare("SELECT * FROM cadastro_usuarios_lancamentos WHERE nome = '$nome2'");
		$pesquisa_nome->execute();
		$row = $pesquisa_nome->fetch();
		$result_nome = $row['nome'];

		try{
			$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO sacolas_cpd_abril(id, operador, nome, retirada, devolvidas, data, created, total, nome_lancado) VALUES(null, '$Operador', '$Nome', '$Retirada', '$Devolvidas', '$Data', NOW(), '$total', '$result_nome')";
			$conn2->exec($sql);
			$last_id = $conn2->lastInsertId();
		}catch(PDOException $e) {
			echo $sql . "<br>" . $e->getMessage();
		}

		$sql = "CREATE TABLE IF NOT EXISTS sacolas_abril( id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY, operador INT(6) NOT NULL, nome VARCHAR(255) NOT NULL, retirada INT NOT NULL, devolvidas INT NOT NULL, total INT NOT NULL, data DATE NOT NULL, created DATETIME NOT NULL, nome_lancado VARCHAR(100) NOT NULL)";
		$conn2->exec($sql);
		if(!$sql === false){
			$Operador = $_POST['operador'];
			$Nome = $_POST['nome'];
			$Retirada = $_POST['retirada'];
			$Data = $_POST['data'];
			$Devolvidas = "";
			$total = "";
			$nome2 = $_SESSION["usuario"][0];

				$pesquisa_nome = $conn->prepare("SELECT * FROM cadastro_usuarios_lancamentos WHERE nome = '$nome2'");
				$pesquisa_nome->execute();
				$row = $pesquisa_nome->fetch();
				$result_nome = $row['nome'];
			try{
				$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "INSERT INTO sacolas_abril(id, operador, nome, retirada, devolvidas, data, created, total, nome_lancado) VALUES(null, '$Operador', '$Nome', '$Retirada', '$Devolvidas', '$Data', NOW(), '$total', '$result_nome')";
				$conn2->exec($sql);
				$last_id = $conn2->lastInsertId();
			}catch(PDOException $e) {
				echo $sql . "<br>" . $e->getMessage();
			}

			$conta_devolvida2 = $conn2->prepare("SELECT devolvidas FROM sacolas_abril WHERE operador = '$Operador'AND data = '$Data'");
			$conta_devolvida2->execute();
			$row = $conta_devolvida2->fetch(); 
			$valor_devolvido2 = $row['devolvidas'];

			$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$checagem = $conn2->prepare("SELECT operador, nome, data FROM sacolas_abril WHERE operador = '$Operador' AND nome = '$Nome' AND data = '$Data'");
			$checagem->execute();
			if (!$checagem === false) {
				$checagem2 = $conn2->prepare("SELECT * FROM  sacolas_abril WHERE operador = '$Operador' AND nome = '$Nome' AND data = '$Data'");
				$checagem2->execute();
				$row = $checagem2->fetch();
				$id = $row['id'];
				$retirada2 = $row['retirada'];
				echo "<script>alert('Retiradas Existente: $retirada2 Sacolas');</script>";


				try{
					$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$sql2 = "UPDATE sacolas_abril SET operador = '$Operador', nome = '$Nome', retirada = '$Retirada',devolvidas = '$Devolvidas', data = '$Data', total = '$total',created = NOW(), nome_lancado = '$result_nome' WHERE id = '$id' ";
					$conn2->exec($sql2);
				}catch(PDOException $e) {
					echo $sql2 . "<br>" . $e->getMessage();
				}
				$checagem3 = "SELECT COUNT(*) AS Contagem_registro FROM sacolas_abril WHERE operador = '$Operador' AND nome = '$Nome' AND retirada = '$Retirada' AND devolvidas = '$Devolvidas' AND data = '$Data'";
				$sql3 = $conn2->prepare($checagem3);
				$sql3->execute();
				$row2 = $sql3->fetch(PDO::FETCH_ASSOC);
				if ($row2['Contagem_registro'] >= 2) {
					try{
						$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						$sql2 = "DELETE  FROM  sacolas_abril WHERE operador = '$Operador' AND nome = '$Nome' AND retirada = '$Retirada' AND devolvidas = '$Devolvidas' AND data = '$Data' AND id = '$last_id'";
						$conn2->exec($sql2);
					}catch(PDOException $e) {
						echo $sql2 . "<br>" . $e->getMessage();
					}

					$checagem4 = $conn2->prepare("SELECT * FROM  sacolas_abril WHERE operador = '$Operador' AND nome = '$Nome' AND data = '$Data'");
					$checagem4->execute();
					$row = $checagem4->fetch();
					$retirada3 = $row['retirada'];
					echo "<script>alert('Retiradas Atual: $retirada3 Sacolas');</script>";


					$Retirada4 = $_POST['retirada'];
					$listagem2 = $conn2->prepare("SELECT SUM('$retirada2' + '$Retirada4') as soma_retirada FROM sacolas_abril WHERE operador = '$Operador' AND nome = '$Nome' AND retirada = '$Retirada' AND devolvidas = '$Devolvidas' AND data = '$Data'");
					$listagem2->execute();
					$row = $listagem2->fetch(); 
					$soma = $row['soma_retirada'];
					echo "<script>alert('$Nome já Retirou: $soma Sacolas');</script>";

					try{
							$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql2 = "UPDATE sacolas_abril SET retirada = '$soma' WHERE id = '$id' ";
							$conn2->exec($sql2);
					}catch(PDOException $e) {
							echo $sql2 . "<br>" . $e->getMessage();
					}

					try{
						$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						$sql = "UPDATE sacolas_abril SET devolvidas = '$valor_devolvido2', created = NOW(), nome_lancado = '$result_nome'  WHERE operador = '$Operador'AND data = '$Data'";
						$conn2->exec($sql);
					}catch(PDOException $e) {
						echo $sql . "<br>" . $e->getMessage();
					}

					$listagem3 = $conn2->prepare("SELECT SUM(retirada - devolvidas) as soma_retirada FROM sacolas_abril WHERE operador = '$Operador'AND data = '$Data' ");
					$listagem3->execute();
					$row = $listagem3->fetch(); 
					$soma = $row['soma_retirada'];
					try{
						$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						$sql = "UPDATE sacolas_abril SET total = '$soma', created = NOW(), nome_lancado = '$result_nome'  WHERE operador = '$Operador'AND data = '$Data'";
						$conn2->exec($sql);
					}catch(PDOException $e) {
						echo $sql . "<br>" . $e->getMessage();
					}

				}			
			}				
		}			
	}
}

			//devolução
if(isset($_POST['devolver'])){
	$data_mes = date('m');
	if ($data_mes == 4){
		$sql = "CREATE TABLE IF NOT EXISTS sacolas_cpd_abril( id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY, operador INT(6) NOT NULL, nome VARCHAR(255) NOT NULL, retirada INT NOT NULL, devolvidas INT NOT NULL, total INT NOT NULL, data DATE NOT NULL, created DATETIME NOT NULL, nome_lancado VARCHAR(100) NOT NULL)";
		$conn2->exec($sql);
		
			$Operador = $_POST['operador'];
			$Nome = $_POST['nome'];
			$Devolvidas = $_POST['devolvida'];
			$Data = $_POST['data'];	
			$nome2 = $_SESSION["usuario"][0];

				$pesquisa_nome = $conn->prepare("SELECT * FROM cadastro_usuarios_lancamentos WHERE nome = '$nome2'");
				$pesquisa_nome->execute();
				$row = $pesquisa_nome->fetch();
				$result_nome = $row['nome'];


			try{
				$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "INSERT INTO sacolas_cpd_abrl(id, operador, nome, retirada, devolvidas, data, created, total, nome_lancado) VALUES(null, '$Operador', '$Nome', 0, '$Devolvidas', '$Data', NOW(), 0, '$result_nome')";
				$conn2->exec($sql);
			}catch(PDOException $e) {
				echo $sql . "<br>" . $e->getMessage();
			}

		$sql = "CREATE TABLE IF NOT EXISTS sacolas_abril( id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY, operador INT(6) NOT NULL, nome VARCHAR(255) NOT NULL, retirada INT NOT NULL, devolvidas INT NOT NULL, total INT NOT NULL, data DATE NOT NULL, created DATETIME NOT NULL, nome_lancado VARCHAR(100) NOT NULL)";
		$conn2->exec($sql);
		if(!$sql === false){
			$Operador = $_POST['operador'];
			$Devolvidas = $_POST['devolvida'];
			$Data = $_POST['data'];	
			$nome2 = $_SESSION["usuario"][0];

				$pesquisa_nome = $conn->prepare("SELECT * FROM cadastro_usuarios_lancamentos WHERE nome = '$nome2'");
				$pesquisa_nome->execute();
				$row = $pesquisa_nome->fetch();
				$result_nome = $row['nome'];

			$conta_devolvida = $conn2->prepare("SELECT devolvidas FROM sacolas_abril WHERE operador = '$Operador'AND data = '$Data'");
			$conta_devolvida->execute();
			$row = $conta_devolvida->fetch(); 
			$valor_devolvido = $row['devolvidas'];

			try{
				$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "UPDATE sacolas_abril SET devolvidas = '$Devolvidas', created = NOW(), nome_lancado = '$result_nome' WHERE operador = '$Operador'AND data = '$Data'";
				$conn2->exec($sql);
			}catch(PDOException $e) {
				echo $sql . "<br>" . $e->getMessage();
			}
			$listagem2 = $conn2->prepare("SELECT SUM('$valor_devolvido' + devolvidas) as soma_retirada FROM sacolas_abril WHERE operador = '$Operador'AND data = '$Data' ");
			$listagem2->execute();
			$row = $listagem2->fetch(); 
			$soma = $row['soma_retirada'];
			$listagem2 = $conn2->prepare("SELECT SUM(retirada - devolvidas) as soma_retirada FROM sacolas_abril WHERE operador = '$Operador'AND data = '$Data' ");
			$listagem2->execute();
			$row = $listagem2->fetch(); 
			$soma = $row['soma_retirada'];
			try{
				$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "UPDATE sacolas_abril SET total = '$soma', created = NOW(),  nome_lancado = '$result_nome'  WHERE operador = '$Operador'AND data = '$Data'";
				$conn2->exec($sql);
			}catch(PDOException $e) {
				echo $sql . "<br>" . $e->getMessage();
			}
		}		
	}
}



//retirada
if(isset($_POST['retirar'])){
	$data_mes = date('m');
	if ($data_mes == 5) {

		$cpd = "CREATE TABLE IF NOT EXISTS sacolas_cpd_maio( id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY, operador INT(6) NOT NULL, nome VARCHAR(255) NOT NULL, retirada INT NOT NULL, devolvidas INT NOT NULL, total INT NOT NULL, data DATE NOT NULL, created DATETIME NOT NULL, nome_lancado VARCHAR(100) NOT NULL)";
		$conn2->exec($cpd);
		$Operador = $_POST['operador'];
		$Nome = $_POST['nome'];
		$Retirada = $_POST['retirada'];
		$Data = $_POST['data'];
		$Devolvidas = "";
		$total = "";
		$nome2 = $_SESSION["usuario"][0];

		$pesquisa_nome = $conn->prepare("SELECT * FROM cadastro_usuarios_lancamentos WHERE nome = '$nome2'");
		$pesquisa_nome->execute();
		$row = $pesquisa_nome->fetch();
		$result_nome = $row['nome'];

		try{
			$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO sacolas_cpd_maio(id, operador, nome, retirada, devolvidas, data, created, total, nome_lancado) VALUES(null, '$Operador', '$Nome', '$Retirada', '$Devolvidas', '$Data', NOW(), '$total', '$result_nome')";
			$conn2->exec($sql);
			$last_id = $conn2->lastInsertId();
		}catch(PDOException $e) {
			echo $sql . "<br>" . $e->getMessage();
		}

		$sql = "CREATE TABLE IF NOT EXISTS sacolas_maio( id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY, operador INT(6) NOT NULL, nome VARCHAR(255) NOT NULL, retirada INT NOT NULL, devolvidas INT NOT NULL, total INT NOT NULL, data DATE NOT NULL, created DATETIME NOT NULL, nome_lancado VARCHAR(100) NOT NULL)";
		$conn2->exec($sql);
		if(!$sql === false){
			$Operador = $_POST['operador'];
			$Nome = $_POST['nome'];
			$Retirada = $_POST['retirada'];
			$Data = $_POST['data'];
			$Devolvidas = "";
			$total = "";
			$nome2 = $_SESSION["usuario"][0];

				$pesquisa_nome = $conn->prepare("SELECT * FROM cadastro_usuarios_lancamentos WHERE nome = '$nome2'");
				$pesquisa_nome->execute();
				$row = $pesquisa_nome->fetch();
				$result_nome = $row['nome'];
			try{
				$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "INSERT INTO sacolas_maio(id, operador, nome, retirada, devolvidas, data, created, total, nome_lancado) VALUES(null, '$Operador', '$Nome', '$Retirada', '$Devolvidas', '$Data', NOW(), '$total', '$result_nome')";
				$conn2->exec($sql);
				$last_id = $conn2->lastInsertId();
			}catch(PDOException $e) {
				echo $sql . "<br>" . $e->getMessage();
			}

			$conta_devolvida2 = $conn2->prepare("SELECT devolvidas FROM sacolas_maio WHERE operador = '$Operador'AND data = '$Data'");
			$conta_devolvida2->execute();
			$row = $conta_devolvida2->fetch(); 
			$valor_devolvido2 = $row['devolvidas'];

			$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$checagem = $conn2->prepare("SELECT operador, nome, data FROM sacolas_maio WHERE operador = '$Operador' AND nome = '$Nome' AND data = '$Data'");
			$checagem->execute();
			if (!$checagem === false) {
				$checagem2 = $conn2->prepare("SELECT * FROM  sacolas_maio WHERE operador = '$Operador' AND nome = '$Nome' AND data = '$Data'");
				$checagem2->execute();
				$row = $checagem2->fetch();
				$id = $row['id'];
				$retirada2 = $row['retirada'];
				echo "<script>alert('Retiradas Existente: $retirada2 Sacolas');</script>";


				try{
					$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$sql2 = "UPDATE sacolas_maio SET operador = '$Operador', nome = '$Nome', retirada = '$Retirada',devolvidas = '$Devolvidas', data = '$Data', total = '$total',created = NOW(), nome_lancado = '$result_nome' WHERE id = '$id' ";
					$conn2->exec($sql2);
				}catch(PDOException $e) {
					echo $sql2 . "<br>" . $e->getMessage();
				}
				$checagem3 = "SELECT COUNT(*) AS Contagem_registro FROM sacolas_maio WHERE operador = '$Operador' AND nome = '$Nome' AND retirada = '$Retirada' AND devolvidas = '$Devolvidas' AND data = '$Data'";
				$sql3 = $conn2->prepare($checagem3);
				$sql3->execute();
				$row2 = $sql3->fetch(PDO::FETCH_ASSOC);
				if ($row2['Contagem_registro'] >= 2) {
					try{
						$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						$sql2 = "DELETE  FROM  sacolas_maio WHERE operador = '$Operador' AND nome = '$Nome' AND retirada = '$Retirada' AND devolvidas = '$Devolvidas' AND data = '$Data' AND id = '$last_id'";
						$conn2->exec($sql2);
					}catch(PDOException $e) {
						echo $sql2 . "<br>" . $e->getMessage();
					}

					$checagem4 = $conn2->prepare("SELECT * FROM  sacolas_maio WHERE operador = '$Operador' AND nome = '$Nome' AND data = '$Data'");
					$checagem4->execute();
					$row = $checagem4->fetch();
					$retirada3 = $row['retirada'];
					echo "<script>alert('Retiradas Atual: $retirada3 Sacolas');</script>";


					$Retirada4 = $_POST['retirada'];
					$listagem2 = $conn2->prepare("SELECT SUM('$retirada2' + '$Retirada4') as soma_retirada FROM sacolas_maio WHERE operador = '$Operador' AND nome = '$Nome' AND retirada = '$Retirada' AND devolvidas = '$Devolvidas' AND data = '$Data'");
					$listagem2->execute();
					$row = $listagem2->fetch(); 
					$soma = $row['soma_retirada'];
					echo "<script>alert('$Nome já Retirou: $soma Sacolas');</script>";

					try{
							$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql2 = "UPDATE sacolas_maio SET retirada = '$soma' WHERE id = '$id' ";
							$conn2->exec($sql2);
					}catch(PDOException $e) {
							echo $sql2 . "<br>" . $e->getMessage();
					}

					try{
						$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						$sql = "UPDATE sacolas_maio SET devolvidas = '$valor_devolvido2', created = NOW(), nome_lancado = '$result_nome'  WHERE operador = '$Operador'AND data = '$Data'";
						$conn2->exec($sql);
					}catch(PDOException $e) {
						echo $sql . "<br>" . $e->getMessage();
					}

					$listagem3 = $conn2->prepare("SELECT SUM(retirada - devolvidas) as soma_retirada FROM sacolas_maio WHERE operador = '$Operador'AND data = '$Data' ");
					$listagem3->execute();
					$row = $listagem3->fetch(); 
					$soma = $row['soma_retirada'];
					try{
						$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						$sql = "UPDATE sacolas_maio SET total = '$soma', created = NOW(), nome_lancado = '$result_nome'  WHERE operador = '$Operador'AND data = '$Data'";
						$conn2->exec($sql);
					}catch(PDOException $e) {
						echo $sql . "<br>" . $e->getMessage();
					}

				}			
			}				
		}			
	}
}

			//devolução
if(isset($_POST['devolver'])){
	$data_mes = date('m');
	if ($data_mes == 5){
		$sql = "CREATE TABLE IF NOT EXISTS sacolas_cpd_maio( id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY, operador INT(6) NOT NULL, nome VARCHAR(255) NOT NULL, retirada INT NOT NULL, devolvidas INT NOT NULL, total INT NOT NULL, data DATE NOT NULL, created DATETIME NOT NULL, nome_lancado VARCHAR(100) NOT NULL)";
		$conn2->exec($sql);
		
			$Operador = $_POST['operador'];
			$Nome = $_POST['nome'];
			$Devolvidas = $_POST['devolvida'];
			$Data = $_POST['data'];	
			$nome2 = $_SESSION["usuario"][0];

				$pesquisa_nome = $conn->prepare("SELECT * FROM cadastro_usuarios_lancamentos WHERE nome = '$nome2'");
				$pesquisa_nome->execute();
				$row = $pesquisa_nome->fetch();
				$result_nome = $row['nome'];


			try{
				$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "INSERT INTO sacolas_cpd_maio(id, operador, nome, retirada, devolvidas, data, created, total, nome_lancado) VALUES(null, '$Operador', '$Nome', 0, '$Devolvidas', '$Data', NOW(), 0, '$result_nome')";
				$conn2->exec($sql);
			}catch(PDOException $e) {
				echo $sql . "<br>" . $e->getMessage();
			}

		$sql = "CREATE TABLE IF NOT EXISTS sacolas_maio( id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY, operador INT(6) NOT NULL, nome VARCHAR(255) NOT NULL, retirada INT NOT NULL, devolvidas INT NOT NULL, total INT NOT NULL, data DATE NOT NULL, created DATETIME NOT NULL, nome_lancado VARCHAR(100) NOT NULL)";
		$conn2->exec($sql);
		if(!$sql === false){
			$Operador = $_POST['operador'];
			$Devolvidas = $_POST['devolvida'];
			$Data = $_POST['data'];	
			$nome2 = $_SESSION["usuario"][0];

				$pesquisa_nome = $conn->prepare("SELECT * FROM cadastro_usuarios_lancamentos WHERE nome = '$nome2'");
				$pesquisa_nome->execute();
				$row = $pesquisa_nome->fetch();
				$result_nome = $row['nome'];

			$conta_devolvida = $conn2->prepare("SELECT devolvidas FROM sacolas_maio WHERE operador = '$Operador'AND data = '$Data'");
			$conta_devolvida->execute();
			$row = $conta_devolvida->fetch(); 
			$valor_devolvido = $row['devolvidas'];

			try{
				$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "UPDATE sacolas_maio SET devolvidas = '$Devolvidas', created = NOW(), nome_lancado = '$result_nome' WHERE operador = '$Operador'AND data = '$Data'";
				$conn2->exec($sql);
			}catch(PDOException $e) {
				echo $sql . "<br>" . $e->getMessage();
			}
			$listagem2 = $conn2->prepare("SELECT SUM('$valor_devolvido' + devolvidas) as soma_retirada FROM sacolas_maio WHERE operador = '$Operador'AND data = '$Data' ");
			$listagem2->execute();
			$row = $listagem2->fetch(); 
			$soma = $row['soma_retirada'];
			$listagem2 = $conn2->prepare("SELECT SUM(retirada - devolvidas) as soma_retirada FROM sacolas_maio WHERE operador = '$Operador'AND data = '$Data' ");
			$listagem2->execute();
			$row = $listagem2->fetch(); 
			$soma = $row['soma_retirada'];
			try{
				$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "UPDATE sacolas_maio SET total = '$soma', created = NOW(),  nome_lancado = '$result_nome'  WHERE operador = '$Operador'AND data = '$Data'";
				$conn2->exec($sql);
			}catch(PDOException $e) {
				echo $sql . "<br>" . $e->getMessage();
			}
		}		
	}
}



//retirada
if(isset($_POST['retirar'])){
	$data_mes = date('m');
	if ($data_mes == 6) {

		$cpd = "CREATE TABLE IF NOT EXISTS sacolas_cpd_junho( id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY, operador INT(6) NOT NULL, nome VARCHAR(255) NOT NULL, retirada INT NOT NULL, devolvidas INT NOT NULL, total INT NOT NULL, data DATE NOT NULL, created DATETIME NOT NULL, nome_lancado VARCHAR(100) NOT NULL)";
		$conn2->exec($cpd);
		$Operador = $_POST['operador'];
		$Nome = $_POST['nome'];
		$Retirada = $_POST['retirada'];
		$Data = $_POST['data'];
		$Devolvidas = "";
		$total = "";
		$nome2 = $_SESSION["usuario"][0];

		$pesquisa_nome = $conn->prepare("SELECT * FROM cadastro_usuarios_lancamentos WHERE nome = '$nome2'");
		$pesquisa_nome->execute();
		$row = $pesquisa_nome->fetch();
		$result_nome = $row['nome'];

		try{
			$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO sacolas_cpd_junho(id, operador, nome, retirada, devolvidas, data, created, total, nome_lancado) VALUES(null, '$Operador', '$Nome', '$Retirada', '$Devolvidas', '$Data', NOW(), '$total', '$result_nome')";
			$conn2->exec($sql);
			$last_id = $conn2->lastInsertId();
		}catch(PDOException $e) {
			echo $sql . "<br>" . $e->getMessage();
		}

		$sql = "CREATE TABLE IF NOT EXISTS sacolas_junho( id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY, operador INT(6) NOT NULL, nome VARCHAR(255) NOT NULL, retirada INT NOT NULL, devolvidas INT NOT NULL, total INT NOT NULL, data DATE NOT NULL, created DATETIME NOT NULL, nome_lancado VARCHAR(100) NOT NULL)";
		$conn2->exec($sql);
		if(!$sql === false){
			$Operador = $_POST['operador'];
			$Nome = $_POST['nome'];
			$Retirada = $_POST['retirada'];
			$Data = $_POST['data'];
			$Devolvidas = "";
			$total = "";
			$nome2 = $_SESSION["usuario"][0];

				$pesquisa_nome = $conn->prepare("SELECT * FROM cadastro_usuarios_lancamentos WHERE nome = '$nome2'");
				$pesquisa_nome->execute();
				$row = $pesquisa_nome->fetch();
				$result_nome = $row['nome'];
			try{
				$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "INSERT INTO sacolas_junho(id, operador, nome, retirada, devolvidas, data, created, total, nome_lancado) VALUES(null, '$Operador', '$Nome', '$Retirada', '$Devolvidas', '$Data', NOW(), '$total', '$result_nome')";
				$conn2->exec($sql);
				$last_id = $conn2->lastInsertId();
			}catch(PDOException $e) {
				echo $sql . "<br>" . $e->getMessage();
			}

			$conta_devolvida2 = $conn2->prepare("SELECT devolvidas FROM sacolas_junho WHERE operador = '$Operador'AND data = '$Data'");
			$conta_devolvida2->execute();
			$row = $conta_devolvida2->fetch(); 
			$valor_devolvido2 = $row['devolvidas'];

			$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$checagem = $conn2->prepare("SELECT operador, nome, data FROM sacolas_junho WHERE operador = '$Operador' AND nome = '$Nome' AND data = '$Data'");
			$checagem->execute();
			if (!$checagem === false) {
				$checagem2 = $conn2->prepare("SELECT * FROM  sacolas_junho WHERE operador = '$Operador' AND nome = '$Nome' AND data = '$Data'");
				$checagem2->execute();
				$row = $checagem2->fetch();
				$id = $row['id'];
				$retirada2 = $row['retirada'];
				echo "<script>alert('Retiradas Existente: $retirada2 Sacolas');</script>";


				try{
					$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$sql2 = "UPDATE sacolas_junho SET operador = '$Operador', nome = '$Nome', retirada = '$Retirada',devolvidas = '$Devolvidas', data = '$Data', total = '$total',created = NOW(), nome_lancado = '$result_nome' WHERE id = '$id' ";
					$conn2->exec($sql2);
				}catch(PDOException $e) {
					echo $sql2 . "<br>" . $e->getMessage();
				}
				$checagem3 = "SELECT COUNT(*) AS Contagem_registro FROM sacolas_junho WHERE operador = '$Operador' AND nome = '$Nome' AND retirada = '$Retirada' AND devolvidas = '$Devolvidas' AND data = '$Data'";
				$sql3 = $conn2->prepare($checagem3);
				$sql3->execute();
				$row2 = $sql3->fetch(PDO::FETCH_ASSOC);
				if ($row2['Contagem_registro'] >= 2) {
					try{
						$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						$sql2 = "DELETE  FROM  sacolas_junho WHERE operador = '$Operador' AND nome = '$Nome' AND retirada = '$Retirada' AND devolvidas = '$Devolvidas' AND data = '$Data' AND id = '$last_id'";
						$conn2->exec($sql2);
					}catch(PDOException $e) {
						echo $sql2 . "<br>" . $e->getMessage();
					}

					$checagem4 = $conn2->prepare("SELECT * FROM  sacolas_junho WHERE operador = '$Operador' AND nome = '$Nome' AND data = '$Data'");
					$checagem4->execute();
					$row = $checagem4->fetch();
					$retirada3 = $row['retirada'];
					echo "<script>alert('Retiradas Atual: $retirada3 Sacolas');</script>";


					$Retirada4 = $_POST['retirada'];
					$listagem2 = $conn2->prepare("SELECT SUM('$retirada2' + '$Retirada4') as soma_retirada FROM sacolas_junho WHERE operador = '$Operador' AND nome = '$Nome' AND retirada = '$Retirada' AND devolvidas = '$Devolvidas' AND data = '$Data'");
					$listagem2->execute();
					$row = $listagem2->fetch(); 
					$soma = $row['soma_retirada'];
					echo "<script>alert('$Nome já Retirou: $soma Sacolas');</script>";

					try{
							$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql2 = "UPDATE sacolas_junho SET retirada = '$soma' WHERE id = '$id' ";
							$conn2->exec($sql2);
					}catch(PDOException $e) {
							echo $sql2 . "<br>" . $e->getMessage();
					}

					try{
						$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						$sql = "UPDATE sacolas_junho SET devolvidas = '$valor_devolvido2', created = NOW(), nome_lancado = '$result_nome'  WHERE operador = '$Operador'AND data = '$Data'";
						$conn2->exec($sql);
					}catch(PDOException $e) {
						echo $sql . "<br>" . $e->getMessage();
					}

					$listagem3 = $conn2->prepare("SELECT SUM(retirada - devolvidas) as soma_retirada FROM sacolas_junho WHERE operador = '$Operador'AND data = '$Data' ");
					$listagem3->execute();
					$row = $listagem3->fetch(); 
					$soma = $row['soma_retirada'];
					try{
						$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						$sql = "UPDATE sacolas_junho SET total = '$soma', created = NOW(), nome_lancado = '$result_nome'  WHERE operador = '$Operador'AND data = '$Data'";
						$conn2->exec($sql);
					}catch(PDOException $e) {
						echo $sql . "<br>" . $e->getMessage();
					}

				}			
			}				
		}			
	}
}

			//devolução
if(isset($_POST['devolver'])){
	$data_mes = date('m');
	if ($data_mes == 6){
		$sql = "CREATE TABLE IF NOT EXISTS sacolas_cpd_junho( id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY, operador INT(6) NOT NULL, nome VARCHAR(255) NOT NULL, retirada INT NOT NULL, devolvidas INT NOT NULL, total INT NOT NULL, data DATE NOT NULL, created DATETIME NOT NULL, nome_lancado VARCHAR(100) NOT NULL)";
		$conn2->exec($sql);
		
			$Operador = $_POST['operador'];
			$Nome = $_POST['nome'];
			$Devolvidas = $_POST['devolvida'];
			$Data = $_POST['data'];	
			$nome2 = $_SESSION["usuario"][0];

				$pesquisa_nome = $conn->prepare("SELECT * FROM cadastro_usuarios_lancamentos WHERE nome = '$nome2'");
				$pesquisa_nome->execute();
				$row = $pesquisa_nome->fetch();
				$result_nome = $row['nome'];


			try{
				$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "INSERT INTO sacolas_cpd_junho(id, operador, nome, retirada, devolvidas, data, created, total, nome_lancado) VALUES(null, '$Operador', '$Nome', 0, '$Devolvidas', '$Data', NOW(), 0, '$result_nome')";
				$conn2->exec($sql);
			}catch(PDOException $e) {
				echo $sql . "<br>" . $e->getMessage();
			}

		$sql = "CREATE TABLE IF NOT EXISTS sacolas_junho( id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY, operador INT(6) NOT NULL, nome VARCHAR(255) NOT NULL, retirada INT NOT NULL, devolvidas INT NOT NULL, total INT NOT NULL, data DATE NOT NULL, created DATETIME NOT NULL, nome_lancado VARCHAR(100) NOT NULL)";
		$conn2->exec($sql);
		if(!$sql === false){
			$Operador = $_POST['operador'];
			$Devolvidas = $_POST['devolvida'];
			$Data = $_POST['data'];	
			$nome2 = $_SESSION["usuario"][0];

				$pesquisa_nome = $conn->prepare("SELECT * FROM cadastro_usuarios_lancamentos WHERE nome = '$nome2'");
				$pesquisa_nome->execute();
				$row = $pesquisa_nome->fetch();
				$result_nome = $row['nome'];

			$conta_devolvida = $conn2->prepare("SELECT devolvidas FROM sacolas_junho WHERE operador = '$Operador'AND data = '$Data'");
			$conta_devolvida->execute();
			$row = $conta_devolvida->fetch(); 
			$valor_devolvido = $row['devolvidas'];

			try{
				$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "UPDATE sacolas_junho SET devolvidas = '$Devolvidas', created = NOW(), nome_lancado = '$result_nome' WHERE operador = '$Operador'AND data = '$Data'";
				$conn2->exec($sql);
			}catch(PDOException $e) {
				echo $sql . "<br>" . $e->getMessage();
			}
			$listagem2 = $conn2->prepare("SELECT SUM('$valor_devolvido' + devolvidas) as soma_retirada FROM sacolas_junho WHERE operador = '$Operador'AND data = '$Data' ");
			$listagem2->execute();
			$row = $listagem2->fetch(); 
			$soma = $row['soma_retirada'];
			$listagem2 = $conn2->prepare("SELECT SUM(retirada - devolvidas) as soma_retirada FROM sacolas_junho WHERE operador = '$Operador'AND data = '$Data' ");
			$listagem2->execute();
			$row = $listagem2->fetch(); 
			$soma = $row['soma_retirada'];
			try{
				$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "UPDATE sacolas_junho SET total = '$soma', created = NOW(),  nome_lancado = '$result_nome'  WHERE operador = '$Operador'AND data = '$Data'";
				$conn2->exec($sql);
			}catch(PDOException $e) {
				echo $sql . "<br>" . $e->getMessage();
			}
		}		
	}
}



//retirada
if(isset($_POST['retirar'])){
	$data_mes = date('m');
	if ($data_mes == 7) {

		$cpd = "CREATE TABLE IF NOT EXISTS sacolas_cpd_julho( id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY, operador INT(6) NOT NULL, nome VARCHAR(255) NOT NULL, retirada INT NOT NULL, devolvidas INT NOT NULL, total INT NOT NULL, data DATE NOT NULL, created DATETIME NOT NULL, nome_lancado VARCHAR(100) NOT NULL)";
		$conn2->exec($cpd);
		$Operador = $_POST['operador'];
		$Nome = $_POST['nome'];
		$Retirada = $_POST['retirada'];
		$Data = $_POST['data'];
		$Devolvidas = "";
		$total = "";
		$nome2 = $_SESSION["usuario"][0];

		$pesquisa_nome = $conn->prepare("SELECT * FROM cadastro_usuarios_lancamentos WHERE nome = '$nome2'");
		$pesquisa_nome->execute();
		$row = $pesquisa_nome->fetch();
		$result_nome = $row['nome'];

		try{
			$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO sacolas_cpd_julho(id, operador, nome, retirada, devolvidas, data, created, total, nome_lancado) VALUES(null, '$Operador', '$Nome', '$Retirada', '$Devolvidas', '$Data', NOW(), '$total', '$result_nome')";
			$conn2->exec($sql);
			$last_id = $conn2->lastInsertId();
		}catch(PDOException $e) {
			echo $sql . "<br>" . $e->getMessage();
		}

		$sql = "CREATE TABLE IF NOT EXISTS sacolas_julho( id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY, operador INT(6) NOT NULL, nome VARCHAR(255) NOT NULL, retirada INT NOT NULL, devolvidas INT NOT NULL, total INT NOT NULL, data DATE NOT NULL, created DATETIME NOT NULL, nome_lancado VARCHAR(100) NOT NULL)";
		$conn2->exec($sql);
		if(!$sql === false){
			$Operador = $_POST['operador'];
			$Nome = $_POST['nome'];
			$Retirada = $_POST['retirada'];
			$Data = $_POST['data'];
			$Devolvidas = "";
			$total = "";
			$nome2 = $_SESSION["usuario"][0];

				$pesquisa_nome = $conn->prepare("SELECT * FROM cadastro_usuarios_lancamentos WHERE nome = '$nome2'");
				$pesquisa_nome->execute();
				$row = $pesquisa_nome->fetch();
				$result_nome = $row['nome'];
			try{
				$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "INSERT INTO sacolas_julho(id, operador, nome, retirada, devolvidas, data, created, total, nome_lancado) VALUES(null, '$Operador', '$Nome', '$Retirada', '$Devolvidas', '$Data', NOW(), '$total', '$result_nome')";
				$conn2->exec($sql);
				$last_id = $conn2->lastInsertId();
			}catch(PDOException $e) {
				echo $sql . "<br>" . $e->getMessage();
			}

			$conta_devolvida2 = $conn2->prepare("SELECT devolvidas FROM sacolas_julho WHERE operador = '$Operador'AND data = '$Data'");
			$conta_devolvida2->execute();
			$row = $conta_devolvida2->fetch(); 
			$valor_devolvido2 = $row['devolvidas'];

			$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$checagem = $conn2->prepare("SELECT operador, nome, data FROM sacolas_julho WHERE operador = '$Operador' AND nome = '$Nome' AND data = '$Data'");
			$checagem->execute();
			if (!$checagem === false) {
				$checagem2 = $conn2->prepare("SELECT * FROM  sacolas_julho WHERE operador = '$Operador' AND nome = '$Nome' AND data = '$Data'");
				$checagem2->execute();
				$row = $checagem2->fetch();
				$id = $row['id'];
				$retirada2 = $row['retirada'];
				echo "<script>alert('Retiradas Existente: $retirada2 Sacolas');</script>";


				try{
					$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$sql2 = "UPDATE sacolas_julho SET operador = '$Operador', nome = '$Nome', retirada = '$Retirada',devolvidas = '$Devolvidas', data = '$Data', total = '$total',created = NOW(), nome_lancado = '$result_nome' WHERE id = '$id' ";
					$conn2->exec($sql2);
				}catch(PDOException $e) {
					echo $sql2 . "<br>" . $e->getMessage();
				}
				$checagem3 = "SELECT COUNT(*) AS Contagem_registro FROM sacolas_julho WHERE operador = '$Operador' AND nome = '$Nome' AND retirada = '$Retirada' AND devolvidas = '$Devolvidas' AND data = '$Data'";
				$sql3 = $conn2->prepare($checagem3);
				$sql3->execute();
				$row2 = $sql3->fetch(PDO::FETCH_ASSOC);
				if ($row2['Contagem_registro'] >= 2) {
					try{
						$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						$sql2 = "DELETE  FROM  sacolas_julho WHERE operador = '$Operador' AND nome = '$Nome' AND retirada = '$Retirada' AND devolvidas = '$Devolvidas' AND data = '$Data' AND id = '$last_id'";
						$conn2->exec($sql2);
					}catch(PDOException $e) {
						echo $sql2 . "<br>" . $e->getMessage();
					}

					$checagem4 = $conn2->prepare("SELECT * FROM  sacolas_julho WHERE operador = '$Operador' AND nome = '$Nome' AND data = '$Data'");
					$checagem4->execute();
					$row = $checagem4->fetch();
					$retirada3 = $row['retirada'];
					echo "<script>alert('Retiradas Atual: $retirada3 Sacolas');</script>";


					$Retirada4 = $_POST['retirada'];
					$listagem2 = $conn2->prepare("SELECT SUM('$retirada2' + '$Retirada4') as soma_retirada FROM sacolas_julho WHERE operador = '$Operador' AND nome = '$Nome' AND retirada = '$Retirada' AND devolvidas = '$Devolvidas' AND data = '$Data'");
					$listagem2->execute();
					$row = $listagem2->fetch(); 
					$soma = $row['soma_retirada'];
					echo "<script>alert('$Nome já Retirou: $soma Sacolas');</script>";

					try{
							$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql2 = "UPDATE sacolas_julho SET retirada = '$soma' WHERE id = '$id' ";
							$conn2->exec($sql2);
					}catch(PDOException $e) {
							echo $sql2 . "<br>" . $e->getMessage();
					}

					try{
						$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						$sql = "UPDATE sacolas_julho SET devolvidas = '$valor_devolvido2', created = NOW(), nome_lancado = '$result_nome'  WHERE operador = '$Operador'AND data = '$Data'";
						$conn2->exec($sql);
					}catch(PDOException $e) {
						echo $sql . "<br>" . $e->getMessage();
					}

					$listagem3 = $conn2->prepare("SELECT SUM(retirada - devolvidas) as soma_retirada FROM sacolas_julho WHERE operador = '$Operador'AND data = '$Data' ");
					$listagem3->execute();
					$row = $listagem3->fetch(); 
					$soma = $row['soma_retirada'];
					try{
						$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						$sql = "UPDATE sacolas_julho SET total = '$soma', created = NOW(), nome_lancado = '$result_nome'  WHERE operador = '$Operador'AND data = '$Data'";
						$conn2->exec($sql);
					}catch(PDOException $e) {
						echo $sql . "<br>" . $e->getMessage();
					}

				}			
			}				
		}			
	}
}
			//devolução
if(isset($_POST['devolver'])){
	$data_mes = date('m');
	if ($data_mes == 7){
		$sql = "CREATE TABLE IF NOT EXISTS sacolas_cpd_julho( id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY, operador INT(6) NOT NULL, nome VARCHAR(255) NOT NULL, retirada INT NOT NULL, devolvidas INT NOT NULL, total INT NOT NULL, data DATE NOT NULL, created DATETIME NOT NULL, nome_lancado VARCHAR(100) NOT NULL)";
		$conn2->exec($sql);
		
			$Operador = $_POST['operador'];
			$Nome = $_POST['nome'];
			$Devolvidas = $_POST['devolvida'];
			$Data = $_POST['data'];	
			$nome2 = $_SESSION["usuario"][0];

				$pesquisa_nome = $conn->prepare("SELECT * FROM cadastro_usuarios_lancamentos WHERE nome = '$nome2'");
				$pesquisa_nome->execute();
				$row = $pesquisa_nome->fetch();
				$result_nome = $row['nome'];


			try{
				$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "INSERT INTO sacolas_cpd_julho(id, operador, nome, retirada, devolvidas, data, created, total, nome_lancado) VALUES(null, '$Operador', '$Nome', 0, '$Devolvidas', '$Data', NOW(), 0, '$result_nome')";
				$conn2->exec($sql);
			}catch(PDOException $e) {
				echo $sql . "<br>" . $e->getMessage();
			}

		$sql = "CREATE TABLE IF NOT EXISTS sacolas_julho( id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY, operador INT(6) NOT NULL, nome VARCHAR(255) NOT NULL, retirada INT NOT NULL, devolvidas INT NOT NULL, total INT NOT NULL, data DATE NOT NULL, created DATETIME NOT NULL, nome_lancado VARCHAR(100) NOT NULL)";
		$conn2->exec($sql);
		if(!$sql === false){
			$Operador = $_POST['operador'];
			$Devolvidas = $_POST['devolvida'];
			$Data = $_POST['data'];	
			$nome2 = $_SESSION["usuario"][0];

				$pesquisa_nome = $conn->prepare("SELECT * FROM cadastro_usuarios_lancamentos WHERE nome = '$nome2'");
				$pesquisa_nome->execute();
				$row = $pesquisa_nome->fetch();
				$result_nome = $row['nome'];

			$conta_devolvida = $conn2->prepare("SELECT devolvidas FROM sacolas_julho WHERE operador = '$Operador'AND data = '$Data'");
			$conta_devolvida->execute();
			$row = $conta_devolvida->fetch(); 
			$valor_devolvido = $row['devolvidas'];

			try{
				$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "UPDATE sacolas_julho SET devolvidas = '$Devolvidas', created = NOW(), nome_lancado = '$result_nome' WHERE operador = '$Operador'AND data = '$Data'";
				$conn2->exec($sql);
			}catch(PDOException $e) {
				echo $sql . "<br>" . $e->getMessage();
			}
			$listagem2 = $conn2->prepare("SELECT SUM('$valor_devolvido' + devolvidas) as soma_retirada FROM sacolas_julho WHERE operador = '$Operador'AND data = '$Data' ");
			$listagem2->execute();
			$row = $listagem2->fetch(); 
			$soma = $row['soma_retirada'];
			$listagem2 = $conn2->prepare("SELECT SUM(retirada - devolvidas) as soma_retirada FROM sacolas_julho WHERE operador = '$Operador'AND data = '$Data' ");
			$listagem2->execute();
			$row = $listagem2->fetch(); 
			$soma = $row['soma_retirada'];
			try{
				$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "UPDATE sacolas_julho SET total = '$soma', created = NOW(),  nome_lancado = '$result_nome'  WHERE operador = '$Operador'AND data = '$Data'";
				$conn2->exec($sql);
			}catch(PDOException $e) {
				echo $sql . "<br>" . $e->getMessage();
			}
		}		
	}
}



//retirada
if(isset($_POST['retirar'])){
	$data_mes = date('m');
	if ($data_mes == 8) {

		$cpd = "CREATE TABLE IF NOT EXISTS sacolas_cpd_agosto( id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY, operador INT(6) NOT NULL, nome VARCHAR(255) NOT NULL, retirada INT NOT NULL, devolvidas INT NOT NULL, total INT NOT NULL, data DATE NOT NULL, created DATETIME NOT NULL, nome_lancado VARCHAR(100) NOT NULL)";
		$conn2->exec($cpd);
		$Operador = $_POST['operador'];
		$Nome = $_POST['nome'];
		$Retirada = $_POST['retirada'];
		$Data = $_POST['data'];
		$Devolvidas = "";
		$total = "";
		$nome2 = $_SESSION["usuario"][0];

		$pesquisa_nome = $conn->prepare("SELECT * FROM cadastro_usuarios_lancamentos WHERE nome = '$nome2'");
		$pesquisa_nome->execute();
		$row = $pesquisa_nome->fetch();
		$result_nome = $row['nome'];

		try{
			$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO sacolas_cpd_agosto(id, operador, nome, retirada, devolvidas, data, created, total, nome_lancado) VALUES(null, '$Operador', '$Nome', '$Retirada', '$Devolvidas', '$Data', NOW(), '$total', '$result_nome')";
			$conn2->exec($sql);
			$last_id = $conn2->lastInsertId();
		}catch(PDOException $e) {
			echo $sql . "<br>" . $e->getMessage();
		}

		$sql = "CREATE TABLE IF NOT EXISTS sacolas_agosto( id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY, operador INT(6) NOT NULL, nome VARCHAR(255) NOT NULL, retirada INT NOT NULL, devolvidas INT NOT NULL, total INT NOT NULL, data DATE NOT NULL, created DATETIME NOT NULL, nome_lancado VARCHAR(100) NOT NULL)";
		$conn2->exec($sql);
		if(!$sql === false){
			$Operador = $_POST['operador'];
			$Nome = $_POST['nome'];
			$Retirada = $_POST['retirada'];
			$Data = $_POST['data'];
			$Devolvidas = "";
			$total = "";
			$nome2 = $_SESSION["usuario"][0];

				$pesquisa_nome = $conn->prepare("SELECT * FROM cadastro_usuarios_lancamentos WHERE nome = '$nome2'");
				$pesquisa_nome->execute();
				$row = $pesquisa_nome->fetch();
				$result_nome = $row['nome'];
			try{
				$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "INSERT INTO sacolas_agosto(id, operador, nome, retirada, devolvidas, data, created, total, nome_lancado) VALUES(null, '$Operador', '$Nome', '$Retirada', '$Devolvidas', '$Data', NOW(), '$total', '$result_nome')";
				$conn2->exec($sql);
				$last_id = $conn2->lastInsertId();
			}catch(PDOException $e) {
				echo $sql . "<br>" . $e->getMessage();
			}

			$conta_devolvida2 = $conn2->prepare("SELECT devolvidas FROM sacolas_agosto WHERE operador = '$Operador'AND data = '$Data'");
			$conta_devolvida2->execute();
			$row = $conta_devolvida2->fetch(); 
			$valor_devolvido2 = $row['devolvidas'];

			$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$checagem = $conn2->prepare("SELECT operador, nome, data FROM sacolas_agosto WHERE operador = '$Operador' AND nome = '$Nome' AND data = '$Data'");
			$checagem->execute();
			if (!$checagem === false) {
				$checagem2 = $conn2->prepare("SELECT * FROM  sacolas_agosto WHERE operador = '$Operador' AND nome = '$Nome' AND data = '$Data'");
				$checagem2->execute();
				$row = $checagem2->fetch();
				$id = $row['id'];
				$retirada2 = $row['retirada'];
				echo "<script>alert('Retiradas Existente: $retirada2 Sacolas');</script>";


				try{
					$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$sql2 = "UPDATE sacolas_agosto SET operador = '$Operador', nome = '$Nome', retirada = '$Retirada',devolvidas = '$Devolvidas', data = '$Data', total = '$total',created = NOW(), nome_lancado = '$result_nome' WHERE id = '$id' ";
					$conn2->exec($sql2);
				}catch(PDOException $e) {
					echo $sql2 . "<br>" . $e->getMessage();
				}
				$checagem3 = "SELECT COUNT(*) AS Contagem_registro FROM sacolas_agosto WHERE operador = '$Operador' AND nome = '$Nome' AND retirada = '$Retirada' AND devolvidas = '$Devolvidas' AND data = '$Data'";
				$sql3 = $conn2->prepare($checagem3);
				$sql3->execute();
				$row2 = $sql3->fetch(PDO::FETCH_ASSOC);
				if ($row2['Contagem_registro'] >= 2) {
					try{
						$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						$sql2 = "DELETE  FROM  sacolas_agosto WHERE operador = '$Operador' AND nome = '$Nome' AND retirada = '$Retirada' AND devolvidas = '$Devolvidas' AND data = '$Data' AND id = '$last_id'";
						$conn2->exec($sql2);
					}catch(PDOException $e) {
						echo $sql2 . "<br>" . $e->getMessage();
					}

					$checagem4 = $conn2->prepare("SELECT * FROM  sacolas_agosto WHERE operador = '$Operador' AND nome = '$Nome' AND data = '$Data'");
					$checagem4->execute();
					$row = $checagem4->fetch();
					$retirada3 = $row['retirada'];
					echo "<script>alert('Retiradas Atual: $retirada3 Sacolas');</script>";


					$Retirada4 = $_POST['retirada'];
					$listagem2 = $conn2->prepare("SELECT SUM('$retirada2' + '$Retirada4') as soma_retirada FROM sacolas_agosto WHERE operador = '$Operador' AND nome = '$Nome' AND retirada = '$Retirada' AND devolvidas = '$Devolvidas' AND data = '$Data'");
					$listagem2->execute();
					$row = $listagem2->fetch(); 
					$soma = $row['soma_retirada'];
					echo "<script>alert('$Nome já Retirou: $soma Sacolas');</script>";

					try{
							$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql2 = "UPDATE sacolas_agosto SET retirada = '$soma' WHERE id = '$id' ";
							$conn2->exec($sql2);
					}catch(PDOException $e) {
							echo $sql2 . "<br>" . $e->getMessage();
					}

					try{
						$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						$sql = "UPDATE sacolas_agosto SET devolvidas = '$valor_devolvido2', created = NOW(), nome_lancado = '$result_nome'  WHERE operador = '$Operador'AND data = '$Data'";
						$conn2->exec($sql);
					}catch(PDOException $e) {
						echo $sql . "<br>" . $e->getMessage();
					}

					$listagem3 = $conn2->prepare("SELECT SUM(retirada - devolvidas) as soma_retirada FROM sacolas_agosto WHERE operador = '$Operador'AND data = '$Data' ");
					$listagem3->execute();
					$row = $listagem3->fetch(); 
					$soma = $row['soma_retirada'];
					try{
						$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						$sql = "UPDATE sacolas_agosto SET total = '$soma', created = NOW(), nome_lancado = '$result_nome'  WHERE operador = '$Operador'AND data = '$Data'";
						$conn2->exec($sql);
					}catch(PDOException $e) {
						echo $sql . "<br>" . $e->getMessage();
					}

				}			
			}				
		}			
	}
}
			//devolução
if(isset($_POST['devolver'])){
	$data_mes = date('m');
	if ($data_mes == 8){
		$sql = "CREATE TABLE IF NOT EXISTS sacolas_cpd_agosto( id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY, operador INT(6) NOT NULL, nome VARCHAR(255) NOT NULL, retirada INT NOT NULL, devolvidas INT NOT NULL, total INT NOT NULL, data DATE NOT NULL, created DATETIME NOT NULL, nome_lancado VARCHAR(100) NOT NULL)";
		$conn2->exec($sql);
		
			$Operador = $_POST['operador'];
			$Nome = $_POST['nome'];
			$Devolvidas = $_POST['devolvida'];
			$Data = $_POST['data'];	
			$nome2 = $_SESSION["usuario"][0];

				$pesquisa_nome = $conn->prepare("SELECT * FROM cadastro_usuarios_lancamentos WHERE nome = '$nome2'");
				$pesquisa_nome->execute();
				$row = $pesquisa_nome->fetch();
				$result_nome = $row['nome'];


			try{
				$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "INSERT INTO sacolas_cpd_agosto(id, operador, nome, retirada, devolvidas, data, created, total, nome_lancado) VALUES(null, '$Operador', '$Nome', 0, '$Devolvidas', '$Data', NOW(), 0, '$result_nome')";
				$conn2->exec($sql);
			}catch(PDOException $e) {
				echo $sql . "<br>" . $e->getMessage();
			}

		$sql = "CREATE TABLE IF NOT EXISTS sacolas_agosto( id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY, operador INT(6) NOT NULL, nome VARCHAR(255) NOT NULL, retirada INT NOT NULL, devolvidas INT NOT NULL, total INT NOT NULL, data DATE NOT NULL, created DATETIME NOT NULL, nome_lancado VARCHAR(100) NOT NULL)";
		$conn2->exec($sql);
		if(!$sql === false){
			$Operador = $_POST['operador'];
			$Devolvidas = $_POST['devolvida'];
			$Data = $_POST['data'];	
			$nome2 = $_SESSION["usuario"][0];

				$pesquisa_nome = $conn->prepare("SELECT * FROM cadastro_usuarios_lancamentos WHERE nome = '$nome2'");
				$pesquisa_nome->execute();
				$row = $pesquisa_nome->fetch();
				$result_nome = $row['nome'];

			$conta_devolvida = $conn2->prepare("SELECT devolvidas FROM sacolas_agosto WHERE operador = '$Operador'AND data = '$Data'");
			$conta_devolvida->execute();
			$row = $conta_devolvida->fetch(); 
			$valor_devolvido = $row['devolvidas'];	

			try{
				$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "UPDATE sacolas_agosto SET devolvidas = '$Devolvidas', created = NOW(), nome_lancado = '$result_nome' WHERE operador = '$Operador'AND data = '$Data'";
				$conn2->exec($sql);
			}catch(PDOException $e) {
				echo $sql . "<br>" . $e->getMessage();
			}
			$listagem2 = $conn2->prepare("SELECT SUM('$valor_devolvido' + devolvidas) as soma_retirada FROM sacolas_agosto WHERE operador = '$Operador'AND data = '$Data' ");
			$listagem2->execute();
			$row = $listagem2->fetch(); 
			$soma = $row['soma_retirada'];
			$listagem2 = $conn2->prepare("SELECT SUM(retirada - devolvidas) as soma_retirada FROM sacolas_agosto WHERE operador = '$Operador'AND data = '$Data' ");
			$listagem2->execute();
			$row = $listagem2->fetch(); 
			$soma = $row['soma_retirada'];
			try{
				$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "UPDATE sacolas_agosto SET total = '$soma', created = NOW(),  nome_lancado = '$result_nome'  WHERE operador = '$Operador'AND data = '$Data'";
				$conn2->exec($sql);
			}catch(PDOException $e) {
				echo $sql . "<br>" . $e->getMessage();
			}
		}		
	}
}


//retirada
if(isset($_POST['retirar'])){
	$data_mes = date('m');
	if ($data_mes == 9) {

		$cpd = "CREATE TABLE IF NOT EXISTS sacolas_cpd_setembro( id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY, operador INT(6) NOT NULL, nome VARCHAR(255) NOT NULL, retirada INT NOT NULL, devolvidas INT NOT NULL, total INT NOT NULL, data DATE NOT NULL, created DATETIME NOT NULL, nome_lancado VARCHAR(100) NOT NULL)";
		$conn2->exec($cpd);
		$Operador = $_POST['operador'];
		$Nome = $_POST['nome'];
		$Retirada = $_POST['retirada'];
		$Data = $_POST['data'];
		$Devolvidas = "";
		$total = "";
		$nome2 = $_SESSION["usuario"][0];

		$pesquisa_nome = $conn->prepare("SELECT * FROM cadastro_usuarios_lancamentos WHERE nome = '$nome2'");
		$pesquisa_nome->execute();
		$row = $pesquisa_nome->fetch();
		$result_nome = $row['nome'];

		try{
			$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO sacolas_cpd_setembro(id, operador, nome, retirada, devolvidas, data, created, total, nome_lancado) VALUES(null, '$Operador', '$Nome', '$Retirada', '$Devolvidas', '$Data', NOW(), '$total', '$result_nome')";
			$conn2->exec($sql);
			$last_id = $conn2->lastInsertId();
		}catch(PDOException $e) {
			echo $sql . "<br>" . $e->getMessage();
		}

		$sql = "CREATE TABLE IF NOT EXISTS sacolas_setembro( id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY, operador INT(6) NOT NULL, nome VARCHAR(255) NOT NULL, retirada INT NOT NULL, devolvidas INT NOT NULL, total INT NOT NULL, data DATE NOT NULL, created DATETIME NOT NULL, nome_lancado VARCHAR(100) NOT NULL)";
		$conn2->exec($sql);
		if(!$sql === false){
			$Operador = $_POST['operador'];
			$Nome = $_POST['nome'];
			$Retirada = $_POST['retirada'];
			$Data = $_POST['data'];
			$Devolvidas = "";
			$total = "";
			$nome2 = $_SESSION["usuario"][0];

				$pesquisa_nome = $conn->prepare("SELECT * FROM cadastro_usuarios_lancamentos WHERE nome = '$nome2'");
				$pesquisa_nome->execute();
				$row = $pesquisa_nome->fetch();
				$result_nome = $row['nome'];
			try{
				$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "INSERT INTO sacolas_setembro(id, operador, nome, retirada, devolvidas, data, created, total, nome_lancado) VALUES(null, '$Operador', '$Nome', '$Retirada', '$Devolvidas', '$Data', NOW(), '$total', '$result_nome')";
				$conn2->exec($sql);
				$last_id = $conn2->lastInsertId();
			}catch(PDOException $e) {
				echo $sql . "<br>" . $e->getMessage();
			}

			$conta_devolvida2 = $conn2->prepare("SELECT devolvidas FROM sacolas_setembro WHERE operador = '$Operador'AND data = '$Data'");
			$conta_devolvida2->execute();
			$row = $conta_devolvida2->fetch(); 
			$valor_devolvido2 = $row['devolvidas'];

			$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$checagem = $conn2->prepare("SELECT operador, nome, data FROM sacolas_setembro WHERE operador = '$Operador' AND nome = '$Nome' AND data = '$Data'");
			$checagem->execute();
			if (!$checagem === false) {
				$checagem2 = $conn2->prepare("SELECT * FROM  sacolas_setembro WHERE operador = '$Operador' AND nome = '$Nome' AND data = '$Data'");
				$checagem2->execute();
				$row = $checagem2->fetch();
				$id = $row['id'];
				$retirada2 = $row['retirada'];
				echo "<script>alert('Retiradas Existente: $retirada2 Sacolas');</script>";


				try{
					$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$sql2 = "UPDATE sacolas_setembro SET operador = '$Operador', nome = '$Nome', retirada = '$Retirada',devolvidas = '$Devolvidas', data = '$Data', total = '$total',created = NOW(), nome_lancado = '$result_nome' WHERE id = '$id' ";
					$conn2->exec($sql2);
				}catch(PDOException $e) {
					echo $sql2 . "<br>" . $e->getMessage();
				}
				$checagem3 = "SELECT COUNT(*) AS Contagem_registro FROM sacolas_setembro WHERE operador = '$Operador' AND nome = '$Nome' AND retirada = '$Retirada' AND devolvidas = '$Devolvidas' AND data = '$Data'";
				$sql3 = $conn2->prepare($checagem3);
				$sql3->execute();
				$row2 = $sql3->fetch(PDO::FETCH_ASSOC);
				if ($row2['Contagem_registro'] >= 2) {
					try{
						$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						$sql2 = "DELETE  FROM  sacolas_setembro WHERE operador = '$Operador' AND nome = '$Nome' AND retirada = '$Retirada' AND devolvidas = '$Devolvidas' AND data = '$Data' AND id = '$last_id'";
						$conn2->exec($sql2);
					}catch(PDOException $e) {
						echo $sql2 . "<br>" . $e->getMessage();
					}

					$checagem4 = $conn2->prepare("SELECT * FROM  sacolas_setembro WHERE operador = '$Operador' AND nome = '$Nome' AND data = '$Data'");
					$checagem4->execute();
					$row = $checagem4->fetch();
					$retirada3 = $row['retirada'];
					echo "<script>alert('Retiradas Atual: $retirada3 Sacolas');</script>";


					$Retirada4 = $_POST['retirada'];
					$listagem2 = $conn2->prepare("SELECT SUM('$retirada2' + '$Retirada4') as soma_retirada FROM sacolas_setembro WHERE operador = '$Operador' AND nome = '$Nome' AND retirada = '$Retirada' AND devolvidas = '$Devolvidas' AND data = '$Data'");
					$listagem2->execute();
					$row = $listagem2->fetch(); 
					$soma = $row['soma_retirada'];
					echo "<script>alert('$Nome já Retirou: $soma Sacolas');</script>";

					try{
							$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql2 = "UPDATE sacolas_setembro SET retirada = '$soma' WHERE id = '$id' ";
							$conn2->exec($sql2);
					}catch(PDOException $e) {
							echo $sql2 . "<br>" . $e->getMessage();
					}

					try{
						$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						$sql = "UPDATE sacolas_setembro SET devolvidas = '$valor_devolvido2', created = NOW(), nome_lancado = '$result_nome'  WHERE operador = '$Operador'AND data = '$Data'";
						$conn2->exec($sql);
					}catch(PDOException $e) {
						echo $sql . "<br>" . $e->getMessage();
					}

					$listagem3 = $conn2->prepare("SELECT SUM(retirada - devolvidas) as soma_retirada FROM sacolas_setembro WHERE operador = '$Operador'AND data = '$Data' ");
					$listagem3->execute();
					$row = $listagem3->fetch(); 
					$soma = $row['soma_retirada'];
					try{
						$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						$sql = "UPDATE sacolas_setembro SET total = '$soma', created = NOW(), nome_lancado = '$result_nome'  WHERE operador = '$Operador'AND data = '$Data'";
						$conn2->exec($sql);
					}catch(PDOException $e) {
						echo $sql . "<br>" . $e->getMessage();
					}

				}			
			}				
		}			
	}
}		

			//devolução
if(isset($_POST['devolver'])){
	$data_mes = date('m');
	if ($data_mes == 9){
		$sql = "CREATE TABLE IF NOT EXISTS sacolas_cpd_setembro( id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY, operador INT(6) NOT NULL, nome VARCHAR(255) NOT NULL, retirada INT NOT NULL, devolvidas INT NOT NULL, total INT NOT NULL, data DATE NOT NULL, created DATETIME NOT NULL, nome_lancado VARCHAR(100) NOT NULL)";
		$conn2->exec($sql);
		
			$Operador = $_POST['operador'];
			$Nome = $_POST['nome'];
			$Devolvidas = $_POST['devolvida'];
			$Data = $_POST['data'];	
			$nome2 = $_SESSION["usuario"][0];

				$pesquisa_nome = $conn->prepare("SELECT * FROM cadastro_usuarios_lancamentos WHERE nome = '$nome2'");
				$pesquisa_nome->execute();
				$row = $pesquisa_nome->fetch();
				$result_nome = $row['nome'];


			try{
				$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "INSERT INTO sacolas_cpd_setembro(id, operador, nome, retirada, devolvidas, data, created, total, nome_lancado) VALUES(null, '$Operador', '$Nome', 0, '$Devolvidas', '$Data', NOW(), 0, '$result_nome')";
				$conn2->exec($sql);
			}catch(PDOException $e) {
				echo $sql . "<br>" . $e->getMessage();
			}

		$sql = "CREATE TABLE IF NOT EXISTS sacolas_setembro( id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY, operador INT(6) NOT NULL, nome VARCHAR(255) NOT NULL, retirada INT NOT NULL, devolvidas INT NOT NULL, total INT NOT NULL, data DATE NOT NULL, created DATETIME NOT NULL, nome_lancado VARCHAR(100) NOT NULL)";
		$conn2->exec($sql);
		if(!$sql === false){
			$Operador = $_POST['operador'];
			$Devolvidas = $_POST['devolvida'];
			$Data = $_POST['data'];	
			$nome2 = $_SESSION["usuario"][0];

				$pesquisa_nome = $conn->prepare("SELECT * FROM cadastro_usuarios_lancamentos WHERE nome = '$nome2'");
				$pesquisa_nome->execute();
				$row = $pesquisa_nome->fetch();
				$result_nome = $row['nome'];

			$conta_devolvida = $conn2->prepare("SELECT devolvidas FROM sacolas_setembro WHERE operador = '$Operador'AND data = '$Data'");
			$conta_devolvida->execute();
			$row = $conta_devolvida->fetch(); 
			$valor_devolvido = $row['devolvidas'];

			try{
				$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "UPDATE sacolas_setembro SET devolvidas = '$Devolvidas', created = NOW(), nome_lancado = '$result_nome' WHERE operador = '$Operador'AND data = '$Data'";
				$conn2->exec($sql);
			}catch(PDOException $e) {
				echo $sql . "<br>" . $e->getMessage();
			}
			$listagem2 = $conn2->prepare("SELECT SUM('$valor_devolvido' + devolvidas) as soma_retirada FROM sacolas_setembro WHERE operador = '$Operador'AND data = '$Data' ");
			$listagem2->execute();
			$row = $listagem2->fetch(); 
			$soma = $row['soma_retirada'];
			$listagem2 = $conn2->prepare("SELECT SUM(retirada - devolvidas) as soma_retirada FROM sacolas_setembro WHERE operador = '$Operador'AND data = '$Data' ");
			$listagem2->execute();
			$row = $listagem2->fetch(); 
			$soma = $row['soma_retirada'];
			try{
				$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "UPDATE sacolas_setembro SET total = '$soma', created = NOW(),  nome_lancado = '$result_nome'  WHERE operador = '$Operador'AND data = '$Data'";
				$conn2->exec($sql);
			}catch(PDOException $e) {
				echo $sql . "<br>" . $e->getMessage();
			}
		}		
	}
}




//retirada
if(isset($_POST['retirar'])){
	$data_mes = date('m');
	if ($data_mes == 10) {

		$cpd = "CREATE TABLE IF NOT EXISTS sacolas_cpd_outubro( id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY, operador INT(6) NOT NULL, nome VARCHAR(255) NOT NULL, retirada INT NOT NULL, devolvidas INT NOT NULL, total INT NOT NULL, data DATE NOT NULL, created DATETIME NOT NULL, nome_lancado VARCHAR(100) NOT NULL)";
		$conn2->exec($cpd);
		$Operador = $_POST['operador'];
		$Nome = $_POST['nome'];
		$Retirada = $_POST['retirada'];
		$Data = $_POST['data'];
		$Devolvidas = "";
		$total = "";
		$nome2 = $_SESSION["usuario"][0];

		$pesquisa_nome = $conn->prepare("SELECT * FROM cadastro_usuarios_lancamentos WHERE nome = '$nome2'");
		$pesquisa_nome->execute();
		$row = $pesquisa_nome->fetch();
		$result_nome = $row['nome'];

		try{
			$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO sacolas_cpd_outubro(id, operador, nome, retirada, devolvidas, data, created, total, nome_lancado) VALUES(null, '$Operador', '$Nome', '$Retirada', '$Devolvidas', '$Data', NOW(), '$total', '$result_nome')";
			$conn2->exec($sql);
			$last_id = $conn2->lastInsertId();
		}catch(PDOException $e) {
			echo $sql . "<br>" . $e->getMessage();
		}

		$sql = "CREATE TABLE IF NOT EXISTS sacolas_outubro( id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY, operador INT(6) NOT NULL, nome VARCHAR(255) NOT NULL, retirada INT NOT NULL, devolvidas INT NOT NULL, total INT NOT NULL, data DATE NOT NULL, created DATETIME NOT NULL, nome_lancado VARCHAR(100) NOT NULL)";
		$conn2->exec($sql);
		if(!$sql === false){
			$Operador = $_POST['operador'];
			$Nome = $_POST['nome'];
			$Retirada = $_POST['retirada'];
			$Data = $_POST['data'];
			$Devolvidas = "";
			$total = "";
			$nome2 = $_SESSION["usuario"][0];

				$pesquisa_nome = $conn->prepare("SELECT * FROM cadastro_usuarios_lancamentos WHERE nome = '$nome2'");
				$pesquisa_nome->execute();
				$row = $pesquisa_nome->fetch();
				$result_nome = $row['nome'];
			try{
				$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "INSERT INTO sacolas_outubro(id, operador, nome, retirada, devolvidas, data, created, total, nome_lancado) VALUES(null, '$Operador', '$Nome', '$Retirada', '$Devolvidas', '$Data', NOW(), '$total', '$result_nome')";
				$conn2->exec($sql);
				$last_id = $conn2->lastInsertId();
			}catch(PDOException $e) {
				echo $sql . "<br>" . $e->getMessage();
			}

			$conta_devolvida2 = $conn2->prepare("SELECT devolvidas FROM sacolas_outubro WHERE operador = '$Operador'AND data = '$Data'");
			$conta_devolvida2->execute();
			$row = $conta_devolvida2->fetch(); 
			$valor_devolvido2 = $row['devolvidas'];

			$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$checagem = $conn2->prepare("SELECT operador, nome, data FROM sacolas_outubro WHERE operador = '$Operador' AND nome = '$Nome' AND data = '$Data'");
			$checagem->execute();
			if (!$checagem === false) {
				$checagem2 = $conn2->prepare("SELECT * FROM  sacolas_outubro WHERE operador = '$Operador' AND nome = '$Nome' AND data = '$Data'");
				$checagem2->execute();
				$row = $checagem2->fetch();
				$id = $row['id'];
				$retirada2 = $row['retirada'];
				echo "<script>alert('Retiradas Existente: $retirada2 Sacolas');</script>";


				try{
					$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$sql2 = "UPDATE sacolas_outubro SET operador = '$Operador', nome = '$Nome', retirada = '$Retirada',devolvidas = '$Devolvidas', data = '$Data', total = '$total',created = NOW(), nome_lancado = '$result_nome' WHERE id = '$id' ";
					$conn2->exec($sql2);
				}catch(PDOException $e) {
					echo $sql2 . "<br>" . $e->getMessage();
				}
				$checagem3 = "SELECT COUNT(*) AS Contagem_registro FROM sacolas_outubro WHERE operador = '$Operador' AND nome = '$Nome' AND retirada = '$Retirada' AND devolvidas = '$Devolvidas' AND data = '$Data'";
				$sql3 = $conn2->prepare($checagem3);
				$sql3->execute();
				$row2 = $sql3->fetch(PDO::FETCH_ASSOC);
				if ($row2['Contagem_registro'] >= 2) {
					try{
						$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						$sql2 = "DELETE  FROM  sacolas_outubro WHERE operador = '$Operador' AND nome = '$Nome' AND retirada = '$Retirada' AND devolvidas = '$Devolvidas' AND data = '$Data' AND id = '$last_id'";
						$conn2->exec($sql2);
					}catch(PDOException $e) {
						echo $sql2 . "<br>" . $e->getMessage();
					}

					$checagem4 = $conn2->prepare("SELECT * FROM  sacolas_outubro WHERE operador = '$Operador' AND nome = '$Nome' AND data = '$Data'");
					$checagem4->execute();
					$row = $checagem4->fetch();
					$retirada3 = $row['retirada'];
					echo "<script>alert('Retiradas Atual: $retirada3 Sacolas');</script>";


					$Retirada4 = $_POST['retirada'];
					$listagem2 = $conn2->prepare("SELECT SUM('$retirada2' + '$Retirada4') as soma_retirada FROM sacolas_outubro WHERE operador = '$Operador' AND nome = '$Nome' AND retirada = '$Retirada' AND devolvidas = '$Devolvidas' AND data = '$Data'");
					$listagem2->execute();
					$row = $listagem2->fetch(); 
					$soma = $row['soma_retirada'];
					echo "<script>alert('$Nome já Retirou: $soma Sacolas');</script>";

					try{
							$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql2 = "UPDATE sacolas_outubro SET retirada = '$soma' WHERE id = '$id' ";
							$conn2->exec($sql2);
					}catch(PDOException $e) {
							echo $sql2 . "<br>" . $e->getMessage();
					}

					try{
						$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						$sql = "UPDATE sacolas_outubro SET devolvidas = '$valor_devolvido2', created = NOW(), nome_lancado = '$result_nome'  WHERE operador = '$Operador'AND data = '$Data'";
						$conn2->exec($sql);
					}catch(PDOException $e) {
						echo $sql . "<br>" . $e->getMessage();
					}

					$listagem3 = $conn2->prepare("SELECT SUM(retirada - devolvidas) as soma_retirada FROM sacolas_outubro WHERE operador = '$Operador'AND data = '$Data' ");
					$listagem3->execute();
					$row = $listagem3->fetch(); 
					$soma = $row['soma_retirada'];
					try{
						$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						$sql = "UPDATE sacolas_outubro SET total = '$soma', created = NOW(), nome_lancado = '$result_nome'  WHERE operador = '$Operador'AND data = '$Data'";
						$conn2->exec($sql);
					}catch(PDOException $e) {
						echo $sql . "<br>" . $e->getMessage();
					}

				}			
			}				
		}			
	}
}
			//devolução
if(isset($_POST['devolver'])){
	$data_mes = date('m');
	if ($data_mes == 10){
		$sql = "CREATE TABLE IF NOT EXISTS sacolas_cpd_outubro( id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY, operador INT(6) NOT NULL, nome VARCHAR(255) NOT NULL, retirada INT NOT NULL, devolvidas INT NOT NULL, total INT NOT NULL, data DATE NOT NULL, created DATETIME NOT NULL, nome_lancado VARCHAR(100) NOT NULL)";
		$conn2->exec($sql);
		
			$Operador = $_POST['operador'];
			$Nome = $_POST['nome'];
			$Devolvidas = $_POST['devolvida'];
			$Data = $_POST['data'];	
			$nome2 = $_SESSION["usuario"][0];

				$pesquisa_nome = $conn->prepare("SELECT * FROM cadastro_usuarios_lancamentos WHERE nome = '$nome2'");
				$pesquisa_nome->execute();
				$row = $pesquisa_nome->fetch();
				$result_nome = $row['nome'];


			try{
				$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "INSERT INTO sacolas_cpd_outubro(id, operador, nome, retirada, devolvidas, data, created, total, nome_lancado) VALUES(null, '$Operador', '$Nome', 0, '$Devolvidas', '$Data', NOW(), 0, '$result_nome')";
				$conn2->exec($sql);
			}catch(PDOException $e) {
				echo $sql . "<br>" . $e->getMessage();
			}

		$sql = "CREATE TABLE IF NOT EXISTS sacolas_outubro( id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY, operador INT(6) NOT NULL, nome VARCHAR(255) NOT NULL, retirada INT NOT NULL, devolvidas INT NOT NULL, total INT NOT NULL, data DATE NOT NULL, created DATETIME NOT NULL, nome_lancado VARCHAR(100) NOT NULL)";
		$conn2->exec($sql);
		if(!$sql === false){
			$Operador = $_POST['operador'];
			$Devolvidas = $_POST['devolvida'];
			$Data = $_POST['data'];	
			$nome2 = $_SESSION["usuario"][0];

				$pesquisa_nome = $conn->prepare("SELECT * FROM cadastro_usuarios_lancamentos WHERE nome = '$nome2'");
				$pesquisa_nome->execute();
				$row = $pesquisa_nome->fetch();
				$result_nome = $row['nome'];

			$conta_devolvida = $conn2->prepare("SELECT devolvidas FROM sacolas_outubro WHERE operador = '$Operador'AND data = '$Data'");
			$conta_devolvida->execute();
			$row = $conta_devolvida->fetch(); 
			$valor_devolvido = $row['devolvidas'];	

			try{
				$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "UPDATE sacolas_outubro SET devolvidas = '$Devolvidas', created = NOW(), nome_lancado = '$result_nome' WHERE operador = '$Operador'AND data = '$Data'";
				$conn2->exec($sql);
			}catch(PDOException $e) {
				echo $sql . "<br>" . $e->getMessage();
			}
			$listagem2 = $conn2->prepare("SELECT SUM('$valor_devolvido' + devolvidas) as soma_retirada FROM sacolas_outubro WHERE operador = '$Operador'AND data = '$Data' ");
			$listagem2->execute();
			$row = $listagem2->fetch(); 
			$soma = $row['soma_retirada'];
			$listagem2 = $conn2->prepare("SELECT SUM(retirada - devolvidas) as soma_retirada FROM sacolas_outubro WHERE operador = '$Operador'AND data = '$Data' ");
			$listagem2->execute();
			$row = $listagem2->fetch(); 
			$soma = $row['soma_retirada'];
			try{
				$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "UPDATE sacolas_outubro SET total = '$soma', created = NOW(),  nome_lancado = '$result_nome'  WHERE operador = '$Operador'AND data = '$Data'";
				$conn2->exec($sql);
			}catch(PDOException $e) {
				echo $sql . "<br>" . $e->getMessage();
			}
		}		
	}
}




	//retirada
if(isset($_POST['retirar'])){
	$data_mes = date('m');
	if ($data_mes == 11) {

		$cpd = "CREATE TABLE IF NOT EXISTS sacolas_cpd_novembro( id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY, operador INT(6) NOT NULL, nome VARCHAR(255) NOT NULL, retirada INT NOT NULL, devolvidas INT NOT NULL, total INT NOT NULL, data DATE NOT NULL, created DATETIME NOT NULL, nome_lancado VARCHAR(100) NOT NULL)";
		$conn2->exec($cpd);
		$Operador = $_POST['operador'];
		$Nome = $_POST['nome'];
		$Retirada = $_POST['retirada'];
		$Data = $_POST['data'];
		$Devolvidas = "";
		$total = "";
		$nome2 = $_SESSION["usuario"][0];

		$pesquisa_nome = $conn->prepare("SELECT * FROM cadastro_usuarios_lancamentos WHERE nome = '$nome2'");
		$pesquisa_nome->execute();
		$row = $pesquisa_nome->fetch();
		$result_nome = $row['nome'];

		try{
			$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO sacolas_cpd_novembro(id, operador, nome, retirada, devolvidas, data, created, total, nome_lancado) VALUES(null, '$Operador', '$Nome', '$Retirada', '$Devolvidas', '$Data', NOW(), '$total', '$result_nome')";
			$conn2->exec($sql);
			$last_id = $conn2->lastInsertId();
		}catch(PDOException $e) {
			echo $sql . "<br>" . $e->getMessage();
		}

		$sql = "CREATE TABLE IF NOT EXISTS sacolas_novembro( id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY, operador INT(6) NOT NULL, nome VARCHAR(255) NOT NULL, retirada INT NOT NULL, devolvidas INT NOT NULL, total INT NOT NULL, data DATE NOT NULL, created DATETIME NOT NULL, nome_lancado VARCHAR(100) NOT NULL)";
		$conn2->exec($sql);
		if(!$sql === false){
			$Operador = $_POST['operador'];
			$Nome = $_POST['nome'];
			$Retirada = $_POST['retirada'];
			$Data = $_POST['data'];
			$Devolvidas = "";
			$total = "";
			$nome2 = $_SESSION["usuario"][0];

				$pesquisa_nome = $conn->prepare("SELECT * FROM cadastro_usuarios_lancamentos WHERE nome = '$nome2'");
				$pesquisa_nome->execute();
				$row = $pesquisa_nome->fetch();
				$result_nome = $row['nome'];
			try{
				$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "INSERT INTO sacolas_novembro(id, operador, nome, retirada, devolvidas, data, created, total, nome_lancado) VALUES(null, '$Operador', '$Nome', '$Retirada', '$Devolvidas', '$Data', NOW(), '$total', '$result_nome')";
				$conn2->exec($sql);
				$last_id = $conn2->lastInsertId();
			}catch(PDOException $e) {
				echo $sql . "<br>" . $e->getMessage();
			}

			$conta_devolvida2 = $conn2->prepare("SELECT devolvidas FROM sacolas_novembro WHERE operador = '$Operador'AND data = '$Data'");
			$conta_devolvida2->execute();
			$row = $conta_devolvida2->fetch(); 
			$valor_devolvido2 = $row['devolvidas'];

			$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$checagem = $conn2->prepare("SELECT operador, nome, data FROM sacolas_novembro WHERE operador = '$Operador' AND nome = '$Nome' AND data = '$Data'");
			$checagem->execute();
			if (!$checagem === false) {
				$checagem2 = $conn2->prepare("SELECT * FROM  sacolas_novembro WHERE operador = '$Operador' AND nome = '$Nome' AND data = '$Data'");
				$checagem2->execute();
				$row = $checagem2->fetch();
				$id = $row['id'];
				$retirada2 = $row['retirada'];
				echo "<script>alert('Retiradas Existente: $retirada2 Sacolas');</script>";


				try{
					$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$sql2 = "UPDATE sacolas_novembro SET operador = '$Operador', nome = '$Nome', retirada = '$Retirada',devolvidas = '$Devolvidas', data = '$Data', total = '$total',created = NOW(), nome_lancado = '$result_nome' WHERE id = '$id' ";
					$conn2->exec($sql2);
				}catch(PDOException $e) {
					echo $sql2 . "<br>" . $e->getMessage();
				}
				$checagem3 = "SELECT COUNT(*) AS Contagem_registro FROM sacolas_novembro WHERE operador = '$Operador' AND nome = '$Nome' AND retirada = '$Retirada' AND devolvidas = '$Devolvidas' AND data = '$Data'";
				$sql3 = $conn2->prepare($checagem3);
				$sql3->execute();
				$row2 = $sql3->fetch(PDO::FETCH_ASSOC);
				if ($row2['Contagem_registro'] >= 2) {
					try{
						$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						$sql2 = "DELETE  FROM  sacolas_novembro WHERE operador = '$Operador' AND nome = '$Nome' AND retirada = '$Retirada' AND devolvidas = '$Devolvidas' AND data = '$Data' AND id = '$last_id'";
						$conn2->exec($sql2);
					}catch(PDOException $e) {
						echo $sql2 . "<br>" . $e->getMessage();
					}

					$checagem4 = $conn2->prepare("SELECT * FROM  sacolas_novembro WHERE operador = '$Operador' AND nome = '$Nome' AND data = '$Data'");
					$checagem4->execute();
					$row = $checagem4->fetch();
					$retirada3 = $row['retirada'];
					echo "<script>alert('Retiradas Atual: $retirada3 Sacolas');</script>";


					$Retirada4 = $_POST['retirada'];
					$listagem2 = $conn2->prepare("SELECT SUM('$retirada2' + '$Retirada4') as soma_retirada FROM sacolas_novembro WHERE operador = '$Operador' AND nome = '$Nome' AND retirada = '$Retirada' AND devolvidas = '$Devolvidas' AND data = '$Data'");
					$listagem2->execute();
					$row = $listagem2->fetch(); 
					$soma = $row['soma_retirada'];
					echo "<script>alert('$Nome já Retirou: $soma Sacolas');</script>";

					try{
							$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql2 = "UPDATE sacolas_novembro SET retirada = '$soma' WHERE id = '$id' ";
							$conn2->exec($sql2);
					}catch(PDOException $e) {
							echo $sql2 . "<br>" . $e->getMessage();
					}

					try{
						$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						$sql = "UPDATE sacolas_novembro SET devolvidas = '$valor_devolvido2', created = NOW(), nome_lancado = '$result_nome'  WHERE operador = '$Operador'AND data = '$Data'";
						$conn2->exec($sql);
					}catch(PDOException $e) {
						echo $sql . "<br>" . $e->getMessage();
					}

					$listagem3 = $conn2->prepare("SELECT SUM(retirada - devolvidas) as soma_retirada FROM sacolas_novembro WHERE operador = '$Operador'AND data = '$Data' ");
					$listagem3->execute();
					$row = $listagem3->fetch(); 
					$soma = $row['soma_retirada'];
					try{
						$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						$sql = "UPDATE sacolas_novembro SET total = '$soma', created = NOW(), nome_lancado = '$result_nome'  WHERE operador = '$Operador'AND data = '$Data'";
						$conn2->exec($sql);
					}catch(PDOException $e) {
						echo $sql . "<br>" . $e->getMessage();
					}

				}			
			}				
		}			
	}
}
			
//devolução
if(isset($_POST['devolver'])){
	$data_mes = date('m');
	if ($data_mes == 11){
		$sql = "CREATE TABLE IF NOT EXISTS sacolas_cpd_novembro( id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY, operador INT(6) NOT NULL, nome VARCHAR(255) NOT NULL, retirada INT NOT NULL, devolvidas INT NOT NULL, total INT NOT NULL, data DATE NOT NULL, created DATETIME NOT NULL, nome_lancado VARCHAR(100) NOT NULL)";
		$conn2->exec($sql);
		
			$Operador = $_POST['operador'];
			$Nome = $_POST['nome'];
			$Devolvidas = $_POST['devolvida'];
			$Data = $_POST['data'];	
			$nome2 = $_SESSION["usuario"][0];

				$pesquisa_nome = $conn->prepare("SELECT * FROM cadastro_usuarios_lancamentos WHERE nome = '$nome2'");
				$pesquisa_nome->execute();
				$row = $pesquisa_nome->fetch();
				$result_nome = $row['nome'];


			try{
				$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "INSERT INTO sacolas_cpd_novembro(id, operador, nome, retirada, devolvidas, data, created, total, nome_lancado) VALUES(null, '$Operador', '$Nome', 0, '$Devolvidas', '$Data', NOW(), 0, '$result_nome')";
				$conn2->exec($sql);
			}catch(PDOException $e) {
				echo $sql . "<br>" . $e->getMessage();
			}

		$sql = "CREATE TABLE IF NOT EXISTS sacolas_novembro( id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY, operador INT(6) NOT NULL, nome VARCHAR(255) NOT NULL, retirada INT NOT NULL, devolvidas INT NOT NULL, total INT NOT NULL, data DATE NOT NULL, created DATETIME NOT NULL, nome_lancado VARCHAR(100) NOT NULL)";
		$conn2->exec($sql);
		if(!$sql === false){
			$Operador = $_POST['operador'];
			$Devolvidas = $_POST['devolvida'];
			$Data = $_POST['data'];	
			$nome2 = $_SESSION["usuario"][0];

				$pesquisa_nome = $conn->prepare("SELECT * FROM cadastro_usuarios_lancamentos WHERE nome = '$nome2'");
				$pesquisa_nome->execute();
				$row = $pesquisa_nome->fetch();
				$result_nome = $row['nome'];

			$conta_devolvida = $conn2->prepare("SELECT devolvidas FROM sacolas_novembro WHERE operador = '$Operador'AND data = '$Data'");
			$conta_devolvida->execute();
			$row = $conta_devolvida->fetch(); 
			$valor_devolvido = $row['devolvidas'];	

			try{
				$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "UPDATE sacolas_novembro SET devolvidas = '$Devolvidas', created = NOW(), nome_lancado = '$result_nome' WHERE operador = '$Operador'AND data = '$Data'";
				$conn2->exec($sql);
			}catch(PDOException $e) {
				echo $sql . "<br>" . $e->getMessage();
			}
			$listagem2 = $conn2->prepare("SELECT SUM('$valor_devolvido' + devolvidas) as soma_retirada FROM sacolas_novembro WHERE operador = '$Operador'AND data = '$Data' ");
			$listagem2->execute();
			$row = $listagem2->fetch(); 
			$soma = $row['soma_retirada'];
			$listagem2 = $conn2->prepare("SELECT SUM(retirada - devolvidas) as soma_retirada FROM sacolas_novembro WHERE operador = '$Operador'AND data = '$Data' ");
			$listagem2->execute();
			$row = $listagem2->fetch(); 
			$soma = $row['soma_retirada'];
			try{
				$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "UPDATE sacolas_novembro SET total = '$soma', created = NOW(),  nome_lancado = '$result_nome'  WHERE operador = '$Operador'AND data = '$Data'";
				$conn2->exec($sql);
			}catch(PDOException $e) {
				echo $sql . "<br>" . $e->getMessage();
			}
		}		
	}
}

//retirada
if(isset($_POST['retirar'])){
	$data_mes = date('m');
	if ($data_mes == 12) {

		$cpd = "CREATE TABLE IF NOT EXISTS sacolas_cpd_dezembro( id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY, operador INT(6) NOT NULL, nome VARCHAR(255) NOT NULL, retirada INT NOT NULL, devolvidas INT NOT NULL, total INT NOT NULL, data DATE NOT NULL, created DATETIME NOT NULL, nome_lancado VARCHAR(100) NOT NULL)";
		$conn2->exec($cpd);
		$Operador = $_POST['operador'];
		$Nome = $_POST['nome'];
		$Retirada = $_POST['retirada'];
		$Data = $_POST['data'];
		$Devolvidas = "";
		$total = "";
		$nome2 = $_SESSION["usuario"][0];

		$pesquisa_nome = $conn->prepare("SELECT * FROM cadastro_usuarios_lancamentos WHERE nome = '$nome2'");
		$pesquisa_nome->execute();
		$row = $pesquisa_nome->fetch();
		$result_nome = $row['nome'];

		try{
			$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO sacolas_cpd_dezembro(id, operador, nome, retirada, devolvidas, data, created, total, nome_lancado) VALUES(null, '$Operador', '$Nome', '$Retirada', '$Devolvidas', '$Data', NOW(), '$total', '$result_nome')";
			$conn2->exec($sql);
			$last_id = $conn2->lastInsertId();
		}catch(PDOException $e) {
			echo $sql . "<br>" . $e->getMessage();
		}

		$sql = "CREATE TABLE IF NOT EXISTS sacolas_dezembro( id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY, operador INT(6) NOT NULL, nome VARCHAR(255) NOT NULL, retirada INT NOT NULL, devolvidas INT NOT NULL, total INT NOT NULL, data DATE NOT NULL, created DATETIME NOT NULL, nome_lancado VARCHAR(100) NOT NULL)";
		$conn2->exec($sql);
		if(!$sql === false){
			$Operador = $_POST['operador'];
			$Nome = $_POST['nome'];
			$Retirada = $_POST['retirada'];
			$Data = $_POST['data'];
			$Devolvidas = "";
			$total = "";
			$nome2 = $_SESSION["usuario"][0];

				$pesquisa_nome = $conn->prepare("SELECT * FROM cadastro_usuarios_lancamentos WHERE nome = '$nome2'");
				$pesquisa_nome->execute();
				$row = $pesquisa_nome->fetch();
				$result_nome = $row['nome'];
			try{
				$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "INSERT INTO sacolas_dezembro(id, operador, nome, retirada, devolvidas, data, created, total, nome_lancado) VALUES(null, '$Operador', '$Nome', '$Retirada', '$Devolvidas', '$Data', NOW(), '$total', '$result_nome')";
				$conn2->exec($sql);
				$last_id = $conn2->lastInsertId();
			}catch(PDOException $e) {
				echo $sql . "<br>" . $e->getMessage();
			}

			$conta_devolvida2 = $conn2->prepare("SELECT devolvidas FROM sacolas_dezembro WHERE operador = '$Operador'AND data = '$Data'");
			$conta_devolvida2->execute();
			$row = $conta_devolvida2->fetch(); 
			$valor_devolvido2 = $row['devolvidas'];

			$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$checagem = $conn2->prepare("SELECT operador, nome, data FROM sacolas_dezembro WHERE operador = '$Operador' AND nome = '$Nome' AND data = '$Data'");
			$checagem->execute();
			if (!$checagem === false) {
				$checagem2 = $conn2->prepare("SELECT * FROM  sacolas_dezembro WHERE operador = '$Operador' AND nome = '$Nome' AND data = '$Data'");
				$checagem2->execute();
				$row = $checagem2->fetch();
				$id = $row['id'];
				$retirada2 = $row['retirada'];
				echo "<script>alert('Retiradas Existente: $retirada2 Sacolas');</script>";


				try{
					$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$sql2 = "UPDATE sacolas_dezembro SET operador = '$Operador', nome = '$Nome', retirada = '$Retirada',devolvidas = '$Devolvidas', data = '$Data', total = '$total',created = NOW(), nome_lancado = '$result_nome' WHERE id = '$id' ";
					$conn2->exec($sql2);
				}catch(PDOException $e) {
					echo $sql2 . "<br>" . $e->getMessage();
				}
				$checagem3 = "SELECT COUNT(*) AS Contagem_registro FROM sacolas_dezembro WHERE operador = '$Operador' AND nome = '$Nome' AND retirada = '$Retirada' AND devolvidas = '$Devolvidas' AND data = '$Data'";
				$sql3 = $conn2->prepare($checagem3);
				$sql3->execute();
				$row2 = $sql3->fetch(PDO::FETCH_ASSOC);
				if ($row2['Contagem_registro'] >= 2) {
					try{
						$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						$sql2 = "DELETE  FROM  sacolas_dezembro WHERE operador = '$Operador' AND nome = '$Nome' AND retirada = '$Retirada' AND devolvidas = '$Devolvidas' AND data = '$Data' AND id = '$last_id'";
						$conn2->exec($sql2);
					}catch(PDOException $e) {
						echo $sql2 . "<br>" . $e->getMessage();
					}

					$checagem4 = $conn2->prepare("SELECT * FROM  sacolas_dezembro WHERE operador = '$Operador' AND nome = '$Nome' AND data = '$Data'");
					$checagem4->execute();
					$row = $checagem4->fetch();
					$retirada3 = $row['retirada'];
					echo "<script>alert('Retiradas Atual: $retirada3 Sacolas');</script>";


					$Retirada4 = $_POST['retirada'];
					$listagem2 = $conn2->prepare("SELECT SUM('$retirada2' + '$Retirada4') as soma_retirada FROM sacolas_dezembro WHERE operador = '$Operador' AND nome = '$Nome' AND retirada = '$Retirada' AND devolvidas = '$Devolvidas' AND data = '$Data'");
					$listagem2->execute();
					$row = $listagem2->fetch(); 
					$soma = $row['soma_retirada'];
					echo "<script>alert('$Nome já Retirou: $soma Sacolas');</script>";

					try{
							$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql2 = "UPDATE sacolas_dezembro SET retirada = '$soma' WHERE id = '$id' ";
							$conn2->exec($sql2);
					}catch(PDOException $e) {
							echo $sql2 . "<br>" . $e->getMessage();
					}

					try{
						$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						$sql = "UPDATE sacolas_dezembro SET devolvidas = '$valor_devolvido2', created = NOW(), nome_lancado = '$result_nome'  WHERE operador = '$Operador'AND data = '$Data'";
						$conn2->exec($sql);
					}catch(PDOException $e) {
						echo $sql . "<br>" . $e->getMessage();
					}

					$listagem3 = $conn2->prepare("SELECT SUM(retirada - devolvidas) as soma_retirada FROM sacolas_dezembro WHERE operador = '$Operador'AND data = '$Data' ");
					$listagem3->execute();
					$row = $listagem3->fetch(); 
					$soma = $row['soma_retirada'];
					try{
						$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						$sql = "UPDATE sacolas_dezembro SET total = '$soma', created = NOW(), nome_lancado = '$result_nome'  WHERE operador = '$Operador'AND data = '$Data'";
						$conn2->exec($sql);
					}catch(PDOException $e) {
						echo $sql . "<br>" . $e->getMessage();
					}

				}			
			}				
		}			
	}
}


//devolução
if(isset($_POST['devolver'])){
	$data_mes = date('m');
	if ($data_mes == 12){
		$sql = "CREATE TABLE IF NOT EXISTS sacolas_cpd_dezembro( id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY, operador INT(6) NOT NULL, nome VARCHAR(255) NOT NULL, retirada INT NOT NULL, devolvidas INT NOT NULL, total INT NOT NULL, data DATE NOT NULL, created DATETIME NOT NULL, nome_lancado VARCHAR(100) NOT NULL)";
		$conn2->exec($sql);
		
			$Operador = $_POST['operador'];
			$Nome = $_POST['nome'];
			$Devolvidas = $_POST['devolvida'];
			$Data = $_POST['data'];	
			$nome2 = $_SESSION["usuario"][0];

				$pesquisa_nome = $conn->prepare("SELECT * FROM cadastro_usuarios_lancamentos WHERE nome = '$nome2'");
				$pesquisa_nome->execute();
				$row = $pesquisa_nome->fetch();
				$result_nome = $row['nome'];


			try{
				$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "INSERT INTO sacolas_cpd_dezembro(id, operador, nome, retirada, devolvidas, data, created, total, nome_lancado) VALUES(null, '$Operador', '$Nome', 0, '$Devolvidas', '$Data', NOW(), 0, '$result_nome')";
				$conn2->exec($sql);
			}catch(PDOException $e) {
				echo $sql . "<br>" . $e->getMessage();
			}

		$sql = "CREATE TABLE IF NOT EXISTS sacolas_dezembro( id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY, operador INT(6) NOT NULL, nome VARCHAR(255) NOT NULL, retirada INT NOT NULL, devolvidas INT NOT NULL, total INT NOT NULL, data DATE NOT NULL, created DATETIME NOT NULL, nome_lancado VARCHAR(100) NOT NULL)";
		$conn2->exec($sql);
		if(!$sql === false){
			$Operador = $_POST['operador'];
			$Devolvidas = $_POST['devolvida'];
			$Data = $_POST['data'];	
			$nome2 = $_SESSION["usuario"][0];

				$pesquisa_nome = $conn->prepare("SELECT * FROM cadastro_usuarios_lancamentos WHERE nome = '$nome2'");
				$pesquisa_nome->execute();
				$row = $pesquisa_nome->fetch();
				$result_nome = $row['nome'];

				$conta_devolvida = $conn2->prepare("SELECT devolvidas FROM sacolas_dezembro WHERE operador = '$Operador'AND data = '$Data'");
			$conta_devolvida->execute();
			$row = $conta_devolvida->fetch(); 
			$valor_devolvido = $row['devolvidas'];

			try{
				$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "UPDATE sacolas_dezembro SET devolvidas = '$Devolvidas', created = NOW(), nome_lancado = '$result_nome' WHERE operador = '$Operador'AND data = '$Data'";
				$conn2->exec($sql);
			}catch(PDOException $e) {
				echo $sql . "<br>" . $e->getMessage();
			}


			$listagem2 = $conn2->prepare("SELECT SUM('$valor_devolvido' + devolvidas) as soma_retirada FROM sacolas_dezembro WHERE operador = '$Operador'AND data = '$Data' ");
			$listagem2->execute();
			$row = $listagem2->fetch(); 
			$soma = $row['soma_retirada'];


			try{
				$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "UPDATE sacolas_dezembro SET devolvidas = '$soma', created = NOW(), nome_lancado = '$result_nome' WHERE operador = '$Operador'AND data = '$Data'";
				$conn2->exec($sql);
			}catch(PDOException $e) {
				echo $sql . "<br>" . $e->getMessage();
			}

			$listagem2 = $conn2->prepare("SELECT SUM(retirada - devolvidas) as soma_retirada FROM sacolas_dezembro WHERE operador = '$Operador'AND data = '$Data' ");
			$listagem2->execute();
			$row = $listagem2->fetch(); 
			$soma = $row['soma_retirada'];
			try{
				$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "UPDATE sacolas_dezembro SET total = '$soma', created = NOW(),  nome_lancado = '$result_nome'  WHERE operador = '$Operador'AND data = '$Data'";
				$conn2->exec($sql);
			}catch(PDOException $e) {
				echo $sql . "<br>" . $e->getMessage();
			}
		}		
	}
}
			
	?>
	<?php if ($adm == 2): ?>
	<div class="menu">
				<ul>
					<li class="active"><a href="index.php">Home</a></li>
					<li><a href="cadastro.php">Cadastrar Operadores</a></li>
					<li><a href="lancamento.php">Lançamentos</a></li>
					<div><li><a href="login.php">Admnistrativa</a></li></div>
					<div class="sobre"><li><a href="login2.php">Logout</a></li></div>
				</ul>
				<div class="clear"></div>
	</div><!--menu-->

	<div style="background: white;margin: 10px auto;border: 5px solid green;width: 500px;height: auto;display: inline-block;margin-left: 8%">
		<form method="post">
			<h2 style="text-align: center;font-size: 25px; font-weight: normal; color: red;">Retirada de sacolas por operador:</h2>
		<label style="margin-top: 20px;font-size: 20px;display: block;text-align: center;">Insira a Data de Hoje</label>
		<input class ="data_input"; style="width: 90%;height: 40px;margin: 20px 5%;display: block;font-size: 15px;" type="date" name="data" required>
		<p style="color: red;font-size: 13px;margin-left: 5%;">*A data deve conter no seguinte padrão: dd/mm/aaaa.</p>
		<label style="margin-top: 20px;font-size: 20px;display:block;text-align: center;">Operador</label>
		<input style="width: 90%;height: 40px;margin: 20px 5%;display:block;font-size: 15px; " type="number" name="operador" required>
		<p style="color: red;font-size: 13px;margin-left: 5%;">*O operador do colaborador são os 4 últimos números de sua matrícula.</p>
		<label style="margin-top: 20px;font-size: 20px;display:block;text-align: center;">Retirada</label>
		<input style="width: 90%;height: 40px;margin: 20px 5%;display:block;font-size: 15px;" type="number" name="retirada" required>
		<label style="margin-top: 20px;font-size: 20px;display:block;text-align: center;">Nome</label>
		<input style="width: 90%;height: 40px;margin: 20px 5%;display:block;font-size: 15px;" type="text" name="nome" required>
		<input style="width: 90%;height: 40px;margin: 20px 5%;display:block;text-align: center;font-size: 15px;cursor: pointer;" type="submit" name="retirar" value="Lançar">
	</form>
	</div>
	<div style="background: white;margin: 10px auto;border: 5px solid green;width: 500px;height: auto;display: inline-block; margin-left: 10%;">
		<form method="post">
			<h2 style="text-align: center;font-size: 25px; font-weight: normal; color: red;">Devolução de sacolas por operador:</h2>
		<label style="margin-top: 20px;font-size: 20px;display: block;text-align: center;">Insira a Data de Hoje</label>
		<input class ="data_input"; style="width: 90%;height: 40px;margin: 20px 5%;display: block;font-size: 15px;" type="date" name="data" required>
		<p style="color: red;font-size: 13px;margin-left: 5%;">*A data deve conter no seguinte padrão: dd/mm/aaaa.</p>
		<label style="margin-top: 20px;font-size: 20px;display:block;text-align: center;">Operador</label>
		<input style="width: 90%;height: 40px;margin: 20px 5%;display:block;font-size: 15px; " type="number" name="operador" required>
		<p style="color: red;font-size: 13px;margin-left: 5%;">*O operador do colaborador são os 4 últimos números de sua matrícula.</p>
		<label style="margin-top: 20px;font-size: 20px;display:block;text-align: center;">Devolução</label>
		<input style="width: 90%;height: 40px;margin: 20px 5%;display: block;font-size: 15px;" type="number" name="devolvida" required>
		<label style="margin-top: 20px;font-size: 20px;display:block;text-align: center;">Nome</label>
		<input style="width: 90%;height: 40px;margin: 20px 5%;display:block;font-size: 15px;" type="text" name="nome" required>
		<input style="width: 90%;height: 40px;margin: 20px 5%;display:block;text-align: center;font-size: 15px;cursor: pointer;" type="submit" name="devolver" value="Lançar">
	</form>
	</div>	

	<?php endif; ?>










	<?php if ($adm == 3): ?>
	<div class="menu">
				<ul>
					<li class="active"><a href="index.php">Home</a></li>
					<li><a href="cadastro.php">Cadastrar Operadores</a></li>
					<li><a href="lancamento.php">Lançamentos</a></li>
					<div class="sobre"><li><a href="login2.php">Logout</a></li></div>
				</ul>
				<div class="clear"></div>
	</div><!--menu-->

	<div style="background: white;margin: 10px auto;border: 5px solid green;width: 500px;height: auto;display: inline-block;margin-left: 8%">
		<form method="post">
			<h2 style="text-align: center;font-size: 25px; font-weight: normal; color: red;">Retirada de sacolas por operador:</h2>
		<label style="margin-top: 20px;font-size: 20px;display: block;text-align: center;">Insira a Data de Hoje</label>
		<input class ="data_input"; style="width: 90%;height: 40px;margin: 20px 5%;display: block;font-size: 15px;" type="date" name="data" required>
		<p style="color: red;font-size: 13px;margin-left: 5%;">*A data deve conter no seguinte padrão: dd/mm/aaaa.</p>
		<label style="margin-top: 20px;font-size: 20px;display:block;text-align: center;">Operador</label>
		<input style="width: 90%;height: 40px;margin: 20px 5%;display:block;font-size: 15px; " type="number" name="operador" required>
		<p style="color: red;font-size: 13px;margin-left: 5%;">*O operador do colaborador são os 4 últimos números de sua matrícula.</p>
		<label style="margin-top: 20px;font-size: 20px;display:block;text-align: center;">Retirada</label>
		<input style="width: 90%;height: 40px;margin: 20px 5%;display:block;font-size: 15px;" type="number" name="retirada" required>
		<label style="margin-top: 20px;font-size: 20px;display:block;text-align: center;">Nome</label>
		<input style="width: 90%;height: 40px;margin: 20px 5%;display:block;font-size: 15px;" type="text" name="nome" required>
		<input style="width: 90%;height: 40px;margin: 20px 5%;display:block;text-align: center;font-size: 15px;cursor: pointer;" type="submit" name="retirar" value="Lançar">
	</form>
	</div>
	<div style="background: white;margin: 10px auto;border: 5px solid green;width: 500px;height: auto;display: inline-block; margin-left: 10%;">
		<form method="post">
			<h2 style="text-align: center;font-size: 25px; font-weight: normal; color: red;">Devolução de sacolas por operador:</h2>
		<label style="margin-top: 20px;font-size: 20px;display: block;text-align: center;">Insira a Data de Hoje</label>
		<input class ="data_input"; style="width: 90%;height: 40px;margin: 20px 5%;display: block;font-size: 15px;" type="date" name="data" required>
		<p style="color: red;font-size: 13px;margin-left: 5%;">*A data deve conter no seguinte padrão: dd/mm/aaaa.</p>
		<label style="margin-top: 20px;font-size: 20px;display:block;text-align: center;">Operador</label>
		<input style="width: 90%;height: 40px;margin: 20px 5%;display:block;font-size: 15px; " type="number" name="operador" required>
		<p style="color: red;font-size: 13px;margin-left: 5%;">*O operador do colaborador são os 4 últimos números de sua matrícula.</p>
		<label style="margin-top: 20px;font-size: 20px;display:block;text-align: center;">Devolução</label>
		<input style="width: 90%;height: 40px;margin: 20px 5%;display: block;font-size: 15px;" type="number" name="devolvida" required>
		<label style="margin-top: 20px;font-size: 20px;display:block;text-align: center;">Nome</label>
		<input style="width: 90%;height: 40px;margin: 20px 5%;display:block;font-size: 15px;" type="text" name="nome" required>
		<input style="width: 90%;height: 40px;margin: 20px 5%;display:block;text-align: center;font-size: 15px;cursor: pointer;" type="submit" name="devolver" value="Lançar">
	</form>
	</div>	

	<?php endif; ?>


	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
	<script type='text/javascript'>

			$(document).ready(function(){
				$("input[name='operador']").blur(function(){
					var $nome = $("input[name='nome']");
					$.getJSON('function.php',{ 
						Operador: $( this ).val() 
					},function( json ){
						$nome.val( json.nome );
					});
					
				});
				
			});

			Date.prototype.toDateInputValue = (function() {
			    var local = new Date(this);
			    local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
			    return local.toJSON().slice(0,10);
			});
			$(document).ready( function() {
			    $('.data_input').val(new Date().toDateInputValue());
			});
	</script>
</body>

</html>
<?php
include  'footer.php'; 
 ?>