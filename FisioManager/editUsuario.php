	<?php
	ini_set('display_errors', 'Off');
	error_reporting(E_ALL | E_STRICT);

	require_once "menu.php";

	if (isset($_POST['editUser']) && isset($_GET['id'])) {
		$id = $_GET['id'];
		$nome   = $_POST['nome'];
		$login  = $_POST['login'];
		$senha  = $_POST['senha'];
		$perfil = $_POST['perfil'];
		$status = 1; //status setado como ativo			

		$updateUsuario = $pdo->prepare("UPDATE usuario SET nome = ?, login = ?, senha = ?, perfil = ?, status = ? WHERE idUsuario = ?");
		$updateUsuario->bindValue(1, $nome);
		$updateUsuario->bindValue(2, $login);
		$updateUsuario->bindValue(3, MD5($senha));
		$updateUsuario->bindValue(4, $perfil);
		$updateUsuario->bindValue(5, $status);
		$updateUsuario->bindValue(6, $id);
		$updateUsuario->execute();
		if ($updateUsuario->rowCount() > 0) {
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
					<h5 class="card-title">Editando Usuário</h5>
					<?php
					if(isset($_GET['id'])) {
							$buscaUsuario = $pdo->prepare('SELECT idUsuario, nome, login, status, perfil, senha FROM usuario WHERE idUsuario=?');
							$buscaUsuario->bindValue(1, $_GET['id']);
							$buscaUsuario->execute();
							$row = $buscaUsuario->fetchAll(PDO:: FETCH_OBJ);
						foreach($row as $mostre) {
					?>
					<form method="POST">
					<div class="form-row">
							<div class="form-group col-md-6">
								<label for="nome">Nome*</label><br />
								<input type="text" name="nome" class="form-control" value="<?= $mostre->nome ?>" placeholder="Insira o nome" autocomplete="]off" required>
							</div>
							<div class="form-group col-md-6">
								<label for="login">Login*</label><br />
								<input type="text" name="login" class="form-control" value="<?= $mostre->login ?>" placeholder="Insira o login" autocomplete="off" required>
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
								<label for="perfilusuario">Perfil do Usuario</label><br />
								<select name="perfil" 
										class="form-control">
									<?php 
										if ($mostre->perfil == 0) {
											echo "<option value='0' selected>Master</option>";
											echo "<option value='1'>Usuario Comum</option>";
										} else {
											echo "<option value='0'>Master</option>";
											echo "<option value='1' selected>Usuario Comum</option>";
										}
									?>
								</select>
							</div>
						</div>
						<div class="form-group col-lg-6">
							
						</div>
						<a href="indexUsuarioAtivos.php" type="button" class="btn btn-info" style="width: 9%; margin-right: 10px; height: 8%;">Voltar</a>
						<button style="width: 11%;" type="submit" name="editUser" class="btn btn-success">
							Salvar
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
			<?php
				 	}
		    } 
			?>
			</html>