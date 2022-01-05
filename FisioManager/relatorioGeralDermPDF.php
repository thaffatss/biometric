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
                                <h1 style='margin-left: 14rem;'>RELATÓRIO GERAL - DERM</h1>
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
                                                    ce.idCliente_estetica AS codigo, ce.nome AS cliente, ce.cpf AS cpf, ce.peso AS peso, ce.altura AS altura,
                                                    pg.tipo AS forma, ce.procedimento AS tipo, ce.dataEntrada AS dt_entrada, ce.profissao AS profissao,
                                                    ce.horaEntrada AS hr_entrada, ce.dataSaida AS dt_saida, ce.horaSaida AS hr_saida, ce.sessoes AS sessoes,
                                                    ce.saldo AS saldo, ce.status_pago AS pago, ce.pc_valor AS preco, ce.endereco AS endereco, ce.idade AS idade,
                                                    ce.telefone AS tel
                                                FROM cliente_estetica ce
                                                JOIN pagamento pg ON ce.Pagamento_idPagamento = pg.idPagamento
                                                WHERE ce.dataEntrada BETWEEN'".$date1."'AND'".$date2."'"
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