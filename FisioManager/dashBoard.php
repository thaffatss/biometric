<?php
ini_set('display_errors', 'Off');
error_reporting(E_ALL | E_STRICT);

require_once "menu.php";
// Valida se usuário tá logado caso contrario, manda pro login.
if (!isset($_SESSION['id_usuario'])) :
	header("Location: index.php");

endif;
if (isset($_SESSION['id_usuario'])) :

?>
	<body style="background: linear-gradient(90deg, #A2A5A7,  #caccce );">
		<h1>
			<small class="text-muted" style="margin-left: 20px;">DeshBoard</small>
		</h1>
		<div class="accordion" id="accordionExample">
			<div class="card">
				<div class="card-header" id="headingOne">
					<h2 class="mb-0">
						<button class="btn btn-link btn-block text-left" style="color: inherit;" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
							GRÁFICO DERM
						</button>
					</h2>
				</div>

				<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
					<div class="card-body">
						<?php require_once "graficoDerm.php"; ?>
					</div>
				</div>
			</div>
			<div class="card">
				<div class="card-header" id="headingTwo">
					<h2 class="mb-0">
						<button class="btn btn-link btn-block text-left collapsed" style="color: inherit;" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
							GRÁFICO REABILITAÇÃO
						</button>
					</h2>
				</div>
				<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
					<div class="card-body">
						<?php require_once "graficoReabilitacao.php"; ?>
					</div>
				</div>
			</div>
			<div class="card">
				<div class="card-header" id="headingThree">
					<h2 class="mb-0">
						<button class="btn btn-link btn-block text-left collapsed" style="color: inherit;" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
							GRÁFICO PILATES
						</button>
					</h2>
				</div>
				<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
					<div class="card-body">
						<?php require_once "graficoPilates.php"; ?>
					</div>
				</div>
			</div>
			<div class="card">
				<div class="card-header" id="headingFour">
					<h2 class="mb-0">
						<button class="btn btn-link btn-block text-left collapsed" style="color: inherit;" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseThree">
							GRÁFICO QUIROPRAXIA
						</button>
					</h2>
				</div>
				<div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
					<div class="card-body">
						<?php require_once "graficoQuiropraxia.php"; ?>
					</div>
				</div>
			</div>
		</div>
		<!-- script references -->
		<?php require_once "footer.php"; ?>
	<?php endif; ?>
	</body>

	</html>