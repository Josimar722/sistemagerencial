<?php	
	    
	if ( ! isset($_GET["c"]) )
		die("Rotina chamada de forma incorreta!");
		
		
	$codigo = $_GET["c"];
	echo "Excluindo o c&#x000F3;digo <b>$codigo</b> <hr>";
	
	include "conexao.php";
	
	$comando="DELETE FROM servicos WHERE codigo=$codigo";
	
	mysqli_query($conexao, $comando) or 
	 die("Erro na elimina&#x000E7;&#x000E3;o dos dados do Sal&#x000E3;o:" .
			mysqli_error($conexao));
			
	echo "A exclusao do codigo de n&#x000FA;mero <b>$codigo</b> foi realizado com sucesso!";
?>
Clique <a href='listagemSalao.php'>aqui</a> para continuar.