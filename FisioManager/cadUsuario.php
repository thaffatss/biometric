	<?php
	ini_set('display_errors', 'Off');
	error_reporting(E_ALL | E_STRICT);

	require_once "menu.php";

	if (isset($_POST['caduser'])) {
		$nome   = $_POST['nome'];
		$login  = $_POST['login'];
		$senha  = $_POST['senha'];
		$perfil = $_POST['perfil'];
		$status = 1; //status setado como ativo			

		$insereUsuario = $pdo->prepare("INSERT INTO usuario (nome, 
															login, 
															senha, 
															perfil, 
															status) 
										VALUES(?, ?, ?, ?, ?)");
		$insereUsuario->bindValue(1, $nome);
		$insereUsuario->bindValue(2, $login);
		$insereUsuario->bindValue(3, MD5($senha));
		$insereUsuario->bindValue(4, $perfil);
		$insereUsuario->bindValue(5, $status);
		$insereUsuario->execute();
		if ($insereUsuario->rowCount() > 0) {
			header("Location: indexUsuarioAtivos.php");
		} else {
			$erro_usuario = 1;
		}
	}
	?>
	<br><br>
	<div class="container">
		<div class="col-md-12">
			<?php if ($erro_usuario == 1) : ?>
				<div class="alert alert-danger">Erro ao salvar. Por favor, tente novamente!</div>
			<?php endif; ?>
			<div class="card">
				<div class="card-body">
					<h5 class="card-title">Cadastro de Usuário</h5>
					<form method="POST">

						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="nome">Nome*</label><br />
								<input type="text" name="nome" class="form-control" placeholder="Insira o nome" autocomplete="]off" required>
							</div>
							<div class="form-group col-md-6">
								<label for="login">Login*</label><br />
								<input type="text" name="login" class="form-control" placeholder="Insira o login" autocomplete="off" required>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-12">
								<label for="senha">Senha*</label><br />
								<input type="password" name="senha" class="form-control" placeholder="Insira uma senha" autocomplete="off" required>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-12">
								<label for="perfilusuario">Perfil do Usuario*</label><br />
								<select name="perfil" class="form-control" required>
									<option value="">Selecione um perfil</option>
									<option value="0">Master</option>
									<option value="1">Usuário Comum</option>
								</select>
							</div>
						</div>
						<a href="indexUsuarioAtivos.php" type="button" class="btn btn-info" style="width: 9%; margin-right: 10px; height: 8%;">Voltar</a>
						<button style="width: 11%;" type="submit" name="caduser" class="btn btn-success">
							Cadastrar
						</button>
					</form>
				</div>
			</div>
			<?php
			require_once "footer.php";
			?>
			<!-- SCRIPT DE MASCARAMENTO DE INPUTS -->
			<script>
				$(document).ready(function() {
					$('.date').mask('00/00/0000');
					$('.time').mask('00:00:00');
					$('.date_time').mask('00/00/0000 00:00:00');
					$('.cep').mask('00000-000');
					$('.phone').mask('0000-0000');
					$('#telefone').mask('(00) 0 0000-0000');
					$('.phone_us').mask('(000) 000-0000');
					$('.mixed').mask('AAA 000-S0S');
					$('#cpf').mask('000.000.000-00', {
						reverse: true
					});
					$('.cnpj').mask('00.000.000/0000-00', {
						reverse: true
					});
					$('#real1').mask('000.000.000.000.000,00', {
						reverse: true
					});
					$('#preco').mask('000.000.000.000.000,00', {
						reverse: true
					});
					$('.money2').mask("#.##0,00", {
						reverse: true
					});
					$('.num').mask("00", {
						reverse: true
					});
					$('.ip_address').mask('0ZZ.0ZZ.0ZZ.0ZZ', {
						translation: {
							'Z': {
								pattern: /[0-9]/,
								optional: true
							}
						}
					});
					$('.ip_address').mask('099.099.099.099');
					$('.percent').mask('##0,00%', {
						reverse: true
					});
					$('.clear-if-not-match').mask("00/00/0000", {
						clearIfNotMatch: true
					});
					$('.placeholder').mask("00/00/0000", {
						placeholder: "__/__/____"
					});
					$('.fallback').mask("00r00r0000", {
						translation: {
							'r': {
								pattern: /[\/]/,
								fallback: '/'
							},
							placeholder: "__/__/____"
						}
					});
					$('.selectonfocus').mask("00/00/0000", {
						selectOnFocus: true
					});
				});
			</script>
			</body>

			</html>