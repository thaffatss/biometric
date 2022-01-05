<?php
// START PILATES
$buscaJaneiro = $pdo->prepare("SELECT * FROM cliente_pilates WHERE DATE_FORMAT(dataFim,'%Y') = YEAR(CURDATE()) AND MONTH(dataFim) = 1"); // Janeiro
if (isset($buscaJaneiro)) {

	$buscaJaneiro->execute();
	if ($buscaJaneiro->rowCount() > 0) {
		$qtdJaneiroPilates = $buscaJaneiro->rowCount();
	} else {
		$qtdJaneiroPilates = 0;
	}
}

$buscaFevereiro = $pdo->prepare("SELECT * FROM cliente_pilates WHERE DATE_FORMAT(dataFim,'%Y') = YEAR(CURDATE()) AND MONTH(dataFim) = 2"); // Fevereiro
if (isset($buscaFevereiro)) {

	$buscaFevereiro->execute();
	if ($buscaFevereiro->rowCount() > 0) {
		$qtdFevereiroPilates = $buscaFevereiro->rowCount();
	} else {
		$qtdFevereiroPilates = 0;
	}
}

$buscaMarco = $pdo->prepare("SELECT * FROM cliente_pilates WHERE DATE_FORMAT(dataFim,'%Y') = YEAR(CURDATE()) AND MONTH(dataFim) = 3"); // Março
if (isset($buscaMarco)) {

	$buscaMarco->execute();
	if ($buscaMarco->rowCount() > 0) {
		$qtdMarcoPilates = $buscaMarco->rowCount();
	} else {
		$qtdMarcoPilates = 0;
	}
}

$buscaAbril = $pdo->prepare("SELECT * FROM cliente_pilates WHERE DATE_FORMAT(dataFim,'%Y') = YEAR(CURDATE()) AND MONTH(dataFim) = 4"); // Abril
if (isset($buscaAbril)) {

	$buscaAbril->execute();
	if ($buscaAbril->rowCount() > 0) {
		$qtdAbrilPilates = $buscaAbril->rowCount();
	} else {
		$qtdAbrilPilates = 0;
	}
}

$buscaMaio = $pdo->prepare("SELECT * FROM cliente_pilates WHERE DATE_FORMAT(dataFim,'%Y') = YEAR(CURDATE()) AND MONTH(dataFim) = 5"); // Maio
if (isset($buscaMaio)) {

	$buscaMaio->execute();
	if ($buscaMaio->rowCount() > 0) {
		$qtdMaioPilates = $buscaMaio->rowCount();
	} else {
		$qtdMaioPilates = 0;
	}
}

$buscaJunho = $pdo->prepare("SELECT * FROM cliente_pilates WHERE DATE_FORMAT(dataFim,'%Y') = YEAR(CURDATE()) AND MONTH(dataFim) = 6"); // Junho
if (isset($buscaJunho)) {

	$buscaJunho->execute();
	if ($buscaJunho->rowCount() > 0) {
		$qtdJunhoPilates = $buscaJunho->rowCount();
	} else {
		$qtdJunhoPilates = 0;
	}
}

$buscaJulho = $pdo->prepare("SELECT * FROM cliente_pilates WHERE DATE_FORMAT(dataFim,'%Y') = YEAR(CURDATE()) AND MONTH(dataFim) = 7"); // Julho
if (isset($buscaJulho)) {

	$buscaJulho->execute();
	if ($buscaJulho->rowCount() > 0) {
		$qtdJulhoPilates = $buscaJulho->rowCount();
	} else {
		$qtdJulhoPilates = 0;
	}
}

$buscaAgosto = $pdo->prepare("SELECT * FROM cliente_pilates WHERE DATE_FORMAT(dataFim,'%Y') = YEAR(CURDATE()) AND MONTH(dataFim) = 8"); // Agosto
if (isset($buscaAgosto)) {

	$buscaAgosto->execute();
	if ($buscaAgosto->rowCount() > 0) {
		$qtdAgostoPilates = $buscaAgosto->rowCount();
	} else {
		$qtdAgostoPilates = 0;
	}
}

