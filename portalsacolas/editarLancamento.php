<?php 
include 'conexao.php';
	
	if (isset($_POST['excluirLancamento'])) {
		$data_mes = date('m');
		$id = $_POST['valorId'];
		if ($data_mes == 1){
			if (isset($id)) {
				$listagem = $conn->prepare("SELECT id FROM sacolas_janeiro WHERE id = '$id'");
				$listagem->execute();
				$row = $listagem->fetch();
				$operador = $row['id'];
				try{
					$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$sql = "DELETE FROM sacolas_janeiro WHERE id = '$id'";
					$conn->exec($sql);

					echo "<script>alert('Lançamento excluído com sucesso!')</script>";
					echo "<script>window.location = 'lancamento.php'</script>";
				}catch(PDOException $e) {
					echo $sql . "<br>" . $e->getMessage();
				}
			}else{
				echo "<script>alert('Selecione o lançamento que deseja excluir!')</script>";
				echo "<script>window.location = 'lancamento.php'</script>";
			}
		}				
	}

	if (isset($_POST['excluirLancamento'])) {
		$data_mes = date('m');
		$id = $_POST['valorId'];
		if ($data_mes == 2){
			if (isset($id)) {
				$listagem = $conn->prepare("SELECT id FROM sacolas_fevereiro WHERE id = '$id'");
				$listagem->execute();
				$row = $listagem->fetch();
				$operador = $row['id'];
				try{
					$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$sql = "DELETE FROM sacolas_fevereiro WHERE id = '$id'";
					$conn->exec($sql);

					echo "<script>alert('Lançamento excluído com sucesso!')</script>";
					echo "<script>window.location = 'lancamento.php'</script>";
				}catch(PDOException $e) {
					echo $sql . "<br>" . $e->getMessage();
				}
			}else{
				echo "<script>alert('Selecione o lançamento que deseja excluir!')</script>";
				echo "<script>window.location = 'lancamento.php'</script>";
			}
		}				
	}

	if (isset($_POST['excluirLancamento'])) {
		$data_mes = date('m');
		$id = $_POST['valorId'];
		if ($data_mes == 3){
			if (isset($id)) {
				$listagem = $conn->prepare("SELECT id FROM sacolas_marco WHERE id = '$id'");
				$listagem->execute();
				$row = $listagem->fetch();
				$operador = $row['id'];
				try{
					$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$sql = "DELETE FROM sacolas_marco WHERE id = '$id'";
					$conn->exec($sql);

					echo "<script>alert('Lançamento excluído com sucesso!')</script>";
					echo "<script>window.location = 'lancamento.php'</script>";
				}catch(PDOException $e) {
					echo $sql . "<br>" . $e->getMessage();
				}
			}else{
				echo "<script>alert('Selecione o lançamento que deseja excluir!')</script>";
				echo "<script>window.location = 'lancamento.php'</script>";
			}
		}				
	}

	if (isset($_POST['excluirLancamento'])) {
		$data_mes = date('m');
		$id = $_POST['valorId'];
		if ($data_mes == 4){
			if (isset($id)) {
				$listagem = $conn->prepare("SELECT id FROM sacolas_abril WHERE id = '$id'");
				$listagem->execute();
				$row = $listagem->fetch();
				$operador = $row['id'];
				try{
					$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$sql = "DELETE FROM sacolas_abril WHERE id = '$id'";
					$conn->exec($sql);

					echo "<script>alert('Lançamento excluído com sucesso!')</script>";
					echo "<script>window.location = 'lancamento.php'</script>";
				}catch(PDOException $e) {
					echo $sql . "<br>" . $e->getMessage();
				}
			}else{
				echo "<script>alert('Selecione o lançamento que deseja excluir!')</script>";
				echo "<script>window.location = 'lancamento.php'</script>";
			}
		}				
	}

	if (isset($_POST['excluirLancamento'])) {
		$data_mes = date('m');
		$id = $_POST['valorId'];
		if ($data_mes == 5){
			if (isset($id)) {
				$listagem = $conn->prepare("SELECT id FROM sacolas_maio WHERE id = '$id'");
				$listagem->execute();
				$row = $listagem->fetch();
				$operador = $row['id'];
				try{
					$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$sql = "DELETE FROM sacolas_maio WHERE id = '$id'";
					$conn->exec($sql);

					echo "<script>alert('Lançamento excluído com sucesso!')</script>";
					echo "<script>window.location = 'lancamento.php'</script>";
				}catch(PDOException $e) {
					echo $sql . "<br>" . $e->getMessage();
				}
			}else{
				echo "<script>alert('Selecione o lançamento que deseja excluir!')</script>";
				echo "<script>window.location = 'lancamento.php'</script>";
			}
		}				
	}

	if (isset($_POST['excluirLancamento'])) {
		$data_mes = date('m');
		$id = $_POST['valorId'];
		if ($data_mes == 6){
			if (isset($id)) {
				$listagem = $conn->prepare("SELECT id FROM sacolas_junho WHERE id = '$id'");
				$listagem->execute();
				$row = $listagem->fetch();
				$operador = $row['id'];
				try{
					$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$sql = "DELETE FROM sacolas_junho WHERE id = '$id'";
					$conn->exec($sql);

					echo "<script>alert('Lançamento excluído com sucesso!')</script>";
					echo "<script>window.location = 'lancamento.php'</script>";
				}catch(PDOException $e) {
					echo $sql . "<br>" . $e->getMessage();
				}
			}else{
				echo "<script>alert('Selecione o lançamento que deseja excluir!')</script>";
				echo "<script>window.location = 'lancamento.php'</script>";
			}
		}				
	}

	if (isset($_POST['excluirLancamento'])) {
		$data_mes = date('m');
		$id = $_POST['valorId'];
		if ($data_mes == 7){
			if (isset($id)) {
				$listagem = $conn->prepare("SELECT id FROM sacolas_julho WHERE id = '$id'");
				$listagem->execute();
				$row = $listagem->fetch();
				$operador = $row['id'];
				try{
					$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$sql = "DELETE FROM sacolas_julho WHERE id = '$id'";
					$conn->exec($sql);

					echo "<script>alert('Lançamento excluído com sucesso!')</script>";
					echo "<script>window.location = 'lancamento.php'</script>";
				}catch(PDOException $e) {
					echo $sql . "<br>" . $e->getMessage();
				}
			}else{
				echo "<script>alert('Selecione o lançamento que deseja excluir!')</script>";
				echo "<script>window.location = 'lancamento.php'</script>";
			}
		}				
	}

	if (isset($_POST['excluirLancamento'])) {
		$data_mes = date('m');
		$id = $_POST['valorId'];
		if ($data_mes == 8){
			if (isset($id)) {
				$listagem = $conn->prepare("SELECT id FROM sacolas_agosto WHERE id = '$id'");
				$listagem->execute();
				$row = $listagem->fetch();
				$operador = $row['id'];
				try{
					$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$sql = "DELETE FROM sacolas_agosto WHERE id = '$id'";
					$conn->exec($sql);

					echo "<script>alert('Lançamento excluído com sucesso!')</script>";
					echo "<script>window.location = 'lancamento.php'</script>";
				}catch(PDOException $e) {
					echo $sql . "<br>" . $e->getMessage();
				}
			}else{
				echo "<script>alert('Selecione o lançamento que deseja excluir!')</script>";
				echo "<script>window.location = 'lancamento.php'</script>";
			}
		}				
	}

	if (isset($_POST['excluirLancamento'])) {
		$data_mes = date('m');
		$id = $_POST['valorId'];
		if ($data_mes == 9){
			if (isset($id)) {
				$listagem = $conn->prepare("SELECT id FROM sacolas_setembro WHERE id = '$id'");
				$listagem->execute();
				$row = $listagem->fetch();
				$operador = $row['id'];
				try{
					$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$sql = "DELETE FROM sacolas_setembro WHERE id = '$id'";
					$conn->exec($sql);

					echo "<script>alert('Lançamento excluído com sucesso!')</script>";
					echo "<script>window.location = 'lancamento.php'</script>";
				}catch(PDOException $e) {
					echo $sql . "<br>" . $e->getMessage();
				}
			}else{
				echo "<script>alert('Selecione o lançamento que deseja excluir!')</script>";
				echo "<script>window.location = 'lancamento.php'</script>";
			}
		}				
	}

	if (isset($_POST['excluirLancamento'])) {
		$data_mes = date('m');
		$id = $_POST['valorId'];
		if ($data_mes == 10){
			if (isset($id)) {
				$listagem = $conn->prepare("SELECT id FROM sacolas_outubro WHERE id = '$id'");
				$listagem->execute();
				$row = $listagem->fetch();
				$operador = $row['id'];
				try{
					$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$sql = "DELETE FROM sacolas_outubro WHERE id = '$id'";
					$conn->exec($sql);

					echo "<script>alert('Lançamento excluído com sucesso!')</script>";
					echo "<script>window.location = 'lancamento.php'</script>";
				}catch(PDOException $e) {
					echo $sql . "<br>" . $e->getMessage();
				}
			}else{
				echo "<script>alert('Selecione o lançamento que deseja excluir!')</script>";
				echo "<script>window.location = 'lancamento.php'</script>";
			}
		}				
	}

	if (isset($_POST['excluirLancamento'])) {
		$data_mes = date('m');
		$id = $_POST['valorId'];
		if ($data_mes == 11){
			if (isset($id)) {
				$listagem = $conn->prepare("SELECT id FROM sacolas_novembro WHERE id = '$id'");
				$listagem->execute();
				$row = $listagem->fetch();
				$operador = $row['id'];
				try{
					$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$sql = "DELETE FROM sacolas_novembro WHERE id = '$id'";
					$conn->exec($sql);

					echo "<script>alert('Lançamento excluído com sucesso!')</script>";
					echo "<script>window.location = 'lancamento.php'</script>";
				}catch(PDOException $e) {
					echo $sql . "<br>" . $e->getMessage();
				}
			}else{
				echo "<script>alert('Selecione o lançamento que deseja excluir!')</script>";
				echo "<script>window.location = 'lancamento.php'</script>";
			}
		}				
	}

	if (isset($_POST['excluirLancamento'])) {
		$data_mes = date('m');
		$id = $_POST['valorId'];
		if ($data_mes == 12){
			if (isset($id)) {
				$listagem = $conn->prepare("SELECT id FROM sacolas_dezembro WHERE id = '$id'");
				$listagem->execute();
				$row = $listagem->fetch();
				$operador = $row['id'];
				try{
					$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$sql = "DELETE FROM sacolas_dezembro WHERE id = '$id'";
					$conn->exec($sql);

					echo "<script>alert('Lançamento excluído com sucesso!')</script>";
					echo "<script>window.location = 'lancamento.php'</script>";
				}catch(PDOException $e) {
					echo $sql . "<br>" . $e->getMessage();
				}
			}else{
				echo "<script>alert('Selecione o lançamento que deseja excluir!')</script>";
				echo "<script>window.location = 'lancamento.php'</script>";
			}
		}				
	}		
?>