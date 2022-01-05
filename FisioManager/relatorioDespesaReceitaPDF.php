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
          $date1 = $_SESSION['date5'];
          $date2 = $_SESSION['date6'];
          $numRegistro = $_SESSION['numRegistro'];

                                $html = "
                                <div>
                                <h1 style='margin-left: 5rem;'>RELATÓRIO RECEITAS/DESPESAS</h1>
                                <table class='table table-bordered table-sm' style='margin-left: 1rem;'>
                                                <thead>
												<tr>
													<th width='100%'>
														<center><font size=2>RECEITA</font>
													</th>
													<th width='100%'>
														<center><font size=2>DESPESA</font>
													</th>
													<th width='100%'>
														<center><font size=2>SUBTOTAL</font>
													</th>
												</tr>
                                                </thead>
                                                <tbody>
                                                <tr>";
                                                $buscaCliente1 = $pdo
                                                ->prepare("SELECT SUM(r.valor) AS receita FROM receita r WHERE r.data BETWEEN'".$date1."'AND'".$date2."'");
                                                $buscaCliente1->execute();
                                                $row = $buscaCliente1->fetchALL(PDO::FETCH_ASSOC);
                                                if(count($row) > 0) {
                                                    foreach ($row as $key => $value1) { 
                                                        $html .="<td style='font-size: 12px; text-align: center;'>{$value1['receita']}</td>";
                                                 
															$buscaCliente2 = $pdo
															->prepare("SELECT SUM(d.valor) AS despesa FROM despesa d WHERE d.data BETWEEN'".$date1."'AND'".$date2."'");
															$buscaCliente2->execute();
															$row = $buscaCliente2->fetchALL(PDO::FETCH_ASSOC);
															if(count($row) > 0) {
																foreach ($row as $key => $value2) {
                                                        $html .="<td style='font-size: 12px; text-align: center;'>{$value2['despesa']}</td>";
                                                        $html .="<td style='font-size: 12px; text-align: center;'>".number_format($total = $value1['receita'] - $value2['despesa'],2,",",".")."</td>
                                                </tr>";
																}
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