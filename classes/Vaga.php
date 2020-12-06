<?php

class Vaga
{

    public $idVaga;
    public $nomeEmpresa;
    public $nivelVaga;
    public $salario;
    public $descricao;
    public $tipo;


    public function __construct($idVaga = false)
    {
        if ($idVaga) {
            $this->idVaga = $idVaga;
            $this->carregar();
        }
    }

    public static function listar()
    {
        $query = "SELECT idvaga, nome_empresa, nivel_vaga, salario, descricao, tipo FROM vaga ORDER BY tipo";
        $conexao = Conexao::pegarConexao();
        $resultado = $conexao->query($query);
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public function carregar()
    {
        $query = "SELECT idvaga, nome_empresa, nivel_vaga, salario, descricao, tipo FROM vaga WHERE idvaga = :idVaga";
        $conexao = Conexao::pegarConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':idVaga', $this->idVaga);
        $stmt->execute();
        $linha = $stmt->fetch();
        $this->nomeEmpresa = $linha['nome_empresa'];
        $this->nivelVaga = $linha['nivel_vaga'];
        $this->salario = $linha['salario'];
        $this->descricao = $linha['descricao'];
        $this->tipo = $linha['tipo'];
    }

    public function inserir()
    {
        $query = "INSERT INTO vaga (nome_empresa, nivel_vaga, salario, descricao, tipo) VALUES (:nomeEmpresa, :nivelVaga, :salario, :descricao, :tipo)";
        $conexao = Conexao::pegarConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':nomeEmpresa', $this->nomeEmpresa);
        $stmt->bindValue(':nivelVaga', $this->nivelVaga);
        $stmt->bindValue(':salario', $this->salario);
        $stmt->bindValue(':descricao', $this->descricao);
        $stmt->bindValue(':tipo', $this->tipo);
        $stmt->execute();
    }

    public function atualizar()
    {
        $query = "UPDATE vaga set nome_empresa = :nomeEmpresa, nivel_vaga = :nivelVaga, salario = :salario, descricao = :descricao, tipo = :tipo  WHERE idvaga = :idVaga";
        $conexao = Conexao::pegarConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':idVaga', $this->idVaga);
        $stmt->bindValue(':nomeEmpresa', $this->nomeEmpresa);
        $stmt->bindValue(':nivelVaga', $this->nivelVaga);
        $stmt->bindValue(':salario', $this->salario);
        $stmt->bindValue(':descricao', $this->descricao);
        $stmt->bindValue(':tipo', $this->tipo);
        $stmt->execute();
    }

    public function excluir()
    {
        $query = "DELETE FROM vaga WHERE idvaga = :idVaga";
        $conexao = Conexao::pegarConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':idVaga', $this->idVaga);
        $stmt->execute();
    }

    



}
