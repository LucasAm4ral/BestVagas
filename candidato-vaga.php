<?php require_once 'global.php' ?>
<?php require_once 'verifica-login.php' ?>

<?php
    try {
        $lista = Vaga::listar();
    } catch(Exception $e) {
        Erro::trataErro($e);
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>BestVagas.com</title>
  </head>
  
  <style>
    p{
      color: white;
      font-size: 13pt;
    }
    nav{
        background-color: rgb(19, 179, 19);
    }
    body{
      background-color: #262626;
    }

    h1,h2,h3{
      color: white;
    }

    img{
      max-height: 600px;
    }
  </style>
  
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container">
        <a class="navbar-brand" href="candidato-home.php">
          <img src="images/work-icon-png-6.png" width="50" height="50" alt="">
          BestVagas.com
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="candidato-home.php">Candidaturas</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="candidato-vaga.php">Visualiar Vagas</a>
            </li>
          </ul>
          <form class="form-inline my-2 my-lg-0">
            <a href="logout.php" class="btn btn-outline-danger my-2 my-sm-0" style="margin-right: 10px;">Logout</a>
          </form>
        </div>
      </div>
    </nav>

    <div class="container">
    <center><h3 style="margin-top: 5%; margin-bottom: 3%;">Vagas Disponíveis</h3></center>
    <div class="row">
         <div class="col-md-12">
             <br>
              <table class="table table-dark">     
                   <thead>
                        <tr>
                             <th>Nome da Empresa</th>
                             <th>Descrição</th>
                             <th>Salário</th>
                             <th>Tipo</th>
                             <th>Nível</th>
                             <th class="acao">Candidatar</th>
                        </tr>
                   </thead>
                   <tbody>
                        <?php foreach ($lista as $linha): ?>
                             <tr>
                             <td><?php echo $linha['nome_empresa'] ?></td>
                             <td><?php echo $linha['descricao'] ?></td>
                             <td><?php echo $linha['salario'] ?></td>
                             <td><?php echo $linha['tipo'] ?></td>
                             <td><?php echo $linha['nivel_vaga'] ?></td>
                             <td><a href="candidato-vaga-post.php?id=<?php echo $linha['idvaga'] ?>" class="btn btn-success">Candidatar-se</a></td>
                             </tr>
                        <?php endforeach ?>
                   </tbody>
              </table>
         </div>
    </div>
  </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>