$buscaSetembro = $pdo->prepare("SELECT * FROM cliente_pilates WHERE DATE_FORMAT(dataFim,'%Y') = YEAR(CURDATE()) AND MONTH(dataFim) = 9"); // Setembro
if (isset($buscaSetembro)) {

	$buscaSetembro->execute();
	if ($buscaSetembro->rowCount() > 0) {
		$qtdSetembroPilates = $buscaSetembro->rowCount();
	} else {
		$qtdSetembroPilates = 0;
	}
}

$buscaOutubro = $pdo->prepare("SELECT * FROM cliente_pilates WHERE DATE_FORMAT(dataFim,'%Y') = YEAR(CURDATE()) AND MONTH(dataFim) = 10"); // Outubro
if (isset($buscaOutubro)) {

	$buscaOutubro->execute();
	if ($buscaOutubro->rowCount() > 0) {
		$qtdOutubroPilates = $buscaOutubro->rowCount();
	} else {
		$qtdOutubroPilates = 0;
	}
}

$buscaNovembro = $pdo->prepare("SELECT * FROM cliente_pilates WHERE DATE_FORMAT(dataFim,'%Y') = YEAR(CURDATE()) AND MONTH(dataFim) = 11"); // Novembro
if (isset($buscaNovembro)) {

	$buscaNovembro->execute();
	if ($buscaNovembro->rowCount() > 0) {
		$qtdNovembroPilates = $buscaNovembro->rowCount();
	} else {
		$qtdNovembroPilates = 0;
	}
}

$buscarDezembro = $pdo->prepare("SELECT * FROM cliente_pilates WHERE DATE_FORMAT(dataFim,'%Y') = YEAR(CURDATE()) AND MONTH(dataFim) = 12"); // Dezembro
if (isset($buscarDezembro)) {

	$buscarDezembro->execute();
	if ($buscarDezembro->rowCount() > 0) {
		$qtdDezembroPilates = $buscarDezembro->rowCount();
	} else {
		$qtdDezembroPilates = 0;
	}
}

// AND PILATES
?>
<script>
	google.charts.load('upcoming', {
		'packages': ['vegachart']
	}).then(drawChartPilates);

	function drawChartPilates() {
		const dataTable = new google.visualization.DataTable();
		dataTable.addColumn({
			type: 'string',
			'id': 'category'
		});
		dataTable.addColumn({
			type: 'number',
			'id': 'amount'
		});
		dataTable.addRows([
			['JAN', <?= $qtdJaneiroPilates ?>],
			['FEV', <?= $qtdFevereiroPilates ?>],
			['MAR', <?= $qtdMarcoPilates ?>],
			['ABR', <?= $qtdAbrilPilates ?>],
			['MAI', <?= $qtdMaioPilates ?>],
			['JUN', <?= $qtdJunhoPilates ?>],
			['JUL', <?= $qtdJulhoPilates ?>],
			['AGO', <?= $qtdAgostoPilates ?>],
			['SET', <?= $qtdSetembroPilates ?>],
			['OUT', <?= $qtdOutubroPilates ?>],
			['NOV', <?= $qtdNovembroPilates ?>],
			['DEZ', <?= $qtdDezembroPilates ?>],
		]);

		const options = {
			"vega": {
				"$schema": "https://vega.github.io/schema/vega/v4.json",
				"width": 500,
				"height": 200,
				"padding": 5,

				'data': [{
					'name': 'table',
					'source': 'datatable'
				}],

				"signals": [{
					"name": "tooltip",
					"value": {},
					"on": [{
							"events": "rect:mouseover",
							"update": "datum"
						},
						{
							"events": "rect:mouseout",
							"update": "{}"
						}
					]
				}],

				"scales": [{
						"name": "xscale",
						"type": "band",
						"domain": {
							"data": "table",
							"field": "category"
						},
						"range": "width",
						"padding": 0.05,
						"round": true
					},
					{
						"name": "yscale",
						"domain": {
							"data": "table",
							"field": "amount"
						},
						"nice": true,
						"range": "height"
					}
				],

				"axes": [{
						"orient": "bottom",
						"scale": "xscale"
					},
					{
						"orient": "left",
						"scale": "yscale"
					}
				],

				"marks": [{
						"type": "rect",
						"from": {
							"data": "table"
						},
						"encode": {
							"enter": {
								"x": {
									"scale": "xscale",
									"field": "category"
								},
								"width": {
									"scale": "xscale",
									"band": 1
								},
								"y": {
									"scale": "yscale",
									"field": "amount"
								},
								"y2": {
									"scale": "yscale",
									"value": 0
								}
							},
							"update": {
								"fill": {
									"value": "steelblue"
								}
							},
							"hover": {
								"fill": {
									"value": "red"
								}
							}
						}
					},
					{
						"type": "text",
						"encode": {
							"enter": {
								"align": {
									"value": "center"
								},
								"baseline": {
									"value": "bottom"
								},
								"fill": {
									"value": "#333"
								}
							},
							"update": {
								"x": {
									"scale": "xscale",
									"signal": "tooltip.category",
									"band": 0.5
								},
								"y": {
									"scale": "yscale",
									"signal": "tooltip.amount",
									"offset": -2
								},
								"text": {
									"signal": "tooltip.amount"
								},
								"fillOpacity": [{
										"test": "datum === tooltip",
										"value": 0
									},
									{
										"value": 1
									}
								]
							}
						}
					}
				]
			}
		};

		const chart = new google.visualization.VegaChart(document.getElementById('chart_div3'));
		chart.draw(dataTable, options);
	}
