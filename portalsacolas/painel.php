<?php  
	session_start();
	if (isset($_SESSION["usuario"])) {
		$adm = $_SESSION["usuario"][1];
		$nome = $_SESSION["usuario"][0];
	}else{
		echo "<script>window.location = 'login.php'</script>";
	}
	include 'header.php';
	include 'conexao.php';
?>
<!DOCTYPE html>
<html>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Painel - <?php echo $nome; ?></title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="faixa">
		<h2><img src="images/icon.png">Control Panel</h2>
		<h4>Bem-vindo!!</h4>
	</div><!--faixa-->
	<?php if ($adm): ?>
	<div class="menu">
				<ul>
				<li class="scroll"><a href="#lancamentos">Lançamentos</a></li>
					<li class="scroll"><a href="#preventiva">Cont. Preventiva</a></li>
					<li class="scroll"><a href="#usuarios">Usuários</a></li>
					<li class="scroll"><a href="#Perdas">Perdas</a></li>
					<li class="scroll"><a href="#sacolas">Estoque Sacolas</a></li>
					<li class="scroll"><a href="#sacolas_vendidas">Vendas</a></li>
					<li class="scroll"><a href="#relatorios">Relatórios</a></li>
					<div class="sobre2"><li><a href="logout.php">Logout</a></li></div>
				</ul>
				<div class="clear"></div>
	</div><!--menu-->
	<section class="box">
		<div style="background: #a400f0" class="caixa">
			<p>Quantidade de Sacolas no Estoque:</p>
			<span style="font-size: 23px;">
				<?php
				$listagem = $conn2->prepare("SELECT quantidade FROM contagem_sacolas_estoque");
				$listagem->execute(); 
				while($lista = $listagem->fetch(PDO::FETCH_ASSOC)){
					echo "$lista[quantidade]" . " Fardos";
				}
			 ?>
			</span>
			
		</div><!--caixa-->
		<div style="background: #021bfa" class="caixa">
			<p>Contagem Preventiva F. Caixa:</p>
			<span style="font-size: 23px;" id="quantidade2">
				<?php
				$listagem = $conn2->prepare("SELECT quantidade FROM contagem_preventiva");
				$listagem->execute(); 
				while($lista = $listagem->fetch(PDO::FETCH_ASSOC)){
					echo "$lista[quantidade]" . " Fardos";
				}
			 ?>
			</span>
		</div><!--caixa-->

		<div style="background: #ff0022" class="caixa">
			<p>Valor Total obtido em Estoque:</p>
			<span style="font-size: 23px;">
				<?php
				$listagem = $conn2->prepare("SELECT * FROM contagem_sacolas_estoque");
				$listagem->execute(); 
				while($lista = $listagem->fetch(PDO::FETCH_ASSOC)){
					$valor = $lista["valor"];
					$quant = $lista["quantidade"];
					echo "R$ " . 0.17 * ($quant * 250);
					
				}
			 ?>
			</span>
		</div><!--caixa-->
		<div style="background: #00fcc2" class="caixa">
			<p>Ajuste do último inventário:</p>
			<span style="font-size: 23px;">
				<?php
				$listagem = $conn2->prepare("SELECT quantidade FROM contagem_inventario");
				$listagem->execute(); 
				while($lista = $listagem->fetch(PDO::FETCH_ASSOC)){
					echo "$lista[quantidade]";
				}
			 ?>
			</span>
		</div><!--caixa-->
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

				$data = $_POST['data'];
				$listagem = $conn2->prepare("SELECT SUM(total) as soma_total FROM sacolas_dezembro WHERE data = '$data'");
				$listagem->execute();
					$row = $listagem->fetch(); 
					echo "$row[soma_total]". " Sacolas";
					echo "  / ";
					echo ($row['soma_total'] / 250) . " Fardos";
				}
			 ?>
			 <form method="post">
					<input class ="data_input"; style="width: 40%;height: 30px;margin: 10px 12%;display: inline-block;font-size: 15px;" type="date" name="data">
					<input style="width: 20%;height: 30px;margin: 10px 0%;cursor:pointer;display: inline-block;font-size: 15px;" type="submit" name="procurar2" value="Procurar">
				</form>
			</p>
