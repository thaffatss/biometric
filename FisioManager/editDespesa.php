<?php	
ini_set('display_errors', 'Off');
error_reporting(E_ALL | E_STRICT);
		
require_once "menu.php";

// Valida se usuário tá logado caso contrario, manda pro login.
if(!isset($_SESSION['id_usuario'])) {
	header("Location: index.php"); 
						
} if(isset($_SESSION['id_usuario'])) {
				
if (isset($_POST['editDespesa'])) {	
	$id = $_GET['id'];								
	$descricao = $_POST['descricao'];
	$valor = $_POST['valor'];
			
	$updateReceita = $pdo->prepare("UPDATE despesa SET descricao   = ?, valor  = ? WHERE idDespesa = ?");
	$updateReceita->bindValue(1, $descricao);	 
	$updateReceita->bindValue(2, $valor);
	$updateReceita->bindValue(3, $id);	
	$updateReceita->execute();


	if($updateReceita->rowCount() > 0) {
		if(isset($descricao) && !empty($descricao) && isset($valor) && !empty($valor))
		{							
			header("Location: indexDespesas.php");
		}
	}
} 		
?>	
        <br><br>
        <div class="container">
		<div class="col-md-12">
		<?php
			$buscarDespesa = $pdo->prepare('SELECT descricao, valor FROM despesa WHERE idDespesa = ?');
			$buscarDespesa->bindValue(1, $_GET['id']);
			$buscarDespesa->execute();
			$row = $buscarDespesa->fetchAll(PDO:: FETCH_OBJ);
			foreach($row as $mostre) {
			
			//Tratamento de erro.
			if($descricao == $mostre->descricao || $valor == $mostre->valor) {
				$error01 = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
								<strong>Ateção!</strong> Dados de DESCRIÇÃO ou VALOR são iguais.
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>';
			}
		?>
		<div class="card">
        <div class="card-body">
        <h5 class="card-title">Editando Despesa</h5>
		<form method="POST">
		<?= $error01; ?>
		<div class="form-row">
			<div class="form-group col-md-12">
			<label for="nome">Descrição*</label><br />
			<input id="nome" class="form-control" type="text" name="descricao" autocomplete="off" value="<?= $mostre->descricao; ?>" placeholder="Descrição" required>
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-12">
			<label for="preco">Valor</label><br />
			<input id="preco" class="form-control" type="text" name="valor" autocomplete="off" value="<?= $mostre->valor; ?>" placeholder="EX: 40,00" required>
			</div>
		</div>
			<a href="indexDespesas.php" type="button" class="btn btn-info" style="width: 9%; margin-right: 10px; height: 8%;">Voltar</a>
    		<button style="width: 11%;" type="submit" name="editDespesa" class="btn btn-success">
    					Salvar
    		</button>
		</form>
		<?php } ?>
		</div>
	</div>
	</div>
	</div>
<?php 
	require_once "footer.php";
?>
<!-- SCRIPT DE MASCARAMENTO DE INPUTS -->
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
$('#preco').mask('000.000.000.000.000,00', {reverse: true});
$('.money2').mask("#.##0,00", {reverse: true});
$('.num').mask("00", {reverse: true});
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
</body>
</html>
<?php } ?>