<?php  
	session_start();
	if (isset($_SESSION["usuario"])) {
		$adm = $_SESSION["usuario"][1];
		$nome = $_SESSION["usuario"][0];
	}else{
		echo "<script>window.location = 'login.php'</script>";
	}
	date_default_timezone_set('America/sao_paulo');
	include 'header.php';
	include 'conexao.php';
?>
<!DOCTYPE html>
<html>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	
	<?php if ($adm): ?>
	<div class="menu">
				<ul>
				<li class="scroll"><a href="#lancamentos">Lançamentos</a></li>
					<li class="scroll"><a href="#usuarios">Usuários</a></li>
					<li class="scroll"><a href="#sacolas_vendidas">Vendas</a></li>
					<li class="scroll"><a href="#relatorios">Relatórios</a></li>
					<div class="sobre2"><li><a href="logout.php">Logout</a></li></div>
				</ul>
				<div class="clear"></div>
	</div><!--menu-->
	<section class="box">

		<div style=" background: #EE7410; width: 80%;height: 210px;margin-left: 10.2%;margin-top: 10px;border: 2px solid black;display: block;border-radius: 50px;" class="caixa" id="total_venda">
			<p> 
				<?php
				echo "Total de Sacolas Lançadas em: "; 
				if (isset($_POST['procurar2'])) {
					$data = $_POST['data'];
					echo $data;
				}
				 ?>
			</p>
			<p  style="font-size: 23px; text-align: center;" id="quantidade2">
			<?php
				if (isset($_POST['procurar2'])) {
					$data_mes = date('m');
					if ($data_mes == 1) {
						$data = $_POST['data'];
				$listagem = $conn2->prepare("SELECT SUM(total) as soma_total FROM sacolas_janeiro WHERE data = '$data'");
				$listagem->execute();
					$row = $listagem->fetch(); 
					echo "$row[soma_total]". " Sacolas";
					echo "  / ";
					echo ($row['soma_total'] / 250) . " Fardos";
					}
				
				}
			 ?>

			 <?php
				if (isset($_POST['procurar2'])) {
					$data_mes = date('m');
					if ($data_mes == 2) {
						$data = $_POST['data'];
				$listagem = $conn2->prepare("SELECT SUM(total) as soma_total FROM sacolas_fevereiro WHERE data = '$data'");
				$listagem->execute();
					$row = $listagem->fetch(); 
					echo "$row[soma_total]". " Sacolas";
					echo "  / ";
					echo ($row['soma_total'] / 250) . " Fardos";
					}
				
				}
			 ?>

			 <?php
				if (isset($_POST['procurar2'])) {
					$data_mes = date('m');
					if ($data_mes == 3) {
						$data = $_POST['data'];
				$listagem = $conn2->prepare("SELECT SUM(total) as soma_total FROM sacolas_marco WHERE data = '$data'");
				$listagem->execute();
					$row = $listagem->fetch(); 
					echo "$row[soma_total]". " Sacolas";
					echo "  / ";
					echo ($row['soma_total'] / 250) . " Fardos";
					}
				
				}
			 ?>

			 <?php
				if (isset($_POST['procurar2'])) {
					$data_mes = date('m');
					if ($data_mes == 4) {
						$data = $_POST['data'];
				$listagem = $conn2->prepare("SELECT SUM(total) as soma_total FROM sacolas_abril WHERE data = '$data'");
				$listagem->execute();
					$row = $listagem->fetch(); 
					echo "$row[soma_total]". " Sacolas";
					echo "  / ";
					echo ($row['soma_total'] / 250) . " Fardos";
					}
				
				}
			 ?>

			 <?php
				if (isset($_POST['procurar2'])) {
					$data_mes = date('m');
					if ($data_mes == 5) {
						$data = $_POST['data'];
				$listagem = $conn2->prepare("SELECT SUM(total) as soma_total FROM sacolas_maio WHERE data = '$data'");
				$listagem->execute();
					$row = $listagem->fetch(); 
					echo "$row[soma_total]". " Sacolas";
					echo "  / ";
					echo ($row['soma_total'] / 250) . " Fardos";
					}
				
				}
			 ?>

			 <?php
				if (isset($_POST['procurar2'])) {
					$data_mes = date('m');
					if ($data_mes == 6) {
						$data = $_POST['data'];
				$listagem = $conn2->prepare("SELECT SUM(total) as soma_total FROM sacolas_junho WHERE data = '$data'");
				$listagem->execute();
					$row = $listagem->fetch(); 
					echo "$row[soma_total]". " Sacolas";
					echo "  / ";
					echo ($row['soma_total'] / 250) . " Fardos";
					}
				
				}
			 ?>

			 <?php
				if (isset($_POST['procurar2'])) {
					$data_mes = date('m');
					if ($data_mes == 7) {
						$data = $_POST['data'];
				$listagem = $conn2->prepare("SELECT SUM(total) as soma_total FROM sacolas_julho WHERE data = '$data'");
				$listagem->execute();
					$row = $listagem->fetch(); 
					echo "$row[soma_total]". " Sacolas";
					echo "  / ";
					echo ($row['soma_total'] / 250) . " Fardos";
					}
				
				}
			 ?>

			 <?php
				if (isset($_POST['procurar2'])) {
					$data_mes = date('m');
					if ($data_mes == 8) {
						$data = $_POST['data'];
				$listagem = $conn2->prepare("SELECT SUM(total) as soma_total FROM sacolas_agosto WHERE data = '$data'");
				$listagem->execute();
					$row = $listagem->fetch(); 
					echo "$row[soma_total]". " Sacolas";
					echo "  / ";
					echo ($row['soma_total'] / 250) . " Fardos";
					}
				
				}
			 ?>

			 <?php
				if (isset($_POST['procurar2'])) {
					$data_mes = date('m');
					if ($data_mes == 9) {
						$data = $_POST['data'];
				$listagem = $conn2->prepare("SELECT SUM(total) as soma_total FROM sacolas_setembro WHERE data = '$data'");
				$listagem->execute();
					$row = $listagem->fetch(); 
					echo "$row[soma_total]". " Sacolas";
					echo "  / ";
					echo ($row['soma_total'] / 250) . " Fardos";
					}
				
				}
			 ?>

			 <?php
				if (isset($_POST['procurar2'])) {
					$data_mes = date('m');
					if ($data_mes == 10) {
						$data = $_POST['data'];
				$listagem = $conn2->prepare("SELECT SUM(total) as soma_total FROM sacolas_outubro WHERE data = '$data'");
				$listagem->execute();
					$row = $listagem->fetch(); 
					echo "$row[soma_total]". " Sacolas";
					echo "  / ";
					echo ($row['soma_total'] / 250) . " Fardos";
					}
				
				}
			 ?>

			 <?php
				if (isset($_POST['procurar2'])) {
					$data_mes = date('m');
					if ($data_mes == 11) {
						$data = $_POST['data'];
				$listagem = $conn2->prepare("SELECT SUM(total) as soma_total FROM sacolas_novembro WHERE data = '$data'");
				$listagem->execute();
					$row = $listagem->fetch(); 
					echo "$row[soma_total]". " Sacolas";
					echo "  / ";
					echo ($row['soma_total'] / 250) . " Fardos";
					}
				
				}
			 ?>

			 <?php
				if (isset($_POST['procurar2'])) {
					$data_mes = date('m');
					if ($data_mes == 12) {
						$data = $_POST['data'];
				$listagem = $conn2->prepare("SELECT SUM(total) as soma_total FROM sacolas_dezembro WHERE data = '$data'");
				$listagem->execute();
					$row = $listagem->fetch(); 
					echo "$row[soma_total]". " Sacolas";
					echo "  / ";
					echo ($row['soma_total'] / 250) . " Fardos";
					}
				
				}
			 ?>
			 <form method="post">
					<input class ="data_input"; style="width: 40%;height: 30px;margin: 10px 12%;display: inline-block;font-size: 15px;" type="date" name="data">
					<input style="width: 20%;height: 30px;margin: 10px 0%;cursor:pointer;display: inline-block;font-size: 15px;" type="submit" name="procurar2" value="Procurar">
				</form>
			</p>
