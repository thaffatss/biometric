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
											ce.saldo AS saldo, ce.status_pago AS pago, ce.pc_valor AS preco
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


													<td style="font-size: 16px; text-align: center;">

														<?php
														if (($value['pago']) == 0) {
														?>
															<div style="font-size: 12px; text-align: center; color:red;"><strong>DEVEDOR</strong></div>
														<?php
														} else {
														?>
															<div style="font-size: 12px; text-align: center; color:green;"><strong>PAGO</strong></div>

														<?php
														}
														?>

													</td>

													<td style="font-size: 16px; text-align: center;">

														<?php
														if (($value['pago']) == 0) {
														?>
															<a title='Sinalizar Pagamento' href='sinalizarPagamentoDerm.php?id=<?php echo $value['codigo']; ?>' data-confirm-payment>
																<i style="font-size: 1.3rem; color: cornflowerblue;" class="bi bi-currency-dollar"></i>
															</a>
														<?php
														} else {
														?>
															<a title='PAGO'>
																<i style="font-size: 1.3rem; color: cornflowerblue;" class="bi bi-check-square"></i>
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
		window.onload = function() {
			var contexto = document.getElementById("grafico1").getContext("2d");
			var grafico = new Chart(contexto, {
				type: 'line',
				data: {
					labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
					datasets: [{
						label: 'Atendimento',
						borderColor: 'rgb(75, 192, 192)',
						tension: 0.1,
						data: [
							<?php echo $qtdJaneiro; ?>,
							<?php echo $qtdFevereiro; ?>,
							<?php echo $qtdMarco; ?>,
							<?php echo $qtdAbril; ?>,
							<?php echo $qtdMaio; ?>,
							<?php echo $qtdJunho; ?>,
							<?php echo $qtdJulho; ?>,
							<?php echo $qtdAgosto; ?>,
							<?php echo $qtdSetembro; ?>,
							<?php echo $qtdOutubro; ?>,
							<?php echo $qtdNovembro; ?>,
							<?php echo $qtdDezembro; ?>
						],
						options: {
							responsive: true,
							plugins: {
								legend: {
									position: 'top',
								},
								title: {
									display: true,
									text: 'Chart.js Doughnut Chart'
								}
							}
						},
						fill: false
					}]
				}
			});
		}
	</script>
	<script type="text/javascript">
		document.getElementById("search").focus();
	</script>

<?php endif; ?>
</body>

</html>