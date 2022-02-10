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
				<h5 class="modal-title" id="staticBackdropLabel">INFORMAÇÕES DO ALUNO</h5>
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
				<h5 class="card-title">Alunos Quiropraxia
				<a href="indexCliente_Disabled.php">
						<i class="bi bi-person-x-fill" title="Alunos Desabilitados" style=" color: #C92332; font-size: 2rem; margin-right:5px; float: right; padding-bottom: 10px;"></i>
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
											<center><font size=2>NOME</font>
										</th>
										<th width="8%">
											<center><font size=2>CPF</font>
										</th>
										<th width="15%">
											<center><font size=2>PLANO</font>
										</th>	
										<th width="4%">
											<center><font size=2>VALOR</font>
										</th>																			
										<th width="11%">
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
											c.idCliente AS codigo, c.nome AS cliente, c.cpf AS cpf, c.peso AS peso, c.altura AS altura,
											c.procedimento AS tipo, c.dataEntrada AS dt_entrada, c.profissao AS profissao,
											c.horaEntrada AS hr_entrada, c.dataSaida AS dt_saida, c.horaSaida AS hr_saida, c.sessoes AS sessoes,
											c.saldo AS saldo, c.status_pago AS pago, c.pc_valor AS preco, pl.plano AS plano, c.disabled AS disabled
										FROM
											cliente c
										    JOIN pagamento pg
										    ON c.Pagamento_idPagamento = pg.idPagamento
											JOIN planos AS pl
										    ON c.Planos_idPlano = pl.idPlano
											WHERE c.disabled = 1 ORDER BY c.idCliente DESC'
									);
									$buscaCliente->execute();
									$row = $buscaCliente->fetchAll(PDO::FETCH_ASSOC);

									if(count($row) > 0) {
										foreach ($row as $key => $value) { ?>

											<tr>
												<td style="font-size: 16px; text-align: center;" title="Desabilitar Aluno">
													<a href="disabledCliente.php?id=<?php echo $value['codigo']; ?>&bloquear=<?= 0 ?>" data-confirm-disabled-paciente > <i class="bi-x-circle-fill" style="color: red;"></i> </a>
												</td>

												<td alt="" style="font-size: 12px; text-align: center; text-overflow: ellipsis;"><?=ucwords($value['cliente']);?></td>

												<td style="font-size: 12px; text-align: center;" id="cpf"><?=$value['cpf'];?></td>

												<td style="font-size: 12px; text-align: center;" id="forma"><?=$value['plano'];?></td>

												<td style="font-size: 12px; text-align: center;" id="preco"><?=$value['preco'];?></td>

												<td style="font-size: 12px;  text-align: center;" id="sessoes">
													<form action="#" method="POST">
														<?php
														if(isset($_POST['editSessao'])) {
					
															$sessoes = $_POST['sessoes'];
															$id = $_POST['id'];	
														
															$updateSessao = $pdo->prepare("UPDATE cliente
																					   SET sessoes      = ?
																					   WHERE idCliente  = ?");
					
															$updateSessao->bindValue(1, $sessoes);	
															$updateSessao->bindValue(2, $id);	
															$updateSessao->execute();
															
															if($updateSessao->rowCount() > 0) {
																		
																header("Location: indexCliente.php");
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
                                                    <a title ='Editar Aluno' href='editCliente.php?id=<?= $value['codigo'] ?>' data-confirm-edit='Tem certeza de que deseja editar esse item selecionado?' style="margin-left: 5px;">
														<i class="bi bi-pencil" style="color: #007FB9;"></i>
													</a>
                                                    <a title ='Deletar Aluno' href='deleteCliente.php?id=<?= $value['codigo'] ?>' data-confirm-del='Tem certeza de que deseja excluir o item selecionado?' style="margin-left: 5px;">
														<i class="bi bi-trash" style="color: #DD2828;"></i>
													</a>
													<a title="Visualizar Informações do Aluno" class="view_data" id="<?= $value['codigo'] ?>" style="margin-left: 5px;">
														<i class="bi bi-eye"></i>
													</a>
													<a title="Gerar Atestado para Aluno" class="view_data_2" id="<?= $value['codigo'] ?>" style="margin-left: 5px;">
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
						$.post('modalView_Quiropraxia.php', dados, function(retorna){
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
						$.post('modalView_Quiropraxia_2.php', dados, function(retorna){
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