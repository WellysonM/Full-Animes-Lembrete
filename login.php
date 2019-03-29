<?php
  require("conexao.php");

  if(isset($_GET['email']) && isset($_GET['senha'])){
    $email = $_GET['email'];
    $senha = $_GET['senha'];

    $sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
    $get = mysqli_query($conexao, $sql);
    $num = mysqli_num_rows($get);

    session_start();

    if($num == 1) {
    	while ($percorrer = mysqli_fetch_array($get)) {
        $adm = $percorrer['adm'];
        $nome = $percorrer['nome'];
        $id = $percorrer['id'];

        if($adm == 1){
          $_SESSION['adm'] = $adm;
          $_SESSION['nome'] = $nome;
        }
        if($adm == 0){
          $_SESSION['adm'] = $adm;
          $_SESSION['nome'] = $nome;
          $_SESSION['id'] = $id;
        }
        header('Location: dentro.php');
        
      }
    } else {
    	echo '<!doctype html>
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
                </a><br></div>
            <div class="panel-body">
  <div class="form-group">
    <h3>Dados Invalidos!!!</h3><br>
    <div class="col-sm-10">
  </div
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
       <a class="btn btn-success"  href="index.php">Voltar</a>
    </div>
  </div>
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
</html>';

    }
  }
?>
