<?php
    require_once 'global.php';
    require_once 'verifica-login.php';

    try {
        $idvaga = $_GET['id'];

        $cv = new CandidatoVaga($idvaga);

        $cv->excluir($idvaga);

        header('Location: candidato-home.php');
        } catch (Exception $e) {
            Erro::trataErro($e);
        }