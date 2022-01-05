<?php
ini_set('display_errors', 'Off');
error_reporting(E_ALL | E_STRICT);
include_once "conexao.php";
// Valida se usuário tá logado caso contrario, manda pro login.
if (!isset($_SESSION['id_usuario'])) {
    header("Location: index.php");
} if(isset($_SESSION['id_usuario'])) {
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
    if (isset($_POST["user_id"])) {
        $id = $_POST["user_id"];
    }

    if (isset($_POST['edit'])) {

        if (isset($id)) {
            $dataAtestado = date('Y/m/d', strtotime($_POST['dataAtestado']));
            $horaInicio = date('h:i:s', strtotime($_POST['horaInicio']));
            $horaFim = date('h:i:s', strtotime($_POST['horaFim']));
        }

        //if (isset($dataAtestado) && !empty($dataAtestado) && isset($horaInicio) && !empty($horaInicio) && isset($horaFim) && !empty($horaFim)) {

            $update = $pdo->prepare("UPDATE cliente_pilates
                                SET dataAtestado        = ?,
                                    horaInicio          = ?,
                                    horaFim     	    = ?
								WHERE idCliente_pilates = ?");
            $update->bindValue(1, $dataAtestado);
            $update->bindValue(2, $horaInicio);
            $update->bindValue(3, $horaFim);
            $update->bindValue(4, $id);
            $update->execute();

            if ($update->rowCount() > 0) {

                var_dump($update->dataAtestado);
                //header("Location: indexCliente_Pilates.php");
            } else {
                $erro1 = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong><i class="bi bi-x-octagon-fill"> ERRO AO INSERIR INFORMAÇÕES: </i></strong> Os CAMPOS com * são obrigatórios!
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                            </div>';
            }
        //}
    }
        if (isset($id)) {
            $busca = $pdo->prepare('SELECT idCliente_pilates, 
                                            dataAtestado,
                                            horaInicio,
                                            horaFim
                                    FROM cliente_pilates 
                                    WHERE idCliente_pilates = ?');
            $busca->bindValue(1, $id);
            $busca->execute();
            $row = $busca->fetchAll(PDO::FETCH_OBJ);

            foreach ($row as $dados) {
    ?>
            <form method="POST">
                    <div class="container">
                        <input type="id" name="id" value="<?php echo $dados->idCliente_pilates; ?>" hidden>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="nome">Data</label>
                                <input id="date1" type="date" name="dataAtestado" value="<?php echo $dados->dataAtestado; ?>" class="form-control" autocomplete="off" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="hora">Hora Inicio</label>
                                <input id="hora" type="time" step="2" name="horaInicio" value="<?php echo $dados->horaInicio; ?>" class="form-control" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="nome">Hora Termino</label>
                                <input id="hora" type="time" step="2" name="horaFim" value="<?php echo $dados->horaFim; ?>" class="form-control" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <button type="submit" name="edit" class="btn btn-success">Salvar</button>
                        </div>
                    </div>
                </form>
    <?php
            }
        }
    }
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

<script>
$(document).ready(function(e) {
    
    $("form[ajax=true]").submit(function(e) {
        
        e.preventDefault();
        
        var form_data = $(this).serialize();
        var form_url = $(this).attr("action");
        var form_method = $(this).attr("method").toUpperCase();
        
        $("#loadingimg").show();
        
        $.ajax({
            url: form_url, 
            type: form_method,      
            data: form_data,     
            cache: false,
            success: function(returnhtml){                          
                $("#result").html(returnhtml); 
                $("#loadingimg").hide();                    
            }           
        });    
        
    });
    
});
</script>