</div><!--caixa-->
	</section><!--box-->


	

	<section id="lancamentos" class="box-info">
		<div id="info11" class="info">
			<p>Lançamentos (detalhado) por Data</p>
			<img src="images/seta.png">
		</div><!--info-->
		<div class="conteudo11">
			<form method="post">
			<input class ="data_input"; style="width: 50%;height: 40px;margin: 10px 9%;display: inline-block;font-size: 15px;" type="date" name="data">
			<input style="width: 20%;height: 40px;margin: 10px 4%;display: inline-block;font-size: 15px;" type="submit" name="procurar_operacao" value="Procurar">
		</form>
		<table>
			<?php
				if (isset($_POST['procurar_operacao'])) {
						$data_mes = date('m');
						if ($data_mes == 1){
							$data = $_POST['data'];
							$listagem = $conn2->prepare("SELECT * FROM sacolas_cpd_janeiro WHERE data = '$data' ORDER BY total ASC");
							$listagem->execute();
							while($lista = $listagem->fetch(PDO::FETCH_ASSOC)):
			?>
				<tr>
			    <th>Operador</th>
			    <th>Nome</th>
			    <th>Retirada</th>
			    <th>Devolvida</th>
			    <th>Total</th>
			    <th>Último Lançamento</th>
			    <th>Hora</th>
			  </tr>
			  <tr>
			    <td><?php echo $lista["operador"];?></td>
			    <td><?php echo $lista["nome"];?></td>
			    <td><?php echo $lista["retirada"];?></td>
			    <td><?php echo $lista["devolvidas"];?></td>
			    <td><?php echo $lista["total"];?></td>
			    <td><?php echo $lista["nome_lancado"];?></td>
			    <td><?php echo $lista["created"];?></td>
			  </tr>
			  	<?php
				endwhile; 
					}
				}
				?>

				<?php
				if (isset($_POST['procurar_operacao'])) {
						$data_mes = date('m');
						if ($data_mes == 2){
							$data = $_POST['data'];
							$listagem = $conn2->prepare("SELECT * FROM sacolas_cpd_fevereiro WHERE data = '$data' ORDER BY total ASC");
							$listagem->execute();
							while($lista = $listagem->fetch(PDO::FETCH_ASSOC)):
			?>
				<tr>
			    <th>Operador</th>
			    <th>Nome</th>
			    <th>Retirada</th>
			    <th>Devolvida</th>
			    <th>Total</th>
			    <th>Último Lançamento</th>
			    <th>Hora</th>
			  </tr>
			  <tr>
			    <td><?php echo $lista["operador"];?></td>
			    <td><?php echo $lista["nome"];?></td>
			    <td><?php echo $lista["retirada"];?></td>
			    <td><?php echo $lista["devolvidas"];?></td>
			    <td><?php echo $lista["total"];?></td>
			    <td><?php echo $lista["nome_lancado"];?></td>
			    <td><?php echo $lista["created"];?></td>
			  </tr>
			  	<?php
				endwhile; 
					}
				}
				?>

				<?php
				if (isset($_POST['procurar_operacao'])) {
						$data_mes = date('m');
						if ($data_mes == 3){
							$data = $_POST['data'];
							$listagem = $conn2->prepare("SELECT * FROM sacolas_cpd_marco WHERE data = '$data' ORDER BY operador ASC");
							$listagem->execute();
							while($lista = $listagem->fetch(PDO::FETCH_ASSOC)):
			?>
				<tr>
			    <th>Operador</th>
			    <th>Nome</th>
			    <th>Retirada</th>
			    <th>Devolvida</th>
			    <th>Total</th>
			    <th>Último Lançamento</th>
			    <th>Hora</th>
			  </tr>
			  <tr>
			    <td><?php echo $lista["operador"];?></td>
			    <td><?php echo $lista["nome"];?></td>
			    <td><?php echo $lista["retirada"];?></td>
			    <td><?php echo $lista["devolvidas"];?></td>
			    <td><?php echo $lista["total"];?></td>
			    <td><?php echo $lista["nome_lancado"];?></td>
			    <td><?php echo $lista["created"];?></td>
			  </tr>
			  	<?php
				endwhile; 
					}
				}
				?>

				<?php
				if (isset($_POST['procurar_operacao'])) {
						$data_mes = date('m');
						if ($data_mes == 4){
							$data = $_POST['data'];
							$listagem = $conn2->prepare("SELECT * FROM sacolas_cpd_abril WHERE data = '$data' ORDER BY total ASC");
							$listagem->execute();
							while($lista = $listagem->fetch(PDO::FETCH_ASSOC)):
			?>
				<tr>
			    <th>Operador</th>
			    <th>Nome</th>
			    <th>Retirada</th>
			    <th>Devolvida</th>
			    <th>Total</th>
			    <th>Último Lançamento</th>
			    <th>Hora</th>
			  </tr>
			  <tr>
			    <td><?php echo $lista["operador"];?></td>
			    <td><?php echo $lista["nome"];?></td>
			    <td><?php echo $lista["retirada"];?></td>
			    <td><?php echo $lista["devolvidas"];?></td>
			    <td><?php echo $lista["total"];?></td>
			    <td><?php echo $lista["nome_lancado"];?></td>
			    <td><?php echo $lista["created"];?></td>
			  </tr>
			  	<?php
				endwhile; 
					}
				}
				?>

				<?php
				if (isset($_POST['procurar_operacao'])) {
						$data_mes = date('m');
						if ($data_mes == 5){
							$data = $_POST['data'];
							$listagem = $conn2->prepare("SELECT * FROM sacolas_cpd_maio WHERE data = '$data' ORDER BY total ASC");
							$listagem->execute();
							while($lista = $listagem->fetch(PDO::FETCH_ASSOC)):
			?>
				<tr>
			    <th>Operador</th>
			    <th>Nome</th>
			    <th>Retirada</th>
			    <th>Devolvida</th>
			    <th>Total</th>
			    <th>Último Lançamento</th>
			    <th>Hora</th>
			  </tr>
			  <tr>
			    <td><?php echo $lista["operador"];?></td>
			    <td><?php echo $lista["nome"];?></td>
			    <td><?php echo $lista["retirada"];?></td>
			    <td><?php echo $lista["devolvidas"];?></td>
			    <td><?php echo $lista["total"];?></td>
			    <td><?php echo $lista["nome_lancado"];?></td>
			    <td><?php echo $lista["created"];?></td>
			  </tr>
			  	<?php
				endwhile; 
					}
				}
				?>

				<?php
				if (isset($_POST['procurar_operacao'])) {
						$data_mes = date('m');
						if ($data_mes == 6){
							$data = $_POST['data'];
							$listagem = $conn2->prepare("SELECT * FROM sacolas_cpd_junho WHERE data = '$data' ORDER BY total ASC");
							$listagem->execute();
							while($lista = $listagem->fetch(PDO::FETCH_ASSOC)):
			?>
				<tr>
			    <th>Operador</th>
			    <th>Nome</th>
			    <th>Retirada</th>
			    <th>Devolvida</th>
			    <th>Total</th>
			    <th>Último Lançamento</th>
			    <th>Hora</th>
			  </tr>
			  <tr>
			    <td><?php echo $lista["procurar_operacao"];?></td>
			    <td><?php echo $lista["nome"];?></td>
			    <td><?php echo $lista["retirada"];?></td>
			    <td><?php echo $lista["devolvidas"];?></td>
			    <td><?php echo $lista["total"];?></td>
			    <td><?php echo $lista["nome_lancado"];?></td>
			    <td><?php echo $lista["created"];?></td>
			  </tr>
			  	<?php
				endwhile; 
					}
				}
				?>

				<?php
				if (isset($_POST['procurar_operacao'])) {
						$data_mes = date('m');
						if ($data_mes == 7){
							$data = $_POST['data'];
							$listagem = $conn2->prepare("SELECT * FROM sacolas_cpd_julho WHERE data = '$data' ORDER BY total ASC");
							$listagem->execute();
							while($lista = $listagem->fetch(PDO::FETCH_ASSOC)):
			?>
				<tr>
			    <th>Operador</th>
			    <th>Nome</th>
			    <th>Retirada</th>
			    <th>Devolvida</th>
			    <th>Total</th>
			    <th>Último Lançamento</th>
			    <th>Hora</th>
			  </tr>
			  <tr>
			    <td><?php echo $lista["operador"];?></td>
			    <td><?php echo $lista["nome"];?></td>
			    <td><?php echo $lista["retirada"];?></td>
			    <td><?php echo $lista["devolvidas"];?></td>
			    <td><?php echo $lista["total"];?></td>
			    <td><?php echo $lista["nome_lancado"];?></td>
			    <td><?php echo $lista["created"];?></td>
			  </tr>
			  	<?php
				endwhile; 
					}
				}
				?>

				<?php
				if (isset($_POST['procurar_operacao'])) {
						$data_mes = date('m');
						if ($data_mes == 8){
							$data = $_POST['data'];
							$listagem = $conn2->prepare("SELECT * FROM sacolas_cpd_agosto WHERE data = '$data' ORDER BY total ASC");
							$listagem->execute();
							while($lista = $listagem->fetch(PDO::FETCH_ASSOC)):
			?>
				<tr>
			    <th>Operador</th>
			    <th>Nome</th>
			    <th>Retirada</th>
			    <th>Devolvida</th>
			    <th>Total</th>
			    <th>Último Lançamento</th>
			    <th>Hora</th>
			  </tr>
			  <tr>
			    <td><?php echo $lista["operador"];?></td>
			    <td><?php echo $lista["nome"];?></td>
			    <td><?php echo $lista["retirada"];?></td>
			    <td><?php echo $lista["devolvidas"];?></td>
			    <td><?php echo $lista["total"];?></td>
			    <td><?php echo $lista["nome_lancado"];?></td>
			    <td><?php echo $lista["created"];?></td>
			  </tr>
			  	<?php
				endwhile; 
					}
				}
				?>

				<?php
				if (isset($_POST['procurar_operacao'])) {
						$data_mes = date('m');
						if ($data_mes == 9){
							$data = $_POST['data'];
							$listagem = $conn2->prepare("SELECT * FROM sacolas_cpd_setembro WHERE data = '$data' ORDER BY total ASC");
							$listagem->execute();
							while($lista = $listagem->fetch(PDO::FETCH_ASSOC)):
			?>
				<tr>
			    <th>Operador</th>
			    <th>Nome</th>
			    <th>Retirada</th>
			    <th>Devolvida</th>
			    <th>Total</th>
			    <th>Último Lançamento</th>
			    <th>Hora</th>
			  </tr>
			  <tr>
			    <td><?php echo $lista["operador"];?></td>
			    <td><?php echo $lista["nome"];?></td>
			    <td><?php echo $lista["retirada"];?></td>
			    <td><?php echo $lista["devolvidas"];?></td>
			    <td><?php echo $lista["total"];?></td>
			    <td><?php echo $lista["nome_lancado"];?></td>
			    <td><?php echo $lista["created"];?></td>
			  </tr>
			  	<?php
				endwhile; 
					}
				}
				?>

				<?php
				if (isset($_POST['procurar_operacao'])) {
						$data_mes = date('m');
						if ($data_mes == 10){
							$data = $_POST['data'];
							$listagem = $conn2->prepare("SELECT * FROM sacolas_cpd_outubro WHERE data = '$data' ORDER BY total ASC");
							$listagem->execute();
							while($lista = $listagem->fetch(PDO::FETCH_ASSOC)):
			?>
				<tr>
			    <th>Operador</th>
			    <th>Nome</th>
			    <th>Retirada</th>
			    <th>Devolvida</th>
			    <th>Total</th>
			    <th>Último Lançamento</th>
			    <th>Hora</th>
			  </tr>
			  <tr>
			    <td><?php echo $lista["operador"];?></td>
			    <td><?php echo $lista["nome"];?></td>
			    <td><?php echo $lista["retirada"];?></td>
			    <td><?php echo $lista["devolvidas"];?></td>
			    <td><?php echo $lista["total"];?></td>
			    <td><?php echo $lista["nome_lancado"];?></td>
			    <td><?php echo $lista["created"];?></td>
			  </tr>
			  	<?php
				endwhile; 
					}
				}
				?>

				<?php
				if (isset($_POST['procurar_operacao'])) {
						$data_mes = date('m');
						if ($data_mes == 11){
							$data = $_POST['data'];
							$listagem = $conn2->prepare("SELECT * FROM sacolas_cpd_novembro WHERE data = '$data' ORDER BY total ASC");
							$listagem->execute();
							while($lista = $listagem->fetch(PDO::FETCH_ASSOC)):
			?>
				<tr>
			    <th>Operador</th>
			    <th>Nome</th>
			    <th>Retirada</th>
			    <th>Devolvida</th>
			    <th>Total</th>
			    <th>Último Lançamento</th>
			    <th>Hora</th>
			  </tr>
			  <tr>
			    <td><?php echo $lista["operador"];?></td>
			    <td><?php echo $lista["nome"];?></td>
			    <td><?php echo $lista["retirada"];?></td>
			    <td><?php echo $lista["devolvidas"];?></td>
			    <td><?php echo $lista["total"];?></td>
			    <td><?php echo $lista["nome_lancado"];?></td>
			    <td><?php echo $lista["created"];?></td>
			  </tr>
			  	<?php
				endwhile; 
					}
				}
				?>

			<?php
				if (isset($_POST['procurar_operacao'])) {
						$data_mes = date('m');
						if ($data_mes == 12){
							$data = $_POST['data'];
							$listagem = $conn2->prepare("SELECT * FROM sacolas_cpd_dezembro WHERE data = '$data' ORDER BY total ASC");
							$listagem->execute();
							while($lista = $listagem->fetch(PDO::FETCH_ASSOC)):
			?>
				<tr>
			    <th>Operador</th>
			    <th>Nome</th>
			    <th>Retirada</th>
			    <th>Devolvida</th>
			    <th>Total</th>
			    <th>Último Lançamento</th>
			    <th>Hora</th>
			  </tr>
			  <tr>
			    <td><?php echo $lista["operador"];?></td>
			    <td><?php echo $lista["nome"];?></td>
			    <td><?php echo $lista["retirada"];?></td>
			    <td><?php echo $lista["devolvidas"];?></td>
			    <td><?php echo $lista["total"];?></td>
			    <td><?php echo $lista["nome_lancado"];?></td>
			    <td><?php echo $lista["created"];?></td>
			  </tr>
			  	<?php
				endwhile; 
					}
				}
				?>
			  
			  
		</table>
		</div>
	</section><!--lancamentos-->
	<section id="usuarios" class="box-info">

		<div id="info12" class="info">
			<p>Cadastrar de Usuários</p>
			<img src="images/seta.png">
		</div><!--info-->

		<div class="conteudo12">
			<div class=" primeiro box-lancamento">
				<div class="msg">
				 	<?php
				 		if (isset($_POST['Cadastrar_usuario2'])){
				 			try {
				 				$usuario = $_POST['usuario'];
				 				$nome = $_POST['nome'];
				 				$adm = $_POST['adm'];
				 				$senha = $_POST['senha'];

							 	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							 	$sql = "INSERT INTO cadastro_usuarios_lancamentos (usuario, nome, adm, senha, id) VALUES ('$usuario', '$nome', '$adm', '$senha', null)";
							  	$conn->exec($sql);
							}catch(PDOException $e) {
						 	 
							}
							$conn = null;
				 		}	

				 		if (isset($_POST['Cadastrar_usuario'])){
				 			try {
				 				$usuario = $_POST['usuario'];
				 				$nome = $_POST['nome'];
				 				$adm = $_POST['adm'];
				 				$senha = $_POST['senha'];

							  	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							  	$sql = "INSERT INTO cadastro_usuarios (usuario, nome, adm, senha, id) VALUES ('$usuario', '$nome', '$adm', '$senha', null)";
							  	$conn->exec($sql);
							  
							}catch(PDOException $e) {
						 	 	echo $sql . "<br>" . $e->getMessage();
							}
							$conn = null;
				 		}	
					?>
					 
				</div>
				<form class="form-lancamento" method="post">
					<h2>Cadastro de Usuários (Lançamentos)</h2>
			 		<label>Usuário</label>
					<input type="text" name="usuario" placeholder="Digite o usuario a ser Cadastrado..." required>
					<label>Nome</label>
					<input type="text" name="nome" placeholder="Digite o nome do Usuário a ser Cadastrado..." required>
					<label>N° Adm</label>
					<input type="number" name="adm" placeholder="Digite o id do Usuário a ser Cadastrado..." required>
					<label>Senha</label>
					<input type="password" name="senha" placeholder="Digite sua Senha..." required>
					<input type="submit" name="Cadastrar_usuario2" value="Cadastrar">

					<p>N° Adm(2) = Usuários que tem acesso a área administrativa (Liderança).</p>
					<p>N° Adm(3) = Usuários que só realizam lançamentos (Cadastro/Apoio).</p>
					<br>
				</form>
			</div>

			<div class="box-lancamento">
				<form class="form-lancamento" method="post">
					<h2>Cadastro de Usuários (Administrador)</h2>
			 		<label>Usuário</label>
					<input type="text" name="usuario" placeholder="Digite o usuario a ser Cadastrado..." required>
					<label>Nome</label>
					<input type="text" name="nome" placeholder="Digite o nome do Usuário a ser Cadastrado..." required>
					<label>N° Adm</label>
					<input type="number" name="adm" placeholder="Digite o id do Usuário a ser Cadastrado..." required>
					<label>Senha</label>
					<input type="password" name="senha" placeholder="Digite sua Senha..." required>
					<input type="submit" name="Cadastrar_usuario" value="Cadastrar">

					<p>N° Adm(0) = Usuários que tem alguns acessos na área adm (Liderança).</p>
					<p>N° Adm(1) = Usuários que tem acesso a toda área adm (Cpd/Gerência).</p>
					<br>
				</form>
			</div>
		</div>	
	</section>

	

	<section id="sacolas_vendidas" class="box-info">
		<div id="info9" class="info">
			<p>Sacolas Vendidas por Operador (SAVE)</p>
			<img src="images/seta.png">
		</div><!--info-->
		<div class="conteudo9">
			<h1 style="text-align: center;font-weight: normal;">Faça aqui o Upload do Arquivo XML:</h1>
			<br>
			<form method="POST" enctype="multipart/form-data">
			<input style="cursor: pointer;padding-left: 0px;width: %;height: 30px;margin-left:9%;display: inline-block;font-size: 17px;" type="file" name="arquivo"><br><br>
			<input style="cursor: pointer;width: 25%;height: 40px;margin-bottom: 10px;margin-left: 9%;display: inline-block;font-size: 15px;" type="submit" name="enviar_arquivo" value="Enviar">

			<p style="margin-left: 9%;">1° - Gerar um relatório na tela SASOI03 para saber quantas sacolas foram vendidas por cada operador;</p>
			<p style="margin-left: 9%;">2° - Copiar o arquivo do Bk para o balanca e abrir o relatório no excel;</p>
			<p style="margin-left: 9%;">3° - Formatar o relatório de acordo com a imagem enviada no anexo do email;</p>
			<p style="margin-left: 9%;">4° - Salvar o relatório como "Planilha XML 2003";</p>
			<p style="margin-left: 9%;">5° - Importar arquivo no input acima.</p>
			<p style="margin-left: 9%;">Obs: Quando for fazer a importação do arquivo o mesmo não pode estar salvo em nenhum diretório de rede (balanca, cpd, etc.), pois pode dar interferência nas informações. Aconselho a salvar na área de trabalho.</p>
		</form>
		</div>
	
		<?php
			if(!empty($_FILES['arquivo']['tmp_name'])){
		$arquivo = new DomDocument();
		$arquivo->load($_FILES['arquivo']['tmp_name']);
		//var_dump($arquivo);
		
		$linhas = $arquivo->getElementsByTagName("Row");
		//var_dump($linhas);
		
		$primeira_linha = true;
		
		foreach($linhas as $linha){
			if($primeira_linha == false){
				$Operador = $linha->getElementsByTagName("Data")->item(0)->nodeValue;
				//echo "Operador: $Operador <br>";
				
				$Nome = $linha->getElementsByTagName("Data")->item(1)->nodeValue;
				//echo "Nome: $Nome <br>";
				
				$Quantidade = $linha->getElementsByTagName("Data")->item(2)->nodeValue;
				$data_dia = $linha->getElementsByTagName("Data")->item(3)->nodeValue;
				//echo "Quantidade Vendida: $Quantidade <br>";
				
				//echo "<hr>";
				//Inserir o usuário no BD
				$result_usuario = "INSERT INTO sacolas_vendidas_por_operador_exel (operador, nome, quantidade,  data, id) VALUES ('$Operador', '$Nome', '$Quantidade', '$data_dia', null)";
				$resultado_usuario = mysqli_query($conn4, $result_usuario);
			}
			$primeira_linha = false;
		}
	} 
		 ?>

		 <section id="sacolas_vendidas" class="box-info">
		<div id="info9" class="info">
			<p>Comparação de Sacolas: Lançamento vs Venda</p>
			<img src="images/seta.png">
		</div><!--info-->
		<div class="conteudo9">
			<form method="post">
			<input class ="data_input"; style="width: 50%;height: 40px;margin: 10px 9%;display: inline-block;font-size: 15px;" type="date" name="data">
			<input style="cursor:pointer;width: 15%;height: 40px;margin: 10px 2%;display: inline-block;font-size: 15px;" type="submit" name="procurar2" value="Procurar">
			<a href="">
				<img onclick="cont();" class="impressora" src="images/impressora.png">
			</a>
		</form>
			<div style=" background: #021bfa; width: 80%;height: 150px;margin-left: 10.2%;border: 2px solid black;display: block;border-radius: 50px;" class="caixa" id="total_venda">
			<p> 
				<?php
				echo "Total de Sacolas Vendidas em: "; 
				if (isset($_POST['procurar2'])) {
					$data = $_POST['data'];
					echo $data;
				}			
				
				 ?>
			</p>
			<p  style="font-size: 23px; text-align: center;" id="quantidade2">
				<?php
				if (isset($_POST['procurar2'])) {
					$data = $_POST['data'];
				$listagem = $conn2->prepare("SELECT SUM(quantidade) as soma_total FROM sacolas_vendidas_por_operador_exel WHERE data = '$data'");
				$listagem->execute();
					$row = $listagem->fetch(); 
					echo "$row[soma_total]". " Sacolas";
					echo "   / ";
					echo ($row["soma_total"] / 250). " Fardos";
				}
			 ?>
			</p>
		</div><!--caixa-->
		<div id="print">
			<table >
			<?php
			if (isset($_POST['procurar2'])) {
				$data_mes = date('m');
				if ($data_mes == 1){
					$data = $_POST['data'];
					$_SESSION['data_procura'] = $data;
					$listagem = $conn2->prepare("SELECT v.operador, v.nome, v.total, l.quantidade FROM sacolas_janeiro  as v INNER JOIN sacolas_vendidas_por_operador_exel  as l ON v.operador = l.operador WHERE v.data = '$data' and l.data = '$data' ORDER BY operador ASC");
					$listagem->execute();
					while($lista = $listagem->fetch(PDO::FETCH_ASSOC)){
						echo "<tr><th>Operador</th><th>Nome</th><th>Qtd. Lançada</th><th>Qtd. Vendida</th></tr>";
						echo "<tr><td>$lista[operador]</td><td>$lista[nome]</td><td>$lista[total]</td><td>$lista[quantidade]</td>";
					}
				}

				if ($data_mes == 2){
					$data = $_POST['data'];
					$_SESSION['data_procura'] = $data;
					$listagem = $conn2->prepare("SELECT v.operador, v.nome, v.total, l.quantidade FROM sacolas_fevereiro  as v INNER JOIN sacolas_vendidas_por_operador_exel  as l ON v.operador = l.operador WHERE v.data = '$data' and l.data = '$data' ORDER BY operador ASC");
					$listagem->execute();
					while($lista = $listagem->fetch(PDO::FETCH_ASSOC)){
						echo "<tr><th>Operador</th><th>Nome</th><th>Qtd. Lançada</th><th>Qtd. Vendida</th></tr>";
						echo "<tr><td>$lista[operador]</td><td>$lista[nome]</td><td>$lista[total]</td><td>$lista[quantidade]</td>";
					}
				}

				if ($data_mes == 3){
					$data = $_POST['data'];
					$_SESSION['data_procura'] = $data;
					$listagem = $conn2->prepare("SELECT v.operador, v.nome, v.total, l.quantidade FROM sacolas_marco  as v INNER JOIN sacolas_vendidas_por_operador_exel  as l ON v.operador = l.operador WHERE v.data = '$data' and l.data = '$data' ORDER BY operador ASC");
					$listagem->execute();
					while($lista = $listagem->fetch(PDO::FETCH_ASSOC)){
						echo "<tr><th>Operador</th><th>Nome</th><th>Qtd. Lançada</th><th>Qtd. Vendida</th></tr>";
						echo "<tr><td>$lista[operador]</td><td>$lista[nome]</td><td>$lista[total]</td><td>$lista[quantidade]</td>";
					}
				}

				if ($data_mes == 4){
					$data = $_POST['data'];
					$_SESSION['data_procura'] = $data;
					$listagem = $conn2->prepare("SELECT v.operador, v.nome, v.total, l.quantidade FROM sacolas_abril  as v INNER JOIN sacolas_vendidas_por_operador_exel  as l ON v.operador = l.operador WHERE v.data = '$data' and l.data = '$data' ORDER BY operador ASC");
					$listagem->execute();
					while($lista = $listagem->fetch(PDO::FETCH_ASSOC)){
						echo "<tr><th>Operador</th><th>Nome</th><th>Qtd. Lançada</th><th>Qtd. Vendida</th></tr>";
						echo "<tr><td>$lista[operador]</td><td>$lista[nome]</td><td>$lista[total]</td><td>$lista[quantidade]</td>";
					}
				}

				if ($data_mes == 5){
					$data = $_POST['data'];
					$_SESSION['data_procura'] = $data;
					$listagem = $conn2->prepare("SELECT v.operador, v.nome, v.total, l.quantidade FROM sacolas_maio  as v INNER JOIN sacolas_vendidas_por_operador_exel  as l ON v.operador = l.operador WHERE v.data = '$data' and l.data = '$data' ORDER BY operador ASC");
					$listagem->execute();
					while($lista = $listagem->fetch(PDO::FETCH_ASSOC)){
						echo "<tr><th>Operador</th><th>Nome</th><th>Qtd. Lançada</th><th>Qtd. Vendida</th></tr>";
						echo "<tr><td>$lista[operador]</td><td>$lista[nome]</td><td>$lista[total]</td><td>$lista[quantidade]</td>";
					}
				}


				if ($data_mes == 6){
					$data = $_POST['data'];
					$_SESSION['data_procura'] = $data;
					$listagem = $conn2->prepare("SELECT v.operador, v.nome, v.total, l.quantidade FROM sacolas_junho  as v INNER JOIN sacolas_vendidas_por_operador_exel  as l ON v.operador = l.operador WHERE v.data = '$data' and l.data = '$data' ORDER BY operador ASC");
					$listagem->execute();
					while($lista = $listagem->fetch(PDO::FETCH_ASSOC)){
						echo "<tr><th>Operador</th><th>Nome</th><th>Qtd. Lançada</th><th>Qtd. Vendida</th></tr>";
						echo "<tr><td>$lista[operador]</td><td>$lista[nome]</td><td>$lista[total]</td><td>$lista[quantidade]</td>";
					}
				}


				if ($data_mes == 7){
					$data = $_POST['data'];
					$_SESSION['data_procura'] = $data;
					$listagem = $conn2->prepare("SELECT v.operador, v.nome, v.total, l.quantidade FROM sacolas_julho  as v INNER JOIN sacolas_vendidas_por_operador_exel  as l ON v.operador = l.operador WHERE v.data = '$data' and l.data = '$data' ORDER BY operador ASC");
					$listagem->execute();
					while($lista = $listagem->fetch(PDO::FETCH_ASSOC)){
						echo "<tr><th>Operador</th><th>Nome</th><th>Qtd. Lançada</th><th>Qtd. Vendida</th></tr>";
						echo "<tr><td>$lista[operador]</td><td>$lista[nome]</td><td>$lista[total]</td><td>$lista[quantidade]</td>";
					}
				}


				if ($data_mes == 8){
					$data = $_POST['data'];
					$_SESSION['data_procura'] = $data;
					$listagem = $conn2->prepare("SELECT v.operador, v.nome, v.total, l.quantidade FROM sacolas_agosto as v INNER JOIN sacolas_vendidas_por_operador_exel  as l ON v.operador = l.operador WHERE v.data = '$data' and l.data = '$data' ORDER BY operador ASC");
					$listagem->execute();
					while($lista = $listagem->fetch(PDO::FETCH_ASSOC)){
						echo "<tr><th>Operador</th><th>Nome</th><th>Qtd. Lançada</th><th>Qtd. Vendida</th></tr>";
						echo "<tr><td>$lista[operador]</td><td>$lista[nome]</td><td>$lista[total]</td><td>$lista[quantidade]</td>";
					}
				}

				if ($data_mes == 9){
					$data = $_POST['data'];
					$_SESSION['data_procura'] = $data;
					$listagem = $conn2->prepare("SELECT v.operador, v.nome, v.total, l.quantidade FROM sacolas_setembro  as v INNER JOIN sacolas_vendidas_por_operador_exel  as l ON v.operador = l.operador WHERE v.data = '$data' and l.data = '$data' ORDER BY operador ASC");
					$listagem->execute();
					while($lista = $listagem->fetch(PDO::FETCH_ASSOC)){
						echo "<tr><th>Operador</th><th>Nome</th><th>Qtd. Lançada</th><th>Qtd. Vendida</th></tr>";
						echo "<tr><td>$lista[operador]</td><td>$lista[nome]</td><td>$lista[total]</td><td>$lista[quantidade]</td>";
					}
				}


				if ($data_mes == 10){
					$data = $_POST['data'];
					$_SESSION['data_procura'] = $data;
					$listagem = $conn2->prepare("SELECT v.operador, v.nome, v.total, l.quantidade FROM sacolas_outubro  as v INNER JOIN sacolas_vendidas_por_operador_exel  as l ON v.operador = l.operador WHERE v.data = '$data' and l.data = '$data' ORDER BY operador ASC");
					$listagem->execute();
					while($lista = $listagem->fetch(PDO::FETCH_ASSOC)){
						echo "<tr><th>Operador</th><th>Nome</th><th>Qtd. Lançada</th><th>Qtd. Vendida</th></tr>";
						echo "<tr><td>$lista[operador]</td><td>$lista[nome]</td><td>$lista[total]</td><td>$lista[quantidade]</td>";
					}
				}


				if ($data_mes == 11){
					$data = $_POST['data'];
					$_SESSION['data_procura'] = $data;
					$listagem = $conn2->prepare("SELECT v.operador, v.nome, v.total, l.quantidade FROM sacolas_novembro  as v INNER JOIN sacolas_vendidas_por_operador_exel  as l ON v.operador = l.operador WHERE v.data = '$data' and l.data = '$data' ORDER BY operador ASC");
					$listagem->execute();
					while($lista = $listagem->fetch(PDO::FETCH_ASSOC)){
						echo "<tr><th>Operador</th><th>Nome</th><th>Qtd. Lançada</th><th>Qtd. Vendida</th></tr>";
						echo "<tr><td>$lista[operador]</td><td>$lista[nome]</td><td>$lista[total]</td><td>$lista[quantidade]</td>";
					}
				}


				if ($data_mes == 12){
					$data = $_POST['data'];
					$_SESSION['data_procura'] = $data;
					$listagem = $conn2->prepare("SELECT v.operador, v.nome, v.total, l.quantidade FROM sacolas_dezembro  as v INNER JOIN sacolas_vendidas_por_operador_exel  as l ON v.operador = l.operador WHERE v.data = '$data' and l.data = '$data' ORDER BY operador ASC");
					$listagem->execute();
					while($lista = $listagem->fetch(PDO::FETCH_ASSOC)){
						echo "<tr><th>Operador</th><th>Nome</th><th>Qtd. Lançada</th><th>Qtd. Vendida</th></tr>";
						echo "<tr><td>$lista[operador]</td><td>$lista[nome]</td><td>$lista[total]</td><td>$lista[quantidade]</td>";
					}
				}
						
			}
			?>
			  
		</table>
		</div>
		
		</div>
	</section><!--lancamentos-->

		 <section id="relatorios" class="box-info">
		<div id="info10" class="info">
			<p>Relatórios</p>
			<img src="images/seta.png">
		</div><!--info-->
		<div class="conteudo10">
			<form method="POST" enctype="multipart/form-data">
			<h1 style="text-align: center;font-weight: normal;display: inline-block;margin-left: 9%;">Relatório de Lançamentos (resumido) de Sacolas:</h1>
			<button class="relatorio" style="cursor: pointer;width: 10%;height: 40px;margin-bottom: 10px;margin-left: 9%;display: inline-block;font-size: 15px;">Gerar Relatório</button> 
			</form>
			<br>
			<form method="POST" enctype="multipart/form-data">
			<h1 style="text-align: center;font-weight: normal;display: inline-block;margin-left: 9%;">Relatório de Operadores Cadastrados:</h1>
			<button class="relatorio2" style="cursor: pointer;width: 10%;height: 40px;margin-bottom: 10px;margin-left: 9%;display: inline-block;font-size: 15px;">Gerar Relatório</button> 
			</form>
			<br>
			<form method="POST" enctype="multipart/form-data">
			<h1 style="text-align: center;font-weight: normal;display: inline-block;margin-left: 9%;">Relatório de Lançamentos (detalhado)  de Sacolas por Operação:</h1>
			<button class="relatorio3" style="cursor: pointer;width: 10%;height: 40px;margin-bottom: 10px;margin-left: 9%;display: inline-block;font-size: 15px;">Gerar Relatório</button> 
			</form>
			<br>
			<form method="POST" enctype="multipart/form-data">
			<h1 style="text-align: center;font-weight: normal;display: inline-block;margin-left: 9%;">Relatório de Comparação de Sacolas: Lançamento vs Venda</h1>
			<button class="relatorio4" style="cursor: pointer;width: 10%;height: 40px;margin-bottom: 10px;margin-left: 9%;display: inline-block;font-size: 15px;">Gerar Relatório</button> 
			</form>
		</div>
