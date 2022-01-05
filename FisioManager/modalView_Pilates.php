<?php
include_once "conexao.php";
?>
<!DOCTYPE html>
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
        <body>
<?php
if(isset($_POST["user_id"])){
    $id = $_POST["user_id"];
}

$buscaCliente = $pdo->prepare("SELECT *, DATEDIFF (dataInicio, dataFim) AS qtdDias FROM cliente_pilates  WHERE idCliente_pilates = '". $id ."' LIMIT 1");
$buscaCliente->execute();
$row = $buscaCliente->fetchAll(PDO::FETCH_ASSOC);



if(count($row) > 0):
    foreach ($row as $value):
        if($value['status_pago'] == '1') {
            $pag = 'Adimplente';
        } else {
            $pag = 'Inadimplente';
        }

?>
        <div class="container">
            <div class="row">
                <!-- Não gera pdf -->
                <input type="hidden" id="PrintInfoPilates" value="<?= $id ?>">
                <button onclick="printPage('geradorInformacoes_PilatesPDF.php?id='+document.getElementById('PrintInfoPilates').value);" type="button" title="Gerar PDF"  class="btn btn-success col-sm-12">Imprimir</button>
            </div>
            <div class="row" style="margin-top: 10px;">
                <span class="col-12" style="font-size:12px;"><strong>Nome: </strong><?= ucwords($value['nome']) ?></span>
                <span class="col-12" style="font-size:12px;"><strong>CPF: </strong><?= $value['cpf'] ?></span>
                <span class="col-12" style="font-size:12px;"><strong>D. Matr: </strong><?= date('d/m/Y', strtotime($value['dataInicio'])) ?></span>
                <span class="col-12" style="font-size:12px;"><strong>D. Venc: </strong><?= date('d/m/Y', strtotime($value['dataFim'])) ?></span>
                <span class="col-12" style="font-size:12px;"><strong>Dia(s) p/ Venc: </strong><?= ltrim($value['qtdDias'], '-') ?></span>
                <span class="col-12" style="font-size:12px;"><strong>Prof: </strong><?= ucwords($value['profissao']) ?></span>
                <span class="col-12" style="font-size:12px;"><strong>Pagamento: </strong><?= $pag ?></span> 
                <span class="col-12" style="font-size:12px;"><strong>Sessões: </strong><?= $value['sessoes'] ?></span>
                <hr style="height:1px; width:100%; border-width:0;  background-color: rgb(0, 0, 0, 0.2);">
                <p class="col-12" style="font-size:16px;"><strong>Procedimento(s): </strong></p>
                <span class="col-12" style="font-size:14px;"><?= $value['procedimento'] ?></span>

                <p class="col-12" style="margin-bottom:16px;"><strong>Questionário:</strong></p>
            </div>
                <?php
                if ($value['opcao1'] == 1) {
                ?>
                                <ul style="margin-left:5px;">
                                <li>
                                    <input class="custom-control-input" type="radio" id="customControlValidation2" checked>
                                    <label style="font-size:10px;" class="custom-control-label" for="customControlValidation2">Perda de peso sem razão aparente(acima de 5kg entre 2 a 3 meses</label>   
                                </li>
                <?php
                } 
                if($value['opcao1'] == 2) {
                ?>
                                <ul style="margin-left:5px;">
                                <li>
                                    <input class="custom-control-input" type="radio" id="customControlValidation2" disabled>
                                    <label style="font-size:10px;" class="custom-control-label" for="customControlValidation2">Perda de peso sem razão aparente(acima de 5kg entre 2 a 3 meses</label>   
                                </li>
                <?php
                }
                if ($value['opcao2'] == 1) {
                ?>
                                <li>
                                    <input class="custom-control-input" type="radio" id="customControlValidation2" checked>
                                    <label style="font-size:10px;" class="custom-control-label" for="customControlValidation2">Febre, calafrios e sudorese noturna recente</label>    
                                </li>
                <?php
                } 
                if($value['opcao2'] == 2) {
                ?>
                                <li>
                                    <input class="custom-control-input" type="radio" id="customControlValidation2" disabled>
                                    <label style="font-size:10px;" class="custom-control-label" for="customControlValidation2">Febre, calafrios e sudorese noturna recente</label>    
                                </li>
                <?php
                }
                if ($value['opcao3'] == 1) {
                ?>
                                <li>
                                    <input class="custom-control-input" type="radio" id="customControlValidation2" checked>
                                    <label style="font-size:10px;" class="custom-control-label" for="customControlValidation2">Vômito e náuseas recentes</label>    
                                </li>
                <?php
                } 
                if($value['opcao3'] == 2) {
                ?>
                                <li>
                                    <input class="custom-control-input" type="radio" id="customControlValidation2" disabled>
                                    <label style="font-size:10px;" class="custom-control-label" for="customControlValidation2">Vômito e náuseas recentes</label>    
                                </li>
                <?php
                }
                if ($value['opcao4'] == 1) {
                ?>
                                <li>
                                    <input class="custom-control-input" type="radio" id="customControlValidation2" checked>
                                    <label style="font-size:10px;" class="custom-control-label" for="customControlValidation2">Dor noturna que pertuba o sono</label>    
                                </li>
                <?php
                } 
                if($value['opcao4'] == 2) {
                ?>
                                <li>
                                    <input class="custom-control-input" type="radio" id="customControlValidation2" disabled>
                                    <label style="font-size:10px;" class="custom-control-label" for="customControlValidation2">Dor noturna que pertuba o sono</label>    
                                </li>
                <?php
                }
                if ($value['opcao5'] == 1) {
                ?>
                                <li>
                                    <input class="custom-control-input" type="radio" id="customControlValidation2" checked>
                                    <label style="font-size:10px;" class="custom-control-label" for="customControlValidation2">Dor que NÃO alivia com repouso</label>    
                                </li>
                <?php
                } 
                if($value['opcao5'] == 2) {
                ?>
                                <li>
                                    <input class="custom-control-input" type="radio" id="customControlValidation2" disabled>
                                    <label style="font-size:10px;" class="custom-control-label" for="customControlValidation2">Dor que NÃO alivia com repouso</label>    
                                </li>
                <?php
                }
                if ($value['opcao6'] == 1) {
                ?>
                                <li>
                                    <input class="custom-control-input" type="radio" id="customControlValidation2" checked>
                                    <label style="font-size:10px;" class="custom-control-label" for="customControlValidation2">Dor que NÃO para nem por 10 minutos</label>    
                                </li>
                <?php
                } 
                if($value['opcao6'] == 2) {
                ?>
                                <li>
                                    <input class="custom-control-input" type="radio" id="customControlValidation2" disabled>
                                    <label style="font-size:10px;" class="custom-control-label" for="customControlValidation2">Dor que NÃO para nem por 10 minutos</label>    
                                </li>
                <?php
                }
                if ($value['opcao7'] == 1) {
                ?>
                                <li>
                                    <input class="custom-control-input" type="radio" id="customControlValidation2" checked>
                                    <label style="font-size:10px;" class="custom-control-label" for="customControlValidation2">Alteração de sensibilidade nos braços, pernas ou ao redor do ânus</label>    
                                </li>
                <?php
                } 
                if($value['opcao7'] == 2) {
                ?>             
                                <li>
                                    <input class="custom-control-input" type="radio" id="customControlValidation2" disabled>
                                    <label style="font-size:10px;" class="custom-control-label" for="customControlValidation2">Alteração de sensibilidade nos braços, pernas ou ao redor do ânus</label>    
                                </li>
                <?php
                }
                if ($value['opcao8'] == 1) {
                ?>
                                <li>
                                    <input class="custom-control-input" type="radio" id="customControlValidation2" checked>
                                    <label style="font-size:10px;" class="custom-control-label" for="customControlValidation2">Perda ou redução de força nos braços ou nas pernas</label>    
                                </li>
                <?php
                } 
                if($value['opcao8'] == 2) {
                ?>
                                <li>
                                    <input class="custom-control-input" type="radio" id="customControlValidation2" disabled>
                                    <label style="font-size:10px;" class="custom-control-label" for="customControlValidation2">Perda ou redução de força nos braços ou nas pernas</label>    
                                </li>
                <?php
                }
                if ($value['opcao9'] == 1) {
                ?>
                                <li>
                                    <input class="custom-control-input" type="radio" id="customControlValidation2" checked>
                                    <label style="font-size:10px;" class="custom-control-label" for="customControlValidation2">Sensação de formigamento ou dormência nas pernas ou braços</label>    
                                </li>
                <?php
                }
                if($value['opcao9'] == 2) {
                ?>
                                <li>
                                    <input class="custom-control-input" type="radio" id="customControlValidation2" disabled>
                                    <label style="font-size:10px;" class="custom-control-label" for="customControlValidation2">Sensação de formigamento ou dormência nas pernas ou braços</label>    
                                </li>
                <?php
                }
                if ($value['opcao10'] == 1) {
                ?>
                                <li>
                                    <input class="custom-control-input" type="radio" id="customControlValidation2" checked>
                                    <label style="font-size:10px;" class="custom-control-label" for="customControlValidation2">Alteração da função da bexiga ou intestinos (ex: incontingência, etc...)</label>    
                                </li>
                <?php
                } 
                if($value['opcao10'] == 2) {
                ?>
                                <li>
                                    <input class="custom-control-input" type="radio" id="customControlValidation2" disabled>
                                    <label style="font-size:10px;" class="custom-control-label" for="customControlValidation2">Alteração da função da bexiga ou intestinos (ex: incontingência, etc...)</label>    
                                </li>
                <?php        
                }
                if ($value['opcao11'] == 1) {
                ?>
                                <li>
                                    <input class="custom-control-input" type="radio" id="customControlValidation2" checked>
                                    <label style="font-size:10px;" class="custom-control-label" for="customControlValidation2">Rigidez matinal que melhora com atividade</label>    
                                </li>
                <?php  
                } 
                if($value['opcao11'] == 2) {
                ?>
                                <li>
                                    <input class="custom-control-input" type="radio" id="customControlValidation2" disabled>
                                    <label style="font-size:10px;" class="custom-control-label" for="customControlValidation2">Rigidez matinal que melhora com atividade</label>    
                                </li>
                <?php
                }
                if ($value['opcao12'] == 1) {
                ?>
                                <li>
                                    <input class="custom-control-input" type="radio" id="customControlValidation2" checked>
                                    <label style="font-size:10px;" class="custom-control-label" for="customControlValidation2">Trauma recente (quedas, pancadas ou acidentes) Aonde?</label>    
                                </li>
                <?php
                } 
                if($value['opcao12'] == 2) {
                ?>
                                <li>
                                    <input class="custom-control-input" type="radio" id="customControlValidation2" disabled>
                                    <label style="font-size:10px;" class="custom-control-label" for="customControlValidation2">Trauma recente (quedas, pancadas ou acidentes) Aonde?</label>    
                                </li>
                <?php
                }
                if ($value['opcao13'] == 1) {
                ?>
                                <li>
                                    <input class="custom-control-input" type="radio" id="customControlValidation2" checked>
                                    <label style="font-size:10px;" class="custom-control-label" for="customControlValidation2">Faz uso prolongado de medicação corticoide</label>    
                                </li>
                <?php
                } 
                if($value['opcao13'] == 2) {
                ?>
                                <li>
                                    <input class="custom-control-input" type="radio" id="customControlValidation2" disabled>
                                    <label style="font-size:10px;" class="custom-control-label" for="customControlValidation2">Faz uso prolongado de medicação corticoide</label>    
                                </li>
                <?php
                }
                if ($value['opcao14'] == 1) {
                ?>
                                <li>
                                    <input class="custom-control-input" type="radio" id="customControlValidation2" checked>
                                    <label style="font-size:10px;" class="custom-control-label" for="customControlValidation2">Osteoporose / Osteopenia</label>    
                                </li>
                <?php
                } 
                if($value['opcao14'] == 2) {
                ?>
                                <li>
                                    <input class="custom-control-input" type="radio" id="customControlValidation2" disabled>
                                    <label style="font-size:10px;" class="custom-control-label" for="customControlValidation2">Osteoporose / Osteopenia</label>    
                                </li>
                <?php
                }
                if ($value['opcao15'] == 1) {
                ?>
                                <li>
                                    <input class="custom-control-input" type="radio" id="customControlValidation2" checked>
                                    <label style="font-size:10px;" class="custom-control-label" for="customControlValidation2">Diabetes</label>    
                                </li>
                <?php
                } 
                if($value['opcao15'] == 2) {
                ?>
                                <li>
                                    <input class="custom-control-input" type="radio" id="customControlValidation2" disabled>
                                    <label style="font-size:10px;" class="custom-control-label" for="customControlValidation2">Diabetes</label>    
                                </li>
                <?php
                }
                if ($value['opcao16'] == 1) {
                ?>
                                <li>
                                    <input class="custom-control-input" type="radio" id="customControlValidation2" checked>
                                    <label style="font-size:10px;" class="custom-control-label" for="customControlValidation2">Ansiedade</label>    
                                </li>
                <?php
                } 
                if($value['opcao16'] == 2) {
                ?>
                                <li>
                                    <input class="custom-control-input" type="radio" id="customControlValidation2" disabled>
                                    <label style="font-size:10px;" class="custom-control-label" for="customControlValidation2">Ansiedade</label>    
                                </li>
                <?php
                }
                if ($value['opcao17'] == 1) {
                ?>
                                <li>
                                    <input class="custom-control-input" type="radio" id="customControlValidation2" checked>
                                    <label style="font-size:10px;" class="custom-control-label" for="customControlValidation2">Fumante</label>    
                                </li>
                <?php
                } 
                if($value['opcao17'] == 2) {
                ?>
                                <li>
                                    <input class="custom-control-input" type="radio" id="customControlValidation2" disabled>
                                    <label style="font-size:10px;" class="custom-control-label" for="customControlValidation2">Fumante</label>    
                                </li>
                <?php
                }
                if ($value['opcao18'] == 1) {
                ?>
                                <li>
                                    <input class="custom-control-input" type="radio" id="customControlValidation2" checked>
                                    <label style="font-size:10px;" class="custom-control-label" for="customControlValidation2">Dor de cabeça / enxaqueca frequentes</label>    
                                </li>
                <?php
                } 
                if($value['opcao18'] == 2) {
                ?>
                                <li>
                                    <input class="custom-control-input" type="radio" id="customControlValidation2" disabled>
                                    <label style="font-size:10px;" class="custom-control-label" for="customControlValidation2">Dor de cabeça / enxaqueca frequentes</label>    
                                </li>
                <?php
                }
                if ($value['opcao19'] == 1) {
                ?>
                                <li>
                                    <input class="custom-control-input" type="radio" id="customControlValidation2" checked>
                                    <label style="font-size:10px;" class="custom-control-label" for="customControlValidation2">Consegue deitar de bruços</label>    
                                </li>
                <?php
                } 
                if($value['opcao19'] == 2) {
                ?>
                                <li>
                                    <input class="custom-control-input" type="radio" id="customControlValidation2" disabled>
                                    <label style="font-size:10px;" class="custom-control-label" for="customControlValidation2">Consegue deitar de bruços</label>    
                                </li>
                <?php
                }
                if ($value['opcao20'] == 1) {
                ?>
                                <li>
                                    <input class="custom-control-input" type="radio" id="customControlValidation2" checked>
                                    <label style="font-size:10px;" class="custom-control-label" for="customControlValidation2">Durante o último mês, esteve se sentindo para baixo ou deprimido</label>    
                                </li>
                <?php
                } 
                if($value['opcao20'] == 2) {
                ?>
                                <li>
                                    <input class="custom-control-input" type="radio" id="customControlValidation2" disabled>
                                    <label style="font-size:10px;" class="custom-control-label" for="customControlValidation2">Durante o último mês, esteve se sentindo para baixo ou deprimido</label>    
                                </li>
                <?php
                }
                if ($value['opcao21'] == 1) {
                ?>
                                <li>
                                    <input class="custom-control-input" type="radio" id="customControlValidation2" checked>
                                    <label style="font-size:10px;" class="custom-control-label" for="customControlValidation2">Tem estado sem interesse ou sem prazer para fazer as coisas do dia a dia</label>    
                                </li></ul>
                <?php
                } 
                if($value['opcao21'] == 2) {
                ?>
                                <li>
                                    <input class="custom-control-input" type="radio" id="customControlValidation2" disabled>
                                    <label style="font-size:10px;" class="custom-control-label" for="customControlValidation2">Tem estado sem interesse ou sem prazer para fazer as coisas do dia a dia</label>    
                                </li></ul>
                <?php
                }
                ?>

                <div class="row">
                    <p class="col-12" style="font-size:16px;"><strong>Evolução</strong></p>
                    <span class="col" style="text-align: justify; font-size: 14px;"><?= $value['descricao'] ?></span>
                </div>
        </div>
<?php
    endforeach;
endif;
?>
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