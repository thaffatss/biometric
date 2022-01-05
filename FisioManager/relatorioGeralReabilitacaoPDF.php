<?php	
		ini_set('display_errors', 'Off');
		error_reporting(E_ALL | E_STRICT);
		
		include("conexao.php");
		require_once __DIR__ . '/vendor/autoload.php';
        use Mpdf\Mpdf;
        $mpdf = new Mpdf();
        $mpdf->SetDisplayMode("fullpage");

		// Valida se usuário tá logado caso contrario, manda pro login.
		if(!isset($_SESSION['id_usuario'])) {
			header("Location: index.php"); 
				
		} if(isset($_SESSION['id_usuario'])) {
          $date1 = $_SESSION['date1'];
          $date2 = $_SESSION['date2'];

                                $html = "
                                <div>
                                <h1 style='margin-left: 5rem;'>RELATÓRIO GERAL - REABILITAÇÃO</h1>
                                <table class='table table-bordered table-sm'>
                                                <thead>
                                                    <tr>
                                                        <th style='width:5%;'>
                                                            <center><font size=2>#</font>
                                                        </th>
                                                        <th style='width:10%;'>
                                                            <center><font size=2>DATA</font>
                                                        </th>
                                                        <th style='width:10%;'>
                                                            <center><font size=2>HORA</font>
                                                        </th>									
                                                        <th style='width:15%;'>
                                                            <center><font size=2>CLIENTE</font>
                                                        </th>
                                                        <th style='width:10%;'>
                                                            <center><font size=2>CPF</font>
                                                        </th>
                                                        <th style='width:10%;'>
                                                            <center><font size=2>PAGAMENTO</font>
                                                        </th>
                                                        <th style='width:20%;'>
                                                            <center><font size=2>ENDEREÇO</font>
                                                        </th>
                                                        <th style='width:10%;'>
                                                            <center><font size=2>PROFISSÃO</font>
                                                        </th>
                                                        <th style='width:10%;'>
                                                            <center><font size=2>TELEFONE</font>
                                                        </th>
                                                        <th style='width:10%;'>
                                                            <center><font size=2>VALOR</font>
                                                        </th>
                                                        <th style='width:10%;'>
                                                            <center><font size=2>SESSÕES</font>
                                                        </th>	
                                                        <th style='width:10%;'>
                                                            <center><font size=2>STATUS.PAG</font>
                                                        </th>																		
                                                    </tr>
                                                </thead>
                                                <tbody>";
                                                $buscaCliente = $pdo->prepare("SELECT
                                                    cr.idCliente_reabilitacao AS codigo, cr.nome AS cliente, cr.cpf AS cpf, cr.peso AS peso, cr.altura AS altura,
                                                    pg.tipo AS forma, cr.procedimento AS tipo, cr.dataEntrada AS dt_entrada, cr.profissao AS profissao,
                                                    cr.horaEntrada AS hr_entrada, cr.dataSaida AS dt_saida, cr.horaSaida AS hr_saida, cr.sessoes AS sessoes,
                                                    cr.saldo AS saldo, cr.status_pago AS pago, cr.pc_valor AS preco, cr.endereco AS endereco, cr.idade AS idade,
                                                    cr.telefone AS tel
                                                FROM cliente_reabilitacao cr
                                                JOIN pagamento pg ON cr.Pagamento_idPagamento = pg.idPagamento
                                                WHERE cr.dataEntrada BETWEEN'".$date1."'AND'".$date2."'"
                                                );
                                                $buscaCliente->execute();
                                                $row = $buscaCliente->fetchAll(PDO::FETCH_ASSOC);

                                                if(count($row) > 0) {
                                                foreach ($row as $key => $value) { 
                                                $html .="<tr>
                                                    <td style='font-size: 8px; text-align: center;' id='codigo'>{$value['codigo']}</td>

                                                    <td style='font-size: 8px; text-align: center;' id='dt'>".date('d/m/Y', strtotime($value['dt_entrada']))."</td>

                                                    <td style='font-size: 8px; text-align: center;' id='hr'>{$value['hr_entrada']}</td>

                                                    <td style='font-size: 8px; text-align: center;' id='nome'>{$value['cliente']}</td>

                                                    <td style='font-size: 8px; text-align: center;' id='cpf'>{$value['cpf']}</td>

                                                    <td style='font-size: 8px; text-align: center;' id='forma'>{$value['forma']}</td>

                                                    <td style='font-size: 8px; text-align: center;' id='endere'>{$value['endereco']}</td>

                                                    <td style='font-size: 8px; text-align: center;' id='profissao'>{$value['profissao']}</td>

                                                    <td style='font-size: 8px; text-align: center;' id='tel'>{$value['tel']}</td>
                                                    
                                                    <td style='font-size: 8px; text-align: center;' id='preco'>{$value['preco']}</td>
                                                    
                                                    <td style='font-size: 8px; text-align: center;' id='sessoes'>{$value['sessoes']}</td>";

                                                    if(($value['pago']) == 0){
														$html .="<td style='font-size: 8px; text-align: center; color:red;'><strong>DEVEDOR</strong></td>";
                                                    }else {
														$html .="<td style='font-size: 8px; text-align: center; color:green;'><strong>PAGO</strong></td>";
													}
                                        
										}
									}
                        $html .="</tbody>
							    </table>
                                </div>                          
                                </html>";
                $mpdf->WriteHTML($html);
                $mpdf->Output();
                exit();
}
?>