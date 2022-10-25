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
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<title></title>
 </head>
 <body>
 	<div class="faixa">
		<h2>Bem-vindo!!</h2>
		<h4><?php echo($nome) ?></h4>
	</div><!--faixa-->
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
	<?php endif; ?>
	<div style=" background: #021bfa; width: 80%;height: 150px;margin-left: 10.2%;border: 2px solid black;display: block;border-radius: 50px;" class="caixa" id="total_venda">
			<p> 
				<?php
				echo "Total de Sacolas Vendidas em: "; 
				if (isset($_POST['procurar'])) {
					$data = $_POST['data'];
					echo $data;
				}
				 ?>
			</p>
			<p  style="font-size: 23px; text-align: center;" id="quantidade2">
				<?php
				if (isset($_POST['procurar'])) {

				$data = $_POST['data'];
				$listagem = $conn2->prepare("SELECT SUM(total) as soma_total FROM sacolas_janeiro WHERE data = '$data'");
				$listagem->execute();
					$row = $listagem->fetch(); 
					echo "$row[soma_total]". " Sacolas";
					echo "  / ";
					echo ($row['soma_total'] / 250) . " Fardos";
				}
			 ?>
			</p>
</div><!--caixa-->
	
 	<section id="lancamentos" class="box-info">
		<div id="info2" class="info">
			<p>Lançamentos por Data</p>
			<img src="images/seta.png">
		</div><!--info-->
		<div class="conteudo2">
			<form method="post">
			<input class ="data_input"; style="cursor:pointer;width: 50%;height: 40px;margin: 10px 9%;display: inline-block;font-size: 15px;" type="date" name="data">
			<input style="cursor:pointer;width: 20%;height: 40px;margin: 10px 4%;display: inline-block;font-size: 15px;" type="submit" name="procurar" value="Procurar">
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
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
	<script type="text/javascript">
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
