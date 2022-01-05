
<?php 
include_once "conexao.php";


if(isset($_POST["user_id"])){
    $id = $_POST["user_id"];
    $resultado = '';


$buscaCliente = $pdo->prepare("SELECT * FROM cliente WHERE idCliente = '". $id ."' LIMIT 1");
$buscaCliente->execute();
$row = $buscaCliente->fetchAll(PDO::FETCH_ASSOC);

if(count($row) > 0) {
    foreach ($row as $value) {
        
        $resultado .= '<a title="Gerar PDF" href="geradorAtestadoPDF.php?id='.$id.'" target="_blank"><i style="float:right; font-size: 2rem; color: cornflowerblue;" class="bi bi-printer-fill"></i></a>';
        $resultado .= '<dl class="row" style="margin-top:50px;">';
        $resultado .= '<dt class="col-sm-2">Nome:</dt>';
        $resultado .= '<dd class="col-sm-4">'.$value['nome'].'</dd><br><br>';
        $resultado .= '<dt class="col-sm-2">Dada:</dt>';
        $resultado .= '<dd class="col-sm-4">'.date('d/m/Y', strtotime($value['dataEntrada'])).'</dd>';
        $resultado .= '<dt class="col-sm-2">Hora:</dt>';
        $resultado .= '<dd class="col-sm-4">'.$value['horaEntrada'].'</dd><br><br>';
        $resultado .= '<dt class="col-sm-2">Idade</dt>';
        $resultado .= '<dd class="col-sm-10">'.$value['idade'].' Anos</dd><br><br>';
        $resultado .= '<dd class="col-sm-12" style="text-align: justify;">'.$value['atestado'].'</dd>';
        $resultado .= '</dl>';
        echo $resultado;
    }
}

}
?>