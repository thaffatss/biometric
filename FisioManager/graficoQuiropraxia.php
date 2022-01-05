<?php
// START QUIROPRAXIA
$buscaJaneiro = $pdo->prepare("SELECT * FROM cliente WHERE DATE_FORMAT(dataEntrada,'%Y') = YEAR(CURDATE()) AND MONTH(dataEntrada) = 1"); // Janeiro
if (isset($buscaJaneiro)) {

	$buscaJaneiro->execute();
	if ($buscaJaneiro->rowCount() > 0) {
		$qtdJaneiroQuiro = $buscaJaneiro->rowCount();
	} else {
		$qtdJaneiroQuiro = 0;
	}
}

$buscaFevereiro = $pdo->prepare("SELECT * FROM cliente WHERE DATE_FORMAT(dataEntrada,'%Y') = YEAR(CURDATE()) AND MONTH(dataEntrada) = 2"); // Fevereiro
if (isset($buscaFevereiro)) {

	$buscaFevereiro->execute();
	if ($buscaFevereiro->rowCount() > 0) {
		$qtdFevereiroQuiro = $buscaFevereiro->rowCount();
	} else {
		$qtdFevereiroQuiro = 0;
	}
}

$buscaMarco = $pdo->prepare("SELECT * FROM cliente WHERE DATE_FORMAT(dataEntrada,'%Y') = YEAR(CURDATE()) AND MONTH(dataEntrada) = 3"); // Março
if (isset($buscaMarco)) {

	$buscaMarco->execute();
	if ($buscaMarco->rowCount() > 0) {
		$qtdMarcoQuiro = $buscaMarco->rowCount();
	} else {
		$qtdMarcoQuiro = 0;
	}
}

$buscaAbril = $pdo->prepare("SELECT * FROM cliente WHERE DATE_FORMAT(dataEntrada,'%Y') = YEAR(CURDATE()) AND MONTH(dataEntrada) = 4"); // Abril
if (isset($buscaAbril)) {

	$buscaAbril->execute();
	if ($buscaAbril->rowCount() > 0) {
		$qtdAbrilQuiro = $buscaAbril->rowCount();
	} else {
		$qtdAbrilQuiro = 0;
	}
}

$buscaMaio = $pdo->prepare("SELECT * FROM cliente WHERE DATE_FORMAT(dataEntrada,'%Y') = YEAR(CURDATE()) AND MONTH(dataEntrada) = 5"); // Maio
if (isset($buscaMaio)) {

	$buscaMaio->execute();
	if ($buscaMaio->rowCount() > 0) {
		$qtdMaioQuiro = $buscaMaio->rowCount();
	} else {
		$qtdMaioQuiro = 0;
	}
}

$buscaJunho = $pdo->prepare("SELECT * FROM cliente WHERE DATE_FORMAT(dataEntrada,'%Y') = YEAR(CURDATE()) AND MONTH(dataEntrada) = 6"); // Junho
if (isset($buscaJunho)) {

	$buscaJunho->execute();
	if ($buscaJunho->rowCount() > 0) {
		$qtdJunhoQuiro = $buscaJunho->rowCount();
	} else {
		$qtdJunhoQuiro = 0;
	}
}

$buscaJulho = $pdo->prepare("SELECT * FROM cliente WHERE DATE_FORMAT(dataEntrada,'%Y') = YEAR(CURDATE()) AND MONTH(dataEntrada) = 7"); // Julho
if (isset($buscaJulho)) {

	$buscaJulho->execute();
	if ($buscaJulho->rowCount() > 0) {
		$qtdJulhoQuiro = $buscaJulho->rowCount();
	} else {
		$qtdJulhoQuiro = 0;
	}
}

$buscaAgosto = $pdo->prepare("SELECT * FROM cliente WHERE DATE_FORMAT(dataEntrada,'%Y') = YEAR(CURDATE()) AND MONTH(dataEntrada) = 8"); // Agosto
if (isset($buscaAgosto)) {

	$buscaAgosto->execute();
	if ($buscaAgosto->rowCount() > 0) {
		$qtdAgostoQuiro = $buscaAgosto->rowCount();
	} else {
		$qtdAgostoQuiro = 0;
	}
}

