<?php	
	error_reporting(E_ALL);
	session_start();
	include("conexao.php");
	date_default_timezone_set ("America/Rio_Branco");
	/*
	if (isset($_POST['session'])) {
		$session = eval("return {$_POST['session']};");
		if (is_array($session)) {
			$_SESSION = $session;
			header("Location: {$_SERVER['PHP_SELF']}?saved");
		}
		else {
			header("Location: {$_SERVER['PHP_SELF']}?error");
		}
	}	

	$session = htmlentities(var_export($_SESSION, true));
	*/

	if(isset($_GET['token'])){
		$token = $_GET['token'];
		$_SESSION["dt_logout"] = date('Y/m/d');
		$_SESSION["hr_logout"] = date('H:i:s');
		$dataSaida = $_SESSION["dt_logout"];
		$horaSaida = $_SESSION["hr_logout"];
		
		
		//Add na tabela de log as informações de log de login.
		$updateUsuarioLog = $pdo->prepare("UPDATE usuario_log
												SET dataSaida = ?, 
													horaSaida = ?, 
													acess     = ?
											WHERE token = ?");
		$updateUsuarioLog->bindValue(1, $dataSaida);	 
		$updateUsuarioLog->bindValue(2, $horaSaida);	
		$updateUsuarioLog->bindValue(3, 2);	
		$updateUsuarioLog->bindValue(4, $token);
		$updateUsuarioLog->execute();
	} else {
		header("Location: indexFluxo.php"); 
	}

	session_unset(); // Eliminar todas as variáveis da sessão
	session_destroy(); // Destruir a sessão

	header("Location: index.php"); 
?>