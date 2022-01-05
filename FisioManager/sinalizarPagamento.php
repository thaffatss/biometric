<?php	
	include("conexao.php");
	date_default_timezone_set('America/Rio_Branco');
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$sinalPago = $pdo->prepare("UPDATE cliente SET status_pago = 1 WHERE idCliente = ?");
			$sinalPago->bindValue(1, $id);
			$sinalPago->execute();
			header("Location: indexFluxo.php");	
		}else{
			echo "Erro ao atualizar status do pagamento!";
		}			
?>