</div><!--caixa-->
	</section><!--box-->

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
			     <form method="post">
			    	<td><button name="excluir" style="margin: 0 25%; width:80px; height: 30px;">Excluir</button></td>
				 </form>
			  </tr>

		  	<?php
				endwhile; 
			?>
			<?php
				if (isset($_POST['excluir'])) {
					$listagem = $conn->prepare("SELECT * FROM cadastro_op");
				 	$listagem->execute();
				 	$row = $listagem->fetch();
				 	$Operador = $row['operador'];
					$Nome = $row['nome'];
					try{
						$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						$sql = "DELETE  FROM  cadastro_op WHERE operador = '$Operador' AND nome = '$Nome'";
						$conn->exec($sql);
					}catch(PDOException $e) {
						echo $sql . "<br>" . $e->getMessage();
					}	
				}

			?>
		</table>
		</div>
		
		
	</section><!--op-cadastrados-->


	<section id="lancamentos" class="box-info">
		<div id="info2" class="info">
			<p>Lançamentos por Data</p>
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
			<p>Lançamentos de Operação por Data</p>
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
	</section><!--lancamentos-->

	<section id="preventiva" class="box-info">
		<div id="info3" class="info">
			<p>Contagem Preventiva</p>
			<img src="images/seta.png">
		</div><!--info-->
		<div class="conteudo3">
			<div class="">
			<img style="width: 25%; margin: 10px 35.5%" src="images/logo.png">
			<form method="post" class="form">
			<input class ="data_input"; style="width: 25%;height: 40px;margin: 10px 10px 3% 9%;display: inline-block;font-size: 15px;" type="date" name="data_contagem" placeholder="Insira a Data da Contagem...">
			<input style=" padding-left: 10px;width: 25%;height: 40px;margin: 10px 2%;display: inline-block;font-size: 15px;" type="number" name="quantidade" placeholder="Insira a Quantidade Contada...">
			<input style="width: 20%;height: 40px;margin: 10px 7.5%;display: inline-block;font-size: 15px;" type="submit" name="Lançar_contagem" value="Lançar">
		</form>
		</div>
		</div>
		<?php 
			if (isset($_POST['Lançar_contagem'])) {
				$sql = "CREATE TABLE IF NOT EXISTS contagem_preventiva( id INT  PRIMARY KEY, quantidade TEXT NOT NULL, data_contagem DATE NOT NULL, created DATETIME NOT NULL)";
					$conn2->exec($sql);
				if(!$sql === false){
					$Data = $_POST['data_contagem'];
					$Contagem = $_POST['quantidade'];
					try{
						$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						$sql = "INSERT INTO contagem_preventiva(id, quantidade, data_contagem, created) VALUES('1', '$Contagem', '$Data', NOW())";
						$conn2->exec($sql);
					}catch(PDOException $e) {
				 	 	
					}

					$Contagem2 = $_POST['quantidade'];
					try{
						$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						$sql = "UPDATE contagem_preventiva SET quantidade = '$Contagem2' WHERE id = '1'";
						$conn2->exec($sql);
					}catch(PDOException $e) {
				 	 	echo $sql . "<br>" . $e->getMessage();
					}
				}
			}
		 ?>
	</section><!--contagem-preventiva-->

	<section id="usuarios" class="box-info">
		<div id="info5" class="info">
			<p>Cadastro de Usuários ( ADM )</p>
			<img src="images/seta.png">
		</div><!--info-->
		<div class="conteudo5">
			 <div style="height: auto;" class="container">
	 	<img  src="images/logo.png">
	 	<div class="msg">
	 	<?php
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
	 	<form class="form" method="post">
	 		<label>Usuário</label>
			<input style="padding-left: 10px;" type="text" name="usuario" placeholder="Digite o usuario a ser Cadastrado..." required>
			<label>Nome</label>
			<input style="padding-left: 10px;" type="text" name="nome" placeholder="Digite o nome do Usuário a ser Cadastrado..." required>
			<label>N° Adm</label>
			<input style="padding-left: 10px;" type="text" name="adm" placeholder="Digite o id do Usuário a ser Cadastrado..." required>
			<label>Senha</label>
			<input style="padding-left: 10px;width: 90%;height: 40px;margin: 20px 5%;padding-left: 10px;display: block;font-size: 15px;" type="password" name="senha" placeholder="Digite sua Senha..." required>
			<input type="submit" name="Cadastrar_usuario" value="Cadastrar">
		</form>
	 </div><!--container-->
		</div>	
	</section><!--relatorios-->

	<section id="usuarios" class="box-info">
		<div id="info12" class="info">
			<p>Cadastro de Usuários (Lançamentos)</p>
			<img src="images/seta.png">
		</div><!--info-->
		<div class="conteudo12">
			 <div style="height: auto;" class="container">
	 	<img  src="images/logo.png">
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
		 ?>
	 	</div>
	 	<form class="form" method="post">
	 		<label>Usuário</label>
			<input style="padding-left: 10px;" type="text" name="usuario" placeholder="Digite o usuario a ser Cadastrado..." required>
			<label>Nome</label>
			<input style="padding-left: 10px;" type="text" name="nome" placeholder="Digite o nome do Usuário a ser Cadastrado..." required>
			<label>N° Adm</label>
			<input style="padding-left: 10px;" type="text" name="adm" placeholder="Digite o id do Usuário a ser Cadastrado..." required>
			<label>Senha</label>
			<input style="padding-left: 10px;width: 90%;height: 40px;margin: 20px 5%;padding-left: 10px;display: block;font-size: 15px;" type="password" name="senha" placeholder="Digite sua Senha..." required>
			<input type="submit" name="Cadastrar_usuario2" value="Cadastrar">
		</form>
	 </div><!--container-->
		</div>	
	</section><!--relatorios-->

	<section id="" class="box-info">
		<div id="info8" class="info">
			<p>Usuários Cadastrados</p>
			<img src="images/seta.png">
		</div><!--info-->
		<div class="conteudo8">
			<table>
			<?php
				 $listagem = $conn->prepare("SELECT * FROM cadastro_usuarios");
				 $listagem->execute();
				 while($lista = $listagem->fetch(PDO::FETCH_ASSOC)):
			?>
			  <tr>
			    <th>ID</th>
			    <th>Usuário</th>
			    <th>Nome</th>
			    <th>Adm</th>
			  </tr>
			  <tr>
			    <td><?php echo $lista["id"];?></td>
			    <td><?php echo $lista["usuario"];?></td>
			    <td><?php echo $lista["nome"];?></td>
			    <td><?php echo $lista["adm"];?></td>
			    <td><button name="excluir" style="margin: 0 30%; width:80px; height: 30px;">Excluir</button></td>
			  </tr>
		  	<?php
				endwhile; 
			?>
		</table>
		</div>
		
	</section><!--op-cadastrados-->

	<section id="Perdas" class="box-info">
		<div id="info6" class="info">
			<p>Perda do Útimo inventário</p>
			<img src="images/seta.png">
		</div><!--info-->
		<div class="conteudo6">
			<form method="post">
			<input style="padding-left: 10px;width: 50%;height: 40px;margin: 10px 9%;display: inline-block;font-size: 15px;" type="text" name="quantidade_inventario" placeholder="Insira o Valor (R$) da Perda...">
			<input style="width: 20%;height: 40px;margin: 10px 4%;display: inline-block;font-size: 15px;" type="submit" name="Lançar_inventario" value="Lançar">
		</form>
		</div>
		<?php 
			if (isset($_POST['Lançar_inventario'])) {
				$sql = "CREATE TABLE IF NOT EXISTS contagem_inventario( id INT  PRIMARY KEY, quantidade TEXT NOT NULL, created DATETIME NOT NULL)";
					$conn2->exec($sql);
				if(!$sql === false){
					$Contagem = $_POST['quantidade_inventario'];
					try{
						$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						$sql = "INSERT INTO contagem_inventario(id, quantidade, created) VALUES('1', '$Contagem', NOW())";
						$conn2->exec($sql);
					}catch(PDOException $e) {
				 	 	echo $sql . "<br>" . $e->getMessage();
					}

					$Contagem2 = $_POST['quantidade_inventario'];
					try{
						$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						$sql = "UPDATE contagem_inventario SET quantidade = '$Contagem2' WHERE id = '1'";
						$conn2->exec($sql);
					}catch(PDOException $e) {
				 	 	echo $sql . "<br>" . $e->getMessage();
					}
				}
			}
		 ?>
	</section><!---->


	<section id="sacolas" class="box-info">
		<div id="info7" class="info">
			<p>Sacolas em Estoque</p>
			<img src="images/seta.png">
		</div><!--info-->
		<div class="conteudo7">
			<div class="">
			<img style="width: 25%; margin: 10px 35.5%" src="images/logo.png">
				<form method="post" class="form">
					<input style="padding-left: 10px;width: 25%;height: 40px;margin: 10px 10px 3% 9%;display: inline-block;font-size: 15px;" type="number" name="quantidade_sacolas" placeholder="Insira a Quantidade de Sacolas em Estoque...">
					<input style="padding-left: 10px;width: 25%;height: 40px;margin: 10px 10px 3% 9%;display: inline-block;font-size: 15px;"  type="text" name="valor" placeholder="Insira o Valor Atual das Sacolas...">
					<input style="width: 15%;height: 40px;margin: 10px 7%;display: inline-block;font-size: 15px;" type="submit" name="Lançar_quantidade_sacolas"  value="Lançar">
				</form>
			</div>
		</div>
		<?php 
			if (isset($_POST['Lançar_quantidade_sacolas'])) {
				$sql = "CREATE TABLE IF NOT EXISTS contagem_sacolas_estoque( id INT  PRIMARY KEY, quantidade TEXT NOT NULL, valor TEXT NOT NULL, created DATETIME NOT NULL)";
					$conn2->exec($sql);
				if(!$sql === false){
					$valor = $_POST['valor'];
					$Contagem = $_POST['quantidade_sacolas'];
					try{
						$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						$sql = "INSERT INTO contagem_sacolas_estoque(id, quantidade, valor, created) VALUES('1', '$Contagem', '$valor', NOW())";
						$conn2->exec($sql);
					}catch(PDOException $e) {
				 	 	echo $sql . "<br>" . $e->getMessage();
					}

					$valor2 = $_POST['valor'];
					$Contagem2 = $_POST['quantidade_sacolas'];
					try{
						$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						$sql = "UPDATE contagem_sacolas_estoque SET quantidade = '$Contagem2' WHERE id = '1'";
						$conn2->exec($sql);
					}catch(PDOException $e) {
				 	 	echo $sql . "<br>" . $e->getMessage();
					}
				}
				

			}
		 ?>
	</section>

	<section id="sacolas_vendidas" class="box-info">
		<div id="info9" class="info">
			<p>Sacolas Vendidas por Operador</p>
			<img src="images/seta.png">
		</div><!--info-->
		<div class="conteudo9">
			<h1 style="text-align: center;font-weight: normal;">Faça aqui o Upload do Arquivo XML:</h1>
			<br>
			<form method="POST" enctype="multipart/form-data">
			<input style="cursor: pointer;padding-left: 0px;width: %;height: 30px;margin-left:9%;display: inline-block;font-size: 17px;" type="file" name="arquivo"><br><br>
			<input style="cursor: pointer;width: 25%;height: 40px;margin-bottom: 10px;margin-left: 9%;display: inline-block;font-size: 15px;" type="submit" name="enviar_arquivo" value="Enviar">
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

		 <section id="relatorios" class="box-info">
		<div id="info10" class="info">
			<p>Relatórios</p>
			<img src="images/seta.png">
		</div><!--info-->
		<div class="conteudo10">
			<form method="POST" enctype="multipart/form-data">
			<h1 style="text-align: center;font-weight: normal;display: inline-block;margin-left: 9%;">Relatório de Lançamentos de Sacolas:</h1>
			<button class="relatorio" style="cursor: pointer;width: 10%;height: 40px;margin-bottom: 10px;margin-left: 9%;display: inline-block;font-size: 15px;">Gerar Relatório</button> 
			</form>
			<br>
			<form method="POST" enctype="multipart/form-data">
			<h1 style="text-align: center;font-weight: normal;display: inline-block;margin-left: 9%;">Relatório de Operadores Cadastrados:</h1>
			<button class="relatorio2" style="cursor: pointer;width: 10%;height: 40px;margin-bottom: 10px;margin-left: 9%;display: inline-block;font-size: 15px;">Gerar Relatório</button> 
			</form>
			<br>
			<form method="POST" enctype="multipart/form-data">
			<h1 style="text-align: center;font-weight: normal;display: inline-block;margin-left: 9%;">Relatório de Lançamentos de Sacolas por Operação:</h1>
			<button class="relatorio3" style="cursor: pointer;width: 10%;height: 40px;margin-bottom: 10px;margin-left: 9%;display: inline-block;font-size: 15px;">Gerar Relatório</button> 
			</form>
		</div>
