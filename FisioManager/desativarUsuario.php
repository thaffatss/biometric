<?php	
	include("conexao.php");

		if(isset($_GET['id'])){
			$user_id = $_GET['id'];
			$desativarUsuario = $pdo->prepare("UPDATE usuario
											   SET status = 0
											   WHERE idUsuario = ?");
			$desativarUsuario->bindValue(1, $user_id);
			if($desativarUsuario->execute()){	
				header("Location: indexUsuarioInativos.php");
			}else{
				header("Location: indexUsuarioAtivos.php");
			}
		}else{
			echo "Erro grave";
		}
	
?>