<?php 
include 'conexao.php';
	if (isset($_POST['editar'])) {
		$valorOperador = $_POST['valorOperador'];
		if (isset($valorOperador)) {
			$listagem = $conn->prepare("SELECT operador FROM cadastro_op WHERE operador = '$valorOperador'");
			$listagem->execute();
			$row = $listagem->fetch();
			$operador = $row['operador'];
			try{
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "DELETE FROM cadastro_op WHERE operador = '$operador'";
				$conn->exec($sql);

				echo "<script>alert('Operador excluído com sucesso!')</script>";
				echo "<script>window.location = 'cadastrados.php'</script>";
			}catch(PDOException $e) {
				echo $sql . "<br>" . $e->getMessage();
			}
		}else{
			echo "<script>alert('Selecione o operador que deseja excluir!')</script>";
			echo "<script>window.location = 'cadastrados.php'</script>";
		}
						
	}	
?>