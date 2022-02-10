<?php	
	include("conexao.php");

		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$deleteProf = $pdo->prepare("DELETE FROM professor WHERE id = ?");
			$deleteProf->bindValue(1, $id);
			if($deleteProf->execute()){
				header("Location: indexProfessor.php");	
			}else{
				header("Location: indexProfessor.php");
			}
		}else{
			echo "Erro grave";
		}					
	
?>