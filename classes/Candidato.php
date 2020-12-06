<?php

class Candidato
{

    public $idCandidato;
    public $nome;
    public $senha;
    public $email;
    public $sexo;


    public function __construct($idCandidato = false)
    {
        if ($idCandidato) {
            $this->idCandidato = $idCandidato;
            $this->carregar();
        }
    }

    public static function verifica($email)
    {
        $query = "SELECT nome FROM candidato where email = :email";
        $conexao = Conexao::pegarConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        $linha = $stmt->fetch();
        return $linha;
    }

    public function validar($email, $senha)
    {
        $query = "SELECT * FROM candidato
        WHERE email LIKE '$email' AND senha LIKE '$senha'";
        $conexao = Conexao::pegarConexao();
        $resultado = $conexao->query($query);
        $lista = $resultado->fetch();
        return $lista;
    }

    public function carregar()
    {
        $query = "SELECT idcandidato, nome, email, sexo, senha FROM candidato WHERE idcandidato = :idCandidato";
        $conexao = Conexao::pegarConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':idCandidato', $this->idCandidato);
        $stmt->execute();
        $linha = $stmt->fetch();
        $this->nome = $linha['nome'];
        $this->email = $linha['email'];
        $this->sexo = $linha['sexo'];
        $this->senha = $linha['senha'];
    }

    public function inserir()
    {
        $query = "INSERT INTO candidato (nome, email, sexo, senha) VALUES (:nome, :email, :sexo, :senha)";
        $conexao = Conexao::pegarConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':nome', $this->nome);
        $stmt->bindValue(':email', $this->email);
        $stmt->bindValue(':sexo', $this->sexo);
        $stmt->bindValue(':senha', $this->senha);
        $stmt->execute();
    }

    public function atualizar()
    {
        $query = "UPDATE candidato set nome = :nome, email = :email, sexo = :sexo, senha = :senha WHERE idcandidato = :idCandidato";
        $conexao = Conexao::pegarConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':idCandidato', $this->idCandidato);
        $stmt->bindValue(':nome', $this->nome);
        $stmt->bindValue(':email', $this->email);
        $stmt->bindValue(':sexo', $this->sexo);
        $stmt->bindValue(':senha', $this->senha);
        $stmt->execute();
    }

    public function excluir()
    {
        $query = "DELETE FROM candidato WHERE idcandidato = :idCandidato";
        $conexao = Conexao::pegarConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':idCandidato', $this->idCandidato);
        $stmt->execute();
    }

    



}
