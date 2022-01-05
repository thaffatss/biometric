<?php	
	include("conexao.php");

		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$deletaCliente = $pdo->prepare("DELETE FROM cliente WHERE idCliente = ?");
			$deletaCliente->bindValue(1, $id);
			if($deletaCliente->execute()){
				header("Location: indexCliente.php");	
			}else{
				header("Location: indexCliente.php");
			}
		}else{
			echo "Erro grave";
		}					
	
?>