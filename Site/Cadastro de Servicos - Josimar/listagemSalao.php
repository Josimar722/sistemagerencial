<html>
	<head>
		<title>Listagem de Servi&#x000E7;os do Salão</title>
	</head>
	<body>
	<?php
   		
	include "conexao.php";
			
	$comando="SELECT * FROM servicos ORDER BY NomeServico" ;
	
	$rs = mysqli_query($conexao , $comando) or
		die("Falha na seleção de dados:" .
			mysqli_error($conexao) );
	
	$linhas = mysqli_num_rows($rs) or
		die("Falha na recuperação dos registros:" . 
		mysqli_error($conexao) );
			
	echo "N&#x000FA;mero de registros encontrados: $linhas <br>";
	
	// Ou assim:
	// mysqli_query($conn , "SELECT * FROM servicos1")
	echo "<table border='1'>";
	echo "	<tr>";
	echo "      <th>Codigo</th>";
	echo "		<th>Nome Servico</th>";
	echo "		<th>Pago</th>";
	echo "		<th>Atendido Por</th>";
	echo "		<th>Datada Visita</th>";
	echo "      <th>Foto</th>";	
	echo "		<th colspan=2>A&#x000E7;&#x000F5;es</th>";
	echo "	</tr>";
	
	
	$contador=0;
		
	while (  $contador < $linhas )
	{
		$dados = mysqli_fetch_array($rs);
		
		$codigo      = $dados["codigo"];
		$NomeServico = $dados["NomeServico"] ;
		$Pago        = $dados["Pago"] ;
		$NomeCliente = $dados["NomeCliente"] ;
		$DatadaVisita  = $dados["DatadaVisita"] ;
		$foto          = $dados["foto"] ;
		
		
		echo "	<tr>";
		echo "      <td>$codigo</td>";
		echo "		<td>$NomeServico</td>" ;
		echo "		<td>$Pago</td>" ;
		echo "		<td>$NomeCliente</td>" ;
		echo "		<td>$DatadaVisita</td>" ;
		echo "		<td><img src='foto/$foto' width='80'></td>";			
		echo "		<td> <a href='excluirSalao.php?c=$codigo'>Excluir</a> </td>";
		echo "		<td> <a href='alterarSalao.php?c=$codigo'>Alterar</a> </td>";
		echo "	</tr>";	
		$contador++;
	}
	
	echo "</table>" ;
	
?>
	</body>
	<a href='cadServ.html'> <button>Voltar</button> </a>
</html>