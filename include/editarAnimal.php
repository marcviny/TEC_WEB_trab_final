<?php
include_once("../classes/Cliente.php");
if (isset($_SESSION['administrador'])){
$objAnimal = new Animal();
if (isset($_GET['id'])) {
    $objAnimal->selecionarPorId($_GET['id']);
}
$retorno = $objAnimal->retornoBD->fetch_object();
?>

<div class="container">
    <div class="row">
        <div class="col-10">
            <form method="POST" action="">

                <div class="mb-3">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="nome-animal" aria-describedby="nomeHelp" name="nomeAnimal" value="<?php echo $retorno->nome_animal; ?>">
                    <div id="emailHelp" class="form-text"></div>
                </div>
               
                <div class="mb-3">
                    <label for="idCliente" class="form-label">Id do Cliente</label>
                    <input type="text" class="form-control" id="id-cliente" aria-describedby="idHelp" name="idCliente" value="<?php echo $retorno->id_cliente; ?>" >
                    <div id="id" class="form-text"></div>
                </div>


                <input type="hidden" value="<?php echo $retorno->id_animal; ?>" name="idAnimal" >
                <input type="hidden" name="formEditarAnimal">
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