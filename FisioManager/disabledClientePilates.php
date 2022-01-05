<?php	
	include("conexao.php");

		if(isset($_GET['id'])){
			$id = $_GET['id'];
            $bloqued = $_GET['bloquear'];

			$desativarCliente= $pdo->prepare("UPDATE cliente_pilates
											   SET disabled = ?
											   WHERE idCliente_pilates = ?");
            $desativarCliente->bindValue(1, $bloqued);
			$desativarCliente->bindValue(2, $id);
			if($desativarCliente->execute()){	
				header("Location: indexCliente_Pilates.php");
			}else{
				header("Location: indexCliente_Pilates.php");
			}
		}else{
			echo "Erro grave";
		}
	
?>