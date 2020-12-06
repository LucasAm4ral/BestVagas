<?php
    require_once 'global.php';

    try {
        $idvaga = $_GET['id'];

        $cv = new CandidatoVaga($idvaga);

        $cv->excluir($idvaga);

        $v = new Vaga($idvaga);

        $v->excluir();

        header('Location: registro-vaga.php');
        } catch (Exception $e) {
            Erro::trataErro($e);
        }