</script>

<div class="container">
	<div class="row" style="display: block;">
		<div class="card-deck">
			<div class="card" width="100%">
				<div class="card-header bg-primary text-white">
					VISÃO GERAL
				</div>
				<div class="card-body">
					<?php

					$buscaFaturamento = $pdo
						->prepare("SELECT SUM(cp.pc_valor) AS subTotal, COUNT(cp.idCliente_pilates) AS qtdAtd, cp.status_pago FROM cliente_pilates cp WHERE cp.status_pago = 1");
					$buscaFaturamento->execute();
					$row = $buscaFaturamento->fetchALL(PDO::FETCH_ASSOC);
					if (count($row) > 0) {
						foreach ($row as $key => $value1) {
					?>
							<h2>Faturamento Geral</h2><span style="font-size: 15px;" class="badge badge-info">R$ <?= number_format($value1['subTotal'], 2, ",", "."); ?></span>
							<div class="dropdown-divider"></div>
						<?php
						}
					}

					$buscaPagantes = $pdo
						->prepare("SELECT COUNT(cp.idCliente_pilates) AS qtdPag, cp.status_pago FROM cliente_pilates cp WHERE cp.status_pago = 1");
					$buscaPagantes->execute();
					$row = $buscaPagantes->fetchALL(PDO::FETCH_ASSOC);
					if (count($row) > 0) {
						foreach ($row as $key => $value2) {
						?>
							<h2>Pagantes</h2><span style="font-size: 15px;" class="badge badge-info"><?= $value2['qtdPag'] ?> Clientes</span>
							<div class="dropdown-divider"></div>
						<?php
						}
					}

					$buscaDevedores = $pdo
						->prepare("SELECT COUNT(cp.idCliente_pilates) AS qtdDev, cp.status_pago FROM cliente_pilates cp WHERE cp.status_pago = 0");
					$buscaDevedores->execute();
					$row = $buscaDevedores->fetchALL(PDO::FETCH_ASSOC);
					if (count($row) > 0) {
						foreach ($row as $key => $value3) {
						?>
							<h2>Devedores</h2><span style="font-size: 15px;" class="badge badge-info"><?= $value3['qtdDev'] ?> Clientes</span>
					<?php
						}
					}
					?>
				</div>
			</div>

			<div class="card text-center">
				<div class="card-header bg-primary text-white">
					ENTRADA PILATES
				</div>
				<div class="card-body">
					<div>
						<div id="chart_div3" style="width: 500px; height: 300px;"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>