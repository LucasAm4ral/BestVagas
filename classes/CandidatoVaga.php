<?php

class CandidatoVaga
{
    public $candidato_idcandidato;
    public $vaga_idvaga;

    public static function listar($x)
    {
        $query = "SELECT cv.candidato_idcandidato, cv.vaga_idvaga, v.nome_empresa, v.idvaga, v.descricao, v.salario, v.nivel_vaga, v.tipo FROM candidato_has_vaga cv
        INNER JOIN vaga v ON cv.vaga_idvaga = v.idvaga WHERE cv.candidato_idcandidato = $x ORDER BY v.nome_empresa";
        $conexao = Conexao::pegarConexao();
        $resultado = $conexao->query($query);
        $lista = $resultado->fetchALL();
        return $lista;
    }

    public static function inserir($candidato_idcandidato ,$vaga_idvaga)
    {
        $query = "INSERT INTO candidato_has_vaga (candidato_idcandidato, vaga_idvaga) VALUES (:candidatoId, :vagaId)";
        $conexao = Conexao::pegarConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':candidatoId', $candidato_idcandidato);
        $stmt->bindValue(':vagaId', $vaga_idvaga);
        $stmt->execute();
    }

    public static function verifica($candidato_idcandidato ,$vaga_idvaga)
    {
        $query = "SELECT * FROM candidato_has_vaga 
        WHERE candidato_has_vaga.candidato_idcandidato = $candidato_idcandidato
        AND candidato_has_vaga.vaga_idvaga = $vaga_idvaga";
        $conexao = Conexao::pegarConexao();
        $resultado = $conexao->query($query);
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public function excluir($x)
    {
        $query = "DELETE FROM candidato_has_vaga WHERE vaga_idvaga = :vagaId";
        $conexao = Conexao::pegarConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':vagaId', $x);
        $stmt->execute();
    }

}