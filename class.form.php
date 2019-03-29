<?php
  require ("conexao.class.php");
  Class Form extends Conexao{
    private $nome;
    private $email;
    private $adm;
    private $senha;
    private $titulo;
    private $comentario;

    function Form(){
      $nome = "";
      $email = "";
      $adm = "";
      $senha = "";
      $titulo = "";
      $comentario = "";
      $this->Conexao();
    }

    //INSERÇÃO DE DADOS
    function Cadastro(){
  		$sql = "INSERT INTO usuarios (nome, email, adm , senha) VALUES (:nome , :email, :adm, :senha)";
  		$stmt = $this->Conecta()->prepare( $sql );
  		$stmt->bindParam( ':nome', $this->nome, PDO::PARAM_STR); //define o tipo de parametro
  		$stmt->bindParam( ':email', $this->email, PDO::PARAM_STR); //define o tipo de parametro
  		$stmt->bindParam( ':adm', $this->adm, PDO::PARAM_STR); //define o tipo de parametro
  		$stmt->bindParam( ':senha', $this->senha, PDO::PARAM_STR); //define o tipo de parametro
  		$result = $stmt->execute();

      header('Location: index.php');
  		if($result){
  			echo "<br>Cadastrado com Sucesso!";
  		}else{
  			echo "<br>Erro!";
  		}
  	}

  	function Insere(){
  		$sql = "INSERT INTO usuarios (nome, email, adm , senha) VALUES (:nome , :email, :adm, :senha)";
  		$stmt = $this->Conecta()->prepare( $sql );
  		$stmt->bindParam( ':nome', $this->nome, PDO::PARAM_STR); //define o tipo de parametro
  		$stmt->bindParam( ':email', $this->email, PDO::PARAM_STR); //define o tipo de parametro
  		$stmt->bindParam( ':adm', $this->adm, PDO::PARAM_STR); //define o tipo de parametro
  		$stmt->bindParam( ':senha', $this->senha, PDO::PARAM_STR); //define o tipo de parametro
  		$result = $stmt->execute();

      header('Location: dentro.php');
  		if($result){
  			echo "<br>Cadastrado com Sucesso!";
  		}else{
  			echo "<br>Erro!";
  		}
  	}

    function InsereLembrete($id){
  		$sql = "INSERT INTO lembrete (titulo, comentario, id_User) VALUES (:titulo , :comentario, :id_User)";
  		$stmt = $this->Conecta()->prepare( $sql );
  		$stmt->bindParam( ':titulo', $this->titulo, PDO::PARAM_STR); //define o tipo de parametro
  		$stmt->bindParam( ':comentario', $this->comentario, PDO::PARAM_STR); //define o tipo de parametro
  		$stmt->bindParam( ':id_User', $id, PDO::PARAM_INT); //define o tipo de parametro
  		$result = $stmt->execute();

      header('Location: dentro.php');
      echo $id;
  		if($result){
  			echo "<br>Cadastrado com Sucesso!";
  		}else{
  			echo "<br>Erro!";
  		}
  	}


  	function SelecionaUsuarios(){
  		$sql = "SELECT * FROM usuarios";
  		$stmt = $this->Conecta()->prepare( $sql );
  		$stmt->execute();

  		if($stmt->rowCount() > 0){
  			$result = $stmt->fetchAll( PDO::FETCH_ASSOC );
          echo '<div class="d-block p-2 bg-dark text-white"id="h1">
            <h1 >Gerenciamento de usuários</h1></div>';
  			foreach($result as $rows){
          if($rows['adm'] == 1){
          echo
       '<div id="alerte" id="l" class="alert alert-success" role="alert">
        <h4 class="alert-heading">Administrador</h4>
        <p>NOME: '.$rows["nome"].'</p>
          <hr>
            <p class="mb-0">  EMAIL: '.$rows["email"].'</p></div>';}
             if($rows["adm"] == 0){
             echo ' <div class="alert id="l" alert-success" id="alerte" role="alert">
                <h4 class="alert-heading">Usuario</h4>
                <p>NOME: '.$rows["nome"].'<br>EMAIL: '.$rows["email"].'</p>
                <hr>
                <p class="mb-0"><a href="atualizar.php?id='.$rows["id"].'"><button id="botao" class="btn btn-outline-info">Editar</button></a>
                <a href="remover.php?id='.$rows["id"].'"><button id="botao" class="btn btn-outline-info">Deletar</button></a></p></div> ';
    }
  }
}
}

  	function SelecionaLembrete($id){
  		$sql = "SELECT * FROM lembrete
              WHERE lembrete.id_User = :id
              order by id";
  		$stmt = $this->Conecta()->prepare( $sql );
  		$stmt->bindParam( ':id', $id, PDO::PARAM_INT); //define o tipo de parametro
  		$stmt->execute();

  		if($stmt->rowCount() > 0){
  			$result = $stmt->fetchAll( PDO::FETCH_ASSOC );
          echo '<div class="d-block p-2 bg-dark text-white"id="h1">
            <h1 >Gerenciamento de Lembretes</h1></div>';
  			foreach($result as $rows){
          echo

            '<div id="alerte" id="l" class="alert alert-success" role="alert">
        <h4 class="alert-heading">TITULO: '.$rows["titulo"].'</h4>
        <p> COMENTARIO: '.$rows["comentario"].'</p>
          <hr>
            <p class="mb-0"><a href="editarLembrete.php?id='.$rows["id"].'"><button id="botao" class="btn btn-outline-info">Editar</button></a> <a href="removerLembrete.php?id='.$rows["id"].'"><button id="botao" class="btn btn-outline-info">Deletar</button></a> </p></div>';

  			}

  		}else{
        echo '<div id="l" class="alert alert-info" role="alert">
  Você não possui lembrentes!<br> Cadastre um :)
</div>';

  		}
  	}

    function Atualiza($id){
  		$sql = "UPDATE usuarios SET nome = :n, email = :e, adm = :a, senha = :s WHERE id = :id";
  		$stmt = $this->Conecta()->prepare( $sql );
  		$stmt->bindParam( ':n', $this->nome, PDO::PARAM_STR); //define o tipo de parametro
  		$stmt->bindParam( ':e', $this->email, PDO::PARAM_STR); //define o tipo de parametro
  		$stmt->bindParam( ':a', $this->adm, PDO::PARAM_INT); //define o tipo de parametro
  		$stmt->bindParam( ':s', $this->senha, PDO::PARAM_STR); //define o tipo de parametro
  		$stmt->bindParam( ':id', $id, PDO::PARAM_INT); //define o tipo de parametro
  		$result = $stmt->execute();

      header('Location: dentro.php');
  		if($result){
  			echo "<br>Modificado com Sucesso!";
  		}else{
  			echo "<br>Erro!";
  		}
  	}

  	function EditarLembrete($id){
  		$sql = "UPDATE lembrete SET titulo = :t, comentario = :c WHERE id = :id";
  		$stmt = $this->Conecta()->prepare( $sql );
  		$stmt->bindParam( ':t', $this->titulo, PDO::PARAM_STR); //define o tipo de parametro
  		$stmt->bindParam( ':c', $this->comentario, PDO::PARAM_STR); //define o tipo de parametro
  		$stmt->bindParam( ':id', $id, PDO::PARAM_INT); //define o tipo de parametro
  		$result = $stmt->execute();

      header('Location: dentro.php');
  		if($result){
  			echo "<br>Modificado com Sucesso!";
  		}else{
  			echo "<br>Erro!";
  		}
  	}

  	function Remove($id){

      $sql = "SELECT * FROM usuarios
              WHERE id = :id";
      $stmt = $this->Conecta()->prepare( $sql );
      $stmt->bindParam( ':id', $id, PDO::PARAM_INT); //define o tipo de parametro
      $stmt->execute();

          //apagar os lembredes do usuario removido

           $sql = "DELETE FROM lembrete WHERE id_User = :id";
           $stmt = $this->Conecta()->prepare( $sql );
           $stmt->bindParam( ':id', $id, PDO::PARAM_INT); //define o tipo de parametro
           $result = $stmt->execute();

            //apagar usuario
          $sql = "DELETE FROM usuarios WHERE id = :id";
           $stmt = $this->Conecta()->prepare( $sql );
           $stmt->bindParam( ':id', $id, PDO::PARAM_INT); //define o tipo de parametro
             $result = $stmt->execute();

           header('Location: dentro.php');
         if($result){
          echo ">Removido com Sucesso!";
           }else{
         echo "<br>Erro!";
          }



  	}

    function RemoveLembrete($id){
  		$sql = "DELETE FROM lembrete WHERE id = :id";
  		$stmt = $this->Conecta()->prepare( $sql );
  		$stmt->bindParam( ':id', $id, PDO::PARAM_INT); //define o tipo de parametro
  		$result = $stmt->execute();

      header('Location: dentro.php');
  		if($result){
  			echo "<br>Removido com Sucesso!";
  		}else{
  			echo "<br>Erro!";
  		}
  	}

    //GETTERS
    function getNome(){return $this->nome;}
    function getEmail(){return $this->email;}
    function getAdm(){return $this->adm;}
    function getSenha(){return $this->senha;}
    function getTitulo(){return $this->titulo;}
    function getComentario(){return $this->comentario;}

    //SETTERS
    function setNome($nome){$this->nome = $nome;}
    function setEmail($email){$this->email = $email;}
    function setAdm($adm){$this->adm = $adm;}
    function setSenha($senha){$this->senha = $senha;}
    function setTitulo($titulo){$this->titulo = $titulo;}
    function setComentario($comentario){$this->comentario = $comentario;}
  }
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="icon" type="imagem/jpg" href="Lembrete.jpg">
  </head>
  <body>

  </body>
</html>
