<?php
    require_once 'global.php';
    require_once 'verifica-login.php';

    try{

        $idVaga = $_GET['id'];

        $cv = new CandidatoVaga();

        $cv->candidato_idcandidato = $logado;
        $cv->vaga_idvaga = $idVaga;

        $linha = CandidatoVaga::verifica($logado, $idVaga);
        if($linha){
            echo "<script>alert('Cadastro já registrado no sistema!');";
            echo "javascript:window.location='candidato-vaga.php';</script>";
        }else{
            $cv->inserir($logado, $idVaga);
            echo "<script>alert('Cadastro registrado com sucesso!');";
            echo "javascript:window.location='candidato-vaga.php';</script>";
        }

    } catch (Exception $e) {
        Erro::trataErro($e);
    }