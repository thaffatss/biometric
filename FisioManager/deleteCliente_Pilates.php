<?php	
	include("conexao.php");

		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$deletaClientePilates = $pdo->prepare("DELETE FROM cliente_pilates WHERE idCliente_pilates = ?");
			$deletaClientePilates->bindValue(1, $id);
			if($deletaClientePilates->execute()){
				header("Location: indexCliente_Pilates.php");	
			}else{
				header("Location: indexCliente_Pilates.php");
			}
		}else{
			echo "Erro grave";
		}					
	
?>