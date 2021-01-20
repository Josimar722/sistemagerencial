<?php	// salvar como conexao.php
	$endereco = "localhost";
	$usuario  = "root";
	$senha    = "";
	$banco	  = "salaodebeleza";
	
	// 1 - Conectando no MYSQL
	$conexao=mysqli_connect($endereco,$usuario,$senha);
	
	// 2 - Selecionando/Abrindo o banco
	mysqli_select_db($conexao , $banco) or 
	  die("Erro na sele&#x000E7;&#x000E3;o do banco 
	       <b>salaodebeleza</b>:" . mysqli_error($conexao));
?>