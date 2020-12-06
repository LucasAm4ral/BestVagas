<?php
    require_once 'global.php'; 

    try {

        $idVaga = $_POST['idVaga'];
        $nomeEmpresa = $_POST['nomeEmpresa'];
        $descricao = $_POST['descricao'];
        $salario = $_POST['salario'];
        $tipo = $_POST['tipo'];
        $nivelVaga = $_POST['nivelVaga'];
        
        $vaga = new Vaga($idVaga);
        
        $vaga->nomeEmpresa = $nomeEmpresa;
        $vaga->descricao = $descricao;
        $vaga->salario = $salario;
        $vaga->tipo = $tipo;
        $vaga->nivelVaga = $nivelVaga;
        $vaga->atualizar();
        
        header('Location: registro-vaga.php');
        
        } catch (Exception $e) {
        Erro::trataErro($e);
        }