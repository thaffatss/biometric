<?php	
		ini_set('display_errors', 'Off');
		error_reporting(E_ALL | E_STRICT);
			
			require_once "menu.php";
			// Valida se usuário tá logado caso contrario, manda pro login.
			if(!isset($_SESSION['id_usuario'])):
				header("Location: index.php"); 
				
			endif; 
			if(isset($_SESSION['id_usuario'])):
					
	?>	
		<div class="col-md-12" style="padding-top:30px;">
			<input class="form-control" id="search" type="text" placeholder="Buscar">
		</div>
		<br>			
		<div class="row" style="margin-left:10px; margin-top: 15px; margin-right: 10px;">
			<div class="col-md-12">
				<!-- Advanced Tables -->
				<div class="panel panel-default">
					<div class="panel-body" style="overflow: auto; height: 400px; width: 100%;">
						<div class="table-responsive">
							<table class="table table-striped table-bordered table-hover" 
								   id="table-indexFluxo"
								   style="width: 100%">
								<thead>
									<tr>
										<th width="8%">
											<center><font size=2>ID LOG</font>
										</th>										
										<th width="8%">
											<center><font size=2>ID USUÁRIO</font>
										</th>
										<th width="36%">
											<center><font size=2>NOME USUÁRIO</font>
										</th>																				
										<th width="8%">
											<center><font size=2>DATA LOGIN</font>
										</th>		
										<th width="8%">
											<center><font size=2>HORA LOGIN</font>
										</th>									
										<th width="8%">
											<center><font size=2>DATA LOGOUT</font>
										</th>	
										<th width="8%">
											<center><font size=2>HORA LOGOUT</font>
										</th>
										<th width="8%">
											<center><font size=2>IP MAQUINA</font>
										</th>
										<th width="8%">
											<center><font size=2>STATUS</font>
										</th>
									</tr>
								</thead>
								<tbody id="searchTable">
									<?php

									$buscarLogUsuario = $pdo->prepare('SELECT * FROM usuario_log');
									$buscarLogUsuario->execute();
									$row = $buscarLogUsuario->fetchAll(PDO::FETCH_ASSOC);

									

									if(count($row) > 0) {
										foreach ($row as $value) { 	
									?>

											<tr>
												<td style="font-size: 12px; text-align: center;"><?=$value['idLog'];?></td>

												<td style="font-size: 12px; text-align: center;"><?=$value['idUsuario'];?></td>

												<td style="font-size: 12px; text-align: center;"><?=$value['nomeUsuario'];?></td>

												<td style="font-size: 12px; text-align: center;"><?=isset($value['dataEntrada']) ? date('d/m/Y', strtotime($value['dataEntrada'])) : ''?></td>

												<td style="font-size: 12px; text-align: center;"><?=$value['horaEntrada'];?></td>
												
												<td style="font-size: 12px; text-align: center;"><?=isset($value['dataSaida']) ? date('d/m/Y', strtotime($value['dataSaida'])) : ''?></td>

												<td style="font-size: 12px; text-align: center;"><?=$value['horaSaida'];?></td>

												<td style="font-size: 12px; text-align: center;"><?=$value['ipaddress'];?></td>

												<td style="font-size: 16px; text-align: center;">
												
												<?php
													if(($value['acess'])==1){
												?>
													<i class="bi bi-circle-fill" style="color:#71FA00; font-size:12px;"></i>
												<?php
													} if(($value['acess'])==2) {
												?>
													<i class="bi bi-circle-fill" style="color:#FF1801; font-size:12px;"></i>
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
		<script type="text/javascript">
    		document.getElementById("search").focus();
		</script>
		
		<?php endif; ?>
		</body>
</html>
