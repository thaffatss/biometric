<?php	
		ini_set('display_errors', 'Off');
		error_reporting(E_ALL | E_STRICT);
		
		require_once "menu.php";
			
		// Valida se usuário tá logado caso contrario, manda pro login.
		if(!isset($_SESSION['id_usuario'])) {
			header("Location: index.php"); 
				
		} if(isset($_SESSION['id_usuario'])) {
?>
        <!-- Modal info paciente -->
		<div class="modal fade" id="visualizarPacienteModal1" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
			<div class="modal-dialog">
			<div class="modal-content">
			<div class="modal-header bg-primary text-white">
				<h5 class="modal-title" id="staticBackdropLabel">PRONTUÁRIO DO ALUNO</h5>
			</div>
			<div class="modal-body" style="overflow: auto; width: 100%; height: 400px;">
				<span id="visul_paciente"></span>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Fecha</button>
			</div>
			</div>
			</div>
		</div>

		<!-- Modal Atestado do Paciente -->
		<div class="modal fade" id="visualizarPacienteModal2" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
			<div class="modal-dialog">
			<div class="modal-content">
			<div class="modal-header bg-primary text-white">
				<h5 class="modal-title" id="staticBackdropLabel">ATESTADO DO ALUNO</h5>
			</div>
			<div class="modal-body" style="overflow: auto; width: 100%; height: 400px;">
				<span id="atestado"></span>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Fecha</button>
			</div>
			</div>
			</div>
		</div>
		
		<div class="row" style="margin-left:10px; margin-top: 15px; margin-right: 10px;">
			<div class="col-md-12">
            <input class="form-control" id="search" type="text" placeholder="Buscar">
            <br>
			<div class="card">
				<div class="card-body">
				<h5 class="card-title">Alunos Pilates - Desabilitado(s)
					<a href="indexCliente_Pilates.php">
						<i class="bi bi-person-check-fill" title="Alunos Habilitados" style=" color: green; font-size: 2rem; margin-right:5px; float: right; padding-bottom: 10px;"></i>
					</a>
				</h5>
				
				<!-- Advanced Tables -->
				<div class="panel panel-default">
					<div class="panel-body" style="overflow: auto; height: 400px; width: 100%;">
						<div class="table-responsive">
							<table class="table table-striped table-bordered table-hover" 
								   id="table-indexFluxo"
								   style="width: 100%">
								<thead>
									<tr>
										<th width="2%">
											<center><font size=2></font>
										</th>										
										<th width="12%">
											<center><font size=2>NOME</font>
										</th>
										<th class="th-cpf" width="8%">
											<center><font size=2>CPF</font>
										</th>
										<th width="7%">
											<center><font size=2>F.PAGAMENTO</font>
										</th>
										<th width="5%">
											<center><font size=2>MATRICULA</font>
										</th>
										<th width="5%">
											<center><font size=2>VENCIMENTO</font>
										</th>
										<th width="2%">
											<center><font size=2>D.VENC</font>
										</th>
										<th width="12%">
											<center><font size=2>PLANO</font>
										</th>
										<th width="2%">
											<center><font size=2>VALOR</font>
										</th>																			
										<th width="8%">
											<center><font size=2>SESSÕES</font>
										</th>
                                        <th width="2%">
											<center><font size=2>STATUS</font>
										</th>
										<th class="th-acoes" width="11%">
											<center><font size=2>ACÕES</font>
										</th>
									</tr>
								</thead>
								<tbody id="searchTable">
									<?php
									$buscaClientePilates = $pdo
									->prepare(
										'SELECT
											cp.idCliente_pilates AS codigo, cp.nome AS cliente, cp.cpf AS cpf, pg.tipo AS forma, cp.dataInicio AS dt_inicio, pl.plano AS plano,
											cp.profissao AS profissao, cp.dataFim AS dt_fim, cp.sessoes AS sessoes, cp.procedimento AS tipo, cp.Planos_idPlano AS Planos_idPlano,
											cp.status_pago AS pago, cp.pc_valor AS preco, cp.status AS sts, DATEDIFF(CURDATE(), cp.dataFim) AS qtdDias, cp.dataBloqueio AS bloqueio,
											cp.dataLiberacao AS liberacao, cp.disabled AS disabled
										FROM
											cliente_pilates AS cp
										    JOIN pagamento AS pg
										    ON cp.Pagamento_idPagamento = pg.idPagamento 
											JOIN planos AS pl
										    ON cp.Planos_idPlano = pl.idPlano 
											WHERE cp.disabled = 0 ORDER BY cp.idCliente_pilates DESC'
									);
									$buscaClientePilates->execute();
									$row = $buscaClientePilates->fetchAll(PDO::FETCH_ASSOC);

									if(count($row) > 0) {
										foreach ($row as $value) { 
											?>
											
											<tr style="background-color: #FF00004B;">
												<td style="font-size: 16px; text-align: center;" title="Habilitar Aluno">
													<a href="enabledClientePilates.php?id=<?php echo $value['codigo']; ?>&desbloquear=<?= 1 ?>" data-confirm-enabled-paciente > <i class="bi-x-circle-fill" style="color: green;"></i> </a>
												</td>

												<td alt="" style="font-size: 12px; text-align: center; text-overflow: ellipsis;"><?=ucwords($value['cliente']);?></td>

												<td class="td-cpf" style="font-size: 12px; text-align: center;" id="cpf"><?=$value['cpf']?></td>

												<td style="font-size: 12px; text-align: center;" id="forma"><?=$value['forma']?></td>

												<td style="font-size: 12px; text-align: center;" id="matricula"><?=isset($value['dt_inicio']) ? date('d/m/Y', strtotime($value['dt_inicio'])) : '' ?></td>

												<td style="font-size: 12px; text-align: center;" id="vencimento"><?=isset($value['dt_fim']) ? date('d/m/Y', strtotime($value['dt_fim'])) : '' ?></td>
												<?php
												if(ltrim($value['qtdDias'], '-') <= 2 ) {
												?>
													<td style="font-size: 12px; text-align: center; color:red;" id="vencimento"><?= ltrim($value['qtdDias'], '-') ?></td>
												<?php
												} elseif(ltrim($value['qtdDias'], '-') > 2 ) {
												?>
													<td style="font-size: 12px; text-align: center; color:green;" id="vencimento"><?= ltrim($value['qtdDias'], '-') ?></td>
												<?php
												}
												?>
												
												<td style="font-size: 12px; text-align: center;" id="plano"><?=$value['plano']?></td>

												<td style="font-size: 12px; text-align: center;" id="preco"><?=$value['preco']?></td>

												<td style="font-size: 12px;  text-align: center;" id="sessoes">
													<form action="#" method="POST">
														<?php
														if(isset($_POST['editSessao'])) {
					
															$sessoes = $_POST['sessoes'];
															$id = $_POST['id'];	
														
															$updateSessao = $pdo->prepare("UPDATE cliente_pilates
																					   SET sessoes             = ?
																					   WHERE idCliente_pilates = ?");
					
															$updateSessao->bindValue(1, $sessoes);	
															$updateSessao->bindValue(2, $id);	
															$updateSessao->execute();
															
															if($updateSessao->rowCount() > 0) {
																		
																header("Location: indexCliente_Pilates.php");
															}
														}
														?>
														
														<div class="input-group">
															<input value="<?= $value['codigo'] ?>"type="text" name="id" id="id" hidden>
															<input class="form-control" style="max-height: 22px; font-size: 10px; margin-right: 2px;" type="number" name="sessoes" value="<?= $value['sessoes'] ?>" id="num" aria-label="Recipient's username" aria-describedby="button-addon2">
															<input class="btn btn-outline-success" style="max-height: 22px; font-size: 10px; padding: 4px;" type="submit" value="OK" name="editSessao" id="button-addon2"></input>
														</div>
													</form>
												</td>

												<?php
													if($value['sts'] == 0 ) {
												?>
													<td style="font-size: 15px; text-align: center;"><a data-confirm-open title ='Desbloquear Mensalidade - Data Bloqueio: <?= date('d/m/Y', strtotime($value['bloqueio'])) ?>' href="sinalizarStatusOpenPilates.php?id=<?= $value['codigo']; ?>&date=<?= $_SESSION['dt_locked']; ?>"><i style="color:red;" class="bi bi-lock-fill"></i></a></td>
												<?php
													} else {
												?>
													<td style="font-size: 15px; text-align: center;"><a title ='Bloquear Mensalidade - Data Desbloqueio: <?= date('d/m/Y', strtotime($value['liberacao'])) ?>' data-confirm-block href="sinalizarStatusClosedPilates.php?id=<?= $value['codigo']; ?>&date=<?= $_SESSION['dt_locked']; ?>"><i style="color:green;" class="bi bi-unlock-fill"></i></a></td>
												<?php
													}
												?>

												

                                                <td style="font-size: 16px; text-align: center; width:60px;">
                                                    <a title ='Editar Aluno' href='editCliente_Pilates.php?id=<?php echo $value['codigo']; ?>&p=<?php echo $value['Planos_idPlano']; ?>' data-confirm-edit='Tem certeza de que deseja editar esse item selecionado?' style="margin-left: 5px;">
														<i class="bi bi-pencil" style="color: #007FB9;"></i>
													</a>
                                                    <a title ='Deletar Aluno' href='deleteCliente_Pilates.php?id=<?php echo $value['codigo']; ?>' data-confirm-del='Tem certeza de que deseja excluir o item selecionado?' style="margin-left: 5px;">
														<i class="bi bi-trash" style="color: #DD2828;"></i>
													</a>
													<a title="Visualizar Prontuário do Aluno" class="view_data" id="<?php echo $value['codigo']; ?>" style="margin-left: 5px;">
														<i class="bi bi-eye"></i>
													</a>
													<a title="Gerar Atestado para Aluno" class="view_data_2" id="<?php echo $value['codigo']; ?>" style="margin-left: 5px;">
														<i class="bi bi-journal-text"></i>
													</a>
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
            $(document).ready(function(){
            $("#search").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#searchTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
            });
        </script>
		<!-- MODAL INFO PACIENTE -->
		<script>
			$(document).ready(function() {
				$(document).on('click', '.view_data', function(){
					var user_id = $(this).attr("id");
					//alert(user_id);
					//Verifica se há valor na variavel codigo.
					if(user_id != '') {
						var dados = {
							user_id: user_id
						};
						$.post('modalView_Pilates.php', dados, function(retorna){
							$("#visul_paciente").html(retorna);
							$('#visualizarPacienteModal1').modal('show');
						});
					}
				});
			});
		</script>
		<!-- MODAL ATESTADO PACIENTE-->
		<script>
			$(document).ready(function() {
				$(document).on('click', '.view_data_2', function(){
					var user_id = $(this).attr("id");
					//alert(user_id);
					//Verifica se há valor na variavel codigo.
					if(user_id != '') {
						var dados = {
							user_id: user_id
						};
						$.post('modalView_Pilates_2.php', dados, function(retorna){
							$("#atestado").html(retorna);
							$('#visualizarPacienteModal2').modal('show');
						});
					}
				});
			});
		</script>
		<script type="text/javascript">
    		document.getElementById("search").focus();
		</script>
	</body>
</html>

<?php } ?> 