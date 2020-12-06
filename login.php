<?php 

require_once 'global.php'; 

if (!isset($_SESSION)) {
  session_start();
}

$email = $_POST['email'];
$senha = $_POST['senha'];

$conexao = Conexao::pegarConexao();
 
$result =  Candidato::validar($email, $senha);

if($result  != false)
{
  $dados_usuario = $result;

  $_SESSION['id_usuario'] = $dados_usuario['idcandidato'];
  $_SESSION['email'] = $email;
  $_SESSION['senha'] = $senha;
  header('location:candidato-home.php');
  
}       
else{
  unset ($_SESSION['email']);
  unset ($_SESSION['senha']);
  echo "<script>alert('Email ou senha incorretos!');";
  echo "javascript:window.location='candidato.html';</script>";
  }
?>