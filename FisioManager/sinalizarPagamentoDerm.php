<?php	
	include("conexao.php");
	date_default_timezone_set('America/Rio_Branco');
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$sinalPago = $pdo->prepare("UPDATE cliente_estetica SET status_pago = 1 WHERE idCliente_estetica = ?");
			$sinalPago->bindValue(1, $id);
			$sinalPago->execute();
			header("Location: indexFluxo_Derm.php");	
		}else{
			echo "Erro ao atualizar status do pagamento!";
		}			
?>