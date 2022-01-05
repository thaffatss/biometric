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
            <i class="bi bi-exclamation-circle" Title="Gere relatório geral entre data de entrada!"></i>
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
											<h2>RELATÓRIO GERAL - REABILITAÇÃO</h2><br>
										</td>
										<td style="width: 10%;">
											<a title ='Gerar relatório em PDF' 
												href='relatorioGeralReabilitacaoPDF.php' accesskey="R" target="_blank">
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
                                        <th width="2%">
											<center><font size=2>D.ENTRADA</font>
										</th>
                                        <th width="2%">
											<center><font size=2>H.ENTRADA</font>
										</th>									
										<th width="10%">
											<center><font size=2>CLIENTE</font>
										</th>
										<th width="8%">
											<center><font size=2>CPF</font>
										</th>
										<th width="5%">
											<center><font size=2>F.PAGAMENTO</font>
										</th>
                                        <th width="8%">
											<center><font size=2>ENDEREÇO</font>
										</th>
                                        <th width="2%">
											<center><font size=2>PESO</font>
										</th>
                                        <th width="2%">
											<center><font size=2>ALTURA</font>
										</th>
                                        <th width="2%">
											<center><font size=2>IDADE</font>
										</th>
                                        <th width="8%">
											<center><font size=2>PROFISSÃO</font>
										</th>
                                        <th width="5%">
											<center><font size=2>TELEFONE</font>
										</th>
										<th width="2%">
											<center><font size=2>VALOR</font>
										</th>																			
										<th width="2%">
											<center><font size=2>SESSÕES</font>
										</th>
										<th width="2%">
											<center><font size=2>STATUS.PAG</font>
										</th>
									</tr>
								</thead>
								<tbody id="searchTable">
									<?php

									$buscaCliente = $pdo
									->prepare(
										"SELECT
											cr.idCliente_reabilitacao AS codigo, cr.nome AS cliente, cr.cpf AS cpf, cr.peso AS peso, cr.altura AS altura,
											pg.tipo AS forma, cr.procedimento AS tipo, cr.dataEntrada AS dt_entrada, cr.profissao AS profissao,
											cr.horaEntrada AS hr_entrada, cr.dataSaida AS dt_saida, cr.horaSaida AS hr_saida, cr.sessoes AS sessoes,
											cr.saldo AS saldo, cr.status_pago AS pago, cr.pc_valor AS preco, cr.endereco AS endereco, cr.idade AS idade,
                                            cr.telefone AS tel
										FROM cliente_reabilitacao cr
                                        JOIN pagamento pg ON cr.Pagamento_idPagamento = pg.idPagamento
                                        WHERE cr.dataEntrada BETWEEN'".$date1."'AND'".$date2."'"
									);
									$buscaCliente->execute();
									$row = $buscaCliente->fetchAll(PDO::FETCH_ASSOC);

									if(count($row) > 0) {
										foreach ($row as $key => $value) { $_SESSION['numRegistro'] = count($row); ?>

											<tr>
												<td style="font-size: 12px; text-align: center;"><?=$value['codigo'];?></td>

                                                <td alt="" style="font-size: 12px; text-align: center;"><?=date('d/m/Y', strtotime($value['dt_entrada']));?></td>

												<td style="font-size: 12px; text-align: center;" id="cpf"><?=$value['hr_entrada'];?></td>

												<td alt="" style="font-size: 12px; text-align: center;"><?=ucwords($value['cliente']);?></td>

												<td style="font-size: 12px; text-align: center;" id="cpf"><?=$value['cpf'];?></td>

												<td style="font-size: 12px; text-align: center;" id="forma"><?=$value['forma'];?></td>

                                                <td style="font-size: 12px; text-align: center;" id="forma"><?=$value['endereco'];?></td>

                                                <td style="font-size: 12px; text-align: center;" id="peso"><?=$value['peso'];?></td>

                                                <td style="font-size: 12px; text-align: center;" id="altura"><?=$value['altura'];?></td>

                                                <td style="font-size: 12px; text-align: center;" id="altura"><?=$value['idade'];?></td>

                                                <td style="font-size: 12px; text-align: center;" id="profissao"><?=$value['profissao'];?></td>

                                                <td style="font-size: 12px; text-align: center;" id="profissao"><?=$value['tel'];?></td>

												<td style="font-size: 12px; text-align: center;" id="preco"><?=$value['preco'];?></td>

												<td style="font-size: 12px; text-align: center;" id="sessoes"><?=$value['sessoes'];?></td>

												<?php
														if(($value['pago']) == 0){
													?>
														<td><div style="font-size: 12px; text-align: center; color:red;"><strong>DEVEDOR</strong></div></td>
													<?php
														} else {
													?>
														<td><div style="font-size: 12px; text-align: center; color:green;"><strong>PAGO</strong></div></td>
														
												<?php
														}
												?>
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