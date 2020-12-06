<?php
    require_once 'global.php';
    
    try{

        $nome = $_POST['nomec'];
        $email = $_POST['emailc'];
        $sexo = $_POST['sexoc'];
        $senha = $_POST['senhac'];

        $candidato = new Candidato();

        $candidato->nome = $nome;
        $candidato->email = $email;
        $candidato->sexo = $sexo;
        $candidato->senha = $senha;

        $linha = Candidato::verifica($email);
        if($linha){
            echo "<script>alert('Email já cadastrado no sistema!');";
            echo "javascript:window.location='candidato.html';</script>";
        }else{
            $candidato->inserir();
            echo "<script>alert('Candidato cadastrado com sucesso!');";
            echo "javascript:window.location='candidato.html';</script>";
        }

    } catch (Exception $e) {
        Erro::trataErro($e);
    }

