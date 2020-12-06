<?php
    require_once 'global.php';
    
    try{

        $nomeEmpresa = $_POST['nomeEmpresa'];
        $descricao = $_POST['descricao'];
        $salario = $_POST['salario'];
        $tipo = $_POST['tipo'];
        $nivelVaga = $_POST['nivelVaga'];


        $vaga = new Vaga();

        $vaga->nomeEmpresa = $nomeEmpresa;
        $vaga->descricao = $descricao;
        $vaga->salario = $salario;
        $vaga->tipo = $tipo;
        $vaga->nivelVaga = $nivelVaga;
        $vaga->inserir();

        header('Location: registro-vaga.php');

    } catch (Exception $e) {
        Erro::trataErro($e);
    }

