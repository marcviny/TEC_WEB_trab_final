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
                <h6 class="m-0 font-weight-bold text-primary">Pesquisar Consultas</h6>
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse show" id="collapseCardExample">
                <div class="card-body">
                    <form method="POST" action="">
                        <div class="mb-3">
                            <label for="id" class="form-label">id da consulta</label>
                            <input type="text" class="form-control" id="id-consulta" aria-describedby="idHelp" name="idConsulta">
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
$objConsulta = new Consulta();
//$objConsulta->selecionarPorId(11);

if (isset($_GET['id'])) {
    $objConsulta->selecionarPorId($_GET['id']);
} else {
    $objConsulta->selecionarConsultas();
}

if ($objAnimal->retornoBD != null) {
?>
    <br/>
    <div class="row">
        <div class="col-12">
            <table class="table table-striped table-hover">
                <tr>
                    <th width="5%">#</th>
                    <th width="15%">id do animal</th>
                    <th width="15%">Id do cliente</th>
                    <th width="15%">data</th>
                    <th width="15%">hora</th>
                    <th width="25%">observações</th>

                    <th width="5%">Editar</th>
                    <th width="5%">Deletar</th>
                </tr>

                <?php

                while ($retorno = $objConsulta->retornoBD->fetch_object()) {
                    echo '<tr><td>' . $retorno->id_consulta . '</td><td>' .
                        $retorno->id_animal . '</td><td>' .
                        $retorno->id_cliente . '</td><td>' .
                        $retorno->data . '</td><td>' .
                        $retorno->hora . '</td><td>' .
                        $retorno->observacoes . '</td>';

                    echo '<td><a href="?rota=editar_consulta&id='.$retorno->id_consulta.'" class="btn btn-info btn-circle btn-sm"><i class="fas fa-list"></i></a></td>';
                    echo '<td><a href="#" class="btn btn-danger btn-circle btn-sm" onclick=\'deletarConsulta("' . $retorno->id_consulta . '")\';><i class="fas fa-trash"></i></a></td></tr>';
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