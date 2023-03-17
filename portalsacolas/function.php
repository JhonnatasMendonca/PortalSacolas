<?php
date_default_timezone_set('America/sao_paulo');
include_once("conexao.php");

function retorna($Operador, $conn3){
	$result_operador = "SELECT * FROM cadastro_op WHERE operador = '$Operador' LIMIT 1";
	$resultado_operador = mysqli_query($conn3, $result_operador);
	if($resultado_operador->num_rows){
		$row_operador = mysqli_fetch_assoc($resultado_operador);
		$valores['nome'] = $row_operador['nome'];
	}else{
		$valores['nome'] = '';
		
	}

	return json_encode($valores);

	
}

if(isset($_GET['Operador'])){
	echo retorna($_GET['Operador'], $conn3);
}
?>