<?php endif; ?>





















<?php if ($adm == 0): ?>
	<div class="menu">
				<ul>
					<li class="scroll"><a href="#lancamentos">Lançamentos</a></li>
					<li class="scroll"><a href="#sacolas">Estoque Sacolas</a></li>
					<li class="scroll"><a href="#sacolas_vendidas">Sacolas Vendidas</a></li>
					<li class="scroll"><a href="#relatorios">Relatórios</a></li>
					<div class="sobre2"><li><a href="logout.php">Logout</a></li></div>
				</ul>
				<div class="clear"></div>
	</div><!--menu-->
	<section class="box">
		<div style="background: #a400f0" class="caixa">
			<p>Quantidade de Sacolas no Estoque:</p>
			<span style="font-size: 23px;">
				<?php
				$listagem = $conn2->prepare("SELECT quantidade FROM contagem_sacolas_estoque");
				$listagem->execute(); 
				while($lista = $listagem->fetch(PDO::FETCH_ASSOC)){
					echo "$lista[quantidade]" . " Fardos";
				}
			 ?>
			</span>
			
		</div><!--caixa-->
		<div style="background: #021bfa" class="caixa">
			<p>Contagem Preventiva F. Caixa:</p>
			<span style="font-size: 23px;" id="quantidade2">
				<?php
				$listagem = $conn2->prepare("SELECT quantidade FROM contagem_preventiva");
				$listagem->execute(); 
				while($lista = $listagem->fetch(PDO::FETCH_ASSOC)){
					echo "$lista[quantidade]" . " Fardos";
				}
			 ?>
			</span>
		</div><!--caixa-->

		<div style="background: #ff0022" class="caixa">
			<p>Valor Total obtido em Estoque:</p>
			<span style="font-size: 23px;">
				<?php
				$listagem = $conn2->prepare("SELECT * FROM contagem_sacolas_estoque");
				$listagem->execute(); 
				while($lista = $listagem->fetch(PDO::FETCH_ASSOC)){
					$valor = $lista["valor"];
					$quant = $lista["quantidade"];
					echo "R$ " . 0.17 * ($quant * 250);
					
				}
			 ?>
			</span>
		</div><!--caixa-->
		<div style="background: #00fcc2" class="caixa">
			<p>Ajuste do último inventário:</p>
			<span style="font-size: 23px;">
				<?php
				$listagem = $conn2->prepare("SELECT quantidade FROM contagem_inventario");
				$listagem->execute(); 
				while($lista = $listagem->fetch(PDO::FETCH_ASSOC)){
					echo "$lista[quantidade]";
				}
			 ?>
			</span>
		</div><!--caixa-->
			<div style=" background: #EE7410; width: 80%;height: 200px;margin-left: 10.2%;margin-top: 10px;border: 2px solid black;display: block;border-radius: 50px;" class="caixa" id="total_venda">
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

				$data = $_POST['data'];
				$listagem = $conn2->prepare("SELECT SUM(total) as soma_total FROM sacolas_dezembro WHERE data = '$data'");
				$listagem->execute();
					$row = $listagem->fetch(); 
					echo "$row[soma_total]". " Sacolas";
					echo "  / ";
					echo ($row['soma_total'] / 250) . " Fardos";
				}
			 ?>
			 <form method="post">
					<input class ="data_input"; style="width: 40%;height: 30px;margin: 10px 12%;display: inline-block;font-size: 15px;" type="date" name="data">
					<input style="width: 20%;height: 30px;margin: 10px 0%;cursor:pointer;display: inline-block;font-size: 15px;" type="submit" name="procurar2" value="Procurar">
				</form>
			</p>