<?php endif; ?>





















<?php if ($adm == 0): ?>
	<div class="menu">
				<ul>
					<li class="scroll"><a href="#lancamentos">Lançamentos</a></li>
					<li class="scroll"><a href="#sacolas_vendidas">Sacolas Vendidas</a></li>
					<li class="scroll"><a href="#relatorios">Relatórios</a></li>
					<div class="sobre2"><li><a href="logout.php">Logout</a></li></div>
				</ul>
				<div class="clear"></div>
	</div><!--menu-->
	
	<section id="" class="box-info">
		<div id="info1" class="info">
			<p>Operadores Cadastrados</p>
			<img src="images/seta.png">
		</div><!--info-->
		<div class="conteudo">
			<table>
			<?php
				 $listagem = $conn->prepare("SELECT * FROM cadastro_op");
				 $listagem->execute();
				 while($lista = $listagem->fetch(PDO::FETCH_ASSOC)):
			?>

			  <tr>
			    <th>ID</th>
			    <th>Operador</th>
			    <th>Nome</th>
			    <th>Data e Hora</th>
			  </tr>
			  <tr>
			    <td><?php echo $lista["id"];?></td>
			    <td><?php echo $lista["operador"];?></td>
			    <td><?php echo $lista["nome"];?></td>
			    <td><?php echo $lista["created"];?></td>
			  </tr>

		  	<?php
				endwhile; 
			?>
		</table>
		</div>

	</section><!--op-cadastrados-->


	<section id="lancamentos" class="box-info">
		<div id="info2" class="info">
			<p>Lançamentos (resumido) por Data</p>
			<img src="images/seta.png">
		</div><!--info-->
		<div class="conteudo2">
			<form method="post">
			<input class ="data_input"; style="width: 50%;height: 40px;margin: 10px 9%;display: inline-block;font-size: 15px;" type="date" name="data">
			<input style="width: 20%;height: 40px;margin: 10px 4%;display: inline-block;font-size: 15px;" type="submit" name="procurar" value="Procurar">
		</form>
		<table>
			<?php
				if (isset($_POST['procurar'])) {
						$data_mes = date('m');
						if ($data_mes == 1){
							$data = $_POST['data'];
							$listagem = $conn2->prepare("SELECT * FROM sacolas_janeiro WHERE data = '$data' ORDER BY total ASC");
							$listagem->execute();
							while($lista = $listagem->fetch(PDO::FETCH_ASSOC)):
			?>
				<tr>
			    <th>Operador</th>
			    <th>Nome</th>
			    <th>Retirada</th>
			    <th>Devolvida</th>
			    <th>Total</th>
			    <th>Último Lançamento</th>
			    <th>Hora</th>
			  </tr>
			  <tr>
			    <td><?php echo $lista["operador"];?></td>
			    <td><?php echo $lista["nome"];?></td>
			    <td><?php echo $lista["retirada"];?></td>
			    <td><?php echo $lista["devolvidas"];?></td>
			    <td><?php echo $lista["total"];?></td>
			    <td><?php echo $lista["nome_lancado"];?></td>
			    <td><?php echo $lista["created"];?></td>
			  </tr>
			  	<?php
				endwhile; 
					}
				}
				?>

				<?php
				if (isset($_POST['procurar'])) {
						$data_mes = date('m');
						if ($data_mes == 2){
							$data = $_POST['data'];
							$listagem = $conn2->prepare("SELECT * FROM sacolas_fevereiro WHERE data = '$data' ORDER BY total ASC");
							$listagem->execute();
							while($lista = $listagem->fetch(PDO::FETCH_ASSOC)):
			?>
				<tr>
			    <th>Operador</th>
			    <th>Nome</th>
			    <th>Retirada</th>
			    <th>Devolvida</th>
			    <th>Total</th>
			    <th>Último Lançamento</th>
			    <th>Hora</th>
			  </tr>
			  <tr>
			    <td><?php echo $lista["operador"];?></td>
			    <td><?php echo $lista["nome"];?></td>
			    <td><?php echo $lista["retirada"];?></td>
			    <td><?php echo $lista["devolvidas"];?></td>
			    <td><?php echo $lista["total"];?></td>
			    <td><?php echo $lista["nome_lancado"];?></td>
			    <td><?php echo $lista["created"];?></td>
			  </tr>
			  	<?php
				endwhile; 
					}
				}
				?>

				<?php
				if (isset($_POST['procurar'])) {
						$data_mes = date('m');
						if ($data_mes == 3){
							$data = $_POST['data'];
							$listagem = $conn2->prepare("SELECT * FROM sacolas_marco WHERE data = '$data' ORDER BY total ASC");
							$listagem->execute();
							while($lista = $listagem->fetch(PDO::FETCH_ASSOC)):
			?>
				<tr>
			    <th>Operador</th>
			    <th>Nome</th>
			    <th>Retirada</th>
			    <th>Devolvida</th>
			    <th>Total</th>
			    <th>Último Lançamento</th>
			    <th>Hora</th>
			  </tr>
			  <tr>
			    <td><?php echo $lista["operador"];?></td>
			    <td><?php echo $lista["nome"];?></td>
			    <td><?php echo $lista["retirada"];?></td>
			    <td><?php echo $lista["devolvidas"];?></td>
			    <td><?php echo $lista["total"];?></td>
			    <td><?php echo $lista["nome_lancado"];?></td>
			    <td><?php echo $lista["created"];?></td>
			  </tr>
			  	<?php
				endwhile; 
					}
				}
				?>

				<?php
				if (isset($_POST['procurar'])) {
						$data_mes = date('m');
						if ($data_mes == 4){
							$data = $_POST['data'];
							$listagem = $conn2->prepare("SELECT * FROM sacolas_abril WHERE data = '$data' ORDER BY total ASC");
							$listagem->execute();
							while($lista = $listagem->fetch(PDO::FETCH_ASSOC)):
			?>
				<tr>
			    <th>Operador</th>
			    <th>Nome</th>
			    <th>Retirada</th>
			    <th>Devolvida</th>
			    <th>Total</th>
			    <th>Último Lançamento</th>
			    <th>Hora</th>
			  </tr>
			  <tr>
			    <td><?php echo $lista["operador"];?></td>
			    <td><?php echo $lista["nome"];?></td>
			    <td><?php echo $lista["retirada"];?></td>
			    <td><?php echo $lista["devolvidas"];?></td>
			    <td><?php echo $lista["total"];?></td>
			    <td><?php echo $lista["nome_lancado"];?></td>
			    <td><?php echo $lista["created"];?></td>
			  </tr>
			  	<?php
				endwhile; 
					}
				}
				?>

				<?php
				if (isset($_POST['procurar'])) {
						$data_mes = date('m');
						if ($data_mes == 5){
							$data = $_POST['data'];
							$listagem = $conn2->prepare("SELECT * FROM sacolas_maio WHERE data = '$data' ORDER BY total ASC");
							$listagem->execute();
							while($lista = $listagem->fetch(PDO::FETCH_ASSOC)):
			?>
				<tr>
			    <th>Operador</th>
			    <th>Nome</th>
			    <th>Retirada</th>
			    <th>Devolvida</th>
			    <th>Total</th>
			    <th>Último Lançamento</th>
			    <th>Hora</th>
			  </tr>
			  <tr>
			    <td><?php echo $lista["operador"];?></td>
			    <td><?php echo $lista["nome"];?></td>
			    <td><?php echo $lista["retirada"];?></td>
			    <td><?php echo $lista["devolvidas"];?></td>
			    <td><?php echo $lista["total"];?></td>
			    <td><?php echo $lista["nome_lancado"];?></td>
			    <td><?php echo $lista["created"];?></td>
			  </tr>
			  	<?php
				endwhile; 
					}
				}
				?>

				<?php
				if (isset($_POST['procurar'])) {
						$data_mes = date('m');
						if ($data_mes == 6){
							$data = $_POST['data'];
							$listagem = $conn2->prepare("SELECT * FROM sacolas_junho WHERE data = '$data' ORDER BY total ASC");
							$listagem->execute();
							while($lista = $listagem->fetch(PDO::FETCH_ASSOC)):
			?>
				<tr>
			    <th>Operador</th>
			    <th>Nome</th>
			    <th>Retirada</th>
			    <th>Devolvida</th>
			    <th>Total</th>
			    <th>Último Lançamento</th>
			    <th>Hora</th>
			  </tr>
			  <tr>
			    <td><?php echo $lista["operador"];?></td>
			    <td><?php echo $lista["nome"];?></td>
			    <td><?php echo $lista["retirada"];?></td>
			    <td><?php echo $lista["devolvidas"];?></td>
			    <td><?php echo $lista["total"];?></td>
			    <td><?php echo $lista["nome_lancado"];?></td>
			    <td><?php echo $lista["created"];?></td>
			  </tr>
			  	<?php
				endwhile; 
					}
				}
				?>

				<?php
				if (isset($_POST['procurar'])) {
						$data_mes = date('m');
						if ($data_mes == 7){
							$data = $_POST['data'];
							$listagem = $conn2->prepare("SELECT * FROM sacolas_julho WHERE data = '$data' ORDER BY total ASC");
							$listagem->execute();
							while($lista = $listagem->fetch(PDO::FETCH_ASSOC)):
			?>
				<tr>
			    <th>Operador</th>
			    <th>Nome</th>
			    <th>Retirada</th>
			    <th>Devolvida</th>
			    <th>Total</th>
			    <th>Último Lançamento</th>
			    <th>Hora</th>
			  </tr>
			  <tr>
			    <td><?php echo $lista["operador"];?></td>
			    <td><?php echo $lista["nome"];?></td>
			    <td><?php echo $lista["retirada"];?></td>
			    <td><?php echo $lista["devolvidas"];?></td>
			    <td><?php echo $lista["total"];?></td>
			    <td><?php echo $lista["nome_lancado"];?></td>
			    <td><?php echo $lista["created"];?></td>
			  </tr>
			  	<?php
				endwhile; 
					}
				}
				?>

				<?php
				if (isset($_POST['procurar'])) {
						$data_mes = date('m');
						if ($data_mes == 8){
							$data = $_POST['data'];
							$listagem = $conn2->prepare("SELECT * FROM sacolas_agosto WHERE data = '$data' ORDER BY total ASC");
							$listagem->execute();
							while($lista = $listagem->fetch(PDO::FETCH_ASSOC)):
			?>
				<tr>
			    <th>Operador</th>
			    <th>Nome</th>
			    <th>Retirada</th>
			    <th>Devolvida</th>
			    <th>Total</th>
			    <th>Último Lançamento</th>
			    <th>Hora</th>
			  </tr>
			  <tr>
			    <td><?php echo $lista["operador"];?></td>
			    <td><?php echo $lista["nome"];?></td>
			    <td><?php echo $lista["retirada"];?></td>
			    <td><?php echo $lista["devolvidas"];?></td>
			    <td><?php echo $lista["total"];?></td>
			    <td><?php echo $lista["nome_lancado"];?></td>
			    <td><?php echo $lista["created"];?></td>
			  </tr>
			  	<?php
				endwhile; 
					}
				}
				?>

				<?php
				if (isset($_POST['procurar'])) {
						$data_mes = date('m');
						if ($data_mes == 9){
							$data = $_POST['data'];
							$listagem = $conn2->prepare("SELECT * FROM sacolas_setembro WHERE data = '$data' ORDER BY total ASC");
							$listagem->execute();
							while($lista = $listagem->fetch(PDO::FETCH_ASSOC)):
			?>
				<tr>
			    <th>Operador</th>
			    <th>Nome</th>
			    <th>Retirada</th>
			    <th>Devolvida</th>
			    <th>Total</th>
			    <th>Último Lançamento</th>
			    <th>Hora</th>
			  </tr>
			  <tr>
			    <td><?php echo $lista["operador"];?></td>
			    <td><?php echo $lista["nome"];?></td>
			    <td><?php echo $lista["retirada"];?></td>
			    <td><?php echo $lista["devolvidas"];?></td>
			    <td><?php echo $lista["total"];?></td>
			    <td><?php echo $lista["nome_lancado"];?></td>
			    <td><?php echo $lista["created"];?></td>
			  </tr>
			  	<?php
				endwhile; 
					}
				}
				?>

				<?php
				if (isset($_POST['procurar'])) {
						$data_mes = date('m');
						if ($data_mes == 10){
							$data = $_POST['data'];
							$listagem = $conn2->prepare("SELECT * FROM sacolas_outubro WHERE data = '$data' ORDER BY total ASC");
							$listagem->execute();
							while($lista = $listagem->fetch(PDO::FETCH_ASSOC)):
			?>
				<tr>
			    <th>Operador</th>
			    <th>Nome</th>
			    <th>Retirada</th>
			    <th>Devolvida</th>
			    <th>Total</th>
			    <th>Último Lançamento</th>
			    <th>Hora</th>
			  </tr>
			  <tr>
			    <td><?php echo $lista["operador"];?></td>
			    <td><?php echo $lista["nome"];?></td>
			    <td><?php echo $lista["retirada"];?></td>
			    <td><?php echo $lista["devolvidas"];?></td>
			    <td><?php echo $lista["total"];?></td>
			    <td><?php echo $lista["nome_lancado"];?></td>
			    <td><?php echo $lista["created"];?></td>
			  </tr>
			  	<?php
				endwhile; 
					}
				}
				?>

				<?php
				if (isset($_POST['procurar'])) {
						$data_mes = date('m');
						if ($data_mes == 11){
							$data = $_POST['data'];
							$listagem = $conn2->prepare("SELECT * FROM sacolas_novembro WHERE data = '$data' ORDER BY total ASC");
							$listagem->execute();
							while($lista = $listagem->fetch(PDO::FETCH_ASSOC)):
			?>
				<tr>
			    <th>Operador</th>
			    <th>Nome</th>
			    <th>Retirada</th>
			    <th>Devolvida</th>
			    <th>Total</th>
			    <th>Último Lançamento</th>
			    <th>Hora</th>
			  </tr>
			  <tr>
			    <td><?php echo $lista["operador"];?></td>
			    <td><?php echo $lista["nome"];?></td>
			    <td><?php echo $lista["retirada"];?></td>
			    <td><?php echo $lista["devolvidas"];?></td>
			    <td><?php echo $lista["total"];?></td>
			    <td><?php echo $lista["nome_lancado"];?></td>
			    <td><?php echo $lista["created"];?></td>
			  </tr>
			  	<?php
				endwhile; 
					}
				}
				?>

			<?php
				if (isset($_POST['procurar'])) {
						$data_mes = date('m');
						if ($data_mes == 12){
							$data = $_POST['data'];
							$listagem = $conn2->prepare("SELECT * FROM sacolas_dezembro WHERE data = '$data' ORDER BY total ASC");
							$listagem->execute();
							while($lista = $listagem->fetch(PDO::FETCH_ASSOC)):
			?>
				<tr>
			    <th>Operador</th>
			    <th>Nome</th>
			    <th>Retirada</th>
			    <th>Devolvida</th>
			    <th>Total</th>
			    <th>Último Lançamento</th>
			    <th>Hora</th>
			  </tr>
			  <tr>
			    <td><?php echo $lista["operador"];?></td>
			    <td><?php echo $lista["nome"];?></td>
			    <td><?php echo $lista["retirada"];?></td>
			    <td><?php echo $lista["devolvidas"];?></td>
			    <td><?php echo $lista["total"];?></td>
			    <td><?php echo $lista["nome_lancado"];?></td>
			    <td><?php echo $lista["created"];?></td>
			  </tr>
			  	<?php
				endwhile; 
					}
				}
				?>
			  
			  
		</table>
		</div>
	</section><!--lancamentos-->

	<section id="lancamentos" class="box-info">
		<div id="info11" class="info">
			<p>Lançamentos (detalhado) por Data</p>
			<img src="images/seta.png">
		</div><!--info-->
		<div class="conteudo11">
			<form method="post">
			<input class ="data_input"; style="width: 50%;height: 40px;margin: 10px 9%;display: inline-block;font-size: 15px;" type="date" name="data">
			<input style="width: 20%;height: 40px;margin: 10px 4%;display: inline-block;font-size: 15px;" type="submit" name="procurar_operacao" value="Procurar">
		</form>
		<table>
			<?php
				if (isset($_POST['procurar_operacao'])) {
						$data_mes = date('m');
						if ($data_mes == 1){
							$data = $_POST['data'];
							$listagem = $conn2->prepare("SELECT * FROM sacolas_cpd_janeiro WHERE data = '$data' ORDER BY total ASC");
							$listagem->execute();
							while($lista = $listagem->fetch(PDO::FETCH_ASSOC)):
			?>
				<tr>
			    <th>Operador</th>
			    <th>Nome</th>
			    <th>Retirada</th>
			    <th>Devolvida</th>
			    <th>Total</th>
			    <th>Último Lançamento</th>
			    <th>Hora</th>
			  </tr>
			  <tr>
			    <td><?php echo $lista["operador"];?></td>
			    <td><?php echo $lista["nome"];?></td>
			    <td><?php echo $lista["retirada"];?></td>
			    <td><?php echo $lista["devolvidas"];?></td>
			    <td><?php echo $lista["total"];?></td>
			    <td><?php echo $lista["nome_lancado"];?></td>
			    <td><?php echo $lista["created"];?></td>
			  </tr>
			  	<?php
				endwhile; 
					}
				}
				?>

				<?php
				if (isset($_POST['procurar_operacao'])) {
						$data_mes = date('m');
						if ($data_mes == 2){
							$data = $_POST['data'];
							$listagem = $conn2->prepare("SELECT * FROM sacolas_cpd_fevereiro WHERE data = '$data' ORDER BY total ASC");
							$listagem->execute();
							while($lista = $listagem->fetch(PDO::FETCH_ASSOC)):
			?>
				<tr>
			    <th>Operador</th>
			    <th>Nome</th>
			    <th>Retirada</th>
			    <th>Devolvida</th>
			    <th>Total</th>
			    <th>Último Lançamento</th>
			    <th>Hora</th>
			  </tr>
			  <tr>
			    <td><?php echo $lista["operador"];?></td>
			    <td><?php echo $lista["nome"];?></td>
			    <td><?php echo $lista["retirada"];?></td>
			    <td><?php echo $lista["devolvidas"];?></td>
			    <td><?php echo $lista["total"];?></td>
			    <td><?php echo $lista["nome_lancado"];?></td>
			    <td><?php echo $lista["created"];?></td>
			  </tr>
			  	<?php
				endwhile; 
					}
				}
				?>

				<?php
				if (isset($_POST['procurar_operacao'])) {
						$data_mes = date('m');
						if ($data_mes == 3){
							$data = $_POST['data'];
							$listagem = $conn2->prepare("SELECT * FROM sacolas_cpd_marco WHERE data = '$data' ORDER BY total ASC");
							$listagem->execute();
							while($lista = $listagem->fetch(PDO::FETCH_ASSOC)):
			?>
				<tr>
			    <th>Operador</th>
			    <th>Nome</th>
			    <th>Retirada</th>
			    <th>Devolvida</th>
			    <th>Total</th>
			    <th>Último Lançamento</th>
			    <th>Hora</th>
			  </tr>
			  <tr>
			    <td><?php echo $lista["operador"];?></td>
			    <td><?php echo $lista["nome"];?></td>
			    <td><?php echo $lista["retirada"];?></td>
			    <td><?php echo $lista["devolvidas"];?></td>
			    <td><?php echo $lista["total"];?></td>
			    <td><?php echo $lista["nome_lancado"];?></td>
			    <td><?php echo $lista["created"];?></td>
			  </tr>
			  	<?php
				endwhile; 
					}
				}
				?>

				<?php
				if (isset($_POST['procurar_operacao'])) {
						$data_mes = date('m');
						if ($data_mes == 4){
							$data = $_POST['data'];
							$listagem = $conn2->prepare("SELECT * FROM sacolas_cpd_abril WHERE data = '$data' ORDER BY total ASC");
							$listagem->execute();
							while($lista = $listagem->fetch(PDO::FETCH_ASSOC)):
			?>
				<tr>
			    <th>Operador</th>
			    <th>Nome</th>
			    <th>Retirada</th>
			    <th>Devolvida</th>
			    <th>Total</th>
			    <th>Último Lançamento</th>
			    <th>Hora</th>
			  </tr>
			  <tr>
			    <td><?php echo $lista["operador"];?></td>
			    <td><?php echo $lista["nome"];?></td>
			    <td><?php echo $lista["retirada"];?></td>
			    <td><?php echo $lista["devolvidas"];?></td>
			    <td><?php echo $lista["total"];?></td>
			    <td><?php echo $lista["nome_lancado"];?></td>
			    <td><?php echo $lista["created"];?></td>
			  </tr>
			  	<?php
				endwhile; 
					}
				}
				?>

				<?php
				if (isset($_POST['procurar_operacao'])) {
						$data_mes = date('m');
						if ($data_mes == 5){
							$data = $_POST['data'];
							$listagem = $conn2->prepare("SELECT * FROM sacolas_cpd_maio WHERE data = '$data' ORDER BY total ASC");
							$listagem->execute();
							while($lista = $listagem->fetch(PDO::FETCH_ASSOC)):
			?>
				<tr>
			    <th>Operador</th>
			    <th>Nome</th>
			    <th>Retirada</th>
			    <th>Devolvida</th>
			    <th>Total</th>
			    <th>Último Lançamento</th>
			    <th>Hora</th>
			  </tr>
			  <tr>
			    <td><?php echo $lista["operador"];?></td>
			    <td><?php echo $lista["nome"];?></td>
			    <td><?php echo $lista["retirada"];?></td>
			    <td><?php echo $lista["devolvidas"];?></td>
			    <td><?php echo $lista["total"];?></td>
			    <td><?php echo $lista["nome_lancado"];?></td>
			    <td><?php echo $lista["created"];?></td>
			  </tr>
			  	<?php
				endwhile; 
					}
				}
				?>

				<?php
				if (isset($_POST['procurar_operacao'])) {
						$data_mes = date('m');
						if ($data_mes == 6){
							$data = $_POST['data'];
							$listagem = $conn2->prepare("SELECT * FROM sacolas_cpd_junho WHERE data = '$data' ORDER BY total ASC");
							$listagem->execute();
							while($lista = $listagem->fetch(PDO::FETCH_ASSOC)):
			?>
				<tr>
			    <th>Operador</th>
			    <th>Nome</th>
			    <th>Retirada</th>
			    <th>Devolvida</th>
			    <th>Total</th>
			    <th>Último Lançamento</th>
			    <th>Hora</th>
			  </tr>
			  <tr>
			    <td><?php echo $lista["procurar_operacao"];?></td>
			    <td><?php echo $lista["nome"];?></td>
			    <td><?php echo $lista["retirada"];?></td>
			    <td><?php echo $lista["devolvidas"];?></td>
			    <td><?php echo $lista["total"];?></td>
			    <td><?php echo $lista["nome_lancado"];?></td>
			    <td><?php echo $lista["created"];?></td>
			  </tr>
			  	<?php
				endwhile; 
					}
				}
				?>

				<?php
				if (isset($_POST['procurar_operacao'])) {
						$data_mes = date('m');
						if ($data_mes == 7){
							$data = $_POST['data'];
							$listagem = $conn2->prepare("SELECT * FROM sacolas_cpd_julho WHERE data = '$data' ORDER BY total ASC");
							$listagem->execute();
							while($lista = $listagem->fetch(PDO::FETCH_ASSOC)):
			?>
				<tr>
			    <th>Operador</th>
			    <th>Nome</th>
			    <th>Retirada</th>
			    <th>Devolvida</th>
			    <th>Total</th>
			    <th>Último Lançamento</th>
			    <th>Hora</th>
			  </tr>
			  <tr>
			    <td><?php echo $lista["operador"];?></td>
			    <td><?php echo $lista["nome"];?></td>
			    <td><?php echo $lista["retirada"];?></td>
			    <td><?php echo $lista["devolvidas"];?></td>
			    <td><?php echo $lista["total"];?></td>
			    <td><?php echo $lista["nome_lancado"];?></td>
			    <td><?php echo $lista["created"];?></td>
			  </tr>
			  	<?php
				endwhile; 
					}
				}
				?>

				<?php
				if (isset($_POST['procurar_operacao'])) {
						$data_mes = date('m');
						if ($data_mes == 8){
							$data = $_POST['data'];
							$listagem = $conn2->prepare("SELECT * FROM sacolas_cpd_agosto WHERE data = '$data' ORDER BY total ASC");
							$listagem->execute();
							while($lista = $listagem->fetch(PDO::FETCH_ASSOC)):
			?>
				<tr>
			    <th>Operador</th>
			    <th>Nome</th>
			    <th>Retirada</th>
			    <th>Devolvida</th>
			    <th>Total</th>
			    <th>Último Lançamento</th>
			    <th>Hora</th>
			  </tr>
			  <tr>
			    <td><?php echo $lista["operador"];?></td>
			    <td><?php echo $lista["nome"];?></td>
			    <td><?php echo $lista["retirada"];?></td>
			    <td><?php echo $lista["devolvidas"];?></td>
			    <td><?php echo $lista["total"];?></td>
			    <td><?php echo $lista["nome_lancado"];?></td>
			    <td><?php echo $lista["created"];?></td>
			  </tr>
			  	<?php
				endwhile; 
					}
				}
				?>

				<?php
				if (isset($_POST['procurar_operacao'])) {
						$data_mes = date('m');
						if ($data_mes == 9){
							$data = $_POST['data'];
							$listagem = $conn2->prepare("SELECT * FROM sacolas_cpd_setembro WHERE data = '$data' ORDER BY total ASC");
							$listagem->execute();
							while($lista = $listagem->fetch(PDO::FETCH_ASSOC)):
			?>
				<tr>
			    <th>Operador</th>
			    <th>Nome</th>
			    <th>Retirada</th>
			    <th>Devolvida</th>
			    <th>Total</th>
			    <th>Último Lançamento</th>
			    <th>Hora</th>
			  </tr>
			  <tr>
			    <td><?php echo $lista["operador"];?></td>
			    <td><?php echo $lista["nome"];?></td>
			    <td><?php echo $lista["retirada"];?></td>
			    <td><?php echo $lista["devolvidas"];?></td>
			    <td><?php echo $lista["total"];?></td>
			    <td><?php echo $lista["nome_lancado"];?></td>
			    <td><?php echo $lista["created"];?></td>
			  </tr>
			  	<?php
				endwhile; 
					}
				}
				?>

				<?php
				if (isset($_POST['procurar_operacao'])) {
						$data_mes = date('m');
						if ($data_mes == 10){
							$data = $_POST['data'];
							$listagem = $conn2->prepare("SELECT * FROM sacolas_cpd_outubro WHERE data = '$data' ORDER BY total ASC");
							$listagem->execute();
							while($lista = $listagem->fetch(PDO::FETCH_ASSOC)):
			?>
				<tr>
			    <th>Operador</th>
			    <th>Nome</th>
			    <th>Retirada</th>
			    <th>Devolvida</th>
			    <th>Total</th>
			    <th>Último Lançamento</th>
			    <th>Hora</th>
			  </tr>
			  <tr>
			    <td><?php echo $lista["operador"];?></td>
			    <td><?php echo $lista["nome"];?></td>
			    <td><?php echo $lista["retirada"];?></td>
			    <td><?php echo $lista["devolvidas"];?></td>
			    <td><?php echo $lista["total"];?></td>
			    <td><?php echo $lista["nome_lancado"];?></td>
			    <td><?php echo $lista["created"];?></td>
			  </tr>
			  	<?php
				endwhile; 
					}
				}
				?>

				<?php
				if (isset($_POST['procurar_operacao'])) {
						$data_mes = date('m');
						if ($data_mes == 11){
							$data = $_POST['data'];
							$listagem = $conn2->prepare("SELECT * FROM sacolas_cpd_novembro WHERE data = '$data' ORDER BY total ASC");
							$listagem->execute();
							while($lista = $listagem->fetch(PDO::FETCH_ASSOC)):
			?>
				<tr>
			    <th>Operador</th>
			    <th>Nome</th>
			    <th>Retirada</th>
			    <th>Devolvida</th>
			    <th>Total</th>
			    <th>Último Lançamento</th>
			    <th>Hora</th>
			  </tr>
			  <tr>
			    <td><?php echo $lista["operador"];?></td>
			    <td><?php echo $lista["nome"];?></td>
			    <td><?php echo $lista["retirada"];?></td>
			    <td><?php echo $lista["devolvidas"];?></td>
			    <td><?php echo $lista["total"];?></td>
			    <td><?php echo $lista["nome_lancado"];?></td>
			    <td><?php echo $lista["created"];?></td>
			  </tr>
			  	<?php
				endwhile; 
					}
				}
				?>

			<?php
				if (isset($_POST['procurar_operacao'])) {
						$data_mes = date('m');
						if ($data_mes == 12){
							$data = $_POST['data'];
							$listagem = $conn2->prepare("SELECT * FROM sacolas_cpd_dezembro WHERE data = '$data' ORDER BY total ASC");
							$listagem->execute();
							while($lista = $listagem->fetch(PDO::FETCH_ASSOC)):
			?>
				<tr>
			    <th>Operador</th>
			    <th>Nome</th>
			    <th>Retirada</th>
			    <th>Devolvida</th>
			    <th>Total</th>
			    <th>Último Lançamento</th>
			    <th>Hora</th>
			  </tr>
			  <tr>
			    <td><?php echo $lista["operador"];?></td>
			    <td><?php echo $lista["nome"];?></td>
			    <td><?php echo $lista["retirada"];?></td>
			    <td><?php echo $lista["devolvidas"];?></td>
			    <td><?php echo $lista["total"];?></td>
			    <td><?php echo $lista["nome_lancado"];?></td>
			    <td><?php echo $lista["created"];?></td>
			  </tr>
			  	<?php
				endwhile; 
					}
				}
				?>
			  
			  
		</table>
		</div>
		<section id="sacolas_vendidas" class="box-info">
		<div id="info9" class="info">
			<p>Comparação de Sacolas: Lançamento vs Venda</p>
			<img src="images/seta.png">
		</div><!--info-->
		<div class="conteudo9">
			<form method="post">
			<input class ="data_input"; style="width: 50%;height: 40px;margin: 10px 9%;display: inline-block;font-size: 15px;" type="date" name="data">
			<input style="cursor:pointer;width: 15%;height: 40px;margin: 10px 2%;display: inline-block;font-size: 15px;" type="submit" name="procurar2" value="Procurar">
			<a href="">
				<img onclick="cont();" class="impressora" src="images/impressora.png">
			</a>
		</form>
			<div style=" background: #021bfa; width: 80%;height: 150px;margin-left: 10.2%;border: 2px solid black;display: block;border-radius: 50px;" class="caixa" id="total_venda">
			<p> 
				<?php
				echo "Total de Sacolas Vendidas em: "; 
				if (isset($_POST['procurar2'])) {
					$data = $_POST['data'];
					echo $data;
				}			
				
				 ?>
			</p>
			<p  style="font-size: 23px; text-align: center;" id="quantidade2">
				<?php
				if (isset($_POST['procurar2'])) {
					$data = $_POST['data'];
				$listagem = $conn2->prepare("SELECT SUM(quantidade) as soma_total FROM sacolas_vendidas_por_operador_exel WHERE data = '$data'");
				$listagem->execute();
					$row = $listagem->fetch(); 
					echo "$row[soma_total]". " Sacolas";
					echo "   / ";
					echo ($row["soma_total"] / 250). " Fardos";
				}
			 ?>
			</p>
		</div><!--caixa-->
		<div id="print">
			<table >
			<?php
			if (isset($_POST['procurar2'])) {
				$data_mes = date('m');
				if ($data_mes == 1){
					$data = $_POST['data'];
					$_SESSION['data_procura'] = $data;
					$listagem = $conn2->prepare("SELECT v.operador, v.nome, v.total, l.quantidade FROM sacolas_janeiro  as v INNER JOIN sacolas_vendidas_por_operador_exel  as l ON v.operador = l.operador WHERE v.data = '$data' and l.data = '$data' ORDER BY operador ASC");
					$listagem->execute();
					while($lista = $listagem->fetch(PDO::FETCH_ASSOC)){
						echo "<tr><th>Operador</th><th>Nome</th><th>Qtd. Lançada</th><th>Qtd. Vendida</th></tr>";
						echo "<tr><td>$lista[operador]</td><td>$lista[nome]</td><td>$lista[total]</td><td>$lista[quantidade]</td>";
					}
				}

				if ($data_mes == 2){

					$data = $_POST['data'];
					$_SESSION['data_procura'] = $data;
					$listagem = $conn2->prepare("SELECT v.operador, v.nome, v.total, l.quantidade FROM sacolas_fevereiro  as v INNER JOIN sacolas_vendidas_por_operador_exel  as l ON v.operador = l.operador WHERE v.data = '$data' and l.data = '$data' ORDER BY operador ASC");
					$listagem->execute();
					while($lista = $listagem->fetch(PDO::FETCH_ASSOC)){
						echo "<tr><th>Operador</th><th>Nome</th><th>Qtd. Lançada</th><th>Qtd. Vendida</th></tr>";
						echo "<tr><td>$lista[operador]</td><td>$lista[nome]</td><td>$lista[total]</td><td>$lista[quantidade]</td>";
					}
				}

				if ($data_mes == 3){
					$data = $_POST['data'];
					$_SESSION['data_procura'] = $data;
					$listagem = $conn2->prepare("SELECT v.operador, v.nome, v.total, l.quantidade FROM sacolas_marco  as v INNER JOIN sacolas_vendidas_por_operador_exel  as l ON v.operador = l.operador WHERE v.data = '$data' and l.data = '$data' ORDER BY operador ASC");
					$listagem->execute();
					while($lista = $listagem->fetch(PDO::FETCH_ASSOC)){
						echo "<tr><th>Operador</th><th>Nome</th><th>Qtd. Lançada</th><th>Qtd. Vendida</th></tr>";
						echo "<tr><td>$lista[operador]</td><td>$lista[nome]</td><td>$lista[total]</td><td>$lista[quantidade]</td>";
					}
				}

				if ($data_mes == 4){
					$data = $_POST['data'];
					$_SESSION['data_procura'] = $data;
					$listagem = $conn2->prepare("SELECT v.operador, v.nome, v.total, l.quantidade FROM sacolas_abril  as v INNER JOIN sacolas_vendidas_por_operador_exel  as l ON v.operador = l.operador WHERE v.data = '$data' and l.data = '$data' ORDER BY operador ASC");
					$listagem->execute();
					while($lista = $listagem->fetch(PDO::FETCH_ASSOC)){
						echo "<tr><th>Operador</th><th>Nome</th><th>Qtd. Lançada</th><th>Qtd. Vendida</th></tr>";
						echo "<tr><td>$lista[operador]</td><td>$lista[nome]</td><td>$lista[total]</td><td>$lista[quantidade]</td>";
					}
				}

				if ($data_mes == 5){
					$data = $_POST['data'];
					$_SESSION['data_procura'] = $data;
					$listagem = $conn2->prepare("SELECT v.operador, v.nome, v.total, l.quantidade FROM sacolas_maio  as v INNER JOIN sacolas_vendidas_por_operador_exel  as l ON v.operador = l.operador WHERE v.data = '$data' and l.data = '$data' ORDER BY operador ASC");
					$listagem->execute();
					while($lista = $listagem->fetch(PDO::FETCH_ASSOC)){
						echo "<tr><th>Operador</th><th>Nome</th><th>Qtd. Lançada</th><th>Qtd. Vendida</th></tr>";
						echo "<tr><td>$lista[operador]</td><td>$lista[nome]</td><td>$lista[total]</td><td>$lista[quantidade]</td>";
					}
				}


				if ($data_mes == 6){
					$data = $_POST['data'];
					$_SESSION['data_procura'] = $data;
					$listagem = $conn2->prepare("SELECT v.operador, v.nome, v.total, l.quantidade FROM sacolas_junho  as v INNER JOIN sacolas_vendidas_por_operador_exel  as l ON v.operador = l.operador WHERE v.data = '$data' and l.data = '$data' ORDER BY operador ASC");
					$listagem->execute();
					while($lista = $listagem->fetch(PDO::FETCH_ASSOC)){
						echo "<tr><th>Operador</th><th>Nome</th><th>Qtd. Lançada</th><th>Qtd. Vendida</th></tr>";
						echo "<tr><td>$lista[operador]</td><td>$lista[nome]</td><td>$lista[total]</td><td>$lista[quantidade]</td>";
					}
				}


				if ($data_mes == 7){
					$data = $_POST['data'];
					$_SESSION['data_procura'] = $data;
					$listagem = $conn2->prepare("SELECT v.operador, v.nome, v.total, l.quantidade FROM sacolas_julho  as v INNER JOIN sacolas_vendidas_por_operador_exel  as l ON v.operador = l.operador WHERE v.data = '$data' and l.data = '$data' ORDER BY operador ASC");
					$listagem->execute();
					while($lista = $listagem->fetch(PDO::FETCH_ASSOC)){
						echo "<tr><th>Operador</th><th>Nome</th><th>Qtd. Lançada</th><th>Qtd. Vendida</th></tr>";
						echo "<tr><td>$lista[operador]</td><td>$lista[nome]</td><td>$lista[total]</td><td>$lista[quantidade]</td>";
					}
				}


				if ($data_mes == 8){
					$data = $_POST['data'];
					$_SESSION['data_procura'] = $data;
					$listagem = $conn2->prepare("SELECT v.operador, v.nome, v.total, l.quantidade FROM sacolas_agosto as v INNER JOIN sacolas_vendidas_por_operador_exel  as l ON v.operador = l.operador WHERE v.data = '$data' and l.data = '$data' ORDER BY operador ASC");
					$listagem->execute();
					while($lista = $listagem->fetch(PDO::FETCH_ASSOC)){
						echo "<tr><th>Operador</th><th>Nome</th><th>Qtd. Lançada</th><th>Qtd. Vendida</th></tr>";
						echo "<tr><td>$lista[operador]</td><td>$lista[nome]</td><td>$lista[total]</td><td>$lista[quantidade]</td>";
					}
				}

				if ($data_mes == 9){
					$data = $_POST['data'];
					$_SESSION['data_procura'] = $data;
					$listagem = $conn2->prepare("SELECT v.operador, v.nome, v.total, l.quantidade FROM sacolas_setembro  as v INNER JOIN sacolas_vendidas_por_operador_exel  as l ON v.operador = l.operador WHERE v.data = '$data' and l.data = '$data' ORDER BY operador ASC");
					$listagem->execute();
					while($lista = $listagem->fetch(PDO::FETCH_ASSOC)){
						echo "<tr><th>Operador</th><th>Nome</th><th>Qtd. Lançada</th><th>Qtd. Vendida</th></tr>";
						echo "<tr><td>$lista[operador]</td><td>$lista[nome]</td><td>$lista[total]</td><td>$lista[quantidade]</td>";
					}
				}


				if ($data_mes == 10){
					$data = $_POST['data'];
					$_SESSION['data_procura'] = $data;
					$listagem = $conn2->prepare("SELECT v.operador, v.nome, v.total, l.quantidade FROM sacolas_outubro  as v INNER JOIN sacolas_vendidas_por_operador_exel  as l ON v.operador = l.operador WHERE v.data = '$data' and l.data = '$data' ORDER BY operador ASC");
					$listagem->execute();
					while($lista = $listagem->fetch(PDO::FETCH_ASSOC)){
						echo "<tr><th>Operador</th><th>Nome</th><th>Qtd. Lançada</th><th>Qtd. Vendida</th></tr>";
						echo "<tr><td>$lista[operador]</td><td>$lista[nome]</td><td>$lista[total]</td><td>$lista[quantidade]</td>";
					}
				}


				if ($data_mes == 11){
					$data = $_POST['data'];
					$_SESSION['data_procura'] = $data;
					$listagem = $conn2->prepare("SELECT v.operador, v.nome, v.total, l.quantidade FROM sacolas_novembro  as v INNER JOIN sacolas_vendidas_por_operador_exel  as l ON v.operador = l.operador WHERE v.data = '$data' and l.data = '$data' ORDER BY operador ASC");
					$listagem->execute();
					while($lista = $listagem->fetch(PDO::FETCH_ASSOC)){
						echo "<tr><th>Operador</th><th>Nome</th><th>Qtd. Lançada</th><th>Qtd. Vendida</th></tr>";
						echo "<tr><td>$lista[operador]</td><td>$lista[nome]</td><td>$lista[total]</td><td>$lista[quantidade]</td>";
					}
				}


				if ($data_mes == 12){
					$data = $_POST['data'];
					$_SESSION['data_procura'] = $data;
					$listagem = $conn2->prepare("SELECT v.operador, v.nome, v.total, l.quantidade FROM sacolas_dezembro  as v INNER JOIN sacolas_vendidas_por_operador_exel  as l ON v.operador = l.operador WHERE v.data = '$data' and l.data = '$data' ORDER BY operador ASC");
					$listagem->execute();
					while($lista = $listagem->fetch(PDO::FETCH_ASSOC)){
						echo "<tr><th>Operador</th><th>Nome</th><th>Qtd. Lançada</th><th>Qtd. Vendida</th></tr>";
						echo "<tr><td>$lista[operador]</td><td>$lista[nome]</td><td>$lista[total]</td><td>$lista[quantidade]</td>";
					}
				}
						
			}
			?>
			  
		</table>
		</div>
		
		</div>
	</section><!--lancamentos-->


	<section id="relatorios" class="box-info">
		<div id="info10" class="info">
			<p>Relatórios</p>
			<img src="images/seta.png">
		</div><!--info-->
		<div class="conteudo10">
			<form method="POST" enctype="multipart/form-data">
			<h1 style="text-align: center;font-weight: normal;display: inline-block;margin-left: 9%;">Relatório de Lançamentos (resumido) de Sacolas:</h1>
			<button class="relatorio" style="cursor: pointer;width: 10%;height: 40px;margin-bottom: 10px;margin-left: 9%;display: inline-block;font-size: 15px;">Gerar Relatório</button> 
			</form>
			<br>
			<form method="POST" enctype="multipart/form-data">
			<h1 style="text-align: center;font-weight: normal;display: inline-block;margin-left: 9%;">Relatório de Operadores Cadastrados:</h1>
			<button class="relatorio2" style="cursor: pointer;width: 10%;height: 40px;margin-bottom: 10px;margin-left: 9%;display: inline-block;font-size: 15px;">Gerar Relatório</button> 
			</form>
			<br>
			<form method="POST" enctype="multipart/form-data">
			<h1 style="text-align: center;font-weight: normal;display: inline-block;margin-left: 9%;">Relatório de Lançamentos (detalhado)  de Sacolas por Operação:</h1>
			<button class="relatorio3" style="cursor: pointer;width: 10%;height: 40px;margin-bottom: 10px;margin-left: 9%;display: inline-block;font-size: 15px;">Gerar Relatório</button> 
			</form>
			<br>
			<form method="POST" enctype="multipart/form-data">
			<h1 style="text-align: center;font-weight: normal;display: inline-block;margin-left: 9%;">Relatório de Comparação de Sacolas: Lançamento vs Venda</h1>
			<button class="relatorio4" style="cursor: pointer;width: 10%;height: 40px;margin-bottom: 10px;margin-left: 9%;display: inline-block;font-size: 15px;">Gerar Relatório</button> 
			</form>
		</div>
	


	

	
