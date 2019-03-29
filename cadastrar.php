<?php
        session_start();
        require("class.form.php");
        if($_SESSION['adm'] == 1){
          echo  '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
      <nav id="nav" class="navbar navbar-dark bg-dark">
      <label>Full Animes</label>
      <label class="navbar-brand h1">Bem-vindo '.$_SESSION['nome'].'</label>'.
      '<a href="dentro.php"><button id="botao" class="btn btn-outline-info">Voltar</button></a><a href="sair.php"><button id="botao" class="btn btn-outline-info">Sair</button></a>
      </nav>';
            }

        if(isset($_GET['nome'])){
          $formulario = new Form();

          if($_GET['adm'] != 1){ //validando valor zero no botão de comutação

             $formulario->setNome($_GET['nome']);
              $formulario->setEmail($_GET['email']);
              $formulario->setAdm(0);
             $formulario->setSenha($_GET['senha']);

             $formulario->Insere();
          }
          else{
          $formulario->setNome($_GET['nome']);
          $formulario->setEmail($_GET['email']);
          $formulario->setAdm($_GET['adm']);
          $formulario->setSenha($_GET['senha']);

          $formulario->Insere();
        }}
      ?>

<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>FULL ANIMES</title>
        <link rel="shortcut icon" href="img/full.png" type="image/x-icon">
        <link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css" type="text/css">
        <link rel="stylesheet" href="css/main.css" type="text/css">
            </head>
       <div class="container"><div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-custom">
            <div class="panel-heading">
                <a id="logo" href="">
                    <img class="img-responsive" src="img/full.png" alt="">
                </a> <br>
              </div>
            <div class="panel-body">
<form action="cadastrar.php" method="get" class="form-horizontal">
  <div class="form-group">
    <label for="name" class="col-sm-2 control-label">Nome :</label>
    <div class="col-sm-10">
      <input  required="" type="text" class="form-control" name="nome" id="name" placeholder="Nome Completo">
    </div>
  </div>
  <div class="form-group">
     <label for="email" class="col-sm-2 control-label">E-mail :</label>
    <div class="col-sm-10">
      <input required="" type="email" class="form-control" name="email" id="email" placeholder="seuemail@site.com">
    </div>
  </div>
  <div class="form-group">
    <label for="password" class="col-sm-2 control-label">Senha:</label>
    <div class="col-sm-10">
      <input required="" type="password" class="form-control" name="senha" id="password" placeholder="Senha">
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-success">Cadastrar</button>
      <a class="btn btn-success" href="dentro.php">cancelar</a>
    </div>
  </div>
</form>
</div>
   </div>
    </div>
</div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4 text-center" id="fonte">
            FULL ANIMES 2018 &copy; - Todos os direitos reservados
        </div>
    </div>
</div>
</body>
</html>