</div><!--caixa-->
	</section><!--box-->
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
			      <form method="post">
			    	<td><button name="excluir" style="margin: 0 25%; width:80px; height: 30px;">Excluir</button></td>
			 </form>
			  </tr>
		  	<?php
				endwhile; 
			?>
			<?php
				if (isset($_POST['excluir'])) {
					$listagem = $conn->prepare("SELECT * FROM cadastro_op");
				 	$listagem->execute();
				 	$row = $listagem->fetch();
				 	$Operador = $row['operador'];
					$Nome = $row['nome'];
					try{
						$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						$sql = "DELETE  FROM  cadastro_op WHERE operador = '$Operador' AND nome = '$Nome'";
						$conn->exec($sql);
					}catch(PDOException $e) {
						echo $sql . "<br>" . $e->getMessage();
					}	
				}

?>
		</table>
		</div>
		
	</section><!--op-cadastrados-->

	<section id="lancamentos" class="box-info">
		<div id="info2" class="info">
			<p>Lançamentos por Data</p>
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
<section id="preventiva" class="box-info">
		<div id="info3" class="info">
			<p>Contagem Preventiva</p>
			<img src="images/seta.png">
		</div><!--info-->
		<div class="conteudo3">
			<div class="">
			<img style="width: 25%; margin: 10px 35.5%" src="images/logo.png">
			<form method="post" class="form">
			<input class ="data_input"; style="width: 25%;height: 40px;margin: 10px 10px 3% 9%;display: inline-block;font-size: 15px;" type="date" name="data_contagem" placeholder="Insira a Data da Contagem...">
			<input style=" padding-left: 10px;width: 25%;height: 40px;margin: 10px 2%;display: inline-block;font-size: 15px;" type="number" name="quantidade" placeholder="Insira a Quantidade Contada...">
			<input style="width: 20%;height: 40px;margin: 10px 7.5%;display: inline-block;font-size: 15px;" type="submit" name="Lançar_contagem" value="Lançar">
		</form>
		</div>
		</div>
		<?php 
			if (isset($_POST['Lançar_contagem'])) {
				$sql = "CREATE TABLE IF NOT EXISTS contagem_preventiva( id INT , quantidade TEXT NOT NULL, data_contagem DATE NOT NULL, created DATETIME NOT NULL)";
					$conn2->exec($sql);
				if(!$sql === false){
					$Data = $_POST['data_contagem'];
					$Contagem = $_POST['quantidade'];
					try{
						$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						$sql = "INSERT INTO contagem_preventiva(id, quantidade, data_contagem, created) VALUES('1', '$Contagem', '$Data', NOW())";
						$conn2->exec($sql);
					}catch(PDOException $e) {
				 	 	
					}

					$Contagem2 = $_POST['quantidade'];
					try{
						$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						$sql = "UPDATE contagem_preventiva SET quantidade = '$Contagem2' WHERE id = '1'";
						$conn2->exec($sql);
					}catch(PDOException $e) {
				 	 	echo $sql . "<br>" . $e->getMessage();
					}
				}
			}
		 ?>
	</section><!--contagem-preventiva-->

	<section id="sacolas_vendidas" class="box-info">
		<div id="info9" class="info">
			<p>Sacolas Vendidas por Data</p>
			<img src="images/seta.png">
		</div><!--info-->
		<div class="conteudo9">
			<form method="post">
			<input class ="data_input"; style="width: 50%;height: 40px;margin: 10px 9%;display: inline-block;font-size: 15px;" type="date" name="data">
			<input class="procurar" style="width: 20%;height: 40px;margin: 10px 4%;display: inline-block;font-size: 15px;" type="submit" name="procurar2" value="Procurar">
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
		<table>
			<?php
					if (isset($_POST['procurar2'])) {
						$data = $_POST['data'];
						$listagem = $conn2->prepare("SELECT * FROM sacolas_vendidas_por_operador_exel WHERE data = '$data'");
						$listagem->execute();
						while($lista = $listagem->fetch(PDO::FETCH_ASSOC)){
							echo "<tr><th>Operador</th><th>Nome</th><th>Quantidade_Vendida</th></tr>";
							echo "<tr><td>$lista[operador]</td><td>$lista[nome]</td><td>$lista[quantidade]</td>";

						}
						
						
					}
			?>
			  
		</table>
		</div>
	</section><!--lancamentos-->

	<section id="relatorios" class="box-info">
		<div id="info10" class="info">
			<p>Relatórios</p>
			<img src="images/seta.png">
		</div><!--info-->
		<div class="conteudo10">
			<form method="POST" enctype="multipart/form-data">
			<h1 style="text-align: center;font-weight: normal;display: inline-block;margin-left: 9%;">Relatório de Lançamentos de Sacolas:</h1>
			<button class="relatorio" style="cursor: pointer;width: 10%;height: 40px;margin-bottom: 10px;margin-left: 9%;display: inline-block;font-size: 15px;">Gerar Relatório</button> 
			</form>
			<br>
			<form method="POST" enctype="multipart/form-data">
			<h1 style="text-align: center;font-weight: normal;display: inline-block;margin-left: 9%;">Relatório de Operadores Cadastrados:</h1>
			<button class="relatorio2" style="cursor: pointer;width: 10%;height: 40px;margin-bottom: 10px;margin-left: 9%;display: inline-block;font-size: 15px;">Gerar Relatório</button>
			</form>
			<br>
			<form method="POST" enctype="multipart/form-data">
			<h1 style="text-align: center;font-weight: normal;display: inline-block;margin-left: 9%;">Relatório de Lançamentos de Sacolas por Operação:</h1>
			<button class="relatorio3" style="cursor: pointer;width: 10%;height: 40px;margin-bottom: 10px;margin-left: 9%;display: inline-block;font-size: 15px;">Gerar Relatório</button> 
			</form>		</div>
			<br>
			<!--
			<form method="POST" enctype="multipart/form-data">
			<h1 style="text-align: center;font-weight: normal;display: inline-block;margin-left: 9%;">Relatório de Lançamentos de Sacolas por Operação:</h1>
			<button class="relatorio4" style="cursor: pointer;width: 10%;height: 40px;margin-bottom: 10px;margin-left: 9%;display: inline-block;font-size: 15px;">Gerar Relatório</button> 
			</form>		</div>-->
<?php endif; ?>
	


	<script type="text/javascript" src="//code.jquery.com/jquery-3.6.0.min.js"></script>
	
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
</body>
</html>

<?php
	include 'footer.php';
?>