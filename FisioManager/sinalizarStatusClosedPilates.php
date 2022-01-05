<?php	
	include("conexao.php");

		if(isset($_GET['id']) && isset($_GET['date'])) {
			$id = $_GET['id'];
			$data = $_GET['date'];
			$sinalStatus = $pdo->prepare("UPDATE cliente_pilates SET status = 0, dataBloqueio = '$data' WHERE idCliente_pilates = ?");
			$sinalStatus->bindValue(1, $id);
			$sinalStatus->execute();
			header("Location: indexCliente_Pilates.php");	
		}else{
			echo "Erro grave";
		}			
?>