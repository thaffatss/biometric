<?php
ini_set('display_errors', 'Off');
error_reporting(E_ALL | E_STRICT);

require_once "menu.php";
// Valida se usuário tá logado caso contrario, manda pro login.
if (!isset($_SESSION['id_usuario'])) :
	header("Location: index.php");

endif;
if (isset($_SESSION['id_usuario'])) :


?>	
	<div class="modal fade" id="modal-mensagem" style="margin-top: 20vh;">
   	<div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body" style="height: 300px; margin-top: 5vh;">
                <div id="modal-content"></div>
            </div>
            
        </div>
    </div>
	</div>

	<div class="col-md-12" style="padding-top:30px;">
		<input class="form-control" id="search" type="text" placeholder="Buscar">
	</div>

	<div class="row" style="margin-left:10px; margin-top: 15px; margin-right: 10px;">
		<div class="col-md-12">
			<!-- Advanced Tables -->
			<div class="card">
				<div class="card-body">
					<h5 class="card-title">Entrada DERM
						<a title='Cadastrar Cliente' href='entradaCliente_Derm.php' accesskey="C">
							<i class="bi bi-plus-square-fill" style="font-size: 2rem; margin-right:5px; float: right; padding-bottom:10px;"></i>
						</a>
					</h5>
					<div class="panel panel-default">
						<div class="panel-body" style="overflow: auto; height: 400px; width: 100%;">
							<div class="table-responsive">
								<table class="table table-striped table-bordered table-hover" id="table-indexFluxo" style="width: 100%">
									<thead>
										<tr>
											<th width="2%">
												<center>
													<font size=2>ID</font>
											</th>
											<th width="18%">
												<center>
													<font size=2>NOME</font>
											</th>
											<th width="9%">
												<center>
													<font size=2>CPF</font>
											</th>
											<th width="5%">
												<center>
													<font size=2>F.PAGAMENTO</font>
											</th>
											<th width="28%">
												<center>
													<font size=2>PLANO</font>
											</th>
											<th width="5%">
												<center>
													<font size=2>D.ENTRADA</font>
											</th>
											<th width="5%">
												<center>
													<font size=2>H.ENTRADA</font>
											</th>
											<th width="2%">
												<center>
													<font size=2>VALOR</font>
											</th>
											<th width="2%">
												<center>
													<font size=2>BIOMETRIA</font>
											</th>
											<th width="2%">
												<center>
													<font size=2>STATUS.PGT</font>
											</th>
											<th width="5%">
												<center>
													<font size=2>SINALIZAR.PGT</font>
											</th>
										</tr>
									</thead>
									<tbody id="searchTable">
										<?php

										$buscaCliente = $pdo
											->prepare(
												'SELECT
											ce.idCliente_estetica AS codigo, ce.nome AS cliente, ce.cpf AS cpf,
											pg.tipo AS forma, ce.dataEntrada AS dt_entrada, pl.plano AS plano,
											ce.horaEntrada AS hr_entrada, ce.dataSaida AS dt_saida, ce.horaSaida AS hr_saida,
											ce.saldo AS saldo, ce.status_pago AS pago, ce.pc_valor AS preco, ce.template AS template
										FROM
										cliente_estetica ce
										    JOIN pagamento pg
										    ON ce.Pagamento_idPagamento = pg.idPagamento 
											JOIN planos AS pl
										    ON ce.Planos_idPlano = pl.idPlano ORDER BY ce.idCliente_estetica DESC'
											);
										$buscaCliente->execute();
										$row = $buscaCliente->fetchAll(PDO::FETCH_ASSOC);

										if (count($row) > 0) {
											foreach ($row as $value) { ?>

												<tr>
													<td style="font-size: 12px; text-align: center;"><?= $value['codigo']; ?></td>

													<td style="font-size: 12px; text-align: center;"><?= ($value['cliente']); ?></td>

													<td style="font-size: 12px; text-align: center;" id="cpf"><?= $value['cpf']; ?></td>

													<td style="font-size: 12px; text-align: center; text-overflow: ellipsis;"><?= ucwords($value['forma']); ?></td>

													<td style="font-size: 12px; text-align: center;"><?= ucwords($value['plano']); ?></td>

													<td style="font-size: 12px; text-align: center;"><?= isset($value['dt_entrada']) ? date('d/m/Y', strtotime($value['dt_entrada'])) : '' ?></td>

													<td style="font-size: 12px; text-align: center;"><?= $value['hr_entrada']; ?></td>

													<td style="font-size: 12px; text-align: center;"><?= $value['preco']; ?></td>

													<td style="font-size: 12px; text-align: center;">
														
														<a href="#" title="Cadastrar Biometria" onclick="Capture(<?= $value['codigo'] ?>)" style="margin-left: 5px;">
														<?php 
														if ($value['template'] == null || $value['template'] == "") {
														?>
															<svg xmlns="http://www.w3.org/2000/svg" color="red" width="20" height="20" fill="currentColor" class="bi bi-fingerprint" viewBox="0 0 16 16">
															<path d="M8.06 6.5a.5.5 0 0 1 .5.5v.776a11.5 11.5 0 0 1-.552 3.519l-1.331 4.14a.5.5 0 0 1-.952-.305l1.33-4.141a10.5 10.5 0 0 0 .504-3.213V7a.5.5 0 0 1 .5-.5Z"/>
															<path d="M6.06 7a2 2 0 1 1 4 0 .5.5 0 1 1-1 0 1 1 0 1 0-2 0v.332c0 .409-.022.816-.066 1.221A.5.5 0 0 1 6 8.447c.04-.37.06-.742.06-1.115V7Zm3.509 1a.5.5 0 0 1 .487.513 11.5 11.5 0 0 1-.587 3.339l-1.266 3.8a.5.5 0 0 1-.949-.317l1.267-3.8a10.5 10.5 0 0 0 .535-3.048A.5.5 0 0 1 9.569 8Zm-3.356 2.115a.5.5 0 0 1 .33.626L5.24 14.939a.5.5 0 1 1-.955-.296l1.303-4.199a.5.5 0 0 1 .625-.329Z"/>
															<path d="M4.759 5.833A3.501 3.501 0 0 1 11.559 7a.5.5 0 0 1-1 0 2.5 2.5 0 0 0-4.857-.833.5.5 0 1 1-.943-.334Zm.3 1.67a.5.5 0 0 1 .449.546 10.72 10.72 0 0 1-.4 2.031l-1.222 4.072a.5.5 0 1 1-.958-.287L4.15 9.793a9.72 9.72 0 0 0 .363-1.842.5.5 0 0 1 .546-.449Zm6 .647a.5.5 0 0 1 .5.5c0 1.28-.213 2.552-.632 3.762l-1.09 3.145a.5.5 0 0 1-.944-.327l1.089-3.145c.382-1.105.578-2.266.578-3.435a.5.5 0 0 1 .5-.5Z"/>
															<path d="M3.902 4.222a4.996 4.996 0 0 1 5.202-2.113.5.5 0 0 1-.208.979 3.996 3.996 0 0 0-4.163 1.69.5.5 0 0 1-.831-.556Zm6.72-.955a.5.5 0 0 1 .705-.052A4.99 4.99 0 0 1 13.059 7v1.5a.5.5 0 1 1-1 0V7a3.99 3.99 0 0 0-1.386-3.028.5.5 0 0 1-.051-.705ZM3.68 5.842a.5.5 0 0 1 .422.568c-.029.192-.044.39-.044.59 0 .71-.1 1.417-.298 2.1l-1.14 3.923a.5.5 0 1 1-.96-.279L2.8 8.821A6.531 6.531 0 0 0 3.058 7c0-.25.019-.496.054-.736a.5.5 0 0 1 .568-.422Zm8.882 3.66a.5.5 0 0 1 .456.54c-.084 1-.298 1.986-.64 2.934l-.744 2.068a.5.5 0 0 1-.941-.338l.745-2.07a10.51 10.51 0 0 0 .584-2.678.5.5 0 0 1 .54-.456Z"/>
															<path d="M4.81 1.37A6.5 6.5 0 0 1 14.56 7a.5.5 0 1 1-1 0 5.5 5.5 0 0 0-8.25-4.765.5.5 0 0 1-.5-.865Zm-.89 1.257a.5.5 0 0 1 .04.706A5.478 5.478 0 0 0 2.56 7a.5.5 0 0 1-1 0c0-1.664.626-3.184 1.655-4.333a.5.5 0 0 1 .706-.04ZM1.915 8.02a.5.5 0 0 1 .346.616l-.779 2.767a.5.5 0 1 1-.962-.27l.778-2.767a.5.5 0 0 1 .617-.346Zm12.15.481a.5.5 0 0 1 .49.51c-.03 1.499-.161 3.025-.727 4.533l-.07.187a.5.5 0 0 1-.936-.351l.07-.187c.506-1.35.634-2.74.663-4.202a.5.5 0 0 1 .51-.49Z"/>
														</svg>
														<?php
														} else {
														?>
														<svg xmlns="http://www.w3.org/2000/svg" color="green" width="20" height="20" fill="currentColor" class="bi bi-fingerprint" viewBox="0 0 16 16">
															<path d="M8.06 6.5a.5.5 0 0 1 .5.5v.776a11.5 11.5 0 0 1-.552 3.519l-1.331 4.14a.5.5 0 0 1-.952-.305l1.33-4.141a10.5 10.5 0 0 0 .504-3.213V7a.5.5 0 0 1 .5-.5Z"/>
															<path d="M6.06 7a2 2 0 1 1 4 0 .5.5 0 1 1-1 0 1 1 0 1 0-2 0v.332c0 .409-.022.816-.066 1.221A.5.5 0 0 1 6 8.447c.04-.37.06-.742.06-1.115V7Zm3.509 1a.5.5 0 0 1 .487.513 11.5 11.5 0 0 1-.587 3.339l-1.266 3.8a.5.5 0 0 1-.949-.317l1.267-3.8a10.5 10.5 0 0 0 .535-3.048A.5.5 0 0 1 9.569 8Zm-3.356 2.115a.5.5 0 0 1 .33.626L5.24 14.939a.5.5 0 1 1-.955-.296l1.303-4.199a.5.5 0 0 1 .625-.329Z"/>
															<path d="M4.759 5.833A3.501 3.501 0 0 1 11.559 7a.5.5 0 0 1-1 0 2.5 2.5 0 0 0-4.857-.833.5.5 0 1 1-.943-.334Zm.3 1.67a.5.5 0 0 1 .449.546 10.72 10.72 0 0 1-.4 2.031l-1.222 4.072a.5.5 0 1 1-.958-.287L4.15 9.793a9.72 9.72 0 0 0 .363-1.842.5.5 0 0 1 .546-.449Zm6 .647a.5.5 0 0 1 .5.5c0 1.28-.213 2.552-.632 3.762l-1.09 3.145a.5.5 0 0 1-.944-.327l1.089-3.145c.382-1.105.578-2.266.578-3.435a.5.5 0 0 1 .5-.5Z"/>
															<path d="M3.902 4.222a4.996 4.996 0 0 1 5.202-2.113.5.5 0 0 1-.208.979 3.996 3.996 0 0 0-4.163 1.69.5.5 0 0 1-.831-.556Zm6.72-.955a.5.5 0 0 1 .705-.052A4.99 4.99 0 0 1 13.059 7v1.5a.5.5 0 1 1-1 0V7a3.99 3.99 0 0 0-1.386-3.028.5.5 0 0 1-.051-.705ZM3.68 5.842a.5.5 0 0 1 .422.568c-.029.192-.044.39-.044.59 0 .71-.1 1.417-.298 2.1l-1.14 3.923a.5.5 0 1 1-.96-.279L2.8 8.821A6.531 6.531 0 0 0 3.058 7c0-.25.019-.496.054-.736a.5.5 0 0 1 .568-.422Zm8.882 3.66a.5.5 0 0 1 .456.54c-.084 1-.298 1.986-.64 2.934l-.744 2.068a.5.5 0 0 1-.941-.338l.745-2.07a10.51 10.51 0 0 0 .584-2.678.5.5 0 0 1 .54-.456Z"/>
															<path d="M4.81 1.37A6.5 6.5 0 0 1 14.56 7a.5.5 0 1 1-1 0 5.5 5.5 0 0 0-8.25-4.765.5.5 0 0 1-.5-.865Zm-.89 1.257a.5.5 0 0 1 .04.706A5.478 5.478 0 0 0 2.56 7a.5.5 0 0 1-1 0c0-1.664.626-3.184 1.655-4.333a.5.5 0 0 1 .706-.04ZM1.915 8.02a.5.5 0 0 1 .346.616l-.779 2.767a.5.5 0 1 1-.962-.27l.778-2.767a.5.5 0 0 1 .617-.346Zm12.15.481a.5.5 0 0 1 .49.51c-.03 1.499-.161 3.025-.727 4.533l-.07.187a.5.5 0 0 1-.936-.351l.07-.187c.506-1.35.634-2.74.663-4.202a.5.5 0 0 1 .51-.49Z"/>
														</svg>
														<?php
														}
														?>
														</a>

														<a href="#" title="Verificar Biometria" onclick="Match('<?= $value['template'] ?>' ,<?= $value['codigo'] ?>, <?= $value['pago'] ?>)" style="margin-left: 5px;">
															<i style="font-size: 20px; margin-top: 5px;" class="bi bi-person-check-fill"></i>
														</a>
													</td>

													<td style="font-size: 16px; text-align: center;">

														<?php
														if (($value['pago']) == 0 && (strcmp($value['plano'], 'Experimental') != 0)) {
														?>
															<div style="font-size: 12px; text-align: center; color:red;"><strong>DEVEDOR</strong></div>
														<?php
														} if (($value['pago']) == 1 && strcmp($value['plano'], 'Experimental') != 0) {
														?>
															<div style="font-size: 12px; text-align: center; color:green;"><strong>PAGO</strong></div>

														<?php
														}
														if (strcmp($value['plano'], 'Experimental') === 0) {
														?>
															<span style="color: #fc7417;">EXP</span>
														<?php
														}
														?>

													</td>

													<td style="font-size: 16px; text-align: center;">

														<?php
														if (($value['pago']) == 0 && strcmp($value['plano'], 'Experimental') != 0) {
														?>
															<a title='Sinalizar Pagamento' href='sinalizarPagamentoPilates.php?id=<?php echo $value['codigo']; ?>' data-confirm-payment>
																<i style="font-size: 1.3rem; color: cornflowerblue;" class="bi bi-currency-dollar"></i>
															</a>
														<?php
														} 
														if (($value['pago']) == 1 && strcmp($value['plano'], 'Experimental') != 0) {
														?>
															<a title='PAGO'>
																<i style="font-size: 1.5rem; color: green;" class="bi bi-check-all"></i>
															</a>
														<?php
														}
														if (strcmp($value['plano'], 'Experimental') === 0) {
															$sinalExp = $pdo->prepare("UPDATE cliente_estetica SET status_pago  = 3 WHERE idCliente_estetica = ?");
															$sinalExp->bindValue(1, $value['codigo']);
															$sinalExp->execute();
														?>
															<a title='Cliente Experimental'>
																<i style="font-size: 1.3rem; color: #fc7417;" class="bi bi-x-lg"></i>
															</a>
														<?php
														}
														?>

													</td>
												</tr>

										<?php

											}
										}

										?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- script references -->
	<?php require_once "footer.php"; ?>

	<script>
		$(document).ready(function() {
			$("#search").on("keyup", function() {
				var value = $(this).val().toLowerCase();
				$("#searchTable tr").filter(function() {
					$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
				});
			});
		});
	</script>
	
	<script type="text/javascript">
		document.getElementById("search").focus();
	</script>

	<script>
	/*********************************************

	* Nome: Capture

	* Descrição: Chama o método "Capture" da aplicação desktop,

	* responsável por chamar a tela de captura de digital para apenas um único dedo.

	* Este método é recomendável quando você deseja capturar a impressão digital de um único dedo e

	* não existe a necessidade de identificar qual dedo da mão esta digital pertence.

	* Retorno: Template (String) ou Null

	*********************************************/

	function Capture(id) {

	$.ajax({

	url: 'http://localhost:9000/api/public/v1/captura/Capturar/1',
	type: 'GET',

	success: function (data) {

		if (data != "" && data != null) {
			// Passa via ajax biometria pra ser inserida no banco de dados.
			$.ajax({
				url: 'insertBiometriaDerm.php',
				type: 'POST',
				data:{
					template: data, 
					id:id
				}
			});

			$("#modal-mensagem").modal();
			document.getElementById("modal-content").innerHTML = '<i style="color:#07f9a2; font-size: 120px; justify-content: center; display: flex; margin:auto; align-items: center;" class="bi bi-check-circle"></i><br><h4 style="color:#07f9a2; justify-content: center; display: flex; margin:auto; align-items: center;">Digital cadastrada com sucesso!</h4>';
			let showTime = setTimeout(function() {
				jQuery("#modal-mensagem").modal("hide");
				location.reload();
			}, 1500);

		} else {
			$("#modal-mensagem").modal();
			document.getElementById("modal-content").innerHTML = '<i style="color:#c42311; font-size: 120px; justify-content: center; display: flex; margin:auto; align-items: center;" class="bi bi-check-circle"></i><br><h4 style="color:#c42311; justify-content: center; display: flex; margin:auto; align-items: center;">Digital não pode ser cadastrada!</h4>';
			let showTime = setTimeout(function() {
				jQuery("#modal-mensagem").modal("hide");
				location.reload();
			}, 1500);

		}

	}
	})
	}

	/*********************************************
	* Nome: Match
	* Descrição: Chama o método "VerifyMatch" da aplicação desktop, 
	* responsável por chamar a tela de captura de digital para apenas um único dedo e realizar a 
	* comparação com um outro template (impressão digital) já cadastrada.
	* Este método é recomendável quando você deseja você comparação de 1:1 (Um para Um). 
	* Retorno: Template (String) ou Null
	*********************************************/

	function Match(digital, id, pgt) {
		
		if (digital != "") {
			
			$.ajax({
				
				url: 'http://localhost:9000/api/public/v1/captura/Comparar?Digital=' + digital,
				type: 'GET',
				
				success: function (data) {
				
					if (data != "") {
						
						$("#modal-mensagem").modal();
						document.getElementById("modal-content").innerHTML = '<i style="color:#07f9a2; font-size: 120px; justify-content: center; display: flex; margin:auto; align-items: center;" class="bi bi-check-circle"></i><br><h3 style="color:#07f9a2; justify-content: center; display: flex; margin:auto; align-items: center;">Cliente Autorizado</h3>';
						let showTime = setTimeout(function() {
							jQuery("#modal-mensagem").modal("hide");
							location.reload();
						}, 1500);

						// Passa via ajax biometria pra ser inserida no banco de dados.
						$.ajax({
							url: 'updateClienteDermBiometria.php',
							type: 'POST',
							data:{
								template: data, 
								id:id
							},
							success: function (data) {
								console.log("Dados atualizados!");
							}
						});
					}
					else {
						$("#modal-mensagem").modal();
						document.getElementById("modal-content").innerHTML = '<i style="color:#c42311; font-size: 120px; justify-content: center; display: flex; margin:auto; align-items: center;" class="bi bi-x-octagon"></i><br><h3 style="color:#c42311; justify-content: center; display: flex; margin:auto; align-items: center;">Cliente Não Autorizado</h3>';
						let showTime = setTimeout(function() {
							jQuery("#modal-mensagem").modal("hide");
							location.reload();
						}, 1500);
					}
					// Verifica se cliente está adimplente ou inadimplente e se a digital é valida.
					if (pgt == 0 && data != "") { 
						$("#modal-mensagem").modal();
						document.getElementById("modal-content").innerHTML = '<i style="color:#ffb914; font-size: 120px; justify-content: center; display: flex; margin:auto; align-items: center;" class="bi bi-info-circle"></i><br><h3 style="color:#ffb914; justify-content: center; display: flex; margin:auto; align-items: center;">Cliente inadimplente!!!</h3>';
						let showTime = setTimeout(function() {
							jQuery("#modal-mensagem").modal("hide");
							location.reload();
						}, 1500);
						}
				}
			});
		} else {
			$("#modal-mensagem").modal();
			document.getElementById("modal-content").innerHTML = '<i style="color:#ffb914; font-size: 120px; justify-content: center; display: flex; margin:auto; align-items: center;" class="bi bi-info-circle"></i><br><h3 style="color:#ffb914; justify-content: center; display: flex; margin:auto; align-items: center;">Biometria não cadastrada</h3>';
			let showTime = setTimeout(function() {
				jQuery("#modal-mensagem").modal("hide");
				location.reload();
			}, 1500);
		}
	}
	</script>

<?php endif; ?>
</body>

</html>