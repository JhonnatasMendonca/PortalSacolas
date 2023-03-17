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
			$arquivo = 'comparacao_lancamento_vs_venda_sacolas.xls';
		
		// Criamos uma tabela HTML com o formato da planilha
		$html = '';
		$html .= '<table border="1">';
		$html .= '<tr>';
		$html .= '<td colspan="5">Planilha Comparacao De Vendas</tr>';
		$html .= '</tr>';
		
		
		$html .= '<tr>';
		$html .= '<td><b>Operador</b></td>';
		$html .= '<td><b>Nome</b></td>';
		$html .= '<td><b>Qtd. Lançada</b></td>';
		$html .= '<td><b>Qtd. Vendida</b></td>';
		$html .= '<td><b>Data</b></td>';
		$html .= '</tr>';
		
		session_start();
		$data_procura = $_SESSION['data_procura'];

		//Selecionar todos os itens da tabela 
		$result = "SELECT v.operador, v.nome, v.total, l.quantidade FROM sacolas_janeiro  as v INNER JOIN sacolas_vendidas_por_operador_exel  as l ON v.operador = l.operador WHERE v.data = '$data_procura' and l.data = '$data_procura' ORDER BY operador ASC";
		$resultado = mysqli_query($conn4 , $result);
		
		while($row = mysqli_fetch_assoc($resultado)){
			$html .= '<tr>';
			$html .= '<td>'.$row["operador"].'</td>';
			$html .= '<td>'.$row["nome"].'</td>';
			$html .= '<td>'.$row["total"].'</td>';
			$html .= '<td>'.$row["quantidade"].'</td>';
			$html .= '<td>'.$data_procura.'</td>';
			$html .= '</tr>';
			;
		}
		}

		if ($data_mes == 2){
			$arquivo = 'comparacao_lancamento_vs_venda_sacolas.xls';
		
		// Criamos uma tabela HTML com o formato da planilha
		$html = '';
		$html .= '<table border="1">';
		$html .= '<tr>';
		$html .= '<td colspan="5">Planilha Comparacao De Vendas</tr>';
		$html .= '</tr>';
		
		
		$html .= '<tr>';
		$html .= '<td><b>Operador</b></td>';
		$html .= '<td><b>Nome</b></td>';
		$html .= '<td><b>Qtd. Lançada</b></td>';
		$html .= '<td><b>Qtd. Vendida</b></td>';
		$html .= '<td><b>Data</b></td>';
		$html .= '</tr>';
		
		session_start();
		$data_procura = $_SESSION['data_procura'];

		//Selecionar todos os itens da tabela 
		$result = "SELECT v.operador, v.nome, v.total, l.quantidade FROM sacolas_fevereiro  as v INNER JOIN sacolas_vendidas_por_operador_exel  as l ON v.operador = l.operador WHERE v.data = '$data_procura' and l.data = '$data_procura' ORDER BY operador ASC";
		$resultado = mysqli_query($conn4 , $result);
		
		while($row = mysqli_fetch_assoc($resultado)){
			$html .= '<tr>';
			$html .= '<td>'.$row["operador"].'</td>';
			$html .= '<td>'.$row["nome"].'</td>';
			$html .= '<td>'.$row["total"].'</td>';
			$html .= '<td>'.$row["quantidade"].'</td>';
			$html .= '<td>'.$data_procura.'</td>';
			$html .= '</tr>';
			;
		}
		}


		if ($data_mes == 3){
			$arquivo = 'comparacao_lancamento_vs_venda_sacolas.xls';
		
		// Criamos uma tabela HTML com o formato da planilha
		$html = '';
		$html .= '<table border="1">';
		$html .= '<tr>';
		$html .= '<td colspan="5">Planilha Comparacao De Vendas</tr>';
		$html .= '</tr>';
		
		
		$html .= '<tr>';
		$html .= '<td><b>Operador</b></td>';
		$html .= '<td><b>Nome</b></td>';
		$html .= '<td><b>Qtd. Lançada</b></td>';
		$html .= '<td><b>Qtd. Vendida</b></td>';
		$html .= '<td><b>Data</b></td>';
		$html .= '</tr>';
		
		session_start();
		$data_procura = $_SESSION['data_procura'];

		//Selecionar todos os itens da tabela 
		$result = "SELECT v.operador, v.nome, v.total, l.quantidade FROM sacolas_marco  as v INNER JOIN sacolas_vendidas_por_operador_exel  as l ON v.operador = l.operador WHERE v.data = '$data_procura' and l.data = '$data_procura' ORDER BY operador ASC";
		$resultado = mysqli_query($conn4 , $result);
		
		while($row = mysqli_fetch_assoc($resultado)){
			$html .= '<tr>';
			$html .= '<td>'.$row["operador"].'</td>';
			$html .= '<td>'.$row["nome"].'</td>';
			$html .= '<td>'.$row["total"].'</td>';
			$html .= '<td>'.$row["quantidade"].'</td>';
			$html .= '<td>'.$data_procura.'</td>';
			$html .= '</tr>';
			;
		}
		}


		if ($data_mes == 4){
			$arquivo = 'comparacao_lancamento_vs_venda_sacolas.xls';
		
		// Criamos uma tabela HTML com o formato da planilha
		$html = '';
		$html .= '<table border="1">';
		$html .= '<tr>';
		$html .= '<td colspan="5">Planilha Comparacao De Vendas</tr>';
		$html .= '</tr>';
		
		
		$html .= '<tr>';
		$html .= '<td><b>Operador</b></td>';
		$html .= '<td><b>Nome</b></td>';
		$html .= '<td><b>Qtd. Lançada</b></td>';
		$html .= '<td><b>Qtd. Vendida</b></td>';
		$html .= '<td><b>Data</b></td>';
		$html .= '</tr>';
		
		//Selecionar todos os itens da tabela 
		$result = "SELECT v.operador, v.nome, v.total, l.quantidade FROM sacolas_abril  as v INNER JOIN sacolas_vendidas_por_operador_exel  as l ON v.operador = l.operador WHERE v.data = '$data_procura' and l.data = '$data_procura' ORDER BY operador ASC";
		$resultado = mysqli_query($conn4 , $result);
		
		while($row = mysqli_fetch_assoc($resultado)){
			$html .= '<tr>';
			$html .= '<td>'.$row["operador"].'</td>';
			$html .= '<td>'.$row["nome"].'</td>';
			$html .= '<td>'.$row["total"].'</td>';
			$html .= '<td>'.$row["quantidade"].'</td>';
			$html .= '<td>'.$data_procura.'</td>';
			$html .= '</tr>';
			;
		}
		}

		if ($data_mes == 5){
			$arquivo = 'comparacao_lancamento_vs_venda_sacolas.xls';
		
		// Criamos uma tabela HTML com o formato da planilha
		$html = '';
		$html .= '<table border="1">';
		$html .= '<tr>';
		$html .= '<td colspan="5">Planilha Comparacao De Vendas</tr>';
		$html .= '</tr>';
		
		
		$html .= '<tr>';
		$html .= '<td><b>Operador</b></td>';
		$html .= '<td><b>Nome</b></td>';
		$html .= '<td><b>Qtd. Lançada</b></td>';
		$html .= '<td><b>Qtd. Vendida</b></td>';
		$html .= '<td><b>Data</b></td>';
		$html .= '</tr>';
		
		
		//Selecionar todos os itens da tabela 
		$result = "SELECT v.operador, v.nome, v.total, l.quantidade FROM sacolas_maio  as v INNER JOIN sacolas_vendidas_por_operador_exel  as l ON v.operador = l.operador WHERE v.data = '$data_procura' and l.data = '$data_procura' ORDER BY operador ASC";
		$resultado = mysqli_query($conn4 , $result);
		
		while($row = mysqli_fetch_assoc($resultado)){
			$html .= '<tr>';
			$html .= '<td>'.$row["operador"].'</td>';
			$html .= '<td>'.$row["nome"].'</td>';
			$html .= '<td>'.$row["total"].'</td>';
			$html .= '<td>'.$row["quantidade"].'</td>';
			$html .= '<td>'.$data_procura.'</td>';
			$html .= '</tr>';
			;
		}
		}

		if ($data_mes == 6){
			$arquivo = 'comparacao_lancamento_vs_venda_sacolas.xls';
		
		// Criamos uma tabela HTML com o formato da planilha
		$html = '';
		$html .= '<table border="1">';
		$html .= '<tr>';
		$html .= '<td colspan="5">Planilha Comparacao De Vendas</tr>';
		$html .= '</tr>';
		
		
		$html .= '<tr>';
		$html .= '<td><b>Operador</b></td>';
		$html .= '<td><b>Nome</b></td>';
		$html .= '<td><b>Qtd. Lançada</b></td>';
		$html .= '<td><b>Qtd. Vendida</b></td>';
		$html .= '<td><b>Data</b></td>';
		$html .= '</tr>';
		
		
		//Selecionar todos os itens da tabela 
		$result = "SELECT v.operador, v.nome, v.total, l.quantidade FROM sacolas_junho  as v INNER JOIN sacolas_vendidas_por_operador_exel  as l ON v.operador = l.operador WHERE v.data = '$data_procura' and l.data = '$data_procura' ORDER BY operador ASC";
		$resultado = mysqli_query($conn4 , $result);
		
		while($row = mysqli_fetch_assoc($resultado)){
			$html .= '<tr>';
			$html .= '<td>'.$row["operador"].'</td>';
			$html .= '<td>'.$row["nome"].'</td>';
			$html .= '<td>'.$row["total"].'</td>';
			$html .= '<td>'.$row["quantidade"].'</td>';
			$html .= '<td>'.$data_procura.'</td>';
			$html .= '</tr>';
			;
		}
		}


		if ($data_mes == 7){
			$arquivo = 'comparacao_lancamento_vs_venda_sacolas.xls';
		
		// Criamos uma tabela HTML com o formato da planilha
		$html = '';
		$html .= '<table border="1">';
		$html .= '<tr>';
		$html .= '<td colspan="5">Planilha Comparacao De Vendas</tr>';
		$html .= '</tr>';
		
		
		$html .= '<tr>';
		$html .= '<td><b>Operador</b></td>';
		$html .= '<td><b>Nome</b></td>';
		$html .= '<td><b>Qtd. Lançada</b></td>';
		$html .= '<td><b>Qtd. Vendida</b></td>';
		$html .= '<td><b>Data</b></td>';
		$html .= '</tr>';
		
		
		//Selecionar todos os itens da tabela 
		$result = "SELECT v.operador, v.nome, v.total, l.quantidade FROM sacolas_julho  as v INNER JOIN sacolas_vendidas_por_operador_exel  as l ON v.operador = l.operador WHERE v.data = '$data_procura' and l.data = '$data_procura' ORDER BY operador ASC";
		$resultado = mysqli_query($conn4 , $result);
		
		while($row = mysqli_fetch_assoc($resultado)){
			$html .= '<tr>';
			$html .= '<td>'.$row["operador"].'</td>';
			$html .= '<td>'.$row["nome"].'</td>';
			$html .= '<td>'.$row["total"].'</td>';
			$html .= '<td>'.$row["quantidade"].'</td>';
			$html .= '<td>'.$data_procura.'</td>';
			$html .= '</tr>';
			;
		}
		}

		if ($data_mes == 8){
			$arquivo = 'comparacao_lancamento_vs_venda_sacolas.xls';
		
		// Criamos uma tabela HTML com o formato da planilha
		$html = '';
		$html .= '<table border="1">';
		$html .= '<tr>';
		$html .= '<td colspan="5">Planilha Comparacao De Vendas</tr>';
		$html .= '</tr>';
		
		
		$html .= '<tr>';
		$html .= '<td><b>Operador</b></td>';
		$html .= '<td><b>Nome</b></td>';
		$html .= '<td><b>Qtd. Lançada</b></td>';
		$html .= '<td><b>Qtd. Vendida</b></td>';
		$html .= '<td><b>Data</b></td>';
		$html .= '</tr>';
		
		
		//Selecionar todos os itens da tabela 
		$result = "SELECT v.operador, v.nome, v.total, l.quantidade FROM sacolas_agosto  as v INNER JOIN sacolas_vendidas_por_operador_exel  as l ON v.operador = l.operador WHERE v.data = '$data_procura' and l.data = '$data_procura' ORDER BY operador ASC";
		$resultado = mysqli_query($conn4 , $result);
		
		while($row = mysqli_fetch_assoc($resultado)){
			$html .= '<tr>';
			$html .= '<td>'.$row["operador"].'</td>';
			$html .= '<td>'.$row["nome"].'</td>';
			$html .= '<td>'.$row["total"].'</td>';
			$html .= '<td>'.$row["quantidade"].'</td>';
			$html .= '<td>'.$data_procura.'</td>';
			$html .= '</tr>';
			;
		}
		}

		if ($data_mes == 9){
			$arquivo = 'comparacao_lancamento_vs_venda_sacolas.xls';
		
		// Criamos uma tabela HTML com o formato da planilha
		$html = '';
		$html .= '<table border="1">';
		$html .= '<tr>';
		$html .= '<td colspan="5">Planilha Comparacao De Vendas</tr>';
		$html .= '</tr>';
		
		
		$html .= '<tr>';
		$html .= '<td><b>Operador</b></td>';
		$html .= '<td><b>Nome</b></td>';
		$html .= '<td><b>Qtd. Lançada</b></td>';
		$html .= '<td><b>Qtd. Vendida</b></td>';
		$html .= '<td><b>Data</b></td>';
		$html .= '</tr>';
		
		
		//Selecionar todos os itens da tabela 
		$result = "SELECT v.operador, v.nome, v.total, l.quantidade FROM sacolas_setembro  as v INNER JOIN sacolas_vendidas_por_operador_exel  as l ON v.operador = l.operador WHERE v.data = '$data_procura' and l.data = '$data_procura' ORDER BY operador ASC";
		$resultado = mysqli_query($conn4 , $result);
		
		while($row = mysqli_fetch_assoc($resultado)){
			$html .= '<tr>';
			$html .= '<td>'.$row["operador"].'</td>';
			$html .= '<td>'.$row["nome"].'</td>';
			$html .= '<td>'.$row["total"].'</td>';
			$html .= '<td>'.$row["quantidade"].'</td>';
			$html .= '<td>'.$data_procura.'</td>';
			$html .= '</tr>';
			;
		}
		}

		if ($data_mes == 10){
			$arquivo = 'comparacao_lancamento_vs_venda_sacolas.xls';
		
		// Criamos uma tabela HTML com o formato da planilha
		$html = '';
		$html .= '<table border="1">';
		$html .= '<tr>';
		$html .= '<td colspan="5">Planilha Comparacao De Vendas</tr>';
		$html .= '</tr>';
		
		
		$html .= '<tr>';
		$html .= '<td><b>Operador</b></td>';
		$html .= '<td><b>Nome</b></td>';
		$html .= '<td><b>Qtd. Lançada</b></td>';
		$html .= '<td><b>Qtd. Vendida</b></td>';
		$html .= '<td><b>Data</b></td>';
		$html .= '</tr>';
		
		
		//Selecionar todos os itens da tabela 
		$result = "SELECT v.operador, v.nome, v.total, l.quantidade FROM sacolas_outubro  as v INNER JOIN sacolas_vendidas_por_operador_exel  as l ON v.operador = l.operador WHERE v.data = '$data_procura' and l.data = '$data_procura' ORDER BY operador ASC";
		$resultado = mysqli_query($conn4 , $result);
		
		while($row = mysqli_fetch_assoc($resultado)){
			$html .= '<tr>';
			$html .= '<td>'.$row["operador"].'</td>';
			$html .= '<td>'.$row["nome"].'</td>';
			$html .= '<td>'.$row["total"].'</td>';
			$html .= '<td>'.$row["quantidade"].'</td>';
			$html .= '<td>'.$data_procura.'</td>';
			$html .= '</tr>';
			;
		}
		}

		if ($data_mes == 11){
			$arquivo = 'comparacao_lancamento_vs_venda_sacolas.xls';
		
		// Criamos uma tabela HTML com o formato da planilha
		$html = '';
		$html .= '<table border="1">';
		$html .= '<tr>';
		$html .= '<td colspan="5">Planilha Comparacao De Vendas</tr>';
		$html .= '</tr>';
		
		
		$html .= '<tr>';
		$html .= '<td><b>Operador</b></td>';
		$html .= '<td><b>Nome</b></td>';
		$html .= '<td><b>Qtd. Lançada</b></td>';
		$html .= '<td><b>Qtd. Vendida</b></td>';
		$html .= '<td><b>Data</b></td>';
		$html .= '</tr>';
		
		
		//Selecionar todos os itens da tabela 
		$result = "SELECT v.operador, v.nome, v.total, l.quantidade FROM sacolas_novembro  as v INNER JOIN sacolas_vendidas_por_operador_exel  as l ON v.operador = l.operador WHERE v.data = '$data_procura' and l.data = '$data_procura' ORDER BY operador ASC";
		$resultado = mysqli_query($conn4 , $result);
		
		while($row = mysqli_fetch_assoc($resultado)){
			$html .= '<tr>';
			$html .= '<td>'.$row["operador"].'</td>';
			$html .= '<td>'.$row["nome"].'</td>';
			$html .= '<td>'.$row["total"].'</td>';
			$html .= '<td>'.$row["quantidade"].'</td>';
			$html .= '<td>'.$data_procura.'</td>';
			$html .= '</tr>';
			;
		}
		}
		
		if ($data_mes == 12){
			$arquivo = 'comparacao_lancamento_vs_venda_sacolas.xls';
		
		// Criamos uma tabela HTML com o formato da planilha
		$html = '';
		$html .= '<table border="1">';
		$html .= '<tr>';
		$html .= '<td colspan="5">Planilha Comparacao De Vendas</tr>';
		$html .= '</tr>';
		
		
		$html .= '<tr>';
		$html .= '<td><b>Operador</b></td>';
		$html .= '<td><b>Nome</b></td>';
		$html .= '<td><b>Qtd. Lançada</b></td>';
		$html .= '<td><b>Qtd. Vendida</b></td>';
		$html .= '<td><b>Data</b></td>';
		$html .= '</tr>';
		
		


		
		//Selecionar todos os itens da tabela 
		$result = "SELECT v.operador, v.nome, v.total, l.quantidade FROM sacolas_dezembro  as v INNER JOIN sacolas_vendidas_por_operador_exel  as l ON v.operador = l.operador WHERE v.data = '$data_procura' and l.data = '$data_procura' ORDER BY operador ASC";
		$resultado = mysqli_query($conn4 , $result);
		
		while($row = mysqli_fetch_assoc($resultado)){
			$html .= '<tr>';
			$html .= '<td>'.$row["operador"].'</td>';
			$html .= '<td>'.$row["nome"].'</td>';
			$html .= '<td>'.$row["total"].'</td>';
			$html .= '<td>'.$row["quantidade"].'</td>';
			$html .= '<td>'.$data_procura.'</td>';
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