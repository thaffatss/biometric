<?php
	include("conexao.php");
	error_reporting(E_ALL);
	session_start();
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
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0; charset=utf-8" />
		<title>CNManager</title>
		<!-- BOOTSTRAP STYLES-->
		<link href="css/bootstrap.min.css" rel="stylesheet" />
		 <!-- FONTAWESOME STYLES-->
		<link href="css/font-awesome.css" rel="stylesheet" />
		<link href="node_modules/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet" />
		 <!-- MORRIS CHART STYLES-->
		<link href="js/morris/morris-0.4.3.min.css" rel="stylesheet" />
			<!-- CUSTOM STYLES-->
		<link href="css/custom.css" rel="stylesheet" />
		 <!-- GOOGLE FONTS-->
		<link rel="apple-touch-icon" sizes="180x180" href="img/favicon/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="img/favicon/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="img/favicon/favicon-16x16.png">
		<link rel="manifest" href="img/favicon/site.webmanifest">
		<script type="text/javascript" src="js/jquery.js"></script>
	</head>
	<body>
	<nav class="navbar navbar-expand-lg" style="background-color: rgb(26, 6, 21);">
		<a class="navbar-brand text-white" href="dashBoard.php">CN Manager</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarText">
			<ul class="navbar-nav mr-auto" style="width: 100%;">

			<li class="nav-item dropdown" style="padding-left:20px;">
				<a href="#" class="nav-link dropdown-toggle text-white" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<img src="img/saida.png" alt="Entrada de Paciente">
					<b class="caret"></b>
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="indexFluxo_Derm.php" style="font-size: 10px;">DERM</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="indexFluxo_Reabilitacao.php" style="font-size: 10px;">REABILITAÇÃO</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="indexFluxo_Pilates.php" style="font-size: 10px;">PILATES</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="indexFluxo.php" accesskey="" style="font-size: 10px;">QUIROPRAXIA</a>
				</div>
			</li>
	
			<li class="nav-item dropdown" style="padding-left:20px;">
				<a href="#" class="nav-link dropdown-toggle text-white" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<img src="img/fisioterapia.png" alt="Pacientes">
					<b class="caret"></b>
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="indexCliente_Derm.php" style="font-size: 10px;">DERM</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="indexCliente_Reabilitacao.php" style="font-size: 10px;">REABILITAÇÃO</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="indexCliente_Pilates.php" style="font-size: 10px;">PILATES</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="indexCliente.php" accesskey="" style="font-size: 10px;">QUIROPRAXIA</a>
				</div>
			</li>

			<li class="nav-item" style="padding-left:20px;">
				<a class="nav-link" href="indexReceitas.php" accesskey="">
					<img style="width: 36px; height:36px;" src="img/receitas.png" alt="Receitas">
				</a>
			</li>
			<li class="nav-item" style="padding-left:20px;">
				<a class="nav-link" href="indexDespesas.php" accesskey="">
					<img style="width: 36px; height:36px;" src="img/despesas.png" alt="Despesas">
				</a>
			</li>
			<?php
				// Acessibilidade apenas para o adminstrador. 
				 if ($_SESSION['perfil_usuario'] == 0) { 
			?>
			<li class="nav-item dropdown" style="padding-left:20px;">
				<a href="#" class="nav-link dropdown-toggle text-white" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<img src="img/user.png" alt="Usuário do Sistema">
					<b class="caret"></b>
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="indexUsuarioAtivos.php" accesskey="" style="font-size: 10px;">USUÁRIOS ATIVOS</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="indexUsuarioInativos.php" style="font-size: 10px;">USUÁRIOS INATIVOS</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="indexUsuarioLog.php" style="font-size: 10px;">LOGS DE USUÁRIOS</a>
				</div>
			</li>
				
			<li class="nav-item dropdown" style="padding-left:20px;">
				<a href="#" class="nav-link dropdown-toggle text-white" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<img src="img/relatorio.png" alt="Relatórios">
					<b class="caret"></b>
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="relatorioGeral_Derm.php" accesskey="" style="font-size: 10px;">RELATÓRIO GERAL - DERM</a>
						<a class="dropdown-item" href="relatorioGeral_Reabilitacao.php" accesskey="" style="font-size: 10px;">RELATÓRIO GERAL - REABILITAÇÃO</a>
						<a class="dropdown-item" href="relatorioGeral_Pilates.php" accesskey="" style="font-size: 10px;">RELATÓRIO GERAL - PILATES</a>
						<a class="dropdown-item" href="relatorioGeral.php" accesskey="" style="font-size: 10px;">RELATÓRIO GERAL - QUIROPRAXIA</a>
					<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="relatorioDecisaoDerm.php" accesskey="" style="font-size: 10px;">RELATÓRIO P/ TOMADA DE DECISÕES - DERM</a>
						<a class="dropdown-item" href="relatorioDecisaoReabilitacao.php" accesskey="" style="font-size: 10px;">RELATÓRIO P/ TOMADA DE DECISÕES - REABILITAÇÃO</a>
						<a class="dropdown-item" href="relatorioDecisaoPilates.php" accesskey="" style="font-size: 10px;">RELATÓRIO P/ TOMADA DE DECISÕES - PILATES</a>
						<a class="dropdown-item" href="relatorioDecisao.php" accesskey="" style="font-size: 10px;">RELATÓRIO P/ TOMADA DE DECISÕES - QUIROPRAXIA</a>
					<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="relatorioPagamentos_Pilates.php" accesskey="" style="font-size: 10px;">RELATÓRIO DE VENCIMENTOS - PILATES</a>
					<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="relatorioPagamentoPago_Derm.php" accesskey="" style="font-size: 10px;">RELATÓRIO DE ALUNO(S) ADIMPLENTE - DERM</a>
						<a class="dropdown-item" href="relatorioPagamentoPago_Reabilitacao.php" accesskey="" style="font-size: 10px;">RELATÓRIO DE ALUNO(S) ADIMPLENTE - REABILITAÇÃO</a>
						<a class="dropdown-item" href="relatorioPagamentoPago_Pilates.php" accesskey="" style="font-size: 10px;">RELATÓRIO DE ALUNO(S) ADIMPLENTE - PILATES</a>
						<a class="dropdown-item" href="relatorioPagamentosPago_Quiropraxia.php" accesskey="" style="font-size: 10px;">RELATÓRIO DE ALUNO(S) ADIMPLENTE - QUIROPRAXIA</a>
					<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="relatorioPagamentoNaoPago_Derm.php" accesskey="" style="font-size: 10px;">RELATÓRIO DE ALUNO(S) INADIMPLENTE - DERM</a>
						<a class="dropdown-item" href="relatorioPagamentoNaoPago_Reabilitacao.php" accesskey="" style="font-size: 10px;">RELATÓRIO DE ALUNO(S) INADIMPLENTE - REABILITAÇÃO</a>
						<a class="dropdown-item" href="relatorioPagamentoNaoPago_Pilates.php" accesskey="" style="font-size: 10px;">RELATÓRIO DE ALUNO(S) INADIMPLENTE - PILATES</a>
						<a class="dropdown-item" href="relatorioPagamentosNaoPago_Quiropraxia.php" accesskey="" style="font-size: 10px;">RELATÓRIO DE ALUNO(S) INADIMPLENTE - QUIROPRAXIA</a>
					<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="relatorioProfissionaisQtdCliente.php" accesskey="" style="font-size: 10px;">RELATÓRIO DE PROFISSIONAIS</a>
					<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="relatorioDespesaReceita.php" accesskey="" style="font-size: 10px;">RELATÓRIO RECEITAS/DESPESAS</a>
				</div>
			</li>

			<li class="nav-item dropdown" style="padding-left:20px;">
				<a href="#" class="nav-link dropdown-toggle text-white" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<img src="img/config.png" alt="Avatar">
					<b class="caret"></b>
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="indexPlanos.php" accesskey="" style="font-size: 10px;">PLANOS</a>
					<a class="dropdown-item" href="indexProfissional.php" accesskey="" style="font-size: 10px;">PROFISSIONAIS</a>
				</div>
			</li>
			</ul>
			<?php
				// Fim if. 
				 }
			?>
			<?php
			$data = new DateTime();
			$locale = "pt_BR";
			$dateType = IntlDateFormatter::LONG; //type of date formatting
			$timeType = IntlDateFormatter::NONE; //type of time formatting setting to none, will give you date itself
			$formatter = new IntlDateFormatter($locale, $dateType, $timeType);
			$dateTime = new DateTime();
			?>
			<ul class="form-inline my-2 my-lg-0" style="width: 100%; justify-content: flex-end;">
			<i class="bi bi-circle-fill" style="color:#71FA00;"></i>
			<span style="margin-right: 10px; color:white; margin-left:10px;">
				<?=
					$_SESSION["nome_usuario"];
				?>
			</span>
			<div style="color:white; margin-right:10px;"><?= $formatter->format($dateTime); ?></div>
			<div id="demo" style="color:white; margin-right:10px;"></div>
			<a href="logout.php?token=<?php echo $_SESSION['token']; ?>" style="margin-left:10px;" class="btn btn-danger square-btn-adjust">Sair</a>
			</ul>
		</div>
	</nav>
	<script>
	var myVar = setInterval(myTimer ,0);
    function myTimer() {
        var d = new Date(), displayDate;
       if (navigator.userAgent.toLowerCase().indexOf('firefox') > -1) {
          displayDate = d.toLocaleTimeString('pt-BR');
       } else {
          displayDate = d.toLocaleTimeString('pt-BR', {timeZone: 'America/Rio_Branco'});
       }
          document.getElementById("demo").innerHTML = displayDate;
    }
	</script>
