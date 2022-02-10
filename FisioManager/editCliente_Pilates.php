<?php	
			ini_set('display_errors', 'Off');
			error_reporting(E_ALL | E_STRICT);
		
				require_once "menu.php";
				// Valida se usuário tá logado caso contrario, manda pro login.
				if(!isset($_SESSION['id_usuario'])){
					header("Location: index.php"); 	
				} if(isset($_SESSION['id_usuario'])) {

				if(isset($_POST['editcliente'])) {
					
				if(isset($_GET['id'])) {
					$dataMatricula = $_POST['dataMatricula'];
					$dataVencimento = $_POST['dataVencimento'];
					$id = $_POST['id'];
					$nome = $_POST['nome'];
					$idade = $_POST['idade'];
					$cpf = $_POST['cpf'];
					$telefone = $_POST['telefone'];
					$preco = $_POST['pc_valor'];
					$sessoes = $_POST['sessoes'];
					$profissao = $_POST['profissao'];
					$endereco = $_POST['endereco'];
					$procedimento = $_POST['procedimento'];
					$descricao = $_POST['descricao'];
					$atestado = $_POST['atestado'];
					$plano = $_POST['plano'];
					$professor = $_POST['professor'];
				}			
					
					$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
					// Verifica
					if (($erro_nome_cliente) == 0) {
						if(!isset($dados['opcao1'])) {
							$dados['opcao1'] = 2;
						} else {
							$dados['opcao1'] = 1;
						}
						if(!isset($dados['opcao2'])) {
							$dados['opcao2'] = 2;
						} else {
							$dados['opcao2'] = 1;
						}
						if(!isset($dados['opcao3'])) {
							$dados['opcao3'] = 2;
						} else {
							$dados['opcao3'] = 1;
						}
						if(!isset($dados['opcao4'])) {
							$dados['opcao4'] = 2;
						} else {
							$dados['opcao4'] = 1;
						}
						if(!isset($dados['opcao5'])) {
							$dados['opcao5'] = 2;
						} else {
							$dados['opcao5'] = 1;
						}
						if(!isset($dados['opcao6'])) {
							$dados['opcao6'] = 2;
						} else {
							$dados['opcao6'] = 1;
						}
						if(!isset($dados['opcao7'])) {
							$dados['opcao7'] = 2;
						} else {
							$dados['opcao7'] = 1;
						}
						if(!isset($dados['opcao8'])) {
							$dados['opcao8'] = 2;
						} else {
							$dados['opcao8'] = 1;
						}
						if(!isset($dados['opcao9'])) {
							$dados['opcao9'] = 2;
						} else {
							$dados['opcao9'] = 1;
						}
						if(!isset($dados['opcao10'])) {
							$dados['opcao10'] = 2;
						} else {
							$dados['opcao10'] = 1;
						}
						if(!isset($dados['opcao11'])) {
							$dados['opcao11'] = 2;
						} else {
							$dados['opcao11'] = 1;
						}
						if(!isset($dados['opcao12'])) {
							$dados['opcao12'] = 2;
						} else {
							$dados['opcao12'] = 1;
						}
						if(!isset($dados['opcao13'])) {
							$dados['opcao13'] = 2;
						} else {
							$dados['opcao13'] = 1;
						}
						if(!isset($dados['opcao14'])) {
							$dados['opcao14'] = 2;
						} else {
							$dados['opcao14'] = 1;
						}
						if(!isset($dados['opcao15'])) {
							$dados['opcao15'] = 2;
						} else {
							$dados['opcao15'] = 1;
						}
						if(!isset($dados['opcao16'])) {
							$dados['opcao16'] = 2;
						} else {
							$dados['opcao16'] = 1;
						}
						if(!isset($dados['opcao17'])) {
							$dados['opcao17'] = 2;
						} else {
							$dados['opcao17'] = 1;
						}
						if(!isset($dados['opcao18'])) {
							$dados['opcao18'] = 2;
						} else {
							$dados['opcao18'] = 1;
						}
						if(!isset($dados['opcao19'])) {
							$dados['opcao19'] = 2;
						} else {
							$dados['opcao19'] = 1;
						}
						if(!isset($dados['opcao20'])) {
							$dados['opcao20'] = 2;
						} else {
							$dados['opcao20'] = 1;
						}
						if(!isset($dados['opcao21'])) {
							$dados['opcao21'] = 2;
						} else {
							$dados['opcao21'] = 1;
						}
						$updateCliente = $pdo->prepare("UPDATE cliente_pilates
														   SET dataInicio        = ?,
														   	   dataFim           = ?,
														   	   nome     		 = ?, 
														   	   idade       		 = ?, 
															   cpf 				 = ?,
															   telefone 		 = ?,
															   pc_valor			 = ?,
															   sessoes           = ?,
															   profissao  		 = ?,
															   endereco			 = ?,
															   procedimento		 = ?,
															   descricao		 = ?,
															   atestado		 	 = ?,
															   opcao1			 = ?,
															   opcao2			 = ?,
															   opcao3			 = ?,
															   opcao4			 = ?,
															   opcao5			 = ?,
															   opcao6			 = ?,
															   opcao7			 = ?,
															   opcao8			 = ?,
															   opcao9			 = ?,
															   opcao10			 = ?,
															   opcao11			 = ?,
															   opcao12			 = ?,
															   opcao13			 = ?,
															   opcao14			 = ?,
															   opcao15			 = ?,
															   opcao16			 = ?,
															   opcao17			 = ?,
															   opcao18			 = ?,
															   opcao19			 = ?,
															   opcao20			 = ?,
															   opcao21			 = ?,
															   Planos_idPlano    = ?,
															   Professor_id      = ?
														   WHERE idCliente_pilates = ?");

						$updateCliente->bindValue(1, $dataMatricula);	
						$updateCliente->bindValue(2, $dataVencimento);
						$updateCliente->bindValue(3, $nome);	
						$updateCliente->bindValue(4, $idade);
						$updateCliente->bindValue(5, $cpf);	
						$updateCliente->bindValue(6, $telefone);
						$updateCliente->bindValue(7, $preco);
						$updateCliente->bindValue(8, $sessoes);
						$updateCliente->bindValue(9, $profissao); 
						$updateCliente->bindValue(10, $endereco);
						$updateCliente->bindValue(11, $procedimento);
						$updateCliente->bindValue(12, $descricao);
						$updateCliente->bindValue(13, $atestado);
						$updateCliente->bindValue(14, $dados['opcao1'], PDO::PARAM_INT);
						$updateCliente->bindValue(15, $dados['opcao2'], PDO::PARAM_INT);
						$updateCliente->bindValue(16, $dados['opcao3'], PDO::PARAM_INT);
						$updateCliente->bindValue(17, $dados['opcao4'], PDO::PARAM_INT);
						$updateCliente->bindValue(18, $dados['opcao5'], PDO::PARAM_INT);
						$updateCliente->bindValue(19, $dados['opcao6'], PDO::PARAM_INT);
						$updateCliente->bindValue(20, $dados['opcao7'], PDO::PARAM_INT);
						$updateCliente->bindValue(21, $dados['opcao8'], PDO::PARAM_INT);
						$updateCliente->bindValue(22, $dados['opcao9'], PDO::PARAM_INT);
						$updateCliente->bindValue(23, $dados['opcao10'], PDO::PARAM_INT);
						$updateCliente->bindValue(24, $dados['opcao11'], PDO::PARAM_INT);
						$updateCliente->bindValue(25, $dados['opcao12'], PDO::PARAM_INT);
						$updateCliente->bindValue(26, $dados['opcao13'], PDO::PARAM_INT);
						$updateCliente->bindValue(27, $dados['opcao14'], PDO::PARAM_INT);
						$updateCliente->bindValue(28, $dados['opcao15'], PDO::PARAM_INT);
						$updateCliente->bindValue(29, $dados['opcao16'], PDO::PARAM_INT);
						$updateCliente->bindValue(30, $dados['opcao17'], PDO::PARAM_INT);
						$updateCliente->bindValue(31, $dados['opcao18'], PDO::PARAM_INT);
						$updateCliente->bindValue(32, $dados['opcao19'], PDO::PARAM_INT);
						$updateCliente->bindValue(33, $dados['opcao20'], PDO::PARAM_INT);
						$updateCliente->bindValue(34, $dados['opcao21'], PDO::PARAM_INT);
						$updateCliente->bindValue(35, $plano);
						$updateCliente->bindValue(36, $professor);	
						$updateCliente->bindValue(37, $id);	
						$updateCliente->execute();
						
							if($updateCliente->rowCount() > 0) {
								header("Location: indexCliente_Pilates.php");
							}else{
								$erro_cliente = 1; 
							}
					}							   
				}		 
		?>			
					<?php
					if(isset($_GET['id'])) {
						$buscaCliente = $pdo->prepare('SELECT   idCliente_pilates, 
																dataInicio,
																dataFim,
																nome, 
																idade,
																cpf, 
																telefone,
																profissao,
																endereco,
																procedimento,
																descricao,
																atestado,
																pc_valor,
																sessoes,
																status_pago,
																opcao1,
																opcao2,
																opcao3,
																opcao4,
																opcao5,
																opcao6,
																opcao7,
																opcao8,
																opcao9,
																opcao10,
																opcao11,
																opcao12,
																opcao13,
																opcao14,
																opcao15,
																opcao16,
																opcao17,
																opcao18,
																opcao19,
																opcao20,
																opcao21
																FROM cliente_pilates 
																WHERE idCliente_pilates = ?');
						$buscaCliente->bindValue(1, $_GET['id']);
						$buscaCliente->execute();
						$row = $buscaCliente->fetchAll(PDO:: FETCH_OBJ);
						foreach($row as $mostre) {
						?>
									<form method="POST" style="margin-bottom:100px;">
										<div class="container" style="margin-bottom: 30px; ">
											<br>
											<?php if($erro_cliente == 1): ?>
												<div class="alert alert-danger alert-dismissible fade show" role="alert">
													<strong>Erro ao salvar!</strong> Por favor, tente novamente.
													<button type="button" class="close" data-dismiss="alert" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
											<?php endif;?>

											<input type="id" name="id" value="<?php echo $mostre->idCliente_pilates; ?>" hidden>
																		  
											<div class="form-row">
												<div class="form-group col-md-3">
													<label for= "nome">Matricula</label>
													<input id="date1"
														   type="date" 
														   name="dataMatricula" 
														   value="<?php echo $mostre->dataInicio; ?>"
														   class="form-control"
														   autocomplete="off"
														   required>
												</div>
												<div class="form-group col-md-3">
													<label for= "idade">Venvimento</label>
													<input id="date2"
														   type="date" 
														   name="dataVencimento"
														   value="<?php echo $mostre->dataFim; ?>"
														   class="form-control"
														   autocomplete="off"
														   required>
												</div>
												<div class="form-group col-md-3">
													<label for= "nome">Nome</label>
													<input id="nome"
														   type="text" 
														   name="nome" 
														   value="<?php echo $mostre->nome; ?>"
														   class="form-control"
														   placeholder="Insira um Nome" 
														   autocomplete="off"
														   maxlength="50"
														   required>
												</div>
												<div class="form-group col-md-3">
													<label for= "cpf">CPF</label>
													<input id="cpf"
														   type="text" 
														   name="cpf" 
														   class="form-control" 
														   value="<?php echo $mostre->cpf; ?>"
														   placeholder="XXX-XXX-XXX-XX" 
														   autocomplete="off"
														   maxlength="14">
												</div>
											</div>
											<div class="form-row">
												<div class="form-group col-md-3">
													<label for= "sessoes">Sessões</label><br>
													<input class="form-control"  value="<?php echo $mostre->sessoes; ?>" type="number" name="sessoes" id="num">
												</div>
												<div class="form-group col-md-3">
													<label for= "profissao">Profissão</label>
													<input  type="text"
															name="profissao"
															class="form-control"
															value="<?php echo $mostre->profissao; ?>"
															placeholder="Insira uma Profissão"
															autocomplete="off"
															maxlength="30">
												</div>
												<div class="form-group col-md-3">
													<label for= "idade">Idade</label>
													<input id="idade"
														   type="text" 
														   name="idade" 
														   class="form-control" 
														   value="<?php echo $mostre->idade; ?>"
														   placeholder="Insira uma Idade" 
														   autocomplete="off"
														   maxlength="3">
												</div>
												<div class="form-group col-md-3">
													<label for= "telefone">Telefone</label>
													<input id="telefone" 
														   type="text" 
														   name="telefone" 
														   class="form-control" 
														   value="<?php echo $mostre->telefone; ?>"
														   placeholder="(XX) X XXXX-XXXX" 
														   autocomplete="off"
														   maxlength="16">
												</div>
											</div>
											<div class="form-row">
												
												<div class="form-group col-md-4">
													<label for= "procedimento">Procedimento</label>
													<input  type="text" 
															name="procedimento"
															class="form-control"
															value="<?php echo $mostre->procedimento; ?>"
															placeholder="Descreva os procedimentos que foram contratados"
															autocomplete="off"
															maxlength="50">
												</div>
												<div class="form-group col-md-4">
													<label for="plano">Planos*</label><br />
													<select name="plano" class="form-control" required autocomplete="off" aria-placeholder="Aqui">
															
															<?php 
															// Busca todos os planos cadastrados.
															$buscarPlano = $pdo->prepare('SELECT * FROM planos');
															$buscarPlano->execute();
															$rowPlanos = $buscarPlano->fetchAll(PDO::FETCH_OBJ);

															// Busca o cliente cadastrados.
															$buscarClientePlano = $pdo->prepare("SELECT * FROM cliente_pilates WHERE idCliente_pilates ='".$_GET['id']."'");
															$buscarClientePlano->execute();
															$rowClientePilates = $buscarClientePlano->fetchAll(PDO::FETCH_OBJ);

															foreach ($rowPlanos as $dados01) {
																foreach ($rowClientePilates as $dados02) {
															?>	
																<option value="<?= $dados01->idPlano ?>" <?=$dados01->idPlano == $dados02->Planos_idPlano ? 'selected' : ''?>><?= $dados01->plano ?></option>
															
															<?php
															}
															}
															?>
													</select>
												</div>
												<div class="form-group col-md-4">
													<label for="professor">Profissionais</label><br />
													<select name="professor" class="form-control" required autocomplete="off" aria-placeholder="Aqui">
														<option value="">Selecione um Profissional</option>
														<?php
														
														// Busca todos os professores no banco.
														$buscarProf = $pdo->prepare('SELECT * FROM professor');
														$buscarProf->execute();
														$rowProf = $buscarProf->fetchAll(PDO::FETCH_OBJ);

														// Busca o cliente cadastrados.
														$buscarClientePlano = $pdo->prepare("SELECT * FROM cliente_pilates WHERE idCliente_pilates ='".$_GET['id']."'");
														$buscarClientePlano->execute();
														$rowClientePilates = $buscarClientePlano->fetchAll(PDO::FETCH_OBJ);

														foreach ($rowProf as $mostre01) {
															foreach ($rowClientePilates as $mostre02) {
														?>
															<option value="<?= $mostre01->id ?>" <?=$mostre01->id == $mostre02->Professor_id ? 'selected' : ''?>><?= $mostre01->nome ?></option>
														<?php
															}
														}
														?>
													</select>
												</div>
											</div>
											<div class="form-row">
											<div class="form-group col-md-3">
												<label for= "pc_valor">Valor Procedimento*</label>
												<input id="real2"
													type="text" 
													name="pc_valor" 
													class="form-control" 
													value="<?php echo $mostre->pc_valor; ?>"
													placeholder="Ex: 40,00" 
													autocomplete="off"
													maxlength="16">
												</div>
												<div class="form-group col-md-9">
													<label for= "endereco">Endereço</label>
													<input  type="text" 
															name="endereco"
															class="form-control"
															value="<?php echo $mostre->endereco; ?>"
															placeholder="Av. Nome Endereço, Centro, nº XXX"
															autocomplete="off"
															maxlength="50">
												</div>
											</div>
											<div class="form-row">
												<div class="form-group col-md-12">
													<label for= "descricao">Evolução</label><br>
													<textarea class="form-control" maxlength="615" style="font-size:12px;" name="descricao" id="descricao"  rows="10" placeholder="1 - Infecção recente, Qual:?&#10;2 - Problemas Neurológicos, Qual:?&#10;3 - Doença Respiratória, Qual:?&#10;&#10;4 - Outras Anotações:"><?php echo $mostre->descricao;?></textarea>
													<small class="text-muted">No máximo 615 caracteres</small>
												</div>
											</div>
											<div class="form-row">
												<div class="form-group col-md-12">
													<label for= "atestado">Atestado</label><br>
													<textarea class="form-control" style="font-size:12px;" name="atestado" id="atestado"  rows="10" placeholder="Descreva o atestado aqui!"><?php echo $mostre->atestado;?></textarea>
													<small class="text-muted">No máximo 615 caracteres</small>
												</div>
											</div>
												<!-- QUESTIONÁRIO -->
												<div class="form-group col-md-12">
													<label class="form-check-label" for="inlineCheckbox1">Questionário</label><br><br>
													<!-- Opção 01 -->
													<div class="form-check">
														<?php
														if($mostre->opcao1 == 1) {
														?>
															<input class="form-check-input" type="checkbox" name="opcao1" id="inlineCheckbox1" checked value="1">
															<label style="font-size:12px;" class="form-check-label" for="opcao1">Perda de peso sem razão aparente(acima de 5kg entre 2 a 3 meses</label>
														<?php
														} if($mostre->opcao1 == 2) {
														?>
															<input class="form-check-input" type="checkbox" name="opcao1" id="inlineCheckbox1" value="2">
															<label style="font-size:12px;" class="form-check-label" for="opcao1">Perda de peso sem razão aparente(acima de 5kg entre 2 a 3 meses</label>
														<?php
														}
														?>
													</div>
													<!-- Opção 02 -->
													<div class="form-check">
														<?php
														if($mostre->opcao2 == 1) {
														?>
															<input class="form-check-input" type="checkbox" name="opcao2" id="inlineCheckbox1" checked value="1">
															<label style="font-size:12px;" class="form-check-label" for="opcao2">Febre, calafrios e sudorese noturna recente</label>
														<?php
														} if($mostre->opcao2 == 2) {
														?>
															<input class="form-check-input" type="checkbox" name="opcao2" id="inlineCheckbox1" value="2">
															<label style="font-size:12px;" class="form-check-label" for="opcao2">Febre, calafrios e sudorese noturna recente</label>
														<?php
														}
														?>
													</div>
													<!-- Opção 03 -->
													<div class="form-check">
														<?php
														if($mostre->opcao3 == 1) {
														?>
															<input class="form-check-input" type="checkbox" name="opcao3" id="inlineCheckbox1" checked value="1">
															<label style="font-size:12px;" class="form-check-label" for="opcao3">Vômito e náuseas recentes</label>
														<?php
														} if($mostre->opcao3 == 2) {
														?>
															<input class="form-check-input" type="checkbox" name="opcao3" id="inlineCheckbox1" value="2">
															<label style="font-size:12px;" class="form-check-label" for="opcao3">Vômito e náuseas recentes</label>
														<?php
														}
														?>
													</div>
													<!-- Opção 04 -->
													<div class="form-check">
														<?php
														if($mostre->opcao4 == 1) {
														?>
															<input class="form-check-input" type="checkbox" name="opcao4" id="inlineCheckbox1" checked value="1">
															<label style="font-size:12px;" class="form-check-label" for="opcao4">Dor noturna que pertuba o sono</label>
														<?php
														} if($mostre->opcao4 == 2) {
														?>
															<input class="form-check-input" type="checkbox" name="opcao4" id="inlineCheckbox1" value="2">
															<label style="font-size:12px;" class="form-check-label" for="opcao4">Dor noturna que pertuba o sono</label>
														<?php
														}
														?>
													</div>
													<!-- Opção 05 -->
													<div class="form-check">
														<?php
														if($mostre->opcao5 == 1) {
														?>
															<input class="form-check-input" type="checkbox" name="opcao5" id="inlineCheckbox1" checked value="1">
															<label style="font-size:12px;" class="form-check-label" for="opcao5">Dor que NÃO alivia com repouso</label>
														<?php
														} if($mostre->opcao5 == 2) {
														?>
															<input class="form-check-input" type="checkbox" name="opcao5" id="inlineCheckbox1" value="2">
															<label style="font-size:12px;" class="form-check-label" for="opcao5">Dor que NÃO alivia com repouso</label>
														<?php
														}
														?>
													</div>
													<!-- Opção 06 -->
													<div class="form-check">
														<?php
														if($mostre->opcao6 == 1) {
														?>
															<input class="form-check-input" type="checkbox" name="opcao6" id="inlineCheckbox1" checked value="1">
															<label style="font-size:12px;" class="form-check-label" for="opcao6">Dor que NÃO para nem por 10 minutos</label>
														<?php
														} if($mostre->opcao6 == 2) {
														?>
															<input class="form-check-input" type="checkbox" name="opcao6" id="inlineCheckbox1" value="2">
															<label style="font-size:12px;" class="form-check-label" for="opcao6">Dor que NÃO para nem por 10 minutos</label>
														<?php
														}
														?>
													</div>
													<!-- Opção 07 -->
													<div class="form-check">
														<?php
														if($mostre->opcao7 == 1) {
														?>
															<input class="form-check-input" type="checkbox" name="opcao7" id="inlineCheckbox1" checked value="1">
															<label style="font-size:12px;" class="form-check-label" for="opcao7">Alteração de sensibilidade nos braços, pernas ou ao redor do ânus</label>
														<?php
														} if($mostre->opcao7 == 2) {
														?>
															<input class="form-check-input" type="checkbox" name="opcao7" id="inlineCheckbox1" value="2">
															<label style="font-size:12px;" class="form-check-label" for="opcao7">Alteração de sensibilidade nos braços, pernas ou ao redor do ânus</label>
														<?php
														}
														?>
													</div>
													<!-- Opção 08 -->
													<div class="form-check">
														<?php
														if($mostre->opcao8 == 1) {
														?>
															<input class="form-check-input" type="checkbox" name="opcao8" id="inlineCheckbox1" checked value="1">
															<label style="font-size:12px;" class="form-check-label" for="opcao8">Perda ou redução de força nos braços ou nas pernas</label>
														<?php
														} if($mostre->opcao8 == 2) {
														?>
															<input class="form-check-input" type="checkbox" name="opcao8" id="inlineCheckbox1" value="2">
															<label style="font-size:12px;" class="form-check-label" for="opcao8">Perda ou redução de força nos braços ou nas pernas</label>
														<?php
														}
														?>
													</div>
													<!-- Opção 09 -->
													<div class="form-check">
														<?php
														if($mostre->opcao9 == 1) {
														?>
															<input class="form-check-input" type="checkbox" name="opcao9" id="inlineCheckbox1" checked value="1">
															<label style="font-size:12px;" class="form-check-label" for="opcao9">Sensação de formigamento ou dormência nas pernas ou braços</label>
														<?php
														} if($mostre->opcao9 == 2) {
														?>
															<input class="form-check-input" type="checkbox" name="opcao9" id="inlineCheckbox1" value="2">
															<label style="font-size:12px;" class="form-check-label" for="opcao9">Sensação de formigamento ou dormência nas pernas ou braços</label>
														<?php
														}
														?>
													</div>
													<!-- Opção 10 -->
													<div class="form-check">
														<?php
														if($mostre->opcao10 == 1) {
														?>
															<input class="form-check-input" type="checkbox" name="opcao10" id="inlineCheckbox1" checked value="1">
															<label style="font-size:12px;" class="form-check-label" for="opcao10">Alteração da função da bexiga ou intestinos (ex: incontingência, etc...)</label>
														<?php
														} if($mostre->opcao10 == 2) {
														?>
															<input class="form-check-input" type="checkbox" name="opcao10" id="inlineCheckbox1" value="2">
															<label style="font-size:12px;" class="form-check-label" for="opcao10">Alteração da função da bexiga ou intestinos (ex: incontingência, etc...)</label>
														<?php
														}
														?>
													</div>
													<!-- Opção 11 -->
													<div class="form-check">
														<?php
														if($mostre->opcao11 == 1) {
														?>
															<input class="form-check-input" type="checkbox" name="opcao11" id="inlineCheckbox1" checked value="1">
															<label style="font-size:12px;" class="form-check-label" for="opcao11">Rigidez matinal que melhora com atividade</label>
														<?php
														} if($mostre->opcao11 == 2) {
														?>
															<input class="form-check-input" type="checkbox" name="opcao11" id="inlineCheckbox1" value="2">
															<label style="font-size:12px;" class="form-check-label" for="opcao11">Rigidez matinal que melhora com atividade</label>
														<?php
														}
														?>
													</div>
													<!-- Opção 12 -->
													<div class="form-check">
														<?php
														if($mostre->opcao12 == 1) {
														?>
															<input class="form-check-input" type="checkbox" name="opcao12" id="inlineCheckbox1" checked value="1">
															<label style="font-size:12px;" class="form-check-label" for="opcao12">Trauma recente (quedas, pancadas ou acidentes) Aonde?</label>
														<?php
														} if($mostre->opcao12 == 2) {
														?>
															<input class="form-check-input" type="checkbox" name="opcao12" id="inlineCheckbox1" value="2">
															<label style="font-size:12px;" class="form-check-label" for="opcao12">Trauma recente (quedas, pancadas ou acidentes) Aonde?</label>
														<?php
														}
														?>
													</div>
													<!-- Opção 13 -->
													<div class="form-check">
														<?php
														if($mostre->opcao13 == 1) {
														?>
															<input class="form-check-input" type="checkbox" name="opcao13" id="inlineCheckbox1" checked value="1">
															<label style="font-size:12px;" class="form-check-label" for="opcao13">Faz uso prolongado de medicação corticoide</label>
														<?php
														} if($mostre->opcao13 == 2) {
														?>
															<input class="form-check-input" type="checkbox" name="opcao13" id="inlineCheckbox1" value="2">
															<label style="font-size:12px;" class="form-check-label" for="opcao13">Faz uso prolongado de medicação corticoide</label>
														<?php
														}
														?>
													</div>
													<!-- Opção 14 -->
													<div class="form-check">
														<?php
														if($mostre->opcao14 == 1) {
														?>
															<input class="form-check-input" type="checkbox" name="opcao14" id="inlineCheckbox1" checked value="1">
															<label style="font-size:12px;" class="form-check-label" for="opcao14">Osteoporose / Osteopenia</label>
														<?php
														} if($mostre->opcao14 == 2) {
														?>
															<input class="form-check-input" type="checkbox" name="opcao14" id="inlineCheckbox1" value="2">
															<label style="font-size:12px;" class="form-check-label" for="opcao14">Osteoporose / Osteopenia</label>
														<?php
														}
														?>
													</div>
													<!-- Opção 15 -->
													<div class="form-check">
														<?php
														if($mostre->opcao15 == 1) {
														?>
															<input class="form-check-input" type="checkbox" name="opcao15" id="inlineCheckbox1" checked value="1">
															<label style="font-size:12px;" class="form-check-label" for="opcao15">Diabetes</label>
														<?php
														} if($mostre->opcao15 == 2) {
														?>
															<input class="form-check-input" type="checkbox" name="opcao15" id="inlineCheckbox1" value="2">
															<label style="font-size:12px;" class="form-check-label" for="opcao15">Diabetes</label>
														<?php
														}
														?>
													</div>
													<!-- Opção 16 -->
													<div class="form-check">
														<?php
														if($mostre->opcao16 == 1) {
														?>
															<input class="form-check-input" type="checkbox" name="opcao16" id="inlineCheckbox1" checked value="1">
															<label style="font-size:12px;" class="form-check-label" for="opcao16">Ansiedade</label>
														<?php
														} if($mostre->opcao16 == 2) {
														?>
															<input class="form-check-input" type="checkbox" name="opcao16" id="inlineCheckbox1" value="2">
															<label style="font-size:12px;" class="form-check-label" for="opcao16">Ansiedade</label>
														<?php
														}
														?>
													</div>
													<!-- Opção 17 -->
													<div class="form-check">
														<?php
														if($mostre->opcao17 == 1) {
														?>
															<input class="form-check-input" type="checkbox" name="opcao17" id="inlineCheckbox1" checked value="1">
															<label style="font-size:12px;" class="form-check-label" for="opcao17">Fumante</label>
														<?php
														} if($mostre->opcao17 == 2) {
														?>
															<input class="form-check-input" type="checkbox" name="opcao17" id="inlineCheckbox1" value="2">
															<label style="font-size:12px;" class="form-check-label" for="opcao17">Fumante</label>
														<?php
														}
														?>
													</div>
													<!-- Opção 18 -->
													<div class="form-check">
														<?php
														if($mostre->opcao18 == 1) {
														?>
															<input class="form-check-input" type="checkbox" name="opcao18" id="inlineCheckbox1" checked value="1">
															<label style="font-size:12px;" class="form-check-label" for="opcao18">Dor de cabeça / enxaqueca frequentes</label>
														<?php
														} if($mostre->opcao18 == 2) {
														?>
															<input class="form-check-input" type="checkbox" name="opcao18" id="inlineCheckbox1" value="2">
															<label style="font-size:12px;" class="form-check-label" for="opcao18">Dor de cabeça / enxaqueca frequentes</label>
														<?php
														}
														?>
													</div>
													<!-- Opção 19 -->
													<div class="form-check">
														<?php
														if($mostre->opcao19 == 1) {
														?>
															<input class="form-check-input" type="checkbox" name="opcao19" id="inlineCheckbox1" checked value="1">
															<label style="font-size:12px;" class="form-check-label" for="opcao19">Você consegue deitar de bruços</label>
														<?php
														} if($mostre->opcao19 == 2) {
														?>
															<input class="form-check-input" type="checkbox" name="opcao19" id="inlineCheckbox1" value="2">
															<label style="font-size:12px;" class="form-check-label" for="opcao19">Você consegue deitar de bruços</label>
														<?php
														}
														?>
													</div>
													<!-- Opção 20 -->
													<div class="form-check">
														<?php
														if($mostre->opcao20 == 1) {
														?>
															<input class="form-check-input" type="checkbox" name="opcao20" id="inlineCheckbox1" checked value="1">
															<label style="font-size:12px;" class="form-check-label" for="opcao20">Durante o último mês, você está se sentindo para baixo ou deprimido</label>
														<?php
														} if($mostre->opcao20 == 2) {
														?>
															<input class="form-check-input" type="checkbox" name="opcao20" id="inlineCheckbox1" value="2">
															<label style="font-size:12px;" class="form-check-label" for="opcao20">Durante o último mês, você está se sentindo para baixo ou deprimido</label>
														<?php
														}
														?>
													</div>
													<!-- Opção 21 -->
													<div class="form-check">
														<?php
														if($mostre->opcao21 == 1) {
														?>
															<input class="form-check-input" type="checkbox" name="opcao21" id="inlineCheckbox1" checked value="1">
															<label style="font-size:12px;" class="form-check-label" for="opcao21">Você tem estado sem interesse ou sem prazer para fazer as coisas do dia a dia</label>
														<?php
														} if($mostre->opcao21 == 2) {
														?>
															<input class="form-check-input" type="checkbox" name="opcao21" id="inlineCheckbox1" value="2">
															<label style="font-size:12px;" class="form-check-label" for="opcao21">Você tem estado sem interesse ou sem prazer para fazer as coisas do dia a dia</label>
														<?php
														}
														?>
													</div>
												</div>
													<a href="indexCliente_Pilates.php" type="button" class="btn btn-info" style="width: 8%; margin-right: 10px; height: 8%;">Voltar</a>
													<button style="width: 8%;"
															type="submit" 
															name="editcliente" 
															class="btn btn-success">
															Salvar
													</button>
										</div>
									</form>
							<?php }?>
				<?php }?>
		<!-- script references -->
		<?php require_once "footer.php"; ?>
		<script>
		$(document).ready(function(){
		$('.date').mask('00/00/0000');
		$('.time').mask('00:00:00');
		$('.date_time').mask('00/00/0000 00:00:00');
		$('.cep').mask('00000-000');
		$('.phone').mask('0000-0000');
		$('#telefone').mask('(00) 0 0000-0000');
		$('.phone_us').mask('(000) 000-0000');
		$('.mixed').mask('AAA 000-S0S');
		$('#cpf').mask('000.000.000-00', {reverse: true});
		$('.cnpj').mask('00.000.000/0000-00', {reverse: true});
		$('#real1').mask('000.000.000.000.000,00', {reverse: true});
		$('#real2').mask('000.000.000.000.000,00', {reverse: true});
		$('#altura').mask('0.00', {reverse: true});
		$('#peso').mask('000', {reverse: true});
		$('.money2').mask("#.##0,00", {reverse: true});
		$('.ip_address').mask('0ZZ.0ZZ.0ZZ.0ZZ', {
			translation: {
			'Z': {
				pattern: /[0-9]/, optional: true
			}
			}
		});
		$('.ip_address').mask('099.099.099.099');
		$('.percent').mask('##0,00%', {reverse: true});
		$('.clear-if-not-match').mask("00/00/0000", {clearIfNotMatch: true});
		$('.placeholder').mask("00/00/0000", {placeholder: "__/__/____"});
		$('.fallback').mask("00r00r0000", {
			translation: {
				'r': {
				pattern: /[\/]/,
				fallback: '/'
				},
				placeholder: "__/__/____"
			}
			});
		$('.selectonfocus').mask("00/00/0000", {selectOnFocus: true});
		});
		</script>
		
		<?php }?>
	</body>
</html>
