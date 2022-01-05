<?php 
include_once "conexao.php";
if(isset($_POST["user_id"])){
    $id = $_POST["user_id"];

    $resultado = '<!DOCTYPE html>
    <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
            <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0; charset=utf-8" />
            <title>FISIManager</title>
            <!-- BOOTSTRAP STYLES-->
            <link href="css/bootstrap.min.css" rel="stylesheet" />
             <!-- FONTAWESOME STYLES-->
            <link href="css/font-awesome.css" rel="stylesheet" />
            <link href="node_modules/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet" />
             <!-- MORRIS CHART STYLES-->
            <link href="js/morris/morris-0.4.3.min.css" rel="stylesheet" />
                <!-- CUSTOM STYLES-->
            <link href="css/custom.css" rel="stylesheet" />
             <!-- GOOGLE FONTS-->
            <link rel="apple-touch-icon" sizes="180x180" href="img/favicon/apple-touch-icon.png">
            <link rel="icon" type="image/png" sizes="32x32" href="img/favicon/favicon-32x32.png">
            <link rel="icon" type="image/png" sizes="16x16" href="img/favicon/favicon-16x16.png">
            <link rel="manifest" href="img/favicon/site.webmanifest">
        </head>
        <body>';
    
$buscaCliente = $pdo->prepare("SELECT * FROM cliente_reabilitacao WHERE idCliente_reabilitacao = '". $id ."' LIMIT 1");
$buscaCliente->execute();
$row = $buscaCliente->fetchAll(PDO::FETCH_ASSOC);

if(count($row) > 0) {
    foreach ($row as $value) {
        if($value['status_pago'] == 1) {
            $pag = 'Pago';
        } else {
            $pag = 'Devendo';
        }

        if ($value['opcao1'] == 1) {
            $opcao1 = '<ul><li>
                            <input class="custom-control-input" type="radio" id="customControlValidation2" checked>
                            <label style="font-size:12px;" class="custom-control-label" for="customControlValidation2">Perda de peso sem razão aparente(acima de 5kg entre 2 a 3 meses</label>   
                      </li>';
        } if($value['opcao1'] == 2) {
            $opcao1 = '<ul><li>
                            <input class="custom-control-input" type="radio" id="customControlValidation2" disabled>
                            <label style="font-size:12px;" class="custom-control-label" for="customControlValidation2">Perda de peso sem razão aparente(acima de 5kg entre 2 a 3 meses</label>   
                      </li>';
        }
        if ($value['opcao2'] == 1) {
            $opcao2 = '<li>
                            <input class="custom-control-input" type="radio" id="customControlValidation2" checked>
                            <label style="font-size:12px;" class="custom-control-label" for="customControlValidation2">Febre, calafrios e sudorese noturna recente</label>    
                      </li>';
        } if($value['opcao2'] == 2) {
            $opcao2 = '<li>
                            <input class="custom-control-input" type="radio" id="customControlValidation2" disabled>
                            <label style="font-size:12px;" class="custom-control-label" for="customControlValidation2">Febre, calafrios e sudorese noturna recente</label>    
                      </li>';
        }
        if ($value['opcao3'] == 1) {
            $opcao3 = '<li>
                            <input class="custom-control-input" type="radio" id="customControlValidation2" checked>
                            <label style="font-size:12px;" class="custom-control-label" for="customControlValidation2">Vômito e náuseas recentes</label>    
                     </li>';
        } if($value['opcao3'] == 2) {
            $opcao3 = '<li>
                            <input class="custom-control-input" type="radio" id="customControlValidation2" disabled>
                            <label style="font-size:12px;" class="custom-control-label" for="customControlValidation2">Vômito e náuseas recentes</label>    
                      </li>';
        }
        if ($value['opcao4'] == 1) {
            $opcao4 = '<li>
                            <input class="custom-control-input" type="radio" id="customControlValidation2" checked>
                            <label style="font-size:12px;" class="custom-control-label" for="customControlValidation2">Dor noturna que pertuba o sono</label>    
                      </li>';
        } if($value['opcao4'] == 2) {
            $opcao4 = '<li>
                            <input class="custom-control-input" type="radio" id="customControlValidation2" disabled>
                            <label style="font-size:12px;" class="custom-control-label" for="customControlValidation2">Dor noturna que pertuba o sono</label>    
                      </li>';
        }
        if ($value['opcao5'] == 1) {
            $opcao5 = '<li>
                            <input class="custom-control-input" type="radio" id="customControlValidation2" checked>
                            <label style="font-size:12px;" class="custom-control-label" for="customControlValidation2">Dor que NÃO alivia com repouso</label>    
                      </li>';
        } if($value['opcao5'] == 2) {
            $opcao5 = '<li>
                            <input class="custom-control-input" type="radio" id="customControlValidation2" disabled>
                            <label style="font-size:12px;" class="custom-control-label" for="customControlValidation2">Dor que NÃO alivia com repouso</label>    
                      </li>';
        }
        if ($value['opcao6'] == 1) {
            $opcao6 = '<li>
                            <input class="custom-control-input" type="radio" id="customControlValidation2" checked>
                            <label style="font-size:12px;" class="custom-control-label" for="customControlValidation2">Dor que NÃO para nem por 10 minutos</label>    
                      </li>';
        } if($value['opcao6'] == 2) {
            $opcao6 = '<li>
                            <input class="custom-control-input" type="radio" id="customControlValidation2" disabled>
                            <label style="font-size:12px;" class="custom-control-label" for="customControlValidation2">Dor que NÃO para nem por 10 minutos</label>    
                      </li>';
        }
        if ($value['opcao7'] == 1) {
            $opcao7 = '<li>
                            <input class="custom-control-input" type="radio" id="customControlValidation2" checked>
                            <label style="font-size:12px;" class="custom-control-label" for="customControlValidation2">Alteração de sensibilidade nos braços, pernas ou ao redor do ânus</label>    
                      </li>';
        } if($value['opcao7'] == 2) {
            $opcao7 = '<li>
                            <input class="custom-control-input" type="radio" id="customControlValidation2" disabled>
                            <label style="font-size:12px;" class="custom-control-label" for="customControlValidation2">Alteração de sensibilidade nos braços, pernas ou ao redor do ânus</label>    
                      </li>';
        }
        if ($value['opcao8'] == 1) {
            $opcao8 = '<li>
                            <input class="custom-control-input" type="radio" id="customControlValidation2" checked>
                            <label style="font-size:12px;" class="custom-control-label" for="customControlValidation2">Perda ou redução de força nos braços ou nas pernas</label>    
                      </li>';
        } if($value['opcao8'] == 2) {
            $opcao8 = '<li>
                            <input class="custom-control-input" type="radio" id="customControlValidation2" disabled>
                            <label style="font-size:12px;" class="custom-control-label" for="customControlValidation2">Perda ou redução de força nos braços ou nas pernas</label>    
                      </li>';
        }
        if ($value['opcao9'] == 1) {
            $opcao9 = '<li>
                            <input class="custom-control-input" type="radio" id="customControlValidation2" checked>
                            <label style="font-size:12px;" class="custom-control-label" for="customControlValidation2">Sensação de formigamento ou dormência nas pernas ou braços</label>    
                      </li>';
        } if($value['opcao9'] == 2) {
            $opcao9 = '<li>
                            <input class="custom-control-input" type="radio" id="customControlValidation2" disabled>
                            <label style="font-size:12px;" class="custom-control-label" for="customControlValidation2">Sensação de formigamento ou dormência nas pernas ou braços</label>    
                      </li>';
        }
        if ($value['opcao10'] == 1) {
            $opcao10 = '<li>
                            <input class="custom-control-input" type="radio" id="customControlValidation2" checked>
                            <label style="font-size:12px;" class="custom-control-label" for="customControlValidation2">Alteração da função da bexiga ou intestinos (ex: incontingência, etc...)</label>    
                       </li>';
        } if($value['opcao10'] == 2) {
            $opcao10 = '<li>
                            <input class="custom-control-input" type="radio" id="customControlValidation2" disabled>
                            <label style="font-size:12px;" class="custom-control-label" for="customControlValidation2">Alteração da função da bexiga ou intestinos (ex: incontingência, etc...)</label>    
                       </li>';
        }
        if ($value['opcao11'] == 1) {
            $opcao11 = '<li>
                            <input class="custom-control-input" type="radio" id="customControlValidation2" checked>
                            <label style="font-size:12px;" class="custom-control-label" for="customControlValidation2">Rigidez matinal que melhora com atividade</label>    
                       </li>';
        } if($value['opcao11'] == 2) {
            $opcao11 = '<li>
                            <input class="custom-control-input" type="radio" id="customControlValidation2" disabled>
                            <label style="font-size:12px;" class="custom-control-label" for="customControlValidation2">Rigidez matinal que melhora com atividade</label>    
                       </li>';
        }
        if ($value['opcao12'] == 1) {
            $opcao12 = '<li>
                            <input class="custom-control-input" type="radio" id="customControlValidation2" checked>
                            <label style="font-size:12px;" class="custom-control-label" for="customControlValidation2">Trauma recente (quedas, pancadas ou acidentes) Aonde?</label>    
                       </li>';
        } if($value['opcao12'] == 2) {
            $opcao12 = '<li>
                            <input class="custom-control-input" type="radio" id="customControlValidation2" disabled>
                            <label style="font-size:12px;" class="custom-control-label" for="customControlValidation2">Trauma recente (quedas, pancadas ou acidentes) Aonde?</label>    
                       </li>';
        }
        if ($value['opcao13'] == 1) {
            $opcao13 = '<li>
                            <input class="custom-control-input" type="radio" id="customControlValidation2" checked>
                            <label style="font-size:12px;" class="custom-control-label" for="customControlValidation2">Faz uso prolongado de medicação corticoide</label>    
                       </li>';
        } if($value['opcao13'] == 2) {
            $opcao13 = '<li>
                            <input class="custom-control-input" type="radio" id="customControlValidation2" disabled>
                            <label style="font-size:12px;" class="custom-control-label" for="customControlValidation2">Faz uso prolongado de medicação corticoide</label>    
                       </li>';
        }
        if ($value['opcao14'] == 1) {
            $opcao14 = '<li>
                            <input class="custom-control-input" type="radio" id="customControlValidation2" checked>
                            <label style="font-size:12px;" class="custom-control-label" for="customControlValidation2">Osteoporose / Osteopenia</label>    
                       </li>';
        } if($value['opcao14'] == 2) {
            $opcao14 = '<li>
                            <input class="custom-control-input" type="radio" id="customControlValidation2" disabled>
                            <label style="font-size:12px;" class="custom-control-label" for="customControlValidation2">Osteoporose / Osteopenia</label>    
                       </li>';
        }
        }
        if ($value['opcao15'] == 1) {
            $opcao15 = '<li>
                            <input class="custom-control-input" type="radio" id="customControlValidation2" checked>
                            <label style="font-size:12px;" class="custom-control-label" for="customControlValidation2">Diabetes</label>    
                       </li>';
        } if($value['opcao15'] == 2) {
            $opcao15 = '<li>
                            <input class="custom-control-input" type="radio" id="customControlValidation2" disabled>
                            <label style="font-size:12px;" class="custom-control-label" for="customControlValidation2">Diabetes</label>    
                       </li>';
        }
        if ($value['opcao16'] == 1) {
            $opcao16 = '<li>
                            <input class="custom-control-input" type="radio" id="customControlValidation2" checked>
                            <label style="font-size:12px;" class="custom-control-label" for="customControlValidation2">Ansiedade</label>    
                       </li>';
        } if($value['opcao16'] == 2) {
            $opcao16 = '<li>
                            <input class="custom-control-input" type="radio" id="customControlValidation2" disabled>
                            <label style="font-size:12px;" class="custom-control-label" for="customControlValidation2">Ansiedade</label>    
                       </li>';
        }
        if ($value['opcao17'] == 1) {
            $opcao17 = '<li>
                            <input class="custom-control-input" type="radio" id="customControlValidation2" checked>
                            <label style="font-size:12px;" class="custom-control-label" for="customControlValidation2">Fumante</label>    
                       </li>';
        } if($value['opcao17'] == 2) {
            $opcao17 = '<li>
                            <input class="custom-control-input" type="radio" id="customControlValidation2" disabled>
                            <label style="font-size:12px;" class="custom-control-label" for="customControlValidation2">Fumante</label>    
                       </li>';
        }
        if ($value['opcao18'] == 1) {
            $opcao18 = '<li>
                            <input class="custom-control-input" type="radio" id="customControlValidation2" checked>
                            <label style="font-size:12px;" class="custom-control-label" for="customControlValidation2">Dor de cabeça / enxaqueca frequentes</label>    
                       </li>';
        } if($value['opcao18'] == 2) {
            $opcao18 = '<li>
                            <input class="custom-control-input" type="radio" id="customControlValidation2" disabled>
                            <label style="font-size:12px;" class="custom-control-label" for="customControlValidation2">Dor de cabeça / enxaqueca frequentes</label>    
                       </li>';
        }
        if ($value['opcao19'] == 1) {
            $opcao19 = '<li>
                            <input class="custom-control-input" type="radio" id="customControlValidation2" checked>
                            <label style="font-size:12px;" class="custom-control-label" for="customControlValidation2">Consegue deitar de bruços</label>    
                       </li>';
        } if($value['opcao19'] == 2) {
            $opcao19 = '<li>
                            <input class="custom-control-input" type="radio" id="customControlValidation2" disabled>
                            <label style="font-size:12px;" class="custom-control-label" for="customControlValidation2">Consegue deitar de bruços</label>    
                       </li>';
        }
        if ($value['opcao20'] == 1) {
            $opcao20 = '<li>
                            <input class="custom-control-input" type="radio" id="customControlValidation2" checked>
                            <label style="font-size:12px;" class="custom-control-label" for="customControlValidation2">Durante o último mês, esteve se sentindo para baixo ou deprimido</label>    
                       </li>';
        } if($value['opcao20'] == 2) {
            $opcao20 = '<li>
                            <input class="custom-control-input" type="radio" id="customControlValidation2" disabled>
                            <label style="font-size:12px;" class="custom-control-label" for="customControlValidation2">Durante o último mês, esteve se sentindo para baixo ou deprimido</label>    
                       </li>';
        }
        if ($value['opcao21'] == 1) {
            $opcao21 = '<li>
                            <input class="custom-control-input" type="radio" id="customControlValidation2" checked>
                            <label style="font-size:12px;" class="custom-control-label" for="customControlValidation2">Tem estado sem interesse ou sem prazer para fazer as coisas do dia a dia</label>    
                       </li></ul>';
        } if($value['opcao21'] == 2) {
            $opcao21 = '<li>
                            <input class="custom-control-input" type="radio" id="customControlValidation2" disabled>
                            <label style="font-size:12px;" class="custom-control-label" for="customControlValidation2">Tem estado sem interesse ou sem prazer para fazer as coisas do dia a dia</label>    
                       </li></ul>';
        }
        
        $resultado .= '<a title="Gerar PDF" href="geradorInformacoes_ReabilitacaoPDF.php?id='.$id.'" target="_blank"><i style="float:right; font-size: 2rem; color: cornflowerblue;" class="bi bi-printer-fill"></i></a>';
        $resultado .='<dl class="row" style="padding-top: 60px; margin: 0; padding: 0; width: 100%;">';
        $resultado .='<dt class="col-sm-2" style="font-size:12px;">ID</dt>';
        $resultado .='<dd class="col-sm-4" style="font-size:12px; margin:0px; padding:0px;">'.$value['idCliente_reabilitacao'].'</dd>';
        $resultado .='<dt class="col-sm-2" style="font-size:12px;">Nome</dt>';
        $resultado .='<dd class="col-sm-4" style="font-size:12px; margin:0px; padding:0px;">'.ucwords($value['nome']).'</dd><br><br>';
        $resultado .='<dt class="col-sm-2" style="font-size:12px;">Data</dt>';
        $resultado .='<dd class="col-sm-4" style="font-size:12px; margin:0px; padding:0px;">'.date('d/m/Y', strtotime($value['dataEntrada'])).'</dd>';
        $resultado .='<dt class="col-sm-2" style="font-size:12px;">Hora</dt>';
        $resultado .='<dd class="col-sm-4" style="font-size:12px; margin:0px; padding:0px;">'.$value['horaEntrada'].'</dd><br><br>';
        $resultado .='<dt class="col-sm-2" style="font-size:12px;">Profissão</dt>';
        $resultado .='<dd class="col-sm-4" style="font-size:12px; margin:0px; padding:0px;">'.ucwords($value['profissao']).'</dd>';
        $resultado .='<dt class="col-sm-2" style="font-size:12px;">Idade</dt>';
        $resultado .='<dd class="col-sm-4" style="font-size:12px; margin:0px; padding:0px;">'.$value['idade'].' Anos</dd><br><br>';
        $resultado .='<dt class="col-sm-2" style="font-size:12px;">Peso</dt>';
        $resultado .='<dd class="col-sm-4" style="font-size:12px; margin:0px; padding:0px;">'.$value['peso'].' KG</dd>';
        $resultado .='<dt class="col-sm-2" style="font-size:12px;">Altura</dt>';
        $resultado .='<dd class="col-sm-4" style="font-size:12px; margin:0px; padding:0px;">'.$value['altura'].' cm</dd><br><br>';
        $resultado .='<dt class="col-sm-2" style="font-size:12px;">IMC</dt>';
        $resultado .='<dd class="col-sm-4" style="font-size:12px; margin:0px; padding:0px;">'.number_format(($value["peso"]/($value["altura"]*$value["altura"])),2,",",".").' Kg/m²</dd><br><br>';
        $resultado .='<dt class="col-sm-2" style="font-size:12px;">Saldo</dt>';
        $resultado .='<dd class="col-sm-4" style="font-size:12px; margin:0px; padding:0px;">R$ '.$value['saldo'].'</dd>';
        $resultado .='<dt class="col-sm-2" style="font-size:12px;">S.Pag</dt>';
        $resultado .='<dd class="col-sm-4" style="font-size:12px; margin:0px; padding:0px;">'.$pag.'</dd><br><br>';
        $resultado .='<dt class="col-sm-2" style="font-size:12px;">Sessões:</dt>';
        $resultado .='<dd class="col-sm-4" style="font-size:12px; margin:0px; padding:0px;">'.$value['sessoes'].'</dd><br><br>';
        $resultado .='<dt class="col-sm-3" style="font-size:12px;">Procedimento(s)</dt>';
        $resultado .='<dd class="col-sm-8" style="font-size:12px; margin:0px; padding:0px;">'.$value['procedimento'].'</dd><br><br>';
        $resultado .='<dt class="col-sm-12" style="margin-bottom:15px;">Questionário</dt>';
        $resultado .=$opcao1;
        $resultado .=$opcao2;
        $resultado .=$opcao3;
        $resultado .=$opcao4;
        $resultado .=$opcao5;
        $resultado .=$opcao6;
        $resultado .=$opcao7;
        $resultado .=$opcao8;
        $resultado .=$opcao9;
        $resultado .=$opcao10;
        $resultado .=$opcao11;
        $resultado .=$opcao12;
        $resultado .=$opcao13;
        $resultado .=$opcao14;
        $resultado .=$opcao15;
        $resultado .=$opcao16;
        $resultado .=$opcao17;
        $resultado .=$opcao18;
        $resultado .=$opcao19;
        $resultado .=$opcao20;
        $resultado .=$opcao21;
        $resultado .='<dt class="col-sm-12" style="margin-top:15px;">Descrição</dt>';
        $resultado .='<dd class="col-sm-12" style="text-align: justify;">'.$value['descricao'].'</dd>';
        $resultado .='</dl>';
        $resultado .='
        </body>
        </html>
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript" src="js/popper.min.js"></script>
        <script type="text/javascript" src="js/custom.js"></script>
        <script type="text/javascript" src="node_modules/chart.js/dist/chart.min.js"></script>
        <script type="text/javascript" src="node_modules/cleave.js/dist/cleave.min.js"></script>
        <script type="text/javascript" src="js/bootbox.min.js"></script>
        <script type="text/javascript" src="js/jquery.mask.js"></script>
        ';

        echo $resultado;
        
    }
}
?>