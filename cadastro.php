<?php
    require("class.form.php");

    if(isset($_GET['nome']) && isset($_GET['email']) && isset($_GET['senha'])){
      $formulario = new Form();

      $formulario->setNome($_GET['nome']);
      $formulario->setEmail($_GET['email']);
      $formulario->setAdm(0);
      $formulario->setSenha($_GET['senha']);

      $formulario->Cadastro();
    }
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
    <body>
        <div class="container"><div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-custom">
            <div class="panel-heading">
                <a id="logo" href="">
                    <img class="img-responsive" src="img/full.png" alt="">
                </a> <br>
              </div>
            <div class="panel-body">
  <form  action="cadastro.php" method="get" class="form-horizontal">
  <div class="form-group">
    <label for="name" class="col-sm-2 control-label">Nome :</label>
    <div class="col-sm-10">
      <input required="" type="text" class="form-control" name="nome" id="name" placeholder="Nome Completo">
    </div>
  </div>
  <div class="form-group">
     <label for="email" class="col-sm-2 control-label">E-mail :</label>
    <div class="col-sm-10">
      <input required="" type="email" class="form-control" name="email" id="email" placeholder="seuemail@site.com">
    </div>
  </div>
  <div class="form-group">
    <label for="password" class="col-sm-2 control-label">Senha :</label>
    <div class="col-sm-10">
      <input required="" type="password" class="form-control" name="senha" id="password" placeholder="Senha">
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-success">Cadastrar</button>
      <a class="btn btn-success" href="index.php">cancelar</a>
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
