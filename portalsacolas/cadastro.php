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

	<div style="margin-left: 35%;" class="box-lancamento">
		<?php
	
			if(isset($_SESSION['msg'])){
				echo $_SESSION['msg'];
				unset($_SESSION['msg']);
			} 
			
		 ?>
		<form class="form-lancamento" method="post" action="processa.php">
			<div class="msg"></div>
			<h2 >Cadastrar Operador:</h2>
			<label>Operador:</label>
			<input type="number" name="operador" placeholder="Digite o número do operador..." required>
			<p>*O operador do colaborador são os 4 últimos números de sua matrícula.</p>
			<label>Nome:</label>
			<input type="text" name="nome" placeholder="Digite o nome do operador..." required>
			<p>*Digite todo nome em "maiúsculo".</p>
			<input type="submit" name="cadastrarOperador" value="Cadastrar">
		</form>
	</div>
	
	 
<?php
	include  'footer.php'; 
 ?>
</body>
</html>