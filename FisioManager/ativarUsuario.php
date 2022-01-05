	<?php	
	include("conexao.php");
	
		if(isset($_GET['id'])){
			$user_id = $_GET['id'];
			
			$ativarUsuario = $pdo->prepare("UPDATE usuario
											SET status = 1
											WHERE idUsuario = ?");
			$ativarUsuario->bindValue(1, $user_id);
			if($ativarUsuario->execute()){
				header("Location: indexUsuarioAtivos.php");	
			}else{
				header("Location: indexUsuarioInativos.php");
			}
		}else{
			echo "Erro grave";
		}		
?>