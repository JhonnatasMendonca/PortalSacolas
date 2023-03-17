<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Portal-sacolas</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <script src="js/jquery-3.6.3.js"></script>
  
</head>
<body>
	<div class=" primeiro box-lancamento">
		<form class="form-lancamento" method="post">
			<h2 >Retirada de sacolas por operador:</h2>
		<label >Insira a Data de Hoje</label>
		<input class ="data_input"; type="date" name="data" required>
		<label>Operador</label>
		<input  type="number" name="operador" required>
		<label>Retirada</label>
		<input  type="number" name="retirada" required>
		<label >Nome</label>
		<input  type="text" name="nome" required>
		<input type="submit" name="retirar" value="Lançar">
	</form>
	</div>

	<div class="box-lancamento">
		<form class="form-lancamento" method="post">
			<h2 >Devolução de sacolas por operador:</h2>
		<label >Insira a Data de Hoje</label>
		<input class ="data_input"; type="date" name="data" required>
		<label>Operador</label>
		<input  type="number" name="operador" required>
		<label>Devolução</label>
		<input  type="number" name="devolvida" required>
		<label >Nome</label>
		<input  type="text" name="nome" required>
		<input type="submit" name="devolver" value="Lançar">
	</form>
	</div>



	
</body>
</html>