<?php
include("../classes/Conexao.php");
include("../classes/Utilidades.php");
class Cliente
{

    private $nome;
    private $cpf;
    private $email;
    private $id;
    private $utilidades;
    private $rua;
    private $bairro;
    private $celular;

    public $retornoBD;
    public $conexaoBD;

    public function  __construct()
    {
        $objConexao = new Conexao();
        $this->conexaoBD = $objConexao->getConexao();
        $this->utilidades = new Utilidades();
    }

    public function getId()
    {
        return $this->id;
    }
    public function getNome()
    {
        return $this->nome;
    }
    public function getCPF()
    {
        return $this->cpf;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getRua()
    {
        return $this->rua;
    }
    public function getBairro()
    {
        return $this->bairro;
    }
    public function getCelular()
    {
        return $this->celular;
    }

    public function setEmail($email)
    {
        //validacao
        return $this->email = $email;
    }
    public function setNome($nome)
    {
        //validacao
        return $this->nome =  mb_strtoupper($nome, 'UTF-8');
    }
    public function setCPF($cpf)
    {
        //validacao
        return $this->cpf = $cpf;
    }
    public function setId($id)
    {
        //validacao
        return $this->id = $id;
    }
    public function setRua($rua)
    {
        //validacao
        return $this->rua = $rua;
    }
    public function setBairro($bairro)
    {
        //validacao
        return $this->bairro = $bairro;
    }
    public function setCelular($celular)
    {
        //validacao
        return $this->celular = $celular;
    }

    public function cadastrar()
    {

        if ($this->getCPF() != null) {

            $interacaoMySql = $this->conexaoBD->prepare("INSERT INTO cliente (nome_cliente, email_cliente, cpf_cliente, celular_cliente, rua_cliente, bairro_cliente) 
            VALUES (?, ?, ?, ?, ?, ?)");
            $interacaoMySql->bind_param('ssssss', $this->getNome(), $this->getEmail(), $this->getCPF(), $this->getCelular(), $this->getRua(), $this->getBairro());
            $retorno = $interacaoMySql->execute();

            $id = mysqli_insert_id($this->conexaoBD);

            return $this->utilidades->validaRedirecionar($retorno, $id, "admin.php?rota=visualizar_cliente", "O cliente foi cadastrado com sucesso!");
        } else {
            return $this->utilidades->mesagemParaUsuario("Erro, cadastro não realizado! CPF não foi infomado.");
        }
    }
    public function editar()
    {

        if ($this->getId() != null) {

            $interacaoMySql = $this->conexaoBD->prepare("UPDATE  cliente set  nome_cliente=?, email_cliente=?, cpf_cliente=? , celular_cliente=?, rua_cliente=?, bairro_cliente=?
            where id_cliente=?");
            $interacaoMySql->bind_param('sssisss', $this->getNome(), $this->getEmail(), $this->getCPF(), $this->getId(), $this->getCelular(), $this->getRua(), $this->getBairro());
            $retorno = $interacaoMySql->execute();
            if ($retorno === false) {
                trigger_error($this->conexaoBD->error, E_USER_ERROR);
            }

            $id = mysqli_insert_id($this->conexaoBD);

            return $this->utilidades->validaRedirecionar($retorno, $this->getId(), "admin.php?rota=visualizar_cliente", "Os dados do cliente foram alterados com sucesso!");
        } else {
            return $this->utilidades->mesagemParaUsuario("Erro! CPF não foi infomado.");
        }
    }

    public function selecionarPorId($id)
    {
        $sql = "select * from cliente where id_cliente=$id";
        $this->retornoBD = $this->conexaoBD->query($sql);
    }
    public function selecionarPorCPF($cpf)
    {
        $sql = "select * from cliente where cpf_cliente=$cpf";
        $this->retornoBD = $this->conexaoBD->query($sql);
    }
    public function selecionarPorNome($nome)
    {
        $sql = "select * from cliente where nome_cliente=$nome";
        $this->retornoBD = $this->conexaoBD->query($sql);
    }
    public function selecionarClientes()
    {
        $sql = "select * from cliente order by data_cadastro_cliente DESC";
        $this->retornoBD = $this->conexaoBD->query($sql);
    }

    public function selecionarPorCelular($celular)
    {
        $sql = "select * from cliente where celular_cliente=$celular";
        $this->retornoBD = $this->conexaoBD->query($sql);
    }
    public function selecionarPorRua($rua)
    {
        $sql = "select * from cliente where rua_cliente=$rua";
        $this->retornoBD = $this->conexaoBD->query($sql);
    }
    public function selecionarPorBairro($bairro)
    {
        $sql = "select * from cliente where bairro_cliente=$bairro";
        $this->retornoBD = $this->conexaoBD->query($sql);
    }

    public function deletar($id)
    {
        $sql = "DELETE from cliente where id_cliente=$id";
        $this->retornoBD = $this->conexaoBD->query($sql);
        $this->utilidades->validaRedirecionaAcaoDeletar($this->retornoBD, 'admin.php?rota=visualizar_cliente', 'O cliente foi deletado com sucesso!');
    }
}

class Animal
{

    private $nome;
    private $id;
    private $utilidades;
    private $idCliente;

    public $retornoBD;
    public $conexaoBD;

    public function  __construct()
    {
        $objConexao = new Conexao();
        $this->conexaoBD = $objConexao->getConexao();
        $this->utilidades = new Utilidades();
    }

    public function getId()
    {
        return $this->id;
    }
    public function getNome()
    {
        return $this->nome;
    }
    public function getidCLiente()
    {
        return $this->idCliente;
    }
    
    public function setId($id)
    {
        //validacao
        return $this->id = $id;
    }
    public function setNome($nome)
    {
        //validacao
        return $this->nome =  mb_strtoupper($nome, 'UTF-8');
    }
    public function setidCliente($idCliente)
    {
        //validacao
        return $this->idCliente = $idCliente;
    }
    

    public function cadastrar()
    {

        if ($this->getidCliente() != null) {

            $interacaoMySql = $this->conexaoBD->prepare("INSERT INTO animal (nome_animal, id_cliente) 
            VALUES (?, ?)");
            $interacaoMySql->bind_param('si', $this->getNome(), $this->getidCliente());
            $retorno = $interacaoMySql->execute();

            $id = mysqli_insert_id($this->conexaoBD);

            return $this->utilidades->validaRedirecionar($retorno, $id, "admin.php?rota=visualizar_animal", "O animal foi cadastrado com sucesso!");
        } else {
            return $this->utilidades->mesagemParaUsuario("Erro, cadastro não realizado! id do cliente não foi infomado.");
        }
    }
    public function editar()
    {

        if ($this->getId() != null) {

            $interacaoMySql = $this->conexaoBD->prepare("UPDATE  animal set  nome_animal=?, id_cliente=? where id_animal=?");
            $interacaoMySql->bind_param('sii', $this->getNome(), $this->getidCLiente(), $this->getId());
            $retorno = $interacaoMySql->execute();
            if ($retorno === false) {
                trigger_error($this->conexaoBD->error, E_USER_ERROR);
            }

            $id = mysqli_insert_id($this->conexaoBD);

            return $this->utilidades->validaRedirecionar($retorno, $this->getId(), "admin.php?rota=visualizar_animal", "Os dados do animal foram alterados com sucesso!");
        } else {
            return $this->utilidades->mesagemParaUsuario("Erro! id do animal não foi infomado.");
        }
    }

    public function selecionarPorId($id)
    {
        $sql = "select * from animal where id_animal=$id";
        $this->retornoBD = $this->conexaoBD->query($sql);
    }
    public function selecionarPorNome($nome)
    {
        $sql = "select * from animal where nome_animal=$nome";
        $this->retornoBD = $this->conexaoBD->query($sql);
    }
    public function selecionarAnimais()
    {
        $sql = "select * from animal order by id_animal DESC";
        $this->retornoBD = $this->conexaoBD->query($sql);
    }

    public function deletar($id)
    {
        $sql = "DELETE from animal where id_animal=$id";
        $this->retornoBD = $this->conexaoBD->query($sql);
        $this->utilidades->validaRedirecionaAcaoDeletar($this->retornoBD, 'admin.php?rota=visualizar_animal', 'O animal foi deletado com sucesso!');
    }
}


class Consulta
{

    private $id;
    private $utilidades;
    private $idCliente;
    private $idAnimal;
    private $data;
    private $hora;
    private $observacoes;

    public $retornoBD;
    public $conexaoBD;

    public function  __construct()
    {
        $objConexao = new Conexao();
        $this->conexaoBD = $objConexao->getConexao();
        $this->utilidades = new Utilidades();
    }

    public function getId()
    {
        return $this->id;
    }
    public function getidCLiente()
    {
        return $this->idCliente;
    }
    public function getidAnimal()
    {
        return $this->idAnimal;
    }
    public function getData()
    {
        return $this->data;
    }
    public function getHora()
    {
        return $this->hora;
    }
    public function getObservacoes()
    {
        return $this->observacoes;
    }



    public function setId($id)
    {
        //validacao
        return $this->id = $id;
    }
    public function setidAnimal($idAnimal)
    {
        //validacao
        return $this->idAnimal = $idAnimal;
    }
    public function setidCliente($idCliente)
    {
        //validacao
        return $this->idCliente = $idCliente;
    }

    public function setData($data)
    {
        //validacao
        return $this->data = $data;
    }
    public function setHora($hora)
    {
        //validacao
        return $this->hora = $hora;
    }
    public function setobservacoes($observacoes)
    {
        //validacao
        return $this->observacoes = $observacoes;
    }
    

    public function cadastrar()
    {

        if ($this->getidCliente() != null) {

            $interacaoMySql = $this->conexaoBD->prepare("INSERT INTO consultas (id_animal, id_cliente, data, hora, observacoes) 
            VALUES (?, ?, ?, ?, ?)");
            $interacaoMySql->bind_param('iisis', $this->getidAnimal(), $this->getidCliente(), $this->getData(), $this->getHora(), $this->getObservacoes());
            $retorno = $interacaoMySql->execute();

            $id = mysqli_insert_id($this->conexaoBD);

            return $this->utilidades->validaRedirecionar($retorno, $id, "admin.php?rota=visualizar_consulta", "a consulta foi cadastrada com sucesso!");
        } else {
            return $this->utilidades->mesagemParaUsuario("Erro, cadastro não realizado! id do cliente não foi infomado.");
        }
    }
    public function editar()
    {

        if ($this->getId() != null) {

            $interacaoMySql = $this->conexaoBD->prepare("UPDATE  consultas set  id_animal=?, id_cliente=?, data=?, hora=?, observacoes=? where id_consulta=?");
            $interacaoMySql->bind_param('iisisi', $this->getidAnimal(), $this->getidCLiente(), $this->getData(), $this->getHora(), $this->getObservacoes(), $this->getId());
            $retorno = $interacaoMySql->execute();
            if ($retorno === false) {
                trigger_error($this->conexaoBD->error, E_USER_ERROR);
            }

            $id = mysqli_insert_id($this->conexaoBD);

            return $this->utilidades->validaRedirecionar($retorno, $this->getId(), "admin.php?rota=visualizar_consulta", "Os dados da consulta foram alterados com sucesso!");
        } else {
            return $this->utilidades->mesagemParaUsuario("Erro! id da consulta não foi infomado.");
        }
    }

    public function selecionarPorId($id)
    {
        $sql = "select * from consultas where id_consulta=$id";
        $this->retornoBD = $this->conexaoBD->query($sql);
    }
    public function selecionarConsultas()
    {
        $sql = "select * from consultas order by id_consulta DESC";
        $this->retornoBD = $this->conexaoBD->query($sql);
    }

    public function deletar($id)
    {
        $sql = "DELETE from consultas where id_consulta=$id";
        $this->retornoBD = $this->conexaoBD->query($sql);
        $this->utilidades->validaRedirecionaAcaoDeletar($this->retornoBD, 'admin.php?rota=visualizar_consulta', 'A consulta foi cancelada com sucesso!');
    }
}
