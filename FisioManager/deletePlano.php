<?php	
	include("conexao.php");

		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$deletePlano = $pdo->prepare("DELETE FROM planos WHERE idPlano = ?");
			$deletePlano->bindValue(1, $id);
			if($deletePlano->execute()){
				header("Location: indexPlanos.php");	
			}else{
				header("Location: indexPlanos.php");
			}
		}else{
			echo "Erro grave";
		}					
	
?>