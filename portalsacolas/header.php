<?php
	session_start();
	if (isset($_SESSION["usuario"])) {
		$adm = $_SESSION["usuario"][1];
		$nome = $_SESSION["usuario"][0];
	}else{
		echo "<script>window.location = 'login2.php'</script>";
	}
	include 'conexao.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Portal-Sacolas</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="banner">
				<div class="centro">
					<div class="filial-header">
						<img src="images/images.jpg">
						<h4>Filial 264</h4>
					</div>
					
					<div class="faixa-header">
						<h2>Bem-vindo(a) ao Portal de Sacolas | </h2>
						<h2><?php echo strtoupper($nome) ?></h2>
					</div><!--faixa-->
					<div class="clear"></div>
				</div><!--centro-->
	</div><!--banner-->
</body>
</html>