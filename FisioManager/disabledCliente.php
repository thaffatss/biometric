<?php	
	include("conexao.php");

		if(isset($_GET['id'])){
			$id = $_GET['id'];
            $bloqued = $_GET['bloquear'];

			$desativarCliente= $pdo->prepare("UPDATE cliente
											   SET disabled = ?
											   WHERE idCliente = ?");
            $desativarCliente->bindValue(1, $bloqued);
			$desativarCliente->bindValue(2, $id);
			if($desativarCliente->execute()){	
				header("Location: indexCliente_Disabled.php");
			}else{
				header("Location: indexCliente_Disabled.php");
			}
		}else{
			echo "Erro grave";
		}
	
?>