<?php 
	include("conexao.php");
		
	$erro_usuario        = 0;
	$erro_nome_usuario   = 0;
	$erro_login_usuario  = 0;
	$erro_senha_usuario  = 0;
	$erro_perfil_usuario = 0;
	
	if(isset($_POST['caduser'])){
		$nome   = $_POST['nome'];
		$login  = $_POST['login'];
		$senha  = $_POST['senha'];
		$perfil = $_POST['perfil'];
		$status = 0;  //status setado como inativo
		
		/*
			Validação do campo nome (falta validar os numeros)
		*/
		if (strlen($nome) > 80) {
			$erro_nome_usuario = 1; //se for maior que o maior do campo no banco de dados
		} else if (empty($nome)) {
			$erro_nome_usuario = 2; //se for vazio
		}
		
		/*
			Validação do campo login
		*/
		if (empty($login)) {
			$erro_login_usuario = 1; //se for vazio
		} else if ((strlen($login) < 8) or (strlen($login) > 20)) {
			$erro_login_usuario = 2; //se nao existe entre o minimo e o maximo de caracteres
		}
		
		/*
			Validação do campo senha
		*/
		if (empty($senha)) {
			$erro_senha_usuario = 1; //se for vazio
		} else if ((strlen($senha) < 6) or (strlen($senha) > 10)) {
			$erro_senha_usuario = 2; //se nao estiver entre o minimo e o maximo de caracteres
		} 
		
		/*
			Validação do campo perfil
		*/
		if ($perfil == "") {
			$erro_perfil_usuario = 1; //se nao for escolhido nem 0 e nem 1 (veio vazio)
		}
		
		if (($erro_nome_usuario   == 0) &&
			($erro_login_usuario  == 0) &&
			($erro_senha_usuario  == 0) &&
			($erro_perfil_usuario == 0)) {		
			$insereUsuario = $pdo->prepare("INSERT INTO usuario (nome, login, senha, perfil, status) VALUES(?,?,?,?,?)");
			$insereUsuario->bindValue(1, $nome);	 
			$insereUsuario->bindValue(2, $login);	
			$insereUsuario->bindValue(3, $senha);
			$insereUsuario->bindValue(4, $perfil);	
			$insereUsuario->bindValue(5, $status);		
			$insereUsuario->execute();
			if($insereUsuario->rowCount() > 0){
				header("Location: index.php");
			}else{
				$erro_usuario = 1;
			}			   
		}
	} 
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta charset="utf-8" 
			  name="viewport" 
			  content="width=device-width, initial-scale=1.0" />
		<title>CNManager</title>
		<!-- BOOTSTRAP STYLES-->
		<link href="css/bootstrap.css" rel="stylesheet" />
		 <!-- FONTAWESOME STYLES-->
		<link href="css/font-awesome.css" rel="stylesheet" />
		 <!-- MORRIS CHART STYLES-->
		<link href="js/morris/morris-0.4.3.min.css" rel="stylesheet" />
			<!-- CUSTOM STYLES-->
		<link href="css/custom.css" rel="stylesheet" />
		 <!-- GOOGLE FONTS-->
	   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
	</head>
	<body> 
		<nav class="navbar navbar-inverse">
			<div class="container">
				<div>
					<ul class="nav navbar-nav">
					
					</ul>
				</div>
			</div>
		</nav>
		<div class="row" style="margin-left:10px; margin-right: 10px;">
			<div class="col-md-12">
				<!-- Advanced Tables -->
				<div class="panel panel-default">
					<div class="panel-header">
						<div class="table-responsive">
							<center>
								<h2>Cadastro de Usuário</h2>
							</center>
						</div>
						<?php if($erro_usuario == 1): ?>
							<div class="alert alert-danger">Erro ao salvar. Por favor, tente novamente!</div>
						<?php endif; ?>
					</div>					
					<div class="panel-body">
						<div class="table-responsive">
							<form action="" 
								  method="POST" 
								  class="form center-block">
								<?php 
									if ($erro_nome_usuario == 1) {
								?>
										<div class="form-group">
											<label for="nome">Nome*</label><br />
											<div style="text-align: right;">*Campo nome maior que 80 caracteres!</div>
											<input type="text" 
												   name="nome"  
												   class="form-control" 
												   placeholder="Insira seu nome"
												   style="border-width: medium; border-color: #f00">
										</div>
								<?php 
									} else if ($erro_nome_usuario == 2) {
								?>
										<div class="form-group">
											<label for="nome">Nome*</label><br />
											<div style="text-align: right;">*Campo nome vazio!</div>
											<input type="text" 
												   name="nome"  
												   class="form-control" 
												   placeholder="Insira seu nome"
												   style="border-width: medium; border-color: #f00">
										</div>
								<?php
									} else {
								?>
										<div class="form-group">
											<label for="nome">Nome*</label><br />
											<input type="text" 
												   name="nome"  
												   class="form-control" 
												   placeholder="Insira seu nome">
										</div>
								<?php
									} 
									if ($erro_login_usuario == 1) {
								?>
										<div class="form-group">
											<label for= "login">Login*</label><br />
											<div style="text-align: right;">*Campo login vazio!</div>
											<input type="text" 
												   name="login" 
												   class="form-control"
												   placeholder="Insira um login" 
												   autocomplete="off"
												   style="border-width: medium; border-color: #f00">
										</div>
								<?php
									} else if ($erro_login_usuario == 2) {
								?>
										<div class="form-group">
											<label for= "login">Login*</label><br />
											<div style="text-align: right;">*Campo login deve ter no minimo 8 caracteres e no maximo 20 caracteres!</div>
											<input type="text" 
												   name="login" 
												   class="form-control"
												   placeholder="Insira um login" 
												   autocomplete="off"
												   style="border-width: medium; border-color: #f00">
										</div>
								<?php
									} else {
								?>
										<div class="form-group">
											<label for= "login">Login*</label><br />
											<input type="text" 
												   name="login" 
												   class="form-control"
												   placeholder="Insira um login" 
												   autocomplete="off">
										</div>
								<?php
									} 
									if ($erro_senha_usuario == 1) {
								?>
										<div class="form-group">
											<label for= "senha">Senha*</label><br />
											<div style="text-align: right;">*Campo senha vazio!</div>
											<input type="password" 
												   name="senha" 
												   class="form-control"
												   placeholder="Insira uma senha" 
												   autocomplete="off"
												   style="border-width: medium; border-color: #f00">
										</div>
								<?php 
									} else if ($erro_senha_usuario == 2) {
								?>
										<div class="form-group">
											<label for= "senha">Senha*</label><br />
											<div style="text-align: right;">*Campo senha deve ter no minimo 6 caracteres e no maximo 10 caracteres!</div>
											<input type="password" 
												   name="senha" 
												   class="form-control"
												   placeholder="Insira uma senha" 
												   autocomplete="off"
												   style="border-width: medium; border-color: #f00">
										</div>
								<?php 
									} else {
								?>
										<div class="form-group">
											<label for= "senha">Senha*</label><br />
											<input type="password" 
												   name="senha" 
												   class="form-control"
												   placeholder="Insira uma senha" 
												   autocomplete="off">
										</div>
								<?php 
									}
									if ($erro_perfil_usuario == 1) {
								?>
										<div class="form-group">
											<label for="perfilusuario">Perfil do Usuario*</label><br />
											<div style="text-align: right;">*Campo perfil não esta selecionado!</div>
											<select name="perfil" 
													class="form-control"
												    style="border-width: medium; border-color: #f00">
												<option value="">Selecione um perfil</option>
												<option value="0">Master</option>
												<option value="1">Comum</option>
											</select>
										</div>
								<?php
									} else {
								?>
										<div class="form-group">
											<label for="perfilusuario">Perfil do Usuario*</label><br />
											<select name="perfil" 
													class="form-control">
												<option value="">Selecione um perfil</option>
												<option value="0">Master</option>
												<option value="1">Usuário Comum</option>
											</select>
										</div>
								<?php 
									}
								?>
								<br><br>
								<div class="form-group">
									<center>
										<button id="submit"
												type="submit" 
												name="caduser" 
												class="btn btn-success">
											Salvar
										</button> 
									</center>
								</div>	
							</form>
						</div>
						<div class="modal-footer">
				
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>