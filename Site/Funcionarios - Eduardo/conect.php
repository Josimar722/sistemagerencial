<?php	// salvar como conect.php
	$url = "localhost";
	$usuario="root";
	$senha="";
	$banco="salaoDeBeleza";

	$conect=mysqli_connect($url , $usuario , $senha);
	
	mysqli_select_db($conect , $banco) or 
	  die("Ocorreu o seguinte erro na abertura do 
	  banco <b>$banco</b> :" . mysqli_error($conect));
?>