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
					<h5 class="card-title">Entrada Pilates
						<a title='Cadastrar Cliente' href='entradaCliente_Pilates.php' accesskey="C">
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
													<font size=2>MATRICULA</font>
											</th>
											<th width="5%">
												<center>
													<font size=2>VENCIMENTO</font>
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

										$buscaClientePilates = $pdo
											->prepare(
												'SELECT
											cp.id AS codigo, cp.nome AS cliente, cp.cpf AS cpf, pl.plano AS plano,
											pg.tipo AS forma, cp.dataInicio AS dt_inicio,
											cp.dataFim AS dt_fim, cp.status_pago AS pago, cp.pc_valor AS preco
										FROM
											cliente_pilates cp
										    JOIN pagamento pg
										    ON cp.Pagamento_idPagamento = pg.idPagamento
											JOIN planos AS pl
										    ON cp.Planos_idPlano = pl.idPlano ORDER BY cp.id DESC'
										);
										$buscaClientePilates->execute();
										$row = $buscaClientePilates->fetchAll(PDO::FETCH_ASSOC);



										if (count($row) > 0) {
											foreach ($row as $value) {
												date_default_timezone_set('America/Rio_Branco');
												if (isset($value['codigo'])) {
													$id = $value['codigo'];
													$sinalPago = $pdo->prepare("UPDATE cliente_pilates SET status_pago  = 0 WHERE idCliente_pilates = ? AND dataFim < ?");
													$sinalPago->bindValue(1, $id);
													$sinalPago->bindValue(2, date('Y/m/d'));
													$sinalPago->execute();
												}
										?>
												<tr>
													<td style="font-size: 12px; text-align: center;"><?= $_SESSION['codStsPag'] = $value['codigo']; ?></td>

													<td style="font-size: 12px; text-align: center;"><?= ($value['cliente']); ?></td>

													<td style="font-size: 12px; text-align: center;" id="cpf"><?= $value['cpf']; ?></td>

													<td style="font-size: 12px; text-align: center; text-overflow: ellipsis;"><?= ucwords($value['forma']); ?></td>

													<td style="font-size: 12px; text-align: center;"><?= ucwords($value['plano']); ?></td>

													<td style="font-size: 12px; text-align: center;"><?= isset($value['dt_inicio']) ? date('d/m/Y', strtotime($value['dt_inicio'])) : '' ?></td>

													<td style="font-size: 12px; text-align: center;"><?= isset($value['dt_fim']) ? date('d/m/Y', strtotime($value['dt_fim'])) : '' ?></td>

													<td style="font-size: 12px; text-align: center;"><?= $value['preco']; ?></td>

													<td style="font-size: 16px; text-align: center;">
														<input type="text" value="<?= $value['codigo'] ?>" hidden id="inputId">
														<a href='' title="Cadastrar Biometria" id="btn-capture">
														<span>
															<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-fingerprint" viewBox="0 0 16 16">
																<path d="M8.06 6.5a.5.5 0 0 1 .5.5v.776a11.5 11.5 0 0 1-.552 3.519l-1.331 4.14a.5.5 0 0 1-.952-.305l1.33-4.141a10.5 10.5 0 0 0 .504-3.213V7a.5.5 0 0 1 .5-.5Z"/>
																<path d="M6.06 7a2 2 0 1 1 4 0 .5.5 0 1 1-1 0 1 1 0 1 0-2 0v.332c0 .409-.022.816-.066 1.221A.5.5 0 0 1 6 8.447c.04-.37.06-.742.06-1.115V7Zm3.509 1a.5.5 0 0 1 .487.513 11.5 11.5 0 0 1-.587 3.339l-1.266 3.8a.5.5 0 0 1-.949-.317l1.267-3.8a10.5 10.5 0 0 0 .535-3.048A.5.5 0 0 1 9.569 8Zm-3.356 2.115a.5.5 0 0 1 .33.626L5.24 14.939a.5.5 0 1 1-.955-.296l1.303-4.199a.5.5 0 0 1 .625-.329Z"/>
																<path d="M4.759 5.833A3.501 3.501 0 0 1 11.559 7a.5.5 0 0 1-1 0 2.5 2.5 0 0 0-4.857-.833.5.5 0 1 1-.943-.334Zm.3 1.67a.5.5 0 0 1 .449.546 10.72 10.72 0 0 1-.4 2.031l-1.222 4.072a.5.5 0 1 1-.958-.287L4.15 9.793a9.72 9.72 0 0 0 .363-1.842.5.5 0 0 1 .546-.449Zm6 .647a.5.5 0 0 1 .5.5c0 1.28-.213 2.552-.632 3.762l-1.09 3.145a.5.5 0 0 1-.944-.327l1.089-3.145c.382-1.105.578-2.266.578-3.435a.5.5 0 0 1 .5-.5Z"/>
																<path d="M3.902 4.222a4.996 4.996 0 0 1 5.202-2.113.5.5 0 0 1-.208.979 3.996 3.996 0 0 0-4.163 1.69.5.5 0 0 1-.831-.556Zm6.72-.955a.5.5 0 0 1 .705-.052A4.99 4.99 0 0 1 13.059 7v1.5a.5.5 0 1 1-1 0V7a3.99 3.99 0 0 0-1.386-3.028.5.5 0 0 1-.051-.705ZM3.68 5.842a.5.5 0 0 1 .422.568c-.029.192-.044.39-.044.59 0 .71-.1 1.417-.298 2.1l-1.14 3.923a.5.5 0 1 1-.96-.279L2.8 8.821A6.531 6.531 0 0 0 3.058 7c0-.25.019-.496.054-.736a.5.5 0 0 1 .568-.422Zm8.882 3.66a.5.5 0 0 1 .456.54c-.084 1-.298 1.986-.64 2.934l-.744 2.068a.5.5 0 0 1-.941-.338l.745-2.07a10.51 10.51 0 0 0 .584-2.678.5.5 0 0 1 .54-.456Z"/>
																<path d="M4.81 1.37A6.5 6.5 0 0 1 14.56 7a.5.5 0 1 1-1 0 5.5 5.5 0 0 0-8.25-4.765.5.5 0 0 1-.5-.865Zm-.89 1.257a.5.5 0 0 1 .04.706A5.478 5.478 0 0 0 2.56 7a.5.5 0 0 1-1 0c0-1.664.626-3.184 1.655-4.333a.5.5 0 0 1 .706-.04ZM1.915 8.02a.5.5 0 0 1 .346.616l-.779 2.767a.5.5 0 1 1-.962-.27l.778-2.767a.5.5 0 0 1 .617-.346Zm12.15.481a.5.5 0 0 1 .49.51c-.03 1.499-.161 3.025-.727 4.533l-.07.187a.5.5 0 0 1-.936-.351l.07-.187c.506-1.35.634-2.74.663-4.202a.5.5 0 0 1 .51-.49Z"/>
															</svg>
														</span>
														</a>
													</td>


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
															<a title='Sinalizar Pagamento' href='sinalizarPagamentoPilates.php?id=<?php echo $value['codigo']; ?>' data-confirm-payment>
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