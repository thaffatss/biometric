<?php	
		ini_set('display_errors', 'Off');
		error_reporting(E_ALL | E_STRICT);
		
		require_once "menu.php";
			
		// Valida se usuário tá logado caso contrario, manda pro login.
		if(!isset($_SESSION['id_usuario'])) {
			header("Location: index.php"); 
				
		} if(isset($_SESSION['id_usuario'])) {
    
?>
<div class="row" style="margin-left:10px; margin-top: 60px; margin-right: 10px;">
<div class="col-md-12">
				<!-- Advanced Tables -->
				<div class="panel panel-default">
					<div class="panel-header">
						<div class="table-responsive">
							<table style="width:100%">
								<tbody>
									<tr>
										<td style="width: 100%; text-align:center;">
											<h2>RELATÓRIO DE CLIENTE(S) ADIMPLENTE - REABILITAÇÃO</h2><br>
										</td>
										<td style="width: 10%;">
											<a title ='Cadastrar Cliente' 
												href='relatorioGeralPilatesPDF2.php' accesskey="R" target="_blank">
												<i class="bi bi-printer-fill" style="font-size: 2rem; margin-right:5px; float: right;"></i>
												
											</a>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
                    <?php
					$buscaClienteQtd = $pdo->prepare("SELECT count(*) AS qtd FROM cliente_reabilitacao WHERE status_pago = 1");
					$buscaClienteQtd->execute();
					$rowQtd = $buscaClienteQtd->fetchAll(PDO::FETCH_ASSOC);
					
					if(count($rowQtd) >= 1) {
						foreach ($rowQtd as $value) {
						
                    ?>
                        <table class="table table-dark" style="margin: 0px;">
                            <tr>
                                <th class="col-12" style="text-align: right;">Total <?php echo $value['qtd'] ?> Cliente(s)</th>
                            </tr>
                        </table>  
                    <?php
						}
                        }
                    ?>
					<div class="panel-body" style="overflow: auto; width: 100%; height: 300px;">
						<div class="table-responsive">
							<table class="table table-striped table-bordered table-hover" 
								   id="table-indexFluxo"
								   style="width: 100%">
								<thead>
									<tr>
                                        <th width="5%">
											<center><font size=2>CÓDIGO</font>
										</th>
                                        <th width="5%">
											<center><font size=2>MATRICULA</font>
										</th>
                                        <th width="5%">
											<center><font size=2>VENCIMENTO</font>
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
											cr.idCliente_reabilitacao AS codigo, cr.nome AS cliente, cr.cpf AS cpf,
											cr.dataEntrada AS dt_entrada, cr.horaEntrada AS hr_entrada, cr.sessoes AS sessoes, 
											cr.status_pago AS pago, cr.pc_valor AS preco,
											cr.endereco AS endereco, cr.telefone AS tel
										FROM cliente_reabilitacao cr
										WHERE cr.status_pago = 1"
									);
									$buscaCliente->execute();
									$row = $buscaCliente->fetchAll(PDO::FETCH_ASSOC);
    
									if(count($row) > 0) {
										foreach ($row as $key => $value) {
                                        ?>
											<tr>
												<input type="text" value="<?=$value['codigo']?>" hidden>

                                                <td alt="" style="font-size: 12px; text-align: center;"><?=$value['codigo']?></td>

                                                <td alt="" style="font-size: 12px; text-align: center;"><?=date('d/m/Y', strtotime($value['dt_entrada']))?></td>

												<td alt="" style="font-size: 12px; text-align: center;"><?=($value['hr_entrada'])?></td>

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
                                                    <a title ='Editar Paciente' href='editCliente_Pilates.php?id=<?php echo $value['codigo']; ?>' data-confirm-edit='Tem certeza de que deseja editar esse item selecionado?' style="margin-left: 5px;">
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