<?php require_once 'global.php' ?>
<?php
    try {
        $idVaga = $_GET['id'];
        $vaga = new Vaga($idVaga);
     //    $listaAdm = Administrador::listar();
    } catch (Exception $e) {
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
        <a class="navbar-brand" href="index.html">
          <img src="images/work-icon-png-6.png" width="50" height="50" alt="">
          BestVagas.com
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.html">Home</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="registro-vaga.php">Registro de Vagas <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Candidatura</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Como Utilizar o Site</a>
            </li>
          </ul>
          <form class="form-inline my-2 my-lg-0">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar Vagas</button>
          </form>
        </div>
      </div>
    </nav>

    <section style="justify-content: center">
    <div class="container">
    <center><h3 style="margin-top: 5%; margin-bottom: 3%;">Editar Vaga</h3></center>
    <div class="row">
          <div class="col-md">
              <br>
              <form action="vaga-editar-post.php" method="POST">
              <input type="hidden" id="idVaga" name="idVaga" value="<?php echo $vaga->idVaga ?>">
                    <div class="form-group">
                         <label for="nomeEmpresa" style="color: white;">Nome da Empresa</label>
                         <input type="text" class="form-control" id="nomeEmpresa" name="nomeEmpresa" value="<?php echo $vaga->nomeEmpresa ?>" aria-describedby="emailHelp" placeholder="Nome do Curso"  required>
                    </div>
                    <div class="form-group">
                        <label for="descricao" style="color: white">Descrição da vaga</label>
                        <textarea class="form-control" rows="6"  placeholder="Informe a descrição do curso" name="descricao" id="descricao" required=""><?php echo $vaga->descricao?></textarea>
                    </div>
                    <div class="form-group">
                         <label for="salario" style="color: white;">Salario</label>
                         <input type="number" class="form-control" id="salario" name="salario" value="<?php echo $vaga->salario ?>" aria-describedby="emailHelp" placeholder="Nome do Curso"  required>
                    </div>
                    <div class="form-group">
                        <label for="tipo" style="color: white;">Tipo da vaga: </label>
                        <select name="tipo" class="form-control" id="tipo">
                            <option value="<?php echo $vaga->tipo ?>"><?php echo $vaga->tipo ?></option>
                            <option value="Web">Web</option>
                            <option value="Mobile">Mobile</option>
                            <option value="Back-End">Back-End</option>
                            <option value="Infraestrutura">Infraestrutura</option>
                            <option value="Analista de Sistemas">Analista de Sistemas</option>
                            <option value="Outros">Outros...</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nivelVaga"  style="color: white;">Nível da Vaga</label>
                        <select name="nivelVaga" class="form-control" id="nivelVaga">
                            <option value="<?php echo $vaga->nivelVaga ?>"><?php echo $vaga->nivelVaga ?></option>
                            <option value="Junior">Junior</option>
                            <option value="Pleno">Pleno</option>
                            <option value="Senior">Senior</option>
                            <option value="Estágio">Estágio</option>
                        </select>
                    </div> 
                    <div class="modal-footer">
                         <a href="registro-vaga.php" class="btn btn-secondary" >Voltar</a>
                         <button type="submit" class="btn btn-info">Gravar</button>
                    </div>
                    
                </form>
    </section>

    



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>