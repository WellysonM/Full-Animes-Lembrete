    <?php
      session_start();
        require("class.form.php");
        echo  '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
      <nav id="nav" class="navbar navbar-dark bg-dark">
      <label>Full Animes</label>
      <label class="navbar-brand h1">Bem-vindo '.$_SESSION['nome'].'</label>'.
      '<a href="sair.php"><button id="botao" class="btn btn-outline-info">Sair</button></a>
      </nav>';

        if(isset($_GET['titulo']) && isset($_GET['lembrete'])){
          session_start();
          $formulario = new Form();

          $formulario->setTitulo($_GET['titulo']);
          $formulario->setComentario($_GET['lembrete']);

          $formulario->InsereLembrete($_SESSION['id']);
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
                <a id="logo" href="login.php">
                    <img class="img-responsive" src="img/full.png" alt="">
                </a> <br></div>
            <div class="panel-body">
        <form action="cadastrarLembrete.php" method="get" class="form-horizontal">
   <div class="form-group">
    <label  class="col-sm-2 control-label">Titulo :</label>
    <div class="col-sm-10">
      <input required="" type="text" class="form-control" name="titulo" required="" placeholder="Titulo">
    </div>
  </div>
  <div class="form-group">
    <label for="text" class="col-sm-2 control-label">Lembrente:</label>
    <div class="col-sm-10">
      <input required="" type="text" class="form-control" required="" name="lembrete" placeholder="Lembrente">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
       <a class="btn btn-success"  href="dentro.php">Cancelar</a>
      <button type="submit" class="btn btn-success">Cadastrar</button>
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