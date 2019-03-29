<?php
  session_start();

  $adm = $_SESSION['adm'];
//Menu do site
  if($adm == 1){
    echo '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
      <nav id="nav" class="navbar navbar-dark bg-dark">
      <label>Full Animes</label>
      <label class="navbar-brand h1">Bem-vindo '.$_SESSION['nome'].'</label>'.
      '<a href="cadastrar.php"><button id="botao" class="btn btn-outline-info">Cadastrar usuário</button></a><a href="sair.php"><button id="botao" class="btn btn-outline-info">Sair</button></a>
      </nav>';
    
    require("class.form.php");
    $formulario = new Form();
    $formulario->SelecionaUsuarios();//seleciona os usuarios para o adm
    //Menu do site
  }else if($adm == 0){
    echo '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
      <nav id="nav" class="navbar navbar-dark bg-dark">
      <label>Full Animes</label>
      <label class="navbar-brand h1">Bem-vindo '.$_SESSION['nome'].'</label>'.
      '<a href="cadastrarLembrete.php"><button id="botao" class="btn btn-outline-info">Cadastrar lembrete</button></a><a href="sair.php"><button id="botao" class="btn btn-outline-info">Sair</button></a>
      </nav>';

    require("class.form.php");
    $formulario = new Form();
    $formulario->SelecionaLembrete($_SESSION['id']);//seleciona os lembrentes do usuario comum
  }else{
    header('Location: index.php');
  }
 ?>
<!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
        <link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css" type="text/css">
        <link rel="stylesheet" href="css/main.css" type="text/css">
     <meta charset="utf-8">
     <title></title>


   </body>
 </html>
