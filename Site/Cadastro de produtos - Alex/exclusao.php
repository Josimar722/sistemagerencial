<?php	
	    
	if ( ! isset($_GET["c"]) )
		die("Rotina chamada de forma incorreta!");
		
		
	$Id = $_GET["c"];
	echo "Excluindo o codigo <b>$Id</b> <hr>";
	
	include "conexao.php";
	
	$comando="DELETE FROM produtos WHERE Id=$Id";
	
	mysqli_query($conexao, $comando) or 
	 die("Erro na elimina&#x000E7;&#x000E7;o dos dados do Salao:" .
			mysqli_error($conexao));
			
	echo "A exclusao do codigo do numero <b>$Id</b> foi realizado com sucesso!";
?>
Clique <a href='produto.html'>aqui</a> para continuar.