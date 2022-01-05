<?php	
	include("conexao.php");

		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$deleteReceita = $pdo->prepare("DELETE FROM receita WHERE idReceita = ?");
			$deleteReceita->bindValue(1, $id);
			if($deleteReceita->execute()){
				header("Location: indexReceitas.php");	
			}else{
				header("Location: indexReceitas.php");
			}
		}else{
			echo "Erro grave";
		}					
	
?>