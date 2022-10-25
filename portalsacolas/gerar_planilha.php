 <?php
	include('conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Contato</title>
	<head>
	<body>
		<?php
		$data_mes = date('m');
		if ($data_mes == 1){
			$arquivo = 'sacolas_janeiro.xls';
		
		// Criamos uma tabela HTML com o formato da planilha
		$html = '';
		$html .= '<table border="1">';
		$html .= '<tr>';
		$html .= '<td colspan="7">Planilha Lançamentos</tr>';
		$html .= '</tr>';
		
		
		$html .= '<tr>';
		$html .= '<td><b>ID</b></td>';
		$html .= '<td><b>Operador</b></td>';
		$html .= '<td><b>Nome</b></td>';
		$html .= '<td><b>Retirada</b></td>';
		$html .= '<td><b>Devolvidas</b></td>';
		$html .= '<td><b>Total</b></td>';
		$html .= '<td><b>Created</b></td>';
		$html .= '</tr>';
		
		
		//Selecionar todos os itens da tabela 
		$result = "SELECT * FROM sacolas_janeiro";
		$resultado = mysqli_query($conn4 , $result);
		
		while($row = mysqli_fetch_assoc($resultado)){
			$html .= '<tr>';
			$html .= '<td>'.$row["id"].'</td>';
			$html .= '<td>'.$row["operador"].'</td>';
			$html .= '<td>'.$row["nome"].'</td>';
			$html .= '<td>'.$row["retirada"].'</td>';
			$html .= '<td>'.$row["devolvidas"].'</td>';
			$html .= '<td>'.$row["total"].'</td>';
			$data = date('d/m/Y H:i:s',strtotime($row["created"]));
			$html .= '<td>'.$data.'</td>';
			$html .= '</tr>';
			;
		}
		}

		if ($data_mes == 2){
			$arquivo = 'sacolas_fevereiro.xls';
		
		// Criamos uma tabela HTML com o formato da planilha
		$html = '';
		$html .= '<table border="1">';
		$html .= '<tr>';
		$html .= '<td colspan="7">Planilha Lançamentos</tr>';
		$html .= '</tr>';
		
		
		$html .= '<tr>';
		$html .= '<td><b>ID</b></td>';
		$html .= '<td><b>Operador</b></td>';
		$html .= '<td><b>Nome</b></td>';
		$html .= '<td><b>Retirada</b></td>';
		$html .= '<td><b>Devolvidas</b></td>';
		$html .= '<td><b>Total</b></td>';
		$html .= '<td><b>Created</b></td>';
		$html .= '</tr>';
		
		
		//Selecionar todos os itens da tabela 
		$result = "SELECT * FROM sacolas_fevereiro";
		$resultado = mysqli_query($conn4 , $result);
		
		while($row = mysqli_fetch_assoc($resultado)){
			$html .= '<tr>';
			$html .= '<td>'.$row["id"].'</td>';
			$html .= '<td>'.$row["operador"].'</td>';
			$html .= '<td>'.$row["nome"].'</td>';
			$html .= '<td>'.$row["retirada"].'</td>';
			$html .= '<td>'.$row["devolvidas"].'</td>';
			$html .= '<td>'.$row["total"].'</td>';
			$data = date('d/m/Y H:i:s',strtotime($row["created"]));
			$html .= '<td>'.$data.'</td>';
			$html .= '</tr>';
			;
		}
		}


		if ($data_mes == 3){
			$arquivo = 'sacolas_marco.xls';
		
		// Criamos uma tabela HTML com o formato da planilha
		$html = '';
		$html .= '<table border="1">';
		$html .= '<tr>';
		$html .= '<td colspan="7">Planilha Lançamentos</tr>';
		$html .= '</tr>';
		
		
		$html .= '<tr>';
		$html .= '<td><b>ID</b></td>';
		$html .= '<td><b>Operador</b></td>';
		$html .= '<td><b>Nome</b></td>';
		$html .= '<td><b>Retirada</b></td>';
		$html .= '<td><b>Devolvidas</b></td>';
		$html .= '<td><b>Total</b></td>';
		$html .= '<td><b>Created</b></td>';
		$html .= '</tr>';
		
		
		//Selecionar todos os itens da tabela 
		$result = "SELECT * FROM sacolas_marco";
		$resultado = mysqli_query($conn4 , $result);
		
		while($row = mysqli_fetch_assoc($resultado)){
			$html .= '<tr>';
			$html .= '<td>'.$row["id"].'</td>';
			$html .= '<td>'.$row["operador"].'</td>';
			$html .= '<td>'.$row["nome"].'</td>';
			$html .= '<td>'.$row["retirada"].'</td>';
			$html .= '<td>'.$row["devolvidas"].'</td>';
			$html .= '<td>'.$row["total"].'</td>';
			$data = date('d/m/Y H:i:s',strtotime($row["created"]));
			$html .= '<td>'.$data.'</td>';
			$html .= '</tr>';
			;
		}
		}


		if ($data_mes == 4){
			$arquivo = 'sacolas_abril.xls';
		
		// Criamos uma tabela HTML com o formato da planilha
		$html = '';
		$html .= '<table border="1">';
		$html .= '<tr>';
		$html .= '<td colspan="7">Planilha Lançamentos</tr>';
		$html .= '</tr>';
		
		
		$html .= '<tr>';
		$html .= '<td><b>ID</b></td>';
		$html .= '<td><b>Operador</b></td>';
		$html .= '<td><b>Nome</b></td>';
		$html .= '<td><b>Retirada</b></td>';
		$html .= '<td><b>Devolvidas</b></td>';
		$html .= '<td><b>Total</b></td>';
		$html .= '<td><b>Created</b></td>';
		$html .= '</tr>';
		
		
		//Selecionar todos os itens da tabela 
		$result = "SELECT * FROM sacolas_abril";
		$resultado = mysqli_query($conn4 , $result);
		
		while($row = mysqli_fetch_assoc($resultado)){
			$html .= '<tr>';
			$html .= '<td>'.$row["id"].'</td>';
			$html .= '<td>'.$row["operador"].'</td>';
			$html .= '<td>'.$row["nome"].'</td>';
			$html .= '<td>'.$row["retirada"].'</td>';
			$html .= '<td>'.$row["devolvidas"].'</td>';
			$html .= '<td>'.$row["total"].'</td>';
			$data = date('d/m/Y H:i:s',strtotime($row["created"]));
			$html .= '<td>'.$data.'</td>';
			$html .= '</tr>';
			;
		}
		}

		if ($data_mes == 5){
			$arquivo = 'sacolas_maio.xls';
		
		// Criamos uma tabela HTML com o formato da planilha
		$html = '';
		$html .= '<table border="1">';
		$html .= '<tr>';
		$html .= '<td colspan="7">Planilha Lançamentos</tr>';
		$html .= '</tr>';
		
		
		$html .= '<tr>';
		$html .= '<td><b>ID</b></td>';
		$html .= '<td><b>Operador</b></td>';
		$html .= '<td><b>Nome</b></td>';
		$html .= '<td><b>Retirada</b></td>';
		$html .= '<td><b>Devolvidas</b></td>';
		$html .= '<td><b>Total</b></td>';
		$html .= '<td><b>Created</b></td>';
		$html .= '</tr>';
		
		
		//Selecionar todos os itens da tabela 
		$result = "SELECT * FROM sacolas_maio";
		$resultado = mysqli_query($conn4 , $result);
		
		while($row = mysqli_fetch_assoc($resultado)){
			$html .= '<tr>';
			$html .= '<td>'.$row["id"].'</td>';
			$html .= '<td>'.$row["operador"].'</td>';
			$html .= '<td>'.$row["nome"].'</td>';
			$html .= '<td>'.$row["retirada"].'</td>';
			$html .= '<td>'.$row["devolvidas"].'</td>';
			$html .= '<td>'.$row["total"].'</td>';
			$data = date('d/m/Y H:i:s',strtotime($row["created"]));
			$html .= '<td>'.$data.'</td>';
			$html .= '</tr>';
			;
		}
		}

		if ($data_mes == 6){
			$arquivo = 'sacolas_junho.xls';
		
		// Criamos uma tabela HTML com o formato da planilha
		$html = '';
		$html .= '<table border="1">';
		$html .= '<tr>';
		$html .= '<td colspan="7">Planilha Lançamentos</tr>';
		$html .= '</tr>';
		
		
		$html .= '<tr>';
		$html .= '<td><b>ID</b></td>';
		$html .= '<td><b>Operador</b></td>';
		$html .= '<td><b>Nome</b></td>';
		$html .= '<td><b>Retirada</b></td>';
		$html .= '<td><b>Devolvidas</b></td>';
		$html .= '<td><b>Total</b></td>';
		$html .= '<td><b>Created</b></td>';
		$html .= '</tr>';
		
		
		//Selecionar todos os itens da tabela 
		$result = "SELECT * FROM sacolas_junho";
		$resultado = mysqli_query($conn4 , $result);
		
		while($row = mysqli_fetch_assoc($resultado)){
			$html .= '<tr>';
			$html .= '<td>'.$row["id"].'</td>';
			$html .= '<td>'.$row["operador"].'</td>';
			$html .= '<td>'.$row["nome"].'</td>';
			$html .= '<td>'.$row["retirada"].'</td>';
			$html .= '<td>'.$row["devolvidas"].'</td>';
			$html .= '<td>'.$row["total"].'</td>';
			$data = date('d/m/Y H:i:s',strtotime($row["created"]));
			$html .= '<td>'.$data.'</td>';
			$html .= '</tr>';
			;
		}
		}


		if ($data_mes == 7){
			$arquivo = 'sacolas_julho.xls';
		
		// Criamos uma tabela HTML com o formato da planilha
		$html = '';
		$html .= '<table border="1">';
		$html .= '<tr>';
		$html .= '<td colspan="7">Planilha Lançamentos</tr>';
		$html .= '</tr>';
		
		
		$html .= '<tr>';
		$html .= '<td><b>ID</b></td>';
		$html .= '<td><b>Operador</b></td>';
		$html .= '<td><b>Nome</b></td>';
		$html .= '<td><b>Retirada</b></td>';
		$html .= '<td><b>Devolvidas</b></td>';
		$html .= '<td><b>Total</b></td>';
		$html .= '<td><b>Created</b></td>';
		$html .= '</tr>';
		
		
		//Selecionar todos os itens da tabela 
		$result = "SELECT * FROM sacolas_julho";
		$resultado = mysqli_query($conn4 , $result);
		
		while($row = mysqli_fetch_assoc($resultado)){
			$html .= '<tr>';
			$html .= '<td>'.$row["id"].'</td>';
			$html .= '<td>'.$row["operador"].'</td>';
			$html .= '<td>'.$row["nome"].'</td>';
			$html .= '<td>'.$row["retirada"].'</td>';
			$html .= '<td>'.$row["devolvidas"].'</td>';
			$html .= '<td>'.$row["total"].'</td>';
			$data = date('d/m/Y H:i:s',strtotime($row["created"]));
			$html .= '<td>'.$data.'</td>';
			$html .= '</tr>';
			;
		}
		}

		if ($data_mes == 8){
			$arquivo = 'sacolas_agosto.xls';
		
		// Criamos uma tabela HTML com o formato da planilha
		$html = '';
		$html .= '<table border="1">';
		$html .= '<tr>';
		$html .= '<td colspan="7">Planilha Lançamentos</tr>';
		$html .= '</tr>';
		
		
		$html .= '<tr>';
		$html .= '<td><b>ID</b></td>';
		$html .= '<td><b>Operador</b></td>';
		$html .= '<td><b>Nome</b></td>';
		$html .= '<td><b>Retirada</b></td>';
		$html .= '<td><b>Devolvidas</b></td>';
		$html .= '<td><b>Total</b></td>';
		$html .= '<td><b>Created</b></td>';
		$html .= '</tr>';
		
		
		//Selecionar todos os itens da tabela 
		$result = "SELECT * FROM sacolas_agosto";
		$resultado = mysqli_query($conn4 , $result);
		
		while($row = mysqli_fetch_assoc($resultado)){
			$html .= '<tr>';
			$html .= '<td>'.$row["id"].'</td>';
			$html .= '<td>'.$row["operador"].'</td>';
			$html .= '<td>'.$row["nome"].'</td>';
			$html .= '<td>'.$row["retirada"].'</td>';
			$html .= '<td>'.$row["devolvidas"].'</td>';
			$html .= '<td>'.$row["total"].'</td>';
			$data = date('d/m/Y H:i:s',strtotime($row["created"]));
			$html .= '<td>'.$data.'</td>';
			$html .= '</tr>';
			;
		}
		}

		if ($data_mes == 9){
			$arquivo = 'sacolas_setembro.xls';
		
		// Criamos uma tabela HTML com o formato da planilha
		$html = '';
		$html .= '<table border="1">';
		$html .= '<tr>';
		$html .= '<td colspan="7">Planilha Lançamentos</tr>';
		$html .= '</tr>';
		
		
		$html .= '<tr>';
		$html .= '<td><b>ID</b></td>';
		$html .= '<td><b>Operador</b></td>';
		$html .= '<td><b>Nome</b></td>';
		$html .= '<td><b>Retirada</b></td>';
		$html .= '<td><b>Devolvidas</b></td>';
		$html .= '<td><b>Total</b></td>';
		$html .= '<td><b>Created</b></td>';
		$html .= '</tr>';
		
		
		//Selecionar todos os itens da tabela 
		$result = "SELECT * FROM sacolas_setembro";
		$resultado = mysqli_query($conn4 , $result);
		
		while($row = mysqli_fetch_assoc($resultado)){
			$html .= '<tr>';
			$html .= '<td>'.$row["id"].'</td>';
			$html .= '<td>'.$row["operador"].'</td>';
			$html .= '<td>'.$row["nome"].'</td>';
			$html .= '<td>'.$row["retirada"].'</td>';
			$html .= '<td>'.$row["devolvidas"].'</td>';
			$html .= '<td>'.$row["total"].'</td>';
			$data = date('d/m/Y H:i:s',strtotime($row["created"]));
			$html .= '<td>'.$data.'</td>';
			$html .= '</tr>';
			;
		}
		}

		if ($data_mes == 10){
			$arquivo = 'sacolas_outubro.xls';
		
		// Criamos uma tabela HTML com o formato da planilha
		$html = '';
		$html .= '<table border="1">';
		$html .= '<tr>';
		$html .= '<td colspan="7">Planilha Lançamentos</tr>';
		$html .= '</tr>';
		
		
		$html .= '<tr>';
		$html .= '<td><b>ID</b></td>';
		$html .= '<td><b>Operador</b></td>';
		$html .= '<td><b>Nome</b></td>';
		$html .= '<td><b>Retirada</b></td>';
		$html .= '<td><b>Devolvidas</b></td>';
		$html .= '<td><b>Total</b></td>';
		$html .= '<td><b>Created</b></td>';
		$html .= '</tr>';
		
		
		//Selecionar todos os itens da tabela 
		$result = "SELECT * FROM sacolas_outubro";
		$resultado = mysqli_query($conn4 , $result);
		
		while($row = mysqli_fetch_assoc($resultado)){
			$html .= '<tr>';
			$html .= '<td>'.$row["id"].'</td>';
			$html .= '<td>'.$row["operador"].'</td>';
			$html .= '<td>'.$row["nome"].'</td>';
			$html .= '<td>'.$row["retirada"].'</td>';
			$html .= '<td>'.$row["devolvidas"].'</td>';
			$html .= '<td>'.$row["total"].'</td>';
			$data = date('d/m/Y H:i:s',strtotime($row["created"]));
			$html .= '<td>'.$data.'</td>';
			$html .= '</tr>';
			;
		}
		}

		if ($data_mes == 11){
			$arquivo = 'sacolas_novembro.xls';
		
		// Criamos uma tabela HTML com o formato da planilha
		$html = '';
		$html .= '<table border="1">';
		$html .= '<tr>';
		$html .= '<td colspan="7">Planilha Lançamentos</tr>';
		$html .= '</tr>';
		
		
		$html .= '<tr>';
		$html .= '<td><b>ID</b></td>';
		$html .= '<td><b>Operador</b></td>';
		$html .= '<td><b>Nome</b></td>';
		$html .= '<td><b>Retirada</b></td>';
		$html .= '<td><b>Devolvidas</b></td>';
		$html .= '<td><b>Total</b></td>';
		$html .= '<td><b>Created</b></td>';
		$html .= '</tr>';
		
		
		//Selecionar todos os itens da tabela 
		$result = "SELECT * FROM sacolas_novembro";
		$resultado = mysqli_query($conn4 , $result);
		
		while($row = mysqli_fetch_assoc($resultado)){
			$html .= '<tr>';
			$html .= '<td>'.$row["id"].'</td>';
			$html .= '<td>'.$row["operador"].'</td>';
			$html .= '<td>'.$row["nome"].'</td>';
			$html .= '<td>'.$row["retirada"].'</td>';
			$html .= '<td>'.$row["devolvidas"].'</td>';
			$html .= '<td>'.$row["total"].'</td>';
			$data = date('d/m/Y H:i:s',strtotime($row["created"]));
			$html .= '<td>'.$data.'</td>';
			$html .= '</tr>';
			;
		}
		}
		
		if ($data_mes == 12){
			$arquivo = 'sacolas_dezembro.xls';
		
		// Criamos uma tabela HTML com o formato da planilha
		$html = '';
		$html .= '<table border="1">';
		$html .= '<tr>';
		$html .= '<td colspan="7">Planilha Lançamentos</tr>';
		$html .= '</tr>';
		
		
		$html .= '<tr>';
		$html .= '<td><b>ID</b></td>';
		$html .= '<td><b>Operador</b></td>';
		$html .= '<td><b>Nome</b></td>';
		$html .= '<td><b>Retirada</b></td>';
		$html .= '<td><b>Devolvidas</b></td>';
		$html .= '<td><b>Total</b></td>';
		$html .= '<td><b>Created</b></td>';
		$html .= '</tr>';
		
		
		//Selecionar todos os itens da tabela 
		$result = "SELECT * FROM sacolas_dezembro";
		$resultado = mysqli_query($conn4 , $result);
		
		while($row = mysqli_fetch_assoc($resultado)){
			$html .= '<tr>';
			$html .= '<td>'.$row["id"].'</td>';
			$html .= '<td>'.$row["operador"].'</td>';
			$html .= '<td>'.$row["nome"].'</td>';
			$html .= '<td>'.$row["retirada"].'</td>';
			$html .= '<td>'.$row["devolvidas"].'</td>';
			$html .= '<td>'.$row["total"].'</td>';
			$data = date('d/m/Y H:i:s',strtotime($row["created"]));
			$html .= '<td>'.$data.'</td>';
			$html .= '</tr>';
			;
		}
		}
		// Definimos o nome do arquivo que será exportado
		
		// Configurações header para forçar o download
		header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
		header ("Cache-Control: no-cache, must-revalidate");
		header ("Pragma: no-cache");
		header ("Content-type: application/x-msexcel");
		header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
		header ("Content-Description: PHP Generated Data" );
		// Envia o conteúdo do arquivo
		echo $html;
		exit; ?>
	</body>
</html>