<?php	
	include("conexao.php");

		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$deletaCliente = $pdo->prepare("DELETE FROM cliente_reabilitacao WHERE idCliente_reabilitacao = ?");
			$deletaCliente->bindValue(1, $id);
			if($deletaCliente->execute()){
				header("Location: indexCliente_Reabilitacao.php");	
			}else{
				header("Location: indexCliente_Reabilitacao.php");
			}
		}else{
			echo "Erro grave";
		}					
	
?>