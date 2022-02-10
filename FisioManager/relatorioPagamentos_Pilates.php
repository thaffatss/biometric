<?php	
		ini_set('display_errors', 'Off');
		error_reporting(E_ALL | E_STRICT);
		
		require_once "menu.php";
			
		// Valida se usuário tá logado caso contrario, manda pro login.
		if(!isset($_SESSION['id_usuario'])) {
			header("Location: index.php"); 
				
		} if(isset($_SESSION['id_usuario'])) {
        $dias = ltrim($_POST['dias'], '-');

		$_SESSION['dias'] = $dias;
        
?>
<div class="container" style="padding-top: 50px;">
<form action="" method="POST">
	<div class="row" style="justify-content: center; padding-bottom: 3rem;">
		<div class="input-group mb-3">
  			<input type="number" class="form-control" placeholder="Didite a quantidade de dias para vencer" name="dias" aria-label="Recipient's username" aria-describedby="button-addon2">
  			<button class="btn btn-outline-secondary" type="submit" id="button-addon2">Buscar</button>
			</div>
    </div>
</form>
</div>
<div class="row" style="margin-left:10px; margin-top: 15px; margin-right: 10px;">
<div class="col-md-12">
				<!-- Advanced Tables -->
				<div class="panel panel-default">
					<div class="panel-header">
						<div class="table-responsive">
							<table style="width:100%">
								<tbody>
									<tr>
										<td style="width: 100%; text-align:center;">
											<h2>RELATÓRIO DE VENCIMENTO(S) - PILATES</h2><br>
										</td>
										<td style="width: 10%;">
											<a title ='Cadastrar Cliente' 
												href='relatorioGeralPilatesPDF.php' accesskey="R" target="_blank">
												<i class="bi bi-printer-fill" style="font-size: 2rem; margin-right:5px; float: right;"></i>
												
											</a>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<div class="panel-body" style="overflow: auto; width: 100%; height: 300px;">
						<div class="table-responsive">
							<table class="table table-striped table-bordered table-hover" 
								   id="table-indexFluxo"
								   style="width: 100%">
								<thead>
									<tr>
                                        <th width="5%">
											<center><font size=2>MATRICULA</font>
										</th>
                                        <th width="5%">
											<center><font size=2>VENCIMENTO</font>
										</th>
										<th width="5%">
											<center><font size=2>D.VENC</font>
										</th>								
										<th width="15%">
											<center><font size=2>CLIENTE</font>
										</th>
										<th width="8%">
											<center><font size=2>CPF</font>
										</th>
                                        <th width="8%">
											<center><font size=2>TELEFONE</font>
										</th>
										<th width="3%">
											<center><font size=2>VALOR</font>
										</th>																			
										<th width="3%">
											<center><font size=2>SESSÕES</font>
										</th>
										<th width="3%">
											<center><font size=2>STATUS.PAG</font>
										</th>
										<th width="3%">
											<center><font size=2>AÇÕES</font>
										</th>
									</tr>
								</thead>
								<tbody id="searchTable">
									<?php

									$buscaCliente = $pdo
									->prepare(
										"SELECT
											cp.idCliente_pilates AS codigo, cp.nome AS cliente, cp.cpf AS cpf, cp.procedimento AS tipo, 
											cp.dataInicio AS dt_inicio, cp.dataFim AS dt_fim, cp.profissao AS profissao, cp.sessoes AS sessoes, 
											cp.status_pago AS pago, cp.pc_valor AS preco, DATEDIFF(CURDATE(), dataFim) AS qtdDias,
											cp.endereco AS endereco, cp.telefone AS tel
										FROM cliente_pilates cp
										WHERE DATEDIFF(CURDATE(), cp.dataFim) = -$dias"
									);
									$buscaCliente->execute();
									$row = $buscaCliente->fetchAll(PDO::FETCH_ASSOC);

									if(count($row) > 0) {
										foreach ($row as $key => $value) { $_SESSION['numRegistro'] = count($row); ?>
											
											<tr>
												<input type="text" value="<?=$value['codigo']?>" hidden>

                                                <td alt="" style="font-size: 12px; text-align: center;"><?=date('d/m/Y', strtotime($value['dt_inicio']))?></td>

												<td alt="" style="font-size: 12px; text-align: center;"><?=date('d/m/Y', strtotime($value['dt_fim']))?></td>

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

												<td alt="" style="font-size: 12px; text-align: center;"><?=ucwords($value['cliente'])?></td>

												<td style="font-size: 12px; text-align: center;" id="cpf"><?=$value['cpf']?></td>

                                                <td style="font-size: 12px; text-align: center;" id="tel"><?=$value['tel']?></td>

												<td style="font-size: 12px; text-align: center;" id="preco"><?=$value['preco']?></td>

												<td style="font-size: 12px; text-align: center;" id="sessoes"><?=$value['sessoes']?></td>

												<td style="font-size: 16px; text-align: center;">
													
													<?php
														if(($value['pago']) == 0){
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
												<td style="font-size: 16px; text-align: center; width:60px;">
                                                    <a title ='Editar Paciente' href='editCliente_Pilates.php?id=<?php echo $value['codigo']; ?>&p=<?php echo $value['Planos_idPlano']; ?>' data-confirm-edit='Tem certeza de que deseja editar esse item selecionado?' style="margin-left: 5px;">
														<i class="bi bi-pencil" style="color: #007FB9;"></i>
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
<?php } ?>
<?php require_once "footer.php"; ?>
</html>