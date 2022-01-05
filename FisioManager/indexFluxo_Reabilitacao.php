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
					<h5 class="card-title">Entrada Reabilitação
						<a title='Cadastrar Cliente' href='entradaCliente_Reabilitacao.php' accesskey="C">
							<i class="bi bi-plus-square-fill" style="font-size: 2rem; margin-right:5px; float: right; padding-bottom: 10px;"></i>
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
											<th width="8%">
												<center>
													<font size=2>F.PAGAMENTO</font>
											</th>
											<th width="15%">
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
												'SELECT cr.idCliente_reabilitacao AS codigo, cr.nome AS cliente, cr.cpf AS cpf, pl.plano AS plano,
													pg.tipo AS forma, cr.procedimento AS tipo, cr.dataEntrada AS dt_entrada,
													cr.horaEntrada AS hr_entrada, cr.dataSaida AS dt_saida, cr.horaSaida AS hr_saida,
													cr.saldo AS saldo, cr.status_pago AS pago, cr.pc_valor AS preco
										FROM
											cliente_reabilitacao cr
										    JOIN pagamento pg
										    ON cr.Pagamento_idPagamento = pg.idPagamento
											JOIN planos AS pl
										    ON cr.Planos_idPlano = pl.idPlano ORDER BY cr.idCliente_reabilitacao DESC'
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
															<a title='Sinalizar Pagamento' href='sinalizarPagamentoReabilitacao.php?id=<?php echo $value['codigo']; ?>' data-confirm-payment>
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
		document.getElementById("search").focus();
	</script>

<?php endif; ?>
</body>

</html>