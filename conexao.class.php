<?php
  Class Conexao{
    private $user, $pass, $host, $dbname;

    function Conexao(){
      $this->user = "root";
      $this->pass = "";
      $this->dbname = "sistema";
      $this->host = "localhost";
    }

    protected function Conecta(){
      try{
        $conn = new PDO("mysql:host={$this->host};dbname={$this->dbname}",
                        $this->user, $this->pass);
        return $conn;
      }catch(Exception $e){
        echo "Erro na Conexão!";
      }
    }
  }
 ?>
