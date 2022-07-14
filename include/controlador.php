<?php
include_once("../classes/Cliente.php");
//Get
if (isset($_GET['rota'])) {
    switch ($_GET['rota']) {
        case "cadastrar_cliente":
            include("../include/cadastrarCliente.php");
            break;

        case "visualizar_cliente":
            include("../include/visualizarCliente.php");
            break;

        case "editar_cliente":
            include("../include/editarCliente.php");
            break;


            case "cadastrar_animal":
                include("../include/cadastrarAnimal.php");
                break;
    
        case "visualizar_animal":
                include("../include/visualizarAnimal.php");
                break;
    
        case "editar_animal":
                include("../include/editarAnimal.php");
                break;

        
                case "cadastrar_consulta":
                    include("../include/cadastrarConsulta.php");
                    break;
        
            case "visualizar_consulta":
                    include("../include/visualizarConsulta.php");
                    break;
        
            case "editar_consulta":
                    include("../include/editarConsulta.php");
                    break;
     
            
    }
}


//Post
if (isset($_POST['formCadastrarCliente'])) {
    $objCliente = new Cliente();
    $objCliente->setNome($_POST['nomeCliente']);
    $objCliente->setCPF($_POST['cpfCliente']);
    $objCliente->setEmail($_POST['emailCliente']);
    $objCliente->setRua($_POST['ruaCliente']);
    $objCliente->setBairro($_POST['bairroCliente']);
    $objCliente->setCelular($_POST['celularCliente']);
   
    $objCliente->cadastrar();

} else if (isset($_POST['formEditarCliente'])) {
    $objCliente = new Cliente();
    $objCliente->setNome($_POST['nomeCliente']);
    $objCliente->setCPF($_POST['cpfCliente']);
    $objCliente->setEmail($_POST['emailCliente']);
    $objCliente->setRua($_POST['ruaCliente']);
    $objCliente->setBairro($_POST['bairroCliente']);
    $objCliente->setCelular($_POST['celularCliente']);
    $objCliente->setID($_POST['idCliente']);
    $objCliente->editar();

} else if (isset($_POST['formCadastrarAnimal'])) {
    $objAnimal = new Animal();
    $objAnimal->setNome($_POST['nomeAnimal']);
    $objAnimal->setidCliente($_POST['idCliente']);

   
    $objAnimal->cadastrar();

} else if (isset($_POST['formEditarAnimal'])) {
    $objAnimal = new Animal();
    $objAnimal->setNome($_POST['nomeAnimal']);
    $objAnimal->setidCliente($_POST['idCliente']);

    $objAnimal->setID($_POST['id']);
    $objAnimal->editar();

} else if (isset($_POST['formCadastrarConsulta'])) {
    $objConsulta = new Consulta();
    $objConsulta->setidAnimal($_POST['idAnimal']);
    $objConsulta->setidCliente($_POST['idCliente']);
    $objConsulta->setData($_POST['Data']);
    $objConsulta->setHora($_POST['Hora']);
    $objConsulta->setObservacoes($_POST['Observacoes']);
   
    $objConsulta->cadastrar();

} else if (isset($_POST['formEditarConsulta'])) {
    $objConsulta = new Consulta();
    $objConsulta->setidAnimal($_POST['idAnimal']);
    $objConsulta->setidCliente($_POST['idCliente']);
    $objConsulta->setData($_POST['Data']);
    $objConsulta->setHora($_POST['Hora']);
    $objConsulta->setObservacoes($_POST['Observacoes']);

    $objConsulta->setID($_POST['id']);
    $objConsulta->editar();

}
