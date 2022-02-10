<?php 
error_reporting(E_ALL);
session_start();
include("conexao.php");
    if(isset($_POST['template']) && !empty($_POST['template']) && isset($_POST['id']) && !empty($_POST['id'])) {
        $updateTemplate = $pdo->prepare("UPDATE cliente_reabilitacao SET template = ? WHERE idCliente_reabilitacao = ?");
        $updateTemplate->bindValue(1, $_POST['template']);	 
        $updateTemplate->bindValue(2, $_POST['id']);	
        $updateTemplate->execute();   
	}
?>
