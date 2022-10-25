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
			$arquivo = 'sacolas_lancamento_operacao_janeiro.xls';
		
		// Criamos uma tabela HTML com o formato da planilha
		$html = '';
		$html .= '<table border="1">';
		$html .= '<tr>';
		$html .= '<td colspan="8">Planilha Lançamentos</tr>';
		$html .= '</tr>';
		
		
		$html .= '<tr>';
		$html .= '<td><b>ID</b></td>';
		$html .= '<td><b>Operador</b></td>';
		$html .= '<td><b>Nome</b></td>';
		$html .= '<td><b>Retirada</b></td>';
		$html .= '<td><b>Devolvidas</b></td>';
		$html .= '<td><b>Total</b></td>';
		$html .= '<td><b>Created</b></td>';
		$html .= '<td><b>Úsuario Lançado</b></td>';
		$html .= '</tr>';
		
		
		//Selecionar todos os itens da tabela 
		$result = "SELECT * FROM sacolas_cpd_janeiro";
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
			$html .= '<td>'.$row["nome_lancado"].'</td>';
			$html .= '</tr>';
			;
		}
		}

		if ($data_mes == 2){
			$arquivo = 'sacolas_lancamento_operacao_fevereiro.xls';
		
		// Criamos uma tabela HTML com o formato da planilha
		$html = '';
		$html .= '<table border="1">';
		$html .= '<tr>';
		$html .= '<td colspan="8">Planilha Lançamentos</tr>';
		$html .= '</tr>';
		
		
		$html .= '<tr>';
		$html .= '<td><b>ID</b></td>';
		$html .= '<td><b>Operador</b></td>';
		$html .= '<td><b>Nome</b></td>';
		$html .= '<td><b>Retirada</b></td>';
		$html .= '<td><b>Devolvidas</b></td>';
		$html .= '<td><b>Total</b></td>';
		$html .= '<td><b>Created</b></td>';
		$html .= '<td><b>Úsuario Lançado</b></td>';
		$html .= '</tr>';
		
		
		//Selecionar todos os itens da tabela 
		$result = "SELECT * FROM sacolas_cpd_fevereiro";
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
			$html .= '<td>'.$row["nome_lancado"].'</td>';
			$html .= '</tr>';
			;
		}
		}


		if ($data_mes == 3){
			$arquivo = 'sacolas_lancamento_operacao_marco.xls';
		
		// Criamos uma tabela HTML com o formato da planilha
		$html = '';
		$html .= '<table border="1">';
		$html .= '<tr>';
		$html .= '<td colspan="8">Planilha Lançamentos</tr>';
		$html .= '</tr>';
		
		
		$html .= '<tr>';
		$html .= '<td><b>ID</b></td>';
		$html .= '<td><b>Operador</b></td>';
		$html .= '<td><b>Nome</b></td>';
		$html .= '<td><b>Retirada</b></td>';
		$html .= '<td><b>Devolvidas</b></td>';
		$html .= '<td><b>Total</b></td>';
		$html .= '<td><b>Created</b></td>';
		$html .= '<td><b>Úsuario Lançado</b></td>';
		$html .= '</tr>';
		
		
		//Selecionar todos os itens da tabela 
		$result = "SELECT * FROM sacolas_cpd_marco";
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
			$html .= '<td>'.$row["nome_lancado"].'</td>';
			$html .= '</tr>';
			;
		}
		}


		if ($data_mes == 4){
			$arquivo = 'sacolas_lancamento_operacao_abril.xls';
		
		// Criamos uma tabela HTML com o formato da planilha
		$html = '';
		$html .= '<table border="1">';
		$html .= '<tr>';
		$html .= '<td colspan="8">Planilha Lançamentos</tr>';
		$html .= '</tr>';
		
		
	$html .= '<tr>';
		$html .= '<td><b>ID</b></td>';
		$html .= '<td><b>Operador</b></td>';
		$html .= '<td><b>Nome</b></td>';
		$html .= '<td><b>Retirada</b></td>';
		$html .= '<td><b>Devolvidas</b></td>';
		$html .= '<td><b>Total</b></td>';
		$html .= '<td><b>Created</b></td>';
		$html .= '<td><b>Úsuario Lançado</b></td>';
		$html .= '</tr>';
		
		
		//Selecionar todos os itens da tabela 
		$result = "SELECT * FROM sacolas_cpd_abril";
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
			$html .= '<td>'.$row["nome_lancado"].'</td>';
			$html .= '</tr>';
			;
		}
		}

		if ($data_mes == 5){
			$arquivo = 'sacolas_lancamento_operacao_maio.xls';
		
		// Criamos uma tabela HTML com o formato da planilha
		$html = '';
		$html .= '<table border="1">';
		$html .= '<tr>';
		$html .= '<td colspan="8">Planilha Lançamentos</tr>';
		$html .= '</tr>';
		
		
		$html .= '<tr>';
		$html .= '<td><b>ID</b></td>';
		$html .= '<td><b>Operador</b></td>';
		$html .= '<td><b>Nome</b></td>';
		$html .= '<td><b>Retirada</b></td>';
		$html .= '<td><b>Devolvidas</b></td>';
		$html .= '<td><b>Total</b></td>';
		$html .= '<td><b>Created</b></td>';
		$html .= '<td><b>Úsuario Lançado</b></td>';
		$html .= '</tr>';
		
		
		//Selecionar todos os itens da tabela 
		$result = "SELECT * FROM sacolas_cpd_maio";
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
			$html .= '<td>'.$row["nome_lancado"].'</td>';
			$html .= '</tr>';
			;
		}
		}

		if ($data_mes == 6){
			$arquivo = 'sacolas_lancamento_operacao_junho.xls';
		
		// Criamos uma tabela HTML com o formato da planilha
		$html = '';
		$html .= '<table border="1">';
		$html .= '<tr>';
		$html .= '<td colspan="8">Planilha Lançamentos</tr>';
		$html .= '</tr>';
		
		
		$html .= '<tr>';
		$html .= '<td><b>ID</b></td>';
		$html .= '<td><b>Operador</b></td>';
		$html .= '<td><b>Nome</b></td>';
		$html .= '<td><b>Retirada</b></td>';
		$html .= '<td><b>Devolvidas</b></td>';
		$html .= '<td><b>Total</b></td>';
		$html .= '<td><b>Created</b></td>';
		$html .= '<td><b>Úsuario Lançado</b></td>';
		$html .= '</tr>';
		
		
		//Selecionar todos os itens da tabela 
		$result = "SELECT * FROM sacolas_cpd_junho";
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
			$html .= '<td>'.$row["nome_lancado"].'</td>';
			$html .= '</tr>';
			;
		}
		}


		if ($data_mes == 7){
			$arquivo = 'sacolas_lancamento_operacao_julho.xls';
		
		// Criamos uma tabela HTML com o formato da planilha
		$html = '';
		$html .= '<table border="1">';
		$html .= '<tr>';
		$html .= '<td colspan="8">Planilha Lançamentos</tr>';
		$html .= '</tr>';
		
		
	$html .= '<tr>';
		$html .= '<td><b>ID</b></td>';
		$html .= '<td><b>Operador</b></td>';
		$html .= '<td><b>Nome</b></td>';
		$html .= '<td><b>Retirada</b></td>';
		$html .= '<td><b>Devolvidas</b></td>';
		$html .= '<td><b>Total</b></td>';
		$html .= '<td><b>Created</b></td>';
		$html .= '<td><b>Úsuario Lançado</b></td>';
		$html .= '</tr>';
		
		
		//Selecionar todos os itens da tabela 
		$result = "SELECT * FROM sacolas_cpd_julho";
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
			$html .= '<td>'.$row["nome_lancado"].'</td>';
			$html .= '</tr>';
			;
		}
		}

		if ($data_mes == 8){
			$arquivo = 'sacolas_lancamento_operacao_agosto.xls';
		
		// Criamos uma tabela HTML com o formato da planilha
		$html = '';
		$html .= '<table border="1">';
		$html .= '<tr>';
		$html .= '<td colspan="8">Planilha Lançamentos</tr>';
		$html .= '</tr>';
		
		
		$html .= '<tr>';
		$html .= '<td><b>ID</b></td>';
		$html .= '<td><b>Operador</b></td>';
		$html .= '<td><b>Nome</b></td>';
		$html .= '<td><b>Retirada</b></td>';
		$html .= '<td><b>Devolvidas</b></td>';
		$html .= '<td><b>Total</b></td>';
		$html .= '<td><b>Created</b></td>';
		$html .= '<td><b>Úsuario Lançado</b></td>';
		$html .= '</tr>';
		
		
		//Selecionar todos os itens da tabela 
		$result = "SELECT * FROM sacolas_cpd_agosto";
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
			$html .= '<td>'.$row["nome_lancado"].'</td>';
			$html .= '</tr>';
			;
		}
		}

		if ($data_mes == 9){
			$arquivo = 'sacolas_lancamento_operacao_setembro.xls';
		
		// Criamos uma tabela HTML com o formato da planilha
		$html = '';
		$html .= '<table border="1">';
		$html .= '<tr>';
		$html .= '<td colspan="8">Planilha Lançamentos</tr>';
		$html .= '</tr>';
		
		
		$html .= '<tr>';
		$html .= '<td><b>ID</b></td>';
		$html .= '<td><b>Operador</b></td>';
		$html .= '<td><b>Nome</b></td>';
		$html .= '<td><b>Retirada</b></td>';
		$html .= '<td><b>Devolvidas</b></td>';
		$html .= '<td><b>Total</b></td>';
		$html .= '<td><b>Created</b></td>';
		$html .= '<td><b>Úsuario Lançado</b></td>';
		$html .= '</tr>';
		
		
		//Selecionar todos os itens da tabela 
		$result = "SELECT * FROM sacolas_cpd_setembro";
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
			$html .= '<td>'.$row["nome_lancado"].'</td>';
			$html .= '</tr>';
			;
		}
		}

		if ($data_mes == 10){
			$arquivo = 'sacolas_lancamento_operacao_outubro.xls';
		
		// Criamos uma tabela HTML com o formato da planilha
		$html = '';
		$html .= '<table border="1">';
		$html .= '<tr>';
		$html .= '<td colspan="8">Planilha Lançamentos</tr>';
		$html .= '</tr>';
		
		
		$html .= '<tr>';
		$html .= '<td><b>ID</b></td>';
		$html .= '<td><b>Operador</b></td>';
		$html .= '<td><b>Nome</b></td>';
		$html .= '<td><b>Retirada</b></td>';
		$html .= '<td><b>Devolvidas</b></td>';
		$html .= '<td><b>Total</b></td>';
		$html .= '<td><b>Created</b></td>';
		$html .= '<td><b>Úsuario Lançado</b></td>';
		$html .= '</tr>';
		
		
		//Selecionar todos os itens da tabela 
		$result = "SELECT * FROM sacolas_cpd_outubro";
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
			$html .= '<td>'.$row["nome_lancado"].'</td>';
			$html .= '</tr>';
			;
		}
		}

		if ($data_mes == 11){
			$arquivo = 'sacolas_lancamento_operacao_novembro.xls';
		
		// Criamos uma tabela HTML com o formato da planilha
		$html = '';
		$html .= '<table border="1">';
		$html .= '<tr>';
		$html .= '<td colspan="8">Planilha Lançamentos</tr>';
		$html .= '</tr>';
		
		
	$html .= '<tr>';
		$html .= '<td><b>ID</b></td>';
		$html .= '<td><b>Operador</b></td>';
		$html .= '<td><b>Nome</b></td>';
		$html .= '<td><b>Retirada</b></td>';
		$html .= '<td><b>Devolvidas</b></td>';
		$html .= '<td><b>Total</b></td>';
		$html .= '<td><b>Created</b></td>';
		$html .= '<td><b>Úsuario Lançado</b></td>';
		$html .= '</tr>';
		
		
		//Selecionar todos os itens da tabela 
		$result = "SELECT * FROM sacolas_cpd_novembro";
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
			$html .= '<td>'.$row["nome_lancado"].'</td>';
			$html .= '</tr>';
			;
		}
		}
		
		if ($data_mes == 12){
			$arquivo = 'Comparacao_lancamentos_vendas_dezembro.xls';
		
		// Criamos uma tabela HTML com o formato da planilha
		$html = '';
		$html .= '<table border="1">';
		$html .= '<tr>';
		$html .= '<td colspan="5">Planilha Lançamentos</tr>';
		$html .= '</tr>';
		
		
		$html .= '<tr>';
		$html .= '<td><b>Operador</b></td>';
		$html .= '<td><b>Nome</b></td>';
		$html .= '<td><b>Total_Lancado</b></td>';
		
		


		
		//Selecionar todos os itens da tabela 
		$result = "SELECT * FROM sacolas_dezembro";
		$resultado = mysqli_query($conn4 , $result);

		
		while($row = mysqli_fetch_assoc($resultado)){
			$html .= '<tr>';
			$html .= '<td>'.$row["operador"].'</td>';
			$html .= '<td>'.$row["nome"].'</td>';
			$html .= '<td>'.$row["total"].'</td>';
			;
		}

		$html .= '<td><b>Total_Vendido</b></td>';
		$html .= '</tr>';
		
		$result2 = "SELECT quantidade FROM sacolas_vendidas_por_operador_exel";
		$resultado2 = mysqli_query($conn4 , $result2);

			
		while($row2 = mysqli_fetch_assoc($resultado2)){
			$html .= '<td>'.$row2["quantidade"].'</td>';
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