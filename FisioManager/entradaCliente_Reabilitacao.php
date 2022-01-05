<?php
ini_set('display_errors', 'Off');
error_reporting(E_ALL | E_STRICT);

require_once "menu.php";

// Valida se usuário tá logado caso contrario, manda pro login.
if (!isset($_SESSION['id_usuario'])) {
	header("Location: index.php");
}
if (isset($_SESSION['id_usuario'])) {

	if (isset($_POST['cadCliente'])) {

		$dataEntrada = $_POST['dataEntrada'];
		$horaEntrada = $_POST['horaEntrada'];
		$nome = $_POST['nome'];
		$cpf = $_POST['cpf'];
		$saldo = $_POST['saldo'];
		$endereco = $_POST['endereco'];
		$profissao = $_POST['profissao'];
		$telefone = $_POST['telefone'];
		$preco = $_POST['preco'];
		$sessoes = $_POST['sessoes'];
		$formPagamento = $_POST['forma_pagamento'];
		$procedimento = $_POST['procedimento'];
		$plano = $_POST['plano'];

		if (
			isset($nome) && !empty($nome) && isset($dataEntrada) &&
			!empty($dataEntrada) && isset($horaEntrada) && !empty($horaEntrada) && isset($formPagamento) &&
			!empty($formPagamento) && isset($preco) && !empty($preco)  && isset($sessoes) && !empty($sessoes)
		) {

			$insereCliente = $pdo->prepare("INSERT INTO cliente_reabilitacao (
														 dataEntrada, 
														 horaEntrada, 
														 nome,
														 cpf,
														 saldo,
														 endereco,
														 profissao,
														 telefone,
														 pc_valor,
														 sessoes,
														 Pagamento_idPagamento,
														 procedimento,
														 Planos_idPlano
														 ) 
									VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)");
			$insereCliente->bindValue(1, $dataEntrada);
			$insereCliente->bindValue(2, $horaEntrada);
			$insereCliente->bindValue(3, $nome);
			$insereCliente->bindValue(4, $cpf);
			$insereCliente->bindValue(5, $saldo);
			$insereCliente->bindValue(6, $endereco);
			$insereCliente->bindValue(7, $profissao);
			$insereCliente->bindValue(8, $telefone);
			$insereCliente->bindValue(9, $preco);
			$insereCliente->bindValue(10, $sessoes);
			$insereCliente->bindValue(11, $formPagamento);
			$insereCliente->bindValue(12, $procedimento);
			$insereCliente->bindValue(13, $plano);
			$insereCliente->execute();


			if ($insereCliente->rowCount() > 0) {
				header("Location: indexFluxo_Reabilitacao.php");
			}
		} else {
			$erro1 = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<strong><i class="bi bi-x-octagon-fill"> ERRO AO CADASTRAR: </i></strong> Os CAMPOS com * são obrigatórios!
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
			</div>';
		}
	}
?>
	<br>
	<div class="container">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
					<h5 class="card-title">Cadastro Reabilitação</h5>
					<?= $erro1; ?>
					<form method="POST">
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="dataEntrada">Data de Entrada*</label><br />
								<input type="date" name="dataEntrada" class="form-control" autocomplete="off" required>

							</div>
							<div class="form-group col-md-6">
								<label for="horaEntrada">Hora de Entrada*</label><br />
								<input type="time" name="horaEntrada" class="form-control" autocomplete="off" required>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="nome">Nome Cliente*</label><br />
								<input id="nome" class="form-control" type="text" name="nome" autocomplete="off" placeholder="Nome Paciente" required>
							</div>
							<div class="form-group col-md-6">
								<label for="cpf">CPF</label><br />
								<input id="cpf" class="form-control" type="text" name="cpf" autocomplete="off" placeholder="XXX-XXX-XXX-XX">
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-4">
								<label for="endereco">Endereço</label><br />
								<input id="endereco" class="form-control" type="text" name="endereco" autocomplete="off" placeholder="Ex: Av. Nome Endereço, Centro, nº XXX">
							</div>
							<div class="form-group col-md-4">
								<label for="procedimento">Procedimento</label><br />
								<input id="procedimento" class="form-control" type="text" name="procedimento" autocomplete="off" placeholder="Descreva os procedimentos">
							</div>
							<div class="form-group col-md-4">
								<label for="plano">Plano</label><br />
									<select name="plano" class="form-control" required autocomplete="off" aria-placeholder="Aqui">
										<option value="">Selecione um Plano</option>
										<?php
										$buscarPlano = $pdo->prepare('SELECT * FROM planos');
										$buscarPlano->execute();
										$row = $buscarPlano->fetchAll(PDO::FETCH_OBJ);
										foreach ($row as $mostre) {
										?>
											<option value="<?php echo $mostre->idPlano; ?>"><?php echo $mostre->plano; ?></option>
										<?php
										}
										?>
								</select>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="profissao">Profissão</label><br />
								<input id="profissao" class="form-control" type="text" name="profissao" autocomplete="off" placeholder="Ex: Advogado">
							</div>

							<div class="form-group col-md-6">
								<label for="saldo">Saldo</label>
								<input id="real1" class="form-control" type="text" name="saldo" autocomplete="off" value="0" placeholder="EX: 40,00">
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-4">
								<label for="preco">Valor Procedimento*</label><br />
								<input id="preco" class="form-control" type="text" name="preco" autocomplete="off" placeholder="EX: 40,00" required>
							</div>
							<div class="form-group col-md-4">
								<label for="forma_pagamento">Forma de Pagamento*</label><br />
								<select name="forma_pagamento" class="form-control" autocomplete="off" aria-placeholder="Aqui" required>
									<option value="">Selecione uma Forma de Pagamento</option>
									<?php
									$buscaPagamento = $pdo->prepare('SELECT * FROM pagamento');
									$buscaPagamento->execute();
									$row = $buscaPagamento->fetchAll(PDO::FETCH_OBJ);
									foreach ($row as $mostre) {
									?>
										<option value="<?php echo $mostre->idPagamento; ?>"><?php echo $mostre->tipo; ?></option>
									<?php
									}
									?>
								</select>
							</div>
							<div class="form-group col-md-2">
								<label for="telefone">Sessões*</label><br />
								<input class="form-control" type="number" name="sessoes" id="num" required>
							</div>
							<div class="form-group col-md-2">
								<label for="telefone">Telefone</label><br />
								<input id="telefone" class="form-control" type="text" name="telefone" autocomplete="off" placeholder="(XX) X XXXX-XXXX">
							</div>

							<a href="indexFluxo_Reabilitacao.php" type="button" class="btn btn-info" style="width: 9%; margin-right: 10px; height: 8%;">Voltar</a>
							<button style="width: 11%;" type="submit" name="cadCliente" class="btn btn-success">
								Cadastrar
							</button>
					</form>
				</div>
			</div>
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
	<!-- SCRIPT PARA INPUT INCREMENTO E DECREMENTO NÚMERO -->
	<script>
		numero = 0;

		function less() {
			numero--;
			setValue(numero);
		}

		function more() {
			numero++;
			setValue(numero);
		}

		function setValue(value) {
			document.getElementById('num').value = value;
		}

		setValue(numero);
	</script>
	</body>

	</html>

<?php } ?>