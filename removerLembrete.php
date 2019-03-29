<?php
  require("class.form.php");
  
  $id = $_GET['id'];
  $formulario = new Form();
  $formulario->RemoveLembrete($id);
 ?>
