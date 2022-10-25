<?php 
include 'conexao.php'; 
	//retirada
			if(isset($_POST['retirar'])){
				$data_mes = date('m');
				if ($data_mes == 11) {
					$sql = "CREATE TABLE IF NOT EXISTS sacolas_novembro( id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, operador INT(6) NOT NULL, nome VARCHAR(255) NOT NULL, retirada INT NOT NULL, devolvidas INT NOT NULL, data DATE NOT NULL, created DATETIME NOT NULL)";
					$conn2->exec($sql);
			if(!$sql === false){
				$Operador = $_POST['operador'];
				$Nome = $_POST['nome'];
				$Retirada = $_POST['retirada'];
				$Data = $_POST['data'];
				$Devolvidas = "";
					try{
						$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						$sql = "INSERT INTO sacolas_novembro(id, operador, nome, retirada, devolvidas, data, created) VALUES(null, '$Operador', '$Nome', '$Retirada', '$Devolvidas', '$Data', NOW())";
						$conn2->exec($sql);
					}catch(PDOException $e) {
				 	 	echo $sql . "<br>" . $e->getMessage();
					}	
			}		
			}
				}
			//devolução
			if(isset($_POST['devolver'])){
				$data_mes = date('m');
				if ($data_mes == 11){
						$sql = "CREATE TABLE IF NOT EXISTS sacolas_novembro( id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, operador INT(6) NOT NULL, nome VARCHAR(255) NOT NULL, retirada INT NOT NULL, devolvidas INT NOT NULL, data DATE NOT NULL, created DATETIME NOT NULL)";
					$conn2->exec($sql);
			if(!$sql === false){
				$Operador = $_POST['operador'];
				$Devolvidas = $_POST['devolvida'];
				
					try{
						$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						$sql = "UPDATE sacolas_novembro SET devolvidas = '$Devolvidas' WHERE operador = '$Operador'";
						$conn2->exec($sql);
					}catch(PDOException $e) {
				 	 	echo $sql . "<br>" . $e->getMessage();
					}	
			}		
			}
					}
?>
	

	<div style="background: white;margin: 10px auto;border: 5px solid green;width: 500px;height: auto;display: inline-block;margin-left: 8%">
		<form method="post">
			<h2 style="text-align: center;font-size: 25px; font-weight: normal; color: red;">Retirada de sacolas por operador:</h2>
		<label style="margin-top: 20px;font-size: 20px;display: block;text-align: center;">Insira a Data de Hoje</label>
		<input style="width: 90%;height: 40px;margin: 20px 5%;display: block;font-size: 15px;" type="date" name="data" required >
		<p style="color: red;font-size: 13px;margin-left: 5%;">*A data deve conter no seguinte padrão: dd/mm/aaaa.</p>
		<label style="margin-top: 20px;font-size: 20px;display:block;text-align: center;">Operador</label>
		<input style="width: 90%;height: 40px;margin: 20px 5%;display:block;font-size: 15px; " type="number" name="operador" required>
		<p style="color: red;font-size: 13px;margin-left: 5%;">*O operador do colaborador são os 4 últimos números de sua matrícula.</p>
		<label style="margin-top: 20px;font-size: 20px;display:block;text-align: center;">Nome</label>
		<input style="width: 90%;height: 40px;margin: 20px 5%;display:block;font-size: 15px;" type="text" name="nome" required>
		<label style="margin-top: 20px;font-size: 20px;display:block;text-align: center;">Retirada</label>
		<input style="width: 90%;height: 40px;margin: 20px 5%;display:block;font-size: 15px;" type="number" name="retirada" required value="40">

		<input style="width: 90%;height: 40px;margin: 20px 5%;display:block;text-align: center;font-size: 15px;cursor: pointer;" type="submit" name="retirar" value="Lançar">
	</form>
	</div>
	<div style="background: white;margin: 10px auto;border: 5px solid green;width: 500px;height: auto;display: inline-block; margin-left: 10%;">
		<form method="post">
			<h2 style="text-align: center;font-size: 25px; font-weight: normal; color: red;">Devolução de sacolas por operador:</h2>
		<label style="margin-top: 20px;font-size: 20px;display: block;text-align: center;">Insira a Data de Hoje</label>
		<input style="width: 90%;height: 40px;margin: 20px 5%;display: block;font-size: 15px;" type="date" name="data" required>
		<p style="color: red;font-size: 13px;margin-left: 5%;">*A data deve conter no seguinte padrão: dd/mm/aaaa.</p>
		<label style="margin-top: 20px;font-size: 20px;display:block;text-align: center;">Operador</label>
		<input style="width: 90%;height: 40px;margin: 20px 5%;display:block;font-size: 15px; " type="number" name="operador" required>
		<p style="color: red;font-size: 13px;margin-left: 5%;">*O operador do colaborador são os 4 últimos números de sua matrícula.</p>
		<label style="margin-top: 20px;font-size: 20px;display:block;text-align: center;">Nome</label>
		<input style="width: 90%;height: 40px;margin: 20px 5%;display:block;font-size: 15px;" type="text" name="nome" required>
		<label style="margin-top: 20px;font-size: 20px;display:block;text-align: center;">Devolução</label>
		<input style="width: 90%;height: 40px;margin: 20px 5%;display: block;font-size: 15px;" type="number" name="devolvida" required>
		<input style="width: 90%;height: 40px;margin: 20px 5%;display:block;text-align: center;font-size: 15px;cursor: pointer;" type="submit" name="devolver" value="Lançar">
	</form>
	</div>	
