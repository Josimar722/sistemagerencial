<html>
	<head><link rel="icon"
			  href="Studio Barber/tesoura.png"
			  type="Studio Barber/tesoura.png">
		<title>Listagem</title>
	</head>
	<body>
	<?php	
	
	$conn=mysqli_connect("localhost",
						 "root",
						 "") or
		die("Erro na conexao com o MYSQL.") ;

	mysqli_select_db($conn , "salaodebeleza") or
		die("Falha na seleção do banco de dados:" .
			mysqli_error($conn) );
			
	$comando="SELECT * FROM produtos ORDER BY nome" ;
	
	$rs = mysqli_query($conn , $comando) or
		die("Falha na seleção de dados:" .
			mysqli_error($conn) );
	
	$linhas = mysqli_num_rows($rs) or
		die("Falha na recuperaÃ§Ã£o dos registros: salao de beleza" . mysqli_error($conn) );
			
	echo "Numeros de registros encontrados: $linhas <br>";
	
	// Ou assim:
	// mysqli_query($conn , "SELECT * FROM pets")
	echo "<table border='1'>";
	echo "	<tr>";
	echo "      <th>Id</th>";
	echo "		<th>Nome</th>";
	echo "<th>Documento</th>";
	echo "		<th colspan=2>Ações</th>";
	echo "	</tr>";
	
	
	
	
	
	$contador=0;
		
	while (  $contador < $linhas )
	{
		$dados = mysqli_fetch_array($rs);
		
		$Id      = $dados["Id"];
		$nome = $dados["nome"] ;
		$documento		     = $dados["documento"] ;
		
		
		
		
		
		echo "	<tr>";
		echo "      <td>$Id</td>";
		echo "		<td>$nome</td>" ;
		echo "		<td> <a href='exclusao.php?c=$Id'>Excluir</a> </td>";
		echo "		<td> <a href='alterar.php?c=$Id'>Alterar</a> </td>";
		echo "	</tr>";	
		$contador++;
	}
	
	echo "</table>" ;
	
?>
	</body>
</html>
<hr>
Clique <a href="produto.html">aqui</a> para voltar ao menu.