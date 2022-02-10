<?php	
	include("conexao.php");

		if(isset($_GET['id']) && isset($_GET['date'])){
			$id = $_GET['id'];
			$date = $_GET['date'];
			$sinalStatus = $pdo->prepare("UPDATE cliente_pilates SET status = ?, dataLiberacao = ? WHERE idCliente_pilates = ?");
			$sinalStatus->bindValue(1, 1);
			$sinalStatus->bindValue(2, $date);
			$sinalStatus->bindValue(3, $id);
			$sinalStatus->execute();
			header("Location: indexCliente_Pilates.php");	
		}else{
			echo "Erro grave";
		}			
?>