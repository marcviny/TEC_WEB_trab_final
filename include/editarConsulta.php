<?php
include_once("../classes/Cliente.php");
if (isset($_SESSION['administrador'])){
$objConsulta = new Consulta();
if (isset($_GET['id'])) {
    $objConsulta->selecionarPorId($_GET['id']);
}
$retorno = $objConsulta->retornoBD->fetch_object();
?>

<div class="container">
    <div class="row">
        <div class="col-10">
            <form method="POST" action="">


           

            <div class="mb-3">
                    <label for="idAnimal" class="form-label">id do animal</label>
                    <input type="text" class="form-control" id="id-animal" aria-describedby="idAnimalHelp" name="idAnimal"  value="<?php echo $retorno->id_animal; ?>">
                    <div id="idAnimalHelp" class="form-text"></div>
                </div>
               
                <div class="mb-3">
                    <label for="idCliente" class="form-label">ID do cliente (dono do animal)</label>
                    <input type="text" class="form-control" id="id-cliente" aria-describedby="idClienteHelp" name="idCliente"  value="<?php echo $retorno->id_cliente; ?>">
                    <div id="idCliente" class="form-text"></div>
                </div>

                <div class="mb-3">
                    <label for="data" class="form-label">Data</label>
                    <input type="text" class="form-control" id="data" aria-describedby="dataHelp" name="data"  value="<?php echo $retorno->data; ?>">
                    <div id="data" class="form-text"></div>
                </div>
                <div class="mb-3">
                    <label for="hora" class="form-label">Hora</label>
                    <input type="text" class="form-control" id="hora" aria-describedby="horaHelp" name="hora"  value="<?php echo $retorno->hora; ?>">
                    <div id="hora" class="form-text"></div>
                </div>
                <div class="mb-3">
                    <label for="observacoes" class="form-label">Observações</label>
                    <input type="text" class="form-control" id="observacoes" aria-describedby="observacoesHelp" name="observacoes"  value="<?php echo $retorno->observacoes; ?>">
                    <div id="observacoes" class="form-text"></div>
                </div>



                <input type="hidden" value="<?php echo $retorno->id_consulta; ?>" name="idConsulta" >
                <input type="hidden" name="formEditarConsulta">
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>


        </div>
    </div>
</div>
<?php

}else{
    header("Location:../index.html");
}
?>