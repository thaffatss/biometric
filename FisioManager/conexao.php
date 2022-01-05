<?php
	ini_set('display_errors', 'Off');
	error_reporting(E_ALL | E_STRICT);
	ob_start();
	session_start();
	
	//conexao com o banco de dados
	//host - ip (localhost ou 127.0.0.1 (msm coisa) )
	$pdo = new PDO("mysql:host=127.0.0.1;dbname=cnmana94_cnmanagerdb", "root", "", array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
	
	if (isset($_POST['session'])) {
		$session = eval("return {$_POST['session']};");
		if (is_array($session)) {
			$_SESSION = $session;			
		} else {
			header("Location: index.php");
		}
	} 

	$session = htmlentities(var_export($_SESSION, true));
?>