<?php

	$enderecobanco ="localhost";
	$usuario= "root";
	$senha="";
	$banco="salaodebeleza";
	
	
	$conexao=mysqli_connect($enderecobanco,$usuario,$senha);
	
	
	mysqli_select_db($conexao, $banco) or
	die ("Erro na seleção do banco <b>salaodebeleza</b>:" . mysqli_error($conexao));
		
	
?>