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
			<div class="card">
			<div class="card-body">
				<h5 class="card-title">Planos
				<td style="width: 10%;">
					<a title ='Cadastrar Despesas' href='cadPlano.php' accesskey="">
						<i class="bi bi-plus-square-fill" style="font-size: 2rem; margin-right:5px; float: right; padding-bottom: 10px;"></i>
					</a>
				</td>
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
										<th width="8%">
											<center><font size=2>ID</font>
										</th>										
										<th width="60%">
											<center><font size=2>PLANO</font>
										</th>
										<th width="10%">
											<center><font size=2>AÇÕES</font>
										</th>										
									</tr>
								</thead>
								<tbody id="searchTable">
									<?php

									$buscarPlanos = $pdo->prepare('SELECT * FROM planos');
									$buscarPlanos->execute();
									$row = $buscarPlanos->fetchAll(PDO::FETCH_ASSOC);

									

									if(count($row) > 0) {
										foreach ($row as $value) { 	
									?>

											<tr>
												<td style="font-size: 12px; text-align: center;"><?=$value['idPlano'];?></td>

												<td style="font-size: 12px; text-align: center;"><?=$value['plano'];?></td>

												<td style="font-size: 16px; text-align: center; width:60px;">
                                                    <a title ='Editar Plano' href='editPlano.php?id=<?php echo $value['idPlano']; ?>' data-confirm-edit-despesa='Tem certeza de que deseja editar esse item selecionado?' style="margin-left: 5px;">
														<i class="bi bi-pencil" style="color: #007FB9;"></i>
													</a>
                                                    <a title ='Deletar Plano' href='deletePlano.php?id=<?php echo $value['idPlano']; ?>' data-confirm-del-despesa='Tem certeza de que deseja excluir o item selecionado?' style="margin-left: 5px;">
														<i class="bi bi-trash" style="color: #DD2828;"></i>
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
		<script type="text/javascript">
    		document.getElementById("search").focus();
		</script>
		
		<?php endif; ?>
		</body>
</html>
