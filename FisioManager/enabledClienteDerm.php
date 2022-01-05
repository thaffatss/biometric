<?php	
	include("conexao.php");

		if(isset($_GET['id'])){
			$id = $_GET['id'];
            $onlock = $_GET['desbloquear'];

			$desativarCliente= $pdo->prepare("UPDATE cliente_estetica
											   SET disabled             = ?
											   WHERE idCliente_estetica = ?");
            $desativarCliente->bindValue(1, $onlock);
			$desativarCliente->bindValue(2, $id);
			if($desativarCliente->execute()){	
				header("Location: indexCliente_Derm_Disabled.php");
			}else{
				header("Location: indexCliente_Derm_Disabled.php");
			}
		}else{
			echo "Erro grave";
		}
	
?>