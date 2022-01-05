<?php	
	include("conexao.php");

		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$deletaCliente = $pdo->prepare("DELETE FROM cliente_estetica WHERE idCliente_estetica = ?");
			$deletaCliente->bindValue(1, $id);
			if($deletaCliente->execute()){
				header("Location: indexCliente_Derm.php");	
			}else{
				header("Location: indexCliente_Derm.php");
			}
		}else{
			echo "Erro grave";
		}					
	
?>