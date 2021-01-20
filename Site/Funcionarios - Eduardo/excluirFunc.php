<?php
  include "conect.php";

  $codigo = $_GET["c"];
  $comandoSQL=" DELETE FROM funcionarios  WHERE codigo=$codigo";
  mysqli_query($conect, $comandoSQL) or 
    die("Erro na exclus&#x000E3;o do funcion&#x000E1;rio: " . mysqli_error($conect));
  
  echo "O funcion&#x000E1;rio c&#x000F3;digo $codigo foi excluido do com sucesso!<hr>";
?>
Clique<a href='listagemFunc.php'> aqui </a>para voltar para listagem...