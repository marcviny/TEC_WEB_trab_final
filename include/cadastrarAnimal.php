<?php
if (isset($_SESSION['administrador'])){
?>

<div class="container">
    <div class="row">
        <div class="col-10">
            <form method="POST" action="">

                <div class="mb-3">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="nome-cliente" aria-describedby="nomeHelp" name="nomeAnimal" >
                    <div id="nomeHelp" class="form-text"></div>
                </div>
               
                <div class="mb-3">
                    <label for="id" class="form-label">ID do cliente (dono do animal)</label>
                    <input type="text" class="form-control" id="id-cliente" aria-describedby="idHelp" name="idCliente" >
                    <div id="id" class="form-text"></div>
                </div>


                <input type="hidden" name="formCadastrarAnimal">
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