$buscaSetembro = $pdo->prepare("SELECT * FROM cliente WHERE DATE_FORMAT(dataEntrada,'%Y') = YEAR(CURDATE()) AND MONTH(dataEntrada) = 9"); // Setembro
if (isset($buscaSetembro)) {

	$buscaSetembro->execute();
	if ($buscaSetembro->rowCount() > 0) {
		$qtdSetembroQuiro = $buscaSetembro->rowCount();
	} else {
		$qtdSetembroQuiro = 0;
	}
}

$buscaOutubro = $pdo->prepare("SELECT * FROM cliente WHERE DATE_FORMAT(dataEntrada,'%Y') = YEAR(CURDATE()) AND MONTH(dataEntrada) = 10"); // Outubro
if (isset($buscaOutubro)) {

	$buscaOutubro->execute();
	if ($buscaOutubro->rowCount() > 0) {
		$qtdOutubroQuiro = $buscaOutubro->rowCount();
	} else {
		$qtdOutubroQuiro = 0;
	}
}

$buscaNovembro = $pdo->prepare("SELECT * FROM cliente WHERE DATE_FORMAT(dataEntrada,'%Y') = YEAR(CURDATE()) AND MONTH(dataEntrada) = 11"); // Novembro
if (isset($buscaNovembro)) {

	$buscaNovembro->execute();
	if ($buscaNovembro->rowCount() > 0) {
		$qtdNovembroQuiro = $buscaNovembro->rowCount();
	} else {
		$qtdNovembroQuiro = 0;
	}
}

$buscarDezembro = $pdo->prepare("SELECT * FROM cliente WHERE DATE_FORMAT(dataEntrada,'%Y') = YEAR(CURDATE()) AND MONTH(dataEntrada) = 12"); // Dezembro
if (isset($buscarDezembro)) {

	$buscarDezembro->execute();
	if ($buscarDezembro->rowCount() > 0) {
		$qtdDezembroQuiro = $buscarDezembro->rowCount();
	} else {
		$qtdDezembroQuiro = 0;
	}
}
// AND QUIROPRAXIA
?>
<script>
	google.charts.load('upcoming', {
		'packages': ['vegachart']
	}).then(drawChartQuiro);

	function drawChartQuiro() {
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
			['JAN', <?= $qtdJaneiroQuiro ?>],
			['FEV', <?= $qtdFevereiroQuiro ?>],
			['MAR', <?= $qtdMarcoQuiro ?>],
			['ABR', <?= $qtdAbrilQuiro ?>],
			['MAI', <?= $qtdMaioQuiro ?>],
			['JUN', <?= $qtdJunhoQuiro ?>],
			['JUL', <?= $qtdJulhoQuiro ?>],
			['AGO', <?= $qtdAgostoQuiro ?>],
			['SET', <?= $qtdSetembroQuiro ?>],
			['OUT', <?= $qtdOutubroQuiro ?>],
			['NOV', <?= $qtdNovembroQuiro ?>],
			['DEZ', <?= $qtdDezembroQuiro ?>],
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

		const chart = new google.visualization.VegaChart(document.getElementById('chart_div4'));
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
						->prepare("SELECT SUM(c.pc_valor) + SUM(c.saldo) AS subTotal, COUNT(c.idCliente) AS qtdAtd, c.status_pago FROM cliente c WHERE c.status_pago = 1");
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
						->prepare("SELECT COUNT(c.idCliente) AS qtdPag, c.status_pago FROM cliente c WHERE c.status_pago = 1");
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
						->prepare("SELECT COUNT(c.idCliente) AS qtdDev, c.status_pago FROM cliente c WHERE c.status_pago = 0");
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
					ENTRADA QUIROPRAXIA
				</div>
				<div class="card-body">
					<div>
						<div id="chart_div4" style="width: 500px; height: 300px;"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>