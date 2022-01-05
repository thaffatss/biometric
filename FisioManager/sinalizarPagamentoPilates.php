<?php	
	include("conexao.php");
		date_default_timezone_set('America/Rio_Branco');
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$sinalPago = $pdo->prepare("UPDATE cliente_pilates SET status_pago  = 1 WHERE idCliente_pilates = ? AND dataFim >= ?");
			$sinalPago->bindValue(1, $id);
			$sinalPago->bindValue(2, date('Y/m/d'));
			$sinalPago->execute();

			header("Location: indexFluxo_Pilates.php");	
		}else{
			echo "Erro ao atualizar status do pagamento!";
		}
?>