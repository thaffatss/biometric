<?php 
error_reporting(E_ALL);
session_start();
include("conexao.php");
    if(isset($_POST['id']) && !empty($_POST['id'])) {
        $updateSessoes = $pdo->prepare("UPDATE cliente_pilates SET sessoes = sessoes-1 WHERE idCliente_pilates = ? AND sessoes >= 1"); 
        $updateSessoes->bindValue(1, $_POST['id']);	
        $updateSessoes->execute();

        $updateStatusPago = $pdo->prepare("UPDATE cliente_pilates SET status_pago = 0 WHERE idCliente_pilates = ? AND sessoes <= 0"); 
        $updateStatusPago->bindValue(1, $_POST['id']);	
        $updateStatusPago->execute();
	}

?>