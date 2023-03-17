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
	<script src="js/jquery-3.6.3.js"></script>
</head>
<body>
	
	<?php if ($adm == 2): ?>
		<div class="menu">
			<ul>
				<li class="active"><a href="index.php">Home</a></li>
				<li><a href="cadastro.php">Cadastrar Operadores</a></li>
				<li><a href="cadastrados.php">Operadores Cadastrados</a></li>
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
				<li><a href="cadastrados.php">Operadores Cadastrados</a></li>
				<li><a href="lancamento.php">Lançamentos</a></li>
				<div class="sobre"><li><a href="login2.php">Logout</a></li></div>
			</ul>
			<div class="clear"></div>
		</div><!--menu-->
	<?php endif; ?>

	<section id="" class="box-info">
		<div id="info1" class="info">
			<p>Operadores Cadastrados</p>
			<img src="images/seta.png">
		</div><!--info-->
		<div class="conteudo">
			<table>
				<?php
					 $listagem = $conn->prepare("SELECT operador, nome FROM cadastro_op");
					 $listagem->execute();
					 while($lista = $listagem->fetch(PDO::FETCH_ASSOC)):
				?>

				<tr>
					<th></th>
				    <th>Operador</th>
				    <th>Nome</th>
				</tr>
				<tr>
				  	<td style="text-align: center;">
				  		<form class="form-lancamento" method="post" action="excluirOperador.php">
				  			<div id="modal" class="editar-operador-modal">
				  				<img style="float: right; cursor: pointer; margin: 1%;" src="images/erro.png">
				  				<div class="clear"></div>
				  				<br>
								<div style="margin: 1%;" class=" box-lancamento">
									<h2 >Editar Operador</h2>
									<label>Operador:</label>
									<input type="number" name="operador" placeholder="Digite o número do operador..." >
									<p style="text-align: left; font-size: 11px;">*O operador do colaborador são os 4 últimos números de sua matrícula.</p>
									<label>Nome:</label>
									<input type="text" name="nome" placeholder="Digite o nome do operador..." >
									<p style="text-align: left; font-size: 11px;">*Digite todo nome em "maiúsculo".</p>
									<input type="submit" name="editarOperador" value="Editar">
						
								</div>
							</div>
				  			<input type="checkbox" name="valorOperador" value="<?php echo $lista["operador"];?>">
				  	</td>
				    <td><?php echo $lista["operador"];?></td>
				    <td><?php echo $lista["nome"];?></td>
				    <td style="text-align: center;">
				    		<input style="background-image: url(images/excluir.png); background-repeat: no-repeat; background-size: 100%; width: 24px; height: 24px; border: none; cursor: pointer;" type="submit" name="excluir" value="">
				    </td>
				    <td style="text-align: center;">
				    		<input class="abrirModal" style="background-image: url(images/editar.png); background-repeat: no-repeat; background-size: 100%; width: 24px; height: 24px; border: none; cursor: pointer;" type="button" name="" value="">
				    	</form>		
				    </td>
				</tr>

			  	<?php
					endwhile; 
				?>
			</table>
		</div>

	</section>
	<script>
		$(".abrirModal").click(function(){
			$(".editar-operador-modal").show();
				
		});

		$("#modal img").click(function(){
			$(".editar-operador-modal").hide();
				
		});
	</script>
</body>
</html>

<?php
	include  'footer.php'; 
?>