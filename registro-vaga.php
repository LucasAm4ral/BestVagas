<?php require_once 'global.php' ?>
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
              <a class="nav-link" href="info.html">Como Utilizar o Site</a>
            </li>
          </ul>
          <form class="form-inline my-2 my-lg-0">
            <a href="candidato.html" class="btn btn-outline-success my-2 my-sm-0" style="margin-right: 10px;">Área do Candidato</a>
          </form>
        </div>
      </div>
    </nav>

    <div class="container">
      <center><h3 style="margin-top: 5%; margin-bottom: 3%;">Registro de Vagas</h3></center>
      <div class="row">
            <div class="col-md-4">
                <br>
                 <form id="contact-form">
                      <button type="button" name="inserir_vaga" style="margin-left: 5%;" class="form-control btn-primary" style="font-size: 16pt;" data-toggle="modal" data-target="#modalVaga">
                              Cadastrar Vaga
                      </button>
                  </form> 
                 <!-- Modal -->
                 <div class="modal fade" id="modalVaga" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                           <div class="modal-content">
                           <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Cadastrar Vaga</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                <span aria-hidden="true">&times;</span>
                                </button>
                           </div>
                           <div class="modal-body">
                              <form action="vaga-inserir.php" method="POST">
                                  <div class="form-group">
                                      <label for="nomeEmpresa">Nome da empresa</label>
                                      <input type="text" class="form-control" id="nomeEmpresa" name="nomeEmpresa" placeholder="Nome da empresa"  required>
                                  </div>
                                  <div class="form-group">
                                    <label for="descricao">Descrição da vaga</label>
                                    <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Descrição da vaga"  required>
                                </div>
                                  <div class="form-group">
                                    <label for="salario">Salário</label>
                                    <input type="number" class="form-control" id="salario" name="salario" placeholder="Salário"  required>
                                  </div>
                                  <div class="form-group">
                                    <label for="tipo">Tipo da vaga</label>
                                    <select name="tipo" class="form-control"  id="tipo">
                                        <option value="Web">Web</option>
                                        <option value="Mobile">Mobile</option>
                                        <option value="Back-End">Back-End</option>
                                        <option value="Infraestrutura">Infraestrutura</option>
                                        <option value="Analista de Sistemas">Analista de Sistemas</option>
                                        <option value="Outros">Outros...</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                  <label for="nivelVaga">Nível da Vaga</label>
                                  <select name="nivelVaga" class="form-control" id="nivelVaga">
                                      <option value="Junior">Junior</option>
                                      <option value="Pleno">Pleno</option>
                                      <option value="Senior">Senior</option>
                                      <option value="Estágio">Estágio</option>
                                  </select>
                              </div>                                 
                                
                          </div>
                                  <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                      <button type="submit" class="btn btn-info">Gravar</button>
                                  </div>
                            </form>
                      </div>
                 </div>
            </div>
       </div>
  </div>

  <div class="container">
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
                             <th class="acao">Editar</th>
                             <th class="acao">Excluir</th>
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
                             <td><a href="vaga-editar.php?id=<?php echo $linha['idvaga'] ?>" class="btn btn-info">Editar</a></td>
                             <td><a href="vaga-excluir.php?id=<?php echo $linha['idvaga'] ?>" class="btn btn-danger">Excluir</a></td>
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