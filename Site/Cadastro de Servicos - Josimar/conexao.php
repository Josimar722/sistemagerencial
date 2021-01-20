<?php	// salvar como conexao.php
	$endereco = "localhost";
	$usuario  = "root";
	$senha    = "";
	$banco	  = "salaoDeBeleza";
	
	// 1 - Conectando no MYSQL
	$conexao=mysqli_connect($endereco,$usuario,$senha);
	
	// 2 - Selecionando/Abrindo o banco
	mysqli_select_db($conexao , $banco) or 
	  die("Erro na seleção do banco 
	       <b>Servi&#x000E7;os</b>:" . mysqli_error($conexao));
?>