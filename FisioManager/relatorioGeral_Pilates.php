<?php	
		ini_set('display_errors', 'Off');
		error_reporting(E_ALL | E_STRICT);
		
		require_once "menu.php";
			
		// Valida se usuário tá logado caso contrario, manda pro login.
		if(!isset($_SESSION['id_usuario'])) {
			header("Location: index.php"); 
				
		} if(isset($_SESSION['id_usuario'])) {
        $date1 = date('Y/m/d', strtotime($_POST['date1']));
        $date2 = date('Y/m/d', strtotime($_POST['date2']));

		$_SESSION['date1'] = $date1;
        $_SESSION['date2'] = $date2;
?>
<div class="container" style="padding-top: 50px;">
<form action="" method="POST">
    <div class="row" style="justify-content: center; padding-bottom: 3rem;">
        <div class="col-4">
            <label for="date">De</label>
            <input class="form-control" type="date" name="date1" id="example-date-input" required>
        </div>
        
        <div class="col-4">
            <label for="date">Até</label>
            <input class="form-control" type="date" name="date2" id="example-date-input" required>
        </div>
        <div class="col-2" style="margin:auto; padding-top: 2.5%;">
            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Buscar</button>
        </div>
        <div class="col-2" style="margin:auto; padding-top: 2.5%;">
            <i class="bi bi-exclamation-circle" Title="Gere relatório geral entre data de vencimento!"></i>
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
											<h2>RELATÓRIO GERAL - PILATES</h2><br>
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
										<th width="2%">
											<center><font size=2>#</font>
										</th>
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
											<center><font size=2>F.PAGAMENTO</font>
										</th>
                                        <th width="15%">
											<center><font size=2>ENDEREÇO</font>
										</th>
                                        <th width="8%">
											<center><font size=2>PROFISSÃO</font>
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
									</tr>
								</thead>
								<tbody id="searchTable">
									<?php

									$buscaCliente = $pdo
									->prepare(
										"SELECT
											cp.idCliente_pilates AS codigo, cp.nome AS cliente, cp.cpf AS cpf,pg.tipo AS forma, cp.procedimento AS tipo, 
											cp.dataInicio AS dt_inicio, cp.dataFim AS dt_fim, cp.profissao AS profissao, cp.sessoes AS sessoes, 
											cp.status_pago AS pago, cp.pc_valor AS preco,
											cp.endereco AS endereco, cp.telefone AS tel, DATEDIFF (cp.dataInicio, cp.dataFim) AS qtdDias
										FROM cliente_pilates cp
                                        JOIN pagamento pg ON cp.Pagamento_idPagamento = pg.idPagamento
                                        WHERE cp.dataFim BETWEEN'".$date1."'AND'".$date2."'"
									);
									$buscaCliente->execute();
									$row = $buscaCliente->fetchAll(PDO::FETCH_ASSOC);

									if(count($row) > 0) {
										foreach ($row as $key => $value) { $_SESSION['numRegistro'] = count($row); ?>

											<tr>
												<td style="font-size: 12px; text-align: center;"><?=$value['codigo']?></td>

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

												<td style="font-size: 12px; text-align: center;" id="forma"><?=$value['forma']?></td>

                                                <td style="font-size: 12px; text-align: center;" id="endereco"><?=$value['endereco']?></td>

                                                <td style="font-size: 12px; text-align: center;" id="profissao"><?=$value['profissao']?></td>

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