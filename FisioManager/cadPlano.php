<?php	
ini_set('display_errors', 'Off');
error_reporting(E_ALL | E_STRICT);
		
require_once "menu.php";

// Valida se usuário tá logado caso contrario, manda pro login.
if(!isset($_SESSION['id_usuario'])) {
	header("Location: index.php"); 
						
} if(isset($_SESSION['id_usuario'])) {
				
if (isset($_POST['cadPlano'])) {					
	$plano = ucfirst($_POST['plano']);
			
	$insereReceita = $pdo->prepare("INSERT INTO planos (plano) 
									VALUES(?)");
	$insereReceita->bindValue(1, $plano);				
	$insereReceita->execute();


	if($insereReceita->rowCount() > 0) {
	if(isset($plano) && !empty($plano))
	{							
		header("Location: indexPlanos.php");
	}
	}
} 		
?>
            <br><br>
            <div class="container">
				<div class="col-md-12">
				<div class="card">
                <div class="card-body">
                <h5 class="card-title">Cadastro de Planos</h5>
				<form method="POST">
				<div class="form-row">
					<div class="form-group col-md-12">
					<label for="nome">Plano*</label><br />
					<input id="nome" class="form-control" type="text" name="plano" autocomplete="off" placeholder="Digite um Plano" required>
					</div>
				</div>
			    <a href="indexPlanos.php" type="button" class="btn btn-info" style="width: 9%; margin-right: 10px; height: 8%;">Voltar</a>
    				<button style="width: 11%;" type="submit" name="cadPlano" class="btn btn-success">
    					Cadastrar
    				</button>
				</form>
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