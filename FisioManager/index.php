<?php	
	ob_start();
	session_start();
	$erro_acesso = 0;
	date_default_timezone_set ("America/Rio_Branco");

	if(isset($_POST['user_login'])){
		include("conexao.php");
		
		$user_login = $_POST['user_login'];
		$user_senha = $_POST['user_senha'];
		
		$buscaUsuario = $pdo->prepare("SELECT idUsuario, nome, login, senha, status, perfil FROM usuario"); 
		//$buscaUsuario->bindValue(1, $user_login);
		//$buscaUsuario->bindValue(2, $user_senha);
		$buscaUsuario->execute();
		$row = $buscaUsuario -> fetchAll(PDO:: FETCH_OBJ);		
		foreach($row as $mostre) :
			
			if (($mostre->login == $user_login) and 
				($mostre->senha == $user_senha)) {
				
					
				//se o status do usuario for igual a 1 (ativo)
				if ($mostre->status == 1) {
					$_SESSION["nome_usuario"] = $mostre->nome;
					$_SESSION["login_usuario"] = $mostre->login;
					$_SESSION["perfil_usuario"] = $mostre->perfil;
					$_SESSION["status_usuario"] = $mostre->status;
					$_SESSION["id_usuario"] = $mostre->idUsuario;
					$_SESSION["dt_login"] = date('Y/m/d');
					$_SESSION["hr_login"] = date('H:i:s');
					$_SESSION['token'] = bin2hex(random_bytes(64));

					//Add na tabela de log as informações de log de login.
					$inserirFluxo = $pdo->prepare("INSERT INTO usuario_log (
																			idUsuario,
																			nomeUsuario,
																			dataEntrada, 
																			horaEntrada,
																			token,
																			acess,
																			ipaddress
																			) 
																		VALUES(?,?,?,?,?,?,?)");
					$inserirFluxo->bindValue(1, $_SESSION["id_usuario"]);	 
					$inserirFluxo->bindValue(2, $_SESSION["nome_usuario"]);	
					$inserirFluxo->bindValue(3, $_SESSION["dt_login"]);
					$inserirFluxo->bindValue(4, $_SESSION["hr_login"]);
					$inserirFluxo->bindValue(5, $_SESSION['token']);
					$inserirFluxo->bindValue(6, 1);
					$inserirFluxo->bindValue(7, getHostByName(getHostName()));
					$inserirFluxo->execute();

					//redireciona
					header("Location: dashBoard.php");
					
				} else {
					$erro_acesso = 1;
				}
			} else {
				$erro_acesso = 2;
			}
		endforeach;
	}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Login</title>
	<!-- BOOTSTRAP STYLES-->
	<link href="css/bootstrap.min.css" rel="stylesheet" />
	<!-- FONTAWESOME STYLES-->
	<link href="css/font-awesome.css" rel="stylesheet" />
	<!-- MORRIS CHART STYLES-->
	<link href="js/morris/morris-0.4.3.min.css" rel="stylesheet" />
	<!-- CUSTOM STYLES-->
	<link href="css/custom.css" rel="stylesheet" />
	<!-- GOOGLE FONTS-->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
		
	<link rel="stylesheet" type="text/css" href="css/login.css">

	<link type="text/css" href="css/style.css" rel="stylesheet">
	<link rel="apple-touch-icon" sizes="180x180" href="img/favicon/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="img/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="img/favicon/favicon-16x16.png">
	<link rel="manifest" href="img/favicon/site.webmanifest">
	
</head>

<body>
<div class="wrapper fadeInDown">
	<div id="formContent">
		<!-- Tabs Titles -->
		<?php if($erro_acesso == 0): ?>
		<?php if($erro_acesso == 1): ?>
			<div class="alert alert-danger" role="alert" style="margin-bottom: 0px;">
				<button type="button" class="close" data-dismiss="alert" style="font-size: 12px; padding: 5px;">x</button>
				<?php echo "Usuário não possui acesso ao sistema!" ?>
			</div>
		<?php endif; ?>
		<?php endif; ?>
		<?php if($erro_acesso == 2): ?>
			<div class="alert alert-danger" role="alert" style="margin-bottom: 0px;">
				<button type="button" class="close" data-dismiss="alert" style="font-size: 12px; padding: 5px;">x</button>
				<?php echo "Usuário e/ou senha incorretos!" ?>
			</div>
		<?php endif; ?>
		<?php if($erro_acesso == 3): ?>
			<div class="alert alert-danger" role="alert" style="margin-bottom: 0px;">
				<button type="button" class="close" data-dismiss="alert" style="font-size: 12px; padding: 5px;">x</button>
				<?php echo "Esse usuário já está logado no sistema!" ?>
			</div>
		<?php endif; ?>

		<!-- Icon -->
		<div class="fadeIn first" style="padding: 30px;">
			<img src="img/logo.png" id="icon" alt="User Icon" />
		</div>

		<!-- Login Form -->
		<form method="POST" action="">
			<input type="text" id="login" class="fadeIn second" name="user_login" placeholder="Digite seu ID" autocomplete="off">
			<input type="password" id="password" class="fadeIn third" name="user_senha" placeholder="Digite sua senha" autocomplete="off">
			<input type="submit" id="submit" name="submit" class="fadeIn fourth" value="Entrar">
		</form>
	</div>

</div>
</body>
</html>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.mask.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/script.js"></script>
<!-- Faz com quer ao entrar na tela de login o cursor do mouse fique no campo Identificação do usuário, setando o id do campo e usando o metodo .focus() -->
<script type="text/javascript">
    document.getElementById("login").focus();
</script>
