<?php	
		ini_set('display_errors', 'Off');
		error_reporting(E_ALL | E_STRICT);
	
			require_once "menu.php";
			// Valida se usuário tá logado caso contrario, manda pro login.
			if(!isset($_SESSION['id_usuario'])) {
				header("Location: index.php"); 
					
			} if(isset($_SESSION['id_usuario'])) {

				$codigo = "";				
				$nome   = "";						
				$login  = "";		
				$perfil = "";				
				
				if(isset($_POST['buscausuarioinativo'])){
					$codigo = $_POST['codigo'];				
					$nome   = $_POST['nome'];				
					$login  = $_POST['login'];
					$perfil = $_POST['perfil'];						
				} 
		?>
				<div class="row" style="margin-left:10px; margin-top: 15px; margin-right: 10px;">
					<div class="col-md-12">
						<!-- Advanced Tables -->
                        <input class="form-control" id="search" type="text" placeholder="Buscar">
                        <br>
						<div class="panel panel-default">
							<div class="panel-header">
								<div class="table-responsive">
									<table style="width:100%">
										<tbody>
											<tr>
												<td style="width: 100%; text-align:center;">
													<h2>Usuário Inativos</h2><br>
												</td>
												<td style="width: 10%;"">
													<a title ='Cadastrar Usuario' 
														href='cadUsuario.php'>
														<span class="glyphicon glyphicon-plus"></span>
													</a>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
							<div class="panel-body" style="overflow: auto; height: 400px; width: 100%;">	
								<div class="table-responsive">
									<table class="table table-striped table-bordered table-hover" 
										   id="table-indexUsuario"
										   style="width: 100%">
										<thead>
											<tr>
												<th width="2%">
													<center><font size=2>CÓDIGO</font>
												</th>
												<th width="25%">
													<center><font size=2>NOME</font>
												</th>
												<th width="25%">
													<center><font size=2>LOGIN</font>
												</th>
												<th width="25%">
													<center><font size=2>PERFIL</font>
												</th>
												<th width="3%">
													<center><font size=2>STATUS</font>
												</th>
												<th width="5%">
													<center><font size=2>AÇÕES</font>
												</th>
											</tr>
										</thead>
										<tbody id="searchTable"><?php 	
												if (($codigo == "") &&
													($nome   == "") &&
													($login  == "") &&
													($perfil == "")) {
													$buscaUsuario = $pdo->prepare('SELECT * FROM usuario WHERE status = 0');
												} else if ($codigo != "") {
													$buscaUsuario = $pdo->prepare('SELECT * FROM usuario WHERE status = 0 AND idUsuario = ?');
													$buscaUsuario->bindValue(1, $codigo);
												} else if ($nome != "") {
													$buscaUsuario = $pdo->prepare('SELECT * FROM usuario WHERE status = 0 AND nome LIKE ?');
													$buscaUsuario->bindValue(1, "%".$nome."%");
												} else if ($login != "") {
													$buscaUsuario = $pdo->prepare('SELECT * FROM usuario WHERE status = 0 AND login LIKE ?');
													$buscaUsuario->bindValue(1,  "%".$login."%");
												} else if ($perfil != "") {
													$buscaUsuario = $pdo->prepare('SELECT * FROM usuario WHERE status = 0 AND perfil = ?');
													$buscaUsuario->bindValue(1, $perfil);
												}  
												
												$buscaUsuario->execute();
												$row = $buscaUsuario -> fetchAll(PDO:: FETCH_OBJ);
												foreach($row as $mostre) {
											?>
													<tr class="odd gradeA">
														<td style="font-size: 12px; text-align: center;">
															<?php echo $mostre->idUsuario; ?>
														</td>
														<td style="font-size: 12px; text-align: center;">
															<?php echo $mostre->nome; ?>
														</td>
														<td style="font-size: 12px; text-align: center;">
															<?php echo $mostre->login; ?>
														</td>
														<td style="font-size: 12px; text-align: center;">
															<?php
																if ($mostre->perfil == 0)
																	echo "Master";
																else 
																	echo "Usuario Comum";
															?>
														</td>
														<td style="font-size: 12px; text-align: center;">
															<div style="font-size: 12px; text-align: center; color:red;"><strong>Inativo</strong></div>
														</td>
														<td style="font-size: 16px; text-align: center;">
															<a title ='Ativar Usuario' href='ativarUsuario.php?id=<?php echo $mostre->idUsuario; ?>' data-confirm-enabled-user='Tem certeza de que deseja habilitar o usuário selecionado?' style="margin-left: 5px;">
																<i class="bi bi-unlock"></i>
															</a>
															<a title ='Editar Usuario' href='editUsuario.php?id=<?php echo $mostre->idUsuario; ?>' data-confirm-edit-user='Tem certeza de que deseja editar o usuário selecionado?' style="margin-left: 5px;">
																<i class="bi bi-pencil"></i>
															</a>
														</td>
													</tr>
											<?php 
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
	</body>
</html>
<?php } ?>