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
		// Definimos o nome do arquivo que será exportado
		$arquivo = 'Operadores_Cadastrados.xls';
		
		// Criamos uma tabela HTML com o formato da planilha
		$html = '';
		$html .= '<table border="1">';
		$html .= '<tr>';
		$html .= '<td colspan="4">Planilha Operadores Cadastrados</tr>';
		$html .= '</tr>';
		
		
		$html .= '<tr>';
		$html .= '<td><b>ID</b></td>';
		$html .= '<td><b>Operador</b></td>';
		$html .= '<td><b>Nome</b></td>';
		$html .= '<td><b>Created</b></td>';
		$html .= '</tr>';
		
		//Selecionar todos os itens da tabela 
		$result = "SELECT * FROM cadastro_op";
		$resultado = mysqli_query($conn3 , $result);
		
		while($row = mysqli_fetch_assoc($resultado)){
			$html .= '<tr>';
			$html .= '<td>'.$row["id"].'</td>';
			$html .= '<td>'.$row["operador"].'</td>';
			$html .= '<td>'.$row["nome"].'</td>';
			$data = date('d/m/Y H:i:s',strtotime($row["created"]));
			$html .= '<td>'.$data.'</td>';
			$html .= '</tr>';
			;
		}
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