	
	<?php	
		ini_set('display_errors', 'Off');
		error_reporting(E_ALL | E_STRICT);
	
			require_once "menu.php"; 
				$erro_procedimentos = 0;
				$erro_nome_procedimentos = 0;
				$erro_preco_procedimentos = 0;
				
				if(isset($_POST['cadprocedimento'])) {
					$nome  = $_POST['nome'];
					$preco = $_POST['preco'];
					
					$preco = number_format($preco, 2, '.', '');
					
					/*
						Validação do campo nome (falta validar numeros)
					*/
					if (strlen($nome) > 100) {
						$erro_nome_procedimentos = 1; //se for maior que o maior do campo no banco de dados
					} else if (empty($nome)) {
						$erro_nome_procedimentos = 2; //se for vazio
					} 
					
					/*
						Validação do campo quantidade de horas
					*/
					
					/*
						Validação do campo preco
					*/
					if (empty($preco)) {
						$erro_preco_procedimentos = 1; //se for maior que o maior do campo no banco de dados
					} else if($preco < 0) {
						$erro_preco_procedimentos = 2; //se for vazio
					}
					
					
					if (($erro_nome_procedimentos == 0) &&  
						($erro_preco_procedimentos == 0)) {
						$insereProcedimento = $pdo->prepare("INSERT INTO procedimento (	nome, 
																						preco)
	   														VALUES(?, ?)");

						$insereProcedimento->bindValue(1, $nome);	  
						$insereProcedimento->bindValue(2, $preco);
						$insereProcedimento->execute();

						if($insereProcedimentos->rowCount() > 0) {
							header("Location: indexProcedimentos.php");
						} else {
							$erro_procedimentos  = 1;
						}
					}				
				}
		?>
			<div class="row" style="margin-left:10px; margin-right: 10px;">
				<div class="col-md-12">
					<!-- Advanced Tables -->
					<div class="panel panel-default">
						<div class="panel-header">
							<div class="table-responsive">
								<center>
									<h2>Cadastro de Procedimentos</h2>
								</center>
							</div>
							<?php if($erro_procedimentos == 1): ?>
								<div class="alert alert-danger">Erro ao salvar. Por favor, tente novamente!</div>
							<?php endif; ?>
						</div>					
						<div class="panel-body">
							<div class="table-responsive">
								<form action="" 
									  method="POST" 
									  class="form center-block">
									<?php 
										if($erro_nome_procedimentos == 1) { 
									?>
											<div class="form-group">
												<label for="nome">Nome</label><br />
												<div style="text-align: right;">*Campo descrição maior que 200 caracteres!</div>
												<input type="text" 
													   name="nome"  
													   class="form-control" 
													   placeholder="Nome Procedimento"
													   style="border-width: medium; border-color: #f00">
											</div>
									<?php
										} else if($erro_nome_procedimentos == 2) { 
									?>
											<div class="form-group">
												<label for="nome">Nome</label><br />
												<div style="text-align: right;">*Campo descrição vazio!</div>
												<input type="text" 
													   name="nome"  
													   class="form-control" 
													   placeholder="Nome Procedimento"
													   style="border-width: medium; border-color: #f00">
											</div>
									<?php
										} else {
									?>
											<div class="form-group">
												<label for="nome">Nome</label><br />
												<input type="text" 
													   name="nome"  
													   class="form-control" 
													   placeholder="Nome Procedimento">
											</div>
									<?php 
										}
									?>			
				
									<?php 
										if ($erro_preco_pacotes == 1) {
									?>
											<div class="form-group">
												<label for="preco">Preço</label><br />
												<div style="text-align: right;">*Campo preço vazio!</div>
												<input type="text" 
													   name="preco" 
													   class="form-control"
													   placeholder="Preço" 
													   autocomplete="off"
													   style="border-width: medium; border-color: #f00">
											</div>
									<?php 
										} else if ($erro_preco_pacotes == 2) {
									?>
											<div class="form-group">
												<label for="preco">Preço</label><br />
												<div style="text-align: right;">*Campo preço menor que R$0.00!</div>
												<input type="text" 
													   name="preco" 
													   class="form-control"
													   placeholder="Preço" 
													   autocomplete="off"
													   style="border-width: medium; border-color: #f00">
											</div>
									<?php 
										} else {
									?>
											<div class="form-group">
												<label for="preco">Preço</label><br />
												<input type="text" 
													   name="preco" 
													   class="form-control"
													   placeholder="Preço" 
													   autocomplete="off">
											</div>
									<?php 
										} 
									?>
									<br><br>				
									<div class="form-group">
										<center>
											<button id="submit"
													type="submit" 
													name="cadprocedimento" 
													class="btn btn-success">
												Salvar
											</button> 
										</center>
									</div>	
								</form>
							</div>
							<div class="modal-footer">
					
							</div>
						</div>
					</div>
				</div>
			</div>	
		
		<!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>