<?php endif; ?>
	


	<!--<script type="text/javascript" src="//code.jquery.com/jquery-3.6.0.min.js"></script>-->
	<script src="js/jquery-3.6.3.js"></script>
	
	<script type="text/javascript">
		$('.relatorio').click(function(){
			window.open('gerar_planilha.php');
			
		});

		$('.relatorio2').click(function(){
			window.open('gerar_planilha2.php');
			
		});

		$('.relatorio3').click(function(){
			window.open('gerar_planilha3.php');
			
		});

		$('.relatorio4').click(function(){
			window.open('gerar_planilha4.php');
			
		});
		
	</script>
	<script type="text/javascript">

		
			Date.prototype.toDateInputValue = (function() {
			    var local = new Date(this);
			    local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
			    return local.toJSON().slice(0,10);
			});
			$(document).ready( function() {
			    $('.data_input').val(new Date().toDateInputValue());
			});


				$(document).ready(function(){
					$(".editar").click(function(){
						alert("Em breve isso vai funcionar!");
					});
				});
			
		$(document).ready(function(){
			var link = $(".menu li a");
			link.on("click", function(){
				var seletor = $(this).attr("href");
				var posicao = $(seletor).offset().top;
				$("html, body").animate({scrollTop: posicao-20}, 2000);
			})
			
			$("#info1 img").click(function(){
				$(".conteudo").toggle();
				
			});
			$("#info2 img").click(function(){
				$(".conteudo2").toggle();
				
			});
			$("#info3 img").click(function(){
				$(".conteudo3").toggle();
				
			});
			$("#info4 img").click(function(){
				$(".conteudo4").toggle();
				
			});
			$("#info5 img").click(function(){
				$(".conteudo5").toggle();
				
			});
			$("#info6 img").click(function(){
				$(".conteudo6").toggle();
				
			});
			$("#info7 img").click(function(){
				$(".conteudo7").toggle();
				
			});
			$("#info8 img").click(function(){
				$(".conteudo8").toggle();
				
			});

			$("#info9 img").click(function(){
				$(".conteudo9").toggle();
				
			});


			$("#info10 img").click(function(){
				$(".conteudo10").toggle();
				
			});

			$("#info11 img").click(function(){
				$(".conteudo11").toggle();
				
			});

			$("#info12 img").click(function(){
				$(".conteudo12").toggle();
				
			});

		});
	</script>
	<script>
		function cont(){
		   var conteudo = document.getElementById('print').innerHTML;
		   tela_impressao = window.open();
		   tela_impressao.document.write(conteudo);
		   tela_impressao.window.print();
		   tela_impressao.window.close();
		}
	</script>
</body>
</html>

<?php
	include 'footer.php';
?>