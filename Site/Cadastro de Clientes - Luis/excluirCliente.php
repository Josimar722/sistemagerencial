
<?php
		
	if (! isset($_GET["c"]) )
		die("Rotina chamada de forma incorreta!");
	  
	$codigo = $_GET["c"];
	
	include "conexao.php";
			
	$comando="DELETE FROM clientes WHERE codigo=$codigo";
	mysqli_query($conexao, $comando) or die ("Erro na eliminação do cliente:" . 
		mysqli_error($conexao));
		
	echo "<br>Cliente <b>$codigo</b> eliminado com sucesso!";
		
?>
<br><br><h2>Clique <a href='listagemCliente.php'>aqui </a> para continuar.</h2>
