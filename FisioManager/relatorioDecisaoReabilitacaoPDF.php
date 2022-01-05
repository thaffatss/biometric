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
          $date1 = $_SESSION['date3'];
          $date2 = $_SESSION['date4'];
          $numRegistro = $_SESSION['numRegistro'];

                                $html = "
                                <div>
                                <h1 style='margin-left: 78px; font-size: 18px;'>RELATÓRIO P/ TOMADA DE DECISÕES - REABILITAÇÃO</h1>
                                <table class='table table-bordered table-sm' style='margin-left: 5rem;'>
                                                <thead>
                                                <tr>
                                                    <th width='20%'>
                                                        <center><font size=2>QTD.ATENDIMENTO</font>
                                                    </th>
                                                    <th width='20%'>
                                                        <center><font size=2>EM DÉBITO</font>
                                                    </th>
                                                    <th width='20%'>
                                                        <center><font size=2>PAGANTES</font>
                                                    </th>
                                                    <th width='40%'>
                                                        <center><font size=2>FATURAMENTO</font>
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>";
                                                $buscaCliente1 = $pdo
                                                ->prepare("SELECT COUNT(cr.idCliente_reabilitacao) AS qtdAtm, cr.status_pago FROM cliente_reabilitacao cr WHERE cr.dataEntrada BETWEEN'".$date1."'AND'".$date2."'");
                                                $buscaCliente1->execute();
                                                $row = $buscaCliente1->fetchALL(PDO::FETCH_ASSOC);
                                                if(count($row) > 0) {
                                                    foreach ($row as $key => $value1) { 
                                                        $html .="<td style='font-size: 12px; text-align: center;'>{$value1['qtdAtm']}</td>";
                                                    }
                                                }
                                                $buscaCliente2 = $pdo
                                                ->prepare("SELECT COUNT(cr.idCliente_reabilitacao) AS qtdDev, cr.status_pago FROM cliente_reabilitacao cr WHERE cr.dataEntrada BETWEEN'".$date1."'AND'".$date2."' AND cr.status_pago = 0");
                                                $buscaCliente2->execute();
                                                $row = $buscaCliente2->fetchALL(PDO::FETCH_ASSOC);
                                                if(count($row) > 0) {
                                                    foreach ($row as $key => $value2) {
                                                        $html .="<td style='font-size: 12px; text-align: center;'>{$value2['qtdDev']}</td>";
                                                    }
                                                }

                                                $buscaCliente3 = $pdo
                                                ->prepare("SELECT SUM(cr.pc_valor) + SUM(cr.saldo) AS subTotal, COUNT(cr.idCliente_reabilitacao) AS qtdPago, cr.status_pago FROM cliente_reabilitacao cr WHERE cr.dataEntrada BETWEEN'".$date1."'AND'".$date2."' AND cr.status_pago = 1");
                                                $buscaCliente3->execute();
                                                $row = $buscaCliente3->fetchALL(PDO::FETCH_ASSOC);
                                                if(count($row) > 0) {
                                                    foreach ($row as $key => $value3) {
                                                        $html .="<td style='font-size: 12px; text-align: center;'>{$value3['qtdPago']}</td>
                                                                 <td style='font-size: 12px; text-align: center;'>".number_format($value3['subTotal'],2,",",".")."</td>
                                                </tr>";
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