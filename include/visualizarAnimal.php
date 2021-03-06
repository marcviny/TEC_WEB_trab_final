<?php
include_once("../classes/Cliente.php");
if (isset($_SESSION['administrador'])){
?>
<div class="row">
    <div class="col-lg-6">
        <!-- Collapsable Card Example -->
        <div class="card shadow mb-8">
            <!-- Card Header - Accordion -->
            <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                <h6 class="m-0 font-weight-bold text-primary">Pesquisar Animais</h6>
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse show" id="collapseCardExample">
                <div class="card-body">
                    <form method="POST" action="">
                        <div class="mb-3">
                            <label for="id" class="form-label">id do animal</label>
                            <input type="text" class="form-control" id="id-animal" aria-describedby="idHelp" name="idAnimal">
                            <div id="id" class="form-text"></div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$objAnimal = new Animal();
//$objAnimal->selecionarPorId(11);

if (isset($_GET['id'])) {
    $objAnimal->selecionarPorId($_GET['id']);
} else if (isset($_POST['idCliente'])) {
    $objAnimal->selecionarPoridCliente($_POST['idCliente']);
} else {
    $objAnimal->selecionarAnimais();
}

if ($objAnimal->retornoBD != null) {
?>
    <br/>
    <div class="row">
        <div class="col-12">
            <table class="table table-striped table-hover">
                <tr>
                    <th width="10%">#</th>
                    <th width="35%">Nome</th>
                    <th width="35%">Id do cliente</th>

                    <th width="10%">Editar</th>
                    <th width="10%">Deletar</th>
                </tr>

                <?php

                while ($retorno = $objAnimal->retornoBD->fetch_object()) {
                    echo '<tr><td>' . $retorno->id_animal . '</td><td>' .
                        $retorno->nome_animal . '</td><td>' .
                        $retorno->id_cliente . '</td>';

                    echo '<td><a href="?rota=editar_animal&id='.$retorno->id_animal.'" class="btn btn-info btn-circle btn-sm"><i class="fas fa-list"></i></a></td>';
                    echo '<td><a href="#" class="btn btn-danger btn-circle btn-sm" onclick=\'deletarAnimal("' . $retorno->id_animal . '")\';><i class="fas fa-trash"></i></a></td></tr>';
                }

                ?>
            </table>
        </div>
    </div>
<?php
}
}else{
    header("Location:../index.php");
}
?>