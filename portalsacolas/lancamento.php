<?php
	session_start();
	if (isset($_SESSION["usuario"])) {
		$adm = $_SESSION["usuario"][1];
		$nome = $_SESSION["usuario"][0];
	}else{
		echo "<script>window.location = 'login2.php'</script>";
	}
	date_default_timezone_set('America/sao_paulo');
	include 'header.php';
	include 'conexao.php';
?>
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
	<script type="text/javascript">
		Date.prototype.toDateInputValue = (function() {
			    var local = new Date(this);
			    local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
			    return local.toJSON().slice(0,10);
			});
			$(document).ready( function() {
			    $('.data_input').val(new Date().toDateInputValue());
			});
	</script>
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


	<div style=" background: #021bfa; width: 80%;height: 150px;margin-left: 10.2%;border: 2px solid black;display: block;border-radius: 50px;" class="caixa" id="total_venda">
			<p> 
				<?php
				echo "Total de Sacolas Lançadas em: "; 
				if (isset($_POST['procurar'])) {
					$data = $_POST['data'];
					echo $data;
				}
				 ?>
			</p>
			<p  style="font-size: 23px; text-align: center;" id="quantidade2">
				<?php
				if (isset($_POST['procurar'])) {
					$data_mes = date('m');
					if ($data_mes == 1) {
						$data = $_POST['data'];
				$listagem = $conn2->prepare("SELECT SUM(total) as soma_total FROM sacolas_janeiro WHERE data = '$data'");
				$listagem->execute();
					$row = $listagem->fetch(); 
					echo "$row[soma_total]". " Sacolas";
					echo "  / ";
					echo ($row['soma_total'] / 250) . " Fardos";
					}
				
				}
			 ?>

			 <?php
				if (isset($_POST['procurar'])) {
					$data_mes = date('m');
					if ($data_mes == 2) {
						$data = $_POST['data'];
				$listagem = $conn2->prepare("SELECT SUM(total) as soma_total FROM sacolas_fevereiro WHERE data = '$data'");
				$listagem->execute();
					$row = $listagem->fetch(); 
					echo "$row[soma_total]". " Sacolas";
					echo "  / ";
					echo ($row['soma_total'] / 250) . " Fardos";
					}
				
				}
			 ?>

			 <?php
				if (isset($_POST['procurar'])) {
					$data_mes = date('m');
					if ($data_mes == 3) {
						$data = $_POST['data'];
				$listagem = $conn2->prepare("SELECT SUM(total) as soma_total FROM sacolas_marco WHERE data = '$data'");
				$listagem->execute();
					$row = $listagem->fetch(); 
					echo "$row[soma_total]". " Sacolas";
					echo "  / ";
					echo ($row['soma_total'] / 250) . " Fardos";
					}
				
				}
			 ?>

			 <?php
				if (isset($_POST['procurar'])) {
					$data_mes = date('m');
					if ($data_mes == 4) {
						$data = $_POST['data'];
				$listagem = $conn2->prepare("SELECT SUM(total) as soma_total FROM sacolas_abril WHERE data = '$data'");
				$listagem->execute();
					$row = $listagem->fetch(); 
					echo "$row[soma_total]". " Sacolas";
					echo "  / ";
					echo ($row['soma_total'] / 250) . " Fardos";
					}
				
				}
			 ?>

			 <?php
				if (isset($_POST['procurar'])) {
					$data_mes = date('m');
					if ($data_mes == 5) {
						$data = $_POST['data'];
				$listagem = $conn2->prepare("SELECT SUM(total) as soma_total FROM sacolas_maio WHERE data = '$data'");
				$listagem->execute();
					$row = $listagem->fetch(); 
					echo "$row[soma_total]". " Sacolas";
					echo "  / ";
					echo ($row['soma_total'] / 250) . " Fardos";
					}
				
				}
			 ?>

			 <?php
				if (isset($_POST['procurar'])) {
					$data_mes = date('m');
					if ($data_mes == 6) {
						$data = $_POST['data'];
				$listagem = $conn2->prepare("SELECT SUM(total) as soma_total FROM sacolas_junho WHERE data = '$data'");
				$listagem->execute();
					$row = $listagem->fetch(); 
					echo "$row[soma_total]". " Sacolas";
					echo "  / ";
					echo ($row['soma_total'] / 250) . " Fardos";
					}
				
				}
			 ?>

			 <?php
				if (isset($_POST['procurar'])) {
					$data_mes = date('m');
					if ($data_mes == 7) {
						$data = $_POST['data'];
				$listagem = $conn2->prepare("SELECT SUM(total) as soma_total FROM sacolas_julho WHERE data = '$data'");
				$listagem->execute();
					$row = $listagem->fetch(); 
					echo "$row[soma_total]". " Sacolas";
					echo "  / ";
					echo ($row['soma_total'] / 250) . " Fardos";
					}
				
				}
			 ?>

			 <?php
				if (isset($_POST['procurar'])) {
					$data_mes = date('m');
					if ($data_mes == 8) {
						$data = $_POST['data'];
				$listagem = $conn2->prepare("SELECT SUM(total) as soma_total FROM sacolas_agosto WHERE data = '$data'");
				$listagem->execute();
					$row = $listagem->fetch(); 
					echo "$row[soma_total]". " Sacolas";
					echo "  / ";
					echo ($row['soma_total'] / 250) . " Fardos";
					}
				
				}
			 ?>

			 <?php
				if (isset($_POST['procurar'])) {
					$data_mes = date('m');
					if ($data_mes == 9) {
						$data = $_POST['data'];
				$listagem = $conn2->prepare("SELECT SUM(total) as soma_total FROM sacolas_setembro WHERE data = '$data'");
				$listagem->execute();
					$row = $listagem->fetch(); 
					echo "$row[soma_total]". " Sacolas";
					echo "  / ";
					echo ($row['soma_total'] / 250) . " Fardos";
					}
				
				}
			 ?>

			 <?php
				if (isset($_POST['procurar'])) {
					$data_mes = date('m');
					if ($data_mes == 10) {
						$data = $_POST['data'];
				$listagem = $conn2->prepare("SELECT SUM(total) as soma_total FROM sacolas_outubro WHERE data = '$data'");
				$listagem->execute();
					$row = $listagem->fetch(); 
					echo "$row[soma_total]". " Sacolas";
					echo "  / ";
					echo ($row['soma_total'] / 250) . " Fardos";
					}
				
				}
			 ?>

			 <?php
				if (isset($_POST['procurar'])) {
					$data_mes = date('m');
					if ($data_mes == 11) {
						$data = $_POST['data'];
				$listagem = $conn2->prepare("SELECT SUM(total) as soma_total FROM sacolas_novembro WHERE data = '$data'");
				$listagem->execute();
					$row = $listagem->fetch(); 
					echo "$row[soma_total]". " Sacolas";
					echo "  / ";
					echo ($row['soma_total'] / 250) . " Fardos";
					}
				
				}
			 ?>

			 <?php
				if (isset($_POST['procurar'])) {
					$data_mes = date('m');
					if ($data_mes == 12) {
						$data = $_POST['data'];
				$listagem = $conn2->prepare("SELECT SUM(total) as soma_total FROM sacolas_dezembro WHERE data = '$data'");
				$listagem->execute();
					$row = $listagem->fetch(); 
					echo "$row[soma_total]". " Sacolas";
					echo "  / ";
					echo ($row['soma_total'] / 250) . " Fardos";
					}
				
				}
			 ?>
			</p>
</div><!--caixa-->
	
 	<?php
 		include 'lancamentoimpressao.php';
 	?>

 </body>
 </html>
