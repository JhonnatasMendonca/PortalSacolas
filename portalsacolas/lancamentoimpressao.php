<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<script src="js/jquery-3.6.3.js"></script>
 	<!--<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>-->
</head>
<body>
	<section id="lancamentos" class="box-info">
		<div id="info2" class="info">
			<p>Lançamentos por Data</p>
			<img src="images/seta.png">
		</div><!--info-->
		<div>
			<form method="post">
				<input class ="data_input"; style="cursor:pointer;width: 50%;height: 40px;margin: 10px 9%;display: inline-block;font-size: 15px;" type="date" name="data">
				<input style="cursor:pointer;width: 15%;height: 40px;margin: 10px 2%;display: inline-block;font-size: 15px;" type="submit" name="procurar" value="Procurar">
				<a href="">
					<img onclick="cont();" class="impressora" src="images/impressora.png">
				</a>
			</form>

			<div id="print" class="conteudo">
				<table>
					<?php
						if (isset($_POST['procurar'])) {
							$data_mes = date('m');
							if ($data_mes == 1){
								$data = $_POST['data'];
								$listagem = $conn2->prepare("SELECT * FROM sacolas_janeiro WHERE data = '$data' ORDER BY operador ASC");
								$listagem->execute();
								while($lista = $listagem->fetch(PDO::FETCH_ASSOC)):
					?>
					<tr>
					    <th></th>
					    <th>Operador</th>
					    <th>Nome</th>
					    <th>Retirada</th>
					    <th>Devolvida</th>
					    <th>Total</th>
					    <th>Data e Hora</th>
					</tr>
					<tr>
						<td style="text-align: center;">
						    <form class="form-lancamento" method="post" action="editarLancamento.php">
							  	<!-- <div id="modal" class="editar-operador-modal">
							  		<img style="float: right; cursor: pointer; margin: 1%;" src="images/erro.png">
							  		<div class="clear"></div>
							  		<br>
									<div style="margin: 1%;" class=" box-lancamento">
										<h2 >Editar Lançamento</h2>
										<label>Retirada:</label>
										<input type="number" name="novaRetirada" placeholder="Digite o número do operador..." >
										<p style="text-align: left; font-size: 11px;">*O operador do colaborador são os 4 últimos números de sua matrícula.</p>
										<label>Devolvida:</label>
										<input type="number" name="novaDevolucao" placeholder="Digite o nome do operador..." >
										<p style="text-align: left; font-size: 11px;">*Digite todo nome em "maiúsculo".</p>
											<input type="submit" name="editarLancamento" value="Editar">
									</div>
								</div> -->
						    	<input type="radio"  name="valorId" value="<?php echo $lista["id"];?>">
					    </td>
					    <td><?php echo $lista["operador"];?></td>
					    <td><?php echo $lista["nome"];?></td>
					    <td><?php echo $lista["retirada"];?></td>
					    <td><?php echo $lista["devolvidas"];?></td>
					    <td><?php echo $lista["total"];?></td>
					    <td><?php echo $lista["created"];?></td>
					    <td style="text-align: center;">
						    <input style="background-image: url(images/excluir.png); background-repeat: no-repeat; background-size: 100%; width: 24px; height: 24px; border: none; cursor: pointer;" type="submit" name="excluirLancamento" value="">
						</td>
						<td style="text-align: center;">
						    <input onclick="msg();" class="" style="background-image: url(images/editar.png); background-repeat: no-repeat; background-size: 100%; width: 24px; height: 24px; border: none; cursor: pointer;" type="button" name="" value="">
							</form>		
						</td>
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
								$listagem = $conn2->prepare("SELECT * FROM sacolas_fevereiro WHERE data = '$data' ORDER BY operador ASC");
								$listagem->execute();
								while($lista = $listagem->fetch(PDO::FETCH_ASSOC)):
					?>
					<tr>
					    <th></th>
					    <th>Operador</th>
					    <th>Nome</th>
					    <th>Retirada</th>
					    <th>Devolvida</th>
					    <th>Total</th>
					    <th>Data e Hora</th>
					</tr>
					<tr>
						<td style="text-align: center;">
						    <form class="form-lancamento" method="post" action="editarLancamento.php">
							  	<!-- <div id="modal" class="editar-operador-modal">
							  		<img style="float: right; cursor: pointer; margin: 1%;" src="images/erro.png">
							  		<div class="clear"></div>
							  		<br>
									<div style="margin: 1%;" class=" box-lancamento">
										<h2 >Editar Lançamento</h2>
										<label>Retirada:</label>
										<input type="number" name="novaRetirada" placeholder="Digite o número do operador..." >
										<p style="text-align: left; font-size: 11px;">*O operador do colaborador são os 4 últimos números de sua matrícula.</p>
										<label>Devolvida:</label>
										<input type="number" name="novaDevolucao" placeholder="Digite o nome do operador..." >
										<p style="text-align: left; font-size: 11px;">*Digite todo nome em "maiúsculo".</p>
											<input type="submit" name="editarLancamento" value="Editar">
									</div>
								</div> -->
						    	<input type="radio"  name="valorId" value="<?php echo $lista["id"];?>">
					    </td>
					    <td><?php echo $lista["operador"];?></td>
					    <td><?php echo $lista["nome"];?></td>
					    <td><?php echo $lista["retirada"];?></td>
					    <td><?php echo $lista["devolvidas"];?></td>
					    <td><?php echo $lista["total"];?></td>
					    <td><?php echo $lista["created"];?></td>
					    <td style="text-align: center;">
						    <input style="background-image: url(images/excluir.png); background-repeat: no-repeat; background-size: 100%; width: 24px; height: 24px; border: none; cursor: pointer;" type="submit" name="excluirLancamento" value="">
						</td>
						<td style="text-align: center;">
						    <input onclick="msg();" class="" style="background-image: url(images/editar.png); background-repeat: no-repeat; background-size: 100%; width: 24px; height: 24px; border: none; cursor: pointer;" type="button" name="" value="">
							</form>		
						</td>
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
								$listagem = $conn2->prepare("SELECT * FROM sacolas_marco WHERE data = '$data' ORDER BY operador ASC");
								$listagem->execute();
								while($lista = $listagem->fetch(PDO::FETCH_ASSOC)):
					?>
					<tr>
					    <th></th>
					    <th>Operador</th>
					    <th>Nome</th>
					    <th>Retirada</th>
					    <th>Devolvida</th>
					    <th>Total</th>
					    <th>Data e Hora</th>
					</tr>
					<tr>
						<td style="text-align: center;">
						    <form class="form-lancamento" method="post" action="editarLancamento.php">
							  	<!-- <div id="modal" class="editar-operador-modal">
							  		<img style="float: right; cursor: pointer; margin: 1%;" src="images/erro.png">
							  		<div class="clear"></div>
							  		<br>
									<div style="margin: 1%;" class=" box-lancamento">
										<h2 >Editar Lançamento</h2>
										<label>Retirada:</label>
										<input type="number" name="novaRetirada" placeholder="Digite o número do operador..." >
										<p style="text-align: left; font-size: 11px;">*O operador do colaborador são os 4 últimos números de sua matrícula.</p>
										<label>Devolvida:</label>
										<input type="number" name="novaDevolucao" placeholder="Digite o nome do operador..." >
										<p style="text-align: left; font-size: 11px;">*Digite todo nome em "maiúsculo".</p>
											<input type="submit" name="editarLancamento" value="Editar">
									</div>
								</div> -->
						    	<input type="radio"  name="valorId" value="<?php echo $lista["id"];?>">
					    </td>
					    <td><?php echo $lista["operador"];?></td>
					    <td><?php echo $lista["nome"];?></td>
					    <td><?php echo $lista["retirada"];?></td>
					    <td><?php echo $lista["devolvidas"];?></td>
					    <td><?php echo $lista["total"];?></td>
					    <td><?php echo $lista["created"];?></td>
					    <td style="text-align: center;">
						    <input style="background-image: url(images/excluir.png); background-repeat: no-repeat; background-size: 100%; width: 24px; height: 24px; border: none; cursor: pointer;" type="submit" name="excluirLancamento" value="">
						</td>
						<td style="text-align: center;">
						    <input onclick="msg();" class="" style="background-image: url(images/editar.png); background-repeat: no-repeat; background-size: 100%; width: 24px; height: 24px; border: none; cursor: pointer;" type="button" name="" value="">
							</form>		
						</td>
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
								$listagem = $conn2->prepare("SELECT * FROM sacolas_abril WHERE data = '$data' ORDER BY operador ASC");
								$listagem->execute();
								while($lista = $listagem->fetch(PDO::FETCH_ASSOC)):
					?>
					<tr>
					    <th></th>
					    <th>Operador</th>
					    <th>Nome</th>
					    <th>Retirada</th>
					    <th>Devolvida</th>
					    <th>Total</th>
					    <th>Data e Hora</th>
					</tr>
					<tr>
						<td style="text-align: center;">
						    <form class="form-lancamento" method="post" action="editarLancamento.php">
							  	<!-- <div id="modal" class="editar-operador-modal">
							  		<img style="float: right; cursor: pointer; margin: 1%;" src="images/erro.png">
							  		<div class="clear"></div>
							  		<br>
									<div style="margin: 1%;" class=" box-lancamento">
										<h2 >Editar Lançamento</h2>
										<label>Retirada:</label>
										<input type="number" name="novaRetirada" placeholder="Digite o número do operador..." >
										<p style="text-align: left; font-size: 11px;">*O operador do colaborador são os 4 últimos números de sua matrícula.</p>
										<label>Devolvida:</label>
										<input type="number" name="novaDevolucao" placeholder="Digite o nome do operador..." >
										<p style="text-align: left; font-size: 11px;">*Digite todo nome em "maiúsculo".</p>
											<input type="submit" name="editarLancamento" value="Editar">
									</div>
								</div> -->
						    	<input type="radio"  name="valorId" value="<?php echo $lista["id"];?>">
					    </td>
					    <td><?php echo $lista["operador"];?></td>
					    <td><?php echo $lista["nome"];?></td>
					    <td><?php echo $lista["retirada"];?></td>
					    <td><?php echo $lista["devolvidas"];?></td>
					    <td><?php echo $lista["total"];?></td>
					    <td><?php echo $lista["created"];?></td>
					    <td style="text-align: center;">
						    <input style="background-image: url(images/excluir.png); background-repeat: no-repeat; background-size: 100%; width: 24px; height: 24px; border: none; cursor: pointer;" type="submit" name="excluirLancamento" value="">
						</td>
						<td style="text-align: center;">
						    <input onclick="msg();" class="" style="background-image: url(images/editar.png); background-repeat: no-repeat; background-size: 100%; width: 24px; height: 24px; border: none; cursor: pointer;" type="button" name="" value="">
							</form>		
						</td>
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
								$listagem = $conn2->prepare("SELECT * FROM sacolas_maio WHERE data = '$data' ORDER BY operador ASC");
								$listagem->execute();
								while($lista = $listagem->fetch(PDO::FETCH_ASSOC)):
					?>
					<tr>
					    <th></th>
					    <th>Operador</th>
					    <th>Nome</th>
					    <th>Retirada</th>
					    <th>Devolvida</th>
					    <th>Total</th>
					    <th>Data e Hora</th>
					</tr>
					<tr>
						<td style="text-align: center;">
						    <form class="form-lancamento" method="post" action="editarLancamento.php">
							  	<!-- <div id="modal" class="editar-operador-modal">
							  		<img style="float: right; cursor: pointer; margin: 1%;" src="images/erro.png">
							  		<div class="clear"></div>
							  		<br>
									<div style="margin: 1%;" class=" box-lancamento">
										<h2 >Editar Lançamento</h2>
										<label>Retirada:</label>
										<input type="number" name="novaRetirada" placeholder="Digite o número do operador..." >
										<p style="text-align: left; font-size: 11px;">*O operador do colaborador são os 4 últimos números de sua matrícula.</p>
										<label>Devolvida:</label>
										<input type="number" name="novaDevolucao" placeholder="Digite o nome do operador..." >
										<p style="text-align: left; font-size: 11px;">*Digite todo nome em "maiúsculo".</p>
											<input type="submit" name="editarLancamento" value="Editar">
									</div>
								</div> -->
						    	<input type="radio"  name="valorId" value="<?php echo $lista["id"];?>">
					    </td>
					    <td><?php echo $lista["operador"];?></td>
					    <td><?php echo $lista["nome"];?></td>
					    <td><?php echo $lista["retirada"];?></td>
					    <td><?php echo $lista["devolvidas"];?></td>
					    <td><?php echo $lista["total"];?></td>
					    <td><?php echo $lista["created"];?></td>
					    <td style="text-align: center;">
						    <input style="background-image: url(images/excluir.png); background-repeat: no-repeat; background-size: 100%; width: 24px; height: 24px; border: none; cursor: pointer;" type="submit" name="excluirLancamento" value="">
						</td>
						<td style="text-align: center;">
						    <input onclick="msg();" class="" style="background-image: url(images/editar.png); background-repeat: no-repeat; background-size: 100%; width: 24px; height: 24px; border: none; cursor: pointer;" type="button" name="" value="">
							</form>		
						</td>
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
								$listagem = $conn2->prepare("SELECT * FROM sacolas_junho WHERE data = '$data' ORDER BY operador ASC");
								$listagem->execute();
								while($lista = $listagem->fetch(PDO::FETCH_ASSOC)):
					?>
					<tr>
					    <th></th>
					    <th>Operador</th>
					    <th>Nome</th>
					    <th>Retirada</th>
					    <th>Devolvida</th>
					    <th>Total</th>
					    <th>Data e Hora</th>
					</tr>
					<tr>
						<td style="text-align: center;">
						    <form class="form-lancamento" method="post" action="editarLancamento.php">
							  	<!-- <div id="modal" class="editar-operador-modal">
							  		<img style="float: right; cursor: pointer; margin: 1%;" src="images/erro.png">
							  		<div class="clear"></div>
							  		<br>
									<div style="margin: 1%;" class=" box-lancamento">
										<h2 >Editar Lançamento</h2>
										<label>Retirada:</label>
										<input type="number" name="novaRetirada" placeholder="Digite o número do operador..." >
										<p style="text-align: left; font-size: 11px;">*O operador do colaborador são os 4 últimos números de sua matrícula.</p>
										<label>Devolvida:</label>
										<input type="number" name="novaDevolucao" placeholder="Digite o nome do operador..." >
										<p style="text-align: left; font-size: 11px;">*Digite todo nome em "maiúsculo".</p>
											<input type="submit" name="editarLancamento" value="Editar">
									</div>
								</div> -->
						    	<input type="radio"  name="valorId" value="<?php echo $lista["id"];?>">
					    </td>
					    <td><?php echo $lista["operador"];?></td>
					    <td><?php echo $lista["nome"];?></td>
					    <td><?php echo $lista["retirada"];?></td>
					    <td><?php echo $lista["devolvidas"];?></td>
					    <td><?php echo $lista["total"];?></td>
					    <td><?php echo $lista["created"];?></td>
					    <td style="text-align: center;">
						    <input style="background-image: url(images/excluir.png); background-repeat: no-repeat; background-size: 100%; width: 24px; height: 24px; border: none; cursor: pointer;" type="submit" name="excluirLancamento" value="">
						</td>
						<td style="text-align: center;">
						    <input onclick="msg();" class="" style="background-image: url(images/editar.png); background-repeat: no-repeat; background-size: 100%; width: 24px; height: 24px; border: none; cursor: pointer;" type="button" name="" value="">
							</form>		
						</td>
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
								$listagem = $conn2->prepare("SELECT * FROM sacolas_julho WHERE data = '$data' ORDER BY operador ASC");
								$listagem->execute();
								while($lista = $listagem->fetch(PDO::FETCH_ASSOC)):
					?>
					<tr>
					    <th></th>
					    <th>Operador</th>
					    <th>Nome</th>
					    <th>Retirada</th>
					    <th>Devolvida</th>
					    <th>Total</th>
					    <th>Data e Hora</th>
					</tr>
					<tr>
						<td style="text-align: center;">
						    <form class="form-lancamento" method="post" action="editarLancamento.php">
							  	<!-- <div id="modal" class="editar-operador-modal">
							  		<img style="float: right; cursor: pointer; margin: 1%;" src="images/erro.png">
							  		<div class="clear"></div>
							  		<br>
									<div style="margin: 1%;" class=" box-lancamento">
										<h2 >Editar Lançamento</h2>
										<label>Retirada:</label>
										<input type="number" name="novaRetirada" placeholder="Digite o número do operador..." >
										<p style="text-align: left; font-size: 11px;">*O operador do colaborador são os 4 últimos números de sua matrícula.</p>
										<label>Devolvida:</label>
										<input type="number" name="novaDevolucao" placeholder="Digite o nome do operador..." >
										<p style="text-align: left; font-size: 11px;">*Digite todo nome em "maiúsculo".</p>
											<input type="submit" name="editarLancamento" value="Editar">
									</div>
								</div> -->
						    	<input type="radio"  name="valorId" value="<?php echo $lista["id"];?>">
					    </td>
					    <td><?php echo $lista["operador"];?></td>
					    <td><?php echo $lista["nome"];?></td>
					    <td><?php echo $lista["retirada"];?></td>
					    <td><?php echo $lista["devolvidas"];?></td>
					    <td><?php echo $lista["total"];?></td>
					    <td><?php echo $lista["created"];?></td>
					    <td style="text-align: center;">
						    <input style="background-image: url(images/excluir.png); background-repeat: no-repeat; background-size: 100%; width: 24px; height: 24px; border: none; cursor: pointer;" type="submit" name="excluirLancamento" value="">
						</td>
						<td style="text-align: center;">
						    <input onclick="msg();" class="" style="background-image: url(images/editar.png); background-repeat: no-repeat; background-size: 100%; width: 24px; height: 24px; border: none; cursor: pointer;" type="button" name="" value="">
							</form>		
						</td>
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
								$listagem = $conn2->prepare("SELECT * FROM sacolas_agosto WHERE data = '$data' ORDER BY operador ASC");
								$listagem->execute();
								while($lista = $listagem->fetch(PDO::FETCH_ASSOC)):
					?>
					<tr>
					    <th></th>
					    <th>Operador</th>
					    <th>Nome</th>
					    <th>Retirada</th>
					    <th>Devolvida</th>
					    <th>Total</th>
					    <th>Data e Hora</th>
					</tr>
					<tr>
						<td style="text-align: center;">
						    <form class="form-lancamento" method="post" action="editarLancamento.php">
							  	<!-- <div id="modal" class="editar-operador-modal">
							  		<img style="float: right; cursor: pointer; margin: 1%;" src="images/erro.png">
							  		<div class="clear"></div>
							  		<br>
									<div style="margin: 1%;" class=" box-lancamento">
										<h2 >Editar Lançamento</h2>
										<label>Retirada:</label>
										<input type="number" name="novaRetirada" placeholder="Digite o número do operador..." >
										<p style="text-align: left; font-size: 11px;">*O operador do colaborador são os 4 últimos números de sua matrícula.</p>
										<label>Devolvida:</label>
										<input type="number" name="novaDevolucao" placeholder="Digite o nome do operador..." >
										<p style="text-align: left; font-size: 11px;">*Digite todo nome em "maiúsculo".</p>
											<input type="submit" name="editarLancamento" value="Editar">
									</div>
								</div> -->
						    	<input type="radio"  name="valorId" value="<?php echo $lista["id"];?>">
					    </td>
					    <td><?php echo $lista["operador"];?></td>
					    <td><?php echo $lista["nome"];?></td>
					    <td><?php echo $lista["retirada"];?></td>
					    <td><?php echo $lista["devolvidas"];?></td>
					    <td><?php echo $lista["total"];?></td>
					    <td><?php echo $lista["created"];?></td>
					    <td style="text-align: center;">
						    <input style="background-image: url(images/excluir.png); background-repeat: no-repeat; background-size: 100%; width: 24px; height: 24px; border: none; cursor: pointer;" type="submit" name="excluirLancamento" value="">
						</td>
						<td style="text-align: center;">
						    <input onclick="msg();" class="" style="background-image: url(images/editar.png); background-repeat: no-repeat; background-size: 100%; width: 24px; height: 24px; border: none; cursor: pointer;" type="button" name="" value="">
							</form>		
						</td>
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
								$listagem = $conn2->prepare("SELECT * FROM sacolas_setembro WHERE data = '$data' ORDER BY operador ASC");
								$listagem->execute();
								while($lista = $listagem->fetch(PDO::FETCH_ASSOC)):
					?>
					<tr>
					    <th></th>
					    <th>Operador</th>
					    <th>Nome</th>
					    <th>Retirada</th>
					    <th>Devolvida</th>
					    <th>Total</th>
					    <th>Data e Hora</th>
					</tr>
					<tr>
						<td style="text-align: center;">
						    <form class="form-lancamento" method="post" action="editarLancamento.php">
							  	<!-- <div id="modal" class="editar-operador-modal">
							  		<img style="float: right; cursor: pointer; margin: 1%;" src="images/erro.png">
							  		<div class="clear"></div>
							  		<br>
									<div style="margin: 1%;" class=" box-lancamento">
										<h2 >Editar Lançamento</h2>
										<label>Retirada:</label>
										<input type="number" name="novaRetirada" placeholder="Digite o número do operador..." >
										<p style="text-align: left; font-size: 11px;">*O operador do colaborador são os 4 últimos números de sua matrícula.</p>
										<label>Devolvida:</label>
										<input type="number" name="novaDevolucao" placeholder="Digite o nome do operador..." >
										<p style="text-align: left; font-size: 11px;">*Digite todo nome em "maiúsculo".</p>
											<input type="submit" name="editarLancamento" value="Editar">
									</div>
								</div> -->
						    	<input type="radio"  name="valorId" value="<?php echo $lista["id"];?>">
					    </td>
					    <td><?php echo $lista["operador"];?></td>
					    <td><?php echo $lista["nome"];?></td>
					    <td><?php echo $lista["retirada"];?></td>
					    <td><?php echo $lista["devolvidas"];?></td>
					    <td><?php echo $lista["total"];?></td>
					    <td><?php echo $lista["created"];?></td>
					    <td style="text-align: center;">
						    <input style="background-image: url(images/excluir.png); background-repeat: no-repeat; background-size: 100%; width: 24px; height: 24px; border: none; cursor: pointer;" type="submit" name="excluirLancamento" value="">
						</td>
						<td style="text-align: center;">
						    <input onclick="msg();" class="" style="background-image: url(images/editar.png); background-repeat: no-repeat; background-size: 100%; width: 24px; height: 24px; border: none; cursor: pointer;" type="button" name="" value="">
							</form>		
						</td>
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
								$listagem = $conn2->prepare("SELECT * FROM sacolas_outubro WHERE data = '$data' ORDER BY operador ASC");
								$listagem->execute();
								while($lista = $listagem->fetch(PDO::FETCH_ASSOC)):
					?>
					<tr>
					    <th></th>
					    <th>Operador</th>
					    <th>Nome</th>
					    <th>Retirada</th>
					    <th>Devolvida</th>
					    <th>Total</th>
					    <th>Data e Hora</th>
					</tr>
					<tr>
						<td style="text-align: center;">
						    <form class="form-lancamento" method="post" action="editarLancamento.php">
							  	<!-- <div id="modal" class="editar-operador-modal">
							  		<img style="float: right; cursor: pointer; margin: 1%;" src="images/erro.png">
							  		<div class="clear"></div>
							  		<br>
									<div style="margin: 1%;" class=" box-lancamento">
										<h2 >Editar Lançamento</h2>
										<label>Retirada:</label>
										<input type="number" name="novaRetirada" placeholder="Digite o número do operador..." >
										<p style="text-align: left; font-size: 11px;">*O operador do colaborador são os 4 últimos números de sua matrícula.</p>
										<label>Devolvida:</label>
										<input type="number" name="novaDevolucao" placeholder="Digite o nome do operador..." >
										<p style="text-align: left; font-size: 11px;">*Digite todo nome em "maiúsculo".</p>
											<input type="submit" name="editarLancamento" value="Editar">
									</div>
								</div> -->
						    	<input type="radio"  name="valorId" value="<?php echo $lista["id"];?>">
					    </td>
					    <td><?php echo $lista["operador"];?></td>
					    <td><?php echo $lista["nome"];?></td>
					    <td><?php echo $lista["retirada"];?></td>
					    <td><?php echo $lista["devolvidas"];?></td>
					    <td><?php echo $lista["total"];?></td>
					    <td><?php echo $lista["created"];?></td>
					    <td style="text-align: center;">
						    <input style="background-image: url(images/excluir.png); background-repeat: no-repeat; background-size: 100%; width: 24px; height: 24px; border: none; cursor: pointer;" type="submit" name="excluirLancamento" value="">
						</td>
						<td style="text-align: center;">
						    <input onclick="msg();" class="" style="background-image: url(images/editar.png); background-repeat: no-repeat; background-size: 100%; width: 24px; height: 24px; border: none; cursor: pointer;" type="button" name="" value="">
							</form>		
						</td>
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
								$listagem = $conn2->prepare("SELECT * FROM sacolas_novembro WHERE data = '$data' ORDER BY operador ASC");
								$listagem->execute();
								while($lista = $listagem->fetch(PDO::FETCH_ASSOC)):
					?>
					<tr>
					    <th></th>
					    <th>Operador</th>
					    <th>Nome</th>
					    <th>Retirada</th>
					    <th>Devolvida</th>
					    <th>Total</th>
					    <th>Data e Hora</th>
					</tr>
					<tr>
						<td style="text-align: center;">
						    <form class="form-lancamento" method="post" action="editarLancamento.php">
							  	<!-- <div id="modal" class="editar-operador-modal">
							  		<img style="float: right; cursor: pointer; margin: 1%;" src="images/erro.png">
							  		<div class="clear"></div>
							  		<br>
									<div style="margin: 1%;" class=" box-lancamento">
										<h2 >Editar Lançamento</h2>
										<label>Retirada:</label>
										<input type="number" name="novaRetirada" placeholder="Digite o número do operador..." >
										<p style="text-align: left; font-size: 11px;">*O operador do colaborador são os 4 últimos números de sua matrícula.</p>
										<label>Devolvida:</label>
										<input type="number" name="novaDevolucao" placeholder="Digite o nome do operador..." >
										<p style="text-align: left; font-size: 11px;">*Digite todo nome em "maiúsculo".</p>
											<input type="submit" name="editarLancamento" value="Editar">
									</div>
								</div> -->
						    	<input type="radio"  name="valorId" value="<?php echo $lista["id"];?>">
					    </td>
					    <td><?php echo $lista["operador"];?></td>
					    <td><?php echo $lista["nome"];?></td>
					    <td><?php echo $lista["retirada"];?></td>
					    <td><?php echo $lista["devolvidas"];?></td>
					    <td><?php echo $lista["total"];?></td>
					    <td><?php echo $lista["created"];?></td>
					    <td style="text-align: center;">
						    <input style="background-image: url(images/excluir.png); background-repeat: no-repeat; background-size: 100%; width: 24px; height: 24px; border: none; cursor: pointer;" type="submit" name="excluirLancamento" value="">
						</td>
						<td style="text-align: center;">
						    <input onclick="msg();" class="" style="background-image: url(images/editar.png); background-repeat: no-repeat; background-size: 100%; width: 24px; height: 24px; border: none; cursor: pointer;" type="button" name="" value="">
							</form>		
						</td>
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
								$listagem = $conn2->prepare("SELECT * FROM sacolas_dezembro WHERE data = '$data' ORDER BY operador ASC");
								$listagem->execute();
								while($lista = $listagem->fetch(PDO::FETCH_ASSOC)):
					?>
					<tr>
					    <th></th>
					    <th>Operador</th>
					    <th>Nome</th>
					    <th>Retirada</th>
					    <th>Devolvida</th>
					    <th>Total</th>
					    <th>Data e Hora</th>
					</tr>
					<tr>
						<td style="text-align: center;">
						    <form class="form-lancamento" method="post" action="editarLancamento.php">
							  	<!-- <div id="modal" class="editar-operador-modal">
							  		<img style="float: right; cursor: pointer; margin: 1%;" src="images/erro.png">
							  		<div class="clear"></div>
							  		<br>
									<div style="margin: 1%;" class=" box-lancamento">
										<h2 >Editar Lançamento</h2>
										<label>Retirada:</label>
										<input type="number" name="novaRetirada" placeholder="Digite o número do operador..." >
										<p style="text-align: left; font-size: 11px;">*O operador do colaborador são os 4 últimos números de sua matrícula.</p>
										<label>Devolvida:</label>
										<input type="number" name="novaDevolucao" placeholder="Digite o nome do operador..." >
										<p style="text-align: left; font-size: 11px;">*Digite todo nome em "maiúsculo".</p>
											<input type="submit" name="editarLancamento" value="Editar">
									</div>
								</div> -->
						    	<input type="radio"  name="valorId" value="<?php echo $lista["id"];?>">
					    </td>
					    <td><?php echo $lista["operador"];?></td>
					    <td><?php echo $lista["nome"];?></td>
					    <td><?php echo $lista["retirada"];?></td>
					    <td><?php echo $lista["devolvidas"];?></td>
					    <td><?php echo $lista["total"];?></td>
					    <td><?php echo $lista["created"];?></td>
					    <td style="text-align: center;">
						    <input style="background-image: url(images/excluir.png); background-repeat: no-repeat; background-size: 100%; width: 24px; height: 24px; border: none; cursor: pointer;" type="submit" name="excluirLancamento" value="">
						</td>
						<td style="text-align: center;">
						    <input onclick="msg();" class="" style="background-image: url(images/editar.png); background-repeat: no-repeat; background-size: 100%; width: 24px; height: 24px; border: none; cursor: pointer;" type="button" name="" value="">
							</form>		
						</td>
					</tr>
					<?php
						endwhile; 
							}
						}	
					?>
				</table>
			</div>
		</div>
	</section><!--lancamentos-->

	<script>
		function msg(){
			alert("Funcionará em Breve!");
		}
		function cont(){
		   var conteudo = document.getElementById('print').innerHTML;
		   tela_impressao = window.open();
		   tela_impressao.document.write(conteudo);
		   tela_impressao.window.print();
		   tela_impressao.window.close();
		}
	</script>
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