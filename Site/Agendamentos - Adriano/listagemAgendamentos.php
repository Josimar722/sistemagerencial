<html>
	<head>
		<title>Listagem de Agendamentos</title>
	</head>
	<body>
	<?php	
	
	$conn=mysqli_connect("localhost",
						 "root",
						 "") or
		die("Erro na conex&#x000E3;o com o MYSQL.") ;

	mysqli_select_db($conn , "salaodebeleza") or
		die("Falha na sele&#x000E7;&#x000E3;o do banco de dados:" .
			mysqli_error($conn) );
			
	$comando="SELECT * FROM agendamentos ORDER BY codAgendamento" ;
	
	$rs = mysqli_query($conn , $comando) or
		die("Falha na sele&#x000E7;&#x000E3;o de dados:" .
			mysqli_error($conn) );
	
	$linhas = mysqli_num_rows($rs) or
		die("Falha na recupera&#x000E7;&#x000E3;o dos registros:" . mysqli_error($conn) );
			
	echo "N&#x000FA;mero de registros encontrados: $linhas <br>";
	
	// Ou assim:
	// mysqli_query($conn , "SELECT * FROM pets")
	echo "<table border='1'>";
	echo "	<tr>";
	echo "		<th>C&#x000F3;d. Agendamento</th>";
	
	echo "		<th>Cliente</th>";
	
	echo "		<th>Servi&#x000E7;o</th>";
	echo "		<th>Data</th>";
	echo "		<th>Hora</th>";
	echo "		<th>Observa&#x000E7;ões</th>";
	echo "		<th>Documento</th>";
	echo "		<th colspan=2>A&#x000E7;ões</th>";
	echo "	</tr>";
	
	$contador=0;
		
	while (  $contador < $linhas )
	{
		$dados = mysqli_fetch_array($rs);
		
		$codAgendamento 	 = $dados["codAgendamento"] ;
		
		$nomeCliente   		 = $dados["nomeCliente"] ;
		
		$nomeServico 		 = $dados["nomeServico"] ;
		$dataAgendamento	 = $dados["dataAgendamento"] ;
		$horaAgendamento	 = $dados["horaAgendamento"] ;
		$obs  				 = $dados["obs"] ;
	    $documento		     = $dados["documento"] ;
		
		echo "	<tr>";
		echo "		<td>$codAgendamento</td>" ;
		
		echo "		<td>$nomeCliente</td>" ;
		
		echo "		<td>$nomeServico</td>" ;
		echo "		<td>$dataAgendamento</td>" ;
		echo "		<td>$horaAgendamento</td>" ;
		echo "		<td>$obs</td>" ;
		echo "		<td>$documento </td>" ;
		echo "		<td> <a href='excluirAgendamentos.php?c=$codAgendamento'>Excluir</a> </td>";
		echo "		<td> <a href='alterarAgendamentos.php?c=$codAgendamento'>Alterar</a> </td>";
		echo "	</tr>";	
		$contador++;
	}
	
	echo "</table>" ;
	
?>
<hr>
Clique <a href="agendamentos.html">aqui</a> para cadastrar um novo agendamento.