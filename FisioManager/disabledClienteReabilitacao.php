<?php	
	include("conexao.php");

		if(isset($_GET['id'])){
			$id = $_GET['id'];
            $bloqued = $_GET['bloquear'];

			$desativarCliente= $pdo->prepare("UPDATE cliente_reabilitacao
											   SET disabled = ?
											   WHERE idCliente_reabilitacao = ?");
            $desativarCliente->bindValue(1, $bloqued);
			$desativarCliente->bindValue(2, $id);
			if($desativarCliente->execute()){	
				header("Location: indexCliente_Reabilitacao.php");
			}else{
				header("Location: indexCliente_Reabilitacao.php");
			}
		}else{
			echo "Erro grave";
		}
	
?>