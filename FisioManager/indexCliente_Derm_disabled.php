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
				<h5 class="modal-title" id="staticBackdropLabel">INFORMAÇÕES DO PACIENTE</h5>
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
				<h5 class="modal-title" id="staticBackdropLabel">ATESTADO DO PACIENTE</h5>
			</div>
			<div class="modal-body" style="overflow: auto; width: 100%;">
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
				<h5 class="card-title">Pacientes DERM - Desabilitado(s)
					<a href="indexCliente_Derm.php">
						<i class="bi bi-person-x-fill" title="Pacientes Habilitados" style=" color: green; font-size: 2rem; margin-right:5px; float: right; padding-bottom: 10px;"></i>
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
										<th width="25%">
											<center><font size=2>CLIENTE</font>
										</th>
										<th width="8%">
											<center><font size=2>CPF</font>
										</th>
										<th width="15%">
											<center><font size=2>PLANO</font>
										</th>
										</th>
										<th width="4%">
											<center><font size=2>VALOR</font>
										</th>																			
										<th width="8%">
											<center><font size=2>SESSÕES</font>
										</th>
                                        <th width="10%">
											<center><font size=2>ACÕES</font>
										</th>
									</tr>
								</thead>
								<tbody id="searchTable">
									<?php

									$buscaCliente = $pdo
									->prepare(
										'SELECT
											ce.idCliente_estetica AS codigo, ce.nome AS cliente, ce.cpf AS cpf, ce.peso AS peso, ce.altura AS altura, ce.Planos_idPlano AS Planos_idPlano,
										ce.procedimento AS tipo, ce.dataEntrada AS dt_entrada, ce.profissao AS profissao, pl.idPlano AS idPlano, pl.plano AS plano,
											ce.horaEntrada AS hr_entrada, ce.dataSaida AS dt_saida, ce.horaSaida AS hr_saida, ce.sessoes AS sessoes,
											ce.saldo AS saldo, ce.status_pago AS pago, ce.pc_valor AS preco, ce.disabled AS disabled
										FROM
											cliente_estetica ce
										    JOIN pagamento pg
										    ON ce.Pagamento_idPagamento = pg.idPagamento
											JOIN planos AS pl
										    ON ce.Planos_idPlano = pl.idPlano
                                            WHERE ce.disabled = 0 ORDER BY ce.idCliente_estetica DESC'
									);
									$buscaCliente->execute();
									$row = $buscaCliente->fetchAll(PDO::FETCH_ASSOC);

									if(count($row) > 0) {
										foreach ($row as $key => $value) { ?>

											<tr style="background-color: #FF00004B;">
												<td style="font-size: 16px; text-align: center;" title="Habilitar Paciente">
													<a href="enabledClienteDerm.php?id=<?php echo $value['codigo']; ?>&desbloquear=<?= 1 ?>" data-confirm-enabled-paciente ><i class="bi-x-circle-fill" style="color: green;"></i> </a>
												</td>

												<td alt="" style="font-size: 12px; text-align: center; text-overflow: ellipsis;"><?=ucwords($value['cliente']);?></td>

												<td style="font-size: 12px; text-align: center;" id="cpf"><?=$value['cpf'];?></td>

												<td style="font-size: 12px; text-align: center;" id="forma"><?=$value['plano'];?></td>

                                                <td style="font-size: 12px; text-align: center;" id="peso"><?=$value['peso'];?></td>

												<td style="font-size: 12px;  text-align: center;" id="sessoes">
													<form action="#" id="form" method="POST">
														<?php
														if(isset($_POST['editSessao'])) {
					
															$sessoes = $_POST['sessoes'];
															$id = $_POST['id'];	
														
															$updateSessao = $pdo->prepare("UPDATE cliente_estetica
																					   SET sessoes             = ?
																					   WHERE idCliente_estetica = ?");
					
															$updateSessao->bindValue(1, $sessoes);	
															$updateSessao->bindValue(2, $id);	
															$updateSessao->execute();
															
															if($updateSessao->rowCount() > 0) {
																		
																header("Location: indexCliente_Derm.php");
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

                                                <td style="font-size: 16px; text-align: center; width:60px;">
                                                    <a title ='Editar Paciênte' href='editCliente_Derm.php?id=<?php echo $value['codigo']; ?>&p=<?php echo $value['Planos_idPlano']; ?>' data-confirm-edit='Tem certeza de que deseja editar esse item selecionado?' style="margin-left: 5px;">
														<i class="bi bi-pencil" style="color: #007FB9;"></i>
													</a>
                                                    <a title ='Deletar Paciênte' href='deleteCliente_Derm.php?id=<?php echo $value['codigo']; ?>' data-confirm-del='Tem certeza de que deseja excluir o item selecionado?' style="margin-left: 5px;">
														<i class="bi bi-trash" style="color: #DD2828;"></i>
													</a>
													<a title="Visualizar Informações do Paciente" class="view_data" id="<?php echo $value['codigo']; ?>" style="margin-left: 5px;">
														<i class="bi bi-eye"></i>
													</a>
													<a title="Gerar Atestado para Paciente" class="view_data_2" id="<?php echo $value['codigo']; ?>" style="margin-left: 5px;">
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
						$.post('modalView_Derm.php', dados, function(retorna){
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
						$.post('modalView_Derm_2.php', dados, function(retorna){
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