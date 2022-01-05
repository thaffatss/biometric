
<?php 
include_once "conexao.php";
use Mpdf\Mpdf;
require_once __DIR__ . '/vendor/autoload.php';
$mpdf = new Mpdf();



if(isset($_GET["id"])){
    $id = $_GET["id"];

    $buscaCliente = $pdo->prepare("SELECT * FROM cliente_estetica WHERE idCliente_estetica = '". $id ."' LIMIT 1");
    $buscaCliente->execute();
    $row = $buscaCliente->fetchAll(PDO::FETCH_ASSOC);
    
    if(count($row) > 0) {
        foreach ($row as $dado) {
            
   
       $html = "
       <body>
       <div class='container'>
       <dl class='row' >
           <dd class='col-sm-12' style='padding-bottom:5px; padding-left:40%;'><h2>ATESTADO</h2></dd>
           <dd class='col-sm-12' style='padding-bottom:5px; padding-left:80%; margin-top:-30px;'><img src='img/logo.jpg' alt='Logo'></dd>
           
           <dd class='col-sm-4' style='padding-bottom:6px;'>Nome: ".$dado['nome']."</dd>
        
           <dd class='col-sm-4' style='padding-bottom:5px;'>CPF: ".$dado['cpf']."</dd>
        
           <dd class='col-sm-4' style='padding-bottom:5px;'>Idade: ".$dado['idade']." Anos</dd>

           <dd class='col-sm-4' style='padding-bottom:5px;'>Data: ".date('d/m/Y', strtotime($dado['dataEntrada']))."</dd>
          
           <dd class='col-sm-4' style='padding-bottom:30px;'>Hora: ".$dado['horaEntrada']."</dd>

           <dd class='col-sm-12' style='text-align: justify;'>".$dado['atestado']."</dd>
           </dl>
       </body>
       </html>"; 
                
       }
   }
    $mpdf->SetDisplayMode('fullpage');
    //$css = file_get_contents('css/bootstrap.css');
    //$mpdf->WriteHTML($css,1);
    $mpdf->WriteHTML($html);
    $mpdf->Output();
    exit;


}
?>