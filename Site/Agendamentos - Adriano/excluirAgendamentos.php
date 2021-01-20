<?php	// salvar como excluirPet.php
	    // dentro de C:\WAMP\WWW\[06] BANCO
	
	if ( ! isset($_GET["c"]) )
		die("Rotina chamada de forma incorreta!");
		
	$codAgendamento = $_GET["c"];
	echo "Excluindo Agendamento <b>$codAgendamento</b> <hr>";
	
	include "conexao.php";
	
	$comando="DELETE FROM agendamentos WHERE codAgendamento=$codAgendamento";
	
	mysqli_query($conexao, $comando) or 
	 die("Erro na elimina&#x000E7;ão do agendamento:" .
			mysqli_error($conexao));
			
	echo "Agendamento <b>$codAgendamento</b> eliminado com sucesso!";
?>
Clique <a href='listagemAgendamentos.php'>aqui</a> para continuar.