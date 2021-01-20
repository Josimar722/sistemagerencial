<html>
	<head><link rel="icon"
			  href="Studio Barber/tesoura.png"
			  type="Studio Barber/tesoura.png">
		<title>...</title>
	</head>
	<body>
	<?php	
	include "conect.php";
			
	$comandoSQL="SELECT * FROM funcionarios ORDER BY nome" ;
	
	$rs = mysqli_query($conect , $comandoSQL) or
		die("Falha na sele&#x000E7;&#x000E3;o de dados:" .
			mysqli_error($conect) );
	
	$linhas = mysqli_num_rows($rs) or
		die("Não foram encontrados registros:" . 
		mysqli_error($conect) );
			
	echo "N&#x000FA;mero de registros encontrados: $linhas <br>";

	echo "<table border='1'>";
	echo "	<tr>";
	echo "		<th>c&#x000F3;digo</th>";
	echo "		<th>nome</th>";
	echo "		<th>sobrenome</th>";
	echo "		<th>sexo</th>";
	echo "		<th>dataAdmissao</th>";
	echo "		<th>instrucao</th>";
	echo "		<th>cargo</th>";
	echo "		<th>documento</th>";
	echo "	</tr>";
	
	while( $dados = mysqli_fetch_array($rs) )
	{
		$codigo 					= $dados["codigo"] ;
		$nome 						= $dados["nome"] ;
		$sobrenome   				= $dados["sobrenome"] ;
		$sexo  						= $dados["sexo"] ;
		$dataAdmissao   			= $dados["dataAdmissao"] ;
		$instrucao                  = $dados ["instrucao"];
		$cargo  					= $dados["cargo"] ;
		$documento   				= $dados["documento"] ;
				
		echo "	<tr>";
		echo "		<td>$codigo</td>" ;
		echo "		<td>$nome</td>" ;
		echo "		<td>$sobrenome</td>" ;
		echo "		<td>$sexo</td>" ;
		echo "		<td>$dataAdmissao</td>" ;
		echo "      <td>$instrucao</td>";
		echo "		<td>$cargo</td>" ;
		echo "		<td>$documento</td>" ;
		echo "		<td> <a href='alterarFunc.php?c=$codigo'>Alterar</a> </td>" ;
		echo "		<td> <a href='excluirFunc.php?c=$codigo'>Excluir</a> </td>" ;
		echo "	</tr>";
	}
	echo "</table>" ;
	
?>
		Clique <a href="cadFunc.html">aqui</a> para retornar para o inicio...
	</body>
</html>