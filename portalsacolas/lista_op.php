<?php 
include 'conexao.php';
include 'header.php';
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<div class="menu">
				<ul>
					<li class="active"><a href="index.php">Home</a></li>
					<li><a href="cadastro.php">Cadastrar Operadores</a></li>
					<li><a href="lista_op.php">Operadores Cadastrados</a></li>
					<div class="sobre"><li><a target="_blank"href="login.php">Login</a></li></div>
				</ul>
				<div class="clear"></div>
	</div><!--menu-->
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




</body>
</html>
<?php include 'footer.php'; ?>