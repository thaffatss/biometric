
<?php 
include_once "conexao.php";
use Mpdf\Mpdf;
require_once __DIR__ . '/vendor/autoload.php';
$mpdf = new Mpdf();



if(isset($_GET["id"])){
    $id = $_GET["id"];

    $buscaCliente = $pdo->prepare("SELECT * FROM cliente WHERE idCliente = '". $id ."' LIMIT 1");
    $buscaCliente->execute();
    $row = $buscaCliente->fetchAll(PDO::FETCH_ASSOC);
    
    if(count($row) > 0) {
        foreach ($row as $dado) {

            if($dado['status_pago'] == 1) {
                $pag = 'Pago';
            } else {
                $pag = 'Devendo';
            }
    
            if ($dado['opcao1'] == 1) {
                $opcao1 = '<ul><li>
                                <input class="custom-control-input" type="radio" id="customControlValidation2" checked>
                                <label style="font-size:12px;" class="custom-control-label" for="customControlValidation1">Perda de peso sem razão aparente(acima de 5kg entre 2 a 3 meses</label>    
                          </li>';
            } if($dado['opcao1'] == 2) {
                $opcao1 = '<ul><li>
                                <input class="custom-control-input" type="radio" id="customControlValidation2" disabled>
                                <label style="font-size:12px;" class="form-check-label" for="customControlValidation1">Perda de peso sem razão aparente(acima de 5kg entre 2 a 3 meses</label>   
                          </li>';
            }
            if ($dado['opcao2'] == 1) {
                $opcao2 = '<li>
                                <input class="custom-control-input" type="radio" id="customControlValidation2" checked>
                                <label style="font-size:12px;" class="custom-control-label" for="customControlValidation2">Febre, calafrios e sudorese noturna recente</label>    
                          </li>';
            } if($dado['opcao2'] == 2) {
                $opcao2 = '<li>
                                <input class="custom-control-input" type="radio" id="customControlValidation2" disabled>
                                <label style="font-size:12px;" class="custom-control-label" for="customControlValidation2">Febre, calafrios e sudorese noturna recente</label>    
                          </li>';
            }
            if ($dado['opcao3'] == 1) {
                $opcao3 = '<li>
                                <input class="custom-control-input" type="radio" id="customControlValidation2" checked>
                                <label style="font-size:12px;" class="custom-control-label" for="customControlValidation2">Vômito e náuseas recentes</label>    
                         </li>';
            } if($dado['opcao3'] == 2) {
                $opcao3 = '<li>
                                <input class="custom-control-input" type="radio" id="customControlValidation2" disabled>
                                <label style="font-size:12px;" class="custom-control-label" for="customControlValidation2">Vômito e náuseas recentes</label>    
                          </li>';
            }
            if ($dado['opcao4'] == 1) {
                $opcao4 = '<li>
                                <input class="custom-control-input" type="radio" id="customControlValidation2" checked>
                                <label style="font-size:12px;" class="custom-control-label" for="customControlValidation2">Dor noturna que pertuba o sono</label>    
                          </li>';
            } if($dado['opcao4'] == 2) {
                $opcao4 = '<li>
                                <input class="custom-control-input" type="radio" id="customControlValidation2" disabled>
                                <label style="font-size:12px;" class="custom-control-label" for="customControlValidation2">Dor noturna que pertuba o sono</label>    
                          </li>';
            }
            if ($dado['opcao5'] == 1) {
                $opcao5 = '<li>
                                <input class="custom-control-input" type="radio" id="customControlValidation2" checked>
                                <label style="font-size:12px;" class="custom-control-label" for="customControlValidation2">Dor que NÃO alivia com repouso</label>    
                          </li>';
            } if($dado['opcao5'] == 2) {
                $opcao5 = '<li>
                                <input class="custom-control-input" type="radio" id="customControlValidation2" disabled>
                                <label style="font-size:12px;" class="custom-control-label" for="customControlValidation2">Dor que NÃO alivia com repouso</label>    
                          </li>';
            }
            if ($dado['opcao6'] == 1) {
                $opcao6 = '<li>
                                <input class="custom-control-input" type="radio" id="customControlValidation2" checked>
                                <label style="font-size:12px;" class="custom-control-label" for="customControlValidation2">Dor que NÃO para nem por 10 minutos</label>    
                          </li>';
            } if($dado['opcao6'] == 2) {
                $opcao6 = '<li>
                                <input class="custom-control-input" type="radio" id="customControlValidation2" disabled>
                                <label style="font-size:12px;" class="custom-control-label" for="customControlValidation2">Dor que NÃO para nem por 10 minutos</label>    
                          </li>';
            }
            if ($dado['opcao7'] == 1) {
                $opcao7 = '<li>
                                <input class="custom-control-input" type="radio" id="customControlValidation2" checked>
                                <label style="font-size:12px;" class="custom-control-label" for="customControlValidation2">Alteração de sensibilidade nos braços, pernas ou ao redor do ânus</label>    
                          </li>';
            } if($dado['opcao7'] == 2) {
                $opcao7 = '<li>
                                <input class="custom-control-input" type="radio" id="customControlValidation2" disabled>
                                <label style="font-size:12px;" class="custom-control-label" for="customControlValidation2">Alteração de sensibilidade nos braços, pernas ou ao redor do ânus</label>    
                          </li>';
            }
            if ($dado['opcao8'] == 1) {
                $opcao8 = '<li>
                                <input class="custom-control-input" type="radio" id="customControlValidation2" checked>
                                <label style="font-size:12px;" class="custom-control-label" for="customControlValidation2">Perda ou redução de força nos braços ou nas pernas</label>    
                          </li>';
            } if($dado['opcao8'] == 2) {
                $opcao8 = '<li>
                                <input class="custom-control-input" type="radio" id="customControlValidation2" disabled>
                                <label style="font-size:12px;" class="custom-control-label" for="customControlValidation2">Perda ou redução de força nos braços ou nas pernas</label>    
                          </li>';
            }
            if ($dado['opcao9'] == 1) {
                $opcao9 = '<li>
                                <input class="custom-control-input" type="radio" id="customControlValidation2" checked>
                                <label style="font-size:12px;" class="custom-control-label" for="customControlValidation2">Sensação de formigamento ou dormência nas pernas ou braços</label>    
                          </li>';
            } if($dado['opcao9'] == 2) {
                $opcao9 = '<li>
                                <input class="custom-control-input" type="radio" id="customControlValidation2" disabled>
                                <label style="font-size:12px;" class="custom-control-label" for="customControlValidation2">Sensação de formigamento ou dormência nas pernas ou braços</label>    
                          </li>';
            }
            if ($dado['opcao10'] == 1) {
                $opcao10 = '<li>
                                <input class="custom-control-input" type="radio" id="customControlValidation2" checked>
                                <label style="font-size:12px;" class="custom-control-label" for="customControlValidation2">Alteração da função da bexiga ou intestinos (ex: incontingência, etc...)</label>    
                           </li>';
            } if($dado['opcao10'] == 2) {
                $opcao10 = '<li>
                                <input class="custom-control-input" type="radio" id="customControlValidation2" disabled>
                                <label style="font-size:12px;" class="custom-control-label" for="customControlValidation2">Alteração da função da bexiga ou intestinos (ex: incontingência, etc...)</label>    
                           </li>';
            }
            if ($dado['opcao11'] == 1) {
                $opcao11 = '<li>
                                <input class="custom-control-input" type="radio" id="customControlValidation2" checked>
                                <label style="font-size:12px;" class="custom-control-label" for="customControlValidation2">Rigidez matinal que melhora com atividade</label>    
                           </li>';
            } if($dado['opcao11'] == 2) {
                $opcao11 = '<li>
                                <input class="custom-control-input" type="radio" id="customControlValidation2" disabled>
                                <label style="font-size:12px;" class="custom-control-label" for="customControlValidation2">Rigidez matinal que melhora com atividade</label>    
                           </li>';
            }
            if ($dado['opcao12'] == 1) {
                $opcao12 = '<li>
                                <input class="custom-control-input" type="radio" id="customControlValidation2" checked>
                                <label style="font-size:12px;" class="custom-control-label" for="customControlValidation2">Trauma recente (quedas, pancadas ou acidentes) Aonde?</label>    
                           </li>';
            } if($dado['opcao12'] == 2) {
                $opcao12 = '<li>
                                <input class="custom-control-input" type="radio" id="customControlValidation2" disabled>
                                <label style="font-size:12px;" class="custom-control-label" for="customControlValidation2">Trauma recente (quedas, pancadas ou acidentes) Aonde?</label>    
                           </li>';
            }
            if ($dado['opcao13'] == 1) {
                $opcao13 = '<li>
                                <input class="custom-control-input" type="radio" id="customControlValidation2" checked>
                                <label style="font-size:12px;" class="custom-control-label" for="customControlValidation2">Faz uso prolongado de medicação corticoide</label>    
                           </li>';
            } if($dado['opcao13'] == 2) {
                $opcao13 = '<li>
                                <input class="custom-control-input" type="radio" id="customControlValidation2" disabled>
                                <label style="font-size:12px;" class="custom-control-label" for="customControlValidation2">Faz uso prolongado de medicação corticoide</label>    
                           </li>';
            }
            if ($dado['opcao14'] == 1) {
                $opcao14 = '<li>
                                <input class="custom-control-input" type="radio" id="customControlValidation2" checked>
                                <label style="font-size:12px;" class="custom-control-label" for="customControlValidation2">Osteoporose / Osteopenia</label>    
                           </li>';
            } if($dado['opcao14'] == 2) {
                $opcao14 = '<li>
                                <input class="custom-control-input" type="radio" id="customControlValidation2" disabled>
                                <label style="font-size:12px;" class="custom-control-label" for="customControlValidation2">Osteoporose / Osteopenia</label>    
                           </li>';
            }
            }
            if ($dado['opcao15'] == 1) {
                $opcao15 = '<li>
                                <input class="custom-control-input" type="radio" id="customControlValidation2" checked>
                                <label style="font-size:12px;" class="custom-control-label" for="customControlValidation2">Diabetes</label>    
                           </dt>';
            } if($dado['opcao15'] == 2) {
                $opcao15 = '<li>
                                <input class="custom-control-input" type="radio" id="customControlValidation2" disabled>
                                <label style="font-size:12px;" class="custom-control-label" for="customControlValidation2">Diabetes</label>    
                           </li>';
            }
            if ($dado['opcao16'] == 1) {
                $opcao16 = '<li>
                                <input class="custom-control-input" type="radio" id="customControlValidation2" checked>
                                <label style="font-size:12px;" class="custom-control-label" for="customControlValidation2">Ansiedade</label>    
                           </li>';
            } if($dado['opcao16'] == 2) {
                $opcao16 = '<li>
                                <input class="custom-control-input" type="radio" id="customControlValidation2" disabled>
                                <label style="font-size:12px;" class="custom-control-label" for="customControlValidation2">Ansiedade</label>    
                           </li>';
            }
            if ($dado['opcao17'] == 1) {
                $opcao17 = '<li>
                                <input class="custom-control-input" type="radio" id="customControlValidation2" checked>
                                <label style="font-size:12px;" class="custom-control-label" for="customControlValidation2">Fumante</label>    
                           </li>';
            } if($dado['opcao17'] == 2) {
                $opcao17 = '<li>
                                <input class="custom-control-input" type="radio" id="customControlValidation2" disabled>
                                <label style="font-size:12px;" class="custom-control-label" for="customControlValidation2">Fumante</label>    
                           </li>';
            }
            if ($dado['opcao18'] == 1) {
                $opcao18 = '<li>
                                <input class="custom-control-input" type="radio" id="customControlValidation2" checked>
                                <label style="font-size:12px;" class="custom-control-label" for="customControlValidation2">Dor de cabeça / enxaqueca frequentes</label>    
                           </li>';
            } if($dado['opcao18'] == 2) {
                $opcao18 = '<li>
                                <input class="custom-control-input" type="radio" id="customControlValidation2" disabled>
                                <label style="font-size:12px;" class="custom-control-label" for="customControlValidation2">Dor de cabeça / enxaqueca frequentes</label>    
                           </li>';
            }
            if ($dado['opcao19'] == 1) {
                $opcao19 = '<li>
                                <input class="custom-control-input" type="radio" id="customControlValidation2" checked>
                                <label style="font-size:12px;" class="custom-control-label" for="customControlValidation2">Consegue deitar de bruços</label>    
                           </li>';
            } if($dado['opcao19'] == 2) {
                $opcao19 = '<li>
                                <input class="custom-control-input" type="radio" id="customControlValidation2" disabled>
                                <label style="font-size:12px;" class="custom-control-label" for="customControlValidation2">Consegue deitar de bruços</label>    
                           </li>';
            }
            if ($dado['opcao20'] == 1) {
                $opcao20 = '<li>
                                <input class="custom-control-input" type="radio" id="customControlValidation2" checked>
                                <label style="font-size:12px;" class="custom-control-label" for="customControlValidation2">Durante o último mês, esteve se sentindo para baixo ou deprimido</label>    
                           </li>';
            } if($dado['opcao20'] == 2) {
                $opcao20 = '<li>
                                <input class="custom-control-input" type="radio" id="customControlValidation2" disabled>
                                <label style="font-size:12px;" class="custom-control-label" for="customControlValidation2">Durante o último mês, esteve se sentindo para baixo ou deprimido</label>    
                           </li>';
            }
            if ($dado['opcao21'] == 1) {
                $opcao21 = '<li class="list-group-item">
                                <input class="custom-control-input" type="radio" id="customControlValidation2" checked>
                                <label style="font-size:12px;" class="custom-control-label" for="customControlValidation2">Tem estado sem interesse ou sem prazer para fazer as coisas do dia a dia</label>    
                           </li></ul>';
            } if($dado['opcao21'] == 2) {
                $opcao21 = '<li style="margin-bottom:15px;>
                                <input class="custom-control-input" type="radio" id="customControlValidation2" disabled>
                                <label style="font-size:12px;" class="custom-control-label" for="customControlValidation2">Tem estado sem interesse ou sem prazer para fazer as coisas do dia a dia</label>    
                           </li></ul>';
            }
            
       $html = "
       <body>
       <div class='container'>
       <dl class='row' >
           <dd class='col-sm-12' style='padding-bottom:30px; padding-left:11%;'><h2>INFORMAÇÕES DO PACIENTE - QUIROPRAXIA</h2></dd>
           <dd class='col-sm-12' style='padding-left:80%; margin-top:-30px;'><img src='img/logo.jpg' alt='Logo'></dd>

           <dd class='col-sm-12' style='padding-bottom:5px;'>ID: ".$dado['idCliente']."</dd>

           <dd class='col-sm-12' style='padding-bottom:5px;'>Nome: ".$dado['nome']."</dd>

           <dd class='col-sm-12' style='padding-bottom:5px;'>Data: ".date('d/m/Y', strtotime($dado['dataEntrada']))."</dd>
          
           <dd class='col-sm-12' style='padding-bottom:5px;'>Hora: ".$dado['horaEntrada']."</dd>
           
           <dd class='col-sm-12' style='padding-bottom:5px;'>CPF: ".$dado['cpf']."</dd>
        
           <dd class='col-sm-12' style='padding-bottom:5px;'>Idade: ".$dado['idade']." Anos</dd>

           <dd class='col-sm-12' style='padding-bottom:5px;'>Profissão: ".$dado['profissao']."</dd>

           <dd class='col-sm-12' style='padding-bottom:5px;'>Peso: ".$dado['peso']." Kg</dd>

           <dd class='col-sm-12' style='padding-bottom:5px;'>Altura: ".$dado['altura']." m²</dd>

           <dd class='col-sm-12' style='padding-bottom:5px;'>IMC: ".number_format($dado['peso']/($dado['altura']*$dado['altura']),2,",",".")." Kg/m²</dd>

           <dd class='col-sm-12' style='padding-bottom:5px;'>Saldo: ".$dado['saldo']."</dd>
													
           <dd class='col-sm-12' style='padding-bottom:5px;'>Sessões: ".$dado['sessoes']."</dd>

           <dd class='col-sm-12' style='padding-bottom:5px;'>Status.Pag: ".$pag."</dd>
           
           <dd class='col-sm-12' style='padding-bottom:30px;'> Descrição: <br><br>".$dado['descricao']."</dd>
           </dl>
           </div>";
           $html .= "<ul> Questionário do Paciente: <br><br>";
           $html .= "<li class='col-sm-4'>".$opcao1."</li>";
           $html .= "<li class='col-sm-4'>".$opcao2."</li>";
           $html .= "<li class='col-sm-4'>".$opcao3."</li>";
           $html .= "<li class='col-sm-4'>".$opcao4."</li>";
           $html .= "<li class='col-sm-4'>".$opcao5."</li>";
           $html .= "<li class='col-sm-4'>".$opcao6."</li>";
           $html .= "<li class='col-sm-4'>".$opcao7."</li>";
           $html .= "<li class='col-sm-4'>".$opcao8."</li>";
           $html .= "<li class='col-sm-4'>".$opcao9."</li>";
           $html .= "<li class='col-sm-4'>".$opcao10."</li>";
           $html .= "<li class='col-sm-4'>".$opcao11."</li>";
           $html .= "<li class='col-sm-4'>".$opcao12."</li>";
           $html .= "<li class='col-sm-4'>".$opcao13."</li>";
           $html .= "<li class='col-sm-4'>".$opcao14."</li>";
           $html .= "<li class='col-sm-4'>".$opcao15."</li>";
           $html .= "<li class='col-sm-4'>".$opcao16."</li>";
           $html .= "<li class='col-sm-4'>".$opcao17."</li>";
           $html .= "<li class='col-sm-4'>".$opcao18."</li>";
           $html .= "<li class='col-sm-4'>".$opcao19."</li>";
           $html .= "<li class='col-sm-4'>".$opcao20."</li>";
           $html .= "<li class='col-sm-4'>".$opcao21."</li>";
           $html .= "</ul>";
       "</body>
       </html>";   
       }
   }
    $mpdf->SetDisplayMode('fullpage');
    //$css = file_get_contents('css/bootstrap.css');
    //$mpdf->WriteHTML($css,1);
    $mpdf->WriteHTML($html);
    $mpdf->Output();
    exit;



?>