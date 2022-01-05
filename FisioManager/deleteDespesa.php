<?php	
	include("conexao.php");

		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$deletaDespesa = $pdo->prepare("DELETE FROM despesa WHERE idDespesa = ?");
			$deletaDespesa->bindValue(1, $id);
			if($deletaDespesa->execute()){
				header("Location: indexDespesas.php");	
			}else{
				header("Location: indexDespesas.php");
			}
		}else{
			echo "Erro grave";
		}					
	
?>