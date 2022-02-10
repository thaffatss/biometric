<?php	
		ini_set('display_errors', 'Off');
		error_reporting(E_ALL | E_STRICT);
		
		require_once "menu.php";
			
		// Valida se usuário tá logado caso contrario, manda pro login.
		if(!isset($_SESSION['id_usuario'])) {
			header("Location: index.php"); 
				
		} if(isset($_SESSION['id_usuario'])) {
            
                
            
?>
<div class="row" style="margin-left:10px; margin-top: 60px; margin-right: 10px;">
<div class="col-md-12">
    
	<!-- Advanced Tables -->
	<div class="panel panel-default">
		<div class="panel-header">
			<div class="table-responsive">
				<table style="width:100%">
					<tbody>
                        <form id="form" action="" method="POST">
                            <div class="row" style="margin-left:0px; margin-right: 0px; justify-content: center; padding-bottom: 3rem;">
                                <div class="input-group col-md-7">
                                    <select name="professor" class="form-control" required autocomplete="off" aria-placeholder="Aqui" aria-label="Recipient's username" aria-describedby="button-addon2">
                                        <option value="">Selecione um Profissional</option>
                                        <?php
                                        $buscarProf = $pdo->prepare('SELECT * FROM professor');
                                        $buscarProf->execute();
                                        $row = $buscarProf->fetchAll(PDO::FETCH_OBJ);
                                        foreach ($row as $mostre) {
                                        ?>
                                            <option id="id" value="<?php echo $mostre->id; ?>"><?php echo $mostre->nome; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <button class="btn btn-outline-secondary" type="submit" name="buscar">Buscar</button>
                                                
                                </div>
                            </div>
                        </form>
					</tbody>
				</table>
			</div>
		</div>
        <?php 
        if (isset($_POST['buscar'])) {
            $professor = $_POST['professor'];
            
            $buscaProfClientePilatesQtd = $pdo->prepare("SELECT count(*) AS qtd FROM cliente_pilates WHERE Professor_id = '$professor' AND disabled = 1");
            $buscaProfClientePilatesQtd->execute();
            $rowQtdPilates = $buscaProfClientePilatesQtd->fetchAll(PDO::FETCH_ASSOC);
    
            $buscaProfClienteDermQtd = $pdo->prepare("SELECT count(*) AS qtd FROM cliente_estetica WHERE Professor_id = '$professor' AND disabled = 1");
            $buscaProfClienteDermQtd->execute();
            $rowQtdDerm = $buscaProfClienteDermQtd->fetchAll(PDO::FETCH_ASSOC);
    
            $buscaProfClienteQuiroQtd = $pdo->prepare("SELECT count(*) AS qtd FROM cliente WHERE Professor_id = '$professor' AND disabled = 1");
            $buscaProfClienteQuiroQtd->execute();
            $rowQtdQuiro = $buscaProfClienteQuiroQtd->fetchAll(PDO::FETCH_ASSOC);

            $buscaProfClienteReabQtd = $pdo->prepare("SELECT count(*) AS qtd FROM cliente_reabilitacao WHERE Professor_id = '$professor' AND disabled = 1");
            $buscaProfClienteReabQtd->execute();
            $rowQtdReab = $buscaProfClienteReabQtd->fetchAll(PDO::FETCH_ASSOC);
                        
            foreach ($rowQtdPilates as $value01) {
                foreach ($rowQtdDerm as $value02) {
                    foreach ($rowQtdQuiro as $value03) {
                        foreach ($rowQtdReab as $value04) {
                            $result = $value01['qtd'] + $value02['qtd'] + $value03['qtd'] + $value04['qtd'];
                            
        ?>
        <div class="panel-body" style="overflow: auto; width: 100%; height: 300px;">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-hover" 
						id="table-indexFluxo"
						style="width: 100%">
					<thead>
						<tr>
							<th width="10%">
								<center><font size=2>ID</font>
							</th>
                            <th width="45%">
								<center><font size=2>PROFISSIONAL</font>
							</th>
                            <th width="45%">
								<center><font size=2>QTD.ALUNOS</font>
							</th>
						</tr>
					</thead>
					<tbody id="searchTable">
                                
                    <?php
                    $buscarProf = $pdo->prepare("SELECT * FROM professor WHERE id = '".$professor."'");
                    $buscarProf->execute();
                    $row = $buscarProf->fetchAll(PDO::FETCH_OBJ);
                    foreach ($row as $mostre) {
                    ?>
                    <tr>
                        <td style="font-size: 12px; text-align: center;"><?=$mostre->id?></td>
                        <td style="font-size: 12px; text-align: center;"><?=$mostre->nome?></td>
                        <td style="font-size: 12px; text-align: center;"><?=$result ?> Alunos</td>
                    </tr>
                                                    
                    <?php			
                    }
                    }
                    ?>
					</tbody>
				</table>
			</div>                            
		</div>   
 
</div>
</div>
<?php
}
}
}
}         
}
 ?>
<?php require_once "footer.php"; ?>
</html>