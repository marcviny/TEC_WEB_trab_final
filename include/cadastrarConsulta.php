<?php
if (isset($_SESSION['administrador'])){
?>

<div class="container">
    <div class="row">
        <div class="col-10">
            <form method="POST" action="">

                <div class="mb-3">
                    <label for="idAnimal" class="form-label">id do animal</label>
                    <input type="text" class="form-control" id="id-animal" aria-describedby="idAnimalHelp" name="idAnimal" >
                    <div id="idAnimalHelp" class="form-text"></div>
                </div>
               
                <div class="mb-3">
                    <label for="idCliente" class="form-label">ID do cliente (dono do animal)</label>
                    <input type="text" class="form-control" id="id-cliente" aria-describedby="idClienteHelp" name="idCliente" >
                    <div id="idCliente" class="form-text"></div>
                </div>

                <div class="mb-3">
                    <label for="data" class="form-label">Data</label>
                    <input type="text" class="form-control" id="data" aria-describedby="dataHelp" name="data" >
                    <div id="data" class="form-text"></div>
                </div>
                <div class="mb-3">
                    <label for="hora" class="form-label">Hora</label>
                    <input type="text" class="form-control" id="hora" aria-describedby="horaHelp" name="hora" >
                    <div id="hora" class="form-text"></div>
                </div>
                <div class="mb-3">
                    <label for="observacoes" class="form-label">Observações</label>
                    <input type="text" class="form-control" id="observacoes" aria-describedby="observacoesHelp" name="observacoes" >
                    <div id="observacoes" class="form-text"></div>
                </div>


                <input type="hidden" name="formCadastrarConsulta">
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