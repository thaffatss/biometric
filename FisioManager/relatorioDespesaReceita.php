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

		$_SESSION['date5'] = $date1;
        $_SESSION['date6'] = $date2;
?>
<div class="container" style="padding-top: 50px;">
<form action="" method="POST">
    <div class="row" style="justify-content: center; padding-bottom: 3rem;">
        <div class="col-5">
            <label for="date">De</label>
            <input class="form-control" type="date" name="date1" id="example-date-input" required>
        </div>
        
        <div class="col-5">
            <label for="date">Até</label>
            <input class="form-control" type="date" name="date2" id="example-date-input" required>
        </div>
        <div class="col-2" style="margin:auto; padding-top: 2.5%;">
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
											<h2>RELATÓRIO RECEITAS/DESPESAS</h2><br>
										</td>
										<td style="width: 10%;">
											<a title ='Gerar PDF' 
												href='relatorioDespesaReceitaPDF.php' accesskey="2" target="_blank">
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
										<th width="35%">
											<center><font size=2>RECEITA</font>
										</th>
										<th width="35%">
											<center><font size=2>DESPESA</font>
										</th>
										<th width="35%">
											<center><font size=2>SUBTOTAL</font>
										</th>
									</tr>
								</thead>
								<tbody id="searchTable">
									<tr>
									<?php
									$buscaCliente1 = $pdo
									->prepare("SELECT SUM(r.valor) AS receita FROM receita r WHERE r.data BETWEEN'".$date1."'AND'".$date2."'");
									$buscaCliente1->execute();
									$row = $buscaCliente1->fetchALL(PDO::FETCH_ASSOC);
									if(count($row) > 0) {
										foreach ($row as $key => $value1) { ?>
											<td style="font-size: 12px; text-align: center;">R$ <?=number_format($value1['receita'],2,",",".");?></td>
									<?php
									
											$buscaCliente2 = $pdo
											->prepare("SELECT SUM(d.valor) AS despesa FROM despesa d WHERE d.data BETWEEN'".$date1."'AND'".$date2."'");
											$buscaCliente2->execute();
											$row = $buscaCliente2->fetchALL(PDO::FETCH_ASSOC);
											if(count($row) > 0) {
												foreach ($row as $key => $value2) { ?>
											<td style="font-size: 12px; text-align: center;">R$ <?=number_format($value2['despesa'],2,",",".");?></td>
									
											<td style="font-size: 12px; text-align: center;">R$ <?=number_format($total = $value1['receita'] - $value2['despesa'],2,",",".");?></td>
									</tr>
									<?php
												}
											}

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